<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'leader_nim' => 'required|exists:users,nim',
            'lead_position' => 'required_with:leader_nim|min:5',
            'coleader_nim' => 'nullable|exists:users,nim',
            'colead_position' => 'nullable|required_with:coleader_nim|min:5',
            'slogan' => 'nullable|max:255',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'candidate_image' => 'required|file|image|max:2048'
        ];
    }

    public function attributes()
    {
        return [
            'leader_nim' => 'Nomor induk kandidat utama',
            'coleader_nim' => 'Nomor induk wakil kandidat',
            'lead_position' => 'Nama posisi utama',
            'colead_position' => 'Nama posisi kedua',
            'slogan' => 'Jargon',
            'candidate_image' => 'Foto calon',
        ];
    }
}
