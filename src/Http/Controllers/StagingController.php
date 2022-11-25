<?php

namespace Acitjazz\LaravelStagingMode\Http\Controllers;

use Acitjazz\LaravelStagingMode\Http\Requests\LoginRequest;
use Acitjazz\LaravelStagingMode\LaravelStagingMode;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class StagingController extends Controller
{

    /**
     * The Model name.
     *
     * @var string
     */
    protected $ip;

    public function __construct()
    {
        $this->ip =  LaravelStagingMode::get_client_ip();
    }

    public function index(){
        return view('acitjazz::login');
    }

    public function login(LoginRequest $request){

        $username = config('laravelstagingmode.username');
        $password = config('laravelstagingmode.password');
        if($request->username == $username && $request->password == $password){
            Cache::put( $this->ip, time(), config('laravelstagingmode.session_time'));
            return redirect(config('laravelstagingmode.login_redirect'));
        }
        return redirect()->route('staging.index')->with('message',config('laravelstagingmode.failed_message'));
    }

    public function logout(){
        Cache::forget($this->ip);
        return redirect()->route('staging.logout');
    }


}