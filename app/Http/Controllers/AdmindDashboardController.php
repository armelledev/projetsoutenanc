<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmindDashboardController extends Controller
{


public function dashboard(){
    if (auth()->user()->roles->contains('name', 'admin')) {
    return view('admin.admin');
}

}
}



