<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserRegisteredSuccessfully; // 추가
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 추가
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Register new account.
     * Get a validator for an incoming registration request.
     *
     * @param  Request $request
     * @return $user
     */
    protected function register(Request $request)
    {
        /**@var User $user */
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $validatedData['password'] = bcrypt(array_get($validatedData, 'password'));
            $validatedData['activation_code'] = str_random(30).time();

            $user = app(User::class)->create($validatedData);

        } catch (\Exception $exception) {
            logger()->error($exception);

            return redirect()->back()->with('message', '새로운 계정을 생성할 수 없습니다.'); // Unable to create new user
        }

        
        $user->notify(new UserRegisteredSuccessfully($user));

        return redirect()->back()->with('message', '회원가입에 성공했습니다. 이메일을 통해 계정을 활성화 해주세요.');
            //Successfully created a new account. Please check your email and activate your account.
    }
    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return "인증코드가 존재하지 않거나 만료되었습니다.";
            }
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();

            
            $search_id = $user->id;
            // role_user 테이블에도 데이터 주입
            $role_user = app(User::class)->find($search_id)->roles()->attach($search_id);
            $role_user->save();

            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        
        return redirect()->to('/home'); // 계정 인증되고 home 으로 리다이렉트
    }
}
