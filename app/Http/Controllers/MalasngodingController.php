<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class MalasngodingController extends Controller
{
    public function input()
    {
        return view('input');
    }

    public function proses(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi!!',
            'min' => ':attribute harus di isi minimal :min karakter',
            'max' => ':attribute harus di isi maximal :max karakter'
        ];
        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'pekerjaan' => 'required',
            'usia' => 'required|numeric'
        ],$messages);
        return view('proses',['data'=>$request]);
    }
}
