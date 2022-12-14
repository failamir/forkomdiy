<?php

namespace App\Http\Requests;

use App\Models\District;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDistrictRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('district_edit'),
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
            'id_regency' => [
                'string',
                'nullable',
            ],
            'id_district' => [
                'string',
                'nullable',
            ],
            'district_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
