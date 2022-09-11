<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
        });

        $crewTypes = [
            ['code' => 's', 'name' => 'scholar'],
            ['code' => 'u', 'name' => 'utility'],
            ['code' => 'd', 'name' => 'dummy'],
            ['code' => 'rev', 'name' => 'reverting'],
        ];

        foreach ($crewTypes as $crewType){
            $nCrewType = new \App\Models\CrewType([
                'code' => $crewType['code'],
                'name' => $crewType['name'],
            ]);
            $nCrewType->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_types');
    }
}
