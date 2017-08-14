@extends('back.pharmacies.template')
@section('form')
    @include('back.partials.back', ['title' => link_to_route('pharmacies.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['pharmacies.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
