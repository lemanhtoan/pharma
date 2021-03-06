<?php $__env->startSection('head'); ?>

	<?php echo HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css'); ?>


	<?php echo HTML::style('css/bootstrap-datetimepicker.min.css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

	<div class="col-sm-12 form-no-mar">
		<?php echo $__env->yieldContent('form'); ?>
		<div class="form-group">
			<?php echo Form::label('Tên phiên giao dịch'); ?> <em>*</em>
			<?php echo Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'- Tên phiên giao dịch (bắt buộc)-')); ?>

		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('KM tối đa cho nhóm KH 1'); ?> <em>*</em>
					<?php echo Form::text('discount_cg1', null, array('required', 'class'=>'form-control','placeholder'=>'KM tối đa cho nhóm KH 1')); ?>

				</div>

				<div class="form-group">
					<?php echo Form::label('KM tối đa cho nhóm KH 2'); ?> <em>*</em>
					<?php echo Form::text('discount_cg2', null, array('required', 'class'=>'form-control','placeholder'=>'KM tối đa cho nhóm KH 2')); ?>

				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('Bắt đầu'); ?> <em>*</em>
					<div id="start_time" class="input-group input-append date">
						<input value="<?php if(isset($post->start_time)) {echo $post->start_time;}else{echo '';} ?>" class="form-control" required data-format="yyyy-MM-dd hh:mm:ss" type="text" name="start_time"/>
					<span class="add-on">
					  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
					  </i>
					</span>
					</div>
				</div>

				<div class="form-group">
					<?php echo Form::label('Kết thúc'); ?> <em>*</em>
					<div id="end_time" class="input-group input-append date">
						<input value="<?php if(isset($post->end_time)) {echo $post->end_time;}else{echo '';} ?>" class="form-control" required data-format="yyyy-MM-dd hh:mm:ss" type="text" name="end_time"/>
					<span class="add-on">
					  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
					  </i>
					</span>
					</div>
				</div>
			</div>
		</div>


		<div class="form-group">
			<?php echo Form::label('Thông báo của phiên'); ?>

			<?php echo Form::text('note', null, array('class'=>'form-control','placeholder'=>'Thông báo của phiên')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Trạng thái'); ?> <br>
			<input id="1" type="radio" value="1" name="status" required <?php if(isset($post['status']) && $post['status'] == '1') {echo 'checked';} else {echo '';}?>>
			<label for="1">Hoạt động</label>
			<br>
			<input id="0" type="radio" value="0" name="status" required <?php if(isset($post['status']) && $post['status'] == '0') {echo 'checked';} else {echo '';}?>>
			<label for="0">Khóa</label>
		</div>


		<!-- -->
		<div class="form-group">
			<h4>Danh sách thuốc trong phiên</h4>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered" id="tbl">
						<tr>
							<th>#</th>
							<th>Tên thuốc</th>
							<th>Giá gốc</th>
							<th>Giá KM</th>
							<th>Giới hạn KM</th>
							<th>Giới hạn Đặt hàng</th>
							<th>Ghi chú</th>
							<th  style="width:150px;">Hành động</th>
						</tr>
					</table>
				</div>
			</div>
		</div>

        <div class="form-group">
            <input type="button" class="btn btn-default" onclick="addRow();" name="btnTicket" id="btnTicket" value="+" />
        </div>
		<!-- -->

		<div class="form-group">
			<div class="col-md-1" style="padding-left: 0; margin-right: 10px">
				<?php echo Form::submit('Cập nhật'); ?>

			</div>
			<div class="col-md-1">
				<a href="<?php echo route('mind.index'); ?>" class="btn btn-default">Hủy</a>
			</div>
		</div>

		<?php echo Form::close(); ?>


        <?php if(isset($post)): $arrDataDrug = array();?>
        <?php foreach($post->mind_drugs as $index => $row): ?>
            <?php $arrDataDrug[$index]['id'] = $row->id; ?>
            <?php $arrDataDrug[$index]['mind_id'] = $row->mind_id; ?>
            <?php $arrDataDrug[$index]['drug_id'] = $row->drug_id; ?>
            <?php $arrDataDrug[$index]['drug_price'] = $row->drug_price; ?>
            <?php $arrDataDrug[$index]['drug_special_price'] = $row->drug_special_price; ?>
            <?php $arrDataDrug[$index]['max_discount_qty'] = $row->max_discount_qty; ?>
            <?php $arrDataDrug[$index]['max_qty'] = $row->max_qty; ?>
            <?php $arrDataDrug[$index]['note'] = $row->note; ?>
        <?php endforeach; ?>
        <?php //echo "<pre>"; var_dump($arrDataDrug);?>
        <?php endif;?>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php echo HTML::script('js/bootstrap-datetimepicker.min.js'); ?>


<script type="text/javascript">
	$('#start_time, #end_time').datetimepicker({});
</script>

<?php $arrKeys = array(); $arrValues = array();  foreach($drugs as $gd) { ?>
    <?php
        $arrKeys[] = $gd['id'];
        $arrValues[] = $gd['name'];
    ?>
<?php   }  ?>
<?php $arrDrugs= array_combine($arrKeys, $arrValues); ?>

<?php if(isset($post)){ ?>
<?php } else { $arrDataDrug=array(); } ?>

<script>
function initEdit() {
    addRowEdit();
}
initEdit();
function setDataRow(rowcount, drugId, drugPrice, drugSpecialPrice, drugQtyMaxDiscount, drugQtyMax, drugNote, mind_drug_id )
{
   // console.log(rowcount, drugId, drugPrice, drugSpecialPrice, drugQtyMaxDiscount, drugQtyMax, drugNote);
    /*var tblRow = '' +
        '<tr id="row' + rowcount + '">' +
        '<td>' +
        '<label id="lblID' + rowcount + '">' + rowcount + '</label>' +
        '</td> ' +
        '<td>' +
        '<select class="form-control txtTicketNo" db="'+drugId+'" style="width: 100px" name="drug_id[]" required id="txtTicketNo' + rowcount + '" >' +

        + '</select>' +
        '</td>' +
        '<td> ' +
        '<input type="text" class="form-control" value="'+drugPrice+'" placeholder="Giá gốc" name="drugPrice[]" required id="drugPrice' + rowcount + '" />' +
        '</td>' +
        '<td> ' +
        '<input type="text" class="form-control" value="'+drugSpecialPrice+'" placeholder="Giá KM" name="drugSpecialPrice[]" id="drugSpecialPrice' + rowcount + '" />' +
        '</td>' +
        '<td> ' +
        '<input type="text" class="form-control" value="'+drugQtyMaxDiscount+'" placeholder="Giới hạn KM" name="drugQtyMaxDiscount[]" id="drugQtyMaxDiscount' + rowcount + '" />' +
        '</td>' +
        '<td> ' +
        '<input type="text" class="form-control" value="'+drugQtyMax+'" placeholder="Giới hạn Đặt hàng" name="drugQtyMax[]" id="drugQtyMax' + rowcount + '" />' +
        '</td>' +
        '<td> ' +
        '<input type="text" class="form-control" value="'+drugNote+'" placeholder="Ghi chú" name="drugNote[]" id="drugNote' + rowcount + '" />' +
        '</td>' +
        '<td>' +'<input type="button" class="btn btn-warning" id="btnEdit' + rowcount + '" onclick="EditTicket(' + rowcount + ')" value="Sửa" />' +
        '   <input type="button" class="btn btn-danger" id="btnDelete' + rowcount + '" onclick="DeleteTicket(' + rowcount + ')" value="Xóa" /></td>' +
        '</tr>';*/

    var id = rowcount;
    var tcktNo = appendDrug(drugId);
    var tcktValue = drugId;
    //remove current selected row
    $("#row" + id).remove();
    //append new row
    var tblRow = '' +
        '<tr id="row' + id + '">' +

        '<input type="hidden" name="drugKeepIds[]" value="' + mind_drug_id + '" />' +

        '<td><label id="lblID' + id + '">' + id + '</label></td>' +
        '<td><label dataitem="' + tcktValue + '"  id="lblTicketNo' + id + '">' + tcktNo + '</label>' +'</td>' +
        '<td><label id="lbldrugPrice' + id + '" >' + drugPrice + '</label></td>' +
        '<td><label id="lbldrugSpecialPrice' + id + '" >' + drugSpecialPrice + '</label></td>' +
        '<td><label id="lbldrugQtyMaxDiscount' + id + '" >' + drugQtyMaxDiscount + '</label></td>' +
        '<td><label id="lbldrugQtyMax' + id + '" >' + drugQtyMax + '</label></td>' +
        '<td><label id="lbldrugNote' + id + '" >' + drugNote + '</label></td>' +
        '<td>' +'<input type="button" class="btn btn-warning" id="btnEdit' + id + '" onclick="EditTicket(' + id + ')" value="Sửa" />' +
        '   <input type="button" class="btn btn-danger" id="btnDelete' + id + '" onclick="DeleteTicket(' + id + ')" value="Xóa" /></td>' +
        '</tr>'

    return tblRow;
}
function addRowEdit()
{
    var selectDrugs = jQuery.parseJSON('<?php echo json_encode( $arrDataDrug ); ?>');

    var table = document.getElementById("tbl"); //get the table
    var rowHtml = '';
    jQuery.each(selectDrugs, function(index, obj) {
        rowHtml += setDataRow(index+1, obj.drug_id, obj.drug_price, obj.drug_special_price, obj.max_discount_qty, obj.max_qty, obj.note, obj.id);

    });
    $("#tbl").append(rowHtml);

    jQuery.each(selectDrugs, function(index, obj) {
        appendOption(obj.drug_id, index+1);
    });

}

function appendOption(old, id){
    //console.log(old, id);
    var selectDrugs = jQuery.parseJSON('<?php echo json_encode( $arrDrugs ); ?>');
    selectDrugs = Object.keys(selectDrugs).map(
            function(key) {
                return { num : key , char : selectDrugs[key]};;
            });
    var sorted = selectDrugs.sort(function(a, b) {
        if(a.char < b.char) return -1; return 1;
    });
    jQuery.each(sorted, function(index, obj) {
        $('.txtTicketNo')
        .append($("<option></option>")
        .attr("value",obj.num)
        .text(obj.char));
    });

    if(id && old) $('#txtTicketNo'+id+' option[value="' + old + '"]').attr("selected","selected");
}

function appendDrug(id){
//    console.log(id);
    var selectDrugs = jQuery.parseJSON('<?php echo json_encode( $arrDrugs ); ?>');
    var textOption = "";
    jQuery.each(selectDrugs, function(index, obj) {
       if (index == id) {
           textOption =  ''+obj+'';
       }
    });
    return textOption;
}


function addRow()
{
	var table = document.getElementById("tbl"); //get the table
	var rowcount = table.rows.length; //get no. of rows in the table
	//append the controls in the row
	var tblRow = '' +
        '<tr id="row' + rowcount + '">' +
            '<td>' +
                '<label id="lblID' + rowcount + '">' + rowcount + '</label>' +
            '</td> ' +
            '<td>' +
                '<select class="form-control txtTicketNo" style="width: 100px" name="drug_id[]" required id="txtTicketNo' + rowcount + '" >' +

                + '</select>' +
            '</td>' +
            '<td> ' +
                '<input type="text" class="form-control" placeholder="Giá gốc" name="drugPrice[]" required id="drugPrice' + rowcount + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giá KM" name="drugSpecialPrice[]" id="drugSpecialPrice' + rowcount + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giới hạn KM" name="drugQtyMaxDiscount[]" id="drugQtyMaxDiscount' + rowcount + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giới hạn Đặt hàng" name="drugQtyMax[]" id="drugQtyMax' + rowcount + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Ghi chú" name="drugNote[]" id="drugNote' + rowcount + '" />' +
            '</td>' +
            '<td>' +
                '<input type="button" class="btn btn-info" id="btnSave' + rowcount + '" onclick="SaveTicket(' + rowcount + ')" value="Lưu" />' +
            '</td>' +
        '</tr>'
	//append the row to the table.
	$("#tbl").append(tblRow);
    appendOption("","");
}


function SaveTicket(id)
{
	var id = $("#lblID" + id).html();
	var tcktNo = appendDrug($("#txtTicketNo" + id).val());
    var tcktValue = $("#txtTicketNo" + id).val();
	var drugPrice = $("#drugPrice" + id).val();
    var drugSpecialPrice = $("#drugSpecialPrice" + id).val();
    var drugQtyMaxDiscount = $("#drugQtyMaxDiscount" + id).val();
    var drugQtyMax = $("#drugQtyMax" + id).val();
    var drugNote = $("#drugNote" + id).val();
	//remove current selected row
	$("#row" + id).remove();
	//append new row
	var tblRow = '' +
            '<tr id="row' + id + '">' +
                '<td><label id="lblID' + id + '">' + id + '</label></td>' +
                '<td><label dataitem="' + tcktValue + '"  id="lblTicketNo' + id + '">' + tcktNo + '</label>' +'</td>' +
                '<td><label id="lbldrugPrice' + id + '" >' + drugPrice + '</label></td>' +
                '<td><label id="lbldrugSpecialPrice' + id + '" >' + drugSpecialPrice + '</label></td>' +
                '<td><label id="lbldrugQtyMaxDiscount' + id + '" >' + drugQtyMaxDiscount + '</label></td>' +
                '<td><label id="lbldrugQtyMax' + id + '" >' + drugQtyMax + '</label></td>' +
                '<td><label id="lbldrugNote' + id + '" >' + drugNote + '</label></td>' +
                '<td>' +'<input type="button" class="btn btn-warning" id="btnEdit' + id + '" onclick="EditTicket(' + id + ')" value="Sửa" />' +
			    '   <input type="button" class="btn btn-danger" id="btnDelete' + id + '" onclick="DeleteTicket(' + id + ')" value="Xóa" /></td>' +
            '</tr>'
	$("#tbl").append(tblRow);
}

function EditTicket(id)
{
	var id = $("#lblID" + id).html();
	var tcktNo = $("#lblTicketNo" + id).attr('dataitem');
    var drugPrice = $("#lbldrugPrice" + id).html();
    var drugSpecialPrice = $("#lbldrugSpecialPrice" + id).html();
    var drugQtyMaxDiscount = $("#lbldrugQtyMaxDiscount" + id).html();
    var drugQtyMax = $("#lbldrugQtyMax" + id).html();
    var drugNote = $("#lbldrugNote" + id).html();

	$("#row" + id).remove();
	var tblRow = '<tr id="row' + id + '">' +
            '<td> <label id="lblID' + id + '">' + id + '</label></td>' +
            '<td>' +
            '<select class="form-control txtTicketNo" style="width: 100px" name="drug_id[]" required id="txtTicketNo' + id + '" >' +

            + '</select>' +
            '</td>' +

			'<td> <input type="text" class="form-control" placeholder="Giá gốc" name="drugPrice[]" required value="'  + drugPrice + '" id="drugPrice' + id + '" /></td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giá KM" name="drugSpecialPrice[]" value="'  + drugSpecialPrice + '" id="drugSpecialPrice' + id + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giới hạn KM" name="drugQtyMaxDiscount[]" value="'  + drugQtyMaxDiscount + '" id="drugQtyMaxDiscount' + id + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Giới hạn Đặt hàng" name="drugQtyMax[]" value="'  + drugQtyMax + '" id="drugQtyMax' + id + '" />' +
            '</td>' +
            '<td> ' +
            '<input type="text" class="form-control" placeholder="Ghi chú" name="drugNote[]" value="' + drugNote + '" id="drugNote' + id + '" />' +
            '</td>' +
			'<td>   <input type="button" class="btn btn-info" id="btnUpdate' + id + '" onclick="UpdateTicket(' + id + ')" value="Lưu" /> </td></tr>'
	$("#tbl").append(tblRow);
    appendOption(tcktNo, id);
}

function UpdateTicket(id)
{
	var id = $("#lblID" + id).html();
	var tcktNo = appendDrug($("#txtTicketNo" + id).val());//$("#txtTicketNo" + id).val();
    var tcktValue = $("#txtTicketNo" + id).val();
    var drugPrice = $("#drugPrice" + id).val();
    var drugSpecialPrice = $("#drugSpecialPrice" + id).val();
    var drugQtyMaxDiscount = $("#drugQtyMaxDiscount" + id).val();
    var drugQtyMax = $("#drugQtyMax" + id).val();
    var drugNote = $("#drugNote" + id).val();
	$("#row" + id).remove();
	var tblRow = '<tr id="row' + id + '"> ' +
            '<td> <label id="lblID' + id + '">' + id + '</label> </td> ' +
            '<td> <label dataitem="' + tcktValue + '"  id="lblTicketNo' + id + '">' + tcktNo + '</label></td>' +
            '<td><label id="lbldrugPrice' + id + '" >' + drugPrice + '</label></td>' +
            '<td><label id="lbldrugSpecialPrice' + id + '" >' + drugSpecialPrice + '</label></td>' +
            '<td><label id="lbldrugQtyMaxDiscount' + id + '" >' + drugQtyMaxDiscount + '</label></td>' +
            '<td><label id="lbldrugQtyMax' + id + '" >' + drugQtyMax + '</label></td>' +
            '<td><label id="lbldrugNote' + id + '" >' + drugNote + '</label></td>' +
            '<td>  <input type="button" class="btn btn-warning" id="btnEdit' + id + '" onclick="EditTicket(' + id + ')" value="Sửa" /> ' +
			'   <input type="button" class="btn btn-danger" id="btnDelete' + id + '" onclick="DeleteTicket(' + id + ')" value="Xóa" /> </td></tr>'
	$("#tbl").append(tblRow);
}

function DeleteTicket(id)
{
	$("#row" + id).remove();
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>