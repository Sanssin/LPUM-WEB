<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'organization_name' => 'required|min:2',
            'organization_full_name' => 'required|min:4',
            'organization_period' => 'required|numeric',
            'organization_image' => 'nullable|image|max:2048'
        ];
    }
}
