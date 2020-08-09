<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 2/9/2019
 * Time: 00:00
 */
require_once 'db.php';

//Check if the updateData button was clicked
if (isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];

    $db=new db();
    $db->updateData($id,$name);
    //return to the first page
    header('Location: index.php');
}