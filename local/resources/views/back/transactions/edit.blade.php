@extends('back.transactions.template')
@section('form')
    @include('back.partials.back', ['title' => link_to_route('transactions.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['transactions.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
