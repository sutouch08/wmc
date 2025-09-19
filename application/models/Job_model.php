<?php
class Job_model extends CI_Model 
{
  private $tb = "jobs";
  private $td = "job_details";
  
  public function __construct()
  {
    parent::__construct();
  }
} //--- end class 

?>