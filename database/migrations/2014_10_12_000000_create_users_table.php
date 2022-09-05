<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('last_name');
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('email');
            $table->string('contact');
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // <editor-fold defaultState="collapsed" desc="RECORD INSERTION">
        $users = [
            [
                'user_id' => 'user-001',
                'last_name' => 'Magno',
                'name' => 'Bien Dave',
                'middle_name' => 'Bendico',
                'username' => 'superadmin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'email' => 'bien@email.com',
                'contact' => '0911111111111',
            ],
            [
                'user_id' => 'user-002',
                'last_name' => 'test',
                'name' => 'admin',
                'middle_name' => 'aaa',
                'username' => 'test',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'email' => 'test@email.com',
                'contact' => '0911111111111',
            ],

        ];

        foreach ($users as $u) {
            $user = new \App\Models\User($u);
            $user->active = true;
            $user->password = $u['password'];
            $user->save();
        }
        // </editor-fold>

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
