<?php 

namespace App\Components;

use App\Models\Brand;

class brandDisplay {
    
    private $htmlSelect = '';

    public function brandDisplay($brandId) {
        $data = Brand::all();
            foreach ($data as $value) {
                if($brandId == $value->id) {
                    $this->htmlSelect .= '<option selected value="' . $value->id . '">' . $value->name . '</option>';
                } else {
                
                $this->htmlSelect .="<Option value='" . $value->id ."'>" . $value->name ."</option>";
            }
        }
        return $this->htmlSelect;
    }

}






?>
