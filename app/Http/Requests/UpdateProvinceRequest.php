<?php

namespace App\Http\Requests;

use App\Models\Province;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProvinceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('province_edit'),
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
            'id_province' => [
                'string',
                'nullable',
            ],
            'province_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
