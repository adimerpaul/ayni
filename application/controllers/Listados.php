<?php


class Listados extends CI_Controller{
function docentes(){
    if (!isset($_SESSION['profesion'])){
        header('Location: '.base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('docentes');
    $this->load->view('templates/footer');
}
    function estudiantes(){
        if (!isset($_SESSION['profesion'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('estudiantes');
        $this->load->view('templates/footer');
    }
    function libros(){
        if (!isset($_SESSION['profesion'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('libros');
        $this->load->view('templates/footer');
    }
}
