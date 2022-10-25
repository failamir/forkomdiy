<?php

namespace App\Http\Requests;

use App\Models\Village;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVillageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('village_create'),
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
            'id_district' => [
                'string',
                'nullable',
            ],
            'id_village' => [
                'string',
                'nullable',
            ],
            'village_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
