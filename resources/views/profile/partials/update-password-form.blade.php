<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-text-charcoal">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-xs font-bold text-text-muted mb-1">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple text-text-charcoal" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-xs font-bold text-text-muted mb-1">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple text-text-charcoal" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-bold text-text-muted mb-1">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple text-text-charcoal" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-accent-purple hover:bg-accent-purple/90 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-lg shadow-purple-500/20">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
