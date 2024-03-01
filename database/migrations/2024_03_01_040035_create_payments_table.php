<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'payments', callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: "date_paiement")->comment("datePayment");
            $table->string(column: "montant_paiement")->comment("montantPayment");
            $table->string(column: "numero_avis")->comment("referencePayment");
            $table->string(column: "reference")->unique()->comment("referenceTremo");
            $table->enum(column: 'nature_recette', allowed: ["bac", "ing", "master"])->default("bac")->comment("natureRecette");
            $table->string(column: "payment_phone")->comment("telephonePayment");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
