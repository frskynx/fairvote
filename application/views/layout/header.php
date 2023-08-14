<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fairvote</title>
    <link rel="icon" href="<?=base_url("assets/img/icon.png"); ?>" type="image/png">
    <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap1.css"); ?>" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 mt-1 ">
      <div class="container">
          <a href="<?= site_url('nav/index/');?>" class="d-flex align-items-center mr-5 text-dark text-decoration-none ">
              <img src="<?=base_url('assets/img/icon.png')?>" alt="Logo" width="30" class="d-inline-block me-2">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="<?=site_url('nav/index/');?>">Home</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" 
              <?php
                if ($_SESSION['signin'] == true) {
                  echo 'href="'.site_url('nav/dashboard').'"';
                } else {
                  echo 'data-bs-toggle="modal" data-bs-target="#sign-in"';
                }
              ?>
              >Dashboard</a></li>
              <li class="nav-item"><a href="<?=site_url('nav/features')?>" class="nav-link">Features</a></li>
              <li class="nav-item"><a class="nav-link" href="<?=site_url('nav/suport')?>">Support</a></li>
              <li class="nav-item"><a href="<?=site_url('nav/pricing')?>" class="nav-link">Pricing</a></li>
              <li class="nav-item"><a href="<?=site_url('nav/faq')?>" class="nav-link">FAQs</a></li>
              <li class="nav-item"><a class="nav-link" href="<?=site_url('nav/about')?>">About</a></li>
            </ul>
          
            <?php if($_SESSION['signin'] == TRUE){ ?>
              <div class="dropdown text-end">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url('assets/img/profile/profile.jpg')?>" alt="profile" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="<?php echo site_url('auth/signout');?>">Sign out</a></li>
                  </ul>
              </div>
              ';
            <?php } else { ?>
              <a class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#sign-up" href="#signup">Sign-up</a>
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sign-in">Sign in</a>
            <?php }; ?>

        </div>
      </div>
  </nav>

  

 