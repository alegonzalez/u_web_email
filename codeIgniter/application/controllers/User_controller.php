<?php

class User_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('User_controller/login');
	}

	//Tarea de Web

	public function refrescar()
	{

	//	$format= $this->uri->segment(2);

		if(array_key_exists("format", $_GET))
		{
			if($_GET['format']=='json')
			{
			  $this->load->view('User_controller/refrescar');
			}
		} else {
			$this->index();
		}

	} 


	public function json()
	{    
		//Obtiene todos los Email
		$this->db->select('users.Email');
		$this->db->from('users');
	    $Email = $this->db->get()->result_array();

		header('Content-Type: application/json;');
		echo json_encode(array('email' => $Email));

	}




	public function viewCreateAccount(){

		return  $this->load->view('User_controller/create_account');
	}

	public function email()
	{
		//hay que parsale el id del user de ese momento
		$data['date_Salida']= $this->User_model->ObtenerPendientes("hola");
		$data['date_send']= $this->User_model->ObtenerEnviados("hola");
		return $this->load->view('User_controller/email',$data);
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
	public function sendMailGmail($username,$Email ,$Address,$Topic,$Description)
	{

		$this->email->from($Email,$username);
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


		$data= $this->User_model->cronjob();
        //cargamos la vista para editar la información, pasandole dicha información.


		foreach ($data as $row) 
		{ 

			$this->sendMailGmail($row['UserName'],$row['Email'],$row['Address'],$row['Topic'],$row['Description']);
			echo "entro";
			
		}

		$this->User_model->actualizar_salida($data);


	}

	public function accion()
	{
		if(isset($_POST['delete'])) 
		{

			$Id= $_POST['delete'];
			$this->User_model->delete($Id);
			$this->email();
			

		}else if(isset($_POST['delete_all'])) 
		{

			foreach($_POST['checkbox'] as $id){

				$this->User_model->delete($id);

				
			};

			$this->email();

		} else if(isset($_POST['update'])) 
		{ 

		 //cargamos el modelo y obtenemos la información del student seleccionado.
			$this->load->model('User_model');

			$Id= $_POST['update'];

			$data['send'] = $this->User_model->obtenerId($Id);
        //cargamos la vista para editar la información, pasandole dicha información.

			
			$this->load->view('User_controller/edit_Email', $data);
		} 

	}


	public function descriptionEmail($product_id){

		$data['correo_ver'] = $this->User_model->obtenerId($product_id);
        //cargamos la vista para editar la información, pasandole dicha información

		return $this->load->view('User_controller/see_email',$data);
	}



	//obtienes los datos de los input para actualizar el msj Pendiente

	public function btnUpdate()
	{
		 //recogemos los datos por POST
		//$this->input->post->("id");
		//$this ->db-> get_where();
		///Como lo hice aqui es con el framework

		$data['Id'] = $_POST['id'];
		$data['Address'] = $_POST['address'];
		$data['Topic'] = $_POST['topic'];
		$data['Description'] = $_POST['description'];

		$data['User'] = $_POST['user'];

		$user= $this->User_model->user($data['User']);


		//Validar si existe el correo primero que todo

       //cargamos el modelo y llamamos a la función update()
		$this->load->model('User_model');
		$this->User_model->update($data);

		//Tiene que enviarse el msj a donde le pertenece
		$this->sendMailGmail($user[0]['UserName'],$user[0]['Email'],$data['Address'],$data['Topic'],$data['Description']);
       //volvemos a cargar la primera vista
		return $this->Email();



	}

}

?>