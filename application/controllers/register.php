<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

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
    $this->load->library('lib_captcha');
    $this->load->library('lib_ui');


    $element = "";
    $width = 20;
    $isi      = "";
    $isi      = $this->lib_ui->jq_unloader("Thanks For Register", "/login", $isi);
    $this->lib_ui->jq_add_json("username");
    $this->lib_ui->jq_add_json("email");
    $this->lib_ui->jq_add_json("perusahaan");
    $this->lib_ui->jq_add_json("password");
    $this->lib_ui->jq_add_json("captha_input");
    $param    = $this->lib_ui->jq_get_json();
    $isi      = $this->lib_ui->jq_ajax("register", "kirim_register", "kirim_info", $param, $isi);
    $isi      = $this->lib_ui->jq_valid("username", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("email", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("perusahaan", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("password", "$('#repassword').val()", "!=", $isi);
    $isi      = $this->lib_ui->jq_valid("password", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("repassword", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_valid("captha_input", "''", "==", $isi);
    $isi      = $this->lib_ui->jq_loader($isi);
    $isi      = $this->lib_ui->jq_click("submit_register", $isi);
    $element .= $this->lib_ui->jq_init($isi);
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("username", "Username :"),
      $this->lib_ui->addInput("text", "username", "element", "", $width)
    );
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("email", "Email :"),
      $this->lib_ui->addInput("text", "email", "element", "", $width)
    );
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("perusahaan", "Perusahaan :"),
      $this->lib_ui->addInput("text", "perusahaan", "element", "", $width)
    );
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("password", "Password :"),
      $this->lib_ui->addInput("password", "password", "element", "", $width)
    );
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("repassword", "rePassword :"),
      $this->lib_ui->addInput("password", "repassword", "element", "", $width)
    );
    $this->lib_captcha->setHeight(70);
    $this->lib_captcha->setwidth(150);
    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("", "&nbsp;"),
      $this->lib_captcha->showImage()
    );

    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("captha_input", "Capctha :"),
      $this->lib_ui->addInput("text", "captha_input", "element", "", $width)
    );

    $element .= $this->lib_ui->add2Kolom(
      $this->lib_ui->addLabel("", "&nbsp;"),
      $this->lib_ui->addButton("submit", "element", "submit_register", "Register")
    );

    $element = $this->lib_ui->form($element, "/register/ajax", "post", "inline", "");
    $element = $this->lib_ui->addField("Register User", $element, "User_Registration", "tengah", "300px", "inline");
    $element = $this->lib_ui->jq_pack($element);

    $data['isi'] = "";
    $masuk = array(
      $element,
    );
    $data['isi'] .= $this->lib_themer->theme_loader("register", "depan", $masuk);
    $this->template->load('template/template', $data);
	}


  function ajax()
  {
    $this->load->library('lib_user');

    if ($_POST['action'] == "kirim_register") {
      $kirim_info = json_decode($_POST['kirim_info']);

      $this->lib_user->setUsername($kirim_info[0][1]);
      $this->lib_user->setPerusahaan($kirim_info[2][1]);
      $this->lib_user->setPassword($kirim_info[3][1]);
      $this->lib_user->setEmail($kirim_info[1][1]);
      $this->lib_user->EnkripPassword();
      $this->lib_user->AddUser();
    }
    else {
      echo "";
    }
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
