<?php

namespace App\Src;

class Validator
{
    static function letterSpaceDash($value)
    {
        if (!preg_match('/^[a-zA-Z\s\-]+$/', $value))
            return false;
        return true;
    }
    static function email($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL))
            return false;
        return true;
    }
    static function password($value)
    {
        if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $value))
            return false;
        return true;
    }
}