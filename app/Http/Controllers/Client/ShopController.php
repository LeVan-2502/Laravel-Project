<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
       
        $currentPage = $request->input('page', 1);

        // Gọi API để lấy danh sách sản phẩm
        $response = Http::get("http://127.0.0.1:8000/api/products/?page={$currentPage}");

        // Giải mã dữ liệu JSON nhận được
        $products = json_decode($response->body(), true);

        $productData = $products['data'] ?? [];

        // Lấy thông tin phân trang từ phản hồi
        $pagination = [
            'current_page' => $products['current_page'] ?? 1,
            'last_page' => $products['last_page'] ?? 1,
            'next_page' => $products['current_page'] < $products['last_page'] ? $products['current_page'] + 1 : null, // Trang tiếp theo
            'prev_page' => $products['current_page'] > 1 ? $products['current_page'] - 1 : null, // Trang trước
            'total' => $products['total'] ?? 0,
            'per_page' => $products['per_page'] ?? 12,
            'from' => $products['from'] ?? 1,
            'to' => $products['to'] ?? count($productData),
        ];


        return view('client.shop.index', [
            'products' => $productData, // Danh sách sản phẩm từ API
            'pagination' => $pagination, // Thông tin phân trang
            'current_page' => $currentPage, // Số trang hiện tại
        ]);
    }
    public function show(String $id)
    {
        
        $response = Http::get("http://127.0.0.1:8000/api/products/".$id);
        $product = json_decode($response->body(), true);
        $categoryId = $product['category_id'] ?? null;
      
    
        $relatedProducts = [];
        if ($categoryId) {
            $relatedResponse = Http::get("http://127.0.0.1:8000/api/products/category/{$categoryId}");
            $related = json_decode($relatedResponse->body(), true);
            $relatedProducts = array_slice($related, 0, 4);
        }
      
       
        return view('client.product.show', [
            'product' => $product, 
            'relatedProducts' => $relatedProducts, 
        ]);
    }
}
