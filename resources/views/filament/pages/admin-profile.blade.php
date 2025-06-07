<x-filament-panels::page>
    <x-filament::section wire:submit.prevent="save">
        {{ $this->form }}
        <div class="mt-4">
            <x-filament::button type="submit">
                Save
            </x-filament::button>
        </div>
    </x-filament->
</x-filament-panels::page>
