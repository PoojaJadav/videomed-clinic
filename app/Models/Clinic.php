<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Clinic extends Model
{
    use HasFactory;

    protected $appends = ['logo_url'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    protected function phoneNumber(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            return sprintf(
                '+%s %s',
                $attributes['country_code'],
                $attributes['phone']
            );
        });
    }

    public function getLogoUrlAttribute()
    {
        if ($this->logo_path) {
            return Storage::url($this->logo_path);
        }
    }
}
