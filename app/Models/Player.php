<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'position',
        'national'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($player) {
            // buat slug dari nama
            $baseSlug = Str::slug($player->name);
            $slug = $baseSlug;
            $count = 1;

            // periksa slug di db
            while (Player::where('slug', $slug)->exists()){
                // jika ada tambahkan angka di akhir
                $slug = $baseSlug . '-' . $count;
                $count++;
            }

            // terapkan slug yang unik ke model
            $player->slug = $slug;
        });
    }
}
