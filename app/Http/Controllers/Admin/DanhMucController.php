<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'admin.danh_mucs.';
    const PATH_UPLOAD = 'danh_mucs';
    public function index(Request $request)
    {

        session()->forget('hinh_anh_cu');

        // Lấy tất cả dữ liệu theo thứ tự giảm dần của ID
        $alldata = DanhMuc::query()->latest('id')->get();

        // Lọc dữ liệu dựa trên giá trị của trang_thai nếu không phải null
        $data = DanhMuc::query()
            ->when($request->trang_thai !== null, function ($query) use ($request) {
                return $query->where('trang_thai', $request->trang_thai);
            })
            ->latest('id')
            ->get();

        // Trả về view với dữ liệu đã lọc
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'alldata'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function store(StoreDanhMucRequest $request)
    {
    // Lấy dữ liệu đã được validate từ request
    $validatedData = $request->validated();
    if ($request->hasFile('hinh_anh')) {
        // Lưu tệp vào đường dẫn tự định nghĩa
        $filePath = $request->file('hinh_anh')->store(self::PATH_UPLOAD);
        // Thêm đường dẫn tệp vào mảng $validatedData
        $validatedData['hinh_anh'] = $filePath;
    }
    // Tạo mới danh mục với dữ liệu đã chuẩn bị
    $create = DanhMuc::create($validatedData);

    // Lưu thông báo thành công hoặc lỗi vào session
    if ($create) {
        session()->flash('thongbao', [
            'message' => 'Tạo mới danh mục thành công.',
            'type' => 'success'
        ]);
    } else {
        session()->flash('thongbao', [
            'message' => 'Lỗi khi tạo mới danh mục.',
            'type' => 'danger'
        ]);
    }

    // Chuyển hướng về trang danh sách danh mục
    return redirect()->route('admin.danh_mucs.index');
}





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = DanhMuc::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = DanhMuc::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDanhMucRequest $request, string $id)
    {
        $model = DanhMuc::findOrFail($id);
        $data = $request->validated(); // Sử dụng validated() thay vì validate() để lấy dữ liệu đã được kiểm tra

        // Kiểm tra và cập nhật slug
        if (!empty($request->ten_danh_muc)) {
            $newSlug = Str::slug($request->ten_danh_muc);

            // Kiểm tra xem slug đã tồn tại trong danh sách chưa
            if (DanhMuc::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                // Nếu slug đã tồn tại, lưu thông báo lỗi và chuyển hướng
                session()->flash('thongbao', [
                    'message' => "Slug đã tồn tại trong danh sách.",
                    'type' => "danger"
                ]);
                return redirect()->back()->withInput(); // Quay lại với dữ liệu đã nhập
            }

            $data['slug'] = $newSlug;
        } else {
            // Nếu không có tên danh mục mới, giữ slug cũ
            $data['slug'] = $model->slug;
        }

        // Xử lý hình ảnh
        if ($request->hasFile('hinh_anh')) {
            // Lưu hình ảnh mới vào thư mục và lấy đường dẫn
            $data['hinh_anh'] = $request->file('hinh_anh')->store(self::PATH_UPLOAD);

            // Xóa hình ảnh cũ nếu có hình ảnh mới được upload
            if ($model->hinh_anh && Storage::exists($model->hinh_anh)) {
                Storage::delete($model->hinh_anh);
            }
        } else {
            // Nếu không có hình ảnh mới, giữ lại đường dẫn hình ảnh cũ
            $data['hinh_anh'] = $model->hinh_anh;
        }

        // Cập nhật danh mục với dữ liệu đã chuẩn bị
        $update = $model->update($data);

        // Lưu thông báo thành công hoặc lỗi vào session
        if ($update) {
            session()->flash('thongbao', [
                'message' => "Cập nhật danh mục thành công.",
                'type' => "success"
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => "Lỗi khi cập nhật danh mục.",
                'type' => "danger"
            ]);
        }

        // Chuyển hướng về trang danh sách danh mục
        return redirect()->route('admin.danh_mucs.index');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = DanhMuc::query()->findOrFail($id);
        if ($model->sanPhams()->count() > 0) {
            return redirect()->route('admin.danh_mucs.index')
                             ->with('thongbao',[
                                'message'=> 'Danh mục không thể xóa vì có sản phẩm liên quan.',
                                'type'=>'danger'
                             ]);
        }
       
        if ($model->hinh_anh && Storage::exists($model->hinh_anh)) {
            Storage::delete($model->hinh_anh);
        }
        $isDeleted = $model->delete();
        if ($isDeleted) {
            session()->flash('thongbao', [
                'message' => "Xóa danh mục thành công.",
                'type' => "success"
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => "Xóa danh mục thất bại.",
                'type' => "danger"
            ]);
        }
        return back();
    }
    public function deleteSelected(Request $request)
    {
        
        if ($request->has('ids') && is_array($request->ids)) {
            // Lấy danh sách các ID được chọn
            $ids = $request->ids;
           
          
            // Xóa các mục với ID tương ứng
            DanhMuc::whereIn('id', $ids)->delete();

            session()->flash('thongbao', [
                'message' => "Xóa nhiều danh mục thành công.",
                'type' => "success"
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => "Xóa nhiều danh mục thất bại.",
                'type' => "danger"
            ]);
        }
        return back();
    }
}
