<?php

$css = "";
$css .= $this->lib_ui->loadCss("bootsrap/bootstrap.css","screen, projection");
//$css .= $this->lib_ui->loadCss("style.css","screen, projection");
//$css .= $this->lib_ui->loadCss("blueprint/screen.css","screen, projection");
//$css .= $this->lib_ui->loadCss("blueprint/print.css","print");
//$css .= $this->lib_ui->loadCss("blueprint/plugins/fancy-type/screen.css","screen, projection");
$js = "";
$js .= $this->lib_ui->loadJs("jquery-1.8.0.min.js");
$js .= $this->lib_ui->loadJs("json2.js");
<<<<<<< HEAD
$js .= $this->lib_ui->loadJs("uki.js");
=======
$js .= $this->lib_ui->loadJs("bootstrap.min.js");
>>>>>>> 99ae84de9bab625967c798eb7f805d24896e4f56


$menu_tah = array(
  'portal' => '/portal',
  'login' => '/login',
  'register' => '/register',
  'logout' => '/logout',
);

$menu = "";

$menu .= "<div class='navbar'>";
$menu .= "<div class='navbar-inner'>";
$menu .= "<div class='container'>";
$menu .= "<a class='brand' href='/'>Home</a>";
$menu .= "<ul class='nav' >";
foreach ($menu_tah as $kunci_menu => $isi_menu) {
  $url = explode("/", $isi_menu);
  $url = $url[1];
  $menu .= "<li class='child_menu' id='". $url ."' >";
  $menu .= "<a href='$isi_menu'>";
  $menu .= $kunci_menu;
  $menu .= "</a>";
  $menu .= "</li>";
}

$menu .= "</ul>";
$menu .= "</div>";
$menu .= "</div>";
$menu .= "</div>";

$masuk = array(
  $isi,
  $menu,
  $css,
  $js,
);
echo $this->lib_themer->theme_loader("template", "page", $masuk);

?>
