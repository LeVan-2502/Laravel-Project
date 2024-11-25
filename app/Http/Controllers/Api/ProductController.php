<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
use App\Models\SanPhamColor;
use App\Models\SanPhamGallery;
use App\Models\SanPhamSize;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = SanPham::paginate(12);
        return response()->json($products);
    }
    public function show(String $id)
    {
        // Lấy tất cả các dữ liệu cần thiết
        $danh_mucs = DanhMuc::query()->pluck('ten_danh_muc', 'id')->all();
        $tags = Tag::query()->pluck('ten', 'id')->all();
        $sizes = SanPhamSize::query()->pluck('ten_size')->all();
        $colors = SanPhamColor::query()->pluck('ma_mau')->all();
        $galleries = SanPhamGallery::where('san_pham_id', $id)->pluck('hinh_anh');

        // Lấy thông tin sản phẩm theo id
        $san_pham = SanPham::with(['danhMuc', 'tags'])->find($id);

        // Lấy các biến thể của sản phẩm
        $san_pham_bien_thes = SanPhamBienThe::with(['sanPhamColor', 'sanPhamSize'])
            ->where('san_pham_id', $id)
            ->get();

        // Lấy danh sách size và color của biến thể sản phẩm
        $sizeBienThe = $san_pham_bien_thes->pluck('sanPhamSize.ten_size')->unique();
        $colorBienThe = $san_pham_bien_thes->pluck('sanPhamColor.ma_mau')->unique();

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$san_pham) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Trả về phản hồi JSON với tất cả các dữ liệu
        return response()->json([
            'san_pham' => $san_pham,
            'galleries' => $galleries,
            'sizes' => $sizes,
            'colors' => $colors,
            'san_pham_bien_thes' => $san_pham_bien_thes,
            'colorBienThe' => $colorBienThe,
            'sizeBienThe' => $sizeBienThe
        ], 200);
    }
    public function getByCategory($categoryId)
    {
        $products = SanPham::where('danh_muc_id', $categoryId)->get();
        return response()->json($products);
    }
}
