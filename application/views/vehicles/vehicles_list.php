<?php $this->load->view('include/header_mobile'); ?>
<?php $this->load->view('vehicles/filter'); ?>
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
							<div class="display-inline-block margin-right-10">
								<?php if($rs->active) : ?>
									<i class="fa fa-check fa-lg green"></i>
								<?php else : ?>
									<i class="fa fa-ban fa-lg red"></i>
								<?php endif; ?>
							</div>
							<div class="display-inline-block">
								<span class="display-block font-size-12">ทะเบียน:&nbsp;&nbsp; <?php echo $rs->code; ?></span>
								<span class="display-block font-size-11">ประเภทรถ:&nbsp;&nbsp; <?php echo $rs->type; ?></span>
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
			<?php else : ?>
				<div class="width-100 text-center">--- ไม่พบรายการ ---</div>
			<?php endif; ?>
	</div>
	<div style="width:100%; position:absolute; left:0; bottom:70px;">
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>

<?php $this->load->view('include/pg_footer_menu'); ?>

<script src="<?php echo base_url(); ?>scripts/vehicles/vehicles.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
