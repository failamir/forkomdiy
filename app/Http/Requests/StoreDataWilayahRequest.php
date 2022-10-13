<?php

namespace App\Http\Requests;

use App\Models\DataWilayah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataWilayahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_wilayah_create'),
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
            'nama_wilayah' => [
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
