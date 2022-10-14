<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManualRaffleRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'texto_sorteados' => 'mimes:xls,xlsx',
            'mail_form' => 'email|regex:/(.+)@(.+)\.(.+)/i'
        ];
    }
}
