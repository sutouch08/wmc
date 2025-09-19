<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">เพิ่ม ข้อมูลยานพาหนะ</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">ทะเบียนรถ</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="code" autofocus autocomplete="off" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">ประเภทรถ</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control r" id="type">
					<option value="">กรุณาเลือก</option>
					<?php echo select_vehicle_type(); ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">น้ำหนัก</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="number" class="form-control" id="weight" value="0" autocomplete="off"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">จำนวน Pallet</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="number" class="form-control" id="pallet" value="0" autocomplete="off"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right hidden-xs">Active</label>
			<label class="col-xs-6 visible-xs">Active</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-top-5 text-right">
				<label>
					<input id="active" class="ace ace-switch ace-switch-5 btn-empty" type="checkbox" value="1" checked>
					<span class="lbl"></span>
				</label>
			</div>
		</div>

		<div class="divider-hidden hidden-xs"></div>
		<div class="divider-hidden hidden-xs"></div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="add()">บันทึก</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/vehicles/vehicles.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
