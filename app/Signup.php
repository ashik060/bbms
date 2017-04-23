<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    //
    public static function getPassword($email)
    {
        $realPass = self::query()->select(["password"])->where("email", "=", $email)->first();
        return $realPass["password"];
    }

    public static function getBloodGroup($id)
    {
        return self::query()->select(["blood_group"])->where("id", "=", $id)->first()["blood_group"];
    }

    public static function hasEmail($email)
    {
        return self::query()->select(["id"])->where("email", "=", $email)->count() > 0;
    }

    public static function getID($email)
    {
        return self::query()->select(["id"])->where("email", "=", $email)->first()["id"];
    }
    public static function getName($id)
    {
        return self::query()->select(["name"])->where("id", "=", $id)->first()["name"];
    }

}
