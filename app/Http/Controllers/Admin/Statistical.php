<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statistical extends Controller
{
    public function index()
    {
        $datas = DB::table('typelists')->get();
        $sql = "select * from v_soluongtheloai";
        $quantity = DB::select($sql);
        return view('management.typeBooks.index', [
            'quantities' => $quantity,
            'datas' => $datas,
            'title' => 'Thống kê số lượng sản phẩm theo danh mục'
        ]);
    }
}
