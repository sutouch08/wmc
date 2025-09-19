<?php
function _check_login()
{
  $CI =& get_instance();
  $uid = get_cookie('uid');
  if($uid === NULL OR $CI->user_model->verify_uid($uid) === FALSE)
  {
    redirect(base_url().'authentication');
  }
}


function select_user_id($user_id = NULL)
{
  $sc = "";
  $ci =& get_instance();
  $list = $ci->user_model->get_all();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $sc .= '<option value="'.$rs->id.'" data-uname="'.$rs->uname.'" data-uid="'.$rs->uid.'" '.is_selected($rs->id, $user_id).'>'.$rs->uname.' : '.$rs->name.'</option>';
    }
  }

  return $sc;
}


function select_uname($uname = NULL)
{
  $sc = "";
  $ci =& get_instance();
  $list = $ci->user_model->get_all();

  if( ! empty($list))
  {
    foreach($list as $rs)
    {
      $sc .= '<option value="'.$rs->uname.'" data-id="'.$rs->id.'" data-uid="'.$rs->uid.'" '.is_selected($rs->uname, $uname).'>'.$rs->name.'</option>';
    }
  }

  return $sc;
}


function select_user($uname = NULL)
{
	$ds = '';
	$ci =& get_instance();
	$ci->load->model('users/user_model');
	$option = $ci->user_model->get_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= '<option value="'.$rs->uname.'" '.is_selected($rs->uname, $uname).'>'.$rs->name.'</option>';
		}
	}

	return $ds;
}


function display_name($uname)
{
  $ci =& get_instance();
  $ci->load->model('users/user_model');
  $name = $ci->user_model->get_name($uname);

  return $name;
}

 ?>
