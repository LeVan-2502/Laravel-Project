<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaiKhoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'ten_tai_khoan' => 'required|string|max:100', // Yêu cầu tên tài khoản là chuỗi với tối đa 100 ký tự
            'email' => 'required|email', // Yêu cầu email phải là định dạng email hợp l
            'vai_tro_id' => 'required', // Yêu cầu vai trò phải là số nguyên và nằm trong các giá trị 1, 2, 3
            'gioi_tinh' => 'required', // Yêu cầu giới tính phải là chuỗi và nằm trong các giá trị 1, 2, 3
            'dia_chi' => 'nullable|string|max:255', // Địa chỉ không bắt buộc, tối đa 255 ký tự
            'so_dien_thoai' => 'nullable|string|max:15', // Số điện thoại không bắt buộc, tối đa 15 ký tự
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
