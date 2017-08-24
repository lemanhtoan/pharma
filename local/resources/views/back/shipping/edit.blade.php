@extends('back.shipping.template')
@section('form')
    @include('back.partials.back', ['title' => link_to_route('shipping.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['shipping.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
