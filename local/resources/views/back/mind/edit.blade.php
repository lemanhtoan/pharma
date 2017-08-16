@extends('back.mind.template')
@section('form')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa phiên giao dịch
            </h1>
        </div>
    </div>
    @include('back.partials.back', ['title' => link_to_route('mind.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['mind.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
