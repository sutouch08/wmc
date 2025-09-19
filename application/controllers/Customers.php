<?php
class Customers extends PS_Controller
{
  public $title = "เพิ่ม/แก้ไข ลูกค้า";
  public $segment = 3;

  public function __construct()
  {
    parent::__construct();

    $this->home = base_url() . 'customers';
    $this->load->model('customers_model');
  }


  public function index()
  {
    $filter = array(
      'name' => get_filter('name', 'cust_name', ''),
      'phone' => get_filter('phone', 'cust_phone', ''),
      'contact' => get_filter('contact', 'cust_contact', '')
    );

    $perpage = get_rows();
    $segment = $this->segment;
    $rows = $this->customers_model->count_rows($filter);
    $filter['data'] = $this->customers_model->get_list($filter, $perpage, $this->uri->segment($segment));
    $init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
    $this->pagination->initialize($init);
    $this->load->view('customers/customers_list', $filter);
  }


  public function add_new()
  {
    $ds['code'] = $this->get_new_code();
    $this->load->view('customers/customers_add', $ds);
  }


  public function add()
  {
    $sc = TRUE;
    $ds = json_decode($this->input->post('data'));

    if( ! empty($ds))
    {
      $arr = array(
        'code' => $this->get_new_code(),
        'name' => $ds->name,
        'address' => $ds->address,
        'phone' => get_null($ds->phone),
        'google_map' => get_null($ds->map),
        'contact' => get_null($ds->contact),
        'create_by' => $this->_user->uname
      );

      if( ! $this->customers_model->add($arr))
      {
        $sc = FALSE;
        $this->error = "Failed to create customer";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $this->_response($sc);
  }


  public function edit($id)
  {
    $ds = $this->customers_model->get_by_id($id);

    if( ! empty($ds))
    {
      $this->load->view('customers/customers_edit', ['ds' => $ds]);
    }
    else
    {
      $this->page_error();
    }
  }


  public function update()
  {
    $sc = TRUE;
    $ds = json_decode($this->input->post('data'));

    if( ! empty($ds))
    {

      $arr = array(
        'name' => $ds->name,
        'address' => $ds->address,
        'phone' => get_null($ds->phone),
        'google_map' => get_null($ds->map),
        'contact' => get_null($ds->contact),
        'update_by' => $this->_user->uname,
        'update_at' => now()
      );

      if( ! $this->customers_model->update($ds->id, $arr))
      {
        $sc = FALSE;
        $this->error = "Failed to update customer";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $this->_response($sc);
  }


  public function get_new_code()
  {
    $prefix = "CL";
    $run_digit = 5;
    $id = $this->customers_model->get_last_id();
    $run_no = empty($id) ? 1 : $id + 1;

    $new_code = $prefix . sprintf('%0'.$run_digit.'d', $run_no);

    return $new_code;
  }

  function clear_filter()
  {
    $filter = array(
      'cust_name',
      'cust_phone',
      'cust_contact'
    );

    return clear_filter($filter);
  }
}


 ?>
