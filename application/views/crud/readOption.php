<link rel="stylesheet" href="<?php echo base_url('assets/css/readOption.css'); ?>">

<div class="container mb-5 pb-3">
    <div class="text-center m-5">
    <?php foreach ($vote as $row) { ?>
            <h1 class="h1"><?php echo $row['vote_name']; ?></h1>
    <?php } ?>
            <p>Kamu hanya berkesempatan satu kali untuk berpartisipasi dalam vote ini.</p>
    </div>
    <?php $i = 0; foreach ($option as $row) { ?>
        <a class="content" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$i?>">
            <div class="option text-decoration-none">
                <div id="dekorable" class="text text-decoration-none ">
                    <h3><?=$row['option']; ?></h3>
                    <p><?=$row['description'];?></p>
                </div>
            </div>
        </a>
        
        <div class="modal fade" id="exampleModal<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pilihan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Silahkan lanjutkan jika <b><?=$row['option']; ?></b> adalah pilihan yang benar.
              </div>
              <div class="modal-footer">
                <form action="<?=site_url('vote/doVoting');?>" method="POST">
                    <input type="text" name="id_option" value="<?=$row['id_option']; ?>" hidden>
                    <input type="text" name="code" value="<?=$row['share_code_option']; ?>" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    <?php $i++; } ?>
</div>
<div class="mb-3" style="clear: left;"></div>


