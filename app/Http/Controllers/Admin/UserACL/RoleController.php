<?php

namespace App\Http\Controllers\Admin\UserACL;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('admin.page.useracl.role.index');
    }

    public function show(){
        return view('admin.page.useracl.role.view');
    }
}
