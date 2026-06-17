<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table            = 'Achat'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['id_caisse', 'id_produit', 'quantite', 'client', 'montant', 'date_achat'];

    protected $useTimestamps = false;
}
