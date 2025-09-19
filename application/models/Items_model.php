<?php
class Items_model extends CI_Model
{
  private $tb = "item";

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


  public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
  {
    if( ! empty($ds['code']))
    {
      $this->db
      ->group_start()
      ->like('code', $ds['code'])
      ->or_like('name', $ds['code'])
      ->group_end();
    }

    if(isset($ds['unit']) && $ds['unit'] != 'all')
    {
      $this->db->where('unit', $ds['unit']);
    }

    if(isset($ds['size']) && $ds['size'] != 'all')
    {
      $this->db->where('size', $ds['size']);
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
    if( ! empty($ds['code']))
    {
      $this->db
      ->group_start()
      ->like('code', $ds['code'])
      ->or_like('name', $ds['code'])
      ->group_end();
    }

    if(isset($ds['unit']) && $ds['unit'] != 'all')
    {
      $this->db->where('unit', $ds['unit']);
    }

    if(isset($ds['size']) && $ds['size'] != 'all')
    {
      $this->db->where('size', $ds['size']);
    }

    return $this->db->count_all_results($this->tb);
  }


  public function is_exists_size($code)
  {
    $count = $this->db->where('code', $code)->count_all_results('item_size');

    return $count > 0 ? TRUE : FALSE;
  }


  public function is_exists_unit($code)
  {
    $count = $this->db->where('code', $code)->count_all_results('item_unit');

    return $count > 0 ? TRUE : FALSE;
  }


  public function add_size(array $ds = array())
  {
    if( ! empty($ds))
    {
      return $this->db->insert('item_size', $ds);
    }

    return NULL;
  }


  public function add_unit(array $ds = array())
  {
    if( ! empty($ds))
    {
      return $this->db->insert('item_unit', $ds);
    }

    return NULL;
  }


  public function size_list()
  {
    $rs = $this->db
    ->order_by('position', 'ASC')
    ->order_by('code', 'ASC')
    ->get('item_size');

    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return NULL;
  }


  public function unit_list()
  {
    $rs = $this->db
    ->order_by('code', 'ASC')
    ->get('item_unit');

    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return NULL;
  }

} //--- end class


 ?>
