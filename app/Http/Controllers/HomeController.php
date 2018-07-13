<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiDosen;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $mata_kuliah_dosen=$this->getMataKuliahDosen($request);
        //return $mata_kuliah_dosen;
        $title='Data MataKuliah & Dosen';
        return view('home', compact('jenis_pertanyaan','title','mata_kuliah_dosen'));
    }

    public function getMataKuliahDosen(Request $request){

        $http = new Client;
        $response = $http->get('http://sia.politanisamarinda.ac.id/api/mata_kuliah', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization'      => 'Bearer '. env('SIA_POLITANI_TOKEN')
            ]
        ]);

        $result= json_decode((string) $response->getBody(), true);
        $semester='';
        $user_id='';
        $prodi_id='';
        $mata_kuliah_dosen=[];
        $data=[];
        if($result['success'] && isset($result['response'])){
            $data=$result['response'];
            $semester=$data['semester'];
            $user_id=$data['user_id'];
            $prodi_id=$data['prodi_id'];
        }



        foreach($data['mata_kuliah_dosen'] as  $keyItem=>$item){
            foreach ($item['dosen'] as $key =>$dosen){
                $count=HasilEvaluasiDosen::where('semester',$semester)
                    ->where('users_id',$user_id)
                    ->where('kelas_id',$item['kelas_id'])
                    ->where('dosen_id',$dosen['id'])->count();
                if($count>0){
                    unset($data['mata_kuliah_dosen'][$keyItem]['dosen'][$key]);
                }
            }
        }

        return $data;
    }

    public function getIsiEvaluasi($mhs_id,Request $request){
        try{
            $http = new Client;
            $response = $http->get('http://sia.politanisamarinda.ac.id/api/mata_kuliah/'.$mhs_id, [
                'headers' => [
                    'Accept' => 'application/json',
                ]
            ]);

            $result= json_decode((string) $response->getBody(), true);
            $semester='';
            $user_id='';
            $prodi_id='';
            $mata_kuliah_dosen=[];
            $data=[];
            if($result['success'] && isset($result['response'])){
                $data=$result['response'];
                $semester=$data['semester'];
                $user_id=$data['user_id'];
                $prodi_id=$data['prodi_id'];
            }

            foreach($data['mata_kuliah_dosen'] as  $keyItem=>$item){
                foreach ($item['dosen'] as $key =>$dosen){
                    $count=HasilEvaluasiDosen::where('semester',$semester)
                        ->where('users_id',$user_id)
                        ->where('kelas_id',$item['kelas_id'])
                        ->where('dosen_id',$dosen['id'])->count();
                    if($count<=0){
                        return 3;
                    }
                }
            }
        }catch (Exception $e){
            return 1;
        }

        return 0;
    }

}
