<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = array(
                    'title' => 'About'
                );
        return view('about', $data);
    }
}
