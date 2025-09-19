<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
	<div class="filter-pad move-out" id="filter-pad">
		<div class="nav-title nav-title-right">
	    <a class="hidden-lg" onclick="closeFilter()"><i class="fa fa-angle-left fa-2x"></i></a>
	    <div class="font-size-18 text-center">ค้นหา</div>
	  </div>
		<div class="divider-hidden"></div>
		<div class="col-xs-12 page-wrap listing">
			<div class="col-xs-12 padding-5 fi">
				<label>วันที่</label>
				<div class="input-daterange input-group width-100">
					<input type="text" class="form-control input-sm width-50 text-center from-date" name="from_date" id="fromDate" readonly value="<?php echo $from_date; ?>" />
					<input type="text" class="form-control input-sm width-50 text-center to-date" name="to_date" id="toDate" readonly value="<?php echo $to_date; ?>" />
				</div>
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>เลขที่</label>
				<input type="text" class="form-control" name="code"  value="<?php echo $code; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>ลูกค้า</label>
				<input type="text" class="form-control" name="customer"  value="<?php echo $customer; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>คลัง</label>
				<select class="form-control" name="warehouse" id="warehouse">
					<option value="all">ทั้งหมด</option>
					<?php echo select_consignment_warehouse($warehouse); ?>
				</select>
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>สถานะ</label>
				<select class="form-control" name="status">
					<option value="all">ทั้งหมด</option>
					<option value="0" <?php echo is_selected('0', $status); ?>>Draft</option>
					<option value="1"	<?php echo is_selected('1', $status); ?>>Closed</option>
					<option value="2" <?php echo is_selected('2', $status); ?>>Canceled</option>
				</select>
			</div>

			<div class="divider-hidden"></div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 fi">
				<button type="submit" class="btn btn-sm btn-primary btn-block" style="border-radius:10px;"><i class="fa fa-search"></i> Search</button>
			</div>
		</div>
	</div>
	<input type="hidden" name="search" value="1" />
</form>

<script>
	$('#warehouse').select2();
</script>
