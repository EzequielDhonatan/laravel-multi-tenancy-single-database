<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Tenant\TenantUnique;

class StoreUpdateFormRequest extends FormRequest
{
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
            
            'title'                 => [
                'required',
                'min:3',
                'max:100',
                new TenantUnique('posts', $this->segment(2)),
            ],

            'body'                  => 'required|min:3|max:10000',

        ];
    }
}
