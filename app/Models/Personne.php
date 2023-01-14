<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'nationalite',
        'adresse',
        'telephone',
        'email',
        'type',
        'user_id',
        'groupe_id',
        'district_id',
        'province_id',
    ];

    protected $dates = [
        'date_naissance',
    ];
    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function age()
    {
        return Carbon::parse($this->attributes['date_naissance'])->age;
    }
    
    public function scopeRecordsByMonth($query, $month){

        return $query->whereMonth('created_at', $month );

        /*return $this->selectRaw('count(*) as count, MONTH(created_at) as month')
        ->groupBy('month')
        ->get();*/
    }
}
