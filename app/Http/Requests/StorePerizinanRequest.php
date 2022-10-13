<?php

namespace App\Http\Requests;

use App\Models\Perizinan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePerizinanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('perizinan_create'),
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
            'nama_izin' => [
                'string',
                'nullable',
            ],
            'jenis_izin_id' => [
                'integer',
                'exists:jenis_izins,id',
                'nullable',
            ],
            'instansi_penerbit' => [
                'string',
                'nullable',
            ],
            'nomor_izin' => [
                'string',
                'nullable',
            ],
            'masa_berlaku' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
