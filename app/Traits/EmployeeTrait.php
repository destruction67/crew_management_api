<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait EmployeeTrait
{

    public static function getFullName($person): string{
        if($person){
            $name = $person->name ?? $person->first_name;
            return Str::ucfirst($person->last_name) . ', '
                . Str::ucfirst($name) . ' '
                . strtoupper(substr($person->middle_name,0,1)) . '.';
        }
        return '';
    }

    public static function getCrewFullName($crew) {
        $fullName = '';
        $fullName .= $crew->first_name ? "{$crew->first_name} " : '';
        $fullName .= $crew->middle_name ? (substr($crew->middle_name, 0, 1) . ' ') : '';
        $fullName .= $crew->last_name ? "{$crew->last_name} " : '';
        $fullName .= $crew->extension ? "{$crew->extension} " : '';

        return strtoupper(trim($fullName));
    }

    public static function getCrewFullFormalName($crew, $fullMiddle = false) {
        $fullName = '';
        $fullName .= $crew->last_name ? "{$crew->last_name}" : '';
        $fullName .= $crew->first_name ? ", {$crew->first_name}" : '';
        $fullName .= $crew->extension ? " {$crew->extension} " : '';
        if($fullMiddle) {
            $fullName .= $crew->middle_name ? ", {$crew->middle_name}" : '';
        } else {
            $fullName .= $crew->middle_name ? ', ' . (substr($crew->middle_name, 0, 1) . ' ') : '';
        }

        return strtoupper(trim($fullName));
    }

}
