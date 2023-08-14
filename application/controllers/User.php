<?php
class User extends CI_Controller {

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

    public function createUser() {
        $username = $this->input->post('username-up');
        $validate = $this->FairModels->readWhere('user', 'username', $username)->num_rows();

        if ($validate > 0){
            echo $this->session->set_flashdata('msg', '<div class="mb-3 alert alert-danger text-center p-2">User name has been used</div>');
            redirect('nav/signUp');
        } else {
            $password = $this->input->post('password-up');
            $email = $this->input->post('email');
            $dataUser = array(
                'username' => $username,
                'password' => $password,
                'email' => $email
            );
            $this->FairModels->create('user', $dataUser);   
            redirect('nav/singIn');
        }

    }
}