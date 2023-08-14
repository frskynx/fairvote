    <link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">
    
    <div class="container text-center p-4">
      <div class="row">
        <div class="col-lg-6 p-4 mt-4">
          <img class="img-fluid" src="<?php echo base_url('assets/img/home-ilustration.png'); ?>" alt="home">
        </div>
        <div class="col-lg-3 m-auto wkwk">
            <a style="text-decoration: none;"
            <?php
                if ($_SESSION['signin'] == true) {
                  echo 'href="#vooting"';
                } else {
                  echo 'data-bs-toggle="modal" data-bs-target="#sign-in"';
                }
            ?>
            ><p class="mb-3 m-auto btn btn-lg btn-primary d-grid home-btn">Start Vote</p></a>
            <a style="text-decoration: none;"
            <?php
                if ($_SESSION['signin'] == true) {
                  echo 'href="#making"';
                } else {
                  echo 'data-bs-toggle="modal" data-bs-target="#sign-in"';
                }
            ?>
            ><p class="m-auto btn btn-lg btn-primary d-grid home-btn">Make Vote</p></a>
        </div>
      </div>
    </div>
    
    <div class="floating" id="vooting">
      <div class="m-auto p-4 text-center" id="card">
        <h3 class="mb-3 fw-normal text-center">Share code</h3>
        <form action="<?=site_url('vote/readOption');?>" method="POST">
          <div class="row mb-3">
            <div class="col input-group">

            <input type="text" class="form-control" placeholder="Paste here" name="code" id="code" required>
            <span class="input-group-text" id="pasteButton" style="cursor: pointer;">Paste</span>
            
            </div>
          </div>
          <?=$this->session->flashdata('start-voting-error-feedback'); ?>
          <div class="row">
            <div class="col m-auto">
              <button type="submit" class="btn btn-primary">Vote</button>
              <a href="#" class="btn btn-danger">Cencel</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="floating" id="making">
      <div class="m-auto p-4 text-center" id="card">
        <h3 class="mb-3 fw-normal text-center">Make vote</h3>
        <form action="<?=site_url('vote/create');?>" method="POST">
          <div class="row g-3 mb-3">
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Vote name" name='voteName' required>
            </div>
            <div class="col-md-4">
              <input type="number" class="form-control" placeholder="Option" aria-label="Option" name='optionCount' required>
            </div>
          </div>
          <?=$this->session->flashdata('create-voting-error-feedback'); ?>
          <div class="row">
            <div class="col m-auto">
              <button type="submit" class="btn btn-primary">Make</button>
              <a href="#" class="btn btn-danger">Cencel</a>
            </div>
          </div>
        </form>
      </div>
    </div>