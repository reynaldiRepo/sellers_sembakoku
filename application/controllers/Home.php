<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("App_m", "am");
    }
    

    public function index() {
        $this->load->view("login");
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

    private function load_view($view, $data){
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

        

}