<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReborrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('reborrows')->get();
        $store = DB::table('store_books')->get();
        return view('Management.managementReborrow', [
            'result' => $result,
            'store' => $store,
            'title' => 'Quản lí thẻ mượn trả'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Management.ReborrowForm.addReborrow', [
            'title' => 'Thêm thẻ mượn trả'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $borrowAmount = DB::table('books')->where('id', $request->idBook)->value('amount');
        $borrowName = DB::table('books')->where('id', $request->idBook)->value('name');
        if ($request->validate([
            'id'  => 'required|string',
            'idBook' => 'required|string|max:30',
            'deadline' => 'required|date',
        ])) {
            $checkIdBook = DB::table('books')->where('id', $request->idBook)->value('id');
            // dd($checkIdBook);
            $check = DB::table('store_books')->where('idBook', $request->idBook)->first();
            if ($checkIdBook == $request->idBook) {
                DB::table('reborrows')->insert([
                    'id' => $request->id,
                    'idBook' => $request->idBook,
                    'deadline' => $request->deadline,
                    'dateBorrow' => $request->dateBorrow,
                    'amount' => $request->amount,
                ]);

                if ($check == null) {
                    DB::table('store_books')->insert([
                        'total' => $borrowAmount,
                        'nameBook' => $borrowName,
                        'idBook' => $checkIdBook,
                        'storeBooks' => $borrowAmount - $request->amount,
                        'borrowBooks' => $request->amount,
                    ]);
                } else {
                    $update = DB::table('store_books')->where('idBook', $request->idBook)->first();
                    DB::table('store_books')->where('idBook', $request->idBook)->update([
                        'total' => $borrowAmount,
                        'nameBook' => $borrowName,
                        'idBook' => $checkIdBook,
                        'storeBooks' => $update->storeBooks - $request->amount,
                        'borrowBooks' => $update->borrowBooks + $request->amount,
                    ]);
                }
            } else {
                session()->flash('error', 'Mã sách này không tồn tại');
                return redirect()->back();
            }
            return redirect()->route('managementReborrow.index');
        }
        session()->flash('error', 'Yêu cầu nhập đầy đủ thông tin');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id = DB::table('reborrows')->where('id', $id)->first();
        return view('Management.ReborrowForm.updateReborrow', [
            'reborrow' => $id,
            'tittle' => 'Chỉnh sửa thẻ mượn trả'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $borrowAmount = DB::table('books')->where('id', $request->idBook)->value('amount');
        $borrowName = DB::table('books')->where('id', $request->idBook)->value('name');
        if ($request->validate([
            'id'  => 'required|string',
            'idBook' => 'required|string|max:30',
            'deadline' => 'required|date',
        ])) {
            $checkIdBook = DB::table('books')->where('id', $request->idBook)->value('id');
            $check = DB::table('store_books')->where('idBook', $request->idBook)->first();
            if ($checkIdBook == $request->idBook) {
                DB::table('reborrows')->where('id', $request->id)->update([
                    'id' => $request->id,
                    'idBook' => $request->idBook,
                    'deadline' => $request->deadline,
                    'dateBorrow' => $request->dateBorrow,
                    'amount' => $request->amount,
                ]);

                if ($check == null) {
                    DB::table('store_books')->insert([
                        'total' => $borrowAmount,
                        'nameBook' => $borrowName,
                        'idBook' => $checkIdBook,
                        'storeBooks' => $borrowAmount - $request->amount,
                        'borrowBooks' => $request->amount,
                    ]);
                } else {
                    $update = DB::table('store_books')->where('idBook', $request->idBook)->first();
                    DB::table('store_books')->where('idBook', $request->idBook)->update([
                        'total' => $borrowAmount,
                        'nameBook' => $borrowName,
                        'idBook' => $checkIdBook,
                        'storeBooks' => $update->storeBooks - $request->amount,
                        'borrowBooks' => $update->borrowBooks + $request->amount,
                    ]);
                }
            } else {
                session()->flash('error', 'Mã sách này không tồn tại');
                return redirect()->back();
            }
            return redirect()->route('managementReborrow.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
