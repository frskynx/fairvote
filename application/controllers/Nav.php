<?php
class Nav extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('FairModels');

        if (!$this->session->has_userdata('signin')) {
            $this->session->set_userdata('signin', false);
        }
    }

	public function index() {
        $this->load->view('layout/header');
        $this->load->view('home');	
        $this->load->view('overlay/sign_overlay');
        $this->load->view('layout/footer');	
    }

    public function signIn() {
        echo $this->session->set_flashdata('msg-wrong', '<div class="mb-3 alert alert-danger text-center p-2">Something Wrong</div>');
        $this->load->view('layout/header');
        $this->load->view('home');	
        $this->load->view('overlay/sign_in');	
    }

    public function signUp() {
        $this->load->view('layout/header');
        $this->load->view('home');	
        $this->load->view('overlay/sign_up');
    }

    public function dashboard() {

        //create history view display
        $data['history_display'] = $this->FairModels->getHistoryWithDetails($_SESSION['username']);        
        
        //get vote by user
        $data['vote'] = $this->FairModels->readWhere('vote', 'user_name_vote', $_SESSION['username'])->result_array();

        //get option each vote by user
        $i = 0;
        foreach ($data['vote'] as $row){
            $data['option'.$i] = $this->FairModels->readWhere('option', 'share_code_option', $row['share_code'])->result_array();

            //set voting percent
            $id = $row['share_code'];
            $voting_count = $row['voting_count'];
            if ($voting_count == 0){ 
                $j = 0;
                foreach ($data['option'.$i] as $cok) {
                    $data['voting_'.$id.'_'.$j] = 0;
                    $j++;
                };
            } else {
                $j = 0;
                foreach ($data['option'.$i] as $cok) {
                    ${"voting".$i} = $cok['voting'];
                    if (${"voting".$i} == 0){
                        $data['voting_'.$id.'_'.$j] = 0;
                    } else {
                         $percent_temp = ${"voting".$i} / $voting_count * 100;
                         $data['voting_'.$id.'_'.$j] = round($percent_temp);
                    }
                    $j++;
                };
            }
            $i++;
        }

        $this->load->view('layout/header');
        $this->load->view('dashboard', $data);	
        $this->load->view('layout/footer');	
    }
    public function features() {
        $this->load->view('layout/header');
        $this->load->view('features');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }
    
    public function suport() {
        $this->load->view('layout/header');
        $this->load->view('support');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }

    public function pricing() {
        $this->load->view('layout/header');
        $this->load->view('maintenance');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }

    public function faq() {
        $this->load->view('layout/header');
        $this->load->view('maintenance');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }

    public function about() {
        $this->load->view('layout/header');	
        $this->load->view('maintenance');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }

}