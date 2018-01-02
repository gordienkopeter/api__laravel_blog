<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    use FormRequestTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:' . Category::getTableName(),
            'parent_id' => 'int',
        ];
    }
}
