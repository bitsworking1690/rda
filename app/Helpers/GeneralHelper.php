<?php
use App\Models\Site\User;

function pf($data_array , $is_die=false){
    if($is_die){
        echo '<pre>';   print_r($data_array);   die;
    }
    else{
        echo '<pre>';   print_r($data_array);
    }
}

function _group_by($array, $key) {
    $return = array();
    foreach($array as $val) {
        if($val['id'] != $val[$key]){
            $return[$val[$key]][] = $val;
        }
    }
    return $return;
}

function key_mapped_array($array, $column, $column_mapped_id) {
    
    $return = array();
    foreach($array as $val) {
        if($val['place_type'] == $column){
            $return[$val[$column_mapped_id]] = $val;
        }
    }
    return $return;
}

?>