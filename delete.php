<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 8/9/2019
 * Time: 04:11
 */

require_once 'db.php';

//Check if the insert button was clicked
if (isset($_POST['deleteData'])){
    $id=$_POST['id'];

    $db=new db();
    $db->deleteData($id);
    //return to the first page
    header('Location: index.php');
}