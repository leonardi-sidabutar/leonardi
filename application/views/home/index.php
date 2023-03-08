<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?=base_url('kategori')?>">
        <H2>LEON MOVIE</H2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php foreach($kategori as $kat) : ?>
            <a class="nav-link" href="#" data=<?=$kat['link']?>><?=$kat['kategori']?></a>            
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row mt-3">
      <div class="col">
        <h2 id="kategori">Now Playing</h2>
        <br>
      </div>
    </div>

    <div class="row" id="daftar-menu">    
    </div>

    <div class="movie-container" id="movies"></div>

  </div>