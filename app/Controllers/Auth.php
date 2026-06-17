<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/Caisse');
        }
        return view('Login');
    }

    public function signIn()
    {
        $session = session();

        $caissier = $this->request->getPost('caissier');
        $password = $this->request->getPost('password');

        $caissierHash = hash('sha256', $caissier);

        $userModel = new UserModel();

        $user = $userModel
            ->where('caissier', $caissierHash)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Mot de passe incorrect');
        }

        $session->set([
            'user_id' => $user['id'],
            'caissier' => $caissier, // On garde le nom en clair dans la session
            'logged_in' => true
        ]);

        return redirect()->to('/Caisse');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }


    public function register()
    {
        return view('Register');
    }

    public function signUp()
    {
        $caissier = $this->request->getPost('caissier');
        $password = $this->request->getPost('password');

        $caissierHash = hash('sha256', $caissier);
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel();

        if ($userModel->where('caissier', $caissierHash)->first()) {
            return redirect()->back()->with('error', 'Cet identifiant existe déjà');
        }

        $userModel->insert([
            'caissier' => $caissierHash,
            'password' => $passwordHash
        ]);

        return redirect()->to('/')->with('success', 'Compte créé avec succès ! Connectez-vous.');
    }
}