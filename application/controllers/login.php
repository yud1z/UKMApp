<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $this->load->library('lib_themer');
    $this->load->library('template');
    $this->load->library('lib_ui');

    $element = "";
    $width = 20;
    $isi      = "";
    $data['isi'] = "";


    $isi      = "";
    $isi      = $this->lib_ui->jq_unloader("Login in", "/login", $isi);
    $this->lib_ui->jq_add_json("username");
    $this->lib_ui->jq_add_json("password");
    $param    = $this->lib_ui->jq_get_json();
    $isi      = $this->lib_ui->jq_ajax("login", "kirim_login", "kirim_info", $param, $isi);
    $isi      = $this->lib_ui->jq_valid("username", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("password", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_loader($isi);
    $isi      = $this->lib_ui->jq_click("submit_login", $isi);
    $element .= $this->lib_ui->jq_init($isi);
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("username", "Username :"),
      $this->lib_ui->addInput("text", "username", "element", "", $width)
    );
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("password", "Email :"),
      $this->lib_ui->addInput("text", "password", "element", "", $width)
    );

    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("", "&nbsp;"),
      $this->lib_ui->addButton("submit", "element", "submit_login", "Login")
    );


    $element = $this->lib_ui->form($element, "/register/ajax", "post", "inline", "");
    $element = $this->lib_ui->addField("Register User", $element, "User_Registration", "tengah", "300px", "inline");
    $element = $this->lib_ui->jq_pack($element);
    $masuk = array(
      $element,
    );
    $data['isi'] .= $this->lib_themer->theme_loader("login", "depan", $masuk);
    $this->template->load('template/template', $data);
  }

  function ajax()
  {
    if ($_POST['action'] == "kirim_login") {

      $this->load->library('MysqlDb');

      $results = $Db->get('tableName', 'numberOfRows-optional');
      print_r($results); // contains array of returned rows

      echo "<pre>";
      print_r($_POST);
      echo "</pre>";

    }
    else {
      echo "";
    }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
