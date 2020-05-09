<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    public function passes($attribute, $value){
        return Hash::check($value, auth()->user()->password);
    }
    public function message(){
        return 'The :attribute is wrong';
    }
}
