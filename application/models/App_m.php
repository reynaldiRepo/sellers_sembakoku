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
            $id_seller = $this->db->get_where("sellers", ["user_id"=>$user->row_array()["id"]])->row_array()["id"];
            return [true, $username, $id_seller];
        }else{
            return [false];
        }
    }

    public function tambah_produk($name, $price, $detail, $stok, $on_sale, $date, $image, $jenis_produk, $seller_id){
        $this->db->insert("items", 
            ["name"=>$name,
            "price"=>$price,
            "detail"=>$detail,
            "amount_of_stock"=>$stok,
            "on_sale"=>$on_sale,
            "date_of_sell"=>$date,
            "image_url"=>$image,
            "itemtype_id"=>$jenis_produk,
            "seller_id"=>$seller_id,
            "created"=>date("Y/m/d"), "modified"=>date("Y/m/d")]
        );
    }

    public function produk($id_seller)
    {
        $sql = "select *, 
        (SELECT sum(transactionitems.amount_items) 
        FROM transactionitems 
        WHERE transactionitems.item_id = items.id
        GROUP by transactionitems.item_id) as 'nItem'
        FROM items WHERE items.seller_id = '".$id_seller."'
        order by items.date_of_sell DESC";
        return $this->db->query($sql)->result();
    }

    public function get_produk($id_produk){
        return $this->db->get_where("items", ["id"=>$id_produk])->row_array();
    }

    public function edit_produk($id_produk, $data){
        $this->db->where("id", $id_produk);
        $this->db->update("items", $data);
    }

    public function order_get_order($seller_id)
    {
        $sql = "select transactionstatus.id as 'ts_id', transactionstatus.*, transactiondetails.*, items.name as 'produk'
        ,buyerdetails.name as 'pembeli', buyerdetails.address, tsprocesses.date_status
        from 
        transactions, transactionstatus, transactiondetails, transactionitems, sellers, buyers, items, buyerdetails, tsprocesses
        WHERE transactions.seller_id = '".$seller_id."'
        and transactionitems.transaction_id = transactions.id
        and transactiondetails.id = transactions.transactiondetail_id
        and transactionstatus.id = transactions.transactionstatus_id
        and sellers.id = transactions.seller_id
        and buyers.id = transactions.buyer_id
        and items.id = transactionitems.item_id
        and buyers.id = buyerdetails.id
        and transactionstatus.tsprocess_id != 'NULL'
        and tsprocesses.id = transactionstatus.tsprocess_id
        order by tsprocesses.date_status DESC";
        return $this->db->query($sql)->result();
    }

    public function order_get_dikirim($seller_id)
    {
        $sql = "select transactionstatus.*, transactiondetails.*, items.name as 'produk'
        ,buyerdetails.name as 'pembeli', buyerdetails.address, tssends.*
        from 
        transactions, transactionstatus, transactiondetails, transactionitems, sellers, buyers, items, buyerdetails, tssends
        WHERE transactions.seller_id = '".$seller_id."'
        and transactionitems.transaction_id = transactions.id
        and transactiondetails.id = transactions.transactiondetail_id
        and transactionstatus.id = transactions.transactionstatus_id
        and sellers.id = transactions.seller_id
        and buyers.id = transactions.buyer_id
        and items.id = transactionitems.item_id
        and buyers.id = buyerdetails.id
        and transactionstatus.tsprocess_id != 'NULL'
        and tssends.id = transactionstatus.tssend_id
        order by tssends.date_status DESC";
        return $this->db->query($sql)->result();
    }

    public function order_get_diterima($seller_id)
    {
        $sql = "select transactionstatus.*, transactiondetails.*, items.name as 'produk'
        ,buyerdetails.name as 'pembeli', buyerdetails.address, tsreceives.date_status
        from 
        transactions, transactionstatus, transactiondetails, transactionitems, sellers, buyers, items, buyerdetails, tsreceives
        WHERE transactions.seller_id = '".$seller_id."'
        and transactionitems.transaction_id = transactions.id
        and transactiondetails.id = transactions.transactiondetail_id
        and transactionstatus.id = transactions.transactionstatus_id
        and sellers.id = transactions.seller_id
        and buyers.id = transactions.buyer_id
        and items.id = transactionitems.item_id
        and buyers.id = buyerdetails.id
        and transactionstatus.tsprocess_id != 'NULL'
        and tsreceives.id = transactionstatus.tsreceive_id
        order by tsreceives.date_status DESC";
        return $this->db->query($sql)->result();
    }

    public function order_get_gagal($seller_id)
    {
        $sql = "select transactionstatus.*, transactiondetails.*, items.name as 'produk'
        ,buyerdetails.name as 'pembeli', buyerdetails.address, tscancels.date_status
        from 
        transactions, transactionstatus, transactiondetails, transactionitems, sellers, buyers, items, buyerdetails, tscancels
        WHERE transactions.seller_id = '".$seller_id."'
        and transactionitems.transaction_id = transactions.id
        and transactiondetails.id = transactions.transactiondetail_id
        and transactionstatus.id = transactions.transactionstatus_id
        and sellers.id = transactions.seller_id
        and buyers.id = transactions.buyer_id
        and items.id = transactionitems.item_id
        and buyers.id = buyerdetails.id
        and transactionstatus.tsprocess_id != 'NULL'
        and tscancels.id = transactionstatus.tscancel_id 
        order by tscancels.date_status DESC";
        return $this->db->query($sql)->result();
    }


    public function edit_seller($id_seller ,$name, $email, $alamat, $no_telp)
    {
        $seller = $this->db->get_where("sellers", ["id"=>$id_seller]);
        $user_id = $seller->row_array()["user_id"];
        $seller_detail = $seller->row_array()["sellerdetail_id"];
        $this->db->where("id", $user_id);
        $this->db->update("users", ["username"=>$name, "email"=>$email]);
        $this->db->where("id", $seller_detail);
        $this->db->update("sellerdetails",
            ["name"=>$name,
            "address"=>$alamat,
            "no_telp"=>$no_telp,
            "modified"=>date("Y/m/d")
            ]
        );
    }

    public function get_omset($id_seller)
    {
        $sql = "select SUM(transactiondetails.payment_amount) as 'untung'
        FROM transactions, transactiondetails
        WHERE transactions.seller_id = '".$id_seller."' and transactions.transactiondetail_id = transactiondetails.id";
        return $this->db->query($sql)->row_array();
    }
    


}