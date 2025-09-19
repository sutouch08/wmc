<?php $this->load->view('include/header_mobile'); ?>
<?php $this->load->view('consignment/filter'); ?>
<div class="row">
  <div class="page-wrap listing">
    <?php $no = $this->uri->segment($this->segment) + 1; ?>
    <?php if( ! empty($data)) : ?>
      <?php foreach($data as $rs) : ?>

        <div class="list-block" onclick="viewDetail('<?php echo $rs->code; ?>')">
          <div class="list-link" >
            <div class="list-link-inner">
              <div class="margin-right-10"><?php echo $no; ?></div>
              <div class="display-inline-block margin-right-10" style="padding:5px; background-color:<?php echo status_color($rs->status); ?>; border-radius:10px;">&nbsp;</div>
              <div class="display-inline-block">
                <span class="display-block font-size-12"><?php echo $rs->code; ?> [<?php echo status_text($rs->status); ?>]</span>
                <span class="display-block font-size-11"><?php echo $rs->customer_name; ?></span>
              </div>
            </div>
            <i class="fa fa-angle-right fa-2x light-grey"></i>
          </div>
        </div>
        <?php $no++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php $this->load->view('include/pg_footer_menu'); ?>

<script src="<?php echo base_url(); ?>scripts/consignment/consignment.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer_mobile'); ?>
