<?php

namespace App\Http\Controllers;

use App\TimeInTimeOut;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDO;
use App\DailyTimeRecord;
use Excel;
use App\User;


class ExportController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function export_payroll(Request $request){

        $date_from = str_to_carbon($request->date_from,'m/d/Y');
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';
        $filename = $date_from->format('Y.m.d')." - ".$date_to->format('Y.m.d');


        if($request->user_id == '' ){
            if($request->department == ''){
                $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                    ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                    ->where('in_out',2)
                    ->groupBy('operator_id','in_out','production_date');
                $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(min(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                    ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                    ->where('in_out',1)
                    ->union($checkout)
                    ->groupBy('operator_id','in_out','production_date')
                    ->orderBy('production_date','asc')
                    ->orderBy('operator_id','asc')
                    ->orderBy('in_out','asc')
                    ->get();
            } else {

                $operator_ids = User::select('employee_no')->where('department',$request->department)->get()->toArray();
                $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                    ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                    ->where('in_out',2)
                    ->wherein('operator_id',$operator_ids)
                    ->groupBy('operator_id','in_out','production_date');
                $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(min(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                    ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                    ->where('in_out',1)
                    ->wherein('operator_id',$operator_ids)
                    ->union($checkout)
                    ->groupBy('operator_id','in_out','production_date')
                    ->orderBy('production_date','asc')
                    ->orderBy('operator_id','asc')
                    ->orderBy('in_out','asc')
                    ->get();
            }
        }
        else{
            $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                ->where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('production_date','operator_id','in_out');
           $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%m/%d/%Y") as production_date,TIME(min(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                ->where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',1)
                ->union($checkout)
                ->groupBy('production_date','operator_id','in_out')
                ->orderBy('production_date','asc')
                ->orderBy('operator_id','asc')
                ->orderBy('in_out','asc')
                ->get();
        }


        DB::connection()->setFetchMode(PDO::FETCH_NUM);

        Excel::create($filename, function($excel) use($biometrics) {
            $excel->sheet('Sheet1', function($sheet) use($biometrics) {
                $sheet->fromArray($biometrics,"'",'A1',false,false);
            });
        })->export('xls');

        return $biometrics;

    }
}
