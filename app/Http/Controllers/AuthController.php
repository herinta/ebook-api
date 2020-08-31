<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function me(){
        return [
            'NIS' => 3103118073, 
            'Name' => 'Herinta Armantya', 
            'Gender' => 'Perempuan', 
            'Phone' => 628983013546,
            'Class' => 'XII RPL 2'
        ];
    }
}