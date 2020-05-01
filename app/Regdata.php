<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Input;




class Regdata extends Model
{
	
     protected $table = "_reg_datas";
     protected $fillable = ["name","email","mobile"];


    public function checkauth($req,$mob)
    {
        //print_r($req);
       //print_r($mob);
       // $hashed = Hash::make($mob);
       // $tt = Hash::check($hashed,$mob);

       //echo $tt; exit;
       //print_r(bcrypt($mob)); exit;
    	 $query = DB::table('users')
                    ->select('*')
                     ->where('email','=',$req)
                     ->where('password','=',$mob)
                     ->get();

                     print_r($query); exit;

    	if(count($query)!==0)
    	{
    		return "success";
    	}
    	else
    	{
    		return "failed";
    	}

    		//return $req;
    		//exit;
    }

    public function createuser($udata)
    {
       // print_r($udata); exit;
           $values = array(
               'name'  => $udata['name'],
               'email' => $udata['email'],
               'password' => bcrypt($udata['password']),
               'cpass'    =>  bcrypt($udata['cpass']),
               'remember_token' => $udata['_token'],
               
          );
        //print_r($values); exit;

        $query_user = DB::table('users')->insert($values);
      

       // print_r($query_user); exit;

        return $query_user;

    }
}
