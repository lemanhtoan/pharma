@extends('back.mind.template')
@section('form')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa phiên giao dịch
            </h1>


            <form action="{{url('minds/export')}}" enctype="multipart/form-data">
                <input type="hidden" name="mindId" value="<?php echo $post->id;?>">
                <button style="margin-bottom: 20px" class="btn btn-success" type="submit">Xuất dữ liệu hiện tại</button>
            </form>


        </div>
    </div>
    @include('back.partials.back', ['title' => link_to_route('mind.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
    {!! Form::model($post, ['route' => ['mind.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'enctype' => 'multipart/form-data']) !!}
@stop
