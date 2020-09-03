<?php

/***********************************************************************************
 * Description
 * Get Menu from selected user priviledges
 * Ref : view compiler/header.php
 * 
 * Parameter
 * None
 * 
 * Return
 * array data
 * 
***********************************************************************************/
function getMenu()
{
  $GLOBALS['user_group_id'] = 1;
  $result = $this->table('user_menus')
              ->select('user_menus.id,user_menus.parent_id,user_menus.name,user_menus.url,user_menus.icon_menu')
              ->join('user_rules','user_menus.id = user_rules.menu_id ','left')
              ->where('user_rules.group_id',$GLOBALS['user_group_id'])
              ->where('user_menus.show_in_menu',1)
              ->orderBy('user_menus.id','ASC')
              ->get()
              ->getResultArray();
  
  return $result;
}

/***********************************************************************************
 * Description
 * Looping menu if has child
 * 
 * Parameter
 * $raw       => $array data from database result
 * $parent_id => parent_id column
 * 
 * Return
 * array data
 * 
***********************************************************************************/
function sortMenu($raw, $parent_id = 0)
{
  $return = array();
  foreach($raw as $key => $val)
  {
    $proceed = FALSE;
    if($raw[$key]['parent_id'] == $parent_id)
    {
      $return[$key] = $raw[$key];
      $proceed = TRUE;
    }
    if($proceed) $return[$key]['child'] = sortMenu($raw, $raw[$key]['id']);
  }
  return $return;
}

/***********************************************************************************
 * Description
 * Check user login properties 
 * 
 * Parameter
 * None
 *  
 * Return
 * 0 => user not login / session expired
 * 1 => user already login
 * 
***********************************************************************************/
function checkAuth()
{
  $CI =& get_instance();
  if(!$cookie = decodeCookies()) return false;

  $username      = $cookie[0];
  $userpass      = $cookie[1];
  $group_id      = $cookie[2];

  $CI->db->select('user_id,user_username,user_password,user_email,user_name,user_group_id,user_group_name');
  $CI->db->from('users a');
  $CI->db->join('user_groups b','a.user_group_id = b.user_group_id','LEFT');
  $CI->db->where('user_username', $username);

  $sql = $CI->db->get();

  if ($sql->num_rows() === 1)
  {
    $auth = $sql->row_array();
    if(password_verify($userpass,$auth['user_password']))
    {
      foreach($auth as $key => $value)
      {
        $GLOBALS[$key] = $value;
      }
      $CI->db->update('users',array('user_online' => 1),array('user_id' => $auth['user_id']));
      return true;
    }
    else
    {
      return false;
    }
  } 
  else 
  {
    return false;
  }
}

/***********************************************************************************
 * Description
 * Redirect to dashboard url if user have no access function
 * 
 * Parameter
 * $menu => function
 *  
 * Return
 * 0 => have no access
 * 1 => have access
 * 
***********************************************************************************/
function redirectAuth($menu = '')
{
  if(!checkAuth()) redirect(PATH . 'login');
  if($menu != '' && !currentUsercan($menu))
  {
    if(!empty($_SERVER['HTTP_REFERER']))
    {
      redirect($_SERVER['HTTP_REFERER']);
    }
    else
    {
      redirect(PATH . "dashboard");
    }
  }
}

/***********************************************************************************
 * Description
 * Check is user have access to function inside class
 * 
 * Parameter
 * $menu => function
 *  
 * Return
 * 0 => have no access
 * 1 => have access
 * 
***********************************************************************************/
function currentUsercan($menu = null)
{
  if($menu == null) return false;

  if($GLOBALS['user_group_id'] <= 1) return true;

  $CI =& get_instance();
  $CI->db->select('url');
  $CI->db->from('user_rules r');
  $CI->db->join('user_menus c','c.menu_id = r.menu_id','left join');
  $CI->db->where('r.group_id', $GLOBALS['user_group_id']);
  $CI->db->where('c.url', $menu);

  $result = $CI->db->count_all_results();

  if($sql->num_rows() == 0) return false;
  else return true;
}

/***********************************************************************************
 * Description
 * Decode saved cookie
 * 
 * Parameter
 * None
 *  
 * Return
 * Array data
 * 
***********************************************************************************/
function decodeCookies()
{
  if(empty($_COOKIE[SITE_NAME]) || !isset($_COOKIE[SITE_NAME]))
    return false;
    $CI 	  =& get_instance();
    $cookie = explode("|", $CI->encrypt->decode($_COOKIE[SITE_NAME]));
    if(count($cookie) != 4) 
    {
      setcookie(SITE_NAME, "", time() - 3600, "/");
      return false;
    }
    return $cookie;
}

/***********************************************************************************
 * Description
 * Record user activity to log table 
 * 
 * Parameter
 * $do      => what user do
 * $mod     => selected module
 * $target  => selected object from module
 *  
 * Return
 * None
 * 
***********************************************************************************/
function userLog($do, $mod, $target)
{
  $act = str_replace(":","",$mod);
  $desc = $mod.' '.$target;

  if($do == 'Create')
  {
    $activity 	 = 'Created '. $act;
    $description = 'Create '. $desc;
  }
  elseif($do == 'Update')
  {
    $activity 	 = 'Updated '. $act;
    $description = 'Update '. $desc;
  }
  elseif($do == 'Delete')
  {
    $activity 	 = 'Deleted '. $act;
    $description = 'Delete '. $desc;
  }
  elseif($do == 'Cancel')
  {
    $activity 	 = 'Canceled '. $act;
    $description = 'Cancel '. $desc;
  }

  $CI  =& get_instance();
  $log = array(
      'name' 		 	    => $GLOBALS['user_username'],
      'activity'		  => $activity,
      'description' 	=> $description,
      'activity_date'	=> date("Y-m-d H:i:s"),
  );
  $set_logs = $CI->db->insert('userlogs', $log);
}

/***********************************************************************************
 * Description
 * Check is device connect to internet
 * 
 * Parameter
 * None
 *  
 * Return
 * 0 => Not Connected
 * 1 => Connected
 * 
***********************************************************************************/
function isConnect()
{
  $iStat = true;
  $host = "google.com";
  exec("ping -n 1 " . $host, $output, $result);

  if(strpos($output[0],"try") != null)
  {
    $iStat = false;
  }
  elseif(strpos($output[0],"out.") != null)
  {
    $iStat = false;
  }

  return $iStat;
} 

/***********************************************************************************
 * Description
 * Get Client IP
 * 
 * Parameter
 * None
 *  
 * Return
 * xxx.xxx.xxx.xxx => client ip address
 * unknown  => error unknown ip address
 * 
***********************************************************************************/
function getClientIP() 
{
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';

  return $ipaddress;
}

/***********************************************************************************
 * Description
 * getTtitleWeb
 * 
 * Parameter
 * None
 *  
 * Return
 * $params = STRING
 *           - ss_web_name  => Nama Website
 *           - ss_address   => Alamat Website
 *           - ss_contact   => Kontak Website
 *           - ss_lat       => Lattitude
 *           - ss_lot       => Longitude
 *           - ss_range     => jarak untuk scanner
 *           - ss_hash      => Hash
 * 
***********************************************************************************/
function getInfoWeb($params)
{
  $CI =& get_instance();

  $query = $CI->db->get('site_setting')->row_array();

  return $query[$params];
}