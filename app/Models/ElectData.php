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

    public function sum_valid($party, $unit)
    {
        return $this->where('party_id', $party)->where('unit_id', $unit)->sum('valid_votes');
    }

    public function sum_invalid($party, $unit)
    {
        return $this->where('party_id', $party)->where('unit_id', $unit)->sum('invalid_votes');
    }
}
