<?php

namespace App\Http\Requests;

use App\Models\DataStakeholder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataStakeholderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('data_stakeholder_create'),
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
            'nama_stakeholder' => [
                'string',
                'nullable',
            ],
            'kontak_di_lembaga' => [
                'string',
                'nullable',
            ],
            'kontak_di_stakeholder' => [
                'string',
                'nullable',
            ],
            'jenis_kerjasama' => [
                'string',
                'nullable',
            ],
            'jangkauan_kerjasama' => [
                'string',
                'nullable',
            ],
            'lama_kerjasama' => [
                'string',
                'nullable',
            ],
        ];
    }
}
