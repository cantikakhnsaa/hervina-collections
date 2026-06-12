<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Jilbab extends Model
{
    protected $fillable = [
        'image', 'title', 'description', 'price', 'stock'
    ];

    /**
     * Accessor Cerdas: Otomatis memformat URL gambar seeder vs upload admin
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($image) {
                // Jika nama file mengandung titik (seperti .jpg) dan panjangnya pendek (bukan hash acak Laravel)
                // Atau jika filenya memang ada di folder public/images
                if (file_exists(public_path('images/' . $image)) && !Str::contains($image, '/')) {
                    return asset('images/' . rawurlencode($image));
                }

                // Jika hasil upload dari admin controller (menggunakan hashName)
                return asset('storage/jilbabs/' . $image);
            }
        );
    }
}