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

        $produitModel = new \App\Models\ProduitModel();
        $achatModel = new \App\Models\AchatModel();
        $total = 0;

        $data['caisse_active'] = $session->get('caisse_active');
        $data['produits'] = $produitModel->findAll();
        $data['achats'] = $achatModel
        ->select('Achat.*, Produit.designation, Produit.prix')
        ->join('Produit', 'Produit.id = Achat.id_produit')
        ->findAll();
        $data['total'] = $total;
        foreach ($data['achats'] as $achat) {
            $total += $achat['montant'];
        }

        return view('Achat', $data);
    }

    public function enregistrer()
    {
        $session = session();

        $idProduit = $this->request->getPost('produit');
        $quantite = $this->request->getPost('quantite');

        $produitModel = new \App\Models\ProduitModel();
        $achatModel = new \App\Models\AchatModel();

        $produit = $produitModel->find($idProduit);

        if (!$produit) {
            return redirect()->back();
        }

        $montant = $produit['prix'] * $quantite;

        $achatModel->insert([
            'id_caisse' => $session->get('caisse_active')['id'],
            'id_produit' => $idProduit,
            'client' => 'Client',
            'quantite' => $quantite,
            'montant' => $montant,
            'date_achat' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/achat');
    }
}