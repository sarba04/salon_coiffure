<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{ 
    public $timestamps = false;

    protected $primaryKey = 'id_rdv';
    protected $table = 'rendez_vous';

    use HasFactory;

    public function coiffeur()
    {
        return $this->belongsTo(Coiffeur::class, 'login_coiffeur', 'login_coiffeur');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'login_client', 'login_client');
    }
}
