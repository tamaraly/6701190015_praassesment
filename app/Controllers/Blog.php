<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index()
    {
        $data = array(
                    'title' => 'Blog'
                );
        return view('blog', $data);
    }

    public function detail()
    {
        $data = array(
                    'title' => 'Blog Detail'
                );
        return view('blog_detail', $data);
    }

    public function detail2()
    {
        $data = array(
                    'title' => 'Blog Detail 2'
                );
        return view('blog_detail2', $data);
    }
}
