<div class="container mb-5 pb-1">
    <div class="text-center m-5">
        <h1 class="h1"><?=$voteName;?></h1>
        <p>Silahkan isi kolom option dengan pilihan yang ingin anda berikan pada voting <?=$voteName;?>, dan jika diperlukan anda bisa memberi deskripsi untuk option yang anda berikan dengan mengisi kolom deskripsi.</p>
    </div>
    <form action="<?=site_url('vote/createAction')?>" method='POST'>
        
            <div class="row text-center">
                <div class="col-6">
                    <h4 for="option" class="form-label">Option</h4>
                </div>
                <div class="col-6">
                    <h4 for="desc" class="form-label">Description</h4>
                </div>
            </div>
            <?php for($i = 0 ; $i < $optionCount ; $i++ ){ ?>
                <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Option <?=$i+1?>" name="option<?=$i?>" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" rows="2" placeholder="Optional" name="description<?=$i?>">
                        </div>
                    </div>
            <?php } ?>
            <input type="text" name="randomCode" value="<?=$randomCode;?>" hidden>
            <input type="text" name="voteName" value="<?=$voteName;?>" hidden>
            <input type="text" name="optionCount" value="<?=$optionCount;?>" hidden>

            <div class="text-center mt-4 mb-5">
                <a class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin deck ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Setelah vote tersimpan, kamu hanya bisa mengedit deskripsi option. Pastikan pilihan yang anda buat sudah benar.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

