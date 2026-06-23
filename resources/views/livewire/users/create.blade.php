<div>
    <x-ts-button :text="__('Create New User')" wire:click="$toggle('modal')" sm />

    <x-ts-modal :title="__('Create New User')" wire x-on:open="setTimeout(() => $refs.name.focus(), 250)">
        <form id="user-create" wire:submit="save" class="space-y-4">
            <div>
                <x-ts-input label="{{ __('Name') }} *" x-ref="name" wire:model="user.name" required />
            </div>

            <div>
                <x-ts-input label="{{ __('Email') }} *" wire:model="user.email" required />
            </div>

            <div>
                <x-ts-password label="{{ __('Password') }} *"
                            wire:model="password"
                            rules
                            generator
                            x-on:generate="$wire.set('password_confirmation', $event.detail.password)"
                            required />
            </div>

            <div>
                <x-ts-password :label="__('Password')" wire:model="password_confirmation" rules required />
            </div>
        </form>
        <x-slot:footer>
            <x-ts-button type="submit" form="user-create">
                @lang('Save')
            </x-ts-button>
        </x-slot:footer>
    </x-ts-modal>
</div>
