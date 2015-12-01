<?php

session_start();
$_SESSION['number_random'];
$_SESSION["photo"];
$_SESSION["user"];
$_SESSION["password"];
$_SESSION["email"];
$_SESSION["session"];
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

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->load->model('User_model');
		$result = $this->User_model->validateLogin($email,$password);

		if($result==null){
			
			// $this->load->view('User_controller/login');
			redirect(base_url("login"));

		}else 

		{
			$result['date_send']= $this->User_model->ObtenerEnviados($result['id']);
			$result['date_Salida']= $this->User_model->ObtenerPendientes($result['id']);
			$_SESSION["session"] = $result;
			$result['photo'] = "ImageUser/" . $result['photo'];
			$this->load->view('User_controller/email',$result);
			//redirect('User_controller/email', 'refresh',$result);
			//hay que parsale el id del user de ese momento

		}

	}

//Upload of the image
	public function createAccount(){

/*

$date = [];

$date = $_FILES['files'];

$cadena;
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
if (($tamano_archivo !==0)) { 
move_uploaded_file($cadena[0]['tmp_name'],"$direccion/$nombre_archivo");
}



*/
$direccion = 'ImageUser';
//move_uploaded_file($_SESSION["photo"][2],"$direccion/" . $_SESSION["photo"][0]);
//echo $_SESSION["photo"][2] . " " . "$direccion/" . $_SESSION["photo"][0];
$this->load->model('User_model');
$this->User_model->insertAccount($_SESSION["user"],$_SESSION["email"],$_SESSION["password"]);	
$this->load->view('User_controller/login');
redirect(base_url('login'));
//$this->User_model->insertAccount($account,$nombre_archivo);	



}

//valid form fields
public function validateCamp(){
	$account = [];
	$account['username'] = $this->input->post('username');
	$account['email'] = $this->input->post('Email');
	$account['password'] = $this->input->post('password');
	$account['repitPassword'] = $this->input->post('repitPassword');
	
	$result = $this->User_model->validateUser($account['username'],$account['email']);
	if ((filter_var($account['email'],FILTER_VALIDATE_EMAIL))){

	}else{
		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo email es incorrecto'));
		return false;
	}
	if(isset($result[0])){


		if($result[0]->UserName == $account['username']){
			header('Content-Type: application/json');
			echo json_encode( array('status' => 'error','message' => 'Ya existe un usuario con el nombre: ' .$result[0]->UserName));
			return false;
		}else if($result[0]->Email == $account['email']){
			header('Content-Type: application/json');
			echo json_encode( array('status' => 'error','message' => 'El correo ya ha sido utilizado, por favor intente otro correo'));
			return false;
		}

	}
	else if($account['username']==""){
		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo user no puede quedar vacio'));
		return false;
	}
	else if($account['email'] == ""){
		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo email no puede quedar vacio'));	
		return false;
	}else if($account['password'] == ""){

		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo password no puede quedar vacio'));	
		return false;
	}else if($account['repitPassword'] == ""){

		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo repit password no puede quedar vacio'));	
		return false;
	}else if($account['repitPassword']!=$account['password']){

		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campo password y repeit password no coinciden'));	
		return false;
	}else if(strlen($account['password']) < 6){

		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campos password debe contener al menos 6 caracteres'));	
		return false;
	}else{
		return true;
	}
}

public function checkMail(){

	$estado = $this->validateCamp();	
	if($estado){


		$email = "alegonzal@gmail.com";
		$address = $this->input->post('Email');
		$topic = "Verificacion de correo";
		$descripcion = rand(1000,10000);
		$_SESSION["user"] = $this->input->post('username');;
		$date = $this->input->post('image');
		$_SESSION["photo"] = $date;
		$_SESSION["password"] = $this->input->post('password');
		$_SESSION["email"] = $address;
		$_SESSION['number_random']  = $descripcion;
		$this->email->from($email);
		$this->email->to($address);
		$this->email->subject($topic);
		$this->email->message($descripcion);

		if($this->email->send())
		{

	//$this->createAccount();
		}

		else
		{
			show_error($this->email->print_debugger());

		}
	}


}


//verification of the number the email with input
public function verificationRandom(){
	$number = $this->input->post('code');
	if($_SESSION['number_random'] == $number){
		$this->createAccount();
	}else{
		$this->load->view("User_controller/codeError");		
	}
}

//Edit user
public function editUser(){
	$editDate = [];
	$editDate['image'] = $this->input->post('image');
	$editDate['user'] = $this->input->post('username');
	$editDate['lastpassword'] = $this->input->post('last_password');
	$editDate['newpassword'] = $this->input->post('newpassword');

	if($editDate['lastpassword']==""){

		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El campos last password no puede quedar vacio'));	
		return false;
	}else{



		if($editDate['newpassword']!=""){
			if(strlen($editDate['newpassword']) < 6) {

				header('Content-Type: application/json');
				echo json_encode( array('status' => 'error','message' => 'El campos new password debe contener al menos 6 caracteres'));	
				return false;
			}

		}


		if($editDate['user']==""){
			header('Content-Type: application/json');
			echo json_encode( array('status' => 'error','message' => 'El campos user no puede quedar vacio'));	
			return false;
		} 
		$this->load->model('User_model');
		$estado = $this->User_model->verificationPassword($editDate['image'],$editDate['user'],$editDate['lastpassword'],$editDate['newpassword'],$_SESSION["session"]["id"]);
		if($estado == false){
			header('Content-Type: application/json');
			echo json_encode( array('status' => 'error','message' => 'El  password es incorrecto, por favor intentar nuevamente'));	
		}else{
			header('Content-Type: application/json');
			echo json_encode( array('status' => 'correct','message' => 'Se edito es usuario'));	

		}
	}
}
//load date the session the user and photo
public function loadDate(){
	header('Content-Type: application/json');
	echo json_encode( array('id' => $_SESSION["session"]["id"],'username' => $_SESSION["session"]['username'],'photo' =>$_SESSION["session"]['photo'] ));	

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
		

	}

	$this->User_model->actualizar_salida($data);


}

public function accion()
{
	if(isset($_POST['delete'])) 
	{

		$Id= $_POST['delete'];
		$this->User_model->delete($Id);
		redirect(base_url("getEmail"));


	}else if(isset($_POST['delete_all'])) 
	{

		foreach($_POST['checkbox'] as $id){

			$this->User_model->delete($id);


		};

		redirect(base_url("getEmail"));

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


public function btnSeeEmail()
{

	$result['date_send']= $this->User_model->ObtenerEnviados($_SESSION['session']['id']);
	$result['date_Salida']= $this->User_model->ObtenerPendientes($_SESSION['session']['id']);
	return $this->load->view('User_controller/email',$result);

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
	redirect(base_url("getEmail"));



}
public function emailDestination(){

	$email = $this->input->post('destinario');
	
	if ((filter_var($email,FILTER_VALIDATE_EMAIL))){
		header('Content-Type: application/json');
		echo json_encode( array('status' => 'correct','message' => 'El correo escrito esta correcto ' . $email));
	}else{
		
		header('Content-Type: application/json');
		echo json_encode( array('status' => 'error','message' => 'El correo escrito esta mal' . $email));
		return false;
	}
}

public function redact(){

	$destinario = $this->input->post('destinario');
	$asunto = $this->input->post('asunto');
	$description = $this->input->post('description');


	foreach ($destinario as $row) {
		if($row != ""){
			$this->User_model->update_pendient($row,$asunto,$description,$_SESSION['session']['id']);	
		}
		
	}

}
//close session
public function closeSession(){
	$_SESSION["user"]="";
	$_SESSION["password"]="";
	$_SESSION["email"]="";
	$_SESSION["session"]="";
	redirect(base_url("login"));
}

}

?>