<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	function login(){
	    $user=$_POST['user'];
        $password=$_POST['password'];
        $query=$this->db->query("SELECT * FROM profesor WHERE usuario='$user' AND id='$password'");
        if ($query->num_rows()==1){
            $row=$query->row();
            $_SESSION['colegio']=$row->colegio;
            $_SESSION['nombre']=$row->nombre;
            $_SESSION['profesion']=$row->profesion;
            $_SESSION['colegio']=$row->colegio;
            $_SESSION['usuario']=$row->usuario;
            header('Location: '.base_url().'Main');
        }else{
            header('Location: '.base_url().'');
        }
    }
    function logout(){
	    session_destroy();
        header('Location: '.base_url().'');
    }
}
