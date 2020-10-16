<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Product;
use DB;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    public function index()
    {

    	$training_titles = Product::all();
    	$participants = Participant::all();
    	return view('question.participant',compact('training_titles','participants'));
    }



    public function create(Request $request)
    {

    	$request->validate([
                'training_title' => 'required',
                'participant_name' => 'required',
                'sumber_informasi' => 'required',
        				'merekomendasikan'=> 'required',
        				'request_pelatihan'=> 'required',
        				'layanan_panitia_sikap'=> 'required',
        				'layanan_panitia_sikap_komentar'=> 'required',
        				'layanan_panitia_kinerja_kualitas'=> 'required',
        				'layanan_panitia_kinerja_kualitas_komentar'=> 'required',
        				'materi'=> 'required',
        				'materi_komentar'=> 'required',
        				'kesan'=> 'required',
            ]);
            if($request->sumber_informasi == "lainnya")
            {
                $request->sumber_informasi = $request->sumber_informasi_lainnya;
            }

			     $id = DB::table('product_participant')->where([
            ['product_id', $request->training_title],
            ['participant_id', $request->participant_name],
            ])->update([
              'sumber_informasi' => $request->sumber_informasi,
                'merekomendasikan'=> $request->merekomendasikan,
                'request_pelatihan'=> $request->request_pelatihan,
                'layanan_panitia_sikap'=> $request->layanan_panitia_sikap,
                'layanan_panitia_sikap_komentar'=> $request->layanan_panitia_sikap_komentar,
                'layanan_panitia_kinerja_kualitas'=> $request->layanan_panitia_kinerja_kualitas,
                'layanan_panitia_kinerja_kualitas_komentar'=> $request->layanan_panitia_kinerja_kualitas_komentar,
                'materi'=> $request->materi,
                'materi_komentar'=> $request->materi_komentar,
                'kesan'=> $request->kesan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);



            return redirect('/');
    }
}
