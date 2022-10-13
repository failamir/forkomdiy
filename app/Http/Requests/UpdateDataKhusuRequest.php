<?php

namespace App\Http\Requests;

use App\Models\DataKhusu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataKhusuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_khusu_edit'),
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
            'nama_daerah' => [
                'string',
                'nullable',
            ],
            'data_daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
            'jumlah_anggota_daerah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'nama_cabang' => [
                'string',
                'nullable',
            ],
            'jumlah_anggota_cabang' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'data_cabang_id' => [
                'integer',
                'exists:data_cabangs,id',
                'nullable',
            ],
            'nama_sub_wilayah' => [
                'string',
                'nullable',
            ],
            'jumlah_anggota_sub_wilayah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'data_sub_wilayah_lain_id' => [
                'integer',
                'exists:data_wilayahs,id',
                'nullable',
            ],
        ];
    }
}
