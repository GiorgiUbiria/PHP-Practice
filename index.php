<?php

// Include the controller and model files
require_once 'controllers/Users.php';
require_once 'models/User.php';

// Create an instance of the Users controller
$usersController = new Users();

// Determine the current page based on the URL
$page = isset($_GET['id']) ? 'show' : 'index';

// Call the appropriate method of the Users controller based on the $page variable
if ($page == 'show') {
    // Get the user ID from the URL
    $id = $_GET['id'];
    // Call the show method on the controller, passing in the user ID
    $usersController->show($id);
} else {
    // Call the index method on the controller
    $usersController->index();
}

// Get the user ID from the URL (e.g. index.php?id=1)
$id = null;
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
}
