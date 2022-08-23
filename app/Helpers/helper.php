<?php 

function getConfigValuefromSettings($configvalue) {
    $setting = \App\Models\Setting::where('config_key', $configvalue)->first();
    if(!empty($setting)) {
        return $setting->config_value;
    }
    return null;
} 

?>