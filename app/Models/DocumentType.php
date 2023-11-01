<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    public const BAUTISMO     = 1;
    public const MATRIMONIO   = 2;
    public const CONFIRMACION = 3;
}
