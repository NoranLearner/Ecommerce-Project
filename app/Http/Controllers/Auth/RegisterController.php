<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Services\SMSServices;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\VerificationServices;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public $sms_services;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // In First Is SMSServices
    public function __construct(VerificationServices $sms_services)
    {
        $this->middleware('guest');
        $this -> sms_services = $sms_services;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{

            DB::beginTransaction();

            $verification = [];

            $user = User::create([
                'name' => $data['name'],
                // 'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
            ]);

            // send OTP SMS code

            // set - generate new code

            $verification['user_id'] = $user->id;

            $verification_data =  $this -> sms_services -> setVerificationCode($verification);

            $message = $this -> sms_services -> getSMSVerifyMessageByAppName( $verification_data -> code );

            //save this code in user_verification_codes table

            //done

            //send code to user mobile by sms gateway 'gateway name is - Victory Link'

            // note there are no gateway credentials in config file

            // app(VictoryLinkSms::class) -> sendSms( $user -> mobile , $message );

            DB::commit();
            return  $user;
            //send to user mobile

        }

        catch(\Exception $ex){
            DB::rollback();
        }

    }


}
