<?php
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

//Obtiene todos los de estado pendiente
	public function cronjob() {

		$this->db->select('users.UserName , users.Email ,send_email.Id_send ,send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , 'users.id=send_email.User', 'left');
		$this->db->where('send_email.State = "Pendiente" and users.id= send_email.User');

		$state = $this->db->get();
		return $state->result_array();

	}

 //Actualiza el estado pendiente a estado enviado
	public function actualizar_salida($data)
	{
		$state = array(
			'State' => "Enviado"
			);

		foreach ($data as $row) 
		{ 
			$this->db->where('Id_send', $row['Id_send']);
			$this->db->update('send_email',$state);			
		}

	}

//obtiene datos del user
	function user($user)
	{

		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.id='.$user);

		$enviado=$this->db->get();

		return  $enviado->result_array();


	}

//actualiza el msj que esta en pendiente
	function update($data) {

		$state = array(
			'Address' => $data['Address'],
			'Topic'=> $data['Topic'],
			'Description'=>$data['Description'],
			'State'=>"Enviado"

			);

		$this->db->where('Id_send', $data['Id']);
		$this->db->update('send_email',$state);
	}


//Obtiene todos los enviados
	public function ObtenerEnviados($user)
	{
		$user="207460543";
		$this->db->select('users.* , send_email.Id_send,send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , 'users.id= 207460543', 'left');
		$this->db->where('send_email.State="Enviado" and users.id = 207460543 and send_email.User= 207460543');

		$enviado=$this->db->get();

		return  $enviado->result_array();

	}

	//Obtiene todos los enviados
	public function ObtenerPendientes($user)
	{
		$user="207460543";
		$this->db->select('users.* ,send_email.Id_send,send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , 'users.id= 207460543', 'left');
		$this->db->where('send_email.State="Pendiente" and users.id= 207460543 and send_email.User= 207460543');

		$enviado=$this->db->get();

		return  $enviado->result_array();

	}

		//aqui hay que validar los usuarios

	function obtenerId($id) {

		$this->db->select('Id_send,Address , Topic, Description,user');
		$this->db->from('send_email');
		$this->db->where('Id_send= '.$id);
		$student = $this->db->get();
		return $student->result();

	}


	function delete($Id)
	{
		$this->db->where('Id_send', $Id);
		$this->db->delete('send_email');


	}


}

?>