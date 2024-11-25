<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhuyenMai;
use App\Models\LoaiKhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khuyen_mais = KhuyenMai::query()->latest('id')->get();
        $dieu_kien = $khuyen_mais->pluck('dieu_kien_ap_dung');
        
        foreach ($dieu_kien as $key => $json_string) {
            $dieu_kien_ap_dung[$key] = json_decode($json_string);
        }
      
        return view('admin.khuyen_mais.index', [
            'khuyen_mais' => $khuyen_mais,
            'dieu_kien_ap_dung' => $dieu_kien_ap_dung,
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loai_khuyen_mais = LoaiKhuyenMai::query()->pluck('ten', 'id');
        return view('admin.khuyen_mais.create', [
            'loai_khuyen_mais' => $loai_khuyen_mais,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->input();
        
        $dieu_kien_ap_dung = [];
        $ten_dk = $request["ten_dk"];
        $gia_tri_dk = $request["gia_tri_dk"];
        

        // Kiểm tra nếu cả hai mảng có cùng số lượng phần tử
        if (count($ten_dk) === count($gia_tri_dk)) {
            $dieu_kien_ap_dung = array(); // Khởi tạo mảng điều kiện áp dụng
            for ($i = 0; $i < count($ten_dk); $i++) {
                $dieu_kien_ap_dung[$ten_dk[$i]] = $gia_tri_dk[$i];
            }
        }
        // dd($data);

        $json_data = json_encode($dieu_kien_ap_dung, JSON_UNESCAPED_UNICODE);
        $data['dieu_kien_ap_dung'] = $json_data;

        // Xóa các trường không cần thiết
        unset($data['ten_dk']);
        unset($data['gia_tri_dk']);
    

        // Chuyển đổi thành JSON
        $create = KhuyenMai::create($data);
         // Lưu thông báo thành công hoặc lỗi vào session
    if ($create) {
        session()->flash('thongbao', [
            'message' => 'Tạo mới khuyến mãi thành công.',
            'type' => 'success'
        ]);
    } else {
        session()->flash('thongbao', [
            'message' => 'Lỗi khi tạo mới khuyến mãi.',
            'type' => 'danger'
        ]);
    }

    // Chuyển hướng về trang danh sách danh mục
    return redirect()->route('admin.khuyen_mais.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loai_khuyen_mais = LoaiKhuyenMai::query()->pluck('ten', 'id');
        $khuyen_mai = KhuyenMai::query()->find($id);
       
        return view('admin.khuyen_mais.edit', [
            'khuyen_mai' => $khuyen_mai,
            'loai_khuyen_mais' => $loai_khuyen_mais,
          
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $khuyen_mai = KhuyenMai::query()->find($id);
        $data = $request->input();
        
        $dieu_kien_ap_dung = [];
        $ten_dk = $request["ten_dk"];
        $gia_tri_dk = $request["gia_tri_dk"];


        if (count($ten_dk) === count($gia_tri_dk)) {
            $dieu_kien_ap_dung = array(); // Khởi tạo mảng điều kiện áp dụng
            for ($i = 0; $i < count($ten_dk); $i++) {
                $dieu_kien_ap_dung[$ten_dk[$i]] = $gia_tri_dk[$i];
            }
        }

        $json_data = json_encode($dieu_kien_ap_dung, JSON_UNESCAPED_UNICODE);
        $data['dieu_kien_ap_dung'] = $json_data;

        $update = $khuyen_mai->update($data);
        if ($update) {
            session()->flash('thongbao', [
                'message' => 'Cập nhật khuyến mãi thành công.',
                'type' => 'success'
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => 'Lỗi khi caaph nhật khuyến mãi.',
                'type' => 'danger'
            ]);
        }
    
        // Chuyển hướng về trang danh sách danh mục
        return redirect()->route('admin.khuyen_mais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khuyen_mai = KhuyenMai::query()->find($id);
        $delete = $khuyen_mai->delete();
        if ($delete) {
            session()->flash('thongbao', [
                'message' => 'Xóa khuyến mãi thành công.',
                'type' => 'success'
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => 'Lỗi khi xóa khuyến mãi.',
                'type' => 'danger'
            ]);
        }
    
        // Chuyển hướng về trang danh sách danh mục
        return redirect()->route('admin.khuyen_mais.index');

    }
}
