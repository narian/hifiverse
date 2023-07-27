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
     * Amalog inputs
     *      Balanced
     *      Single-ended
     * Maximum output level
     *      Balanced
     *      Single-ended
     * Analog outputs
     *      Balanced
     *      Single-ended
     * Maximum output level
     *      Balanced
     *      Single-ended
     * Volume control range
     * Frequency response -3dB point
     * Dimensions
     * Signal to Noise Ratio (SNR, unweighted)
     * Total Harmonic Distortion + Noise (THD+N)
     * Output noise
     *      Balanced
     *      Single-ended
     * Weight
     * Photo 1-2-3
     * Official link
     */

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preamps', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->string("type")->nullable();
            $table->string("subtype")->nullable();

            $table->integer("ai_balanced")->nullable();
            $table->integer("ai_single")->nullable();

            $table->string("max_input_balanced")->nullable();
            $table->string("max_input_single")->nullable();

            $table->string("ao_balanced")->nullable();
            $table->string("ao_single")->nullable();

            $table->integer("max_output_balanced")->nullable();
            $table->integer("max_output_single")->nullable();

            $table->integer("output_noise_balanced")->nullable();
            $table->integer("output_noise_single")->nullable();

            $table->string("volume_control_range")->nullable();
            $table->string("freq_response")->nullable();
            $table->integer("signal_noise_ratio")->nullable();
            $table->integer("total_harm_noise")->nullable();

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
        Schema::dropIfExists('preamps');
    }
};
