<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
        return "Đây là trang chủ Cửa hàng dành cho Khách hàng mua sắm!";
        // Sau này thay bằng: return view('customer.home');
    }
}