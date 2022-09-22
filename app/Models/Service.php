<?php

namespace App\Models;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['reference','name','price'];

    public function commandes()
    {
        return $this->belongsToMany(
            Commande::class,
            'commande_services',
            'service_id', 
            'commande_id'
        )  ->withPivot(['quantity','total']);
    }
}
