<?php
class UserController extends BaseController {

    /**
     * Muestra el perfil de un usuario dado.
     */

    public function getIndex(){

	//DB::insert('INSERT INTO user (Id,UserName,Photo,Email,Password,State)
	 //VALUES (9, "Angie", null , "angie" , "123", 1)');



    	$id="8";
    	$user = DB::select('select * from user where id='.$id);
	return  $user;

    }

}



?>
