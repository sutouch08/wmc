<?php $this->load->view('include/header_mobile'); ?>
<script src="<?php echo base_url(); ?>assets/js/localforage.js"></script>
<script src="<?php echo base_url(); ?>assets/js/html5-qrcode.min.js"></script>

<?php $this->load->view('include/extra-menu'); ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 text-center">
		<h1>Hello! <?php echo get_cookie('displayName'); ?></h1>
		<h5>Good to see you here</h5>
	</div>
	<div class="divider-hidden"></div>
	<div class="divider"></div>
</div>
<div class="row">
	<div class="menu-box">
		<div class="menu-card" style="border-color: #2196F3; color:#2196F3;" onclick="goTo('consignment')">
			<span class="badge badge-danger">9</span>
			<span class="icon-badge text-center"><i class="fa fa-tasks fa-lg"></i><br/></span>
			<span class="menu-text text-left">ตัดยอดฝากขาย (WD)</span>
		</div>

		<div class="menu-card" style="border-color: #4CAF50; color:#4CAF50;" onclick="goTo('consign')">
			<span class="badge badge-danger">9</span>
			<span class="icon-badge text-center"><i class="fa fa-tasks fa-lg"></i><br/></span>
			<span class="menu-text text-left">ตัดยอดฝากขาย (WM)</span>
		</div>
	</div>
</div>

<div class="pg-footer">
	<div class="pg-footer-inner">
		<div class="pg-footer-content text-right">
			<div class="footer-menu <?php echo $tab == 'home' ? 'active' : ''; ?>">
				<span class="pg-icon" onclick="goTo('main)">
					<i class="fa fa-home fa-2x"></i><span>Home</span>
				</span>
			</div>
			<div class="footer-menu <?php echo $tab == 'wd' ? 'active' : ''; ?>">
				<span class="pg-icon" onclick="goTo('consignment')">
					<i class="fa fa-tasks fa-2x"></i><span>WD</span>
				</span>
			</div>

			<div class="footer-menu <?php echo $tab == 'wm' ? 'active' : ''; ?>">
				<span class="pg-icon" onclick="goTo('consign')">
					<i class="fa fa-tasks fa-2x"></i><span>WM</span>
				</span>
			</div>

			<div class="footer-menu <?php echo $tab == 'account' ? 'active' : ''; ?>">
				<span class="pg-icon" onclick="goTo('account')">
					<i class="fa fa-dollar fa-2x"></i><span>Account</span>
				</span>
			</div>

			<div class="footer-menu">
				<span class="pg-icon" onclick="toggleExtraMenu()">
					<i class="fa fa-cog fa-2x"></i><span>Setting</span>
				</span>
			</div>
		</div>
		<input type="hidden" id="menu" value="hide" />
 </div>
</div>

<?php $this->load->view('include/setting_menu'); ?>

<script src="<?php echo base_url(); ?>scripts/scanner.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
