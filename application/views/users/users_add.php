<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">เพิ่ม ผู้ใช้งาน</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">User Name</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="uname" onkeyup="validCode(this)" placeholder="User Name" autocomplete="off" autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Password</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="password" class="form-control r" id="pwd" placeholder="Password" style="padding-right:40px;" autocomplete="off"/>
				<i id="pwd-btn" class="ace-icon fa fa-eye fa-lg light-grey" onclick="showPwd()" style="position:absolute; top:10px; right:20px; cursor:pointer;"></i>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">User Group</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control r" id="ugroup">
					<option value="">กรุณาเลือก</option>
					<option value="admin">Admin</option>
					<option value="driver">Driver</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">ทะเบียนรถ</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="plate-no" placeholder="ทะเบียนรถ" autocomplete="off"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Full Name</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="name" placeholder="Full name" autocomplete="off"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right hidden-xs">Active</label>
			<label class="col-xs-6 visible-xs">Active</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-top-5 text-right">
				<label>
					<input id="active" class="ace ace-switch ace-switch-5 btn-empty" type="checkbox" value="1" checked>
					<span class="lbl"></span>
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="add()">บันทึก</button>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
