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
    $width = "large";
    $element .= $this->lib_ui->addInput("text", "username", "element", "", $width, "Username :");
    $element .= $this->lib_ui->addInput("text", "email", "element", "", $width, "Email :");
    $element .= $this->lib_ui->addInput("text", "perusahaan", "element", "", $width, "Perusahaan :");
    $element .= $this->lib_ui->addInput("password", "password", "element", "", $width, "Password :");
    $element .= $this->lib_ui->addInput("password", "repassword", "element", "", $width, "rePassword :");
    $this->lib_captcha->setHeight(70);
    $this->lib_captcha->setwidth(150);
    $element .= $this->lib_captcha->showImage();

    $element .= $this->lib_ui->addInput("text", "captha_input", "element", "", $width, "Capctha :");

    $element .=$this->lib_ui->addButton("submit", "element", "submit_register", "Register");
    $element .=$this->lib_ui->addButton("submit", "element", "clear", "clear");

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
