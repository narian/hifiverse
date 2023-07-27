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
     * Nominal input voltage
     *      balanced
     *      single-ended
     * Input impedance
     *      balanced
     *      single-ended
     * Output power
     *  8Ω
     *  4Ω
     *  2Ω
     * Bandwidth
     * Signal to Noise Ratio
     * Total Harmonic Distortion + Noise
     * 0% global feedback
     * 100% global feedback
     * Max power consumption
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
        Schema::create('power_amps_stereo', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->integer("nom_input_voltage_balanced")->nullable();
            $table->integer("nom_input_voltage_single")->nullable();

            $table->string("input_impedance_balanced")->nullable();
            $table->string("input_impedance_single")->nullable();

            $table->string("out_power_8ohm")->nullable();
            $table->string("out_power_4ohm")->nullable();
            $table->string("out_power_2ohm")->nullable();

            $table->string("bandwidth")->nullable();
            $table->string("signal_noise_ratio")->nullable();

            $table->integer("total_harm_distort_0_feed")->nullable();
            $table->integer("total_harm_distort_100_feed")->nullable();

            $table->integer("max_power_consumption")->nullable();

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
        Schema::dropIfExists('power_amps_stereo');
    }
};
