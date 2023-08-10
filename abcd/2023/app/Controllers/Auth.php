<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data['page'] = view('pages/auth/index');
        return view('templates/preauth', $data);
    }
}
