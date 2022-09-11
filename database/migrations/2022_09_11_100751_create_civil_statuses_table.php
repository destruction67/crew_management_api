<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivilStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
        });

        $civilStatus = [
            ['code'=>'s','name'=>'single'],
            ['code'=>'m','name'=>'married'],
            ['code'=>'d','name'=>'divorced'],
            ['code'=>'w','name'=>'widowed'],
        ];

        foreach ($civilStatus as $status){
            $civil = new \App\Models\CivilStatus();
            $civil->code = $status['code'];
            $civil->name = $status['name'];
            $civil->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civil_statuses');
    }
}
