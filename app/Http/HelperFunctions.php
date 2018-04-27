<?php
use Carbon\Carbon;

function HelloWorld(){
    return "hello world!!";
}

function str_to_carbon($str,$str_format){
    return $str ? Carbon::createFromFormat($str_format,$str) : Carbon::now();
}

function carbon_now($format){
    return Carbon::now()->format($format);
}

function carbon_yesterday($format){
    return Carbon::yesterday()->format($format);
}

function carbon_tomorrow($format){
    return Carbon::tomorrow()->format($format);
}

function getInput($field,$default=""){
    return isset($_GET[$field]) ? $_GET[$field] : $default;
}