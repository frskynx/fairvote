<?php
class Vote extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('FairModels');

        if (!$this->session->has_userdata('signin')) {
            $this->session->set_userdata('signin', false);
        }
    }

    function signinValidation() {
        if ($_SESSION['signin'] == false) {
            redirect('nav/#signin');
        }
    }

    function generateRandomCode() { 
        $chars = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHAIJKLMNOPQRSTUVWXYZ"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 5) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
        return $pass; 
    }

    public function create(){
        $this->signinValidation();
        $optionCount = $this->input->post('optionCount');

        if ($optionCount >= 2 ) { //Jika option kurang dari 2 character
            $voteName = $this->input->post('voteName');
            //Memastikan share code belum ada
            $randomCode = $this->generateRandomCode();
            $temp = $this->FairModels->readWhere('vote', 'share_code', $randomCode)->num_rows();

            if($temp <= 0){ 
                $randomCode = $this->generateRandomCode();
            }

            $data = array(
                'randomCode' => $randomCode,
                'voteName' => $voteName,
                'optionCount' => $optionCount
            );
            
            $this->load->view('layout/header');
            $this->load->view('crud/create', $data);
            $this->load->view('layout/footer');	
        } else {
            $this->session->set_flashdata('create-voting-error-feedback', '<div class="row px-3">
            <p class="col-md-12 text-danger" role="alert">Penting : Nilai option minimal 2</p></div>');
            redirect('nav/index/#making');
        }
    }
    
    public function createAction() {
        $this->signinValidation();

        $randomCode = $this->input->post('randomCode');
        $voteName = $this->input->post('voteName');
        $optionCount = $this->input->post('optionCount');
        $datetimeStart = date('Y-m-d H:i:s');
        $userName = $_SESSION['username'];

        $dataVote = array(
            'user_name_vote' => $userName,
            'vote_name' => $voteName,
            'share_code' => $randomCode,
            'datetime_start' => $datetimeStart
        );
        $this->FairModels->create('vote',$dataVote);

        for($i = 0; $i < $optionCount; $i++){
            $option = $this->input->post('option'.$i);
            $description = $this->input->post('description'.$i);

            $dataOption = array (
                'share_code_option' => $randomCode,
                'option' => $option,
                'description' => $description
            );
            $this->FairModels->create('option', $dataOption);
        }
        redirect('nav/dashboard/');
    }

    public function readOption(){
        $this->signinValidation();

        $code = $this->input->post('code');
        $validation = $this->FairModels->readWhere('history','username_history', $_SESSION['username'],'share_code_history', $code)->num_rows();
        $checkShareCode = $this->FairModels->readWhere('vote','share_code', $code)->num_rows();

        if (strlen($code) > 6 || strlen($code) < 6) { //Jika code lebih dari 8 character
            $this->session->set_flashdata('start-voting-error-feedback', '<div class="row px-3">
            <p class="col-md-12 text-danger" role="alert">Penting : Share code terdiri dari 6 character.</p></div>');
            redirect('nav/index/#vooting');
        } else if ($checkShareCode <= 0) {
            $this->session->set_flashdata('start-voting-error-feedback', '<div class="row px-3">
            <p class="col-md-12 text-danger" role="alert">Vote tidak ditemukan.</p></div>');
            redirect('nav/index/#vooting');
        } else if ($validation > 0) { //User ditemukan pada history
            $this->session->set_flashdata('start-voting-invalid-feedback', '<div class="alert alert-danger" role="alert">Terimakasih telah berpartisipasi dalam vote ini.;)</div>');
            redirect('vote/readVoteResult/'.$code);
        } else {
            $data['vote'] = $this->FairModels->readWhere('vote','share_code', $code)->result_array();
            $data['option'] = $this->FairModels->readWhere('option','share_code_option', $code)->result_array();
    
            $this->load->view('layout/header');
            $this->load->view('crud/readOption', $data);
            $this->load->view('layout/footer');	         
        }
    }

    public function readVoteResult($code){
        $data['vote'] = $this->FairModels->readWhere('vote', 'share_code', $code)->result_array();
        $data['option'] = $this->FairModels->readWhere('option','share_code_option', $code)->result_array();
        
        foreach ($data['vote'] as $row) {
            $voting_count = $row['voting_count'];
            if ($voting_count == 0){ 
                $i = 0;
                foreach ($data['option'] as $cok) {
                    $data['option'.$i] = 0;
                $i++;
                };
            } else {
                $j = 0;
                foreach ($data['option'] as $cok) {
                    ${"option".$j} = $cok['voting'];
                    if (${"option".$j} == 0){
                        $data['option'.$j] = 0;
                    } else {
                        $percent_temp = ${"option".$j} / $voting_count * 100;
                        $data['option'.$j] = round($percent_temp);
                    }
                    $j++;
                }
            }
        }

        $this->load->view('layout/header');
        $this->load->view('crud/readVoteResult', $data);
        $this->load->view('layout/footer');
    }

    public function doVoting(){ //Update option, update vote, create history
        $this->signinValidation();

        $code = $this->input->post('code');
        $id_option = $this->input->post('id_option');
        
        $dataOption = $this->FairModels->readWhere('option', 'id_option', $id_option,)->row_array();
        $votingOption = array('voting' => $dataOption['voting'] + 1);
        $this->FairModels->updateWhare('option', $votingOption, 'id_option', $id_option);

        $dataVote = $this->FairModels->readWhere('vote', 'share_code', $code)->row_array();
        $votingVote = array('voting_count' => $dataVote['voting_count'] + 1);
        $this->FairModels->updateWhare('vote', $votingVote, 'share_code', $code);

        $datetime = date('Y-m-d H:i:s');
        
        $dataHistory = array (
            'username_history' => $_SESSION['username'],
            'share_code_history' => $code,
            'id_option' => $id_option,
            'datetime' => $datetime
        );
        $this->FairModels->create('history', $dataHistory);

        redirect('vote/readVoteResult/'.$code);
    }

    public function updateOption($share_code){
        $this->signinValidation();
        $data['vote'] = $this->FairModels->readWhere('vote', 'share_code', $share_code)->row();
        $data['option'] = $this->FairModels->readWhere('option', 'share_code_option', $share_code)->result_array();

        $this->load->view('layout/header');
        $this->load->view('crud/updateOption', $data);
        $this->load->view('layout/footer');
    }

    public function updateOptionAction(){
        $share_code = $this->input->post('share_code');
        $temp['option'] = $this->FairModels->readWhere('option', 'share_code_option', $share_code)->result_array();
        $i = 0;
        foreach($temp['option'] as $row){
            ${'description'.$i} = $this->input->post('description'.$i);
            ${'id_option'.$i} = $this->input->post('id_option'.$i);
            $dataUpdate = array(
                'description' => ${'description'.$i}
            );
            echo ${'description'.$i};
            echo ${'id_option'.$i};
            $this->FairModels->updateWhare('option', $dataUpdate, 'id_option', ${'id_option'.$i});
            $i++;
        }
        redirect('nav/dashboard');
    }

    public function deleteVote($share_code){
        $this->FairModels->deleteWhere('vote', 'share_code', $share_code);
        redirect('nav/dashboard');
    }
}
