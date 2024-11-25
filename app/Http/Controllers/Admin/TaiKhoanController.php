<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\RequestsTaiKhoanRequest;
use App\Http\Requests\StoreTaiKhoanRequest;
use App\Http\Requests\UpdateImageTaiKhoanRequest;
use App\Http\Requests\UpdatePassTaiKhoanRequest;
use App\Http\Requests\UpdateTaiKhoanRequest;
use App\Models\TaiKhoan;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $table = 'Tài khoản';
    const PATH_VIEW  = 'admin.tai_khoans.';
    const PATH_UPLOAD = 'tai_khoans';
    public function quantrivien()
    {


        $data = TaiKhoan::query()
            ->where('vai_tro_id', 1)
            ->latest('id')
            ->get();
        $rou = __FUNCTION__;
        $title = 'Quản trị viên';
        return view(self::PATH_VIEW . 'index', [
            'data' => $data,
            'rou' => $rou,
            'title' => $title,
            'table' => $this->table
        ]);
    }
    public function nhanvien()
    {


        $data = TaiKhoan::query()
            ->where('vai_tro_id', 2)
            ->latest('id')
            ->get();
        $rou = __FUNCTION__;
        $title = 'Nhân viên';
        return view(self::PATH_VIEW . 'index', [
            'data' => $data,
            'rou' => $rou,
            'title' => $title,
            'table' => $this->table
        ]);
    }
    public function khachhang()
    {


        $data = TaiKhoan::query()
            ->where('vai_tro_id', 3)
            ->latest('id')
            ->get();
        $rou = __FUNCTION__;
        $title = 'Khách hàng';
        return view(self::PATH_VIEW . 'index', [
            'data' => $data,
            'rou' => $rou,
            'title' => $title,
            'table' => $this->table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rou = __FUNCTION__;
        $vai_tros = VaiTro::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, [
            'vai_tros' => $vai_tros,
            'rou' => $rou,
            'table' => $this->table
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaiKhoanRequest $request)
    {
        try {
            // Thực hiện validate dữ liệu
            $validatedData = $request->validated();

            if ($validatedData['vai_tro_id'] == 1) {
                $rou = 'quantrivien';
            } else if ($validatedData['vai_tro_id'] == 2) {
                $rou = 'nhanvien';
            } else if ($validatedData['vai_tro_id'] == 3) {
                $rou = 'khachhang';
            };
            // Kiểm tra và lưu hình ảnh nếu có
            if ($request->hasFile('hinh_anh')) {
                $new_pathFile = $request->file('hinh_anh')->store(self::PATH_UPLOAD);
                $validatedData['hinh_anh'] = $new_pathFile;
            } else {
                // Nếu không có hình ảnh mới, sử dụng hình ảnh mặc định
                $validatedData['hinh_anh'] = 'he_thongs/avatar_default.jpeg';
            }

            // Mã hóa mật khẩu trước khi lưu
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Tạo mới tài khoản với dữ liệu đã chuẩn bị
            TaiKhoan::create($validatedData);


            // Lưu thông báo thành công vào session
            return redirect()->route('admin.tai_khoans.' . $rou)->with([
                'thongbao' => [
                    'message' => 'Tạo mới tài khoản thành công.',
                    'type' => 'success'
                ]
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Nếu xảy ra lỗi, chuyển hướng lại với thông tin lỗi
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Xử lý hình ảnh sau khi dữ liệu đã được validate.
     * 
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    private function handleImageUpload($request)
    {
        if ($request->hasFile('hinh_anh')) {
            // Kiểm tra xem có hình ảnh cũ trong session không
            if (session()->has('hinh_anh_cu')) {
                // Lấy đường dẫn của hình ảnh cũ
                $oldImage = session('hinh_anh_cu');

                // Xóa hình ảnh cũ khỏi hệ thống
                if (Storage::exists($oldImage)) {
                    Storage::delete($oldImage);
                }

                // Xóa đường dẫn của hình ảnh cũ khỏi session
                session()->forget('hinh_anh_cu');
            }

            // Lưu hình ảnh mới và trả về đường dẫn
            return $request->file('hinh_anh')->store(self::PATH_UPLOAD);
        }

        // Trả về null nếu không có hình ảnh nào được tải lên
        return null;
    }


    /**
     * Lưu hình ảnh vào session để sử dụng lại khi validate thất bại.
     */

    /**
     * Xử lý upload hình ảnh và trả về đường dẫn hình ảnh mới hoặc cũ.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vai_tros = VaiTro::query()->get();
        $model = TaiKhoan::findOrFail($id);
        $profile = $this->tinhPhanTramHoanThanh($model);

      

        // Debugging: hiển thị giá trị của profile

        if ($model->vai_tro_id == 2) {
            $rou = 'nhanvien';
            $title = 'Nhân viên';
        } else if ($model->vai_tro_id == 3) {
            $rou = 'khachhang';
            $title = 'Khách hàng';
        } else if ($model->vai_tro_id == 1) {
            $rou = 'quantrivien';
            $title = 'Quản trị viên';
        }


        return view(self::PATH_VIEW . __FUNCTION__, [
            'model' => $model,
            'rou' => $rou,
            'title' => $title,
            'vai_tros' => $vai_tros,
            'profile' => $profile, // Sửa phần này
            'table' => $this->table
        ]);
    }



    function tinhPhanTramHoanThanh($model)
    {
        // Khởi tạo biến để đếm số mục đã hoàn thành
        $completedFields = 0;
        $totalFields = 9; // Tổng số mục thông tin cần thiết

        // Kiểm tra các trường thông tin cơ bản
        if (!empty($model['ten_tai_khoan'])) $completedFields++;
        if (!empty($model['email'])) $completedFields++;
        if (!empty($model['password'])) $completedFields++;
        if (!empty($model['gioi_tinh'])) $completedFields++;
        if (!empty($model['vai_tro_id'])) $completedFields++;

        // Kiểm tra các trường bổ sung
        if (!empty($model['hinh_anh'])) $completedFields++;
        if (!empty($model['so_dien_thoai'])) $completedFields++;
        if (!empty($model['dia_chi'])) $completedFields++;
        if (!empty($model['gioi_thieu'])) $completedFields++;

        // Tính phần trăm hoàn thành
        $percent = ($completedFields / $totalFields) * 100;
        $formattedPercent = number_format($percent, 2);
        // Xác định màu sắc dựa trên phần trăm hoàn thành
        $type = 'secondary'; // Màu mặc định

        if ($percent <= 60) {
            $type = 'danger';
        } elseif ($percent <= 70) {
            $type = 'warning';
        } elseif ($percent <= 80) {
            $type = 'primary';
        } elseif ($percent <= 90) {
            $type = 'info';
        } elseif ($percent <= 100) {
            $type = 'success';
        }

        return [
            'percent' => $formattedPercent,
            'type' => $type
        ];
    }






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $vai_tros = VaiTro::query()->get();
        $model = TaiKhoan::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, [
            'model' => $model,
            'vai_tros' => $vai_tros,
            'table' => $this->table
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // TaiKhoanController.php

    public function update(UpdateTaiKhoanRequest $request, string $id)
    {

        // Xác thực dữ liệu đã được thực hiện tự động bởi UpdateTaiKhoanRequest
        $validatedData = $request->validated();

        // Tìm model theo ID
        $model = TaiKhoan::findOrFail($id);

        // Loại trừ 'hinh_anh' và 'password' khỏi dữ liệu đã xác thực


        // Cập nhật model với dữ liệu đã loại trừ
        $update = $model->update($validatedData);

        // Flash thông báo thành công hoặc lỗi vào session
        if ($update) {
            session()->flash('thongbao', [
                'message' => "Cập nhật tài khoản thành công.",
                'type' => "success"
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => "Lỗi khi cập nhật tài khoản.",
                'type' => "danger"
            ]);
        }

        // Chuyển hướng về trang hiển thị tài khoản
        return redirect()->route('admin.tai_khoans.show', $model->id);
    }
    public function updatePass(UpdatePassTaiKhoanRequest $request, string $id)
    {
        // Tìm model theo ID
        $validatedData = $request->validated();
        $model = TaiKhoan::findOrFail($id);
        if ($validatedData->old_password == $model->password) {
        }
        // Loại trừ 'hinh_anh' và 'password' khỏi dữ liệu đã xác thực

        return redirect()->route('admin.tai_khoans.show', $model->id);
    }
    public function updateImage(Request $request, string $id)
    {
        // Tìm mô hình tài khoản
        $model = TaiKhoan::findOrFail($id);

        // Kiểm tra và xử lý hình ảnh mới
        if ($request->hasFile('hinh_anh')) {
            // Lưu hình ảnh mới vào thư mục và lấy đường dẫn
            $newImagePath = $request->file('hinh_anh')->store(self::PATH_UPLOAD);

            // Xóa hình ảnh cũ nếu có
            if ($model->hinh_anh && Storage::exists($model->hinh_anh)) {
                Storage::delete($model->hinh_anh);
            }

            // Cập nhật đường dẫn hình ảnh mới
            $model->hinh_anh = $newImagePath;
            session()->flash('thongbao', [
                'message' => "Cập nhật Avatar thành công.",
                'type' => "success"
            ]);
        }

        // Lưu mô hình
        $model->save();

        // Chuyển hướng đến trang chi tiết của tài khoản
        return redirect()->route('admin.tai_khoans.show', $model->id);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = TaiKhoan::query()->findOrFail($id);

        // Xóa file hình ảnh nếu tồn tại
        if ($model->hinh_anh && Storage::exists($model->hinh_anh)) {
            Storage::delete($model->hinh_anh);
        }

        // Xóa danh mục khỏi cơ sở dữ liệu
        $isDeleted = $model->delete();

        // Kiểm tra kết quả của việc xóa
        if ($isDeleted) {
            // Lưu thông báo thành công vào session
            session()->flash('thongbao', [
                'message' => "Xóa tài khoản thành công.",
                'type' => "success"
            ]);
        } else {
            // Lưu thông báo lỗi vào session
            session()->flash('thongbao', [
                'message' => "Xóa tài khoản thất bại.",
                'type' => "danger"
            ]);
        }

        // Chuyển hướng về trang danh sách danh mục
        return back();
    }
    public function deleteSelected(Request $request)
    {
        // Kiểm tra xem có các ID được chọn hay không
        if ($request->has('ids') && is_array($request->ids)) {
            // Lấy danh sách các ID được chọn
            $ids = $request->ids;

            // Xóa các mục với ID tương ứng
            TaiKhoan::whereIn('id', $ids)->delete();

            session()->flash('thongbao', [
                'message' => "Xóa nhiều tai_khoan thành công.",
                'type' => "success"
            ]);
        } else {
            session()->flash('thongbao', [
                'message' => "Xóa nhiều tai_khoan thất bại.",
                'type' => "danger"
            ]);
        }
        return back();
    }
}
