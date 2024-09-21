<x-action-section>
    <x-slot name="content">
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{ __('Delete Account') }}</div>
                <hr>
                <div class="max-w-xl text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </div>

                <div class="mt-4">
                    <button class="btn btn-danger" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                        {{ __('Delete Account') }}
                    </button>
                </div>

                <!-- Delete User Confirmation Modal -->
                @if ($confirmingUserDeletion)
                    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ __('Delete Account') }}</h5>
                                    <button type="button" class="btn-close"
                                        wire:click="$toggle('confirmingUserDeletion')" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                                    <div class="mt-4">
                                        <input type="password" class="form-control" placeholder="{{ __('Password') }}"
                                            wire:model="password" wire:keydown.enter="deleteUser">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        wire:click="$toggle('confirmingUserDeletion')"
                                        wire:loading.attr="disabled">{{ __('Cancel') }}</button>
                                    <button type="button" class="btn btn-danger" wire:click="deleteUser"
                                        wire:loading.attr="disabled">{{ __('Delete Account') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-action-section>
