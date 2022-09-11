<?php

use App\Models\Gender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $genders = [
            ['code'=>'m','name'=>'male'],
            ['code'=>'f','name'=>'female'],
        ];

        foreach ($genders as $gender){
            $ob = new Gender();
            $ob->code = $gender['code'];
            $ob->name = $gender['name'];
            $ob->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genders');
    }
}
