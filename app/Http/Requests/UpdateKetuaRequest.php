<?php

namespace App\Http\Requests;

use App\Models\Ketua;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKetuaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('ketua_edit'),
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
            'ketua_id' => [
                'integer',
                'exists:contact_contacts,id',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'periode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
