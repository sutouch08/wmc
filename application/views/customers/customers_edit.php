<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">แก้ไข ข้อมูลลูกค้า</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">รหัสลูกค้า</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="text" class="form-control text-center" id="code" value="<?php echo $ds->code; ?>" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">ชื่อลูกค้า</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<input type="text" class="form-control r" id="name" placeholder="ชื่อลูกค้า" autocomplete="off" value="<?php echo $ds->name; ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">ที่อยู่</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<textarea class="form-control r" rows="2" id="address"><?php echo $ds->address; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">เบอร์โทร</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<input type="text" class="form-control r" id="phone" placeholder="เบอร์โทรศัพท์" autocomplete="off" value="<?php echo $ds->phone; ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Google Map</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="map" autocomplete="off" value="<?php echo $ds->google_map; ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">ชื่อผู้ติดต่อ</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<input type="text" class="form-control r" id="contact" placeholder="ชื่อผู้ติดต่อ" autocomplete="off" value="<?php echo $ds->contact; ?>"/>
			</div>
		</div>

		<div class="divider-hidden hidden-xs"></div>
		<div class="divider-hidden hidden-xs"></div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="update()">บันทึก</button>
			</div>
		</div>
		<input type="hidden" id="id" value="<?php echo $ds->id; ?>" />
	</div>
</div>


<script src="<?php echo base_url(); ?>scripts/customers/customers.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
