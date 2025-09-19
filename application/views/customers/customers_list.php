<?php $this->load->view('include/header_mobile'); ?>

<?php $this->load->view('customers/filter'); ?>
<div class="row">
	<div style="width:100%;">
		<?php echo $this->result_items; ?>
	</div>
	<div class="page-wrap listing">
		<?php if( ! empty($data)) : ?>
			<?php $no = $this->uri->segment($this->segment) + 1; ?>
			<?php foreach($data as $rs) : ?>
				<div class="list-block">
					<div class="list-link" >
						<div class="list-link-inner">
							<div class="margin-right-10"><?php echo $no; ?></div>
							<div class="display-inline-block">
								<span class="display-block font-size-12">
									<?php echo $rs->code.' : '.$rs->name; ?>
									<?php echo empty($rs->phone) ? "" : " : {$rs->phone}"; ?>
								</span>
								<span class="display-block font-size-11"><?php echo $rs->address; ?></span>
								<?php if( ! empty($rs->contact)) : ?>
									<span class="display-block font-size-11">ติดต่อ : <?php echo $rs->contact; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<div class="">
							<button type="button" class="btn btn-warning btn-white" onclick="edit(<?php echo $rs->id; ?>)"><i class="fa fa-pencil"></i></button>
						</div>
						<!-- <i class="fa fa-angle-right fa-2x light-grey"></i> -->
					</div>
				</div>
				<?php $no++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div style="width:100%; position:absolute; left:0; bottom:70px;">
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>

<?php $this->load->view('include/pg_footer_menu'); ?>
<script src="<?php echo base_url(); ?>scripts/customers/customers.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
