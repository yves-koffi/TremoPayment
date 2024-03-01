<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property Carbon $created_at
 * @property string $date_paiement
 * @property string $montant_paiement
 * @property string $numero_avis
 * @property string $reference
 * @property string $nature_recette
 * @property string $payment_phone
 */
class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "paymentDate" => $this->date_paiement,
            "paymentAmount" => $this->montant_paiement,
            "paymentPhone" => $this->payment_phone,
            "numeroAvis" => $this->numero_avis,
            "reference" => $this->reference,
            "natureRecette" => $this->nature_recette,
            "syncDate" => $this->created_at->format("d/m/Y H:i:s")
        ];
    }
}
