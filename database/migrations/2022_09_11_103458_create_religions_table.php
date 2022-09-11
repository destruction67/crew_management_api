<?php

use App\Models\Religion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $religions = [
            //1
            ['code'=>'rm','name'=>'roman catholic'],
            //2
            ['code'=>'inc','name'=>'iglesia ni cristo'],
            //3
            ['code'=>'nccp','name'=>'protestant'],
            //4
            ['code'=>'agl','name'=>'aglipayan'],
            //5
            ['code'=>'sda','name'=>'seventh-day adventist'],
            //6
            ['code'=>'bc','name'=>'bible baptist church'],
            //7
            ['code'=>'uccp','name'=>'united church of christ in the philippines'],
            //8
            ['code'=>'jeh','name'=>"jehovah's witness"],
            //9
            ['code'=>'pen','name'=>"pentecostal"],
            //10
            ['code'=>'islam','name'=>"islam"],
            //11
            ['code'=>'med','name'=>"methodist"],
            //12
            ['code'=>'ba','name'=>"born again"],
            //13
            ['code'=>'coc','name'=>"church of god"],
            //14
            ['code'=>'ag','name'=>"assembles of god"],
            //15
            ['code'=>'jil','name'=>"jesus is lord"],
            //16
            ['code'=>'lds','name'=>"latter day saints"],
            //17
            ['code'=>'bud','name'=>"buddhism"],
        ];
        foreach ($religions as $religion){
            $data = [
                'code' => $religion['code'],
                'name' => $religion['name'],
            ];
            $newReligion = new Religion($data);
            $newReligion->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('religions');
    }
}
