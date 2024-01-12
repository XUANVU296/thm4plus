<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('products')->ignore($this->route('product'))],
            'author' => 'required',
            'genre' => 'required',
            'page' => 'required|numeric',
            'year' => ['required', 'date', 'before_or_equal:' . now()->format('Y')],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống.',
            'name.unique' => 'Tên đã tồn tại, vui lòng chọn tên khác.',
            'author.required' => 'Không được để trống.',
            'genre.required' => 'Không được để trống',
            'page.required' => 'Không được để trống',
            'page.numeric' => 'Bắt buộc phải là số',
            'year.required' => 'Không được để trống',
            'year.before_or_equal' => 'Năm xuất bản không được quá ngày hiện tại.',
        ];
    }
}
