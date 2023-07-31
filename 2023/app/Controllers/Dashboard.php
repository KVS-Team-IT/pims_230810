<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['page'] = view('pages/dashboard/index');
        return view('templates/admin', $data);
    }
}
