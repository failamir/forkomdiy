<?php

namespace App\Http\Requests;

use App\Models\DataCabang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataCabangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_cabang_edit'),
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
            'district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
            'nama_ketua' => [
                'string',
                'nullable',
            ],
            'kontak_hp_wa' => [
                'string',
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
