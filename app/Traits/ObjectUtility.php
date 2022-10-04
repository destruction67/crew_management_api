<?php


namespace App\Traits;



trait ObjectUtility
{
    public function isNull($obj)
    {
        if (empty($obj) || $obj == '' || $obj == 'null' || $obj == "undefined"
            || $obj == '0000-00-00 00:00:00'
            || $obj == '0000-00-00') {
            return true;
        }
        return false;
    }


}
