@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h1>Connexion</h1>
        <p>Veuillez vous connecter à votre compte.</p>

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

        {{-- Message de succès ou d'information --}}
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                @endif

                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
@endsection
