
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    
        <!-- css -->
        <link rel="stylesheet" href="styles.css">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap");

/*===== VARIABLES CSS Y SASS =====*/
/*Varibles sass*/
/*Variables css*/
/*===== Colores =====*/
:root {
  --first-color: #071224;
  --second-color: blue;
  --white-color: #EDEDED;
}

/*===== Fuente y tipografia =====*/
:root {
  --body-font: 'Quicksand', sans-serif;
  --small-font-size: 0.875rem;
}

@media screen and (min-width: 768px) {
  :root {
    --small-font-size: 0.938rem;
  }
}

/*===== z index =====*/
:root {
  --z-back: -10;
  --z-normal: 1;
  --z-tooltip: 10;
  --z-fixed: 100;
  --z-modal: 1000;
}

/*===== BASE =====*/
*,
::before,
::after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  position: relative;
  margin: 0;
  padding: 1rem 0 0 5rem;
  font-family: var(--body-font);
  background-color: var(--white-color);
  -webkit-transition: .5s;
  transition: .5s;
}

h1 {
  margin: 0;
}

ul,
li {
  margin: 0;
  padding: 0;
  list-style: none;
}

a {
  text-decoration: none;
}

/*=====  NAV =====*/
.l-navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 50px;
  height: 100vh;
  background-color: var(--first-color);
  padding: 1.25rem .5rem 2rem;
  -webkit-transition: .5s;
  transition: .5s;
  z-index: var(--z-fixed);
}

.nav {
  height: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  overflow: hidden;
}



.nav__toggle {
  position: absolute;
  top: 1.10rem;
  right: -.6rem;
  width: 18px;
  height: 18px;
  background-color: var(--second-color);
  border-radius: 50%;
  font-size: 1.15rem;
  color: var(--first-color);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  cursor: pointer;
  -webkit-transition: .5s;
  transition: .5s;
}

.nav__link {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: .5rem;
  margin-bottom: 1rem;
  border-radius: .5rem;
  color: var(--white-color);
  -webkit-transition: .3s;
  transition: .3s;
}

.nav__link:hover {
  background-color: var(--second-color);
  color: var(--first-color);
}

.nav__icon {
  font-size: 1rem;
  margin-right: 1rem;
}

.nav__text {
  font-weight: 700;
}

/*Show menu*/
.show {
  width: 168px;
}

/*Rotate toggle*/
.rotate {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
  -webkit-transition: .5s;
  transition: .5s;
}

/*Active links menu*/
.active {
  background-color: var(--second-color);
  color: var(--first-color);
}

/*Add padding body*/
.expander {
  padding: 1rem 0 0 12rem;
  -webkit-transition: .5s;
  transition: .5s;
}

/* konten */
.konten {
  color: #308FEB;
}
.jumbotron {
             background-color: transparent;
            }
        </style>
        <title>Bantuan</title>
      </head>
      <body id="body">
        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <img src="https://i.giphy.com/media/rq6379B2woH5btSzJn/giphy.webp"alt="" width="170px;">
                    </a>
    
                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-chevron-right'></i>
                    </div>
    
                    <ul class="nav__list">
                      <a href="{{route('bantuan')}}" class="nav__link active">
                            <i class='bx bx bx-question-mark nav__icon'></i>
                            <span class="nav__text">QnA</span>
                        </a>
                        <a href="{{route('report')}}"class="nav__link">
                            <i class='bx bx-message-square-error nav__icon' ></i>
                            <span class="nav__text">Report</span>
                        </a>
                        <a href="{{route('about_us')}}" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__text">AboutUs</span>
                        </a>
                        <a href="{{route('homepage')}}" class="nav__link">
                          <i class='bx bx-arrow-back nav__icon'></i>
                          <span class="nav__text">Back</span>
                      </a>
            </nav>
        </div>
        <!-- Akhir Navbar -->
        <!-- Awal Konten -->
        <div class="jumbotron jumbotron-fluid ">
            <div class="container">
              <h1>QnA</h1>
              <p>Temukan pertanyaan kamu di bagian QnA sebelum kamu menghubungi kami. QnA MyGamelis akan selalu di update setiap waktunya demi kenyamanan para pengguna MyGamelist.</p>
              <hr>
              <h2>Pertanyaan Populer</h2>   
              <div class="konten">
                <a href=""><p>Bagaimana cari review game?</p></a>
                <a href=""><p>Bagaimana jika lupa password?</p></a>
                <a href=""><p>Bagaimana cara membuat rating?</p></a>
                <a href=""><p>Bagaimana cara add friend?</p></a>
                </div>
                <nav class="navbar navbar-light">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Cari Pertanyaan" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </nav>
            </div>
          </div>
        <!-- Akhir Konten -->
        <!-- Serching -->
       


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
    <!-- MAIN JS -->
<script>
    // SHOW MENU
const showMenu = (toggleId, navbarId,bodyId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
            // APARECER MENU
            navbar.classList.toggle('show')
            // ROTATE TOGGLE
            toggle.classList.toggle('rotate')
            // PADDING BODY
            bodypadding.classList.toggle('expander')
        })
    }
}
showMenu('nav-toggle','navbar','body')

// LINK ACTIVE COLOR
const linkColor = document.querySelectorAll('.nav__link');   
function colorLink(){
    linkColor.forEach(l => l.classList.remove('active'));
    this.classList.add('active');
}

linkColor.forEach(l => l.addEventListener('click', colorLink));


</script>

    </html>
