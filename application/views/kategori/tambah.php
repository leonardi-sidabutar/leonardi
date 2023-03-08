<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?=base_url()?>">
        <H2>Tambah Kategori</H2>
      </a>
    </div>
</nav>

<div class="container">

<div class="row mt-3 font-black">
    <div class="col-md-6">

        <div class="card">
        <div class="card-header">
            <h5>Form Tambah Kategori</h5>
        </div>
        <div class="card-body">
            <!-- <?php if( validation_errors () ) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
            <?php endif; ?> -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori">
                    <small class="form-text text-danger"><?= form_error('kategori') ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori Movie</label>
                    <select class="form-control" id="link" name="link">
                        <?php foreach($allkategori as $kat) : ?>
                            <option value="<?=$kat?>"><?=$kat?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="tambah" class="btn btn-success float-right mt-3">Tambah Data</button>
            </form>
            
            </div>
        </div>
        

    </div>
</div>

</div>