<?php
$factory = new authcodefactory(150, 40);
$factory -> generateimg();
class authcodefactory
{
    public $width;
    public $height;

    public function __construct($par1,$par2){
        $this->width = $par1;
        $this->height = $par2;
    }
    public function generateimg(){
        $image=imagecreatetruecolor($this->width,$this->height);
        $r = rand(50,200);
        $g = rand(50,200);
        $b = rand(50,200);
        $background=imagecolorallocate($image,$r,$g,$b);
        $r = rand(50,200);
        $g = rand(50,200);
        $b = rand(50,200);
        $textcolor = imagecolorallocate($image,$r,$g,$b);
        imagefill($image,0,0,$background);
        $x = rand(0,50);
        $y = rand(30,40);
        $angel = rand(-5,5);
        $charbase="ASDFGHJKLZXCVBNMQWERTYUIOPzxcvbnmasdfghjklqwertyuiop";
        $shuffle=str_shuffle($charbase);
        $code=substr($shuffle,3,4);
        imagettftext($image,30,$angel,$x,$y,$textcolor,'DejaVuSans.ttf',$code);
        header("Content-Type: image/png");
        imagepng($image);
        imagedestroy($image);
        session_start();
        $_SESSION['authcode'] = strtoupper($code);
    }
}
?>