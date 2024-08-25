<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDanhMucRequest extends FormRequest
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
            'ten_danh_muc' => 'required|string|max:50',
            'slug' => 'required|string|max:50',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trang_thai' => 'required|in:1,2',
        ];
        
    }

    public function messages():array
    {
        return [
            'ten_danh_muc.required' => 'Tên danh mục không được bỏ trống.',
            'ten_danh_muc.string' => 'Tên danh mục phải là một chuỗi ký tự.',
            'ten_danh_muc.max' => 'Tên danh mục không được vượt quá 50 ký tự.',
            'slug.required' => 'Slug không được bỏ trống.',
            'slug.string' => 'Slug phải là một chuỗi ký tự.',
            'slug.max' => 'Slug không được vượt quá 50 ký tự.', 
            'hinh_anh.image' => 'Hình ảnh không hợp lệ.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg,hoặc gif.',
            'hinh_anh.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'trang_thai.required' => 'Trạng thái không được bỏ trống.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
