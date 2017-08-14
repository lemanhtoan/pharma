@extends('back.drug.template')
@section('form')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa thuốc
            </h1>
        </div>
    </div>

    @include('back.partials.back', ['title' => link_to_route('drug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['drug.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'files' => true]) !!}
@stop
