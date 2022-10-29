<?php
class Dbh.php{
    public $hostname($_POST['hostanme'])
    public $username($_POST['username'])
    public $password($_POST['password'])
    public $db($_POST['db'])
    

    function set_value($hostname,$username,$password,$db){
        $this->value=($hostname,$username,$password,$db)
    }
    
    Protected function set_connection(){
    $conn=$this->connection;
    }

$conn=mysqli_connect($hostname,$username,$password,$db){
    echo "$conn"
}
}

