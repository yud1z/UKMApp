<?php


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
);
echo $this->themer->theme_loader("template", "page", $masuk);

?>
