<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'Produit'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['designation', 'prix' , 'stock'];

    protected $useTimestamps = false;
}
