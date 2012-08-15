<?php

/**
 * User interface class
 * gak usah capek2 ngoding html, 
 * all html dan jquery ada disini.
 **/
class Lib_ui
{

  public function loadJs($file)
  {
    return "<script type='text/javascript' src='/files/library/js/$file'></script>";
  }

  public function loadCss($file,$tipe)
  {
    return " <link rel='stylesheet' href='/files/library/css/$file' type='text/css' media='$tipe'> ";
  }
  
  public function addInput($tipe, $id, $class, $value, $size)
  {
          return "
        <input 
        type='". $tipe ."' 
        id='". $id ."' 
        name='". $id ."' 
        class='". $class ."' 
        value='". $value ."' 
        size='". $size ."' 
        >
        ";
  }
  /**
   *  $value berupa array 2 dimensi
   *  value => display
   *  contoh : 
      $blabla = array(
      'helo' => 'kity',
      );
   */
  public function addOption($id, $value)
  {
    $opsi = "<select id='some_name'>";

    if ($value) {
      foreach ($value as $kunci_isi => $isinya) {
        $opsi .= "<option value='$kunci_isi'>$isinya</option>";
      }
    }

    $opsi .= "</select>";
  }

  public function addLabel($id, $isi)
  {
    return "<label for='$id'>$isi</label>";
  }

  public function add2Kolom($isi1, $isi2)
  {
    return "
       <div class='column span-3'>
          $isi1
      </div>     
      <div class='column span-4 last'>
          $isi2
      </div>
          <div class='clear'></div>
      
      ";
  }

  public function addButton($tipe, $class_parent, $id)
  {
    if ($tipe == "submit") {
      return "
          <button class='button positive' id='$id'>
          <img src='/files/library/css/blueprint/plugins/link-icons/icons/im.png' alt=''> Register
          </button>

        ";
    }
    elseif ($tipe == "clear") {
      return "";
    }
    else {
      return "";
    }
  }

  public function addField($judul, $isi, $id, $class, $width)
  {
    return "
          <fieldset id='$id' class='$class' style='width:$width'>
          <legend><b>$judul</b></legend>
            $isi
          </fieldset>
      ";
  }

  public function form($isi, $arah, $method, $class, $id)
  {
    return "
           <form class='$class' action='$arah' method='$method' id='$id' accept-charset='utf-8'>
            $isi
          </form>
      ";
  }

  public function error($element_form)
  {
    return "
      <div class='error'>
      Error in submiting $element_form.try again
        </div>
      
      ";
  }

}


?>
