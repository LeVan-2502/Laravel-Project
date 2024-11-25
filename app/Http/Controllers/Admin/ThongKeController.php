<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function kho_hang()
    {
        $data = SanPham::with(['danhMuc', 'tags'])->latest('id')->get();
        return view('admin.thong_kes.kho_hang',[
            'data'=>$data
        ]);
    }
}
