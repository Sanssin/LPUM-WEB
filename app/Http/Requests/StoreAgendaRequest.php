<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgendaRequest extends FormRequest
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
            'event.*' => 'nullable',

            'start_event.pendaftaran' => 'exclude_without:event.pendaftaran|required',
            'end_event.pendaftaran' => 'exclude_without:event.pendaftaran|required|after:start_event.pendaftaran',
            'method.pendaftaran' => 'exclude_without:event.pendaftaran|required',
            'location.pendaftaran' => 'exclude_without:event.pendaftaran|required|min:5',

            'start_event.nourut' => 'exclude_without:event.nourut|required',
            'end_event.nourut' => 'exclude_without:event.nourut|required|after:start_event.nourut',
            'method.nourut' => 'exclude_without:event.nourut|required',
            'location.nourut' => 'exclude_without:event.nourut|required|min:5',

            'start_event.orasi1' => 'exclude_without:event.orasi1|required',
            'end_event.orasi1' => 'exclude_without:event.orasi1|required|after:start_event.orasi1',
            'method.orasi1' => 'exclude_without:event.orasi1|required',
            'location.orasi1' => 'exclude_without:event.orasi1|required|min:5',

            'start_event.orasi2' => 'exclude_without:event.orasi2|required',
            'end_event.orasi2' => 'exclude_without:event.orasi2|required|after:start_event.orasi2',
            'method.orasi2' => 'exclude_without:event.orasi2|required',
            'location.orasi2' => 'exclude_without:event.orasi2|required|min:5',

            'start_event.kampanye' => 'exclude_without:event.kampanye|required',
            'end_event.kampanye' => 'exclude_without:event.kampanye|required|after:start_event.kampanye',
            'method.kampanye' => 'exclude_without:event.kampanye|required',
            'location.kampanye' => 'exclude_without:event.kampanye|required|min:5',

            'start_event.debat1' => 'exclude_without:event.debat1|required',
            'end_event.debat1' => 'exclude_without:event.debat1|required|after:start_event.debat1',
            'method.debat1' => 'exclude_without:event.debat1|required',
            'location.debat1' => 'exclude_without:event.debat1|required|min:5',

            'start_event.debat2' => 'exclude_without:event.debat2|required',
            'end_event.debat2' => 'exclude_without:event.debat2|required|after:start_event.debat2',
            'method.debat2' => 'exclude_without:event.debat2|required',
            'location.debat2' => 'exclude_without:event.debat2|required|min:5',

            'start_event.debat3' => 'exclude_without:event.debat3|required',
            'end_event.debat3' => 'exclude_without:event.debat3|required|after:start_event.debat3',
            'method.debat3' => 'exclude_without:event.debat3|required',
            'location.debat3' => 'exclude_without:event.debat3|required|min:5',

            'start_event.pengumuman' => 'exclude_without:event.pengumuman|required',
            'end_event.pengumuman' => 'exclude_without:event.pengumuman|required|after:start_event.pengumuman',
            'method.pengumuman' => 'exclude_without:event.pengumuman|required',
            'location.pengumuman' => 'exclude_without:event.pengumuman|required|min:5',

            'event.coblosan' => 'required',
            'start_event.coblosan' => 'exclude_without:event.coblosan|required',
            'end_event.coblosan' => 'exclude_without:event.coblosan|required|after:start_event.coblosan',
            'method.coblosan' => 'required',
            'location.coblosan' => 'exclude_without:event.coblosan|required|min:5',
        ];
    }

    public function attributes()
    {
        return [
            'start_event.pendaftaran' => 'Waktu mulai pendaftaran',
            'start_event.nourut' => 'Waktu pengambilan nomor urut',
            'start_event.orasi1' => 'Waktu orasi pertama',
            'start_event.orasi2' => 'Waktu orasi kedua',
            'start_event.kampanye' => 'Periode kampanye',
            'start_event.debat1' => 'Waktu Debat 1',
            'start_event.debat2' => 'Waktu Debat 2',
            'start_event.debat3' => 'Waktu Debat 3',
            'start_event.coblosan' => 'Waktu pemilihan',
            'start_event.pengumuman' => 'Pengumuman',

            'end_event.pendaftaran' => 'Waktu selesai pendaftaran',
            'end_event.nourut' => 'Waktu akhir pengambilan nomor urut',
            'end_event.orasi1' => 'Waktu akhir orasi pertama',
            'end_event.orasi2' => 'Waktu akhir orasi kedua',
            'end_event.kampanye' => 'Waktu akhir Periode kampanye',
            'end_event.debat1' => 'Waktu akhir Debat 1',
            'end_event.debat2' => 'Waktu akhir Debat 2',
            'end_event.debat3' => 'Waktu akhir Debat 3',
            'end_event.coblosan' => 'Waktu akhir pemilihan',
            'end_event.pengumuman' => 'Jam selesai Pengumuman',

            'method.pendaftaran' => 'Metode pendaftaran',
            'method.nourut' => 'Metode pengambilan nomor urut',
            'method.orasi1' => 'Metode orasi pertama',
            'method.orasi2' => 'Metode orasi kedua',
            'method.kampanye' => 'Metode Periode kampanye',
            'method.debat1' => 'Metode Debat 1',
            'method.debat2' => 'Metode Debat 2',
            'method.debat3' => 'Metode Debat 3',
            'method.coblosan' => 'Metode pemilihan',
            'method.pengumuman' => 'Metode Pengumuman',

            'location.pendaftaran' => 'Lokasi pendaftaran',
            'location.nourut' => 'Lokasi pengambilan nomor urut',
            'location.orasi1' => 'Lokasi orasi pertama',
            'location.orasi2' => 'Lokasi orasi kedua',
            'location.kampanye' => 'Lokasi Periode kampanye',
            'location.debat1' => 'Lokasi Debat 1',
            'location.debat2' => 'Lokasi Debat 2',
            'location.debat3' => 'Lokasi Debat 3',
            'location.coblosan' => 'Lokasi pemilihan',
            'location.pengumuman' => 'Lokasi Pengumuman',

            'event.pendaftaran' => 'pendaftaran',
            'event.nourut' => 'pengambilan nomor urut',
            'event.orasi1' => 'orasi pertama',
            'event.orasi2' => 'orasi kedua',
            'event.kampanye' => 'Periode kampanye',
            'event.debat1' => 'Debat 1',
            'event.debat2' => 'Debat 2',
            'event.debat3' => 'Debat 3',
            'event.coblosan' => 'Agenda Pemilihan',
            'event.pengumuman' => 'Pengumuman',
        ];
    }
}
