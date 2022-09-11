<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable()->default("");
            $table->string('name')->nullable()->default("");
            $table->timestamps();
        });

        $addressTypes = [
            ['code'=>'prmn','name'=>'permanent'],
            ['code'=>'temp','name'=>'temporary'],
            ['code'=>'prov','name'=>'provincial'],
        ];

        foreach ($addressTypes as $addressType){
            $addressType = new \App\Models\AddressType(
                [
                    'code' => $addressType['code'],
                    'name' => $addressType['name'],
                ]
            );
            $addressType->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_types');
    }
}
