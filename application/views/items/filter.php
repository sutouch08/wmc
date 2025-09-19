<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
	<div class="filter-pad move-out" id="filter-pad">
		<div class="nav-title nav-title-right">
	    <a class="hidden-lg" onclick="closeFilter()"><i class="fa fa-angle-left fa-2x"></i></a>
	    <div class="font-size-18 text-center">ค้นหา</div>
	  </div>
		<div class="divider-hidden"></div>
		<div class="col-xs-12 page-wrap listing">
			<div class="col-xs-12 padding-5 fi">
				<label>รหัสสินค้า/ชื่อสินค้า</label>
				<input type="text" class="form-control" name="code"  value="<?php echo $code; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>หน่วยนับ</label>
				<select class="form-control" name="unit">
					<option value="all">ทั้งหมด</option>
					<?php echo select_item_unit($unit); ?>
				</select>
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>ขนาด</label>
				<select class="form-control" name="size">
					<option value="all">ทั้งหมด</option>
					<?php echo select_item_size($size); ?>
				</select>
			</div>

			<div class="divider-hidden"></div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 fi">
				<button type="submit" class="btn btn-primary btn-block" style="border-radius:10px;"><i class="fa fa-search"></i> Search</button>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 fi">
				<button type="button" class="btn btn-warning btn-block" style="border-radius:10px;" onclick="clearFilter()"><i class="fa fa-retweet"></i> Clear</button>
			</div>

		</div>
	</div>
	<input type="hidden" name="search" value="1" />
</form>
