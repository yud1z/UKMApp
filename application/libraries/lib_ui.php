<?php

/**
 * User interface class
 * gak usah capek2 ngoding html, 
 * all html dan jquery ada disini.
 **/
class Lib_ui
{

  public $element = array();



  public function loadJs($file)
  {
    return "
      <script type='text/javascript' src='/files/library/js/$file'></script>
    ";
  }

  public function loadCss($file,$tipe)
  {
    return " <link rel='stylesheet' href='/files/library/css/$file' type='text/css' media='$tipe'> ";
  }
  
  public function addInput($tipe, $id, $class, $value, $size, $label)
  {
          return "
        <input 
        type='". $tipe ."' 
        id='". $id ."' 
        name='". $id ."' 
        class='". $class ." input-". $size ."' 
        value='". $value ."' 
        size='' 
        placeholder='". $label ."'
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

  public function addButton($tipe, $class_parent, $id, $point)
  {
    if ($tipe == "submit") {
      return "
          <button onclick='return false'  class='button btn btn-primary' id='$id'>
          <img src='/files/library/css/blueprint/plugins/link-icons/icons/im.png' alt=''> $point
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


  public function jq_init($isi)
  {
    return "
      <script>
        $(document).ready(
            function()
            {
              $isi
             }
          );
      </script>
      ";
  }

  public function jq_click($element, $isi)
  {
    return "
        $('#$element').click(
            function()
            {
              $isi
            }
          );
      ";
  }

  public function jq_valid($element1, $element2, $operator, $isi)
  {
    return "
         if ($('#$element1').val() $operator $element2) {
           console.log('');
          }
          else {
            $isi
          }
      ";
  }

  public function jq_ajax($target, $aksi, $indeks, $element, $isi)
  {
    return "
        $element
        $.ajax({
          type:'POST',
          url:'/$target/ajax',
          data:'&action=$aksi' + '&$indeks=' + jsoni,
          success:
          function(data)
          {
            $isi
          }
        });
      ";
  }

  public function jq_pack($isi)
  {
    return "
      <div id='loader' style='display:none'>
        <center>
          <img src='/files/library/images/loading.gif'>
          <br>
          loading ...
        </center>
      </div>
      <div id='success'>
      </div>
      <div id='envi'>
        $isi
      </div>
      ";
  }

  public function jq_loader($isi)
  {
    return "
    envi = document.getElementById('envi');
    loader = document.getElementById('loader');
    success = document.getElementById('success');
    $(loader).show();
    $(envi).slideUp();
    $isi
      ";
  }
  public function jq_unloader($pesan, $link, $isi)
  {
    return "
        $(loader).hide();
        $(success).html('' +
          '<center>' + 
            '<p>$pesan</P>' + 
            '<p><a href=$link>Click here</a></P>' + 
          '</center>' + '');
      ";
  }
  public function jq_add_json($element)
  {
    array_push($this->element, $element);
  }
  public function jq_get_json()
  {
    $hek = "var Sting = new Array(";
    $tos = array();
    if ($this->element) {
      foreach ($this->element as $kunci_element) {
        $tos[] =  "new Array('" . $kunci_element. "', $('#$kunci_element').val())";
      }
      $hek .= implode($tos, ",");
      $hek .= ");";
      $hek .= "var jsoni = JSON.stringify(Sting);";
    }
    return $hek;
  }

}


?>
