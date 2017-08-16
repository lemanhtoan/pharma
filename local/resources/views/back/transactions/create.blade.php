@extends('back.transactions.template')

@section('form')
	{!! Form::open(['url' => 'transactions', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
@stop
