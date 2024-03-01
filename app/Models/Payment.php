<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "date_paiement",
        "montant_paiement",
        "numero_avis",
        "reference",
        "nature_recette",
        "payment_phone"
    ];

}
