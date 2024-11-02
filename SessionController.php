<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
  public function index(){

    // $session = session()->except(['email']);//it will give all the sessions except email
    // $session = session()->only(['email']);//it will give email session only


   $session = session()->all();

    echo "<pre>";

    print_r($session);

    echo "</pre>";

    // if(session()->has('name')){
    //   $name = session('name');
    //   echo $name;
    // }else{
    //   echo "no such session exists";
    // }

      // if(session()->exists('name')){
      // $name = session('name');
      // echo $name;
      // }
      // else{
      // echo "no such session exists";
      // }


   
 
    session()->regenerate();//changes token every time page reloads

    return view('welcome');
  }


  public function storeSession(){
    session([
        'name' => 'subhan',
        'email' => 'subhan@gmail.com',
        'password' => 'subhan123',

    ]);
    session()->increment('count',1);//increases count by 1 whenever a session is stored

    return redirect()->route('viewSession')->with('status','session created successfully');
  }

    public function destroy(){
  
      session()->flush();
    return redirect()->route('viewSession')->with('status','session destroyed successfully');
  }
}
