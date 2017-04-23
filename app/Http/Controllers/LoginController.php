<?php

namespace App\Http\Controllers;

use App\Signup;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public static function isLoggedIn()
    {
        return password_verify(session("user_id", 0), session("loggedIn", 0));
    }

    public static function loginPage()
    {
        if (self::isLoggedIn()) {
            return redirect("/");
        } else return view("login");
    }

    public
    function login(Request $request)
    {
        $email = $request->get("email"); // field name from html form 'email'
        $pass = $request->get("password");
        $realPass = Signup::getPassword($email);
        if (password_verify($pass, $realPass)) {
            $request->session()->put("user_id", Signup::getID($email));
            $request->session()->put("loggedIn", password_hash($request->session()->get("user_id"), PASSWORD_DEFAULT));
            return redirect("/");
        } else {
            return "Incorrect Password or Email.";
        }
    }

    public
    function signup(Request $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $contact = $request->get("phone");
        $blood = $request->get("blood");
        $address = $request->get("address");
        $pass1 = $request->get("pass");
        $pass2 = $request->get("pass2");
        $birth = $request->get("birth");
        $donor = $request->get("donor");
        $receiver = $request->get("receiver");

        if (Signup::hasEmail($email)) {
            return "Email Exists";
        }

        $data = new Signup;
        $data->name = $name;
        $data->email = $email;
        $data->contact = $contact;
        $data->blood_group = $blood;
        $data->address = $address;
        $data->password = password_hash($pass1, PASSWORD_DEFAULT);
        $data->birth = $birth;
        $data->save();

        return "Insertion Successful!";
    }

    public static function logout()
    {
        session(["user_id" => null, "loggedIn" => null, 'admin' => null]);
        return redirect("/");
    }
}
