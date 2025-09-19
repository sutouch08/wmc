<?php $this->load->view('include/header_mobile'); ?>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center">เพิ่ม ข้อมูลสินค้า</div>
</div>
<div class="divider-hidden"></div>
<div class="row">
	<div class="form-horizontal page-wrap full">
		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">รหัสสินค้า</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="text" class="form-control" id="code" onkeyup="validCode(this)" value="<?php echo $ds->code; ?>"
					placeholder="allow a-z A-Z - _" autocomplete="off" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">ชื่อสินค้า</label>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<input type="text" class="form-control r" id="name" value="<?php echo $ds->name; ?>" autocomplete="off"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">หน่วนนับ</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
				<select class="form-control r" id="unit">
					<option value="">กรุณาเลือก</option>
					<?php echo select_item_unit($ds->unit); ?>
				</select>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				<button class="btn btn-sm btn-success btn-block" onclick="newUnit()"><i class="fa fa-plus"></i></button>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">ขนาด</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
				<select class="form-control r" id="size">
					<option value="">กรุณาเลือก</option>
					<?php echo select_item_size($ds->size); ?>
				</select>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				<button class="btn btn-sm btn-success btn-block" onclick="newSize()"><i class="fa fa-plus"></i></button>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">น้ำหนัก</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="number" class="form-control" id="weight" value="<?php echo $ds->weight; ?>" autocomplete="off"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">ราคาขาย</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="number" class="form-control" id="price" value="<?php echo $ds->price; ?>" autocomplete="off"/>
			</div>
		</div>

		<div class="divider-hidden hidden-xs"></div>
		<div class="divider-hidden hidden-xs"></div>

		<div class="form-group">
			<label class="col-sm-3 col-xs-12 control-label no-padding-right">&nbsp;</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-sm btn-primary btn-block" onclick="update()">บันทึก</button>
			</div>
		</div>

		<input type="hidden" id="id" value="<?php echo $ds->id; ?>" />
	</div>
</div>

<?php $this->load->view('items/item_size_modal'); ?>
<?php $this->load->view('items/item_unit_modal'); ?>

<script src="<?php echo base_url(); ?>scripts/items/items.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
