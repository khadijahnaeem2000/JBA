<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterHead extends Model
{
    use HasFactory;
    protected $fillable = [
         'id',
    'Name',
        'Address',
        'ContactInformation',
        'LegalInformation',
        'AdditionalInformation',
            'Image',
    ];
}
