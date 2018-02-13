<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\DailyTimeRecord;


class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dtr(){
        $production_dates = DailyTimeRecord::groupBy('production_date')->orderBy('production_date')->get();
        return view('admin.imports.dtr',compact('production_dates'));
    }

    public function importDtr(Request $request){
        $file = $request->file('attlog');
        $date = Carbon::createFromFormat('m/d/Y',$request->date_from);

        $filename = $file->getClientOriginalName();
        $storage = base_path().'/storage/app/dtr';

        $file->move($storage,$filename);

        if(($handle = fopen($storage.'/'.$filename,'r')) !== false  ){
            while(($data= fgetcsv($handle,100000,"\t")) !== false){
                $production_date = Carbon::createFromFormat('Y-m-d H:i:s',$data[1]);

                if($production_date->toDateString() == $date->toDateString()){
                    DailyTimeRecord::firstOrCreate(['operator_id' => $data[0],'time_log'=>$data[1],'device_id'=>$data[2],'in_out'=>$data[3],'production_date'=>$production_date->toDateString()]);
                }

            }
        }

        return redirect('/imports/dtr');

    }
}
