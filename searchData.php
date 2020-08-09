<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 8/9/2019
 * Time: 04:33
 */

require_once 'db.php';
$name=$_POST['name'];
$db=new db();
$data=$db->searchData($name);
echo json_encode($data);

