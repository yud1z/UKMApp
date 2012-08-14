<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('__ROOT__', dirname(__FILE__)); 

class Lib_themer{

function theme_loader($tipe_halaman, $nama_file, $variable)
{
  require_once("theme_engine.php");
  $directory_view       = __ROOT__.'/../views/'.$tipe_halaman.'/'.$nama_file.'.html';
	$profile = new Theme($directory_view);
  $pew = "";
  if (file_exists($directory_view)) {
    $line_of_text = file_get_contents($directory_view);
    $pattern = '||@_@||';
    $hitung_pattern = substr_count($line_of_text, $pattern);
    for ($i = 0; $i <= $hitung_pattern-1; $i++) {
      $mulai = $i+1;
      $profile->set($pattern."|$mulai|", $variable[$i]);
    }
  }
  else {
    $pew = "error, theme not found";
  }
  $pew .= $profile->output();
  return $pew;
  }

}
