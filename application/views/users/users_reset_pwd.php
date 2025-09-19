<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">Reset user password</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">User Name</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="uname" value="<?php echo $ds->uname; ?>" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Full Name</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="text" class="form-control r" id="name" value="<?php echo $ds->name; ?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Password</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input type="password" class="form-control r" id="pwd" placeholder="Password" style="padding-right:40px;" autocomplete="off"/>
				<i id="pwd-btn" class="ace-icon fa fa-eye fa-lg light-grey" onclick="showPwd()" style="position:absolute; top:10px; right:20px; cursor:pointer;"></i>
			</div>
		</div>
		<div class="divider-hidden"></div>
		<div class="divider-hidden"></div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="changePwd()">บันทึก</button>
			</div>
		</div>
	</div>
	<input type="hidden" id="id" value="<?php echo $ds->id; ?>" />

</div>

<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
