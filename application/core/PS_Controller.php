<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PS_Controller extends CI_Controller
{
  public $pm;
  public $home;
  public $close_system;
	public $_user;
  public $_Admin = FALSE;
	public $_SuperAdmin = FALSE;
  public $error;

  public function __construct()
  {
    parent::__construct();

    $uid = get_cookie('uid');

    //--- check is user has logged in ?
    if(empty($uid) OR ! $this->user_model->verify_uid($uid))
    {
      redirect(base_url().'authentication');
      exit();
    }
    else
    {

      $this->_user = $this->user_model->get_user_by_uid($uid);
      $this->_SuperAdmin = $this->_user->id_profile == -987654321 ? TRUE : FALSE;
      
      $this->close_system   = getConfig('CLOSE_SYSTEM'); //--- ปิดระบบทั้งหมดหรือไม่

      if($this->close_system == 1 && $this->_SuperAdmin === FALSE)
      {
        redirect(base_url().'setting/maintenance');
        exit();
      }
    }
  }


  public function _response($sc = TRUE)
  {
    echo $sc === TRUE ? 'success' : $this->error;
  }


  public function deny_page()
  {
    return $this->load->view('deny_page');
  }


  public function error_page($err = NULL)
  {
		$error = array('error_message' => $err);
    return $this->load->view('page_error', $error);
  }


	public function page_error($err = NULL)
  {
		$error = array('error_message' => $err);
    return $this->load->view('page_error', $error);
  }
}

?>
