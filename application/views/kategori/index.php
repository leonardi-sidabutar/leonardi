<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?=base_url()?>">
        <H2>Setting Kategori</H2>
      </a>
    </div>
</nav>

<div class="container">

<?php if ( $this->session->flashdata('flash') ) : ?>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Kategori <strong>berhasil!</strong>
        <?= $this->session->flashdata('flash'); ?>.
        <?php $this->session->unset_userdata('flash'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="row mt-3">
  <div class="col">
    <h2>Daftar Kategori</h2>
  </div>
</div>
  <div class="row mt-3 mb-3">
    <div class="col-md-6">
        <a href="<?=base_url('kategori/tambah')?>" class="btn btn-success">Tambah Data Mahasiswa</a>
    </div>
  </div>
<div class="row">
    <div class="col-md-6">
        <ul class="list-group">
            <?php foreach ($kategori as $kat) : ?>
                <li class="list-group-item">
                    <?= $kat['kategori'];?>
                    <a href="<?=base_url();?>kategori/hapus/<?=$kat['id']?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?=base_url();?>kategori/ubah/<?=$kat['id']?>" class="badge badge-info float-right">Ubah</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

</div>