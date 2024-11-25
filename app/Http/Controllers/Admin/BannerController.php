<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ChuongTrinhBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {

        $data = ChuongTrinhBanner::with('banners')
        ->where('trang_thai', 'Active')
        ->first();
        return view('admin.banners.index', [
            'data' => $data,
        ]);
    }
    public function create()
    {
        return view('admin.banners.create');
    }
    public function store(Request $request)
    {
        $dataProgram = $request->except(['tieu_de', 'thu_tu','_token', 'hinh_anh']);
        $program = ChuongTrinhBanner::create($dataProgram);

        $tieu_des = $request->input('tieu_de');
        $thu_tus = $request->input('thu_tu');
        $hinh_anhs = $request->file('hinh_anh');
        foreach($tieu_des as $key => $tieu_de){
            $hinh_anh_path = null;
            if (isset($hinh_anhs[$key])) {
                $hinh_anh_path = $hinh_anhs[$key]->store('public/banners/bn'.$program->id);
            }
            Banner::create([
                'chuong_trinh_banner_id' => $program->id,
                'tieu_de' => $tieu_de,
                'thu_tu' => $thu_tus[$key] ?? 0, // Giá trị mặc định là 1 nếu không có
                'hinh_anh' => $hinh_anh_path,    // Đường dẫn hình ảnh nếu có
                 // Thêm chuong_trinh_id nếu cần
            ]);
        }
        
        return redirect()->route('admin.banners.index')->with([
            'thongbao' => [
                'message' => 'Thêm mới chương trình banner thành công.',
                'type' => 'success'
            ]
        ]);
    }


    public function edit()
    {

        $data = ChuongTrinhBanner::with(['banners'])
        ->where('trang_thai', 'Active')->first();
      
        return view('admin.banners.program.edit', [
            'data' => $data,
        ]);
    }
}
