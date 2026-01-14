<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'direccion' => ['nullable', 'string', 'max:255'], 
            'rol' => ['required', 'in:1,2'],
            'movil' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'], 
            'nameuser' => [
                'nullable',
                'string',
                'max:50',
                'regex:/^[a-zA-Z0-9_]+$/',
                Rule::unique('users', 'nameuser')->ignore($this->user()->id),
            ],
            'sobremi' => ['nullable', 'string'],
        ];
    }
}
