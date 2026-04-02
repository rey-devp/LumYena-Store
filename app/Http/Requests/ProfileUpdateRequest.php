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
        $rules = [
            'game_id' => ['nullable', 'string', 'max:255'],
            'streaming_username' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'regex:/^62[0-9]{8,}$/'],
            'preferred_payment' => ['nullable', 'string', 'max:255'],
        ];

        if ($this->has('name')) {
            $rules['name'] = ['required', 'string', 'max:255'];
        }
        
        if ($this->has('email')) {
            $rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)];
        }

        return $rules;
    }
}
