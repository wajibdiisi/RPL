<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
@livewireStyles
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a:hover {
  text-decoration: none;
  color: #061da4; }
    .bg-black {
  background-color: #081b1f !important; }

    header.header {
        background-color: transparent;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        z-index: 999; }
        header.header.is-sticky {
          position: fixed;
          -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
          -webkit-animation-name: slideInDown;
          animation-name: slideInDown;
          -webkit-animation-duration: 0.5s;
          animation-duration: 0.5s;
          background: #081b1f;
          z-index: 9999; }
          header.header.is-sticky .default-header {
            margin-top: 0 !important; }
            header.header.is-sticky .default-header .main-menu ul li a {
              line-height: 30px; }
      
      header.header.header-static {
        position: static; }
      
      @media only screen and (max-width: 767px) {
        header.header-absolute {
          position: static; } }
      
      /*-- Default Header --*/
      .default-header.menu-right > .container > .row {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        position: relative; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .default-header.menu-right > .container > .row {
            -webkit-box-align: inherit;
            -ms-flex-align: inherit;
            align-items: inherit; } }
        @media only screen and (max-width: 767px) {
          .default-header.menu-right > .container > .row {
            -webkit-box-align: inherit;
            -ms-flex-align: inherit;
            align-items: inherit; } }
        .default-header.menu-right > .container > .row > .col {
          -webkit-box-flex: 0;
          -ms-flex-positive: 0;
          flex-grow: 0;
          position: static; }
          .default-header.menu-right > .container > .row > .col:first-child {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }
      
      /*-- Header Logo --*/
      @media only screen and (max-width: 767px) {
        .logo {
          text-align: center;
          width: 120px;
          margin: auto; } }
      
      .logo a {
        display: inline-block; }
        .logo a img {
          max-width: 100%; }
      
      /*-- Header Search --*/
      .header-right-wrap ul {
        text-align: right; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .header-right-wrap ul {
            text-align: center; } }
        @media only screen and (max-width: 767px) {
          .header-right-wrap ul {
            text-align: left; } }
        .header-right-wrap ul li {
          display: inline-block;
          margin-right: 25px; }
          @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .header-right-wrap ul li {
              margin-right: 10px; } }
          .header-right-wrap ul li:last-child {
            margin-right: 0; }
          .header-right-wrap ul li a {
            font-size: 20px;
            line-height: 30px;
            display: block;
            padding: 30px 0;
            font-family: "Qanto";
            color: #9f9f9f; }
            @media only screen and (min-width: 768px) and (max-width: 991px) {
              .header-right-wrap ul li a {
                padding: 20px 0; } }
            @media only screen and (max-width: 767px) {
              .header-right-wrap ul li a {
                padding: 20px 0; } }
            .header-right-wrap ul li a:hover {
              color: #ffffff; }
      
      .header-search-form {
        position: relative;
        z-index: 999; }
      
      .header-search-toggle {
        background-color: transparent;
        border: none;
        color: #252525;
        padding: 0;
        line-height: 1;
        width: 30px;
        height: 30px; }
        .header-search-toggle i {
          font-size: 24px; }
        .header-search-toggle.open i {
          font-size: 24px; }
      
      /*-- Search Form --*/
      .header-search-form {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #ffffff;
        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15); }
        @media only screen and (min-width: 1200px) and (max-width: 1499px) {
          .header-search-form {
            right: 10px; } }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .header-search-form {
            right: auto;
            left: 80px; } }
        .header-search-form form {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex; }
          .header-search-form form input {
            width: 250px;
            border: none;
            background-color: transparent;
            color: #151515;
            line-height: 24px;
            padding: 13px 20px; }
            @media only screen and (max-width: 479px) {
              .header-search-form form input {
                width: 216px; } }
          .header-search-form form button {
            line-height: 24px;
            padding: 13px 15px;
            border: none;
            background-color: #061da4;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            color: #ffffff;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out; }
            .header-search-form form button i {
              font-size: 24px;
              line-height: 24px; }
            .header-search-form form button:hover {
              background-color: #000000; }
      
      /*-- buy button --*/
      .buy-btn {
        margin-left: 60px; }
        @media only screen and (min-width: 1200px) and (max-width: 1499px) {
          .buy-btn {
            margin-left: 20px; }
            .buy-btn > .df-btn {
              width: 170px;
              text-align: center; } }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
          .buy-btn {
            margin-left: 20px; }
            .buy-btn > .df-btn {
              width: 170px;
              text-align: center; } }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .buy-btn {
            text-align: right;
            display: block;
            width: 100%;
            margin-left: 0;
            margin-right: 60px; } }
        @media only screen and (max-width: 767px) {
          .buy-btn {
            text-align: right;
            display: block;
            width: 100%;
            margin-left: 0;
            margin-right: 40px; } }
      
      /*-- Main Menu --*/
      .main-menu.menu-style-2 ul li a {
        line-height: 30px; }
      
      .main-menu > ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex; }
        .main-menu > ul > li {
          margin-right: 65px;
          position: relative; }
          @media only screen and (min-width: 1200px) and (max-width: 1499px) {
            .main-menu > ul > li {
              margin-right: 40px; } }
          @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .main-menu > ul > li {
              margin-right: 20px; } }
          .main-menu > ul > li:last-child {
            margin-right: 0; }
          .main-menu > ul > li > a {
            font-size: 20px;
            line-height: 70px;
            font-weight: 400;
            letter-spacing: 0.25px;
            font-family: "Qanto";
            color: #ffffff;
            display: block;
            padding: 30px 0;
            position: relative;
            text-transform: capitalize; }
            @media only screen and (min-width: 992px) and (max-width: 1199px) {
              .main-menu > ul > li > a {
                line-height: 30px; } }
          .main-menu > ul > li.has-dropdown > a::after {
            content: "\f107";
            font-family: Fontawesome;
            line-height: 30px;
            margin-left: 3px; }
          .main-menu > ul > li.active > a, .main-menu > ul > li:hover > a {
            color: #f64140; }
          .main-menu > ul > li:hover > .sub-menu {
            margin-top: 0;
            opacity: 1;
            visibility: visible;
            z-index: 99; }
          .main-menu > ul > li:hover > .mega-menu {
            margin-top: 0;
            opacity: 1;
            visibility: visible;
            z-index: 99; }
          .main-menu > ul > li:last-child .sub-menu {
            left: auto;
            right: 0; }
            .main-menu > ul > li:last-child .sub-menu .sub-menu .sub-menu {
              left: 100%;
              right: auto; }
              .main-menu > ul > li:last-child .sub-menu .sub-menu .sub-menu .sub-menu {
                left: auto;
                right: 100%; }
          .main-menu > ul > li:nth-last-child(-n+3) .sub-menu .sub-menu {
            left: auto;
            right: 100%; }
            .main-menu > ul > li:nth-last-child(-n+3) .sub-menu .sub-menu .sub-menu {
              left: 100%;
              right: auto; }
      
      /*-- Sub Menu --*/
      .sub-menu {
        position: absolute;
        left: 0;
        top: 100%;
        margin-left: -20px;
        margin-top: 30px;
        padding: 20px 0;
        background-color: #ffffff;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        width: 210px;
        z-index: -99;
        opacity: 0;
        visibility: hidden; }
        .sub-menu li {
          margin-bottom: 5px;
          position: relative; }
          .sub-menu li:last-child {
            margin-bottom: 0; }
          .sub-menu li a {
            letter-spacing: 0.25px;
            font-family: "Qanto";
            color: #151515;
            display: block;
            font-size: 14px;
            line-height: 30px;
            font-weight: 400;
            padding: 0 20px; }
          .sub-menu li.has-dropdown > a::after {
            content: "\f105";
            font-family: Fontawesome;
            line-height: 30px;
            float: right; }
          .sub-menu li.active > a {
            color: #f64140; }
          .sub-menu li .sub-menu {
            left: 100%;
            top: 0;
            margin-left: 0; }
          .sub-menu li:hover > a {
            color: #f64140;
            padding-left: 25px; }
          .sub-menu li:hover > .sub-menu {
            margin-top: -10px;
            opacity: 1;
            visibility: visible;
            z-index: 99; }
          .sub-menu li .sub-menu {
            left: 100%;
            margin-left: 0;
            top: 0; }
            .sub-menu li .sub-menu .sub-menu {
              left: auto;
              right: 100%; }
              .sub-menu li .sub-menu .sub-menu .sub-menu {
                left: 100%;
                right: auto; }
      
      /*-- Mobile Menu --*/
      .mobile-menu {
        -webkit-box-flex: 1 !important;
        -ms-flex: 1 0 100% !important;
        flex: 1 0 100% !important; }
        .mobile-menu .mean-bar {
          position: relative;
          /*---- Mean Nav ----*/ }
          .mobile-menu .mean-bar .meanmenu-reveal {
            position: absolute;
            top: -46px; }
            @media only screen and (max-width: 479px) {
              .mobile-menu .mean-bar .meanmenu-reveal {
                top: -45px; } }
            @media only screen and (max-width: 767px) {
              .mobile-menu .mean-bar .meanmenu-reveal {
                top: -45px; } }
            .mobile-menu .mean-bar .meanmenu-reveal span {
              position: relative;
              /*---- Menu Open ----*/
              /*---- Menu Close ----*/ }
              .mobile-menu .mean-bar .meanmenu-reveal span.menu-bar {
                height: 2px;
                width: 26px;
                background-color: #ffffff;
                display: block;
                margin: 8px 0; }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-bar::before, .mobile-menu .mean-bar .meanmenu-reveal span.menu-bar::after {
                  content: "";
                  position: absolute;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  background-color: #ffffff; }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-bar::before {
                  top: -8px; }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-bar::after {
                  bottom: -8px; }
              .mobile-menu .mean-bar .meanmenu-reveal span.menu-close {
                height: 2px;
                width: 26px;
                background-color: transparent;
                display: block;
                margin: 8px 0; }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-close::before, .mobile-menu .mean-bar .meanmenu-reveal span.menu-close::after {
                  content: "";
                  position: absolute;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  background-color: #ffffff; }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-close::before {
                  top: 0;
                  -webkit-transform: rotate(45deg);
                  -ms-transform: rotate(45deg);
                  transform: rotate(45deg); }
                .mobile-menu .mean-bar .meanmenu-reveal span.menu-close::after {
                  bottom: 0;
                  -webkit-transform: rotate(-45deg);
                  -ms-transform: rotate(-45deg);
                  transform: rotate(-45deg); }
          .mobile-menu .mean-bar .mean-nav {
            background-color: #ffffff; }
            .mobile-menu .mean-bar .mean-nav > ul {
              margin-bottom: 30px;
              border: 1px solid rgba(0, 0, 0, 0.05);
              overflow-x: hidden;
              max-height: 250px; }
              @media only screen and (max-width: 767px) {
                .mobile-menu .mean-bar .mean-nav > ul {
                  max-height: 180px;
                  overflow-y: auto; } }
              @media only screen and (max-width: 575px) {
                .mobile-menu .mean-bar .mean-nav > ul {
                  max-height: 220px;
                  overflow-y: auto; } }
              .mobile-menu .mean-bar .mean-nav > ul > li:first-child > a {
                border-top: none; }
              .mobile-menu .mean-bar .mean-nav > ul li {
                position: relative;
                display: block;
                float: left;
                width: 100%;
                /*---- Sub Menu & Mega Menu ----*/ }
                .mobile-menu .mean-bar .mean-nav > ul li a {
                  font-size: 13px;
                  display: block;
                  font-family: "Qanto";
                  color: #151515;
                  font-weight: 600;
                  text-transform: uppercase;
                  line-height: 44px;
                  position: relative;
                  border-top: 1px solid rgba(0, 0, 0, 0.05);
                  padding: 0 40px 0 20px;
                  /*---- Menu Expand For Sub Menu ----*/ }
                  .mobile-menu .mean-bar .mean-nav > ul li a::after {
                    display: none; }
                  .mobile-menu .mean-bar .mean-nav > ul li a:hover {
                    color: #061da4;
                    padding-left: 25px; }
                  .mobile-menu .mean-bar .mean-nav > ul li a.active {
                    color: #061da4; }
                  .mobile-menu .mean-bar .mean-nav > ul li a.mean-expand {
                    border-width: 0 1px;
                    border-style: solid;
                    border-color: rgba(0, 0, 0, 0.05);
                    position: absolute;
                    right: -1px;
                    top: 0;
                    font-size: 20px !important;
                    color: #151515;
                    line-height: 44px;
                    height: 46px;
                    width: 40px;
                    text-align: center;
                    padding: 0; }
                    .mobile-menu .mean-bar .mean-nav > ul li a.mean-expand.mean-clicked {
                      line-height: 40px; }
                .mobile-menu .mean-bar .mean-nav > ul li span {
                  font-size: 13px;
                  display: block;
                  color: #151515;
                  font-weight: 600;
                  text-transform: uppercase;
                  line-height: 44px;
                  position: relative;
                  border-top: 1px solid rgba(0, 0, 0, 0.05);
                  border-bottom: none;
                  padding: 0 40px 0 20px;
                  margin: 0; }
                .mobile-menu .mean-bar .mean-nav > ul li .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu, .mobile-menu .mean-bar .mean-nav > ul li ul {
                  position: static;
                  background-color: rgba(0, 0, 0, 0.03);
                  margin: 0;
                  padding: 0 !important;
                  width: 100%;
                  -webkit-box-shadow: none;
                  box-shadow: none;
                  margin: 0;
                  display: none;
                  float: left;
                  width: 100%;
                  opacity: 1;
                  visibility: visible;
                  z-index: 1;
                  -webkit-transition: none;
                  -o-transition: none;
                  transition: none; }
                  .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li, .mobile-menu .mean-bar .mean-nav > ul li ul li {
                    padding: 0;
                    margin: 0;
                    -webkit-box-flex: 0;
                    -ms-flex: 0 0 100%;
                    flex: 0 0 100%;
                    border-right: 0px solid transparent;
                    width: 100%;
                    display: block !important;
                    float: left;
                    width: 100%; }
                    .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li a, .mobile-menu .mean-bar .mean-nav > ul li ul li a {
                      font-size: 11px;
                      display: block !important; }
                      .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li a::before, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li a::before, .mobile-menu .mean-bar .mean-nav > ul li ul li a::before {
                        display: none; }
                    .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li span, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li span, .mobile-menu .mean-bar .mean-nav > ul li ul li span {
                      font-size: 11px; }
                    .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li ul li ul {
                      background-color: rgba(0, 0, 0, 0.04); }
                      .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul li a, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li ul li ul li a {
                        border-top: 1px solid rgba(0, 0, 0, 0.05); }
                        .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li ul li a.mean-expand {
                          border-width: 0 1px;
                          border-style: solid;
                          border-color: rgba(0, 0, 0, 0.05); }
                      .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu ul, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul ul, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu ul, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul ul, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu ul, .mobile-menu .mean-bar .mean-nav > ul li ul li ul .sub-menu, .mobile-menu .mean-bar .mean-nav > ul li ul li ul ul {
                        background-color: rgba(0, 0, 0, 0.05); }
                        .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu ul li a, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul ul li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu ul li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul ul li a, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu ul li a, .mobile-menu .mean-bar .mean-nav > ul li ul li ul .sub-menu li a, .mobile-menu .mean-bar .mean-nav > ul li ul li ul ul li a {
                          border-top: 1px solid rgba(0, 0, 0, 0.05); }
                          .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li .sub-menu ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .sub-menu li ul ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li .sub-menu ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li .mega-menu li ul ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li .sub-menu ul li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li ul .sub-menu li a.mean-expand, .mobile-menu .mean-bar .mean-nav > ul li ul li ul ul li a.mean-expand {
                            border-width: 0 1px;
                            border-style: solid;
                            border-color: rgba(0, 0, 0, 0.05); }
                            ul{
                                list-style-type : none;
                            }
                            fix {
  overflow: hidden; }

.hidden {
  display: none; }

.clear {
  clear: both; }

.section, .main-wrapper {
  float: left;
  width: 100%; }

.container.container-1520 {
  max-width: 1520px; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .container.container-1520 {
      max-width: 1200px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .container.container-1520 {
      max-width: 960px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .container.container-1520 {
      max-width: 720px; } }
  @media only screen and (max-width: 767px) {
    .container.container-1520 {
      max-width: 540px; } }
  @media only screen and (max-width: 479px) {
    .container.container-1520 {
      max-width: 300px; } }

.col-lg-8.eight-col {
  max-width: 63%;
  -webkit-box-flex: 0;
  -ms-flex: 0 0 63%;
  flex: 0 0 63%; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .col-lg-8.eight-col {
      max-width: 100%;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
      flex: 0 0 100%; } }
  @media only screen and (max-width: 767px) {
    .col-lg-8.eight-col {
      max-width: 100%;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
      flex: 0 0 100%; } }

.col-lg-4.four-col {
  max-width: 37%;
  -webkit-box-flex: 0;
  -ms-flex: 0 0 37%;
  flex: 0 0 37%; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .col-lg-4.four-col {
      max-width: 100%;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
      flex: 0 0 100%; } }
  @media only screen and (max-width: 767px) {
    .col-lg-4.four-col {
      max-width: 100%;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
      flex: 0 0 100%; } }

@media (min-width: 1200px) {
  .container {
    max-width: 1200px; }
  .row-five-column > [class*="col-xl-"] {
    max-width: 20%;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 20%;
    flex: 0 0 20%; } }

@media only screen and (max-width: 575px) {
  .container {
    max-width: 450px; } }

@media only screen and (max-width: 479px) {
  .container {
    max-width: 300px; } }

.no-gutters {
  margin-left: 0;
  margin-right: 0; }
  .no-gutters > .col, .no-gutters > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
    margin: 0 !important; }

.inline-YTPlayer {
  max-width: none !important;
  width: 100%; }

.mbYTP_wrapper {
  z-index: -9 !important; }

/*-- 
    - Input Placeholder
-----------------------------------------*/
input:-moz-placeholder, textarea:-moz-placeholder {
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }

input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }

/*--
    - Background Color
------------------------------------------*/
.bg-white {
  background-color: #ffffff !important; }

.bg-gray {
  background-color: #f8f8f8 !important; }

.bg-dark {
  background-color: #252525 !important; }

.bg-theme {
  background-color: #061da4 !important; }

.bg-black {
  background-color: #081b1f !important; }

/*-- 
    - Tab Content & Pane Fix
------------------------------------------*/
.tab-content {
  width: 100%; }
  .tab-content .tab-pane {
    display: block;
    height: 0;
    max-width: 100%;
    visibility: hidden;
    overflow: hidden;
    opacity: 0; }
    .tab-content .tab-pane.active {
      height: auto;
      visibility: visible;
      opacity: 1;
      overflow: visible; }

/*-- 
    - Main Wrapper
------------------------------------------*/
/*-- 
    - Section Title
------------------------------------------*/
.section-title {
  margin-bottom: 30px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between; }
  @media only screen and (max-width: 767px) {
    .section-title {
      -ms-flex-wrap: wrap;
      flex-wrap: wrap; } }
  .section-title h2 {
    font-size: 40px;
    line-height: 45px;
    margin: 0; }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .section-title h2 {
        font-size: 34px;
        line-height: 40px; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .section-title h2 {
        font-size: 30px;
        line-height: 40px; } }
    @media only screen and (max-width: 767px) {
      .section-title h2 {
        font-size: 26px;
        line-height: 30px; } }
    .section-title h2 span.color-blue {
      color: #061da4; }
  @media only screen and (max-width: 767px) {
    .section-title ul {
      margin-top: 20px; } }
  .section-title ul li {
    display: inline-block;
    margin-right: 25px; }
    .section-title ul li:last-child {
      margin-right: 0; }
    .section-title ul li a {
      font-size: 16px;
      line-height: 28px;
      font-family: "Qanto";
      display: block; }
      .section-title ul li a:hover, .section-title ul li a.active {
        color: #061da4; }
  .section-title.text-center {
    text-align: center;
    background-position: top center; }
    .section-title.text-center p {
      margin-left: auto;
      margin-right: auto; }
  .section-title.text-left {
    text-align: left;
    background-position: top left; }
    .section-title.text-left p {
      margin-left: 0;
      margin-right: auto; }
  .section-title.text-right {
    text-align: right;
    background-position: top right; }
    .section-title.text-right p {
      margin-left: auto;
      margin-right: 0; }

/*-- 
    - Button
------------------------------------------*/
.df-btn {
  background-color: #061da4;
  color: #ffffff;
  font-size: 20px;
  line-height: 25px;
  height: 50px;
  font-weight: 400;
  font-family: "Qanto";
  padding: 15px 42px;
  text-transform: uppercase;
  border-radius: 0px;
  position: relative;
  -webkit-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s; }
  .df-btn:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: none; }
  .df-btn:hover {
    background-color: #f64140;
    color: #ffffff; }
  @media only screen and (max-width: 767px) {
    .df-btn {
      font-size: 14px;
      line-height: 30px;
      height: 45px;
      padding: 10px 25px; }
      .df-btn:hover::before {
        left: 6px;
        top: 6px; }
      .df-btn:hover::after {
        left: -6px;
        top: -6px; } }

/*-- 
    - Page Banner Section
------------------------------------------*/
.page-banner-section {
  margin-top: 130px;
  padding: 80px 0 90px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  position: relative;
  z-index: 1; }
  .page-banner-section::before {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    content: "";
    background-color: #000000;
    opacity: 0.75;
    z-index: -1; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .page-banner-section {
      margin-top: 122px;
      padding: 60px 0 70px; } }
  @media only screen and (max-width: 767px) {
    .page-banner-section {
      margin-top: 122px;
      padding: 40px 0 50px; } }
  @media only screen and (max-width: 575px) {
    .page-banner-section {
      margin-top: 163px;
      padding: 25px 0 35px; } }
  @media only screen and (max-width: 479px) {
    .page-banner-section {
      margin-top: 151px; } }

/*-- Page Banner --*/
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
  height: 560px;
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

/*Page Banner Two CSS*/
.page-banner-2 {
  width: 100%;
  height: 835px;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box !important;
  display: -ms-flexbox !important;
  display: flex !important;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  z-index: 1; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .page-banner-2 {
      height: 650px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .page-banner-2 {
      height: 550px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .page-banner-2 {
      height: 450px; } }
  @media only screen and (max-width: 767px) {
    .page-banner-2 {
      height: 600px; } }
  @media only screen and (max-width: 479px) {
    .page-banner-2 {
      height: 400px; } }

.page-content-2 {
  text-align: left; }
  .page-content-2 h1 {
    font-size: 100px;
    line-height: 90px;
    font-weight: 300;
    font-family: "Bauhaus 93";
    color: #ffffff;
    text-shadow: -6px 4px 1px #252525; }
    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .page-content-2 h1 {
        font-size: 90px; } }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .page-content-2 h1 {
        font-size: 80px;
        line-height: 80px; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .page-content-2 h1 {
        font-size: 50px;
        line-height: 50px; } }
    @media only screen and (max-width: 767px) {
      .page-content-2 h1 {
        font-size: 36px;
        line-height: 45px; } }
  .page-content-2 h3 {
    font-size: 40px;
    line-height: 90px;
    font-weight: 500;
    color: #ffffff;
    text-shadow: -4px 2px 1px #252525; }
    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .page-content-2 h3 {
        font-size: 36px;
        line-height: 50px; } }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .page-content-2 h3 {
        font-size: 34px;
        line-height: 46px; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .page-content-2 h3 {
        font-size: 28px;
        line-height: 36px; } }
    @media only screen and (max-width: 767px) {
      .page-content-2 h3 {
        font-size: 24px;
        line-height: 30px; } }
  .page-content-2 .btn {
    background-color: #ffffff;
    font-size: 20px;
    color: #151515;
    border-radius: 50px;
    margin-top: 30px; }

/*-- Page Banner Fornt Image --*/
.page-front-image {
  position: absolute;
  top: -290px;
  right: -230px; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .page-front-image {
      top: -35px;
      right: 45px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .page-front-image {
      top: -110px;
      right: -5px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .page-front-image {
      top: -110px;
      right: -5px; } }
  @media only screen and (max-width: 767px) {
    .page-front-image {
      position: static; } }
  .page-front-image img {
    max-width: none; }
    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .page-front-image img {
        width: 300px; } }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .page-front-image img {
        width: 300px; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .page-front-image img {
        width: 250px; } }
    @media only screen and (max-width: 767px) {
      .page-front-image img {
        width: 120px; } }

/*-- Page Breadcrumb --*/
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
</head>
<body>
    <div id="main-wrapper">
        <header class="header header-static bg-black header-sticky">
            <div class="default-header menu-right">
                <div class="container container-1520">
                    <div class="row">
                        
                        <!--Logo start-->
                        <div class="col-12 col-md-3 col-lg-3 order-md-1 order-lg-1 mt-20 mb-20">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                            </div>
                        </div>
                        <!--Logo end-->
                        
                        <!--Menu start-->
                        <div class="col-lg-6 col-12 order-md-3 order-lg-2 d-flex justify-content-center">
                            <nav class="main-menu menu-style-2">
                                <ul>
                                    <li><a href="index.html">Home</a>                                        
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li><a href="index-5.html">Home Five</a></li>
                                            <li><a href="index-landing.html">Home Landing</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="games.html">games</a>
                                        <ul class="sub-menu">
                                            <li><a href="games.html">Games</a></li>
                                            <li><a href="games-details.html">Games Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="video.html">Videos</a></li>
                                    <li><a href="forum.html">Forums</a>
                                        <ul class="sub-menu">
                                            <li><a href="forum.html">Forums</a></li>
                                            <li><a href="forum-create.html">Forums Create</a></li>
                                            <li><a href="forum-post.html">Forums Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-list.html">Blog List</a></li>
                                            <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                            <li><a href="single-blog.html">Single Blog</a></li>
                                            <li><a href="single-blog-left.html">Single Blog Left Sidebar</a></li>
                                            <li><a href="gallery.html">Gallery</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">REGISTER</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->
                        
                        <!--Header Right Wrap-->
                        <div class="col-12 col-md-9 order-md-2 order-lg-3 col-lg-3">
                            <div class="header-right-wrap">
                                <ul>
                                    <li><a href="login.html">LOGIN</a></li>
                                    <li><a href="register.html">REGISTER</a></li>
                                    <li class="header-search"><a class="header-search-toggle" href="#"><i class="icofont-search-2"></i></a>
                                        <div class="header-search-form">
                                            <form action="#">
                                                <input type="text" placeholder="Type and hit enter">
                                                <button><i class="icofont-search"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--Header Right Wrap-->
                        
                    </div>
                    
                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->
                    
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    
</body>
</html>
