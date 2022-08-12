<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdateMealeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'lang' => 'required|array',
            'lang.title' => 'required',
            'lang.description' => 'required',
            'price' => 'required|integer|min:0',
            'image' => 'required|image',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}
