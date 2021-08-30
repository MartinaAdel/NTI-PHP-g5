<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //

    public $errors = [];
    var $data = [];
    public function register()
    {

        return view('register');
    }



    public function saveData(Request $request)
    {


        if ($request->has('name')) {
            $errors['Name'] = " Field Required";
        } elseif (!preg_match("/^[a-zA-Z\s*']+$/", $request->name)) {

            $errors['Name'] = "Invalid String";
        }
        if (empty($request->email)) {

            $errors['Email'] = " Field Required";
        } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $errors['Email'] = "Invalid Email";
        }

        if (empty($request->password)) {

            $errors['Password'] = " Field Required";
        } elseif (strlen($request->password < 6)) {

            $errors['Password'] = "Invalid Length";
        }
    }
    public function UserData()
    {
        if (count($errors) <= 0) {
            $data = $request->except('_token');
            return view('userProfile', $data);
        } else {
            return view('userProfile', $errors);
        }
    }
}
