<?php 
require_once('../model/config.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];
    echo $id;
    $db->table('brand')->delete($id);
    $db->table('brand')->get();
}
?>