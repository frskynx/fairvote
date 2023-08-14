
    <div class="modal fade show" id="sign-in" tabindex="-1" aria-labelledby="exampleModalLabel"  style="display:block;" aria-modal="true" role="dialog">
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
                <?=$this->session->flashdata('msg-wrong'); ?>
                <span><p class="text"><a class="text-link-fairvote" href="<?=site_url('nav/signUp')?>" data-bs-target="#sign-up" data-bs-toggle="modal">Sign-up</a> if you dont have any acount</p></span>
                <a href="<?=site_url('nav')?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Sign in</button>
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
