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
            'nama_cabang' => [
                'string',
                'nullable',
            ],
            'daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
        ];
    }
}
