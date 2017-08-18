<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>5Pharma</title>
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/styles.css') !!}
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{!!url('/images/favicon.png')!!}" width="50" >
  <!-- Owl Carousel Assets -->
  {!! HTML::style('owl-carousel/owl.carousel.css') !!}
  {!! HTML::style('owl-carousel/owl.theme.css') !!}

  {!! HTML::style('http://www.jasny.net/bootstrap/dist/css/jasny-bootstrap.min.css') !!}

  {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
  {!! HTML::script('js/bootstrap.min.js') !!}
  {!! HTML::script('owl-carousel/owl.carousel.min.js') !!}
  {!! HTML::script('http://www.jasny.net/bootstrap/dist/js/jasny-bootstrap.min.js') !!}

</head>
<body>
<header>
  <div class="container">
    <div class="row hidden-xs hidden-sm">
      <div class="col-md-6">
        <h1><a href="{!! url('/') !!}"><img class="logo" src="{!!url('/images/logo.png')!!}" align="logo" /></a></h1>
      </div>
      <div class="col-md-6">
        <div class="tr-line tr-1 pull-right">
          <span>Hotline: 094.234.6095</span>
        </div>
        <div class="tr-line tr-2 pull-right">
          <?php if (Auth::check()) $user = Auth::user()->id;
            if ( !Auth::check() ) { ?>
              <a href="{!! url('auth/login') !!}">Đăng nhập</a>
          <?php } else { ?>
            <a href="{!! url('profile') !!}">Tài khoản</a>
            <span>|</span>
            <a href="{!! url('auth/logout') !!}">Đăng xuất</a>
          <?php } ?>

        </div>
        <div class="tr-line tr-3 pull-right">
          <div class="input-group tsearch">
            <input type="text" class="form-control"  placeholder="Tìm kiếm..." >
            <span class="input-group-addon">
               <button type="submit"> <span class="glyphicon glyphicon-search"></span></button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="row  hidden-xs hidden-sm">
      <ul class="main-menu">
        <li {!! classActivePath('/') !!}><a href="{!! url('/') !!}">Đặt hàng</a></li>
        <li {!! classActivePath('history') !!}><a href="{!! url('history') !!}">Lịch sử</a></li>
        <li {!! classActivePath('quy-dinh') !!}><a href="{!! url('quy-dinh') !!}">Quy định</a></li>
        <li {!! classActivePath('ho-tro') !!}><a href="{!! url('ho-tro') !!}">Hỗ trợ</a></li>
      </ul>
    </div>

    <!-- menu mobile -->
    <div class="mb-nav">
      <div class="navmenu navmenu-default navmenu-fixed-left">
        <a href="{!! url('/') !!}"><img class="navmenu-brand logo logo-mb" src="{!!url('/images/logo.png')!!}" align="logo" /></a>
        <ul class="nav navmenu-nav">
          <li {!! classActivePath('/') !!}><a href="{!! url('/') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_03.png')!!}" />Đặt hàng</a></li>
          <li {!! classActivePath('history') !!}><a href="{!! url('history') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_07.png')!!}" />Lịch sử</a></li>
          <li {!! classActivePath('quy-dinh') !!}><a href="{!! url('quy-dinh') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_11.png')!!}" />Quy định</a></li>
          <li {!! classActivePath('ho-tro') !!}><a href="{!! url('ho-tro') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_09.png')!!}" />Hỗ trợ</a></li>
          <li {!! classActivePath('profile') !!}><a href="{!! url('profile') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_13.png')!!}" />Tài khoản</a></li>
          <li {!! classActivePath('auth/logout') !!}><a href="{!! url('auth/logout') !!}"><img class="icon-mb" src="{!!url('/images/menu_left_15.png')!!}" />Đăng xuất</a></li>
        </ul>
      </div>

      <div class="canvas">
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="col-item-3">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="col-item-6">
            <a href="{!! url('/') !!}"><img class="logo logo-mb" src="{!!url('/images/logo-mb.png')!!}" align="logo" /></a>
          </div>
          <div class="col-item-3">
            <?php if (Auth::check()) $user = Auth::user()->id;
            if ( !Auth::check() ) { ?>
            <a href="{!! url('auth/login') !!}"><img class="icon-mb" src="{!!url('/images/bill_1_03.png')!!}" /></a>
            <?php } else { ?>
            <a href="{!! url('profile') !!}"><img class="icon-mb" src="{!!url('/images/bill_1_03.png')!!}" /></a>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>
    <!-- menu mobile -->

  </div>


</header>


<style>

  .logo-mb {
    width: 50px;
    text-align: center;
    padding-top: 6px;
  }
  .navmenu-fixed-left.in .logo-mb {
    width: 100px;
    margin-left: 100px;
  }
  .navmenu-fixed-left.in .navmenu-nav {
    color: #fff;
    font-weight: bold;
  }
  .navmenu-fixed-left.in a {
    color: #fff !important;
  }
  .navmenu-fixed-left.in li {
    width: 96%;
    margin-left: 2%;
    cursor: pointer;
    border-bottom: 1px solid #d0d0d0;
  }
  .navmenu-fixed-left.in li:last-child {
    border-bottom: none;
  }
  .navmenu-fixed-left.in .icon-mb {
    width: 30px;
    margin-right: 15px;
  }
  .navmenu-fixed-left.in {
    background: #17be9b;
    border-color: #17be9b;
  }
  .col-item-3 {
    float: left;
    width: 25%;
  }

  .col-item-6 {
    float: left;
    width: 50%;
    text-align: center;
  }

  .col-item-3 img.icon-mb {
    float: right;
    margin-right: 15px;
    padding: 25px 0 10px;
    width: 30px;
  }
  .navbar-fixed-top {
    height: 76px;
    background: #17be9b;
    overflow: hidden;
    border-color: #17be9b;
  }
  .navbar-fixed-top .navbar-toggle, .navbar-fixed-top .navbar-toggle:hover {
    border-color: #17be9b;
    background: none;
    padding: 20px 10px;
  }
  .navbar-fixed-top .navbar-toggle .icon-bar {
    background-color: #fff;
    width: 25px;
    height: 3px;
  }
  .navbar-toggle {
    float: left;
    margin-left: 15px;
  }

  .navmenu-fixed-left {
    display: none;
  }
  .navmenu-fixed-left.in {
    display: block;
  }
  .navmenu {
    z-index: 1;
  }

  .canvas {
    position: relative;
    left: 0;
    z-index: 2;
    min-height: 100%;
    padding: 50px 0 0 0;
    background: #fff;
  }

  @media (min-width: 0) {
    .navbar-toggle {
      display: block; /* force showing the toggle */
    }
  }
  @media (max-width: 767px) {
    .navmenu-default .navmenu-nav>.active>a {
      background-color: #1bdeb5;
    }
    .main-content {
      margin-top: 35px;
    }
    body {
      background: #f1f5f7;
    }
    .profile-form {
      width: 100% !important;
    }
    .profile-form .inp-password {
      padding-left: 0px !important;
      width: calc(100% - 30px);
    }
    div img.icon-clear {
      height: 34px !important;
    }
    .profile-form .btn-continue {
      width: calc(100% - 20px);
    }
    .modal-col-1 {
      width: 100%;
    }
    .modal-col-2 {
      width: 100%;
    }
    #detailDrugModal .modal-dialog {
      top: 10%;
    }
    #detailDrugModal .modal-body{
      min-height: 490px;
    }
    div.box-wd h4 {
      font-size: 16px;
      padding: 3px 15px;
    }
    .list-products ul.products li {
      padding: 10px;
    }
    .box-1-column .row {
      /*margin-left: 0;
      margin-right: 0;*/
    }
    .row.bg-padding {
      background: #fff;
      padding: 0 5px;
      box-shadow: 1px 2px 4px #dadada;
    }
    h2.title-main {
      font-size: 20px;
    }
    h2.title-main img {
      width: 30px;
    }
    .row-top .col-md-4 {
      padding-right: 0;
    }
    div.box-green, div.box-wd {
      margin-bottom: 10px;
    }
    .left-time {
      text-align: center;
    }
    #timeExpire {
      padding-left:16%;
    }
    #mindModal #timeExpire {
      padding-left:0;
    }
      #mindModal .modal-box {
      width: 100%;
        padding: 5px;
     }
      #mindModal .box-count {
        width: 45px;
      }
    #mindModal .box-second {
      width: 80px;
    }
    span.top-sp-1 {
      font-size: 18px;
      padding: 6px ;
    }
    #mindModal  h4.modal-title {
      font-size: 17px;
    }
    .addHeight {
      min-height: 250px !important;
    }
    .table-cart img.show-detail {
      width: 100%;
      max-width: 100%;
    }
    .table-cart tbody tr td {
      text-align: left;
    }
  }
  @media (min-width: 992px) {
    .mb-nav {
      display: none;
    }
   
  }

</style>
