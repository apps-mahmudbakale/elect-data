<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectData extends Model
{
    use HasFactory;

    protected $fillable = [
        'valid_votes',
        'invalid_votes',
        'caption',
        'state_id',
        'lga_id',
        'unit_id',
        'party_id',
        'user_id',
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
