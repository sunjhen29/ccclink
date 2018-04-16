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


class ExportController extends Controller
{
    public function export_payroll(Request $request){

        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Biometric";


        if($request->user_id == '' ){
            $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('operator_id','in_out','production_date');


            $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(time_log) as time_log,IF(in_out = 1, "0", "1") as in_out')
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',1)
                ->union($checkout)
                ->groupBy('operator_id','in_out','production_date')
                ->orderBy('production_date','asc')
                ->orderBy('operator_id','asc')
                ->orderBy('in_out','asc')
                ->get();

        }
        else{
            $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
                ->where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('production_date','operator_id','in_out');
            //->get();

            $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(time_log) as time_log,IF(in_out = 1, "0", "1") as in_out')
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

        $data = $biometrics;

        Excel::create('sample', function($excel) use($data) {
            $excel->sheet('Sheet1', function($sheet) use($data) {
                $sheet->fromArray($data,"'",'A1',false,false);
            });
        })->export('xls');





        return $biometrics;


    }
}
