<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('alias')->nullable(true);
            $table->string('alias2')->nullable(true);
            $table->string('alias3')->nullable(true);

            $table->integer('ranking')->nullable(true);

            $table->boolean('key_officer')->default(false);

            $table->integer('rank_type')->nullable()->unsigned();
            $table->foreign('rank_type')->references('id')->on('rank_types');

            $table->integer('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->boolean('status');

            $table->timestamps();
        });

        $ranks = [
            [
                'code'=>'mstr',
                'name'=>'master',
                'alias'=>'',
                'alias2'=>'',
                'alias3'=>'',
                'ranking'=>'1',
                'key_officer'=>'1',
                'rank_type'=>'1',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'',
                'name'=>'chief mate',
                'alias'=>'c/m',
                'alias2'=>'chief mate',
                'alias3'=>'',
                'ranking'=>'2',
                'key_officer'=>'1',
                'rank_type'=>'1',
                'created_by'=>'1',
                'status'=>'1',
            ],

            [
                'code'=>'',
                'name'=>'second mate',
                'alias'=>'2/m',
                'alias2'=>'2nd mate',
                'alias3'=>'',
                'ranking'=>'3',
                'key_officer'=>'1',
                'rank_type'=>'1',
                'created_by'=>'1',
                'status'=>'1',
            ],

        ];

        foreach ($ranks as $rank_data){
            $rank = new \App\Models\Rank();
            $rank->code = $rank_data['code'];
            $rank->name = $rank_data['name'];
            $rank->alias = $rank_data['alias'];
            $rank->alias2 = $rank_data['alias2'];
            $rank->alias3 = $rank_data['alias3'];
            $rank->ranking = $rank_data['ranking'];
            $rank->key_officer = $rank_data['key_officer'];
            $rank->rank_type = $rank_data['rank_type'];
            $rank->created_by = $rank_data['created_by'];
            $rank->status = $rank_data['status'];
            $rank->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
