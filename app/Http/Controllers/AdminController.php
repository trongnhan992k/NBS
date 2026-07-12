<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return "Đây là trang Quản trị (Dashboard) dành riêng cho Admin!";
        // Sau này thay bằng: return view('admin.dashboard');
    }
}