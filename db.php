<?php
/**
 * Created by PhpStorm.
 * User: Chandalala
 * Date: 1/9/2019
 * Time: 03:08
 */

class db{

    private $dbHost="localhost:4406";
    private $dbUser="root";
    private $dbPassword="";
    private $dbName="namesDb";
    private $conn;

    //php constructor
    public function __construct(){
        //echo "Class instantiated\n";
        //dsn is data source name
        try{
            $dsn="mysql:host=".$this->dbHost.';dbname='.$this->dbName;
            $this->conn=new PDO($dsn, $this->dbUser,$this->dbPassword);
            //echo "Database connection succesful";
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            die("DB Connection failed: ".$e->getMessage());
        }

    }

    //function to insert data into the database
    public function insertData($name){

        $sqlQuery="INSERT INTO names (name)VALUES (:name)";

        $statement=$this->conn->prepare($sqlQuery);
        $statement->execute(["name"=>$name]);
    }

    public function getData(){
        $sql="SELECT * FROM names";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $data=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteData($id){

        $sqlQuery="DELETE FROM names WHERE id=:id";

        $statement=$this->conn->prepare($sqlQuery);
        $statement->execute(["id"=>$id]);
    }

    //function to insert data into the database
    public function updateData($id,$name){

        $sqlQuery="UPDATE names SET name=:name WHERE id=:id";

        $statement=$this->conn->prepare($sqlQuery);
        $statement->execute(["id"=>$id,"name"=>$name]);
    }

    public function searchData($name){

        $sqlQuery="SELECT * FROM names WHERE name LIKE :name";

        $statement=$this->conn->prepare($sqlQuery);
        $statement->execute(["name"=>'%'.$name.'%']);
        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }


}

?>