<div class="container mb-5 pb-1">
    <div class="text-center m-5">
        <h1 class="h1"><?=$vote->vote_name;?></h1>
        <p>Untuk menghindari manipulasi vote, kamu hanya diperbolehkan untuk mengedit deskripsi ;)</p>
    </div>
    <form action="<?=site_url('vote/updateOptionAction')?>" method='POST'>
        
            <div class="row text-center">
                <div class="col-6">
                    <h4 for="option" class="form-label">Option</h4>
                </div>
                <div class="col-6">
                    <h4 for="desc" class="form-label">Description</h4>
                </div>
            </div>
            <?php $i = 0; foreach($option as $row){ ?>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" name="option<?=$i?>" value="<?=$row['option'];?>" disabled>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" rows="2" placeholder="Optional" name="description<?=$i?>" value="<?=$row['description'];?>">
                        </div>
                        <input type="text" name="id_option<?=$i?>" value="<?=$row['id_option'];?>" hidden>
                    </div>
                    <?php $i++;} ?>
                <input type="text" name="share_code" value="<?=$vote->share_code?>" hidden>
            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-primary btn-lg">Done</button>
            </div>
    </form>
</div>