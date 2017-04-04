<?php

ob_start();
session_start();

if ($_POST['id']) {
	$_SESSION['dota_teams']['id'] = $_POST['id'];
}

?>
