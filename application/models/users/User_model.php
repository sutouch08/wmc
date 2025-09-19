<?php
class User_model extends CI_Model
{
  private $tb = "user";

  public function __construct()
  {
    parent::__construct();
  }


  public function get_all($all = TRUE)
  {
    if( ! $all)
    {
      $this->db->where('active', 1);
    }

    $rs = $this->db->order_by('uname', 'ASC')->get($this->tb);

    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return NULL;
  }


  public function add(array $ds = array())
  {
    if( ! empty($ds))
    {
      return $this->db->insert($this->tb, $ds);
    }

    return FALSE;
  }

  public function update($id, array $ds = array())
  {
    if( ! empty($ds))
    {
      return $this->db->where('id', $id)->update($this->tb, $ds);
    }

    return FALSE;
  }


  public function delete($id)
  {
    return $this->db->where('id', $id)->delete($this->tb);
  }


  public function get_by_id($id)
  {
    $rs = $this->db->where('id', $id)->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row();
    }

    return NULL;
  }


  public function get_user_by_uid($uid)
  {
    $rs = $this->db->where('uid', $uid)->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row();
    }

    return NULL;
  }


  public function get($uname)
  {
    $rs = $this->db->where('uname', $uname)->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row();
    }

    return NULL;
  }


  public function get_name($uname)
  {
    $rs = $this->db->where('uname', $uname)->get($ths->tb);

    if($rs->num_rows() == 1)
    {
      return $rs->row()->name;
    }

    return NULL;
  }


  public function get_list(array $ds = array(), $perpage = 50, $offset = 0)
  {
    if( ! empty($ds['uname']))
    {
      $this->db->like('uname', $ds['uname']);
    }

    if( ! empty($ds['dname']))
    {
      $this->db->like('name', $ds['dname']);
    }

    if( ! empty($ds['ugroup']) && $ds['ugroup'] != 'all')
    {
      $this->db->where('ugroup', $ds['ugroup']);
    }

    if(isset($ds['active']) && $ds['active'] != 'all')
    {
      $this->db->where('active', $ds['active']);
    }

    $rs = $this->db
    ->order_by('uname', 'ASC')
    ->limit($perpage, $offset)
    ->get($this->tb);

    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return NULL;
  }


  public function count_rows(array $ds = array())
  {
    if( ! empty($ds['uname']))
    {
      $this->db->like('uname', $ds['uname']);
    }

    if( ! empty($ds['dname']))
    {
      $this->db->like('name', $ds['dname']);
    }

    if( ! empty($ds['ugroup']) && $ds['ugroup'] != 'all')
    {
      $this->db->where('ugroup', $ds['ugroup']);
    }

    if(isset($ds['active']) && $ds['active'] != 'all')
    {
      $this->db->where('active', $ds['active']);
    }

    return $this->db->count_all_results($this->tb);
  }


  public function is_exists($uname, $id = NULL)
  {
    if( ! empty($id))
    {
      $this->db->where('id !=', $id);
    }

    $count = $this->db->where('uname', $uname)->count_all_results($this->tb);

    return $count > 0 ? TRUE : FALSE;
  }


  public function is_exists_name($name, $id = NULL)
  {
    if( ! empty($id))
    {
      $this->db->where('id !=', $id);
    }

    $count = $this->db->where('name', $name)->count_all_results($this->tb);

    return $count > 0 ? TRUE : FALSE;
  }


  public function get_user_credentials($uname)
  {
    $rs = $this->db
    ->where('uname', $uname)
    ->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row();
    }

    return NULL;
  }


  public function change_password($id, $pwd)
  {
    $this->db->set('pwd', $pwd);
    $this->db->where('id', $id);
    return $this->db->update($this->tb);
  }


  public function verify_uid($uid)
  {
    $count = $this->db
    ->select('uid')
    ->where('uid', $uid)
    ->where('active', 1)
    ->count_all_results($this->tb);

    return $count > 0 ? TRUE : FALSE;
  }


	public function has_transection($uname)
	{
		return TRUE;
	}


} //---- End class

 ?>
