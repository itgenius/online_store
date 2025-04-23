@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <div class="container mt-5" style="max-width: 600px;">
        <h1>Créer un compte</h1>
        <p>Remplis le formulaire pour t'inscrire.</p>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-3 form-check">
                    <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                    <label for="terms" class="form-check-label">
                        {!! __('J\'accepte les :terms_of_service et la :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-underline">Conditions d\'utilisation</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-underline">Politique de confidentialité</a>',
                        ]) !!}
                    </label>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none">Déjà inscrit ?</a>

                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
@endsection
