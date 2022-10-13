<?php

namespace App\Http\Requests;

use App\Models\DataDaerah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataDaerahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_daerah_edit'),
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
        ];
    }
}
