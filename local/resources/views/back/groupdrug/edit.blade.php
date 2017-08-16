@extends('back.groupdrug.template')
@section('form')
    @include('back.partials.back', ['title' => link_to_route('groupdrug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['groupdrug.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
