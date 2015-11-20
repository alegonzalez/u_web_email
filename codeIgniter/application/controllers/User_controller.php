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
//Upload of the image
	public function createAccount(){
		$date = [];
		
		$date = $_FILES['files'];
		
		$cadena ;
		$file_ary = array();
		$file_count = count($date['name']);
		$file_keys = array_keys($date);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $date[$key][$i];
				
				$cadena [$i][$key] = ($file_ary[$i][$key]);

			}
		}

		$direccion = 'ImageUser';
		$nombre_archivo = $cadena[0]['name']; 
		$tipo_archivo = $cadena[0]['type']; 
		$tamano_archivo = $cadena[0]['size']; 	
		if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")||strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
		}else{ 
			if (move_uploaded_file($cadena[0]['tmp_name'],"$direccion/$nombre_archivo")){ 
				echo "El archivo ha sido cargado correctamente."; 
			}else{ 
				echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
			} 
		}
		$date['username'] = $this->input->post('username');
		$date['email'] = $this->input->post('Email');
		$date['password'] = $this->input->post('Password');
		$date['repitPassword'] = $this->input->post('repitPassword');
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