<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietTrangThai;
use App\Models\ChiTietVanChuyen;
use App\Models\DonHang;
use App\Models\PhuongThucThanhToan;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
use App\Models\SanPhamColor;
use App\Models\SanPhamDonHang;
use App\Models\SanPhamSize;
use App\Models\TrangThaiDonHang;
use App\Models\VanChuyen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DonHangController extends Controller
{
    const PATH_VIEW = 'admin.don_hangs.';
    const PATH_UPLOAD = 'don_hangs';
    const PATH_UPLOAD_ITEM = 'don_hangs/san_pham';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('order');
        $don_hangs = DonHang::with(['taiKhoan', 'trangThaiDonHang', 'khuyenMai', 'trangThaiThanhToan', 'phuongThucThanhToan'])->latest('id')->get();

        $tt_don_hangs = TrangThaiDonHang::query()->get();

        foreach ($tt_don_hangs as $index => $item) {
            $ttdh[$index]['ma_trang_thai'] = $item->ma_trang_thai;
            $ttdh[$index]['ten_trang_thai'] = $item->ten_trang_thai;
            $ttdh[$index]['countDH'] =  DonHang::where('trang_thai_don_hang_id', $index + 1)->get()->count();
        }

        foreach ($tt_don_hangs as $index => $item) {
            $dataDonHang[$item->ma_trang_thai] = DonHang::with([
                'taiKhoan',
                'trangThaiDonHang',
                'khuyenMai',
                'trangThaiThanhToan',
                'phuongThucThanhToan'
            ])
                ->where('trang_thai_don_hang_id', $index + 1)
                ->latest('id')
                ->get();
        }
        $keys = array_keys($dataDonHang);
        return view('admin.don_hangs.index', [
            'don_hangs' => $don_hangs,
            'ttdh' => $ttdh,
            'dataDonHang' => $dataDonHang,
            'dataDonHang' => $dataDonHang,
            'keys' => $keys,

        ]);
    }
    public function show(String $id)
    {
        $ttdh = TrangThaiDonHang::query()->get();
        $ttdh_count = ChiTietTrangThai::with([
            'donHang.taiKhoan',
        ])
            ->where('don_hang_id', $id)
            ->get();

        $don_hang = DonHang::with([
            'taiKhoan',
            'vanChuyen',
            'chiTietDonHangs.sanPhamBienThes.sanPham',
            'chiTietDonHangs.sanPhamBienThes.sanPhamSize',
            'chiTietDonHangs.sanPhamBienThes.sanPhamColor',

        ])->find($id);

        $bien_thes = $don_hang->chiTietDonHangs;
        $van_chuyens = VanChuyen::query()->pluck('ten_van_chuyen', 'id');
        $van_chuyen = $don_hang->vanChuyens->first();
        $tai_khoan = $don_hang->taiKhoan;
        $chi_tiet_tt = ChiTietTrangThai::with(['taiKhoan'])->where('don_hang_id', $id)->get();
        $tt_hien_tai = $don_hang->trang_thai_don_hang_id;


        $mang_tt = ChiTietTrangThai::where('don_hang_id', $id)->pluck('trang_thai_id')->toArray();

        return view('admin.don_hangs.show', [
            'don_hang' => $don_hang,
            'bien_thes' => $bien_thes,
            'van_chuyen' => $van_chuyen,
            'van_chuyens' => $van_chuyens,
            'tai_khoan' => $tai_khoan,
            'ttdh' => $ttdh,
            'tt_hien_tai' => $tt_hien_tai,
            'ttdh_count' => $ttdh_count,
            'chi_tiet_tt' => $chi_tiet_tt,
            'mang_tt' => $mang_tt,

        ]);
    }
    public function edit(String $id)
    {
        $pttts = PhuongThucThanhToan::query()->pluck('ten_phuong_thuc', 'id');
        $san_pham_bien_thes = SanPhamBienThe::with([
            'sanPham.danhMuc',
            'sanPhamColor',
            'sanPhamSize',
        ])
            ->latest('id')
            ->get();

        $don_hang = DonHang::with([
            'taiKhoan',
            'vanChuyen',
            'chiTietDonHangs.sanPhamBienThes.sanPham.danhMuc',
            'chiTietDonHangs.sanPhamBienThes.sanPhamSize',
            'chiTietDonHangs.sanPhamBienThes.sanPhamColor',

        ])->find($id);
        if (null === session('order')) {
            $order = [];
            $spbt_don_hang = $don_hang->chiTietDonHangs;
            session(['order' => $order]);
            foreach ($spbt_don_hang as $bien_the) {
                if (!isset($order[$bien_the->sanPhamBienThes->id])) {
                    $order[$bien_the->sanPhamBienThes->id] = [
                        'id' => $bien_the->sanPhamBienThes->id,
                        'sku' => $bien_the->sanPhamBienThes->sku,
                        'gia' => $bien_the->sanPhamBienThes->gia, // Sửa khóa 'sku' thành 'gia'
                        'ten_san_pham' => $bien_the->sanPhamBienThes->sanPham->ten_san_pham,
                        'ten_danh_muc' => $bien_the->sanPhamBienThes->sanPham->danhMuc->ten_danh_muc, // Sửa khóa 'ten_san_pham' cho danh mục
                        'color' => $bien_the->sanPhamBienThes->sanPhamColor->ma_mau,
                        'size' => $bien_the->sanPhamBienThes->sanPhamSize->ten_size,
                        'so_luong' => 1,
                        'hinh_anh' => $bien_the->sanPhamBienThes->hinh_anh,
                    ];
                }
            }
            session(['order' => $order]);
        }

        return view('admin.don_hangs.edit ', [
            'don_hang' => $don_hang,
            'pttts' => $pttts,
            'san_pham_bien_thes' => $san_pham_bien_thes,
        ]);
    }
    public function updateStatus(Request $request)
    {

        $donHang = DonHang::findOrFail($request->don_hang_id);
        $donHang->trang_thai_don_hang_id += 1;
        $donHang->save();

        // Thêm bản ghi vào chi_tiet_trang_thais
        ChiTietTrangThai::create([
            'don_hang_id' => $donHang->id,
            'trang_thai_id' => $donHang->trang_thai_don_hang_id,
            'tai_khoan_id' => auth()->id(), // Hoặc lấy từ request/session
            'thoi_gian' => now(),
            'ghi_chu' => 'Cập nhật trạng thái',
        ]);

        return response()->json(['success' => 'Trạng thái cập nhật thành công']);
    }
    public function cancel(Request $request)
    {

        $ghi_chu = $request->input('ghi_chu');
        $donHang = DonHang::findOrFail($request->don_hang_id);
        $donHang->trang_thai_don_hang_id = 7;

        $donHang->save();

        // Thêm bản ghi vào chi_tiet_trang_thais
        ChiTietTrangThai::create([
            'don_hang_id' => $donHang->id,
            'trang_thai_id' => 7,
            'tai_khoan_id' => auth()->id(), // Hoặc lấy từ request/session
            'thoi_gian' => now(),
            'ghi_chu' => $ghi_chu,
        ]);

        return response()->json(['success' => 'Hủy đơn hàng thành công']);
    }
    public function create()
    {
        $pttts = PhuongThucThanhToan::query()->pluck('ten_phuong_thuc', 'id');
        $san_pham_bien_thes = SanPhamBienThe::with([
            'sanPham.danhMuc',
            'sanPhamColor',
            'sanPhamSize',
        ])
            ->latest('id')
            ->get();
        return view('admin.don_hangs.create', [
            'san_pham_bien_thes' => $san_pham_bien_thes,
            'pttts' => $pttts,
        ]);
    }
    public function store(Request $request)
    {
        function generateOrderCode()
        {
            $currentDate = Carbon::now();
            $dayMonth = $currentDate->format('dm'); // Định dạng ngày tháng theo ddmm
            $orderCountToday = DonHang::whereDate('ngay_dat', $currentDate->format('Y-m-d'))->count() + 1;
            $orderCode =  $dayMonth . 'DH' . str_pad($orderCountToday, 2, '0', STR_PAD_LEFT);

            return $orderCode;
        }
        $don_hang = $request->input();
        unset($don_hang['_token']);

        $don_hang['trang_thai_don_hang_id'] = 1;
        $don_hang['tai_khoan_id'] = auth()->user()->id;
        $don_hang['khuyen_mai_id'] = rand(1, 10);
        $don_hang['ngay_dat'] = now();
        $don_hang['ma_don_hang'] = generateOrderCode();
        if ($don_hang['phuong_thuc_id'] == 1) {
            $don_hang['trang_thai_thanh_toan_id'] = 1;
        } else {
            $don_hang['trang_thai_thanh_toan_id'] = 2;
        }

        $new_dh =  DonHang::create($don_hang);
        $order = session()->get('order', []);
        $check = true;
        foreach ($order as $item) {
            $chi_tiet = ChiTietDonHang::create([
                'don_hang_id' => $new_dh->id,
                'bien_the_id' => $item['id'],
                'so_luong' => $item['so_luong'],
                'gia' => $item['gia'],
                'tong_tien' => $item['so_luong'] * $item['gia'],
            ]);
            if (!$chi_tiet) {
                $check = false;
                break;
            }
        }

        $trangThai = ChiTietTrangThai::create([
            'don_hang_id' => $new_dh->id,
            'trang_thai_id' => 1,
            'tai_khoan_id' => null,
            'thoi_gian' => now(),
            'ghi_chu' => 'Đặt hàng thành công'
        ]);
        session()->forget('order');
        if ($new_dh && $check) {
            session()->flash('thongbao', [
                'message' => 'Tạo đơn hàng thành công.',
                'type' => 'success'
            ]);
            return redirect()->route('admin.don_hangs.show', $new_dh->id);
        } else {
            session()->flash('thongbao', [
                'message' => 'Đã xảy ra lỗi khi tạo đơn hàng..',
                'type' => 'success'
            ]);
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        try {
            $don_hang = $request->input();
            unset($don_hang['_token']);
            unset($don_hang['_method']);

            // Cập nhật trạng thái thanh toán dựa trên phương thức
            $don_hang['trang_thai_thanh_toan_id'] = ($don_hang['phuong_thuc_id'] == 1) ? 1 : 2;

            // Cập nhật đơn hàng trong cơ sở dữ liệu
            $update = DonHang::where('id', $don_hang['id'])->update($don_hang);

            // Xóa chi tiết đơn hàng cũ
            $order = session()->get('order', []);
            $dh = DonHang::with(['chiTietDonHangs'])->find($don_hang['id']);
            $spbt_don_hang = $dh->chiTietDonHangs;

            foreach ($spbt_don_hang as $item) {
                $item->delete();
            }

            // Thêm các chi tiết đơn hàng mới
            $check = true;
            foreach ($order as $item) {
                $chi_tiet = ChiTietDonHang::create([
                    'don_hang_id' => $don_hang['id'],
                    'bien_the_id' => $item['id'],
                    'so_luong' => $item['so_luong'],
                    'gia' => $item['gia'],
                    'tong_tien' => $item['so_luong'] * $item['gia'],
                ]);

                if (!$chi_tiet) {
                    $check = false;
                    break;
                }
            }

            session()->forget('order');
            if ($update && $check) {
                session()->flash('thongbao', [
                    'message' => 'Cập nhật hàng thành công.',
                    'type' => 'success'
                ]);
                return redirect()->route('admin.don_hangs.show', $don_hang['id']);
            } else {
                session()->flash('thongbao', [
                    'message' => 'Đã xảy ra lỗi khi cập nhật đơn hàng.',
                    'type' => 'danger'
                ]);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('thongbao', [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'type' => 'danger'
            ]);
            return redirect()->back();
        }
    }

    public function deleteSanPham(Request $request)
    {

        try {
            $bien_the_id = $request->input('id');
            $order = session()->get('order', []);

            if (isset($order[$bien_the_id])) {
                unset($order[$bien_the_id]);
                session()->put('order', $order);

                return response()->json([
                    'success' => 'Sản phẩm đã được xóa khỏi đơn hàng.',
                ]);
            }

            return response()->json([
                'error' => 'Sản phẩm không tồn tại trong đơn hàng.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Có lỗi xảy ra: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function addSanPham(Request $request)
    {

        $ids = $request->input('ids_id');

        // Kiểm tra và chuẩn hóa dữ liệu đầu vào
        if (!is_array($ids)) {
            $ids = json_decode($ids, true);
            if (!is_array($ids)) {
                $ids = [];
            }
        }

        // Truy vấn các sản phẩm biến thể dựa trên danh sách $ids
        $san_pham_bien_thes = SanPhamBienThe::whereIn('id', $ids)
            ->with(['sanPham.danhMuc', 'sanPhamColor', 'sanPhamSize'])
            ->get();

        // Lấy thông tin đơn hàng hiện tại từ session
        $order = session()->get('order', []);

        // Thêm các sản phẩm dele thể vào đơn hàng
        foreach ($san_pham_bien_thes as $bien_the) {
            if (!isset($order[$bien_the->id])) {
                $order[$bien_the->id] = [
                    'id' => $bien_the->id,
                    'sku' => $bien_the->sku,
                    'gia' => $bien_the->gia, // Sửa khóa 'sku' thành 'gia'
                    'ten_san_pham' => $bien_the->sanPham->ten_san_pham,
                    'ten_danh_muc' => $bien_the->sanPham->danhMuc->ten_danh_muc, // Sửa khóa 'ten_san_pham' cho danh mục
                    'color' => $bien_the->sanPhamColor->ma_mau,
                    'size' => $bien_the->sanPhamSize->ten_size,
                    'so_luong' => 1,
                    'hinh_anh' => $bien_the->hinh_anh,
                ];
            }
        }

        // Cập nhật session với đơn hàng mới
        session()->put('order', $order);

        // Trả về phản hồi JSON thành công
        return response()->json([
            'success' => 'Sản phẩm đã được thêm vào đơn hàng.',
        ]);
    }
    public function addVanChuyen(Request $request)
    {
        $request->validate([
            'van_chuyen_id' => 'required|exists:van_chuyens,id',
            'don_hang_id' => 'required|exists:don_hangs,id',
        ]);

        try {
            $van_chuyen_id = $request->input('van_chuyen_id');
            $don_hang_id = $request->input('don_hang_id');

            $donHang = DonHang::find($don_hang_id);

            if (!$donHang) {
                return response()->json([
                    'error' => 'Đơn hàng không tồn tại.',
                ], 404);
            }

            $donHang->van_chuyen_id = $van_chuyen_id;
            $donHang->save();

            $chiTiet = ChiTietVanChuyen::create([
                'don_hang_id' => $don_hang_id,
                'van_chuyen_id' => $van_chuyen_id,
                'trang_thai' => 'Đang giao hàng',
            ]);

            return response()->json([
                'success' => 'Cập nhật nhà vận chuyển thành công.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Có lỗi xảy ra: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateBienThe(Request $request)
    {
        $page = $request->input('page');
        $id = $request->input('don_hang_id');

        $pttts = PhuongThucThanhToan::query()->pluck('ten_phuong_thuc', 'id');
        $san_pham_bien_thes = SanPhamBienThe::with([
            'sanPham.danhMuc',
            'sanPhamColor',
            'sanPhamSize',
        ])->latest('id')->get();

        $don_hang = DonHang::with([
            'taiKhoan',
            'vanChuyen',
            'chiTietDonHangs.sanPhamBienThes.sanPham.danhMuc',
            'chiTietDonHangs.sanPhamBienThes.sanPhamSize',
            'chiTietDonHangs.sanPhamBienThes.sanPhamColor',
        ])->find($id);

        $san_phams = SanPham::with(['danhMuc', 'tags'])->latest('id')->get();

        $bien_the_ids = $request->input('bien_the_id', []); // Mặc định là mảng rỗng nếu không có
        $so_luongs = $request->input('so_luong', []); // Mặc định là mảng rỗng nếu không có

        $order = session()->get('order', []);

        foreach ($bien_the_ids as $index => $bien_the_id) {
            if (isset($order[$bien_the_id])) {
                $order[$bien_the_id]['so_luong'] = $so_luongs[$index];
            }
        }

        session()->put('order', $order);

        if ($page === 'edit') {
            // Sử dụng redirect để chuyển hướng đến trang chỉnh sửa đơn hàng với ID cụ thể
            return redirect()->route('admin.don_hangs.edit', ['id' => $id])
                ->with('thongbao', [
                    'message' => 'Cập nhật sản phẩm thành công.',
                    'type' => 'success'
                ]);
        } else {
            session()->flash('thongbao', [
                'message' => 'Cập nhật sản phẩm thành công.',
                'type' => 'success'
            ]);
            return view('admin.don_hangs.create', [
                'san_pham_bien_thes' => $san_pham_bien_thes,
                'pttts' => $pttts,
            ]);
        }
    }
    public function destroy(string $id)
    {

        try {
            $donHang = DonHang::find($id);

            if (!$donHang) {
                return redirect()->back()->with('thongbao', [
                    'message' => 'Đơn hàng không tồn tại.',
                    'type' => 'danger'
                ]);
            }
            $donHang->delete();
            return redirect()->route('admin.don_hangs.index')->with('thongbao', [
                'message' => 'Xóa thành công đơn hàng.',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('thongbao', [
                'message' => 'Có lỗi xảy ra khi xóa đơn hàng.',
                'type' => 'danger'
            ]);
        }
    }
}
