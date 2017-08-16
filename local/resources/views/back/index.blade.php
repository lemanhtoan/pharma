@extends('back.template')

@section('main')

	@include('back.partials.entete', ['title' => 'Trang quản trị hệ thống', 'icone' => 'dashboard', 'fil' => 'Trang quản trị hệ thống'])

	<div class="row">

		@include('back/partials/pannel', ['color' => 'primary', 'icone' => 'envelope', 'nbr' => $nbrMessages, 'name' => 'Giao dịch', 'url' => 'transactions', 'total' => 'Giao dịch'])

		@include('back/partials/pannel', ['color' => 'green', 'icone' => 'user', 'nbr' => $nbrUsers, 'name' => 'Khách hàng', 'url' => 'customer', 'total' => 'Khách hàng'])

	</div>

@stop


