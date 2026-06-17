<?php

namespace App\Controllers;

use App\Models\CaisseModel; 

class CaisseController extends BaseController
{
    public function afficherCaisse()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $caisseModel = new CaisseModel();
        
        $data['caisses'] = $caisseModel->findAll(); 

        return view('Caisse', $data);
    }

    public function sauvegarderCaisse()
    {
        $idCaisse = $this->request->getPost('caisse');
        
        if ($idCaisse) {
            $caisseModel = new CaisseModel();
            $caisse = $caisseModel->find($idCaisse);

            if ($caisse) {
                session()->set('caisse_active', $caisse);
            }
        }

        return redirect()->to('/achats');
    }
}
