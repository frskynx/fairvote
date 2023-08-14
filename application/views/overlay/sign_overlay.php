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
            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com" required>
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" require>
            <label for="password">Password</label>
          </div>
            
          <div class="text-center">
            <?=$this->session->flashdata('msg'); ?>
            <span><p class="text"><a href="#" class="text-link-fairvote" data-bs-target="#sign-up" data-bs-toggle="modal">Sign-up</a> if you dont have any acount</p></span>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="sign-up" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">

      <div class="text-center">
        <img src="<?php echo base_url('assets/img/icon.png'); ?>" alt="Logo" height="28" style="margin: 8px;">
        <h1 class="fs-5 madal-title" id="exampleModalLabel2">Fairvote Sign-up</h1>
      </div>

      <div class="modal-body">
        <form action="<?=site_url('user/createUser');?>" method="POST">

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username-up" name="username-up"  placeholder="name@example.com" required>
            <label for="username-up">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password-up" name="password-up"  placeholder="Password" required>
            <label for="password-up">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
            <label for="email">E-mail</label>
          </div>
            
          <div class="text-center">
            <?php echo $this->session->flashdata('msg'); ?>
            <span><p class="text"><a class="text-link-fairvote" href="#" data-bs-target="#sign-in" data-bs-toggle="modal">Sign-in</a> if you already have acount</p></span>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Sign-up</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


