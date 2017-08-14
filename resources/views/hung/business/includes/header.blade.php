<meta charset="utf-8"/>
<title>
@if(isset($title))
	{!! $title !!}
@endif

DeliverMe | Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/uniform.default.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/select2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/components-rounded.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/plugins.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/default.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/custom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web/css/plugins/layout.css') }}" rel="stylesheet" type="text/css">
@yield('custom css')
<link rel="shortcut icon" href="{{ asset('web/login/image/icons.png') }}"/>