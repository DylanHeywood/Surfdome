<?php
class Validate
{
    public static function validateName($name)
    {
        $regex = "^[a-zA-Z0-9]{1,500}$^";
        if (preg_match($regex, $name)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validatePassword($pass)
    {
        $regex = "(?i)^(?=.*[a-z])(?=.*\d).{8,}$";
        if (preg_match($regex, $pass)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateCost($cost)
    {
        $regex = "^(?!0+(\.0+)?$)\d{0,10}(.\d{1,2})?$^";
        if (preg_match($regex, $cost)) {
            return true;
        } else {
            return false;
        }
    }
}