<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
  function __construct() 
  { 
    parent::__construct(); 
  }

  // get karyawan data
  public function get_karyawan()
  {
    $query = $this->db->get('employee')->result_array();

    return $query;
  }

  // mendapatkan data karyawan terakhir ditambah
  public function get_employee_last()
  {
    $this->db->select('*')
    ->from('employee')
    ->limit(0,5)
    ->order_by('kw_id', 'DESC');

    $query = $this->db->get()->result_array();

    return $query;
  }

  // get data untuk yang absen hari ini
  public function get_attendance()
  {
    $query = $this->db->get_where('attendance', ['DATE(at_start)' => date('Y-m-d')])->result_array();

    return $query;
  }

  // mendapatkan data user
  public function get_users()
  {
    $query = $this->db->get('users')->result_array();

    return $query;
  }

  // mendapatkan menu
  public function get_user_menus()
  {
    $query = $this->db->get('user_menus')->result_array();

    return $query;
  }

  // mendapatkan menu yang aktif
  public function get_user_menus_active()
  {
    $query = $this->db->get_where('user_menus', ['show_in_menu !=' => '0'])->result_array();

    return $query;
  }

  // mendapatkan last absensi
  public function get_attendance_last()
  {
    $this->db->Select('a.*, b.kw_full_name')
    ->from('attendance a')
    ->join('employee b', 'b.kw_id = a.kw_id', 'INNER')
    ->where('DATE(a.at_start)', date('Y-m-d'))
    ->limit(0,5)
    ->order_by('a.at_id', 'DESC');

    $query = $this->db->get()->result_array();

    return $query;
  }
  
}