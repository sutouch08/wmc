<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consignment extends PS_Controller
{
	public $title = 'ตัดยอดฝากขายเทียม';
	public $error;
	public $segment = 3;

	public function __construct()
	{
		parent::__construct();
		$this->home = base_url(). "consignment";
		$this->load->model('account/consignment_model');
		$this->load->helper('consignment');
		$this->load->helper('warehouse');
	}

	public function index()
  {
    $filter = array(
      'code' => get_filter('code', 'wd_code', ''),
      'customer' => get_filter('customer', 'wd_customer', ''),
      'warehouse' => get_filter('waerhouse', 'wd_warehouse', ''),
			'from_date' => get_filter('fromDate', 'wd_fromDate', ''),
			'to_date' => get_filter('toDate', 'wd_toDate', ''),
			'status' => get_filter('status', 'wd_status', 'all')
    );

    $perpage = get_rows();
    $segment = $this->segment;
    $rows = $this->consignment_model->count_rows($filter);
    $filter['data'] = $this->consignment_model->get_list($filter, $perpage, $this->uri->segment($segment));
    $init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
    $this->pagination->initialize($init);
    $this->load->view('consignment/list', $filter);
  }


	public function add_new()
	{
		$this->load->view('consignment/add');
	}


	public function view_detail($code)
	{
    $ds = array(
      'doc' => $doc = $this->consignment_model->get($code),
      'details' => $this->consignment_model->get_details($code)
    );

    $this->load->view('consignment/view_detail', $ds);
	}


	public function delete_detail()
	{
		$sc = TRUE;
		$code = $this->input->post('code');
		$id = $this->input->post('id');

		if( ! empty($code) && ! empty($id))
		{
			$doc = $this->consignment_model->get($code);

			if( ! empty($doc))
			{
				if($doc->status == 0)
				{
					if( ! $this->consignment_model->delete_detail($id))
					{
						$sc = FALSE;
						$this->error = "Failed to delete row item";
					}
				}
				else
				{
					$sc = FALSE;
					set_error('status');
				}
			}
			else
			{
				$sc = FALSE;
				set_error('notfound');
			}
		}
		else
		{
			$sc = FALSE;
			set_error('required');
		}

		$this->_response($sc);
	}


	public function rollback()
  {
    $sc = TRUE;
		$code = $this->input->post('code');

    $doc = $this->consignment_model->get($code);

    if( ! empty($doc))
    {
      if($doc->status == 1 OR $doc->status == 2)
      {
        $arr = array(
          'status' => 0,
          'cancle_reason' => NULL,
          'cancle_user' => NULL
        );

        $this->db->trans_begin();

        if( ! $this->consignment_model->update($code, $arr))
        {
          $sc = FALSE;
          $this->error = "Failed to update document status";
        }

        if($sc === TRUE)
        {
          if( ! $this->consignment_model->update_details($code, ['status' => 0]))
          {
            $sc = FALSE;
            $this->error = "Failed to update line status";
          }
        }

        if($sc === TRUE)
        {
          $this->db->trans_commit();
        }
        else
        {
          $this->db->trans_rollback();
        }
      }
    }
    else
    {
      $sc = FALSE;
      set_error('notfound');
    }

    $this->_response($sc);
  }


	public function get_item_by_barcode()
  {
		$sc = TRUE;
		
    if($this->input->get('barcode'))
    {
      // $this->load->model('stock/stock_model');

      $barcode = $this->input->get('barcode');
      $zone_code = $this->input->get('zone_code');
      $item = $this->products_model->get_product_by_barcode($barcode);

      if(!empty($item))
      {
        $stock = $item->count_stock == 1 ? $this->stock_model->get_consign_stock_zone($zone_code, $item->code) : 0;

        $arr = array(
          'pdCode' => $item->code,
          'barcode' => $item->barcode,
          'product' => $item->code,
          'price' => round($item->price, 2),
          'disc' => 0,
          'stock' => $stock,
          'count_stock' => $item->count_stock
        );

        $sc = json_encode($arr);
      }
      else
      {
        $sc = 'สินค้าไม่ถูกต้อง';
      }

      echo $sc;
    }
    else
    {
      echo "สินค้าไม่ถูกต้อง";
    }
  }


	public function clear_filter()
	{
		$filter = array(
      'wd_code',
      'wd_customer',
      'wd_warehouse',
			'wd_from_date',
			'wd_to_date',
			'wd_status'
    );

		return clear_filter($filter);
	}


} //--- end class
?>
