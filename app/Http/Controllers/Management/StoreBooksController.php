<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreBooksController extends Controller
{
    public function index()
    {
        DB::table('books')->get();
    }
}
