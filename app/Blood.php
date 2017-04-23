<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Blood extends Model
{
    public static function getAvailableBlood($group)
    {
        $out = DB::select("SELECT SUM(`quantity`) AS q FROM `bloods` WHERE `blood_group` = ? AND `transaction_type` = ? AND `confirmed` = 1", [$group, 2])[0]->q;
        $in = DB::select("SELECT SUM(`quantity`) AS q FROM `bloods` WHERE `blood_group` = ? AND `transaction_type` = ? AND `confirmed` = 1", [$group, 1])[0]->q;
        return max(0, $in - $out);
    }

    public static function getDonors()
    {
        return DB::select("SELECT COUNT(`id`) as n FROM `bloods` WHERE `confirmed` = 0 AND `transaction_type` = 1")[0]->n;
    }

    public static function getReceivers()
    {
        return DB::select("SELECT COUNT(`id`) as n FROM `bloods` WHERE `transaction_date` is NULL AND `confirmed` = 1 AND `transaction_type` = 2")[0]->n;
    }

    public static function pendingDonors()
    {
        return DB::select("SELECT * FROM `bloods` WHERE `transaction_date` is NULL AND `confirmed` = 0 AND `transaction_type` = 1");
    }

    public static function pendingReceivers()
    {
        return DB::select("SELECT * FROM `bloods` WHERE `transaction_date` is NULL AND `confirmed` = 1 AND `transaction_type` = 2");
    }
}
