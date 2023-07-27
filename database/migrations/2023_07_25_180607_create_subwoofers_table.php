<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Type
     * Sub type
     * Company
     * Model name
     * Frequency Response low +/- 1dB
     * Frequency Response high +/- 1dB
     * Sensitivity
     * Impedance
     * Has Internal amplification
     * Power amplifier requirements or internal amplification power
     * Size
     * Weight
     * Photo 1-2-3
     * Official link
     */

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subwoofers', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->string("type")->nullable();
            $table->string("subtype")->nullable();

            $table->integer("freq_response_low")->nullable();
            $table->integer("freq_response_high")->nullable();

            $table->integer("sensitivity")->nullable();
            $table->integer("impedance")->nullable();

            $table->boolean("internal_amp")->nullable();
            $table->integer("internal_amp_power")->nullable();

            $table->string("dimensions")->nullable();
            $table->float("weight")->nullable();
            $table->string("link")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subwoofers');
    }
};
