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
            'daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
            'kontak_di_lembaga_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'kontak_di_stakeholder_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'jenis_kerjasama_id' => [
                'integer',
                'exists:jenis_kerjasamas,id',
                'nullable',
            ],
            'jangkauan_kerjasama' => [
                'string',
                'nullable',
            ],
            'lama_kerjasama' => [
                'nullable',
                'in:' . implode(',', array_keys(DataStakeholder::LAMA_KERJASAMA_SELECT)),
            ],
        ];
    }
}
