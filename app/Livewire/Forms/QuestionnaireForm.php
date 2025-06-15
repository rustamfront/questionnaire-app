<?php

namespace App\Livewire\Forms;

use App\CountryCode;
use App\MaritalStatus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Form;

class QuestionnaireForm extends Form
{
    public $formError = false;

    public $first_name = '';

    public $last_name = '';

    public $middle_name = '';

    public $birth_date = '';

    public $email = '';

    public $marital_status = '';

    public $about = '';

    public $rules_accepted = '';

    public $phones = [
        [
            'number' => '',
            'country_code' => ''
        ]
    ];

    public $files = [];

    public $errors = [];

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'birth_date' => 'required|date|before:today',
            'email' => 'nullable|email|max:100|required_without:phones.0.number',
            'marital_status' => ['nullable', Rule::enum(MaritalStatus::class)],
            'about' => 'nullable|string|max:1000',
            'rules_accepted' => 'required|accepted',
            'phones.*.country_code' => ['required', Rule::enum(CountryCode::class)],
            'phones.*.number' => 'nullable|string|max:20|required_without:email',
            'files' => 'nullable|array|max:5',
            'files.*' => 'nullable|file|max:5120|mimes:jpg,png,pdf',
        ];
    }

    public function chekcForm()
    {
        $this->formError = false;
        
        try {
            $validator = Validator::make($this->all(), $this->rules());
            $this->errors = $validator->errors()->toArray();
            
            return $validator->fails() ? false : true;
        } catch (\Exception $e) {
            $this->formError = true;
            return false;
        }
    }
}
