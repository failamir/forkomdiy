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
            'jenis_kerjasama' => [
                'string',
                'nullable',
            ],
            'frekuensi_kerjasama' => [
                'string',
                'nullable',
            ],
            'mulai_kerjasama' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'nama_lembaga_kerjasama' => [
                'string',
                'nullable',
            ],
            'nama_stakeholder' => [
                'string',
                'nullable',
            ],
            'no_hp_wa_stakeholder' => [
                'string',
                'nullable',
            ],
            'kontak_di_lembaga' => [
                'string',
                'nullable',
            ],
            'no_hp_wa_lembaga' => [
                'string',
                'nullable',
            ],
            'jangkauan_kerjasama' => [
                'string',
                'nullable',
            ],
        ];
    }
}
