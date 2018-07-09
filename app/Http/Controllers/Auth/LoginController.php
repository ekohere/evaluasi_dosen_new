<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Britech\ApiPolitaniSmd\Facade;
use ApiPolitaniSmd;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->http = new Client;
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    /*protected function attemptLogin(Request $request)
    {
        $requestData=$request->all();

        try{*/
            /*$result_array=$this->loginApi($requestData);

            if(isset($result_array['access_token'])){*/

                //$user_array=ApiPolitaniSmd::mahasiswa($requestData[$this->username()],$requestData['password']);  //$this->getUserApi($requestData[$this->username()],$requestData['password']);

                /*if(isset($user_array->success) && $user_array->success ){
                    return $this->saveAndLogin($request,$user_array);
                }*/
            /*}*/
            /*return false;
        }catch(RequestException $e){
            return false;
        }
    }*/

/*    public function loginApi($requestData){
        $response = $this->http->post('http://sia.politanisamarinda.ac.id/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '3',
                'client_secret' => 'vkHIOjl5ez1LW9FGU7IRsIhjtHB2pQw9pbIXLfPW',
                'username' => $requestData[$this->username()],
                'password' =>$requestData['password'],
            ],
        ]);
        return json_decode((string) $response->getBody(), true);
    }*/

    public function getUserApi($username,$password){
        $response = $this->http->post('http://sia.politanisamarinda.ac.id/api/mahasiswa', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization'      => 'Bearer '.env('POLITANI_TOKEN'),
                'Content-Type' => 'application/json',
            ],
            'json'=>[
                'email'=>$username,
                'password'=>$password,
            ]
        ]);

        return json_decode((string)  $response->getBody(), true);
    }

    public function saveAndLogin(Request $request,$user_array){

        $role_array=[];
        foreach($user_array['response']['roles'] as $item){
            array_push($role_array,$item['name']);
        }

        $user_array['role_admin_evaluasi_dosen']=0;
        $user_array['role_mahasiswa']=0;
        $user_array['role_dosen']=0;
        $user_array['role_staff']=0;

        //Simpan Role
        if(in_array('admin_evaluasi_dosen',$role_array)){
            $user_array['role_admin_evaluasi_dosen']=1;
        }
        if(in_array('mahasiswa',$role_array)){
            $user_array['role_mahasiswa']=1;
        }
        if(in_array('dosen',$role_array)){
            $user_array['role_dosen']=1;
        }
        if(in_array('staff',$role_array)){
            $user_array['role_staff']=1;
        }

        $user=User::updateOrCreate(['id'=>$user_array['response']['id']],
            ['id'=>$user_array['response']['id'],
                'name'=>$user_array['response']['name'],
                'email'=>$user_array['response']['email'],
                'admin_evaluasi_dosen'=>$user_array['role_admin_evaluasi_dosen'],
                'mahasiswa'=>$user_array['role_mahasiswa'],
                'dosen'=>$user_array['role_dosen'],
                'staff'=>$user_array['role_staff'],]);

        $request->session()->put('user_id',$user_array['response']['id']);
        $request->session()->put('tahun',$user_array['response']['tahun']);
        $request->session()->put('semester',$user_array['response']['semester']);
        $request->session()->put('mahasiswa_id',$user_array['response']['mahasiswa']['id']);
        $request->session()->put('nama_mahasiswa',$user_array['response']['name']);
        $request->session()->put('nim',$user_array['response']['mahasiswa']['nim']);
        /*$request->session()->put('kelas_id',$user_array['response']['mahasiswa']['list_institusi'][0]['kelas']['id']);
        $request->session()->put('nama_kelas',$user_array['response']['mahasiswa']['list_institusi'][0]['kelas']['nama']);*/
        $request->session()->put('program_studi_id',$user_array['response']['mahasiswa']['list_institusi'][0]['institusi']['id']);
        $request->session()->put('program_studi',$user_array['response']['mahasiswa']['list_institusi'][0]['institusi']['nama']);
        $request->session()->put('jurusan_id',$user_array['response']['mahasiswa']['list_institusi'][0]['institusi']['parent_institusi']['id']);
        $request->session()->put('jurusan',$user_array['response']['mahasiswa']['list_institusi'][0]['institusi']['parent_institusi']['nama']);

        return $this->guard()->login(
            $user, $request->has('remember')
        );
    }
}
