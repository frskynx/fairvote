<?php
class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('FairModels');

        if (!$this->session->has_userdata('signin')) {
            $this->session->set_userdata('signin', false);
        }
    }
    
    public function signinAction() {   
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $validate = $this->FairModels->readWhere('user', 'username', $username, 'password', $password)->num_rows();
        if ($validate > 0) {
            $data_session = array(
                'signin' => TRUE,
                'username' => $username
            );
            $this->session->set_userdata($data_session);
            redirect('nav');
        } else {
            redirect('nav/signIn');
        }
    }

    public function signout()
    {
        $this->session->set_userdata('signin', false);
        redirect('nav');
    }
}