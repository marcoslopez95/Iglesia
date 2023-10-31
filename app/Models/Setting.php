<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'left_logo',
        'right_logo',
        'header',
        'digital_firm',
        'parroco',
    ];

    protected function LeftLogo(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value ? str_replace('public/','storage/',$value) : null
        );
    }
    protected function RightLogo(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value ? str_replace('public/','storage/',$value) : null
        );
    }
    protected function DigitalFirm(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value ? str_replace('public/','storage/',$value) : null
        );
    }
}
