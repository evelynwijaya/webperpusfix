<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 05/06/2019
 * Time: 10:02
 */

class Penerbit_model extends CI_Model
{

    public function daftarPenerbit(){
        return $this->db->get('penerbit');
    }

    function checkPenerbit($where){
        $this->db->where($where);
        $query = $this->db->get("penerbit");
        if($query->num_rows()>0){
            return true;
        } else {
            return false;
        }
    }

    function input_penerbit($where)
    {
        $this->db->insert('penerbit',$where);
    }

}