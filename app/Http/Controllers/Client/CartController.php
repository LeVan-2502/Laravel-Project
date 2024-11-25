<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChiTietGioHang;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        $gio_hang_id = Auth::id(); 
      
        $response = Http::get("http://127.0.0.1:8000/api/giohang/{$gio_hang_id}/chitiet");

        if ($response->status() === 404) {
           $data=NULL;
        }else{
            $data = json_decode($response->body(), true);
        }
        return view('client.cart.index', compact('data'));

      
    }
    public function store(Request $request, string $gio_hang_id)
    {
        // Kiểm tra và xác thực dữ liệu đầu vào nếu cần
        $request->validate([
            'san_pham_id' => 'required|string',
            'san_pham_color' => 'required|string',
            'san_pham_size' => 'required|string',
            'so_luong' => 'required|integer|min:1',
        ]);
    
        // Ghi lại thông tin đầu vào (tùy chọn)
        // dd($request);
    
        // Gọi API để thêm sản phẩm vào giỏ hàng
        $response = Http::post("http://127.0.0.1:8000/api/giohang/{$gio_hang_id}/store", [
            'san_pham_id' => $request->san_pham_id,
            'san_pham_color' => $request->san_pham_color,
            'san_pham_size' => $request->san_pham_size,
            'so_luong' => $request->so_luong,
        ]);
    
        // Kiểm tra xem yêu cầu có thành công hay không
        if ($response->successful()) {
            return redirect()->route('client.cart.index')->with([
                'success' => 'Sản phẩm đã được thêm vào đơn hàng của bạn thành công.',
            ]);
        } else {
            // Nếu không thành công, trả về thông báo lỗi
            return redirect()->back()->with([
                'error' => 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.',
            ]);
        }
    }


    public function destroy(String $bien_the_id)
    {
      
        $gio_hang_id = Auth::id();
        $response = Http::delete("http://127.0.0.1:8000/api/giohang/{$bien_the_id}/destroy/{$gio_hang_id}");
        $data = json_decode($response);
        dd($data);
        if ($response->successful() & $data['remainingItems']!=0 ) {
            return redirect()->route('client.cart.index')->with([
                'success' => 'Xóa sản phẩm thành công.',
            ]);
        } else {
            redirect()->route('client.cart.index')->with([
                'success' => 'Giỏ hàng trống.',
            ]);
        }
    }
    public function update(Request $request, string $gio_hang_id)
    {
        dd($request);

        $request->validate([
            'san_pham_id' => 'required|string',
            'san_pham_color' => 'required|string',
            'san_pham_size' => 'required|string',
            'so_luong' => 'required|integer|min:1',
        ]);
    
        // Ghi lại thông tin đầu vào (tùy chọn)
        // dd($request);
    
        // Gọi API để thêm sản phẩm vào giỏ hàng
        $response = Http::post("http://127.0.0.1:8000/api/giohang/{$gio_hang_id}/store", [
            'san_pham_id' => $request->san_pham_id,
            'san_pham_color' => $request->san_pham_color,
            'san_pham_size' => $request->san_pham_size,
            'so_luong' => $request->so_luong,
        ]);
    
        // Kiểm tra xem yêu cầu có thành công hay không
        if ($response->successful()) {
            return redirect()->route('client.cart.index')->with([
                'success' => 'Sản phẩm đã được thêm vào đơn hàng của bạn thành công.',
            ]);
        } else {
            // Nếu không thành công, trả về thông báo lỗi
            return redirect()->back()->with([
                'error' => 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.',
            ]);
        }
    }
    
}
