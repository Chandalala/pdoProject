<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 2/9/2019
 * Time: 00:00
 */
require_once 'db.php';

//Check if the insert button was clicked
if (isset($_POST['insertData'])){
    $name=$_POST['name'];

    $db=new db();
    $db->insertData($name);
    //return to the first page
    header('Location: index.php');
}