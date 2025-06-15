<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\CountryCode;
use App\MaritalStatus;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'form.first_name' => 'required|string|max:50',
            'form.last_name' => 'required|string|max:50',
            'form.middle_name' => 'nullable|string|max:50',
            'form.birth_date' => 'required|date|before:today',
            'form.email' => 'nullable|email|max:100|required_without:phones.0.number',
            'form.marital_status' => ['nullable', Rule::enum(MaritalStatus::class)],
            'form.about' => 'nullable|string|max:1000',
            'form.rules_accepted' => 'required|accepted',
            'form.phones.*.country_code' => ['required', Rule::enum(CountryCode::class)],
            'form.phones.*.number' => 'nullable|string|max:20|required_without:email',
            'form.files' => 'nullable|array|max:5',
            'form.files.*' => 'nullable|file|max:5120|mimes:jpg,png,pdf',
        ];
    }
}
