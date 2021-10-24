<?php 
require_once('../model/config.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];
    echo $id;
    $db->table('products')->delete($id);
    $db->table('products')->get();
}
?>