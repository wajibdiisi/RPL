@extends('layouts.app')

@section('content')
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Games || Gilbard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    
</style>
<body>
    <style>
media only screen and (min-width: 1200px) and (max-width: 1499px) {
  .games-area {
    margin-bottom: -5px; } }

@media only screen and (min-width: 768px) and (max-width: 991px) {
  .games-area {
    margin-bottom: -5px; } }

@media only screen and (max-width: 767px) {
  .games-area {
    margin-bottom: -5px; } }

.game-topbar-wrapper {
  margin-bottom: 40px; }
  .game-topbar-wrapper .game-search-box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: end;
    -ms-flex-align: end;
    align-items: flex-end;
    position: relative; }
    @media only screen and (max-width: 767px) {
      .game-topbar-wrapper .game-search-box {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap; } }
    .game-topbar-wrapper .game-search-box h3 {
      font-size: 24px;
      line-height: 28px;
      margin-bottom: 0;
      margin-right: 25px; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .game-topbar-wrapper .game-search-box h3 {
          font-size: 18px;
          line-height: 24px;
          margin-right: 15px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .game-topbar-wrapper .game-search-box h3 {
          font-size: 16px;
          line-height: 24px;
          margin-right: 10px; } }
    .game-topbar-wrapper .game-search-box input {
      height: 50px;
      border: 0;
      border-bottom: 1px solid #616161;
      color: #5c5c5c;
      padding: 0 40px 0 0px;
      font-size: 16px;
      width: 265px; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .game-topbar-wrapper .game-search-box input {
          width: 200px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .game-topbar-wrapper .game-search-box input {
          width: 170px;
          font-size: 14px;
          height: 40px; } }
      @media only screen and (max-width: 767px) {
        .game-topbar-wrapper .game-search-box input {
          width: 100%;
          font-size: 14px;
          height: 40px; } }
    .game-topbar-wrapper .game-search-box button {
      background-color: transparent;
      border: 0;
      position: absolute;
      bottom: 0;
      right: 0;
      font-size: 16px;
      height: 50px;
      text-align: center;
      line-height: 50px;
      padding: 0; }
  .game-topbar-wrapper .toolbar-shorter {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: end;
    -ms-flex-align: end;
    align-items: flex-end;
    margin-right: 50px; }
    .game-topbar-wrapper .toolbar-shorter:last-child {
      margin-right: 0; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .game-topbar-wrapper .toolbar-shorter {
        margin-right: 20px; } }
    @media only screen and (max-width: 767px) {
      .game-topbar-wrapper .toolbar-shorter {
        margin-right: 0px; } }
    .game-topbar-wrapper .toolbar-shorter h3 {
      font-size: 24px;
      line-height: 28px;
      margin-bottom: 0;
      margin-right: 25px; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .game-topbar-wrapper .toolbar-shorter h3 {
          font-size: 18px;
          line-height: 24px;
          margin-right: 15px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .game-topbar-wrapper .toolbar-shorter h3 {
          font-size: 16px;
          line-height: 24px;
          margin-right: 10px; } }
    .game-topbar-wrapper .toolbar-shorter .nice-select {
      width: 140px;
      border: 0;
      border-bottom: 1px solid #616161;
      border-radius: 0;
      padding-left: 0; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .game-topbar-wrapper .toolbar-shorter .nice-select {
          width: 120px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .game-topbar-wrapper .toolbar-shorter .nice-select {
          width: 100px;
          height: 40px; } }
      @media only screen and (max-width: 767px) {
        .game-topbar-wrapper .toolbar-shorter .nice-select {
          width: 140px; } }

.single-game .game-img {
  overflow: hidden; }
  .single-game .game-img a {
    display: block; }
    .single-game .game-img a img {
      width: 100%;
      -webkit-transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      -o-transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94); }

.single-game .game-content {
  padding: 20px 20px;
  -webkit-box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); }
  .single-game .game-content h4 {
    font-size: 20px;
    line-height: 28px;
    margin-bottom: 0;
    color: #151515;
    display: inline-block; }
    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .single-game .game-content h4 {
        font-size: 16px; } }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .single-game .game-content h4 {
        font-size: 18px; } }
    @media only screen and (max-width: 767px) {
      .single-game .game-content h4 {
        font-size: 16px; } }
    .single-game .game-content h4 a {
      display: block; }
  .single-game .game-content span {
    font-size: 16px;
    line-height: 28px;
    color: #061da4;
    font-family: "Qanto";
    float: right; }
    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .single-game .game-content span {
        font-size: 14px; } }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .single-game .game-content span {
        font-size: 14px; } }
    @media only screen and (max-width: 767px) {
      .single-game .game-content span {
        font-size: 12px; } }
  .single-game .game-content p {
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 10px;
    margin-top: 15px; }

.single-game:hover .game-img img {
  -webkit-transform: scale(1.15);
  -ms-transform: scale(1.15);
  transform: scale(1.15); }


  .page-pagination li {
    display: inline-block;
    font-size: 18px;
    line-height: 24px;
    color: #8b8a8a;
    text-align: center;
    margin: 5px 10px; }
    .page-pagination li a {
      color: #252525;
      display: block; }
      .page-pagination li a i {
        line-height: 30px; }
    .page-pagination li:hover {
      color: #151515; }
    .page-pagination li.active a {
      color: #252525; }   

      .page-banner-area {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 400px;
  position: relative; }
  .page-banner-area::before {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    content: "";
    background-color: #000000;
    opacity: 0.4; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .page-banner-area {
      height: 460px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .page-banner-area {
      height: 360px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .page-banner-area {
      height: 260px; } }
  @media only screen and (max-width: 767px) {
    .page-banner-area {
      height: 220px; } }
  .page-banner-area .page-content {
    position: relative; }
    .page-banner-area .page-content h1 {
      font-size: 75px;
      line-height: 75px;
      font-weight: 300;
      font-family: "Bauhaus 93";
      color: #ffffff;
      text-shadow: -6px 4px 1px #252525; }
      @media only screen and (min-width: 1200px) and (max-width: 1499px) {
        .page-banner-area .page-content h1 {
          font-size: 60px;
          line-height: 60px; } }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .page-banner-area .page-content h1 {
          font-size: 50px;
          line-height: 50px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .page-banner-area .page-content h1 {
          font-size: 40px;
          line-height: 40px; } }
      @media only screen and (max-width: 767px) {
        .page-banner-area .page-content h1 {
          font-size: 28px;
          line-height: 30px; } }
    .page-banner-area .page-content a.df-btn {
      background-color: #ffffff;
      font-size: 20px;
      color: #151515;
      border-radius: 50px;
      margin-top: 30px;
      line-height: 25px; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .page-banner-area .page-content a.df-btn {
          font-size: 18px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .page-banner-area .page-content a.df-btn {
          font-size: 16px;
          margin-top: 15px; } }
      @media only screen and (max-width: 767px) {
        .page-banner-area .page-content a.df-btn {
          font-size: 14px;
          margin-top: 10px; } }
    .page-breadcrumb {
  list-style: none;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: absolute;
  bottom: -145px;
  left: 0; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .page-breadcrumb {
      bottom: -105px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .page-breadcrumb {
      bottom: -70px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .page-breadcrumb {
      bottom: -30px; } }
  @media only screen and (max-width: 767px) {
    .page-breadcrumb {
      bottom: -30px; } }
  .page-breadcrumb li {
    color: #ffffff;
    font-size: 14px;
    font-weight: 300;
    letter-spacing: 0.5px;
    font-family: "Qanto";
    line-height: 1;
    margin-top: 10px; }
    @media only screen and (max-width: 575px) {
      .page-breadcrumb li {
        font-size: 14px; } }
    .page-breadcrumb li::after {
      content: "/";
      margin: 0 6px; }
    .page-breadcrumb li:last-child::after {
      display: none; }
    .page-breadcrumb li a:hover {
      color: #f64140; }

      </style>
    
<div id="main-wrapper">
    
    <div class="page-banner-area" style="margin-top:-20px;background-image: url(https://i.ytimg.com/vi/8DiPyJskfyI/maxresdefault.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content text-center">
                        <h1>Adventure</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Games</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Games Area Start-->
    @livewire('game.gamehome',['data' => $data])

<!-- Placed js at the end of the document so the pages load faster -->

<!-- All jquery file included here -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>

@endsection