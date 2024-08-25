<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
    public function rules()
    {
        return [
            'ten_san_pham' => 'required|string|max:255',
            // 'slug' => [
            //     'required',
            //     'string',
            //     'max:255',
            //     // Thay đổi 'danh_mucs' thành tên bảng của bạn và 'id' thành khóa chính nếu cần.
            //     'unique:san_phams,slug,' . $this->id,
            // ],
            'mo_ta' => 'nullable|string',
            'gia' => 'required|numeric|min:0',
            'gia_khuyen_mai' => 'nullable|numeric|min:0',
            'so_luong_ton' => 'required|integer|min:0',
            'thuong_hieu' => 'nullable|string|max:255',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'hinh_anh' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'mo_ta_ngan' => 'nullable|string|max:500',


            'tag_ids[]'=> 'requỉred|array'
        ];
    }

    public function messages(): array
{
    return [
        'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
        'ten_san_pham.string' => 'Tên sản phẩm phải là một chuỗi ký tự.',
        'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

        'slug.required' => 'Slug là bắt buộc.',
        'slug.string' => 'Slug phải là một chuỗi ký tự.',
        'slug.max' => 'Slug không được vượt quá 255 ký tự.',
        'slug.unique' => 'Slug đã tồn tại.',

        'mo_ta.string' => 'Mô tả phải là một chuỗi ký tự.',

        'gia.required' => 'Giá là bắt buộc.',
        'gia.numeric' => 'Giá phải là số.',
        'gia.min' => 'Giá phải lớn hơn hoặc bằng 0.',

        'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là số.',
        'gia_khuyen_mai.min' => 'Giá khuyến mãi phải lớn hơn hoặc bằng 0.',
        'gia_khuyen_mai.nullable' => 'Giá khuyến mãi có thể để trống.',

        'so_luong_ton.required' => 'Số lượng tồn là bắt buộc.',
        'so_luong_ton.integer' => 'Số lượng tồn phải là số nguyên.',
        'so_luong_ton.min' => 'Số lượng tồn không được nhỏ hơn 0.',

        'thuong_hieu.string' => 'Thương hiệu phải là một chuỗi ký tự.',
        'thuong_hieu.max' => 'Thương hiệu không được vượt quá 255 ký tự.',

        'danh_muc_id.required' => 'Danh mục là bắt buộc.',
        'danh_muc_id.exists' => 'Danh mục không tồn tại.',

        'hinh_anh.nullable' => 'Hình ảnh có thể để trống.',
        'hinh_anh.image' => 'Hình ảnh phải là một tệp hình ảnh.',
        'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, hoặc png.',
        'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB.',

        'mo_ta_ngan.string' => 'Mô tả ngắn phải là một chuỗi ký tự.',
        'mo_ta_ngan.max' => 'Mô tả ngắn không được vượt quá 500 ký tự.',

        'tag_ids.required' => 'Bạn cần chọn ít nhất một tag.',
        'tag_ids.array' => 'Tag IDs phải là một mảng.',
    ];
}

}
