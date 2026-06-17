<?php

namespace App\Controllers;

class AchatController extends BaseController
{
    public function index()
    {
        $session = session();
        
        if (!$session->get('logged_in')) {
            return redirect()->to('/');
        }

        if (!$session->has('caisse_active')) {
            return redirect()->to('/'); 
        }

        $data['caisse_active'] = $session->get('caisse_active');

        return view('Achat', $data);
    }
}
