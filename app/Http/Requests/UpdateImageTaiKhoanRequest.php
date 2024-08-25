<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageTaiKhoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
             'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'hinh_anh.image' => 'Hình ảnh phải là một file hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, hoặc svg.',
            'hinh_anh.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',

        ];
    }
}
