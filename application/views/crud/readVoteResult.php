<link rel="stylesheet" href="<?php echo base_url('assets/css/readVoteResult.css'); ?>">

<div class="container">
    <div class="text-center m-4">
    <?php foreach ($vote as $row) { ?>
        <h1 class="h1"><?=$row['vote_name'];?></h1>
        <h4>Jumlah Responden : <?=$row['voting_count']; ?></h4>
    <?php } ?>
    </div>
    <?php $i = 0; foreach ($option as $row) { ?>
        <div class="content">
            <div class="option" style="background: linear-gradient(90deg, rgba(77,214,201,1) <?=${"option".$i};?>%, rgba(189,241,236,1) <?=${"option".$i};?>%);">
                <div class="text text-decoration-none ">
                    <h3><?=$row['option']." : ".${"option".$i}."%";?></h3>
                    <p><?=$row['description'];?></p>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
    <div class="mb-3" style="clear: left;"></div>
    <div class="text-center mb-5">
        <?=$this->session->flashdata('start-voting-invalid-feedback'); ?>
        <a href="<?=site_url('nav')?>" class="btn btn-lg btn-outline-primary mb-4">Kembali Ke Home</a>
        <a href="<?=site_url('nav/dashboard')?>" class="btn btn-lg btn-primary mb-4">History</a>
    </div>
    
</div>

