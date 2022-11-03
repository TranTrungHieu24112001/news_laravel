<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //hàm index la hàm được gọi mặc định nếu action không được truyền lên url
    public function index(Request $request){
        echo "Controller: HelloController, action: index";
    }
    //truyền biến vào hàm
    public function truyenbien(Request $request, $bien1, $bien2){
        echo "<h1>$bien1 $bien2</h1>";
    }
}
