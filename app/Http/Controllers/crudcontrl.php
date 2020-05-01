<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Regdata;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\crudcontrl;
use Cookie;
use validator;
use Auth;



class crudcontrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }


    public function login(Request $request)
    {
        // print_r($_POST); 
        // exit;
         $name=$request->username;
         $mobile=$request->passowrd; 


         $this->validate($request,[

            'username'  => 'required|email',
            'passowrd'  => 'required|alphaNum|min:5'

         ]);

             $remember_me = $request->has('remember_me') ? true : false; 
             //echo $remember_me; exit
             if($remember_me)
             {
                // setcookie('username',$name,time()+3600);
                // setcookie('passowrd',$mobile,time()+3600);
                Cookie::queue('username', $name, time()+3600);
                Cookie::queue('passowrd', $mobile, time()+3600);
                 // function setCookie(Request $request){
                 //      $minutes = 60;
                 //      $response = new Response('Set Cookie');
                 //      $response->withCookie(cookie('name', 'MyValue', $minutes));
                 //      return $response;
                 //   }
             }
             else {
                    if(isset($_COOKIE["username"])) {
                    setcookie ("username","");
                    }
                    if(isset($_COOKIE["passowrd"])) {
                    setcookie ("passowrd","");
                    }
                }


           $request->session()->put('username', $name);
           $request->session()->put('password', $mobile);
                $user_data = array(
                    'email'  =>  $request->get('username'),
                    'password' => $request->get('passowrd')
                );

               if(Auth::attempt($user_data,$remember_me))
               {
                 //Cookie::queue(Cookie::make('username', $name, 60));

                 //  $minutes = 60;
                 //  $response = new Response('Set Cookie');
                 //  $response->withCookie(cookie('email', $name, $minutes));
                 // // return $response;
                 return redirect('home/create');
               } 
               else
               {

                $toaster = array(
                    'messages' => 'Invalid Login creditential!!!!',
                    'alert-type' => 'error'
                    );
                 return redirect('/')->with($toaster);
               }
    }

            public function logout()
            {

                Auth::logout();
                Session::flush();
                return back();
            }

            public function forgot()
            {
                return "dsdsf";
                exit;
            }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regist['data'] = Regdata::all();
        return view('list',$regist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $obj = new Regdata();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->mobile = $request->mobile;

        if($obj->save())
        {
            //echo "Data Success";
            $toaster = array(

            'messages' => 'Data added!!!!',
            'alert-type' => 'success'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
            //return redirect('home/create');
        }
        else
        {
            $toaster = array(

            'messages' => 'Data Not added!!!!',
            'alert-type' => 'error'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view("list");

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "bavlk";
        $res['list'] = Regdata::find($id);
        
        return view('edit',$res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $objup = Regdata::find($request->id);
        
        $objup->name = $request->name;
        $objup->email = $request->email;
        $objup->mobile = $request->mobile;

        if($objup->save())
        {
            //return redirect('home/create');

             $toaster = array(

            'messages' => 'Data Updated!!!!',
            'alert-type' => 'info'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
           
        } 
        else
        {
            //return "Data went wrong";

             $toaster = array(

            'messages' => 'Data error!!!!',
            'alert-type' => 'error'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
           
        }

        return redirect('home');


    }

    public function user_reg(Request $request)
    {
       // print_r($request->all());

       $obj_reg = new Regdata();
      // print_r($request->password); exit;
       if(!empty($request->password) && !empty($request->cpass))
       {
       $result= $obj_reg->createuser($request->all());
        }
      // print_r($result);

       if($result >= 1)
       {
         echo "success";
       }
       else
       {
        echo "failure";
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $objdel = Regdata::find($id);

        if($objdel->delete())
        {

             $toaster = array(

            'messages' => 'Data deleted!!!!',
            'alert-type' => 'warning'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
           
           // return redirect('home/create');
        }  
        else
        {
            //echo "Data deleted unsucc";
             $toaster = array(

            'messages' => 'Data not deleted!!!!',
            'alert-type' => 'error'

            );

           //print_r($toaster); exit;

            return redirect('home/create')->with($toaster);
           
        }     
    }
}
