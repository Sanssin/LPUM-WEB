<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateElectionRequest extends FormRequest
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
            'election_name' => 'required|min:8',
            'election_period' => 'required|numeric|integer|min:2019',
            'start_election' => 'required',
            'end_election' => 'required|after:start_election',
            'description' => 'nullable',
            'election_image' => 'required|file|image|max:2048'
        ];
    }
}
