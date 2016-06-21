<?php

function flash($title=null, $message='Ога')
{
    $flash = app(\App\Classes\Flash::class);
    
    if(is_null($title)){
        return $flash;
    }
    
    return $flash->success($title, $message);
}