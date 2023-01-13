<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'district_id',
    ];

    /**
     * Get all of the users for the Groupe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function personnes()
    {
        return $this->hasMany(Personne::class);
    }  
}
