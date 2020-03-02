<?php
interface authentication
{
    public function verifyuser();
}
class login implements authentication
{
    public $user;
    public $password;
    function __construct($par1,$par2){
        $this->user = $par1;
        $sha1 = sha1($par2);
        $this->password = $sha1;
    }
    public function verifyuser(){
        $conn = new PDO('sqlite:./Bravo.db');
        if(!$conn){
            echo '数据库连接失败';
            die();
        }
        $sql = <<<SSS
        SELECT password FROM users
        WHERE username = '$this->user';
SSS;
        $res = $conn->query($sql);
        if(!$res){
            return 0;
            die();
        }
        $res -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $res -> fetch();
        if($this->password == $row['password']){
            return 1;
        }else{
            return 0;
        }
    }
}
?>