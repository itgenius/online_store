<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     // Affichez la liste des utilisateurs
     public function index()
     {
         $users = User::all();
         return view('admin.users.index', compact('users'));
     }
 
     // Affichez un formulaire de modification d'utilisateur
     public function edit(User $user)
     {
         return view('admin.users.edit', compact('user'));
     }
 
     // Mettez à jour les informations d'un utilisateur
     public function update(Request $request, User $user)
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required|email',
         ]);
 
         $user->update($request->all());
         return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
     }
 
     // Supprimez un utilisateur
     public function destroy(User $user)
     {
         $user->delete();
         return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
     }
}
