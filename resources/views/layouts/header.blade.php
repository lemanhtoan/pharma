<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>5Pharma</title>
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/styles.css') !!}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Owl Carousel Assets -->
  {!! HTML::style('owl-carousel/owl.carousel.css') !!}
  {!! HTML::style('owl-carousel/owl.theme.css') !!}

  {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
  {!! HTML::script('js/bootstrap.min.js') !!}
  {!! HTML::script('owl-carousel/owl.carousel.min.js') !!}

</head>
<body>
<header>
  <div class="container">
    <div class="row">
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

    <div class="row">
      <ul class="main-menu">
        <li {!! classActivePath('/') !!}><a href="{!! url('/') !!}">Đặt hàng</a></li>
        <li {!! classActivePath('history') !!}><a href="{!! url('history') !!}">Lịch sử</a></li>
        <li {!! classActivePath('quy-dinh') !!}><a href="{!! url('quy-dinh') !!}">Quy định</a></li>
        <li {!! classActivePath('ho-tro') !!}><a href="{!! url('ho-tro') !!}">Hỗ trợ</a></li>
      </ul>
    </div>
  </div>
</header>
