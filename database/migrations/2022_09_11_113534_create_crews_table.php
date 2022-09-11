<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name')->nullable(true);
            $table->string('first_name')->nullable(true);
            $table->string('middle_name')->nullable(true);
            $table->string('suffix_name')->nullable(true);

            $table->string('crew_code')->nullable();

            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();

            //crewType
            $table->integer('crew_type')->nullable()->unsigned();
            $table->foreign('crew_type')
                ->references('id')
                ->on('crew_types');


            $table->string('weight')->nullable();
            $table->string('height')->nullable();

            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('blood_type')->nullable();

            $table->string('sss')->nullable();
            $table->string('tin')->nullable();
            $table->string('phil_health')->nullable();
            $table->string('pag_ibig')->nullable();

            $table->string('jacket')->nullable();
            $table->string('shoes')->nullable();
            $table->string('long_sleeves')->nullable();
            $table->string('short_sleeves')->nullable();
            $table->string('uniform')->nullable();

            $table->string('cover_all')->nullable();

            $table->string('pants')->nullable();

            $table->boolean('isHired')->nullable();
            $table->date('date_hired')->nullable();

            $table->integer('religion_id')->nullable()->unsigned();
            $table->foreign('religion_id')->references('id')->on('religions');

            $table->integer('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->integer('rank_id')->nullable()->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');

            $table->integer('gender_id')->nullable()->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->integer('civil_status')->nullable()->unsigned();
            $table->foreign('civil_status')->references('id')->on('civil_statuses');

            $table->integer('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->boolean('status')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crews');
    }
}
