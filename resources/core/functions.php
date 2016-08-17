<?php
class Validate
{
    function validateName($name)
    {
        $regex = "^\d*[a-zA-Z][a-zA-Z0-9]*$";
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
        $regex = "\d{1,3}[,\\.]?(\\d{1,2})?";
        if (preg_match($regex, $cost)) {
            return true;
        } else {
            return false;
        }
    }
}