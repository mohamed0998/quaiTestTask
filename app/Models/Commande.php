<?php

namespace App\Models;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['reference','name','status','date'];

    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'commande_services',
            'commande_id', 
            'service_id'
        );
    }
}
