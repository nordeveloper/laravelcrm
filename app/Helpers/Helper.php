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