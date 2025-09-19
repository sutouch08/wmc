<?php
function select_item_size($se = NULL)
{
  $ds = "";

  $ci =& get_instance();

  $ci->load->model('items_model');

  $list = $ci->items_model->size_list();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $ds .= '<option value="'.$rs->code.'" '.is_selected($rs->code, $se).'>'.$rs->name.'</option>';
    }
  }

  return $ds;
}


function select_item_unit($se = NULL)
{
  $ds = "";

  $ci =& get_instance();

  $ci->load->model('items_model');

  $list = $ci->items_model->unit_list();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $ds .= '<option value="'.$rs->code.'" '.is_selected($rs->code, $se).'>'.$rs->name.'</option>';
    }
  }

  return $ds;
}


function item_size_array()
{
  $ds = [];
  $ci =& get_instance();
  $ci->load->model('items_model');
  $list = $ci->items_model->size_list();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $ds[$rs->code] = $rs->name;
    }
  }

  return $ds;
}


function item_unit_array()
{
  $ds = [];
  $ci =& get_instance();
  $ci->load->model('items_model');
  $list = $ci->items_model->unit_list();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $ds[$rs->code] = $rs->name;
    }
  }

  return $ds;
}
 ?>
