@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-5">
        <h1>Contactez-nous</h1>
        <p>Vous avez une question ? Envoyez-nous un message.</p>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection
