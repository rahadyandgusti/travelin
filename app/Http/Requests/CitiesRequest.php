<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $checkId = \Request::segment(3);
        
        if (is_numeric($checkId)) {
            $rules['name'] = 'required|min:3|unique:cities,name,'.$checkId;
        } else {
            $rules['name'] = 'required|min:3|unique:cities,name';
        }
        $rules['province_id'] = 'required';

        return $rules;
    }
}
