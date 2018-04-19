<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\DailyTimeRecord;
use App\TimeInTimeOut;
use App\Http\Requests\TimeLogRequest;
use Illuminate\Support\Facades\DB;

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

    public function Timelog(){
        $page_title = "Upload Time Logs";


        $production_dates = DB::table('daily_time_records')
            ->select('created_at',DB::raw('DATE_FORMAT(production_date,"%m/%d/%Y") as production_date'),DB::raw('count(*) as row_count'))
            ->groupBy('production_date')
            ->get();
        return view('admin.imports.timelog',compact('production_dates','page_title'));
    }

    public function importTimelog(TimeLogRequest $request){
        $file = $request->file('attlog');
        $date = Carbon::createFromFormat('m/d/Y',$request->date_from);

        $filename = $file->getClientOriginalName();
        $storage = base_path().'/storage/app/timelog';

        $file->move($storage,$filename);

        if(($handle = fopen($storage.'/'.$filename,'r')) !== false  ){
            while(($data= fgetcsv($handle,100000,"\t")) !== false){

                $production_date = Carbon::createFromFormat('m/d/Y H:i:s',substr($data[0],21,19));



                if($production_date->toDateString() == $date->toDateString()){
                    DailyTimeRecord::firstOrCreate(['operator_id' => substr($data[0],0,3),'time_log'=>$production_date,'device_id'=>1,'in_out'=>substr($data[0],41,1),'production_date'=>$production_date->toDateString()]);
                }
            }
        }

        return redirect('/imports/timelog');

    }

    public function TimeInOut(){
        $page_title = "Imports";

        $production_dates = TimeInTimeOut::groupBy('work_date')->orderBy('work_date')->get();

        return view('admin.imports.timeinout',compact('production_dates','page_title'));
    }

    public function importTimeInOut(Request $request){


        $file = $request->file('timeinout');
        $date = Carbon::createFromFormat('m/d/Y',$request->production_date);

        $filename = $file->getClientOriginalName();
        $storage = base_path().'/storage/app/timeinout';

        $file->move($storage,$filename);

        $row = 0;

        if(($handle = fopen($storage.'/'.$filename,'r')) !== false  ){
            while(($data= fgetcsv($handle,100000,",")) !== false){
                    $row++;
                if($row==2){
                    $start_date = Carbon::createFromFormat('m/d/Y',$data[1])->format('Y-m-d');
                }

                if($row > 5 && $data[0] != ""){
                    $timeinout = new TimeInTimeOut();
                    $timeinout->employee_no = $data[0];
                    $timeinout->employee_name = $data[1];
                    $timeinout->work_date = $start_date;
                    $timeinout->day = $data[3];
                    $timeinout->in1 = $data[4] ? Carbon::createFromFormat('g:i A',$data[4]) : null;
                    $timeinout->out1 = $data[5] ? Carbon::createFromFormat('g:i A',$data[5]) : null;
                    $timeinout->in2 = $data[6] ? Carbon::createFromFormat('g:i A',$data[6]) : null;
                    $timeinout->out2 = $data[7] ? Carbon::createFromFormat('g:i A',$data[7]) : null;
                    $timeinout->hours_work = $data[9];
                    if($data[4]=='' && $data[5] == '' && $data[6] == '' && $data[7] == ''){
                        $timeinout->remarks = 'Absent';
                    }
                    $timeinout->save();
                }
            }
        }

        return "success";
    }


}
