<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeBooks extends Controller
{
    public function index()
    {
        $types = DB::table('typelists')->get();
        return view('management.typeBooks.listType', [
            'types' => $types,
        ]);
    }

    /*Show the form for creating a new resource*/
    public function create()
    {
        return view('management.typeBooks.add', [
            'title' => 'Thêm Loại'
        ]);
    }

    /*Store a newly created resource in storage*/
    public function store(Request $request)
    {
        $params = [
            'nametype' => $request->nametype
        ];
        DB::table('typelists')->insert($params);
        return redirect()->route('managementType.listType');
    }
}
