<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table            = 'Caisse'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['numero'];

    protected $useTimestamps = false;
}
