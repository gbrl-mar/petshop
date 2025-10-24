<?php

namespace App\Modules\Hewan\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHewanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_customer' => 'required|integer|exists:customers,id',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'jenis_hewan' => 'required|string|max:100',
        ];
    }
}

