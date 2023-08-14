

<div class="modal fade show" id="sign-up" tabindex="-1" aria-labelledby="exampleModalToggleLabel2"  style="display:block;" aria-modal="true" role="dialog">
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
            <span><p class="text"><a class="text-link-fairvote" href="<?=site_url('nav/signIn')?>" data-bs-target="#sign-in" data-bs-toggle="modal">Sign-in</a> if you already have acount</p></span>
            <a href="<?=site_url('nav')?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">Sign-up</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<div class="container fixed-bottom">
    <footer class="d-flex flex-wrap justify-content-between align-items-center my-4">
        <p class="col-md-12 mb-0 text-body-secondary">&copy; 2023 Frskyxvwxzvxwsyvx, Inc</p>
    </ul>
</footer>
</div>
<div class="modal-backdrop fade show"></div>

  </body>
</html>
