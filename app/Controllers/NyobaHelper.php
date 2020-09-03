<?php namespace App\Controllers;
use App\Models\SettingModel;
class NyobaHelper extends BaseController
{
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
        try
    {
      $result  = $this->setting->getMenu();
      $data['menu'] = sortMenu($result);
      //$data['menu'] = $this->setting->getMenu();
    }
    catch (\Exception $e)
    {
        die($e->getMessage());
    }
        //$data['category'] = $model->getCategory()->getResult();
        //echo view('product_view', $data);
    echo view('admin/home', $data);
  }

}
