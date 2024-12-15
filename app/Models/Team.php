<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id',
        'player_id',
    ];

    //  protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($team) {
    //         // buat slug dari nama
    //         $baseSlug = Str::slug($team->name);
    //         $slug = $baseSlug;
    //         $count = 1;

    //         // periksa slug di db
    //         while (Team::where('slug', $slug)->exists()){
    //             // jika ada tambahkan angka di akhir
    //             $slug = $baseSlug . '-' . $count;
    //             $count++;
    //         }

    //         // terapkan slug yang unik ke model
    //         $team->slug = $slug;
    //     });
    // }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
