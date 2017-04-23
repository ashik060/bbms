<?php

namespace App\Http\Controllers;

use App\Signup;
use Illuminate\Http\Request;
use App\Blood;

class DonateController extends Controller
{
    public static function index($msg = null, $err = null)
    {
        if (!LoginController::isLoggedIn()) return redirect("/login");

        $blood = Signup::getBloodGroup(session("user_id"));
        $amount = Blood::getAvailableBlood($blood);
        return view('order', compact(["amount", "blood", "msg", "err"]));
    }

    public static function process(Request $request)
    {
        if (!LoginController::isLoggedIn()) return redirect("/login");

        $blood = Signup::getBloodGroup(session("user_id"));
        $amount = Blood::getAvailableBlood($blood);

        //@TODO: Validate here

        $receive = new Blood;
        $receive->transaction_type = $request->get("type");
        $receive->order_date = \Carbon\Carbon::now();
        $receive->blood_group = $blood;
        $receive->quantity = $request->get("quantity");
        $receive->people_id = session("user_id");
        if ($receive->transaction_type == 1)
            $receive->confirmed = 0;
        else
            $receive->confirmed = 1;

        if ($receive->transaction_type == 2 && $amount < $receive->quantity) {
            return self::index(null, "No enough blood available for the group " . $blood);
        }
        $receive->save();
        return self::index("Transaction Order Successfully Received! We shall contact you soon.", null);
    }

    public static function confirmReceive($id)
    {
        $blood = Blood::find($id);
        $blood->transaction_date = \Carbon\Carbon::now()->toDateString();
        $blood->save();
        return 0;
    }

    public static function confirmDonate($id)
    {
        $blood = Blood::find($id);
        $blood->transaction_date = \Carbon\Carbon::now()->toDateString();
        $blood->confirmed = 1;
        $blood->save();
        return 0;
    }
}
