<?php namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = "user_menus";

    public function getMenu()
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
            
            //$return = $this->sortMenu($result);
            return $result;
    } 

}
