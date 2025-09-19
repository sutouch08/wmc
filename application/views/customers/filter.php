<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
	<div class="filter-pad move-out" id="filter-pad">
		<div class="nav-title nav-title-right">
	    <a class="hidden-lg" onclick="closeFilter()"><i class="fa fa-angle-left fa-2x"></i></a>
	    <div class="font-size-18 text-center">ค้นหา</div>
	  </div>
		<div class="divider-hidden"></div>
		<div class="col-xs-12 page-wrap listing">
			<div class="col-xs-12 padding-5 fi">
				<label>รหัส/ชื่อลูกค้า</label>
				<input type="text" class="form-control" name="name"  value="<?php echo $name; ?>" />
			</div>
			<div class="col-xs-12 padding-5 fi">
				<label>เบอร์โทร</label>
				<input type="text" class="form-control" name="phone"  value="<?php echo $phone; ?>" />
			</div>
			<div class="col-xs-12 padding-5 fi">
				<label>ผู้ติดต่อ</label>
				<input type="text" class="form-control" name="contact"  value="<?php echo $contact; ?>" />
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
