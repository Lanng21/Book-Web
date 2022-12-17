<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('readers')->get();
        return view('management.managementReaders', [
            'result' => $result,
            'title' => "Trang chủ - Người đọc"
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
        return view('management.ReaderForm.addReader', [
            'title' => 'Thêm người đọc ',
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
        //
        if ($request->validate([
            'id'  => 'required',
            'name' => 'required',
            'address' => 'required',
            'phonenumber' => 'required|min:10|max:11',
            'idCard' => 'required'
        ])) {
            // if ($request->hasFile('file')) {
            //     $file = $request->file;
            //     $fileName = $file->getClientOriginalName();
            //     $file->getClientOriginalExtension();
            //     $file->getSize();

            //     $path = $file->move('public/uploads', $file->getClientOriginalName());
            //     $thumbnail = 'public/uploads/' . $fileName;
            //     $input['thumbnail'] = $thumbnail;
            // }
            DB::table('readers')->insert([
                'id' => $request->id,
                'nameReader' => $request->name,
                'address' => $request->address,
                'phonenumber' => $request->phonenumber,
                'idCard' => $request->idCard
            ]);
            return redirect()->route('managementReaders.index');
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
        $reader = DB::table('readers')->select(['*'])->where('idReader', $id)->first();

        return view('management.ReaderForm.updateReader', [
            'reader' => $reader,
            'title' => 'Cập nhật thông tin người đọc'
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
        DB::table('readers')->where('idReader', $id)->update([
            'idReader' => $request->id,
            'nameReader' => $request->name,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'idCard' => $request->idCard,
        ]);
        return redirect()->route('managementReaders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        DB::table('readers')->where('idReader', $id)->delete();
        return redirect()->route('managementReaders.index');
    }
}
