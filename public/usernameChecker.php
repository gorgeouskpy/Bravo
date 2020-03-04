<?php
$username = $_GET['username'];
#$username = "kpy";
$checker = new usernameChecker($username);
$result = $checker->check();
echo $result;
class usernameChecker
{
    public $username;
    public function __construct($username){
        $this->username = $username;
        addslashes($this->username);
    }
    public function check(){
        $conn = new PDO('sqlite:./Bravo.db');
        if(!$conn){
            die('数据库连接失败');
        }
        $sql = <<<DASH
SELECT username FROM users
where username = '$this->username';
DASH;
        $res = $conn->query($sql);
        $row = $res->fetch();
        if($row){
            return 0;//0 表示**不能**用这个username
        }else{
            return 1;//1 meas user can use this as a username
        }
    }
}
?>