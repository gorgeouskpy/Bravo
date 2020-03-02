<?php
class authcodefactory
{
    public $width;
    public $height;

    public function __construct($par1,$par2){
        $this->width = $par1;
        $this->height = $par2;
    }
    public function generateimg(){
        header("Content-Type: image/png");
        $image=imagecreatetruecolor($this->width,$this->height);
        $background = imagecolorallocate($image,241,227,205);
        imagettftext($image,20,0,30,30);
        imageline($image,1 ,1,100,100);
    }
}
?>