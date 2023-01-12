<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
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
        'province_id',
    ];

    public function province() {
        return $this->belongsTo(Province::class);
    }

        /**
     * Get all of the users for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }

    
}
