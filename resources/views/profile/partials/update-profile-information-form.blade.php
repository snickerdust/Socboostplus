<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-text-charcoal">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-xs font-bold text-text-muted mb-1">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple text-text-charcoal" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-xs font-bold text-text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple text-text-charcoal" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-text-charcoal">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-text-muted hover:text-text-charcoal rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-purple">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-accent-purple hover:bg-accent-purple/90 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-lg shadow-purple-500/20">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
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
