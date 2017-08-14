@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	<div class="col-sm-12 form-no-mar ">
		@yield('form')
        <div class="row">


            <div class ="col-md-6">
                <div class="form-group">
                    {!! Form::label('Mã thuốc') !!} <em>*</em>
                    {!! Form::text('code', null, array('required', 'class'=>'form-control','placeholder'=>'Mã thuốc')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Tên thuốc') !!} <em>*</em>
                    {!! Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên thuốc')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Nhóm thuốc') !!} <em>*</em>
                    <select class="form-control" name="group_drug_id" required>
                        <?php foreach($groupdrug as $gd) { ?>
                        <option <?php if(isset($post['group_drug_id']) && $post['group_drug_id'] == $gd['id']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['short_name']?></option>
                         <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('Hoạt chất chính') !!}
                    {!! Form::text('activeIngredient', null, array('class'=>'form-control','placeholder'=>'Hoạt chất chính')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Hàm lượng') !!}
                    {!! Form::text('content', null, array('class'=>'form-control','placeholder'=>'Hàm lượng')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Dạng bào chế') !!} <em>*</em>
                    <select class="form-control" name="design" required>
                        <?php foreach($drugType as $gd) { ?>
                        <option <?php if(isset($post['design']) && $post['design'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
                        <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('Quy cách đóng gói') !!} <em>*</em>
                    {!! Form::text('package', null, array('required', 'class'=>'form-control','placeholder'=>'Quy cách đóng gói')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Đơn vị buôn') !!} <em>*</em>
                    {!! Form::text('donvibuon', null, array('required', 'class'=>'form-control','placeholder'=>'Đơn vị buôn')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Đơn vị lẻ') !!} <em>*</em>
                    {!! Form::text('donvile', null, array('required', 'class'=>'form-control','placeholder'=>'Đơn vị lẻ')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Hệ số quy đổi') !!} <em>*</em>
                    {!! Form::text('hesoquydoi', null, array('required', 'class'=>'form-control','placeholder'=>'Hệ số quy đổi')) !!}
                </div>
            </div>

            <div class ="col-md-6">
                <div class="form-group">
                    {!! Form::label('Số đăng ký') !!}
                    {!! Form::text('registerNumber', null, array('class'=>'form-control','placeholder'=>'Số đăng ký')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Công ty sản xuất') !!} <em>*</em>
                    {!! Form::text('produceCompany', null, array('required', 'class'=>'form-control','placeholder'=>'Công ty sản xuất')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Nước sản xuất') !!}
                    <select class="form-control" name="produceCountry" required>
                        <?php foreach($country as $gd) { ?>
                        <option <?php if(isset($post['produceCountry']) && $post['produceCountry'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
                        <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('Công ty đăng ký') !!}
                    {!! Form::text('registerCompany', null, array('class'=>'form-control','placeholder'=>'Công ty đăng ký')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Nước đăng ký') !!}
                    {!! Form::text('registerCountry', null, array('class'=>'form-control','placeholder'=>'Nước đăng ký')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Ghi chú') !!}
                    {!! Form::text('note', null, array('class'=>'form-control','placeholder'=>'Ghi chú')) !!}
                </div>

                <div class="form-group">
                    <label for="input-id">Ảnh thuốc</label>
                    <?php if(isset($post)):?>
                        <?php $stt=0; ?>
                        <div class="row" style="margin-bottom: 10px;">
                            @foreach($post->drug_img as $row)
                                <?php $stt++; ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    Ảnh cũ: {!!$stt!!}<br><img src="{!!url(\Config::get('constants.pathDrugImg').$row->url)!!}" height="65">
                                </div>
                            @endforeach
                        </div>
                    <?php endif;?>

                    <div class="row">
                        @for( $i=1; $i<=6; $i++)
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                Hình ảnh {!!$i!!} : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}"   id="inputtxtdetail_img" class="form-control">
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Trạng thái') !!} <br>
                    <input id="1" type="radio" value="1" name="status" required <?php if(isset($post['status']) && $post['status'] == '1') {echo 'checked';} else {echo '';}?>>
                    <label for="1">Hoạt động</label>
                    <br>
                    <input id="0" type="radio" value="0" name="status" required <?php if(isset($post['status']) && $post['status'] == '0') {echo 'checked';} else {echo '';}?>>
                    <label for="0">Khóa</label>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-1" style="margin-right: 15px">
                    {!! Form::submit('Cập nhật') !!}
                </div>
                <div class="col-md-1">
                    <a href="{!! route('drug.index') !!}" class="btn btn-default">Hủy</a>
                </div>
            </div>
        </div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')

@stop