<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
	<div class="filter-pad move-out" id="filter-pad">
		<div class="nav-title nav-title-right">
	    <a class="hidden-lg" onclick="closeFilter()"><i class="fa fa-angle-left fa-2x"></i></a>
	    <div class="font-size-18 text-center">ค้นหา</div>
	  </div>
		<div class="divider-hidden"></div>
		<div class="col-xs-12 page-wrap">
			<div class="col-xs-12 padding-5 fi">
				<label>User Name</label>
				<input type="text" class="form-control" name="uname"  value="<?php echo $uname; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>Full Name</label>
				<input type="text" class="form-control search" name="name" value="<?php echo $name; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>ทะเบียนรถ</label>
				<input type="text" class="form-control search" name="plate_no" value="<?php echo $plate_no; ?>" />
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>User Group</label>
				<select class="form-control" name="ugroup">
					<option value="all">ทั้งหมด</option>
					<option value="admin" <?php echo is_selected('admin', $ugroup); ?>>Admin</option>
					<option value="driver" <?php echo is_selected('driver', $ugroup); ?>>Driver</option>
				</select>
			</div>

			<div class="col-xs-12 padding-5 fi">
				<label>สถานะ</label>
				<select class="form-control" name="active">
					<option value="all">ทั้งหมด</option>
					<option value="1" <?php echo is_selected('1', $active); ?>>Active</option>
					<option value="0" <?php echo is_selected('0', $active); ?>>Inactive</option>
				</select>
			</div>
			<div class="divider-hidden"></div>

			<div class="col-xs-12 padding-5 fi">
				<button type="submit" class="btn btn-primary btn-block" style="border-radius:10px;"><i class="fa fa-search"></i> Search</button>
			</div>
			<div class="col-xs-12 padding-5 fi">
				<button type="button" class="btn btn-warning btn-block" style="border-radius:10px;" onclick="clearFilter()"><i class="fa fa-retweet"></i> Clear</button>
			</div>

		</div>
	</div>
	<input type="hidden" name="search" value="1" />
</form>
