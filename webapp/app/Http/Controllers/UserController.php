<?php

namespace App\Http\Controllers;

use App\People;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ci'       => 'required',
            'name'     => 'required',
            'lastName' => 'required',
            'birthday' => 'required',
            'sex'      => 'required',
            'userType' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/userCreate')
                ->withErrors($validator)
                ->withInput();
        }

        $people=new People;
        $people->ci           =   $request->ci;
        $people->name         =   $request->name;
        $people->lastName     =   $request->lastName;
        $people->birthday     =   $request->birthday;
        $people->phone        =   $request->phone;
        $people->sex          =   $request->sex;
        $people->address      =   $request->address;
        $people->save();

        $model = People::all()->last();
        $user = new User();
        $user->userType     =   $request->userType;
        $user->email        =   $request->email;
        $user->username     =   $request->username;
        $user->password     =   bcrypt($request->password);
        $user->people_id    =   $model->id;
        $user->save();
        return response()->json($people);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id_user = Auth::id();
        $user = DB::table('users')
                ->where('id', $id_user)
                ->first();

        $people = DB::table('people')
                    ->join('users', 'users.people_id', '=', 'people.id')
                    ->where('people.id', '=', $user->people_id)
                    ->first();

        return view('user.viewprofile', compact(['user','people']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id_user = Auth::id();
        $user = DB::table('users')
            ->where('id', $id_user)
            ->first();

        $people = DB::table('people')
            ->join('users', 'users.people_id', '=', 'people.id')
            ->where('people.id', '=', $user->people_id)
            ->first();

        return view('user.editprofile', compact(['user','people']));
    }

    public function updateProfile(Request $request)
    {
        $email   = $request->input('email');
        $username       = $request->input('username');
        $people_id    = $request->input('idpeople');

        $users = DB::table('users')
            ->where('people_id', $people_id)
            ->update([
                'email'=> $email,
                'username'=>$username
            ]);

        $name   = $request->input('name');
        $lastName       = $request->input('lastName');
        $phone    = $request->input('phone');
        $address    =   $request->input('address');

        if($users){

            $people = DB::table('people')
                ->where('id' , $people_id)
                ->update([
                    'name' => $name,
                    'lastName' => $lastName,
                    'phone' => $phone,
                    'address' => $address
                ]);
            if($people){
                return response()->json(['x'=> 'se regssitro users y people' ]);
            }
            else{
                return response()->json(['x'=> 'no se registro people' ]);
            }
        }
        else{
            return response()->json(['x'=> 'no se regssitro users' ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userType      = $request->input('userType');
        $email   = $request->input('email');
        $username       = $request->input('username');
        $password   = $request->input('password');
        $people_id    = $request->input('idpeople');



        $users = DB::table('users')
        ->where('people_id', $people_id)
        ->update([
            'userType' => $userType,
            'email'=> $email,
            'username'=>$username,
            'password'=>$password
        ]);


      $ci      = $request->input('ci');
      $name   = $request->input('name');
      $lastName       = $request->input('lastName');
      $birthday   = $request->input('birthday');
      $phone    = $request->input('phone');
      $sex    =   $request->input('sex');
      $address    =   $request->input('address');

        if($users){

            $people = DB::table('people')
                ->where('id' , $people_id)
                ->update([
                   'ci' => $ci,
                   'name' => $name,
                    'lastName' => $lastName,
                    'birthday' => $birthday,
                    'phone' => $phone,
                    'sex' => $sex,
                    'address' => $address
                ]);
            if($people){
                return response()->json(['x'=> 'se regssitro users y people' ]);
            }
            else{
                return response()->json(['x'=> 'no se registro people' ]);
            }
        }
        else{
            return response()->json(['x'=> 'no se regssitro users' ]);
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
        //
    }
}
