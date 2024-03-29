<?php

namespace App\Http\Requests\Panel\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Tenant\Unique\TenantUnique;

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

            'image'         => 'image|mimes:jpg,jpeg,png|max:1024',

            'title'         => [
                'required', 'min:3', 'max:100',
                new TenantUnique( 'posts', $this->segment( 4 ) )
            ],

            'body'          => 'required|max:10000',
            'situation'     => 'required'

        ]; // return

    } // rules

} // StoreUpdateFormRequest
