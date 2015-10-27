<?php
class UserController extends BaseController {

    /**
     * Muestra el perfil de un usuario dado.
     */
        //DB::insert('INSERT INTO user (Id,UserName,Photo,Email,Password,State)
     //VALUES (9, "Angie", null , "angie" , "123", 1)');
    //  $id="8";
    //  $user = DB::select('select * from user where id='.$id);
    //return  $user;
  


    public function getIndex(){

    
     return View::make('UserController.login');
    
    }

     public function postIndex(){

     //Tengo que poner la pagina email
   //return View::make('UserController.create_account');
    
    }




    public function get_create()
    {
 //       $email=Input::get('email');

       $user = User::all();
        return View::make('UserController.create_account')->with ('UserController',$user);
    }

    public function post_create()
    {
          $user = new User;

        $user->Id = 123;
        $user->UserName =Input::get('UserName');
        $user->Photo ="null";
//         $user-= Input::get('hola');
        $user->Email =Input::get('Email');
        $user->Password=Input::get('Password');
        $user->State= 1;
    

        $user->save();

        return var_dump($user);
      
    }


}




/**


        **/

