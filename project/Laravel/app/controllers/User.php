<?php
class User extends BaseController {

    /**
     * Muestra el perfil de un usuario dado.
     */
    public function showProfile($id)
    {
        $user = User::find($id);

        return View::make('user.profile', array('user' => $user));
    }

}