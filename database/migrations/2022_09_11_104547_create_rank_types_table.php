<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
        });

        $rankTypes = [
            ['code' =>'d','name'=>'deck'],
            ['code' =>'e','name'=>'engine'],
            ['code' =>'r','name'=>'radio'],
            ['code' =>'s','name'=>'steward'],
        ];

        foreach ($rankTypes as $rankType){
            $data = [
                'code' => $rankType['code'],
                'name' => $rankType['name'],
            ];
            $newRankType = new \App\Models\RankType($data);
            $newRankType->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rank_types');
    }
}
