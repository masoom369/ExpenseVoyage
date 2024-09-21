<x-form-section submit="updateProfileInformation">
    <x-slot name="form">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="updateProfileInformation">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div x-data="{ photoName: null, photoPreview: null }" class="mb-3">
                            <label for="photo" class="form-label">{{ __('Photo') }}</label>
                            <input type="file" id="photo" class="d-none" wire:model.live="photo" x-ref="photo"
                                x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                                " />
                            <div class="mt-2" x-show="!photoPreview">
                                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                                    class="rounded-circle h-100 w-100" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="d-block rounded-circle w-100 h-100"
                                    style="max-width: 100px; max-height: 100px; background-size: cover; background-position: center;"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button type="button" class="btn btn-primary mt-2 me-2"
                                x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </button>
                            @if ($this->user->profile_photo_path)
                                <button type="button" class="btn btn-danger mt-2" wire:click="deleteProfilePhoto">
                                    {{ __('Remove Photo') }}
                                </button>
                            @endif
                            @error('photo')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" wire:model="state.name" required
                            autocomplete="name">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="currency" class="form-label">{{ __('Currency') }}</label>
                        <select id="currency" class="form-select" wire:model="state.currency" required>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="MYR">MYR</option>
                            <option value="PKR">PKR</option>
                        </select>
                        @error('currency')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control" wire:model="state.email" required
                            autocomplete="username">
                        @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                                !$this->user->hasVerifiedEmail())
                            <p class="text-muted mt-2">
                                {{ __('Your email address is unverified.') }}
                                <button type="button" class="btn btn-link p-0"
                                    wire:click.prevent="sendEmailVerification">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if ($this->verificationLinkSent)
                                <p class="text-success mt-2">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="text-success" wire:loading wire:target="saved">
                                {{ __('Saved.') }}
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-form-section>
