<?php 

function FormatDate($date){
    if(!empty($date)){
        return date('d.m.Y', strtotime($date));
    }
}

function FormatDateTime($date){
    if(!empty($date)){
        return date('d.m.Y H:i:s', strtotime($date));
    }
}

function PageSiezeSelect(int $pageSize = null){
    //print_r($pageSize);
    $str = '';
    
    for ($i=50; $i <=500 ; $i+=50) {
        $selected = '';
        if($pageSize == $i){
            $selected = 'selected';
        }
        $str.= '<option '.$selected.' value="'.$i.'">'.$i.'</option>';  
    } 
    return $str;    
}