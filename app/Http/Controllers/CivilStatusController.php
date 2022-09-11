<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CivilStatusController extends Controller
{
    //
    public static function getAllFromOld()
    {

    }

    public static function findFromOld(int $id)
    {

    }

    public static function findFromNew(int $id)
    {
//        return CivilStatus::find($id);
    }

    public static function createNew()
    {
//        $civilStatus = [
//            ['code'=>'s','name'=>'single'],
//            ['code'=>'m','name'=>'married'],
//            ['code'=>'d','name'=>'divorced'],
//            ['code'=>'w','name'=>'widowed'],
//        ];
//
//        foreach ($civilStatus as $status){
//            $civil = new CivilStatus();
//            $civil->code = $status['code'];
//            $civil->name = $status['name'];
//            $civil->save();
//        }
    }
}
