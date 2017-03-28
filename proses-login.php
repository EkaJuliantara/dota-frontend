<?php

ob_start();
session_start();

if ($_POST['id']) {
	$_SESSION['dota_teams']['id'] = $_POST['id'];
	$_SESSION['dota_teams']['dota_category_id'] = $_POST['dota_category_id'];
}

?>
