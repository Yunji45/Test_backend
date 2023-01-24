<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datapasien;
use Illuminate\Support\Facades\Validator;
use DB;

class DataController extends Controller
{
    public function getpost()
    {
        return response() ->json([
            'success' =>true,
            'message' => 'berhasil',
            'data' =>Datapasien::all(),
        ],200);
    }

    public function storedetail(Request $request){
        $validator = Validator::make($request->all(), [
            'namaruangan'     => 'required',
            'jumlahpasien'   => 'required',
        ],
            [
                'namaruangan.required' => 'Masukkan Nama Ruangan !',
                'jumlahpasien.required' => 'Masukkan Jumlah Pasien !',
            ]
        );
        if($validator->fails()){
            return response() ->json([
                'success' =>false,
                'message' =>'isi data wajib',
                'data' => $validator->errors()
            ],401);
        }else{
            $data = new Datapasien;
            $data->namaruangan = $request->namaruangan;
            $data->jumlahpasien = $request->jumlahpasien;
            $data->save();
            if ($data){
                return response() ->json([
                    'success' =>true,
                    'message' => 'berhasil input',
                    'data' => $data
                ],200);
            }else{
                return response() ->json([
                    'success' =>false,
                    'message' => 'gagal input'
                ],401);
            }
        }
    }
    
    public function storedetail2(Request $request){
        $validator = Validator::make($request->all(), [
            'namadokter'     => 'required',
            'jumlahpasien'   => 'required',
        ],
            [
                'namadokter.required' => 'Masukkan Nama Dokter !',
                'jumlahpasien.required' => 'Masukkan Jumlah Pasien !',
            ]
        );
        if($validator->fails()){
            return response() ->json([
                'success' =>false,
                'message' =>'isi data wajib',
                'data' => $validator->errors()
            ],401);
        }else{
            $data = new Datapasien;
            $data->namadokter = $request->namadokter;
            $data->jumlahpasien = $request->jumlahpasien;
            $data->save();
            if ($data){
                return response() ->json([
                    'success' =>true,
                    'message' => 'berhasil input',
                    'data' => $data
                ],200);
            }else{
                return response() ->json([
                    'success' =>false,
                    'message' => 'gagal input'
                ],401);
            }
        }
    }

    public function hitungindex(Request $request){
        $user = Datapasien::where('namapasien' ,1)->get();
        $length = strlen($user);
        return response() ->json([
            'success' => true,
            'message' => 'menghitung index array 1',
            'data' => $length
        ],200);
    }

    public function tampilsebagian(){
        $data = Datapasien::where('namapasien', 'tglregistrasi')->get();
        return response() ->json([
            'success' => true,
            'message' => 'Tampilkan data',
            'data' => $data
        ],200);
    }

    public function penomoran()
    {
        $pasien = Datapasien::all();
        $data = [];
        $no = 1;
        foreach ($pasien as $item) {
            $data[] = [
                'no' => $no,
                'norec' => $item->norec,
                'statusenabled' => $item->statusenabled,
                'tglregistrasi' => $item->tglregistrasi,
                'nocm' => $item->nocm,
                'nocmfk' => $item->nocmfk,
                'noregistrasi' => $item->noregistrasi,
                'namaruangan' => $item->namaruangan,
                'namapasien' => $item->namapasien,
                'kelompokpasien' => $item->kelompokpasien,
                'namarekanan' => $item->namarekanan,
                'tanggalpulang' => $item->tanggalpulang,
                'statuspasien' => $item->statuspasien,
                'norec_pa' => $item->norec_pa,
                'objecasuransipasienfk' => $item->objecasuransipasienfk,
                'pgid' => $item->pgid,
                'objectruanganlastfk' => $item->objectruanganlastfk,
                'nosep' => $item->nosep,
                'norec_br' => $item->norec_br,
                'nostruklastfk' => $item->nostruklastfk,
                'noreservasi' => $item->noreservasi,
                'kelasditanggung' => $item->kelasditanggung,
                'namakelas' => $item->namakelas,
                'tanggallahir' => $item->tanggallahir,
                'objeckelasfk' => $item->objeckelasfk,
                'deptid' => $item->deptid,
                'ppkrujukan' => $item->ppkrujukan,
                'istelemedicine' => $item->istelemedicine,
                'jaminankhusus' => $item->jaminankhusus,
                'noidentitas' => $item->noidentitas,
                'statusschedule' => $item->statusschedule,
                'isdiagnosis' => $item->isdiagnosis,
            ];
            $no++;
        }
        return response()->json([
            'success' =>true,
            'message' => 'tampilkan nomor tabel',
            'data' =>$data
        ]);
    }

}
