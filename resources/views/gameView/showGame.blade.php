@extends('layouts.app')
@section('content')


<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
        body {
            color: #1a202c;
            text-align: left;
            background-color: #071224;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
        .servive-block-dark-blue {
  background: #4765a0;
}
.rating {
    float:left;
    border:none;
}
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0, 0, 0, 0);
}
.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:0.8;
    color:#ddd;
}
.rating:not(:checked) > label:before {
    content:'★ ';
}
.rating > input:checked ~ label {
    color: #f70;
}
.rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
    color: gold;
}
.rating > input:checked + label:hover, .rating > input:checked + label:hover ~ label, .rating > input:checked ~ label:hover, .rating > input:checked ~ label:hover ~ label, .rating > label:hover ~ input:checked ~ label {
    color: #ea0;
}
.rating > label:active {
    position:relative;
}

.p-15px {
    padding: 15px;
}
.border-color-gray {
    border-color: #f2f3fa;
}
.border-all-1 {
    border: 1px solid;
}
.hover-top {
    position: relative;
    top: 0;
}
.m-15px-tb {
    margin-top: 15px;
    margin-bottom: 15px;
}
.overlay-link {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border: 0;
}
.border-radius-50 {
    border-radius: 50%;
}
.icon-50 {
    width: 50px;
    height: 50px;
    text-align: center;
    font-size: 21px;
}
.white-color {
    color: #ffffff;
}
.theme-bg {
    background-color: #0050d8;
}
.icon-50 i.number {
    font-style: normal;
}
.icon-50 i {
    line-height: 50px;
}
.p-20px-l {
    padding-left: 20px;
}
.p-10px-lr {
    padding-left: 10px;
    padding-right: 10px;
}
.p-0px-tb {
    padding-top: 0px;
    padding-bottom: 0px;
}
.border-radius-15 {
    border-radius: 15px;
}
.white-color {
    color: #ffffff;
}
.theme2nd-bg {
    background-color: #53d267;
}
.m-0px {
    margin: 0px;
}
.font-small {
    font-size: .75rem;
    line-height: 1rem;
}

.green-bg-alt {
  background-color: rgba(17, 226, 121, 0.1);
}

.green-bg {
  background-color: #11e279;
}

.green-after:after {
  background-color: #11e279;
}

.green-before:before {
  background-color: #11e279;
}

.green-color-alt {
  color: rgba(17, 226, 121, 0.65);
}

.green-color {
  color: #11e279;
}

.blue-bg-alt {
  background-color: rgba(21, 178, 236, 0.1);
}

.blue-bg {
  background-color: #15b2ec;
}

.blue-after:after {
  background-color: #15b2ec;
}

.blue-before:before {
  background-color: #15b2ec;
}

.blue-color-alt {
  color: rgba(21, 178, 236, 0.65);
}

.blue-color {
  color: #15b2ec;
}

.pink-bg-alt {
  background-color: rgba(241, 38, 153, 0.1);
}

.pink-bg {
  background-color: #f12699;
}

.pink-after:after {
  background-color: #f12699;
}

.pink-before:before {
  background-color: #f12699;
}

.pink-color-alt {
  color: rgba(241, 38, 153, 0.65);
}

.pink-color {
  color: #f12699;
}

.body-bg-alt {
  background-color: rgba(113, 128, 150, 0.1);
}

.body-bg {
  background-color: #718096;
}

.body-after:after {
  background-color: #718096;
}

.body-before:before {
  background-color: #718096;
}

.body-color-alt {
  color: rgba(113, 128, 150, 0.65);
}

.body-color {
  color: #718096;
}

.white-color-light {
  color: rgba(255, 255, 255, 0.65);
}

.bg-transparent {
  background-color: transparent;
}

.theme-g-bg {
  background: linear-gradient(to right, #0050d8, #002a72);
}

.dark-g-bg {
  background: linear-gradient(50deg, #273444 0, #272b44 100%);
}
.yellow-bg {
    background-color: #ffbe3d;
}
.border-radius-50 {
    border-radius: 50%;
}
.icon-50 {
    width: 50px;
    height: 50px;
    text-align: center;
    font-size: 21px;
}

.box-shadow-only-hover:hover {
  box-shadow: 0 1.5rem 4rem rgba(22, 28, 45, 0.1);
}
.border-color-gray {
    border-color: #f2f3fa !important;
}
.border-all-1 {
    border: 1px solid;
}
.rating-block{
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.toast-message{
  color : black;
}

    </style>
</head>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<body>
    @livewire('game.show-game',['game' => $game,'dataBar' =>$dataBar,'star_rating' => $star_rating])

</body>
<script type="text/javascript">
  $(function () {
      $('[data-toggle="popover"]').popover({
          html: true,
          sanitize: false
      });
  })
  var cw = window.rating1.clientWidth; // save original 100% pixel width

  function rating(stars) {
      window.rating1.style.width = Math.round(100 * (stars / 5)) + '%';
  }
  rating({{$star_rating}});
  $('[data-toggle=confirmation]').confirmation({
rootSelector: '[data-toggle=confirmation]',
// other options
});
</script>

@endsection