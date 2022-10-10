<?php

namespace App\Http\Requests;

use App\Models\Perizinan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerizinanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('perizinan_edit'),
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
            'jenis_izin' => [
                'string',
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
