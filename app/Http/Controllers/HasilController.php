<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Participant;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use App\Models\Trainer;
use Validator;

use Illuminate\Http\Request;

class HasilController extends Controller
{   

    public function index(){
      //return view('hasil');
    }
    public function indexTraining()
    {
      $products = DB::table('products')->paginate(15);
      return view('training', compact('products'));
    }

    public function detail($id)
    { 
    //callDataBase
      $products = Product::find($id);
     
     $pp = DB::table('product_participant')->where('product_id', $id)->join('products', 'product_participant.product_id', '=', 'products.id')
     ->join('participants','product_participant.participant_id', '=', 'participants.id')
     ->select('participants.*','products.*','product_participant.*')
     ->orderBY('participant_id', 'desc')
     ->paginate(15);
     //->get();
     //callDataProducts
      
     $trainer_rate = DB::table('trainer_ratings')->where('product_id', $id)
     ->join('products', 'trainer_ratings.product_id', '=', 'products.id')
     ->join('participants','trainer_ratings.participant_id', '=', 'participants.id')
     ->select('participants.*','products.*','trainer_ratings.*')
     ->orderBY('participant_id', 'desc')
     ->paginate(15);
      
      $trainer_data = DB::table('product_trainer')->where('product_id', $id)
      ->join('products', 'product_trainer.product_id', '=', 'products.id')
      ->join('trainers', 'product_trainer.trainer_id', '=', 'trainers.id')
      ->select('products.*','product_trainer.*','trainers.*',)
      ->orderBY('product_id', 'desc')
      ->paginate(15);
     
   

      

    

      //chart
      $data = DB::table('product_participant')->where('product_id', $id)
           ->select(
            DB::raw('sumber_informasi as sumber_informasi'),
            DB::raw('count(*) as number'))
           ->groupBy('sumber_informasi')
           ->get();
        $array[] = ['Sumber_informasi', 'Number'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->sumber_informasi, $value->number];
        }

        //menghitung Orang yang menilai
        $rating1Count = DB::table('product_participant')->where('product_id', $id)->count();
        //mengitung layanan sikap
        $ratelayanan = DB::table('product_participant')->where('product_id',$id)
              ->selectRaw('SUM(layanan_panitia_sikap)/COUNT(participant_id) AS avg_rating')->first()->avg_rating;
        //mengitung layanan sikap
        $ratekinerja = DB::table('product_participant')->where('product_id',$id)
              ->selectRaw('SUM(layanan_panitia_kinerja_kualitas)/COUNT(participant_id) AS avg_rating')->first()->avg_rating;
        //mengitung layanan sikap
        $ratemateri = DB::table('product_participant')->where('product_id',$id)
              ->selectRaw('SUM(materi)/COUNT(participant_id) AS avg_rating')->first()->avg_rating;
        //mengitung Rating Trainer
            foreach ($products->trainers as $trainer) {
                    $ratetrainer[] = DB::table('trainer_ratings')->where('product_id',$id)->where('trainer_id',$trainer->id)
                    ->selectRaw('SUM(penyampaian_rating)/COUNT(participant_id) AS avg_rating')->first()->avg_rating;
            }

        //dd($ratetrainer);
        //dd(number_format($ratetrainer, 1));

        

      return view('hasil', compact('pp','rating1Count','ratelayanan','ratekinerja','ratemateri','products','trainer_data','trainer_rate'),['ratetrainer'=>$ratetrainer])->with('sumber_informasi', json_encode($array));
    }

}
