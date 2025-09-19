<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">แก้ไข ผู้ใช้งาน</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">UserName</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="uname" onkeyup="validCode(this)" placeholder="User Name" autocomplete="off" value="<?php echo $ds->uname; ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">UserGroup</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control r" id="ugroup">
					<option value="">กรุณาเลือก</option>
					<option value="admin" <?php echo is_selected('admin', $ds->ugroup); ?>>Admin</option>
					<option value="driver" <?php echo is_selected('driver', $ds->ugroup); ?>>Driver</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">ทะเบียนรถ</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="plate-no" placeholder="ทะเบียนรถ" autocomplete="off" value="<?php echo $ds->plate_no; ?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">FullName</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="name" placeholder="Full name" autocomplete="off" value="<?php echo $ds->name; ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right hidden-xs">Active</label>
			<label class="col-xs-6 visible-xs">Active</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-top-5 text-right">
				<label>
					<input id="active" class="ace ace-switch ace-switch-5 btn-empty" type="checkbox" value="1" <?php echo is_checked('1', $ds->active); ?>>
					<span class="lbl"></span>
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="update()">บันทึก</button>
			</div>
		</div>

		<input type="hidden" id="id" value="<?php echo $ds->id; ?>" />
	</div>
</div>


<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
