<?php

class User_controller extends CI_Controller {

	
	public function index()
	{
		$this->load->view('User_controller/login');
	}

	public function viewCreateAccount(){

		return  $this->load->view('User_controller/create_account');
	}

	public function email()
	{
		return $this->load->view('User_controller/email');
	}

	public function sendMailGmail()
	{

		$this->email->from('alegonzalez21195@gmail.com');
		$this->email->to("angiekarina31@gmail.com");
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');		
		if($this->email->send())
		{
			echo 'Correo enviado';
		}

		else
		{
			show_error($this->email->print_debugger());

			var_dump($this->email->print_debugger());
		}

	}
}

?>