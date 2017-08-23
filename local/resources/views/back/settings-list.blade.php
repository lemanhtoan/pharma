@extends('back.template')
@section('main')

    @include('back.partials.entete', ['title' => 'Cấu hình khác' ])

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif (Session()->has('flash_level'))
        <div class="alert alert-success">
            <ul>
                {!! Session::get('flash_massage') !!}
            </ul>
        </div>
    @endif

    <div class="settings panel-body" style="float: left;width: 100%; padding: 20px;">
        <div class="row">
            <form action="settLogo" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group"> <?php $dataLogoGet = $dataLogo[0]['content']; ?>
                    Ảnh hiện tại: <br><?php if ( isset($dataLogoGet)) {?><img src="{!!url('uploads/commons/'.$dataLogoGet)!!}" alt="" width="120"> <?php } ?>
                </div>
                <div class="form-group">
                    Logo: <input type="file" name="logo"   class="form-control">
                </div>
                <input type="submit" name="btnLogo" class="btn btn-primary" value="Lưu logo" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settHotline" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <?php $dataHotline = $dataHotline[0]['content']; ?>
                        Hotline : <input type="text" name="hotline" class="form-control" value="<?php if ( isset($dataHotline)) { echo $dataHotline;} ?>">
                </div>
                <input type="submit" name="btnDiachi" class="btn btn-primary" value="Lưu hotline" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settMuaho" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <?php $dataKMGet = $dataKM[0]['content']; ?>
                    Phí mua hộ : <input type="text" name="muaho" class="form-control" value="<?php if ( isset($dataKMGet)) { echo $dataKMGet;} ?>">
                </div>
                <input type="submit" name="btnHotline" class="btn btn-primary" value="Lưu mua hộ" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settVanchuyen" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <?php $dataVCGet = $dataVC[0]['content']; ?>
                    Phí vận chuyển : <input type="text" name="vanchuyen" class="form-control" value="<?php if ( isset($dataVCGet)) { echo $dataVCGet;} ?>">
                </div>
                <input type="submit" name="btnHotline" class="btn btn-primary" value="Lưu vận chuyển" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settKMVC" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <?php $dataKMVC = $dataKMVC[0]['content']; ?>
                    Phí KM vận chuyển : <input type="text" name="kmvanchuyen" class="form-control" value="<?php if ( isset($dataKMVC)) { echo $dataKMVC;} ?>">
                </div>
                <input type="submit" name="btnHotline" class="btn btn-primary" value="Lưu KM vận chuyển" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settMinDiscount" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <?php $dataDiscount = $dataDiscount[0]['content']; ?>
                    Chiết khẩu nhỏ nhất : <input type="text" name="mindiscount" class="form-control" value="<?php if ( isset($dataDiscount)) { echo $dataDiscount;} ?>">
                </div>
                <input type="submit" name="btnHotline" class="btn btn-primary" value="Lưu Chiết khẩu nhỏ nhất" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settQD" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    Quy định:
                    <textarea name="quydinh" id="quydinh" class="form-control" rows="4"  >
										<?php $dataQD = $dataQD[0]['content']; ?>
                        <?php if ( isset($dataQD)) {echo $dataQD;} ?>
									</textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('quydinh',{
                            language:'vi',
                            filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>
                </div>
                <input type="submit" name="btnFooter" class="btn btn-primary" value="Lưu quy định" class="button" />
            </form>
        </div>

        <div class="row">
            <form action="settHT" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    Hỗ trợ:
                    <textarea name="hotro" id="hotro" class="form-control" rows="4"  >
										<?php $dataHT = $dataHT[0]['content']; ?>
                        <?php if ( isset($dataHT)) {echo $dataHT;} ?>
									</textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('hotro',{
                            language:'vi',
                            filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>
                </div>
                <input type="submit" name="btnFooter" class="btn btn-primary" value="Lưu hỗ trợ" class="button" />
            </form>
        </div>

    </div>

    <style>
        .settings .row {
            margin: 10px 0;
            border-bottom: 2px dotted #dadada;
            padding: 10px 0;
        }
    </style>
@stop
