<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admindashboardController extends Controller
{
  public function index()
  {
      return view('admin.layout.home');
  }
}
