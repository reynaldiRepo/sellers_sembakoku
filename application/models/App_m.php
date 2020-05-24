<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App_m extends CI_Model {

    public function add_seller($name, $email, $pwd, $alamat, $no_telp)
    {
        #cek email;
        $isExists = $this->db->get_where('users', ["username"=>$name])->num_rows();
        if($isExists  == 0){
            $this->db->insert("users", ["id"=>"",
                                        "username"=>$name, 
                                        "email"=>$email, 
                                        "password"=>base64_encode($pwd), 
                                        "role_id"=>"3",
                                        "created"=>date("Y/m/d"),
                                        "modified"=>date("Y/m/d")]);

            $this->db->insert("sellerdetails", ["name"=>$name, "address"=>$alamat, 
                                                 "no_telp"=>$no_telp, 
                                                 "created"=>date("Y/m/d"),
                                                 "modified"=>date("Y/m/d")]);

            $id_user = $this->db->get_where("users", ["username"=>$name])->row_array()["id"];
            $seller_detail = $this->db->get_where("sellerdetails", ["name"=>$name])->row_array()["id"];

            $this->db->insert("sellers", ["sellerdetail_id"=>$seller_detail, "user_id"=>$id_user,  "created"=>date("Y/m/d"), "modified"=>date("Y/m/d")]);

            return true;
        }
        else {
            return false;
        }
    }

    public function findSeller($username, $password)
    {
        $user = $this->db->get_where("users", ["username"=>$username, "password"=>base64_encode($password)]);
        $rows_user = $user->num_rows();
        if ($rows_user > 0){
            $id_seller = $this->db->get_where("sellers", ["user_id"=>$user->row_array()["id"]]);
            return [true, $username, $id_seller];
        }else{
            return [false];
        }
    }


}