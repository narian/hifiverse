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
     * Max analog input level
     *     balanced
     *     single-ended
     * Input impedance
     *     balanced
     *     single-ended
     * A/D conversion
     *  Yes/No
     * Type
     * Phono MC
     * Yes/No
     * Phono MC current-sensing input impedance
     * Playback EQ curves accuracy
     * Post volume control analog line outputs max level balances
     * Power rating
     *     8Ω
     *     4Ω
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
        Schema::create('intergrated_amps', function (Blueprint $table) {
            $table->id();
            $table->string("model_name");
            $table->string("company");

            $table->string("type")->nullable();
            $table->string("subtype")->nullable();

            $table->integer("max_ai_level_balanced")->nullable();
            $table->integer("max_ai_level_single")->nullable();

            $table->integer("input_impedance_balanced")->nullable();
            $table->integer("input_impedance_single")->nullable();

            $table->boolean("ad_convert")->nullable();

            $table->boolean("phono_mc")->nullable();
            $table->integer("phono_mc_input_impedance")->nullable();

            $table->float("play_eq_accurancy")->nullable();
            $table->integer("post_volume_control")->nullable();

            $table->string("power_rating_8ohm")->nullable();
            $table->string("power_rating_4ohm")->nullable();

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
        Schema::dropIfExists('intergrated_amps');
    }
};
