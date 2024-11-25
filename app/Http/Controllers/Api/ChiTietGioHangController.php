<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChiTietGioHang;
use App\Models\GioHang;
use App\Models\SanPhamBienThe;
use App\Models\SanPhamColor;
use App\Models\SanPhamSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChiTietGioHangController extends Controller
{
    public function index($gio_hang_id)
    {

        $gioHang = GioHang::find($gio_hang_id);

        if (!$gioHang) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
        $chiTietGioHang = ChiTietGioHang::where('gio_hang_id', $gioHang->id)
            ->with('sanPhamBienThe.sanPham.danhMuc', 'sanPhamBienThe.sanPhamSize', 'sanPhamBienThe.sanPhamColor')
            ->get();
        if ($chiTietGioHang->isEmpty()) {
            return response()->json(['message' => 'No items found in the cart'], 404);
        }

        return response()->json($chiTietGioHang, 200);
    }
    public function store(Request $request, $gio_hang_id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'san_pham_id' => 'required|string',
            'san_pham_color' => 'required|string',
            'san_pham_size' => 'required|string',
            'so_luong' => 'required|integer|min:1',
        ]);

        // Tìm kiếm ID cho màu sắc và kích thước sản phẩm
        $san_pham_color = SanPhamColor::where('ma_mau', $request->san_pham_color)->first();
        $san_pham_size = SanPhamSize::where('ten_size', $request->san_pham_size)->first();

        $san_pham_bien_the_id = SanPhamBienThe::where('san_pham_color_id', $san_pham_color->id)
            ->where('san_pham_size_id', $san_pham_size->id)
            ->where('san_pham_id', $request->san_pham_id)
            ->first()->id;

        if (!$san_pham_color || !$san_pham_size) {
            return response()->json([
                'success' => false,
                'message' => 'Màu sắc hoặc kích thước không hợp lệ.',
            ], 400);
        }

        $chiTiet = ChiTietGioHang::where('san_pham_bien_the_id', $san_pham_bien_the_id)
            ->where('gio_hang_id', $gio_hang_id)->first();
        if ($chiTiet) {

            $spbt = $chiTiet->increment('so_luong', $request->so_luong);
        } else {
            $spbt = ChiTietGioHang::create([
                'gio_hang_id' => $gio_hang_id,
                'san_pham_bien_the_id' => $san_pham_bien_the_id,
                'so_luong' => $request->so_luong,
            ]);
        }

        // Phản hồi thành công
        return response()->json([
            'success' => true,
            'message' => "Thêm sản phẩm vào giỏ hàng thành công",
            'data' => $spbt // Trả về chi tiết sản phẩm vừa thêm
        ], 201);
    }
    public function destroy($bien_the_id, $gio_hang_id)
    { 
        $chiTiet = ChiTietGioHang::where('gio_hang_id', $gio_hang_id)
                    ->where('san_pham_bien_the_id', $bien_the_id)->first();
        $check = $chiTiet->delete();
        
        $remainingItems = ChiTietGioHang::where('gio_hang_id', $gio_hang_id)->count();

        return response()->json([
            'success' => true,
            'remainingItems' => $remainingItems
        ], 200);
    }
}
