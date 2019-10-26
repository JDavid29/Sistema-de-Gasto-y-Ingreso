<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;	//para que me permita utilizar

class SocialController extends Controller
{
    //CREAMOS UNA FUNCION PARA
    public function redirect(){
    	return Socialite::driver('facebook')->redirect();
    }

    //CREAMOS LA FUNCION DE RESPUESTA
    	public function callback(){
    		$user = Socialite::driver('facebook')->user();
    		return ($user->getAvatar());
    	}


    //CREAMOS UNA FUNCION PARA GITHUB
    public function redirectToGithub(){
    	return Socialite::driver('github')->redirect();
    }

    //CREAMOS LA FUNCION DE RESPUESTA
    	public function callbackToGithub(){
    		$user = Socialite::driver('github')->user();
    		return ($user->getAvatar());
    	}


}
