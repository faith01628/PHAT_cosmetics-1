<?php 

namespace App\Components;

use App\Models\Brand;

class brandDisplay {
    
    private $htmlSelect = '';

    public function brandDisplay() {
        $data = Brand::all();
            foreach ($data as $value) {
                $this->htmlSelect .="<Option value='" . $value['id'] ."'>" . $value['name'] ."</option>";
        }
        return $this->htmlSelect;
    }

}






?>
