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

	public function sendMailGmail($Email ,$Address,$Topic,$Description)
	{

		$this->email->from($Email);
		$this->email->to($Address);
		$this->email->subject($Topic);
		$this->email->message($Description);		
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

	public function cronjob()
	{
		$data= $this->User_model->Salida();
        //cargamos la vista para editar la información, pasandole dicha información.

		foreach ($data as $row) 
		{ 
		
				$this->sendMailGmail($row['Email'],$row['Address'],$row['Topic'],$row['Description']);
		
			
		}


	}

}

?>