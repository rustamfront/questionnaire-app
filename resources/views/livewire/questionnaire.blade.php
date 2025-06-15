<div class="col-md-10">
    @if (!$formSubmitted)
    <h2>Анкета</h2>
    <form wire:submit="save" class="mt-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="first_name" class="form-label">Имя</label>
            <input type="text" wire:model.blur="form.first_name" class="form-control @error('form.first_name') is-invalid @enderror" name="first_name" id="first_name">
            @error('form.first_name')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Фамилия</label>
            <input type="text" wire:model.blur="form.last_name" class="form-control @error('form.last_name') is-invalid @enderror" name="last_name" id="last_name">
            @error('form.last_name')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blur="form.middle_name" class="form-control @error('form.middle_name') is-invalid @enderror" name="middle_name" id="middle_name">
            @error('form.middle_name')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">День рождения</label>
            <input type="date" wire:model.blur="form.birth_date" class="form-control @error('form.birth_date') is-invalid @enderror" name="birth_date" id="birth_date">
            @error('form.birth_date')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model.blur="form.email" class="form-control @error('form.email') is-invalid @enderror" name="email" id="email">
            @error('form.email')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        @foreach($form->phones as $index => $phone)
            <div class="flex">
                <div class="mb-3 col-md-1">
                    <label for="phones-{{ $index }}-country-code" class="form-label">Код страны</label>
                    <select type="text" wire:model.change="form.phones.{{ $index }}.country_code" class="form-control @error('form.phones.' . $index . '.country_code') is-invalid @enderror" name="phones[$index][country_code]" id="phones-{{ $index }}-country-code">
                        <option value="">Выберите код</option>
                        @foreach($codes as $code)
                            <option value="{{ $code }}">{{ $code }}</option>
                        @endforeach
                    </select>
                    @error('form.phones.' . $index . '.country_code')
                        <div class="invalid-feedback">
                            {{ $message }} 
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-10 ml-3">
                    <label for="phones-{{ $index }}-number" class="form-label">Телефон</label>
                    <input type="text" wire:model.blur="form.phones.{{ $index }}.number" class="form-control @error('form.phones.' . $index . '.number') is-invalid @enderror" name="phones[$index][number]" id="phones-{{ $index }}-number">
                    @error('form.phones.' . $index . '.number')
                        <div class="invalid-feedback">
                            {{ $message }} 
                        </div>
                    @enderror
                </div>
                @if($index > 0)
                <button
                    type="button"
                    wire:click="removePhone({{ $index }})"
                    class="p-2 mt-2 text-red-500 hover:text-red-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
                @endif
            </div>
        @endforeach
        @if(count($form->phones) < 5)
            <button
                type="button"
                wire:click="addPhone"
                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Добавить телефон
            </button>
        @endif
        <div class="mb-3">
            <label for="marital_status" class="form-label">Семейное положение</label>
            <select type="text" wire:model.blur="form.marital_status" class="form-control @error('form.marital_status') is-invalid @enderror" name="marital_status" id="marital_status">
                <option value="">Выберите статус</option>
                @foreach($maritals as $marital)
                    <option value="{{ $marital }}">{{ $marital }}</option>
                @endforeach
            </select>
            @error('form.marital_status')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">О себе</label>
            <textarea 
    style="resize: vertical; min-height: 1.5em; max-height: 10.5em;" rows="4" wire:model.blur="form.about" class="form-control @error('form.about') is-invalid @enderror" name="about" id="about"></textarea>
            @error('form.about')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="files" class="form-label">Файлы</label>
            <input type="file" wire:model="form.files" class="form-control @error('form.files.*') is-invalid @enderror @error('form.files') is-invalid @enderror" id="files" name="files[]" multiple>
            @error('form.files.*')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
            @error('form.files')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rules_accepted" class="form-check-label">Я ознакомился c правилами</label>
            <input type="checkbox" wire:model.blur="form.rules_accepted" class="form-check-input" id="rules_accepted">
        </div>
        @error('form.rules_accepted')
            <div class="invalid-feedback">
                {{ $message }} 
            </div>
        @enderror
        <button type="submit" class="btn btn-primary" @if (!$this->checkFormValidity()) disabled @endif>Сохранить</button>
        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
    </form>
    @else
        <div class="alert alert-success">
            Успешно
        </div>
    @endif
</div>