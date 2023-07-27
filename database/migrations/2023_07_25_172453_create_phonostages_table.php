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
     * MC current-sensing input impedance
     *      Equivalent Input Noise (EIN)
     * MM/MC voltage input impedance
     *      Equivalent Input Noise (EIN)
     * Playback EQ curves accuracy
     * High pass filter
     * Max analog output level
     *     balanced
     *     single-ended
     * Frequency response, up to
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
        Schema::create('phonostages', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->string("type")->nullable();

            $table->integer("mc_current_sens_input_imp")->nullable();
            $table->integer("mc_current_sens_input_imp_ein")->nullable();

            $table->integer("mm_mc_voltage_input_imp")->nullable();
            $table->integer("mm_mc_voltage_input_imp_ein")->nullable();

            $table->integer("play_eq_curves_acc")->nullable();
            $table->string("high_pass_filter")->nullable();

            $table->integer("max_ao_level_balanced")->nullable();
            $table->integer("max_ao_level_single")->nullable();

            $table->integer("freq_response")->nullable();
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
        Schema::dropIfExists('phonostages');
    }
};
