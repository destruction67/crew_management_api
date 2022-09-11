<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('natl')->nullable(true);

            $table->string('natl_code')->nullable(true);
            $table->boolean('status')->default(true);

            $table->integer('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();
        });

        $countries = [
            [
                'code'=>'af',
                'name'=>'afganistan',
                'natl'=>'afghan',
                'natl_code'=>'afg',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'al',
                'name'=>'albania',
                'natl'=>'albanian',
                'natl_code'=>'afg',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'fr',
                'name'=>'france',
                'natl'=>'french',
                'natl_code'=>'fre',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'de',
                'name'=>'germany',
                'natl'=>'german',
                'natl_code'=>'ger',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'jp',
                'name'=>'japan',
                'natl'=>'japanese',
                'natl_code'=>'jap',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'ph',
                'name'=>'philippines',
                'natl'=>'filipino',
                'natl_code'=>'fil',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'usa',
                'name'=>'u.s.a',
                'natl'=>'american',
                'natl_code'=>'ame',
                'created_by'=>'1',
                'status'=>'1',
            ],


        ];

        foreach ($countries as $country_data){
            $country = new \App\Models\Country();
            $country->code = $country_data['code'];
            $country->name = $country_data['name'];
            $country->natl = $country_data['natl'];
            $country->natl_code = $country_data['natl_code'];
            $country->created_by = $country_data['created_by'];
            $country->status = $country_data['status'];
            $country->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
