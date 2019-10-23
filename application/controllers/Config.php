<?php


class Config extends CI_Controller{
function index(){
    if (!isset($_SESSION['profesion'])){
        header('Location: '.base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('config');
    $this->load->view('templates/footer');
}
function update(){
    $dato=$_POST['dato'];
    $id=$_POST['id'];
    $this->db->query("UPDATE configuracion SET dato='$dato' WHERE idconfiguracion='$id'");
    header("Location: ".base_url()."Config");
}
}