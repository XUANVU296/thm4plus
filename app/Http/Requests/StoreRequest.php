<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:products',
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
