<?php
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function Salida() {


		$this->db->select('users.Email , send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , 'users.id=send_email.User', 'left');
		$this->db->where('users.State = 1 and users.id= send_email.User');

		$state = $this->db->get();
		return $state->result_array();

	}


	public function Enviado()
	{
		//hacer la actualizacion de los correos de salida;
	}

}

?>