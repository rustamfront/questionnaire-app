<x-layouts.app>
    <form>
        <div class="mb-3">
            <label for="first_name" class="form-label">Имя</label>
            <input type="text" wire:model.blur="first_name" class="form-control" name="first_name" id="first_name">
            <div>
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Фамилия</label>
            <input type="text" wire:model.blue="last_name" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">День рождения</label>
            <input type="text" wire:model.blur="birth_date" class="form-control" name="birth_date" id="birth_date">
            <div>
                @error('birth_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Отчество</label>
            <input type="text" wire:model.blue="middle_name" class="form-control" name="middle_name" id="middle_name">
        </div>
    </form>