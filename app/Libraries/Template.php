<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**********************************************************************
 * 
 * Description
 * Load compiler for header, body and footer 
 * 
 **********************************************************************/
class Template 
{

  private $CI;

  /**********************************************************************
   * 
   * Description
   * construct declaration for CI Object
   * 
   **********************************************************************/
  function __construct() 
  {
    $this->CI =& get_instance();
  }

  /**********************************************************************
   * 
   * Description
   * Load compiler for header, body and footer 
   * 
   **********************************************************************/
  public function load($tpl_name, $body_view = null, $data = null) 
  {
    $parts = (is_null($data))?array():$data;

    if (!is_null($body_view) && is_array($body_view)) 
    {
      foreach ($body_view as $key => $view) 
      {
        $parts[$key] = return view($view,$data,TRUE);
      }
    }
    else if($body_view !== NULL && is_string($body_view))
    {
      $parts['body'] = return view($body_view,$data,TRUE);
    }

    return view('template/' . $tpl_name, $parts);
  }

}