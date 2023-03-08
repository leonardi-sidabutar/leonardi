const base_api  ='https://api.themoviedb.org/3/movie/'
const img_api   ='https://image.tmdb.org/t/p/w500'
const key_api   ='a93b110f77c74dcb7210249babca3e09'
const token_api ='eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhOTNiMTEwZjc3Yzc0ZGNiNzIxMDI0OWJhYmNhM2UwOSIsInN1YiI6IjYzYTdiMDUyZWRhNGI3MDA4MGI1NmY4ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rVE4BKUZvBEXIeN1-QymfYexSmxK81ZGJc6PO593MwY'

// Tampil Semua data film popular
function getMovies() {
  const apiUrl = 'https://api.themoviedb.org/3/movie/popular';
    fetch(`${apiUrl}?api_key=${key_api}`)
    .then(response => response.json())
    .then(data => {
      const movies = data.results;
      const moviesContainer = document.getElementById('movies');
      moviesContainer.innerHTML = '';

        movies.forEach(movie => {
        const movieElement = document.createElement('div');
        movieElement.innerHTML = `
        <img class="movie-img" src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
        <h3 class="movie-ttl">${movie.title}</h3>
        <div class="movie-info">${movie.overview}</div>
        `;

        const movieImg = movieElement.querySelector('.movie-img');
        const movieTitle = movieElement.querySelector('.movie-ttl');

        movieImg.addEventListener('click', () => {
            const popup = createPopup(movie);
            document.body.appendChild(popup);

            const overlay = popup.querySelector('.popup-overlay');
            overlay.addEventListener('click', () => {
            document.body.removeChild(popup);
            });

            const closeButton = popup.querySelector('.popup-close');
            closeButton.addEventListener('click', () => {
            document.body.removeChild(popup);
            });
        });

        movieTitle.addEventListener('click', () => {
            const popup = createPopup(movie);
            document.body.appendChild(popup);

            const overlay = popup.querySelector('.popup-overlay');
            overlay.addEventListener('click', () => {
            document.body.removeChild(popup);
            });

            const closeButton = popup.querySelector('.popup-close');
            closeButton.addEventListener('click', () => {
            document.body.removeChild(popup);
            });
        });

        moviesContainer.appendChild(movieElement);
      });

        function createPopup(movie) {
        const popup = document.createElement('div');
        popup.classList.add('popup');
        popup.innerHTML = `
            <div class="popup-overlay"></div>
            <div class="popup-content">
            <button class="popup-close">X</button>
            <img class="popup-img" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
            <div class="popup-desc">
                <h3 class="popup-ttl">${movie.title}</h3>
                <div class="popup-info">${movie.overview}</div>
            </div>
            </div>
        `;
        return popup;
        }
    })
}

getMovies();

// Pilih Kategori

$('.nav-link').on('click', function(){

    // Kategori :
    // - now_playing
    // - popular
    // - top_rated
    // - upcoming

    // Menghapus Class Active (pilihan sebelumnya)
    $('.nav-link').removeClass('active');
    // Memberi Class Active (yang diklik)
    $(this).addClass('active')

    let linkkat = $(this).attr('data') 

    // Mengambil Teks yang diklik (pilih)
    let kategori = $(this).html();

    $('#kategori').html(kategori);
    const kat = linkkat.replace(/ /g, '_').toLowerCase() // mengganti ' ' menjadi '_' + mengubah huruf kecil

    // Mensortir Data API
    fetch(`${base_api}${kat}?api_key=${key_api}`)
    .then(response=>response.json())
    .then(data => {
      const movies = data.results;
      const moviesContainer = document.getElementById('movies');
      moviesContainer.innerHTML = '';

        movies.forEach(movie => {
        const movieElement = document.createElement('div');
        movieElement.innerHTML = `
        <img class="movie-img" src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
        <h3 class="movie-ttl">${movie.title}</h3>
        <div class="movie-info">${movie.overview}</div>
        `;

        const movieImg = movieElement.querySelector('.movie-img');
        const movieTitle = movieElement.querySelector('.movie-ttl');

        movieImg.addEventListener('click', () => {
            const popup = createPopup(movie);
            document.body.appendChild(popup);

            const overlay = popup.querySelector('.popup-overlay');
            overlay.addEventListener('click', () => {
            document.body.removeChild(popup);
            });

            const closeButton = popup.querySelector('.popup-close');
            closeButton.addEventListener('click', () => {
            document.body.removeChild(popup);
            });
        });

        movieTitle.addEventListener('click', () => {
            const popup = createPopup(movie);
            document.body.appendChild(popup);

            const overlay = popup.querySelector('.popup-overlay');
            overlay.addEventListener('click', () => {
            document.body.removeChild(popup);
            });

            const closeButton = popup.querySelector('.popup-close');
            closeButton.addEventListener('click', () => {
            document.body.removeChild(popup);
            });
        });

        moviesContainer.appendChild(movieElement);
      });

        function createPopup(movie) {
        const popup = document.createElement('div');
        popup.classList.add('popup');
        popup.innerHTML = `
            <div class="popup-overlay"></div>
            <div class="popup-content">
            <button class="popup-close">X</button>
            <img class="popup-img" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
            <div class="popup-desc">
                <h3 class="popup-ttl">${movie.title}</h3>
                <div class="popup-info">${movie.overview}</div>
            </div>
            </div>
        `;
        return popup;
        }
    })

})