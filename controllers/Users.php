<?php

class Users
{
    public function show($id)
    {
        // Load the user from the database
        $user = User::find($id);

        // Render the view
        require 'views/users/show.php';
    }

    public function index()
    {
        // Load all the users from the database
        $users = User::all();

        // Render the view
        require 'views/users/index.php';
    }
}
