<?php

namespace App\Classes;

class Flash
{
    public function __call($type, $args)
    {
        session()->flash('noty', [
            'title' => $args[0],
            'message' => $args[1],
            'type' => $type
        ]);
    }
}