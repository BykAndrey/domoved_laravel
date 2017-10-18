<?php

namespace App\Http\Controllers;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('get')){

            return view('login');
        }
        if($request->isMethod('post')) {
            $pass=$request->input('password');
            if (Auth::attempt(['email' => 'domoved@gmail.com', 'password' => $pass])) {
                // Аутентификация успешна
                return redirect(route('admin'));

            }
            else{
                return redirect(route('login'));
            }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User();
        $user->name='Andrey';
        $user->email='andrey@mail.ru';
        $user->password=bcrypt('password');
        $user->save();
        return 'Yes';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
    public function changepass(Request $request){

        if($request->isMethod('post')){
            $oldpass=$request->input('oldpass');
            $newpass=$request->input('newpass');

            if(Auth::check()){
                $user=Auth::user();
                echo $user->password;
                $val=Validator::make($request->all(),[
                    'oldpass'=>'required|min:6',
                    'newpass'=>'required|min:6',
                ]);
                if($val->fails()){
                    return redirect(route('admin'))
                        ->withErrors($val);
                }
                if(Hash::check($oldpass,$user->password)){

                    $id=User::where('id',$user->id)->get()->first();
                    $id->password=bcrypt($newpass);
                    $id->save();
                    return redirect(route('logout'));
                }else{
                    echo "<br>Неверный пароль";
                }
            }
        }
    }

}
