<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  Disc compability CD
     *  Disc compability SACD
     *  Sub type 1
     *  Transport
     *  Player
     *  Sub type 2
     *  Company
     *  Model name
     *  Frequency response
     *      up to for CD
     *      up to for SACD
     *  Analog output
     *  Analog outputs level
     *      balanced
     *      single-ended
     *  Dynamic range
     *      for CD
     *      for SACD
     *  Signal to Noise Ratio
     *      for CD
     *      for SACD
     *  Total Harmonic Distortion + Noise
     *      for CD
     *      for SACD
     *  Dimensions
     *  Weight
     *  Photo 1-2-3
     *  Official link
     */

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cd_players', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->boolean("disc_comp_cd")->default(false);
            $table->boolean("disc_comp_sacd")->default(false);

            $table->string("subtype_1")->nullable();
            $table->string("subtype_2")->nullable();

            $table->boolean("transport")->default(false);
            $table->boolean("player")->default(false);

            $table->integer("freq_response_cd")->nullable();
            $table->integer("freq_response_sacd")->nullable();

            // analog output
            $table->integer("ao_level_balanced")->nullable();
            $table->integer("ao_level_single")->nullable();

            $table->integer("dynamic_range_cd")->nullable();
            $table->integer("dynamic_range_sacd")->nullable();

            $table->integer("signal_noise_ratio_cd")->nullable();
            $table->integer("signal_noise_ratio_sacd")->nullable();

            $table->integer("total_harm_dist_cd")->nullable();
            $table->integer("total_harm_dist_sacd")->nullable();

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
        Schema::dropIfExists('cd_players');
    }
};
