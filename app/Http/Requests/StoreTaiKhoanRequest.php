<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaiKhoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_tai_khoan' => 'required|string|max:100', // Yêu cầu tên tài khoản là chuỗi với tối đa 100 ký tự
            'email' => 'required|email', // Yêu cầu email phải là định dạng email hợp lệ
            'password' => 'required|string|min:8', // Yêu cầu mật khẩu với tối thiểu 8 ký tự
            're_password' => 'required|string|min:8|same:password', // Yêu cầu xác nhận mật khẩu phải giống mật khẩu chính
            'vai_tro_id' => 'required', // Yêu cầu vai trò phải là số nguyên và nằm trong các giá trị 1, 2, 3
            'gioi_tinh' => 'required', // Yêu cầu giới tính phải là chuỗi và nằm trong các giá trị 1, 2, 3
            'dia_chi' => 'nullable|string|max:255', // Địa chỉ không bắt buộc, tối đa 255 ký tự
            'so_dien_thoai' => 'nullable|string|max:15', // Số điện thoại không bắt buộc, tối đa 15 ký tự
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Hình ảnh không bắt buộc, với các định dạng và kích thước giới hạn
            'gioi_thieu' => 'nullable|string', // Giới thiệu không bắt buộc
            'trang_thai' => 'nullable', // Trạng thái không bắt buộc, phải là chuỗi và nằm trong các giá trị 1, 2
        ];
    }
    public function messages(): array
    {
        return [
            'ten_tai_khoan.required' => 'Tên tài khoản không được để trống.',
            'ten_tai_khoan.string' => 'Tên tài khoản phải là một chuỗi ký tự.',
            'ten_tai_khoan.max' => 'Tên tài khoản không được vượt quá 100 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            're_password.required' => 'Vui lòng nhập lại mật khẩu để xác nhận.',
            're_password.string' => 'Xác nhận mật khẩu phải là một chuỗi ký tự.',
            're_password.min' => 'Xác nhận mật khẩu phải có ít nhất 8 ký tự.',
            're_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu.',

            'vai_tro_id.required' => 'Vai trò không được để trống.',

            'gioi_tinh.required' => 'Giới tính không được để trống.',

            'dia_chi.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'so_dien_thoai.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 15 ký tự.',

            'hinh_anh.image' => 'Hình ảnh phải là một file hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, hoặc svg.',
            'hinh_anh.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',

            'gioi_thieu.string' => 'Giới thiệu phải là một chuỗi ký tự.',

            'trang_thai.nullable' => 'Trạng thái có thể được để trống.',

        ];
    }
}
