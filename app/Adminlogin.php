<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminlogin extends Model
{
    public static function getPassword($email)
    {
        $adminPass = self::query()->select(["password"])->where("email", "=", $email)->first();
        return $adminPass["password"];
    }
}
