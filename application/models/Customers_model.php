<?php
class Customers_model extends CI_Model
{
  private $tb = "customer";

  public function __construct()
  {
    parent::__construct();
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


  public function get($code)
  {
    $rs = $this->db->where('code', $code)->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row();
    }

    return NULL;
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


  public function get_last_id()
  {
    $rs = $this->db->select_max('id')->get($this->tb);

    if($rs->num_rows() === 1)
    {
      return $rs->row()->id;
    }

    return NULL;
  }


  public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
  {
    if( ! empty($ds['name']))
    {
      $this->db
      ->group_start()
      ->like('name', $ds['name'])
      ->or_like('code', $ds['name'])
      ->group_end();
    }

    if( ! empty($ds['phone']))
    {
      $this->db->like('phone', $ds['phone']);
    }

    if( ! empty($ds['contact']))
    {
      $this->db->like('contact', $ds['contact']);
    }

    $rs = $this->db
    ->order_by('id', 'DESC')
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
    if( ! empty($ds['name']))
    {
      $this->db
      ->group_start()
      ->like('name', $ds['name'])
      ->or_like('code', $ds['name'])
      ->group_end();
    }

    if( ! empty($ds['phone']))
    {
      $this->db->like('phone', $ds['phone']);
    }

    if( ! empty($ds['contact']))
    {
      $this->db->like('contact', $ds['contact']);
    }

    return $this->db->count_all_results($this->tb);
  }

} //--- end class


 ?>
