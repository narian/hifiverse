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
     * Conversion type
     * Engine
     * Parameters
     * DSP processing
     * Analog outputs level
     * balanced
     * single-ended
     * Signal to Noise Ratio
     * Total Harmonic Distortion + Noise
     * Dimensions
     * Weight
     * Photo 1-2-3
     * Official link
     */

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dacs', function (Blueprint $table) {
            $table->id();

            $table->string("model_name");
            $table->string("company");

            $table->string("type")->nullable();
            $table->string("subtype")->nullable();

            $table->string("engine")->nullable();
            $table->string("dsp_processing")->nullable();

            // analog output
            $table->integer("ao_level_balanced")->nullable();
            $table->integer("ao_level_single")->nullable();

            $table->integer("signal_noise_ratio")->nullable();
            $table->integer("total_harm_dist")->nullable();

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
        Schema::dropIfExists('dacs');
    }
};
