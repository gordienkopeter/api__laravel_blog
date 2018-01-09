<?php

namespace App\Http\Requests\Category;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryNestedTreeRequest extends FormRequest
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
            'right' => 'int',
            'left' => 'int',
        ];
    }
}
