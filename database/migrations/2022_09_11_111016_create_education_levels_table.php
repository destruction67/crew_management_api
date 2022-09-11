<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
        });

        $educLevels  = [
            ['code'=>'lvl0','name'=>'early chilhood education'],
            ['code'=>'lvl1','name'=>'prmary education'],
            ['code'=>'lvl2','name'=>'lower secondary education'],
            ['code'=>'lvl3','name'=>'upper secondary education'],
            ['code'=>'lvl4','name'=>'post secondary education'],
            ['code'=>'lvl5','name'=>'short-cycle tertiary education'],
            ['code'=>'lvl6','name'=>'bachelor’s level'],
            ['code'=>'lvl7','name'=>'master’s level'],
            ['code'=>'lvl8','name'=>'doctor’s level'],
        ];

        foreach ($educLevels as $levels){
            $d = [
                'code' => $levels['code'],
                'name' => $levels['name'],
            ];
            $educationLevel = new \App\Models\EducationLevel($d);
            $educationLevel->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_levels');
    }
}
