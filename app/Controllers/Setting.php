<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\SettingModel;


class Setting extends BaseController
{

  helper('MyHelper');
  
	public function __construct() {

        // Mendeklarasikan class ProductModel menggunakan $this->product
          $this->setting = new SettingModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
	public function index()
	{
		//$data['menu']  = array('id' => '21','nama' => 'asd' );
		//$model = new Setting_model()->getResult();
  //   try
		// {
		//   $result  = $this->setting->getMenu();
		//   $data['menu'] = $this->sortMenu($result);
		// 	//$data['menu'] = $this->setting->getMenu();
		// }
		// catch (\Exception $e)
		// {
		//     die($e->getMessage());
		// }
  //       //$data['category'] = $model->getCategory()->getResult();
  //       //echo view('product_view', $data);
		// echo view('admin/home', $data);
    chicking_helper();
	}

	public function sortMenu($raw, $parent_id = 0)
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
        if($proceed) $return[$key]['child'] = $this->sortMenu($raw, $raw[$key]['id']);
      }
      return $return;
    }
	//--------------------------------------------------------------------

}
