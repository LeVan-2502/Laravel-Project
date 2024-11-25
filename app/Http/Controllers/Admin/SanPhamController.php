<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
use App\Models\SanPhamColor;
use App\Models\SanPhamGallery;
use App\Models\SanPhamSize;
use App\Models\SanPhamTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;

class SanPhamController extends Controller
{
    protected $table = 'Sản phẩm';
    const PATH_VIEW = 'admin.san_phams.';
    const PATH_UPLOAD = 'san_phams';
    const PATH_UPLOAD_ITEM = 'san_phams/san_pham';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $san_phams = SanPham::with(['danhMuc', 'tags'])->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, [
            'san_phams' => $san_phams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danh_mucs = DanhMuc::query()->pluck('ten_danh_muc', 'id')->all();
        $tags = Tag::query()->pluck('ten', 'id')->all();
        $sizes = SanPhamSize::query()->pluck('ten_size', 'id')->all();
        $colors = SanPhamColor::query()->pluck('ma_mau', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact([
            'danh_mucs',
            'tags',
            'sizes',
            'colors'
        ]));
    }
    function generateUniqueSKU($prefix = 'PROD', $length = 6)
    {
        do {
            $suffix = strtoupper(Str::random($length));
            $sku = $prefix . '-' . $suffix;
            $exists = SanPhamBienThe::where('sku', $sku)->exists();
        } while ($exists); // Tiếp tục tạo SKU mới cho đến khi tìm được SKU duy nhất

        return $sku;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {

        $dataRequets = $request->validated();
        $dataSanPham = Arr::except($dataRequets, ['san_pham_bien_the', 'san_pham_galleries', 'tag_ids']);
        
        if ($dataRequets->hasFile('hinh_anh')) {
            $path = $dataRequets->file('hinh_anh')->store(self::PATH_UPLOAD);
            $dataSanPham['hinh_anh'] = $path;
        }
        $dataSanPham['trang_thai'] = 1;
        $dataSanPham['xep_hang_tb'] = 4.5;
        $dataSanPham['luot_xem'] = 15000;


        $dataBienThe = $dataRequets->san_pham_bien_the;


        $dataGalleries = $dataRequets->san_pham_galleries;


        $dataTag = $dataRequets->tag_ids;
        // try {
        // // DB::beginTransaction();

        $san_pham = SanPham::query()->create($dataSanPham);

        $san_pham->tags()->sync($dataTag);

        foreach ($dataGalleries as $item) {
            SanPhamGallery::create([
                'san_pham_id' => $san_pham->id,
                'hinh_anh' => $item->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/thuvien')
            ]);
        }

        foreach ($dataBienThe as $index => $item) {
            if (isset($item['gia']) && isset($item['so_luong']) && $item['hinh_anh'] instanceof \Illuminate\Http\UploadedFile) {
                // Thêm các thuộc tính vào mảng
                $item['san_pham_id'] = $san_pham->id;
                $item['sku'] = $this->generateUniqueSKU();

                // Lưu tệp tin và lấy đường dẫn
                $path = $item['hinh_anh']->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/bienthe');
                $item['hinh_anh'] = $path;

                // Tạo mới đối tượng SanPhamBienThe trong cơ sở dữ liệu
                SanPhamBienThe::query()->create($item);
            }
        }

        // DB::commit();

        return redirect()->route('admin.san_phams.index')->with([
            'thongbao' => [
                'message' => 'Tạo mới sản phẩm thành công.',
                'type' => 'success'
            ]
        ]);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {

        $danh_mucs = DanhMuc::query()->pluck('ten_danh_muc', 'id')->all();
        $tags = Tag::query()->pluck('ten', 'id')->all();
        $sizes = SanPhamSize::query()->pluck('ten_size')->all();
        $colors = SanPhamColor::query()->pluck('ma_mau')->all();
        $galleries = SanPhamGallery::where('san_pham_id', $id)->pluck('hinh_anh');
        $san_pham = SanPham::with(['danhMuc', 'tags'])->find($id);
        $san_pham_bien_thes = SanPhamBienThe::with(['sanPhamColor', 'sanPhamSize'])->where('san_pham_id', $id)->get();

        $sizeBienThe = $san_pham_bien_thes->pluck('sanPhamSize.ten_size')->unique();
        $colorBienThe = $san_pham_bien_thes->pluck('sanPhamColor.ma_mau')->unique();

        return view(self::PATH_VIEW . __FUNCTION__, [
            'san_pham' => $san_pham,
            'galleries' => $galleries,
            'sizes' => $sizes,
            'colors' => $colors,
            'san_pham_bien_thes' => $san_pham_bien_thes,
            'colorBienThe' => $colorBienThe,
            'sizeBienThe' => $sizeBienThe,

            'table' => $this->table
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {

        $danh_mucs = DanhMuc::query()->pluck('ten_danh_muc', 'id')->all();
        $tags = Tag::query()->pluck('ten', 'id')->all();
        $sizes = SanPhamSize::query()->pluck('ten_size', 'id')->all();
        $colors = SanPhamColor::query()->pluck('ma_mau', 'id')->all();
        $galleries = SanPhamGallery::where('san_pham_id', $id)->get();
        $san_pham = SanPham::with(['danhMuc', 'tags'])->find($id);
        $san_pham_bien_thes = SanPhamBienThe::with(['sanPhamColor', 'sanPhamSize'])->where('san_pham_id', $id)->get();

        $sizeBienThe = $san_pham_bien_thes->pluck('sanPhamSize.ten_size')->unique();
        $colorBienThe = $san_pham_bien_thes->pluck('sanPhamColor.ma_mau')->unique();

        return view(self::PATH_VIEW . __FUNCTION__, [
            'san_pham' => $san_pham,
            'danh_mucs' => $danh_mucs,
            'tags' => $tags,
            'galleries' => $galleries,
            'sizes' => $sizes,
            'colors' => $colors,
            'san_pham_bien_thes' => $san_pham_bien_thes,
            'colorBienThe' => $colorBienThe,
            'sizeBienThe' => $sizeBienThe,

            'table' => $this->table
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SanPhamRequest $request, String $id)
    {
        
        // Bắt đầu transaction
        DB::beginTransaction();
    
        try {
            $san_pham = SanPham::findOrFail($id);
            
            $dataSanPham = $request->except(['san_pham_bien_the', 'san_pham_galleries', 'tag_ids']);
            
            // Xử lý hình ảnh chính của sản phẩm
            if ($request->has('hinh_anh')) {
                $dataSanPham['hinh_anh'] = $request->file('hinh_anh')->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id);
                Storage::delete($san_pham->hinh_anh);
            } else {
                $dataSanPham['hinh_anh'] = $san_pham->hinh_anh;
            }
           
            // Cập nhật các thuộc tính cố định của sản phẩm
            $dataSanPham['trang_thai'] = 1;
            $dataSanPham['xep_hang_tb'] = 4.5;
            $dataSanPham['luot_xem'] = 15000;
    
            // Kiểm tra và cập nhật slug
            if (!empty($request->ten_san_pham)) {
                $newSlug = Str::slug($request->ten_san_pham);
    
                if (SanPham::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                    session()->flash('thongbao', [
                        'message' => "Slug đã tồn tại trong danh sách.",
                        'type' => "danger"
                    ]);
                    return redirect()->back()->withInput();
                }
    
                $dataSanPham['slug'] = $newSlug;
            } else {
                $dataSanPham['slug'] = $san_pham->slug;
            }
    
            $san_pham->update($dataSanPham);
    
            // Xử lý các biến thể của sản phẩm
            $dataBienThe = $request->san_pham_bien_the ?? [];
            
            foreach ($dataBienThe as $item) {
                if (isset($item['id'])) {
                    $sp_bien_the = SanPhamBienThe::find($item['id']);
                    
                    if ($sp_bien_the) {
                        if (isset($item['hinh_anh']) && $item['hinh_anh'] instanceof \Illuminate\Http\UploadedFile) {
                            $path = $item['hinh_anh']->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/bienthe');
                            $item['hinh_anh'] = $path;
    
                            if (isset($item['hinh_anh_cu']) && Storage::exists($item['hinh_anh_cu'])) {
                                Storage::delete($item['hinh_anh_cu']);
                            }
                        } else {
                            $item['hinh_anh'] = $item['hinh_anh_cu'] ?? $sp_bien_the->hinh_anh;
                        }
    
                        unset($item['hinh_anh_cu']);
                        unset($item['id']);
                        $sp_bien_the->update($item);
                    }
                } else if (isset($item['hinh_anh']) && $item['hinh_anh'] instanceof \Illuminate\Http\UploadedFile) {
                    $item['sku'] = $this->generateUniqueSKU();
                    $path = $item['hinh_anh']->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/bienthe');
                    $item['hinh_anh'] = $path;
    
                    SanPhamBienThe::create($item);
                }
            }
            
            $dataGalleries = $request->san_pham_galleries;
            foreach ($dataGalleries as $key=> $item) {
                if ($key != 'new') {
                    $id = ($item['id']);
                    $itemGalleries = SanPhamGallery::find($id);
                    if (isset($item['hinh_anh']) && $item['hinh_anh'] instanceof \Illuminate\Http\UploadedFile) {
                        $path = $item['hinh_anh']->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/thuvien');
                        $item['hinh_anh'] = $path;
    
                        if (isset($item['current_hinh_anh']) && Storage::exists($item['current_hinh_anh'])) {
                            Storage::delete($item['current_hinh_anh']);
                        }
                    } else {
                        $item['hinh_anh'] = $item['current_hinh_anh'] ?? $itemGalleries->hinh_anh;
                    }
                    $itemGalleries->update($item);
                }
            }
            
            $newImages = $dataGalleries['new'] ?? [];
            foreach ($newImages as $newImage) {
                if ($newImage instanceof \Illuminate\Http\UploadedFile) {
                    $path = $newImage->store(self::PATH_UPLOAD_ITEM . 'ID' . $san_pham->id . '/thuvien');
    
                    SanPhamGallery::create([
                        'san_pham_id' => $san_pham->id,
                        'hinh_anh' => $path,
                    ]);
                }
            }
    
            // Đồng bộ tag
            $dataTag = $request->tag_ids ?? [];
            $san_pham->tags()->sync($dataTag);
    
            // Nếu mọi thứ thành công, commit transaction
            DB::commit();
    
            session()->flash('thongbao', [
                'message' => "Cập nhật sản phẩm thành công.",
                'type' => "success"
            ]);
    
            return redirect()->route('admin.san_phams.show',$san_pham->id);
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollBack();
    
            // Ghi log lỗi hoặc xử lý lỗi

            session()->flash('thongbao', [
                'message' => "Cập nhật sản phẩm thất bại.",
                'type' => "danger"
            ]);
    
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $sanPham = SanPham::with(['sanPhamBienThes', 'sanPhamGalleries', 'tags'])->find($id);

        if ($sanPham->hinh_anh && Storage::exists($sanPham->hinh_anh)) {
            Storage::delete($sanPham->hinh_anh);
        }

        foreach ($sanPham->sanPhamBienThes as $item) {
            if ($item->hinh_anh && Storage::exists($item->hinh_anh)) {
                Storage::delete($item->hinh_anh);
            }
            $item->delete();
        }

        foreach ($sanPham->sanPhamGalleries as $item) {
            if ($item->hinh_anh && Storage::exists($item->hinh_anh)) {
                Storage::delete($item->hinh_anh);
            }
            $item->delete();
        }

        $sanPham->tags()->detach();

        $isDelete = $sanPham->delete();

        if ($isDelete) {
            session()->flash('thongbao', [
                'message' => 'Xóa thông tin về sản phẩm thành công',
                'type' => 'success'
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => 'Xóa thông tin thất bại',
                'type' => 'danger'
            ]);
        }
        return back();
    }
    public function deleteSelected(Request $request)
    {

        if ($request->has('ids') && is_array($request->ids)) {
            $ids = $request->ids;

            $isDeleted = true;
            foreach ($ids as $id) {
                // if (!$this->destroy($id)) {
                //     $isDeleted = false;
                // }
                // break;
                $this->destroy($id);
            }

            if ($isDeleted) {
                session()->flash('thongbao', [
                    'message' => 'Xóa nhiều sản phẩm thành công',
                    'type' => 'success'
                ]);
            } else {
                session()->flash('thongbao', [
                    'message' => 'Xóa sản phẩm thất bại',
                    'type' => 'danger'
                ]);
            }
        } else {
            session()->flash('thongbao', [
                'message' => 'Bạn cần chọn sản phẩm để xóa',
                'type' => 'danger'
            ]);
        }

        return back();
    }


    public function destroyBienThe($id)
    {
        $bienThe = SanPhamBienThe::find($id);

        if ($bienThe) {
            Storage::delete($bienThe->hinh_anh);
            $bienThe->delete();
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }
    public function destroyImage($id)
    {
        $gallery = SanPhamGallery::find($id);

        if ($gallery) {
            Storage::delete($gallery->hinh_anh);
            $gallery->delete();
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }
}
