<div class="floating" id="signin">
      <div class="p-5" id="card">
        <div class="text-center mb-5">
            <img src="<?php echo base_url('assets/img/icon.png'); ?>" alt="Logo" height="32" class="mb-3">
            <h4 class="h4 fw-normal">Vairvote sign in</h4>
        </div>        
        <form action="<?=site_url('auth/signinAction');?>" method="POST">
          <div class="row mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="row mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          
          <div class="text-center">

            <?php echo $this->session->flashdata('msg'); ?>

            <span><p class="text"><a href="#signup">Sign up</a> if you dont have any acount</p></span>
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="#" class="btn btn-danger">Cencel</a>
          </div>
        </form>
      </div>
    </div>

    <div class="floating" id="signup">
      <div class="p-5" id="card">
        <div class="text-center mb-2">
            <img src="<?php echo base_url('assets/img/icon.png'); ?>" alt="Logo" height="32" class="mb-3">
            <h4 class="h4 fw-normal">Vairvote Sign up</h4>
        </div>
        <form action="<?=site_url('user/createUser');?>" method="POST">
          <div class="row mb-3">
            <label for="username-up" class="form-label">Username</label>
            <input type="text" class="form-control" id="username-up" name="username-up">
          </div>
          <div class="row mb-3">
            <label for="password-up" class="form-label">Password</label>
            <input type="password" class="form-control" id="password-up" name="password-up">
          </div>
          <div class="row mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="text-center">

            <?php echo $this->session->flashdata('msg'); ?>
            
            <span><p class="text"><a href="#signin">Sign in</a> if you already have an acount</p></span>
            <button type="submit" class="btn btn-primary">Sing up</button>
            <a href="#" class="btn btn-danger">Cencel</a>
          </div>
        </form>
      </div>
    </div>

    <div class="floating" id="signup-succes">
        <span class="m-auto p-4" id="card">
          <p class="text">Your account has been successfully registered <a href="#signin">click here</a> to sign in</p>
        </span>
    </div>

