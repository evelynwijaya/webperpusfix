<?php

class User_model extends CI_Model {

  public function __construct() {
      parent::__construct();
  }


    function cek_login($where){
        return $this->db->get_where('user',$where);
    }

}
