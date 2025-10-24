<?php

namespace App\Modules\Layanan\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLayananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ];
    }
}
