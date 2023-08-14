ini adalah contoller yang memuat modal sign_overlay
public function index() {
        $this->load->view('layout/header');
        $this->load->view('home');	
        $this->load->view('overlay/sign_overlay');	
        $this->load->view('layout/footer');	
    }


ini adalah view modal sign_overlay

<div class="modal fade" id="sign-in" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="text-center">
        <img src="<?php echo base_url('assets/img/icon.png'); ?>" alt="Logo" height="28" style="margin: 8px;">
        <h1 class="fs-5 madal-title" id="exampleModalLabel">Fairvote Sign-in</h1>
      </div>
      <div class="modal-body">
        <form action="<?=site_url('auth/signinAction');?>" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com" value="admin">
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="admin">
            <label for="password">Password</label>
          </div>
          <div class="text-center">
            <?=$this->session->flashdata('msg'); ?>
            <span><p class="text"><a href="#" data-bs-target="#sign-up" data-bs-toggle="modal">Sign-up</a> if you dont have any acount</p></span>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

ini adlah action form dari view sign_overlay
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
            baris yang menampilkan modal
        } else if ($username == '' || $password =='') {
            echo $this->session->set_flashdata('msg', '<div class="mb-3 alert alert-danger text-center p-2">Make sure name and password is not empty</div>');
            baris yang menampilkan modal
        } else {
            echo $this->session->set_flashdata('msg', '<div class="mb-3 alert alert-danger text-center p-2">Something Wrong</div>');
            baris yang menampilkan modal
        }
    }

saya ingin modal tersebut dapat ditampilkan dan dipanggil oleh action form diatas pada baris ke 53, 56, 59