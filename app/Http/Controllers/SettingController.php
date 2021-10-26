<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function changeCountry(Request $request)
    {

        $ipok = Setting::where('user_id', Auth::user()->id)->first();


        //SI NO EXISTE REGISTRO DE IP EN SETTING
        if($ipok == null){

            $user = User::where('id', Auth::user()->id)->first();
            $country = $request->input('country');

            if($country === 'pe'){
                $ip = '190.239.191.170';
            }elseif($country === 'cl'){
                $ip = '201.189.101.104';
            }elseif($country === 'co'){
                $ip = '138.186.188.200';
            }elseif($country === 'us'){
                $ip = '66.249.64.176';
            }

            Setting::create([
                    'ip' => $ip ,
                    'country' => $country,
                    'user_id' => $user->id]
            );

            return back();

            //SI YA EXISTE REGISTRO DE IP EN SETTING
        }else{

            $user = User::where('id', Auth::user()->id)->first();
            $country = $request->input('country');

            if($country === 'pe'){
                $ip = '190.239.191.170';
            }elseif($country === 'cl'){
                $ip = '201.189.101.104';
            }elseif($country === 'co'){
                $ip = '138.186.188.200';
            }elseif($country === 'us'){
                $ip = '66.249.64.176';
            }



            Setting::where('user_id', Auth::user()->id)
                        ->update([
                            'country' => $country,
                            'user_id' => $user->id

                                ]);

            return back();

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
