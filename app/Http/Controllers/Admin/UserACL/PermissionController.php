<?php

namespace App\Http\Controllers\Admin\UserACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.page.useracl.permission');
    }
}