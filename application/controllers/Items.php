<?php
class Items extends PS_Controller
{
  public $title = "เพิ่ม/แก้ไข รายการสินค้า";
  public $segment = 3;

  public function __construct()
  {
    parent::__construct();

    $this->home = base_url() . 'items';
    $this->load->model('items_model');
    $this->load->helper('item');
  }


  public function index()
  {
    $filter = array(
      'code' => get_filter('code', 'item_code', ''),
      'unit' => get_filter('unit', 'item_unit', 'all'),
      'size' => get_filter('size', 'item_size', 'all')
    );

    $perpage = get_rows();
    $rows = $this->items_model->count_rows($filter);
    $filter['data'] = $this->items_model->get_list($filter, $perpage, $this->uri->segment($this->segment));
    $init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
    $this->pagination->initialize($init);
    $this->load->view('items/items_list', $filter);
  }


  public function add_new()
  {
    $this->load->view('items/items_add');
  }


  public function add()
  {
    $sc = TRUE;
    $ds = json_decode($this->input->post('data'));

    if( ! empty($ds))
    {
      $arr = array(
        'code' => $ds->code,
        'name' => $ds->name,
        'unit' => $ds->unit,
        'size' => $ds->size,
        'weight' => $ds->weight,
        'price' => $ds->price,
        'create_by' => $this->_user->uname
      );

      if( ! $this->items_model->add($arr))
      {
        $sc = FALSE;
        $this->error = "Failed to create item";
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
    $ds = $this->items_model->get_by_id($id);

    if( ! empty($ds))
    {
      $this->load->view('items/items_edit', ['ds' => $ds]);
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
        'unit' => $ds->unit,
        'size' => $ds->size,
        'weight' => $ds->weight,
        'price' => $ds->price,
        'update_by' => $this->_user->uname,
        'update_at' => now()
      );

      if( ! $this->items_model->update($ds->id, $arr))
      {
        $sc = FALSE;
        $this->error = "Failed to update item";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $this->_response($sc);
  }


  public function add_size()
  {
    $sc = TRUE;
    $code = $this->input->post('code');
    $name = $this->input->post('name');
    $data = [];

    if( ! empty($code) && ! empty($name))
    {
      if( ! $this->items_model->is_exists_size($code))
      {
        $data = array(
          'code' => $code,
          'name' => $name
        );

        if( ! $this->items_model->add_size($data))
        {
          $sc = FALSE;
          set_error('insert');
        }
      }
      else
      {
        $sc = FALSE;
        $this->error = "{$code} : {$name} already exists";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $arr = array(
      'status' => $sc === TRUE ? 'success' : 'failed',
      'message' => $sc === TRUE ? 'success' : $this->error,
      'data' => $data
    );


    echo json_encode($arr);
  }


  public function add_unit()
  {
    $sc = TRUE;
    $code = $this->input->post('code');
    $name = $this->input->post('name');
    $data = [];

    if( ! empty($code) && ! empty($name))
    {
      if( ! $this->items_model->is_exists_unit($code))
      {
        $data = array(
          'code' => $code,
          'name' => $name
        );

        if( ! $this->items_model->add_unit($data))
        {
          $sc = FALSE;
          set_error('insert');
        }
      }
      else
      {
        $sc = FALSE;
        $this->error = "{$code} : {$name} already exists";
      }
    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

    $arr = array(
      'status' => $sc === TRUE ? 'success' : 'failed',
      'message' => $sc === TRUE ? 'success' : $this->error,
      'data' => $data
    );


    echo json_encode($arr);
  }

  function clear_filter()
  {
    $filter = array(
      'item_code',
      'item_unit',
      'item_size'
    );

    return clear_filter($filter);
  }
}


 ?>
