<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiDosen;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $title='Data MataKuliah & Dosen';
        return view('home', compact('jenis_pertanyaan','title','mata_kuliah_dosen'));
    }

    public function getMataKuliahDosen(Request $request){
        $access_token='';
        if(isset($request->access_token)){
            $access_token=$request->access_token;
        }else{
            $access_token=Auth::user()->access_token;
        }

        $http = new Client;
        $response = $http->get('http://sia.politanisamarinda.ac.id/api/mata_kuliah', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization'      => 'Bearer '. $access_token
            ]
        ]);

        $result= json_decode((string) $response->getBody(), true);
        $tahun_sia='';
        $semester_sia='';
        $user_id='';
        $mata_kuliah_dosen=[];
        $data=[];
        if($result['success'] && isset($result['response'])){
            $data=$result['response']['mata_kuliah_dosen'];
            $tahun_sia=$result['response']['tahun_sia'];
            $semester_sia=$result['response']['semester_sia'];
            $user_id=$result['response']['user_id'];
        }

        foreach($data as $item){
            $mk_dosen_item=[];
            $mk_dosen_item['mata_kuliah_id']=$item['mata_kuliah_id'];
            $mk_dosen_item['mata_kuliah_nama']=$item['mata_kuliah_nama'];

            if(isset($item['dosen1_id'])){
                $mk_dosen_item['dosen_id']=$item['dosen1_id'];
                $mk_dosen_item['dosen_nama']=$item['dosen1_nama'];
                $mk_dosen_item['dosen_nama_lengkap']=$item['dosen1_nama_lengkap'];
                array_push($mata_kuliah_dosen,$mk_dosen_item);
            }

            if(isset($item['dosen2_id'])){
                $mk_dosen_item['dosen_id']=$item['dosen2_id'];
                $mk_dosen_item['dosen_nama']=$item['dosen2_nama'];
                $mk_dosen_item['dosen_nama_lengkap']=$item['dosen2_nama_lengkap'];
                array_push($mata_kuliah_dosen,$mk_dosen_item);
            }

            if(isset($item['dosen3_id'])){
                $mk_dosen_item['dosen_id']=$item['dosen3_id'];
                $mk_dosen_item['dosen_nama']=$item['dosen3_nama'];
                $mk_dosen_item['dosen_nama_lengkap']=$item['dosen3_nama_lengkap'];
                array_push($mata_kuliah_dosen,$mk_dosen_item);
            }

            if(isset($item['dosen4_id'])){
                $mk_dosen_item['dosen_id']=$item['dosen4_id'];
                $mk_dosen_item['dosen_nama']=$item['dosen4_nama'];
                $mk_dosen_item['dosen_nama_lengkap']=$item['dosen4_nama_lengkap'];
                array_push($mata_kuliah_dosen,$mk_dosen_item);
            }

        }

        foreach($mata_kuliah_dosen as $key => $item){
            $count=HasilEvaluasiDosen::where('tahun',$tahun_sia)
                ->where('semester',$semester_sia)
                ->where('users_id',$user_id)->where('mata_kuliah_id',$item['mata_kuliah_id'])
                ->where('dosen_id',$item['dosen_id'])->count();
            if($count>0) unset($mata_kuliah_dosen[$key]);
        }

        return $mata_kuliah_dosen;
    }

}
