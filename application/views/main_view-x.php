<?php $this->load->view('include/header_mobile'); ?>
<style>
	.menu-box {
		/* display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		align-items: flex-start;
		gap:20px; */
	}

	.menu-card {
		width: 100px;
		/* display: flex;
		justify-content: center;
		align-items: center; */
		padding: 20px 0 20px;
		height: 100px;
		font-size: 14px;
		border:solid 1px #d7d7d7;
		border-radius: 10px;
		cursor: pointer;
		margin-bottom: 20px;
	}

	.menu-card > .badge {
		position: absolute;
		top:-2px;
		right:-2px;
	}

</style>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 text-center">
		<h1>Hello! <?php echo get_cookie('displayName'); ?></h1>
		<h5>Good to see you here</h5>
	</div>
	<div class="divider-hidden"></div>
	<div class="divider"></div>
</div>
<div class="row" style="max-width:1000px; margin-left:auto;margin-right:auto;">
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #2196F3; color:#2196F3;" onclick="goTo('job')">
			<span class="badge badge-danger">9</span>
			<span class="text-center">
				<i class="fa fa-tasks fa-2x"></i><br/>
				JOBS
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #4CAF50; color:#4CAF50;">
			<span class="text-center">
				<i class="fa fa-check-square-o fa-2x"></i><br/>
				APPROVAL
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #FF9800; color:#FF9800;">
			<span class="text-center">
				<i class="fa fa-bar-chart fa-2x"></i><br/>
				REPORT
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #00BCD4; color:#00BCD4;">
			<span class="text-center">
				<i class="fa fa-dollar fa-2x"></i><br/>
				ACCOUNT
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #673AB7; color:#673AB7;">
			<span class="text-center">
				<i class="fa fa-users fa-2x"></i><br/>
				CUSTOMERS
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #607D8B; color:#607D8B;">
			<span class="text-center">
				<i class="fa fa-cube fa-2x"></i><br/>
				Items
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #FF6D6D; color:#FF6D6D;">
			<span class="text-center">
				<i class="fa fa-truck fa-2x"></i><br/>
				VEHICLE
			</span>
		</div>
	</div>
	<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 text-center">
		<div class="menu-card" style="border-color: #3F51B5; color:#3F51B5;">
			<span class="text-center">
				<i class="fa fa-user fa-2x"></i><br/>
				USER
			</span>
		</div>
	</div>
</div>

<div class="pg-footer">
	<div class="pg-footer-inner">
		<div class="pg-footer-content text-right">
			<div class="footer-menu width-20 <?php echo $tab == 'home' ? 'active' : ''; ?>">
				<span class="width-100" onclick="home()">
					<i class="fa fa-home fa-2x"></i><span>Home</span>
				</span>
			</div>
			<div class="footer-menu width-20 <?php echo $tab == 'job' ? 'active' : ''; ?>">
				<span class="width-100" onclick="job()">
					<i class="fa fa-tasks fa-2x"></i><span>Jobs</span>
				</span>
			</div>

			<div class="footer-menu width-20 <?php echo $tab == 'approval' ? 'active' : ''; ?>">
				<span class="width-100" onclick="approval()">
					<i class="fa fa-cube fa-2x"></i><span>Receiving</span>
				</span>
			</div>

			<div class="footer-menu width-20">
				<span class="width-100" onclick="account()">
					<i class="fa fa-dollar fa-2x"></i><span>Account</span>
				</span>
			</div>

			<div class="footer-menu width-20">
				<span class="width-100" onclick="toggleMenus()">
					<i class="fa fa-bars fa-2x"></i><span>More</span>
				</span>
			</div>
		</div>
		<input type="hidden" id="menu" value="hide" />
 </div>
</div>


<script>
	posData = {
		'DeviceUId' : '1e4d36177d71bbb3558e43af9577d70e', //--- Machine UUID generate and store in localStorage
		'shop_id' : 1,
		'shop_code' : 'SHOP-001',
		'shop_name' : 'Crochet',
		'pos_no' : 'E',
		'pos_code' : 1,
		'id' : 1,
		'code' : ''
	}

	var posData = null;

	window.addEventListener('load', () => {
		let posData = localStorage.getItem('posData');
	})

	function goTo(page) {
		window.location.href = HOME + page;
	}
</script>
<?php $this->load->view('include/footer_mobile'); ?>
