
<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 5/9/2019
 * Time: 21:23
 */

require_once 'db.php';

$db=new db();

    if (isset($_POST['searchData'])){
        $data=$db->searchData($_POST['search']);
    }
    else{
        $data=$db->getData();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>PDO project</title>
</head>
<body>
<h1>PDO</h1>
<div class="container">
    <div class="left-pane">

        <h2>Insert Data</h2>
        <form action="insert.php" method="POST">
            <input type="text" name="name" placeholder="Name" class="gt-input rounded-left">
            <input type="submit" name="insertData" value="Insert" class="gt-button rounded-right">
        </form>

        <h2>Delete Data</h2>
        <form action="delete.php" method="POST">

            <label for="deleteList">
                <select name="id" id="deleteList" class="gt-input full-width rounded-left">
                    <?php foreach ($data as $item){ ?>
                    <option value="<?php echo $item['id']?>"> <?php echo $item['id'].'-'.$item['name'] ?> </option>
                    <?php } ?>
                </select>
            </label>

            <input type="submit" name="deleteData" value="Delete" class="gt-button rounded-right">
        </form>

        <h2>Edit Data</h2>
        <form action="update.php" method="POST">
            <label for="deleteList">
                <select name="id" id="editList" class="gt-input full-width rounded-left">
                    <?php foreach ($data as $item){ ?>

                    <option value="<?php echo $item['id']?>"><?php echo $item['id'].'-'.$item['name'] ?></option>
                    <?php } ?>

                </select>
            </label>
            <input type="text" name="name" placeholder="Name" class="gt-input">
            <input type="submit" name="update" value="Update" class="gt-button rounded-right">
        </form>

    </div>

    <div class="right-pane">
        <h2>Data</h2>

        <form method="POST">
            <input type="text" name="name" placeholder="Search name" class="gt-input rounded-left rounded-right" onkeyup="searchNames(this.value)">
        </form>

        <div class="data-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody class="data-table">
                    <?php
                                foreach ($data as $i){
                    ?>
                <tr>

                    <td><?php echo $i['id'] ?></td>
                    <td><?php echo $i['name'] ?></td>

                </tr>
                    <?php }   ?>
                </tbody>
            </table>

        </div>

    </div>

</div>
<script src="script.js"></script>

</body>
</html>