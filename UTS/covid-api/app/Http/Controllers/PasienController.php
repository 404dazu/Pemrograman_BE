<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function index(){
        $patients = Pasien::all();
        $data=[
            'message' => 'GET ALL PASIEN',
            'data'=> $patients
        ];

        return response()->json($data,200);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama'=>'required|string|min:2|max:100',
            'phone'=>'required|integer|min:8|max:13',
            'address'=>'required|string|min:2|max:1000',
            'status'=>'required|string|min:2|max:3',
            'in_date_at'=>'required|date',
            'out_date_at'=>'nullable|date',
        ],
    [
        'nama.required' => 'harus di isi!',
        'nama.required'=>'harus di isi dengan benar!',

        'phone.required' => 'harus di isi angka!',
        
        'address.required' => 'Harus di isi!',
        
        'status.required' => 'Harus di isi!',
        
        'in_date_at'=>'harus di isi!',
        'in_date_at'=>'Masukkan tanggal dengan benar!'

    ]);

        $patient=Pasien::create($validated);
        $data=[
            'message'=>'Pasien has been created succesfully',
            'data'=>$patient,
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $patient=Pasien::find($id);
        if($patient){
            $data=[
                'message'=>'get detail Pasien',
                'data'=>$patient,
            ];

            return response()->json($data, 200);
        }
        else{
            $data=[
                'message'=>'Pasien is not found',
                'data'=>$patient,
            ];
            
            return response()->json($data, 404);
        }
    }

    public function update(Request $request,$id){
        $patient=Pasien::find($id);
        if($patient){
            $input=[
                'nama'=>$request->nama ?? $patient->nama,
                'phone'=>$request->phone ?? $patient->phone,
                'address'=>$request->address ?? $patient->address,
                'status'=>$request->status ?? $patient->status,
                'out_date_at'=>$request->out_date_at ?? $patient->out_date_at,
            ];
            $patient->update($input);

            $data = [
                'message' => 'data has been update succesfully',
                'data'=>$patient,
            ];
            return response()->json($data,200);
        }else{
            $data=[
                'message'=>'data is not found!',
                'data'=>$patient,
            ];
            return response()->json($data,404);
        }
    }

    public function destroy($id){
        $patient = Pasien::find($id);
        if($patient){
            $patient->delete();

            $data=[
                'message' => 'data has been deleted succesfully!',
                'data'=>$patient,
            ];

            return response()->json($data, 200);
        }else{
            $data=[
                'message'=>'data is not found!',
                'data'=>$patient,
            ];

            return response()->json($data, 404);
        }
    }

    public function search($name){
        $patient = Pasien::where('nama_pasien', 'Like', '%' . $name . '%')->get();
        if($patient){
        $data = [
            'message' => 'data ditemukan: ',
            'data'=>$patient
        ];

        return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => ' data is not found'
            ];

            return response()->json($data, 404);
        }
        }

    public function getStatus($status)
    {
        $patient = Pasien::where('statusPatient_id', '=', 1)->get();
        $message = '';
        $statusCode = 0;


        if ($status == 'positive') {
            $patient = $patient;
            $message = 'Get positive resource';
            $statusCode = 200;
        } else if ($status == 'recovered') {
            $patient = Pasien::where('statusPatient_id', '=', 2)->get();
            $message = 'Get recovered resource';
            $statusCode = 200;
        } else if ($status == 'dead') {
            $patient = Pasien::where('statusPatient_id', '=', 3)->get();
            $message = 'Get dead resource';
            $statusCode = 200;
        } else {
            $patient = [];
            $message = "Resource not found";
            $statusCode = 404;
        }

        $response = [
            "message" => $message,
            "status code" => $statusCode,
            "total" => count($patient),
            "data" => $patient
        ];

        return response()->json($response, $statusCode);
    }
}
