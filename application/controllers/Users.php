<?php
  class Users extends PS_Controller
  {
    public $title = "เพิ่ม/แก้ไข ผู้ใช้งาน";
    public $segment = 3;

    public function __construct()
    {
      parent::__construct();
      $this->home = base_url()."users";
      $this->load->model('users/user_model');
    }

    public function index()
    {
      $filter = array(
        'uname' => get_filter('uname', 'username', ''),
        'name' => get_filter('dname', 'dname', ''),
        'plate_no' => get_filter('plate_no', 'plate_no', ''),
        'ugroup' => get_filter('ugroup', 'ugroup', 'all'),
        'active' => get_filter('active', 'uactive', 'all')
      );

      $perpage = get_rows();

      $segment = $this->segment;
      $rows = $this->user_model->count_rows($filter);
      $filter['data'] = $this->user_model->get_list($filter, $perpage, $this->uri->segment($segment));
      $init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
      $this->pagination->initialize($init);
      $this->load->view('users/users_list', $filter);
    }


    public function add_new()
    {
      $this->load->view('users/users_add');
    }


    public function add()
    {
      $sc = TRUE;
      $ds = json_decode($this->input->post('data'));

      if( ! empty($ds))
      {
        if($this->user_model->is_exists($ds->uname))
        {
          $sc = FALSE;
          $this->error = "{$ds->uname} already exists";
        }

        if($sc === TRUE)
        {
          if($this->user_model->is_exists_name($ds->name))
          {
            $sc = FALSE;
            $this->error = "{$ds->name} already exists";
          }
        }

        if($sc === TRUE)
        {
          $arr = array(
            'uname' => $ds->uname,
            'name' => $ds->name,
            'pwd' => password_hash($ds->pwd, PASSWORD_DEFAULT),
            'uid' => md5(uniqid()),
            'ugroup' => $ds->ugroup,
            'active' => $ds->active,
            'plate_no' => $ds->plate_no,
            'create_by' => $this->_user->uname
          );

          if( ! $this->user_model->add($arr))
          {
            $sc = FALSE;
            $this->error = "Failed to create user";
          }
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
      $ds = $this->user_model->get_by_id($id);

      if( ! empty($ds))
      {
        $this->load->view('users/users_edit', ['ds' => $ds]);
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
        $id = $ds->id;

        if($this->user_model->is_exists($ds->uname, $id))
        {
          $sc = FALSE;
          $this->error = "{$ds->uname} already exists";
        }

        if($sc === TRUE)
        {
          if($this->user_model->is_exists_name($ds->name, $id))
          {
            $sc = FALSE;
            $this->error = "{$ds->name} already exists";
          }
        }

        if($sc === TRUE)
        {
          $arr = array(
            'uname' => $ds->uname,
            'name' => $ds->name,
            'ugroup' => $ds->ugroup,
            'active' => $ds->active,
            'plate_no' => $ds->plate_no,
            'update_at' => now(),
            'update_by' => $this->_user->uname
          );

          if( ! $this->user_model->update($id, $arr))
          {
            $sc = FALSE;
            $this->error = "Failed to update user";
          }
        }
      }
      else
      {
        $sc = FALSE;
        set_error('required');
      }

      $this->_response($sc);
    }


    public function reset_pwd($id)
    {
      $ds = $this->user_model->get_by_id($id);

      if( ! empty($ds))
      {
        $this->load->view('users/users_reset_pwd', ['ds' => $ds]);
      }
      else
      {
        $this->page_error();
      }
    }


    public function update_pwd()
    {
      $sc = TRUE;
      $ds = json_decode($this->input->post('data'));

      if( ! empty($ds))
      {
        $id = $ds->id;

        if(isset($ds->pwd) && $ds->pwd != '')
        {
          $arr = array(
            'pwd' => password_hash($ds->pwd, PASSWORD_DEFAULT),
            'update_at' => now(),
            'update_by' => $this->_user->uname
          );

          if( ! $this->user_model->update($id, $arr))
          {
            $sc = FALSE;
            $this->error = "Failed to update user";
          }
        }
      }
      else
      {
        $sc = FALSE;
        set_error('required');
      }

      $this->_response($sc);
    }


    function clear_filter()
    {
      $filter = array(
        'username',
        'dname',
        'plate_no',
        'ugroup',
        'uactive'
      );

      return clear_filter($filter);
    }


  } //--- end class
?>
