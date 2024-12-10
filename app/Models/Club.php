<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'city',
        'stadium',
    ];

     protected static function boot()
    {
        parent::boot();

        static::saving(function ($club) {
            // buat slug dari nama
            $baseSlug = Str::slug($club->name);
            $slug = $baseSlug;
            $count = 1;

            // periksa slug di db
            while (Club::where('slug', $slug)->exists()){
                // jika ada tambahkan angka di akhir
                $slug = $baseSlug . '-' . $count;
                $count++;
            }

            // terapkan slug yang unik ke model
            $club->slug = $slug;
        });
    }
}
