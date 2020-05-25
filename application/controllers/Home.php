<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("app_m", "am");
    }
    

    public function index() {
        if($this->session->userdata("username") == ""){
        $this->load->view("login");
        }else{
            redirect("Home/home");
        }
    }

    public function login_pros(){
        $login = $this->am->findSeller($this->input->post("username"), $this->input->post("password"));
        if ($login[0] == true){
            $this->session->set_userdata("username",$login[1]);
            $this->session->set_userdata("id_seller",$login[2]);
            redirect("Home/home");
        }else{
            $this->session->set_flashdata('msg', "<div class='alert alert-warning'>Username atau password salah</div>");
            redirect("Home/");
        }
    }

    public function logout(){
        session_destroy();
        redirect("/");
    }

    public function register(){
        $this->load->view("register");
    }

    public function register_pros(){
        $insert = $this->am->add_seller($this->input->post("username"),
                                $this->input->post("email"),
                                $this->input->post("password"),
                                $this->input->post("alamat"),
                                $this->input->post("no_telp"));
        echo $insert;    
    }

    private function load_view($view, $data=["data",""]){
        $this->load->view("header", $data);
        $this->load->view($view, $data);
        $this->load->view("footer");
    }

    private function cek_session(){
        if($this->session->userdata("username") == ""){
            redirect("/");
        }
    }

    public function home(){
        $this->cek_session();
        $this->load_view("home", ["Data"=>"data"]);
    }

    public function produk(){
        $this->cek_session();
        $data["produk"] = $this->am->produk($this->session->userdata("id_seller"));
        $this->load_view("produk", $data);
    }

    public function add_produk(){
        $this->cek_session();
        $data["item_type"] = $this->db->get("itemtypes")->result();
        $this->load_view("add_produk", $data);
    }

    private function _uploadImage($seller_id, $form)
    {
        $config['upload_path']          = './upload/product';
        $config['allowed_types']        = 'gif|jpg|png|';
        $config['file_name']            = date("YmdHis").uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("image")) {
            return [$this->upload->data("file_name"), true];
        }else{
            return [$this->upload->display_errors(), false];
        }
        
    }

    public function add_produk_pros(){
        $this->cek_session();
        $image = $this->_uploadImage($this->session->userdata("id_seller"), "image");
        if ($image[1] == true){
            $name = $this->input->post("name");
            $price = $this->input->post("harga");
            $detail = $this->input->post("desc");
            $stok = $this->input->post("stok");
            $on_sale = $this->input->post("on_sale");
            $date = date("Y/m/d");
            $imageIn = $image[0];
            $jenis_produk = $this->input->post("tipe_barang");
            $seller_id = $this->session->userdata("id_seller");
            $this->am->tambah_produk($name, $price, $detail, $stok, $on_sale, $date, $imageIn, $jenis_produk, $seller_id);
            $this->session->set_flashdata('msg', "<div class='alert alert-success'>Tambah Produk Sukses</div>");
            redirect("Home/produk");
            
        }else{
            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".$image[0]."</div>");
            redirect("Home/add_produk");
        }
    }

    public function edit_produk($id_produk)
    {
        $this->cek_session();
        $data["item_type"] = $this->db->get("itemtypes")->result();
        $data["produk"] = $this->am->get_produk($id_produk);
        $this->load_view("edit_produk", $data);
    }

    public function edit_produk_pros($id_produk){
        $this->cek_session();
        $name = $this->input->post("name");
        $price = $this->input->post("harga");
        $detail = $this->input->post("desc");
        $stok = $this->input->post("stok");
        $on_sale = $this->input->post("on_sale");
        $date = date("Y/m/d");
        $jenis_produk = $this->input->post("tipe_barang");
        $seller_id = $this->session->userdata("id_seller");
        if($_FILES["image"]["error"] == 4) {
            $data =  ["name"=>$name,
            "price"=>$price,
            "detail"=>$detail,
            "amount_of_stock"=>$stok,
            "on_sale"=>$on_sale,
            "date_of_sell"=>$date,
            "itemtype_id"=>$jenis_produk,
            "seller_id"=>$seller_id,
            "modified"=>date("Y/m/d")];
            $this->am->edit_produk($id_produk, $data);
            $this->session->set_flashdata('msg', "<div class='alert alert-success'>Tambah Produk Sukses</div>");
            redirect("Home/produk");
        }else{
            $image = $this->_uploadImage($this->session->userdata("id_seller"), "image");
            if ($image[1] == true){
                $data =  ["name"=>$name,
                "price"=>$price,
                "detail"=>$detail,
                "amount_of_stock"=>$stok,
                "on_sale"=>$on_sale,
                "date_of_sell"=>$date,
                "itemtype_id"=>$jenis_produk,
                "seller_id"=>$seller_id,
                "image_url"=>$image[0],
                "modified"=>date("Y/m/d")];
                $this->am->edit_produk($id_produk, $data);
                $this->session->set_flashdata('msg', "<div class='alert alert-success'>Tambah Produk Sukses</div>");
                redirect("Home/produk");
            }else{
                $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".$image[0]."</div>");
                redirect("Home/edit_produk/".$id_produk);
            }
        }
       
    }

    public function delete_produk($id_produk){
        $this->cek_session();
        $this->db->delete("items", ["id"=>$id_produk]);
        $this->session->set_flashdata('msg', "<div class='alert alert-success'>Delete Produk Sukses</div>");
        redirect("Home/produk");
    }

    public function order()
    {
        $this->cek_session();
        $this->load_view("order");
    }

}