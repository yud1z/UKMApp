<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file
 * class user core untuk social network.
 *
 * setter and getter for all user method
 */

class Lib_user{
  /**
   *  setter untuk id aliasnya uid
   */
  public $id;

  /**
   *  username.
   */
  public $username;

  /**
   *  nama pertama.
   */
  public $first_name;

  /**
   *  nama belakang.
   */
  public $last_name;

  /**
   *  email untuk register.
   */
  public $email;

  /**
   *  plain text.
   *  password pinjam dari phpass untuk enkripsi.
   *  @see http://www.openwall.com/phpass/
   */
  public $password;

  /** 
   *  nama perusahaan sebagai group dari user.
   *  hanya boleh lowercase. boleh pakai angka.
   */
  public $perusahaan;

  /**
   *  tanggal lahir by Y-m-d
   */
  public $birth;

  /**
   *  alamat.
   */
  public $address;

  /**
   *  kota
   */
  public $city;

  /**
   *  propinsi
   */
  public $province;

  /**
   *  tentang saya.
   */
  public $about_me;

  /**
   *  berupa time unix. time(); by php
   */
  public $time_register;

  /**
   *  input ip address fungsinya dari $_SERVER['REMOTE_ADDR']
   */
  public $ip_address;


  /**
   *  constructor class User
   */
  function User()
  {
  
  }

  /**
   *  input id
   *  @param $id 
   *  jika add user $id = NULL,
   *  jika remove $id = numeric,
   */
  function setId($id)
  {
    $this->id = $id;
  }

  /**
   *  getter id
   *  @return getUserId
   */
  function getId()
  {
    return $this->id;
  }

  /**
   *  Input Username
   *  @param $username
   *    @rule lowercase alpha numeric
   */
  function setUsername($username)
  {
    $this->username = $username;
  }

  /**
   *  get Username
   *  @return Username
   */
  function getUsername()
  {
    return $this->username;
  }

  /**
   *  Input nama Pertama
   *  @param $first_name
   *    @rule lowercase alphanumeric
   */
  function setFirstname($first_name)
  {
    $this->first_name = $first_name;
  }

  /**
   *  get nama Pertama
   *  @return nama pertama
   */
  function getFirstname()
  {
    return $this->first_name;
  }

  /**
   *  Input nama belakang
   *  @param $last_name
   *    @rule lowercase alphanumeric 
   */
  function setLastname($lastname)
  {
    $this->last_name = $lastname;
  }

  /**
   *  get nama belakang
   *  @return nama belakang
   */
  function getLastname()
  {
    return $this->last_name;
  }
  
  /**
   *  Input Email
   *  @param $email
   *    @rule regex email
   */
  function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   *  get Email
   *  @return User email address
   */
  function getEmail()
  {
    return $this->email;
  }

  /**
   *  input Password
   *  @param $password
   *    Plain text
   *  @rule who care.
   */
  function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   *  get Password
   *  @return Password encrypt
   */
  function getPassword()
  {
    return $this->password;
  }

  /**
   *  Input Perusahaan
   *  @param $perusahaan
   *  @rule harus lowercase alphanumeric
   */
  function setPerusahaan($perusahaan)
  {
    $this->perusahaan = $perusahaan;
  }

  /**
   *  get perusahaan
   *  @return Perusahaan user
   */
  function getPerusahaan()
  {
    return $this->perusahaan;
  }

  /**
   *  Input Waktu lahir
   *  @param $birth
   *  @rule harus Y-m-d
   */
  function setBirth($birth)
  {
    $this->birth = $birth;
  }

  /**
   *  get Ulang tahun
   *  @return ulang tahun, Y-m-d
   */
  function getBirth()
  {
    return $this->birth;
  }

  /**
   *  input Alamat
   *  @param $address
   *  @rule terbatas hanya 255 character
   */
  function setAddress($address)
  {
    $this->address = $address;
  }

  /**
   *  get Alamat
   *  @return alamat
   */
  function getAddress()
  {
    return $this->address;
  }

  /**
   *  Input Kota
   *  @param $city
   *  @rule harus lowercase, hanya alpha
   */
  function setCity($city)
  {
    $this->city = $city;
  }

  /**
   *  get Kota
   *  @return kota lowercase
   */
  function getCity()
  {
    return $this->city;
  }

  /**
   *  input propinsi
   *  @input $province
   *  @rule lowercase alpha
   */
  function setProvince($province)
  {
    $this->province = $province;
  }

  /** 
   *  get Propinsi
   *  @return propinsi lowercase
   */
  function getProvince()
  {
    return $this->province;
  }

  /**
   *  input tentang saya
   *  @param $about_me
   *  @rule who care.
   */
  function setAboutme($about_me)
  {
    $this->about_me = $about_me;
  }

  /**
   *  get tentang saya
   *  @return tentang saya.
   */
  function getAboutme()
  {
    return $this->about_me;
  }

  /**
   *  input waktu register
   *  @param $time_register
   *  @rule timeunix time()
   */
  function setTimeregister($time_register)
  {
    $this->time_register = $time_register;
  }

  /**
   *  get waktu register
   *  @return waktu register timeunix
   */
  function getTimeregister()
  {
    return $this->time_register;
  }

  /**
   *  input IPaddress
   *  @param $ip_address
   *  @rule $_SERVER['REMOTE_ADDR']
   */
  function setIpaddress($ip_address)
  {
    $this->ip_address = $ip_address;
  }

  /**
   *  get ip address user
   *  @return ip address user
   */
  function getIpaddress()
  {
    return $this->ip_address;
  }



}
