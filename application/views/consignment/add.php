<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center" style="position:fixed;">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">เพิ่ม เอกสารตัดยอดใหม่</div>
</div>
<div class="row padding-top-20">
	<div class="col-xs-6">
		<label>วันที่</label>
		<input type="text" class="form-control text-center r" id="date" value="<?php echo date('d-m-Y'); ?>" readonly />
	</div>

	<div class="col-xs-6">
		<label>รหัสลูกค้า</label>
		<input type="text" class="form-control text-center r" id="customer-code" autofocus autocomplete="off" />
	</div>
	<div class="divider-hidden"></div>

	<div class="col-xs-12">
		<label>ลูกค้า</label>
		<input type="text" class="form-control r" id="customer-name"  />
	</div>
	<div class="divider-hidden"></div>

	<div class="col-xs-12">
		<label>รหัสโซน</label>
		<input type="text" class="form-control r" id="zone-code" />
	</div>
	<div class="divider-hidden"></div>

	<div class="col-xs-12">
		<label>โซน</label>
		<input type="text" class="form-control r" id="zone-name" />
	</div>
	<div class="divider-hidden"></div>

	<div class="col-xs-12">
		<label>หมายเหตุ</label>
		<input type="text" class="form-control r" id="remark" />
	</div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>

	<div class="col-xs-12">
		<button type="button" class="btn btn-sm btn-primary btn-block" onclick="add()"><i class="fa fa-plus"></i>&nbsp; &nbsp; เพิ่ม</button>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/consignment/consignment.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/consignment/consignment_add.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
