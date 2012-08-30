<?php

$css = "";
$css .= $this->lib_ui->loadCss("style.css","screen, projection");
$css .= $this->lib_ui->loadCss("blueprint/screen.css","screen, projection");
$css .= $this->lib_ui->loadCss("blueprint/print.css","print");
$css .= $this->lib_ui->loadCss("blueprint/plugins/fancy-type/screen.css","screen, projection");
$js = "";
$js .= $this->lib_ui->loadJs("jquery-1.8.0.min.js");
$js .= $this->lib_ui->loadJs("json2.js");
$js .= $this->lib_ui->loadJs("uki.js");


$menu_tah = array(
  'home' => '/',
  'portal' => '/portal',
  'login' => '/login',
  'register' => '/register',
  'logout' => '/logout',
);

$menu = "";

$menu .= "<ul id='menu' >";
foreach ($menu_tah as $kunci_menu => $isi_menu) {
  $menu .= "<li class='child_menu' >";
  $menu .= "<a href='$isi_menu'>";
  $menu .= $kunci_menu;
  $menu .= "</a>";
  $menu .= "</li>";
}
$menu .= "</ul>";

$masuk = array(
  $isi,
  $menu,
  $css,
  $js,
);
echo $this->lib_themer->theme_loader("template", "page", $masuk);

?>
