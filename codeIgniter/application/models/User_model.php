<?php
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
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
 //Actualiza el estado pendiente a estado enviado
	public function update_pendient($destinario,$asunto,$description,$id_User)
	{
		$data = array('Address' => $destinario, 'Topic' => $asunto, 'Description' => $description,'User' => $id_User,'State' => "Pendiente");

		$this->db->insert('send_email',$data);

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

		$this->db->select('users.* , send_email.Id_send,send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , "users.id= $user", 'left');
		$this->db->where("send_email.State='Enviado' and users.id = $user and send_email.User= $user");

		$enviado=$this->db->get();

		return  $enviado->result_array();

	}

	//Obtiene todos los enviados
	public function ObtenerPendientes($user)
	{
		
		$this->db->select('users.* ,send_email.Id_send,send_email.Address , send_email.Topic ,send_email.Description');
		$this->db->from('users');
		$this->db->join('send_email' , "users.id= $user", 'left');
		$this->db->where("send_email.State='Pendiente' and users.id= $user and send_email.User= $user");

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


	public function Enviado()
	{
		//hacer la actualizacion de los correos de salida;
	}


	public function delete($Id)
	{
		$this->db->where('Id_send', $Id);
		$this->db->delete('send_email');


	}
	public function validateUser($user,$email){
<<<<<<< HEAD

=======
 
>>>>>>> origin/master
		$sql = "SELECT * FROM users WHERE username = ? 	OR Email = ?";
		$query = $this->db->query($sql, array($user,$email));
		return $query->result();
	}


//Insert  the account  the user
	public function insertAccount($user,$email,$password){
		$key = 'emailPassword';
		$pass = $this->encrypt->encode($password,$key);
		$this->db->select_max('Id');
		$query = $this->db->get('users'); 
		$id= $query->result_array(); 
		$this->db->set('Id',$id[0]['Id']+1);
		$this->db->set('UserName',$user);
		$this->db->set('Photo',null);
		$this->db->set('Email',$email);
		$this->db->set('Password',$pass);

		return $this->db->insert('users');

	}

//Validate the login of the user
	public function validateLogin($email,$password){
		$date = [];
		$query = $this->db->get('users');
		$key = 'emailPassword';

		foreach ($query->result() as $row)
		{

			$pass = $this->encrypt->decode($row->Password, $key);	

			if($row->Email==$email&&$password==$pass)
			{
				
				$date['id'] = $row->Id;
				$date['photo'] = $row->Photo;
				$date['username'] = $row->UserName;

				return $date;
			}


		}

		return $date;

	}

//verification of password
	public function verificationPassword($imagen,$user,$lastPassword,$newPassword,$id){
		$key = 'emailPassword';
		$sql = "SELECT * FROM users WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$result = $query->result();
		
		$pass = $this->encrypt->decode($result[0]->Password, $key);
		if(sizeof($result)>0 && $pass == $lastPassword){
			$this->editUser($imagen,$user,$newPassword,$id);
			return true;
		}else{
			echo "Hola mundo";
			return false;
		}
	}
//Edit user
	public function editUser($imagen,$user,$newPassword,$id){
		$key = 'emailPassword';
		$pass = $this->encrypt->encode($newPassword,$key);
		if($newPassword == ""){
			$data = array(
				'UserName' => $user,
				'Photo' => $imagen,
				);

			$this->db->where('Id', $id);
			$this->db->update('users', $data);

		}else{
			$data = array(
				'UserName' => $user,
				'Photo' => $imagen,
				'Password' => $pass
				);

			$this->db->where('Id', $id);
			$this->db->update('users', $data);

		}

		return true;
	}


}

?>