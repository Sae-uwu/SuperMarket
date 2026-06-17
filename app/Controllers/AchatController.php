<?php

namespace App\Controllers;

class AchatController extends BaseController
{
    // public function index()
    // {
    //     $session = session();
        
    //     if (!$session->get('logged_in')) {
    //         return redirect()->to('/');
    //     }

    //     if (!$session->has('caisse_active')) {
    //         return redirect()->to('/'); 
    //     }

    //     $produitModel = new \App\Models\ProduitModel();
    //     $achatModel = new \App\Models\AchatModel();

    //     $total = 0;
    //     foreach ($data['achats'] as $achat) {
    //         $total += $achat['montant'];
    //     }

    //     $data['caisse_active'] = $session->get('caisse_active');
    //     $data['produits'] = $produitModel->findAll();
    //     $data['achats'] = $achatModel
    //     ->select('Achat.*, Produit.designation, Produit.prix')
    //     ->join('Produit', 'Produit.id = Achat.id_produit')
    //     ->findAll(); 
       
    //     $data['total'] = $total;
    //     $data['panier'] = $session->get('panier') ?? [];

    //     return view('Achat', $data);
    // }
    public function index()
    {
        $session = session();

        if (!$session->has('caisse_active')) {
            return redirect()->to('/');
        }

        $produitModel = new \App\Models\ProduitModel();
        $panier = $session->get('panier') ?? [];

        $achats = [];
        $total = 0;

        foreach ($panier as $item) {
            $p = $produitModel->find($item['id_produit']);

            if (!$p) continue;

            $montant = $p['prix'] * $item['quantite'];

            $achats[] = [
                'id_produit' => $p['id'],
                'designation' => $p['designation'],
                'prix' => $p['prix'],
                'quantite' => $item['quantite'],
                'montant' => $montant
            ];

            $total += $montant;
        }

        $data['caisse_active'] = $session->get('caisse_active');
        $data['achats'] = $achats;
        $data['total'] = $total;
        $data['produits'] = $produitModel->findAll();

        return view('Achat', $data);
    }


    // public function enregistrer()
    // {
    //     $session = session();

    //     $idProduit = $this->request->getPost('produit');
    //     $quantite = $this->request->getPost('quantite');

    //     $produitModel = new \App\Models\ProduitModel();
    //     $achatModel = new \App\Models\AchatModel();

    //     $produit = $produitModel->find($idProduit);

    //     if (!$produit) {
    //         return redirect()->back();
    //     }

    //     $montant = $produit['prix'] * $quantite;

    //     $achatModel->insert([
    //         'id_caisse' => $session->get('caisse_active')['id'],
    //         'id_produit' => $idProduit,
    //         'client' => $session->get('client'),
    //         'quantite' => $quantite,
    //         'montant' => $montant,
    //         'date_achat' => date('Y-m-d H:i:s')
    //     ]);

    //     return redirect()->to('/achat');
    // }

    public function ajouter()
    {
        $session = session();

        if (!$session->get('client')) {
            $session->set('client', $this->request->getPost('client'));
        }

        $panier = $session->get('panier') ?? [];

        $panier[] = [
            'id_produit' => $this->request->getPost('produit'),
            'quantite'   => $this->request->getPost('quantite')
        ];

        $session->set('panier', $panier);

        return redirect()->to('/achat');
    }


    public function cloturer()
    {
        $session = session();

        $panier = $session->get('panier') ?? [];

        $produitModel = new \App\Models\ProduitModel();
        $achatModel = new \App\Models\AchatModel();

        $idCaisse = $session->get('caisse_active')['id'];
        $client = $session->get('client');

        foreach ($panier as $item) {

            $produit = $produitModel->find($item['id_produit']);

            if (!$produit) continue;

            $montant = $produit['prix'] * $item['quantite'];

            // 1. INSERT achat final
            $achatModel->insert([
                'id_caisse' => $idCaisse,
                'id_produit' => $item['id_produit'],
                'client' => $client,
                'quantite' => $item['quantite'],
                'montant' => $montant,
                'date_achat' => date('Y-m-d H:i:s')
            ]);

            // 2. UPDATE stock
            $produitModel->update($item['id_produit'], [
                'stock' => $produit['stock'] - $item['quantite']
            ]);
        }

        // 3. vider panier
        $session->remove('panier');
        $session->remove('client');

        return redirect()->to('/achat');
    }
}