<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'country_code', 'phone'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
