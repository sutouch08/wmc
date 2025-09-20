<?php $this->load->view('include/header_mobile'); ?>
<script src="<?php echo base_url(); ?>assets/js/localforage.js"></script>
<script src="<?php echo base_url(); ?>assets/js/html5-qrcode.min.js"></script>
<style>
	.page-wrap.listing {
		height: calc(100vh - 170px);
	}
</style>
<div class="nav-title nav-title-center">
	<a onclick="goBack()"><i class="fa fa-angle-left fa-2x"></i></a>
	<div class="font-size-18 text-center"><?php echo $doc->code; ?></div>
</div>
<div class="divider-hidden"></div>
<div class="row">
  <div class="page-wrap listing">
    <?php $no = 1; ?>
		<?php $totalQty = 0; ?>
		<?php $totalAmount = 0; ?>
    <?php if( ! empty($details)) : ?>
      <?php foreach($details as $rs) : ?>
        <div class="list-block" id="list-block-<?php echo $rs->id; ?>" onclick="toggleActive(<?php echo $rs->id; ?>)">
          <div class="list-link" >
            <div class="list-link-inner width-100">
              <div class="margin-right-10 no" id="no-<?php echo $rs->id; ?>"><?php echo $no; ?></div>
							<input type="checkbox" class="chk hide"
							id="list-<?php echo $rs->id; ?>"
							data-code="<?php echo $rs->product_code; ?>"
							data-name="<?php echo $rs->product_name; ?>"
							data-qty="<?php echo number($rs->qty); ?>"
							value="<?php echo $rs->id; ?>"/>
							<div class="display-inline-block width-100">
								<span class="display-block font-size-12"><?php echo $rs->product_code; ?></span>
								<span class="display-block font-size-11"><?php echo $rs->product_name; ?></span>
								<span class="float-left font-size-11 width-50">Price: <?php echo number($rs->price, 2); ?></span>
								<span class="float-left font-size-11 width-50">Disc.: <?php echo $rs->discount; ?></span>
								<span class="float-left font-size-11 width-15">QTY:</span>
								<input type="text" class="float-left font-size-11 text-label padding-0 width-35 qty" id="qty-<?php echo $rs->id; ?>" value="<?php echo number($rs->qty); ?>" readonly/>
								<span class="float-left font-size-11 width-15">Amnt:</span>
								<input type="text" class="float-left font-size-11 text-label padding-0 width-35 amount" id="amount-<?php echo $rs->id; ?>" value="<?php echo number($rs->amount, 2); ?>" readonly/>
							</div>
            </div>
          </div>
        </div>
				<?php $totalQty += $rs->qty; ?>
				<?php $totalAmount += $rs->amount; ?>
        <?php $no++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

	<input type="hidden" id="code" value="<?php echo $doc->code; ?>" />
	<input type="hidden" id="zone-code" value="<?php echo $doc->zone_code; ?>" />
	<input type="hidden" id="auz" value="<?php echo getConfig('ALLOW_UNDER_ZERO'); ?>" />
</div>

<div class="pg-summary">
	<div class="pg-summary-inner">
		<div class="pg-summary-content">
			<div class="summary-text width-50">
				<span class="float-left font-size-16 width-30">QTY.</span>
				<input type="text"
				class="float-left font-size-16 text-label padding-0 width-70 text-center"
				style="color:white !important;"
				id="total-qty"
				value="<?php echo number($totalQty); ?>" readonly />
			</div>
			<div class="summary-text width-50">
				<span class="float-left font-size-16 width-30">Amnt.</span>
				<input type="text"
				class="float-left font-size-16 text-label padding-0 width-70 text-right"
				style="color:white !important;"
				id="total-amount"
				value="<?php echo number($totalAmount, 2); ?>" readonly />
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('consignment/item_panel'); ?>
<?php $this->load->view('consignment/footer_menu'); ?>

<?php $this->load->view('include/barcode_reader'); ?>

<script src="<?php echo base_url(); ?>scripts/consignment/consignment.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/consignment/consignment_add.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/scanner.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
