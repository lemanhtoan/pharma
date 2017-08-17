<?php $__env->startSection('head'); ?>

	<?php echo HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

	<div class="col-sm-12 form-no-mar ">
		<?php echo $__env->yieldContent('form'); ?>
        <div class="row">


            <div class ="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('Mã thuốc'); ?> <em>*</em>
                    <?php echo Form::text('code', null, array('required', 'class'=>'form-control','placeholder'=>'Mã thuốc')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Tên thuốc'); ?> <em>*</em>
                    <?php echo Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên thuốc')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Nhóm thuốc'); ?> <em>*</em>
                    <select class="form-control" name="group_drug_id" required>
                        <?php foreach($groupdrug as $gd) { ?>
                        <option <?php if(isset($post['group_drug_id']) && $post['group_drug_id'] == $gd['id']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['short_name']?></option>
                         <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <?php echo Form::label('Hoạt chất chính'); ?>

                    <?php echo Form::text('activeIngredient', null, array('class'=>'form-control','placeholder'=>'Hoạt chất chính')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Hàm lượng'); ?>

                    <?php echo Form::text('content', null, array('class'=>'form-control','placeholder'=>'Hàm lượng')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Dạng bào chế'); ?> <em>*</em>
                    <select class="form-control" name="design" required>
                        <?php foreach($drugType as $gd) { ?>
                        <option <?php if(isset($post['design']) && $post['design'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
                        <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <?php echo Form::label('Quy cách đóng gói'); ?> <em>*</em>
                    <?php echo Form::text('package', null, array('required', 'class'=>'form-control','placeholder'=>'Quy cách đóng gói')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Đơn vị buôn'); ?> <em>*</em>
                    <?php echo Form::text('donvibuon', null, array('required', 'class'=>'form-control','placeholder'=>'Đơn vị buôn')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Đơn vị lẻ'); ?> <em>*</em>
                    <?php echo Form::text('donvile', null, array('required', 'class'=>'form-control','placeholder'=>'Đơn vị lẻ')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Hệ số quy đổi'); ?> <em>*</em>
                    <?php echo Form::text('hesoquydoi', null, array('required', 'class'=>'form-control','placeholder'=>'Hệ số quy đổi')); ?>

                </div>
            </div>

            <div class ="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('Số đăng ký'); ?>

                    <?php echo Form::text('registerNumber', null, array('class'=>'form-control','placeholder'=>'Số đăng ký')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Công ty sản xuất'); ?> <em>*</em>
                    <?php echo Form::text('produceCompany', null, array('required', 'class'=>'form-control','placeholder'=>'Công ty sản xuất')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Nước sản xuất'); ?>

                    <select class="form-control" name="produceCountry" required>
                        <?php foreach($country as $gd) { ?>
                        <option <?php if(isset($post['produceCountry']) && $post['produceCountry'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
                        <?php   }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <?php echo Form::label('Công ty đăng ký'); ?>

                    <?php echo Form::text('registerCompany', null, array('class'=>'form-control','placeholder'=>'Công ty đăng ký')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Nước đăng ký'); ?>

                    <?php echo Form::text('registerCountry', null, array('class'=>'form-control','placeholder'=>'Nước đăng ký')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('Ghi chú'); ?>

                    <?php echo Form::text('note', null, array('class'=>'form-control','placeholder'=>'Ghi chú')); ?>

                </div>

                <div class="form-group">
                    <label for="input-id">Ảnh thuốc</label>
                    <?php if(isset($post)):?>
                        <?php $stt=0; ?>
                        <div class="row" style="margin-bottom: 10px;">
                            <?php foreach($post->drug_img as $row): ?>
                                <?php $stt++; ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    Ảnh cũ: <?php echo $stt; ?><br><img src="<?php echo url(\Config::get('constants.pathDrugImg').$row->url); ?>" height="65">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;?>

                    <div class="row">
                        <?php for( $i=1; $i<=6; $i++): ?>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                Hình ảnh <?php echo $i; ?> : <input type="file" name="txtdetail_img[]" value="<?php echo e(old('txtdetail_img[]')); ?>"   id="inputtxtdetail_img" class="form-control">
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('Trạng thái'); ?> <br>
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
                    <?php echo Form::submit('Cập nhật'); ?>

                </div>
                <div class="col-md-1">
                    <a href="<?php echo route('drug.index'); ?>" class="btn btn-default">Hủy</a>
                </div>
            </div>
        </div>

		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>