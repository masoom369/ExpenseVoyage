<x-form-section submit="updatePassword">

    <x-slot name="form">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="updatePassword">
                    <div class="row mb-3">
                        <label for="current_password" class="form-label col-md-4">{{ __('Current Password') }}</label>
                        <div class="col-md-8">
                            <input id="current_password" type="password" class="form-control"
                                wire:model="state.current_password" autocomplete="current-password">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="form-label col-md-4">{{ __('New Password') }}</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" wire:model="state.password"
                                autocomplete="new-password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password_confirmation"
                            class="form-label col-md-4">{{ __('Confirm Password') }}</label>
                        <div class="col-md-8">
                            <input id="password_confirmation" type="password" class="form-control"
                                wire:model="state.password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div>
                                <span class="text-success" wire:loading wire:target="saved">
                                    {{ __('Saved.') }}
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-form-section>
