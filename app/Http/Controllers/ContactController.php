<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;


class ContactController extends Controller
{
    // Affiche le formulaire de contact
    public function show()
    {
        return view('contact');
    }

    // Gère l'envoi du formulaire
    public function submit(Request $request)
    {
       /*  // Validation basique
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]); */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        Mail::to('w.grami@gmail.com')->send(new ContactMessageMail([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]));

        // Ici tu peux envoyer un email ou sauvegarder les données

        return redirect()->route('contact')->with('success', 'Merci pour votre message ! Nous vous répondrons bientôt.');
    }
}


