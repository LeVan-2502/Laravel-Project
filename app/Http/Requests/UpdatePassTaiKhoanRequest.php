<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassTaiKhoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            
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

           

            'vai_tro_id.required' => 'Vai trò không được để trống.',

            'gioi_tinh.required' => 'Giới tính không được để trống.',

            'dia_chi.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'so_dien_thoai.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 15 ký tự.',


            'gioi_thieu.string' => 'Giới thiệu phải là một chuỗi ký tự.',

            'trang_thai.nullable' => 'Trạng thái có thể được để trống.',

        ];
    }
}
