<?php
namespace App\Component;
use App\Component\listmenu;
use App\listmenu as AppListmenu;

class Recusive {
    private $data;
    private $htmlSelect='';
    public function __construct($data)
    {
        $this->data=$data;
    }
    function categoryRecure( $id =0, $text = '')
    {
       

        foreach ($this->data as $value) {
            if ($value['parentID'] == $id) {
                if(!empty($parentId)&& $parentId==$value['id']){
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                }else{
                    $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                    $this->categoryRecure($value['id'], $text . '--');
                }
               
            }
        }
        return $this->htmlSelect;
    }
}


?>