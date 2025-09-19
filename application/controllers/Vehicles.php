<?php
class Vehicles extends PS_Controller
{
  public $title = "เพิ่ม/แก้ไข ยานพาหนะ";
  public $segment = 3;

  public function __construct()
  {
    parent::__construct();

    $this->home = base_url() . 'vehicles';
    $this->load->model('vehicles_model');
    $this->load->helper('vehicle');
  }


  public function index()
  {
    $filter = array(
      'code' => get_filter('code', 'vehicle_code', ''),
      'type' => get_filter('type', 'vehicle_type', 'all')
    );

    $perpage = get_rows();
    $rows = $this->vehicles_model->count_rows($filter);
    $filter['data'] = $this->vehicles_model->get_list($filter, $perpage, $this->uri->segment($this->segment));
    $init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
    $this->pagination->initialize($init);
    $this->load->view('vehicles/vehicles_list', $filter);
  }


  public function add_new()
  {
    $this->load->view('vehicles/vehicles_add');
  }


  public function add()
  {
    $sc = TRUE;
    $ds = json_decode($this->input->post('data'));

    if( ! empty($ds))
    {
      $arr = array(
        'code' => $ds->code,
        'type' => $ds->type,
        'pallet' => $ds->pallet,
        'weight' => $ds->weight,
        'active' => $ds->active == 0 ? 0 : 1,
        'create_by' => $this->_user->uname
      );

      if( ! $this->vehicles_model->add($arr))
      {
        $sc = FALSE;
        $this->error = "Failed to create vehicle";
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
    $ds = $this->vehicles_model->get_by_id($id);

    if( ! empty($ds))
    {
      $this->load->view('vehicles/vehicles_edit', ['ds' => $ds]);
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
        'code' => $ds->code,
        'type' => $ds->type,
        'pallet' => $ds->pallet,
        'weight' => $ds->weight,
        'active' => $ds->active == 0 ? 0 : 1,
        'update_by' => $this->_user->uname,
        'update_at' => now()
      );

      if( ! $this->vehicles_model->update($ds->id, $arr))
      {
        $sc = FALSE;
        $this->error = "Failed to update vehicle";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $this->_response($sc);
  }


  public function clear_filter()
  {
    $filter = array(
      'vehicle_code',
      'vehicle_type'
    );

    return clear_filter($filter);
  }
}


 ?>
