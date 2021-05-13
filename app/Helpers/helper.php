<?php

function getSettingValue($config_key){
    $config_value = \App\Setting::where('config_key',$config_key)->first();
    if(!empty($config_value)){
        return $config_value->config_value;
    }
    return null;
}
