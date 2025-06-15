<?php

namespace App\Livewire;

use App\Livewire\Forms\QuestionnaireForm;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use App\CountryCode;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Requests\StoreRequest;
use App\MaritalStatus;
use App\Models\Questionnaire as ModelsQuestionnaire;
use App\Models\QuestionnaireFile;
use App\Models\QuestionnairePhone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class Questionnaire extends Component
{
    use WithFileUploads;

    public QuestionnaireForm $form;

    public $formSubmitted = false;
    public $formError = false;
    public $isFormValid = false;
    public $disabled = true;

    public function removePhone($index)
    {
        if (count($this->form->phones) > 1) {
            unset($this->form->phones[$index]);
            $this->form->phones = array_values($this->form->phones);
        }
    }

    public function checkFormValidity()
    {
        return $this->form->chekcForm();
    }

    public function addPhone()
    {
        if (count($this->form->phones) < 5) {
            $this->form->phones[] = ['country_code' => '+375', 'number' => ''];
        }
        $this->checkFormValidity();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
        $this->checkFormValidity();
    }

    public function updatedFormFiles($value)
    {
        $this->validateOnly('form.files.*');
    }

    public function save()
    {
        $this->validate();
        try {
            DB::transaction(function() {
                $questionnaire = ModelsQuestionnaire::create([
                    'first_name' => $this->form->first_name,
                    'last_name' => $this->form->last_name,
                    'middle_name' => $this->form->middle_name,
                    'birth_date' => $this->form->birth_date,
                    'email' => $this->form->email,
                    'marital_status' => $this->form->marital_status,
                    'about' => $this->form->about
                ]);

                foreach($this->form->phones as $phone) {
                    QuestionnairePhone::create([
                        'questionnaire_id' => $questionnaire->id,
                        'phone' => $phone['number'],
                        'country_code' => $phone['country_code']
                    ]);
                }

                foreach($this->form->files as $file) {
                    $path = $file->store('uploads', 'public');

                    QuestionnaireFile::create([
                        'questionnaire_id' => $questionnaire->id,
                        'file_path' => 'storage/' . $path
                    ]);
                }
            });

            $this->formSubmitted = true;
        } catch (Exception $e) {
            $this->addError('form', $e->getMessage());
            Log::error('Form submission error: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.questionnaire', ['codes' => CountryCode::values(), 'maritals' => MaritalStatus::values()]);
    }
}
