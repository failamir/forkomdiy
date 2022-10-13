<?php

namespace App\Http\Requests;

use App\Models\DataUmum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataUmumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_umum_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'nama_lembaga' => [
                'string',
                'nullable',
            ],
            'nick_name' => [
                'string',
                'nullable',
            ],
            'ketua_id' => [
                'integer',
                'exists:data_stakeholders,id',
                'nullable',
            ],
            'sekretariat_wilayah' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'telp' => [
                'string',
                'nullable',
            ],
            'whats_app' => [
                'string',
                'nullable',
            ],
            'lingkup_kegiatan' => [
                'string',
                'nullable',
            ],
            'perizinan_id' => [
                'integer',
                'exists:perizinans,id',
                'nullable',
            ],
            'jumlah_anggota' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
