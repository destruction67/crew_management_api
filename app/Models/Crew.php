<?php

namespace App\Models;

use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
    ];

    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }

    public function rankType(): BelongsTo
    {
        return $this->belongsTo(RankType::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

}
