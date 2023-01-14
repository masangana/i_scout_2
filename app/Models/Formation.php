<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'lieu',
        'type',
        'personne_id',
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
