<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index($name, $id)
    {
        $data = ['name'=> $name, 'id'=> $id];
        return view("home_page", $data);
    }
}