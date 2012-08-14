<?php

/**
 * class untuk cpatcha generator
 **/
class Lib_captcha
{
  public $width;
  public $height;

  /**
   *  Get captcha
   *  generator catpcha
   *  @return menghasilkan file gambar jpeg
   */

  public function getSetPage()
  {
    header('Content-Type: image/png');
  }

  public function getCaptcha()
  {
    session_start();
  $alphaNumeric = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $random = substr(str_shuffle($alphaNumeric), 0, 5);
  $_SESSION['captcha'] = md5($random);
  $im = @imagecreatetruecolor(80, 40) or die('Cannot Initialize new GD image stream');
  $text_color = imagecolorallocate($im, 233, 98, 11);
  $bg = imagecolorallocate ( $im, 255, 255, 255 );
  imagefill ( $im, 0, 0, $bg );
  imagestring($im, 10, 15, 10,  $random, $text_color);
  imagepng($im);
  imagedestroy($im);
  imagedestroy($im);
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function setwidth($width)
  {
    $this->width = $width;
  }
  public function showImage()
  {
    $keren = "";
    $keren .= "<img src='/captcha' width='". $this->width ."' height='". $this->height ."'>";
    return $keren;
  }



}


?>
