<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        $validator = Validator::make(
            ['test' =>'TestValidation'],
            ['test' => 'required|unique:senalizaciones|max:255']
        );
    }
}
