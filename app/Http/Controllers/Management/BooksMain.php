<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BooksMain extends Controller
{
    public function index()
    {

        $result = DB::table('books')->paginate(4);
        $typelists = DB::table('typelists')->get();
        return view('management.managementBooks', [
            'result' => $result,
            'typelists' => $typelists
        ]);
    }

    public function create()
    {
        $typelists = DB::table('typelists')->get();
        return view('management.handleForm.addBooks', [
            'title' => 'Thêm Sách ',
            'typelists' => $typelists,
        ]);
    }

    public function storeBooks(Request $request)
    {
        $getNameType = DB::table('typelists')->where('id',  $request->type)->get();

        if ($request->validate([
            'id'  => 'required',
            'name' => 'required',
            'type' => 'required',
            'author' => 'required',
            'amount' => 'required',
            'file' => 'required',
        ])) {
            if ($request->hasFile('file')) {
                $file = $request->file;
                $fileName = $file->getClientOriginalName();
                $file->getClientOriginalExtension();
                $file->getSize();

                $file->move('public/uploads', $file->getClientOriginalName());
                $thumbnail = $fileName;
                // $input['thumbnail'] = $thumbnail;

                DB::table('books')->insert([
                    'id' => $request->id,
                    'name' => $request->name,
                    'type' => $getNameType[0]->nametype,
                    'author' => $request->author,
                    'amount' => $request->amount,
                    'thumbnail' => $thumbnail,
                    'idtype' => $request->type,
                ]);
            }
            return redirect()->route('managementBooks.index');
        }
        session()->flash('error', 'Yêu cầu nhập đầy đủ thông tin');
        return redirect()->back();
    }

    public function deleteBooks($id)
    {

        $fileNameAtDelete = DB::table('books')->where('id', $id)->value('thumbnail');
        unlink('public/uploads/' . $fileNameAtDelete);

        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('managementBooks.index');
    }

    public function edit($id)
    {
        $type = DB::table('typelists')->get();
        $book = DB::table('books')->where('id', $id)->first();

        return view('management.handleForm.updateBooks', ['book' => $book, 'type' => $type]);
    }

    public function update(Request $request, $id)
    {
        $getNameType = DB::table('typelists')->where('id', $request->type)->first();



        if ($request->hasFile('file')) {
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getSize();

            $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = $fileName;
            // $input['thumbnail'] = $thumbnail;

            DB::table('books')->where('id', $id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'type' => $getNameType->nametype,
                'author' => $request->author,
                'amount' => $request->amount,
                'thumbnail' => $thumbnail,
                'idtype' => $getNameType->id,

            ]);
            unlink('public/uploads/' . $request->imgFile);
            return redirect()->route('managementBooks.index');
        } else {
            DB::table('books')->where('id', $id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'type' => $getNameType->nametype,
                'author' => $request->author,
                'amount' => $request->amount,
                'thumbnail' => $request->imgFile,
                'idtype' => $getNameType->id,

            ]);
            return redirect()->route('managementBooks.index');
        }
        session()->flash('error', 'Yêu cầu nhập đầy đủ thông tin');
        return redirect()->back();
    }

    public function show(Request $request)
    {
        $result = DB::table('books')->orWhere('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('Management.managementBooks', ['result' => $result]);
    }
}
