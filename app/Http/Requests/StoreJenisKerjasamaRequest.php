<?php

namespace App\Http\Requests;

use App\Models\JenisKerjasama;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJenisKerjasamaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('jenis_kerjasama_create'),
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
            'nama_jenis' => [
                'string',
                'nullable',
            ],
        ];
    }
}
