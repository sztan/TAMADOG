<?php
include('Animal.class.php');
session_start();
$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action']; // (cannot do )$_SESSION['animal']-> $data['action']($data['arg']);
$arg = $data['arg'];
$_SESSION['animal']->$action($arg);
echo json_encode($_SESSION['animal']);
?>
