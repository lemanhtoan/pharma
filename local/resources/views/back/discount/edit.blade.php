@extends('back.discount.template')
@section('form')
    @include('back.partials.back', ['title' => link_to_route('discount.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['discount.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
