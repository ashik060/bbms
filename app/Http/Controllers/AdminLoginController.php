<?php

namespace App\Http\Controllers;

use App\AdminLogin;
use App\Blood;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public static function isAdmin()
    {
        return password_verify("admin", session("admin", 0));
    }

    public function adminlogin(Request $request)
    {
        $email = $request->get("email"); // field name from html form 'email'
        $pass = $request->get("password");
        $realPass = AdminLogin::getPassword($email);
        if ($realPass == md5($pass)) {
            $request->session()->put("admin", password_hash("admin", PASSWORD_DEFAULT));
            return redirect("/adminloginpage");
        } else {
            return self::loginPage("Incorrect Password or Email.");
        }
    }

    public static function loginPage($msg = null)
    {
        return view('loginadmin', compact("msg"));
    }

    public static function index()
    {
        if(!self::isAdmin()){
            return redirect("/");
        }
        $donors_count = Blood::getDonors();
        $receivers_count = Blood::getReceivers();
        $donors = Blood::pendingDonors();
        $receivers = Blood::pendingReceivers();
        // dd($receivers);
        return view("adminloginpage", compact(["donors_count", "receivers_count", "donors", "receivers"]));
    }
}

