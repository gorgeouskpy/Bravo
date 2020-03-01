<?php
$d = $_GET['d'];
class judger{
    public $direction;
    function __construct($par1){
        $this->direction = $par1;
    }
    function ifLogin(){
        if($_SESSION['user']){
            echo $this->user<=$_SESSION['user'];
            header("Location: ../$this->direction");
        }
        if(!$_SESSION['user']){ echo "未登录";
            header("Location: ../signin.html");
        }
    }
}
$e = new judger($d);
$e -> ifLogin();
?>