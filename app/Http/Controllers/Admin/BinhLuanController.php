<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\PhanHoi;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource..p
     */

    public function findRootBinhLuanId($binhLuanId)
    {
        $currentBinhLuanId = $binhLuanId;

        while ($currentBinhLuanId) {
            $binhLuan = BinhLuan::find($currentBinhLuanId);

            if ($binhLuan && $binhLuan->parent_id) {
                // Nếu bình luận hiện tại có parent_id, tiếp tục tìm bình luận cha
                $currentBinhLuanId = $binhLuan->parent_id;
            } else {
                // Nếu bình luận không có parent_id, tức là đã đến bình luận gốc
                return $currentBinhLuanId; // Trả về ID của bình luận gốc
            }
        }

        return null; // Nếu không tìm thấy bình luận gốc
    }

    public function index()
    {
        $binh_luans  = BinhLuan::with([
            'binhLuans.phanHois',
            'binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.binhLuans.phanHois',
            'phanHois',
            'sanPham',
            'taiKhoan'
        ])
            ->get();
        $phan_hois  = PhanHoi::with([
            'binhLuan.sanPham',
            'taiKhoan'
        ])
            ->get();




        $binh_luan_moi = BinhLuan::where('trang_thai', 'inactive')
            ->get();

        foreach ($binh_luan_moi as $item) {
            $goc_moi[] = $this->findRootBinhLuanId($item->id);
        };


        $binh_luan_an = BinhLuan::where('trang_thai', 'deleted')
            ->get();
        foreach ($binh_luan_an as $item) {
            $goc_an[] = $this->findRootBinhLuanId($item->id);
        };

        $binh_luan_goc = $binh_luans->where('parent_id', null);

        $phan_hoi_moi = $phan_hois->where('trang_thai', 'inactive');
        $phan_hoi_an = $phan_hois->where('trang_thai', 'deleted');




        return view('admin.binh_luans.index', [
            'binh_luan_goc' => $binh_luan_goc,
            'binh_luan_moi' => $binh_luan_moi,
            'phan_hoi_an' => $phan_hoi_an,
            'phan_hoi_moi' => $phan_hoi_moi,
            'binh_luan_an' => $binh_luan_an,
            'goc_moi' => $goc_moi,
            'goc_an' => $goc_an,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $binh_luans  = BinhLuan::with([
            'binhLuans.phanHois',
            'binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.binhLuans.phanHois',
            'phanHois',
            'sanPham',
            'taiKhoan'
        ])
            ->get();
        $count = $binh_luans->count();
        $phan_hois  = PhanHoi::with([
            'binhLuan.sanPham',
            'taiKhoan'
        ])
            ->get();
        $binh_luans  = BinhLuan::with([
            'binhLuans.phanHois',
            'binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.phanHois',
            'binhLuans.binhLuans.binhLuans.binhLuans.phanHois',
            'phanHois',
            'sanPham',
            'taiKhoan'
        ])
            ->get();
        // $phan_hois  = PhanHoi::with([
        //     'sanPham',
        //     'taiKhoan'
        // ])
        //     ->get();
        $binh_luan = $binh_luans->find($id);
        $new = $binh_luans->where('trang_thai', 'inactive');
        $new_phan_hoi = $phan_hois->where('trang_thai', 'inactive');

        return view('admin.binh_luans.show', [
            'binh_luan' => $binh_luan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->input('type') == 'binhluan') {

            $binhLuanId = $request->input('id'); // ID của bình luận cần cập nhật
            $trangThai = $request->input('trang_thai'); // Trạng thái mới của bình luận
            $noiDung = $request->input('noi_dung'); // Trạng thái mới của bình luận

            // Tìm bình luận dựa trên ID
            $binhLuan = BinhLuan::find($binhLuanId);

            // Kiểm tra xem bình luận có tồn tại không
            if ($binhLuan) {
                // Cập nhật trạng thái của bình luận
                $binhLuan->trang_thai = $trangThai;
                $binhLuan->noi_dung = $noiDung;
                $binhLuan->save(); // Lưu thay đổi vào CSDL

                return response()->json(['success' => 'Trạng thái bình luận cập nhật thành công']);
            } else {
                return response()->json(['error' => 'Bình luận không tồn tại'], 404);
            }
        } else if ($request->input('type') == 'phanhoi') {

            $phanHoiId = $request->input('id'); // ID của bình luận cần cập nhật
            $trangThai = $request->input('trang_thai'); // Trạng thái mới của bình luận
            $noiDung = $request->input('noi_dung'); // Trạng thái mới của bình luận

            // Tìm bình luận dựa trên ID
            $phanHoi = PhanHoi::find($phanHoiId);

            // Kiểm tra xem bình luận có tồn tại không
            if ($phanHoi) {
                // Cập nhật trạng thái của bình luận
                $phanHoi->trang_thai = $trangThai;
                $phanHoi->noi_dung = $noiDung;
                $phanHoi->save(); // Lưu thay đổi vào CSDL

                return response()->json(['success' => 'Trạng thái bình luận cập nhật thành công']);
            } else {
                return response()->json(['error' => 'Bình luận không tồn tại'], 404);
            }
        }

        return response()->json(['success' => 'Trạng thái cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->input('type') == 'phanhoi') {
            $phanHoiId = $request->input('id'); // ID của bình luận cần cập nhật 
            $phanHoi = PhanHoi::findOrFail($phanHoiId);
            $phanHoi->delete();
            
        }else if ($request->input('type') == 'binhluan') {
            $id = $request->input('id'); // ID của bình luận cần cập nhật 
            $binhLuan = BinhLuan::findOrFail($id);
            $binhLuan->delete();
            
        }

        return response()->json(['success' => 'Xóa thành công']);
    }
}
