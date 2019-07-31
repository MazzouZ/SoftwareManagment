<?php

namespace App\Imports;

use App\Pointage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
//       dd(
//           $row["date_and_time"]
//            preg_replace('/([0-9]{2})-([0-9]{2})-([0-9]{2})/', '${3}-${2}-${1}', explode(' ',$row["date_and_time"])[0])
//         )

            if ($row["event_id"] == 7001 or $row["event_id"] == 131){

                $p=new Pointage();
                $p->user_id=  2;
                $p->jour     = explode(' ',$row["date_and_time"])[0];
                $p->time_in=explode(' ',$row["date_and_time"])[1];
                $p->save();
                }
            elseif ($row["event_id"] == 42 or $row["event_id"] == 7002 or $row["event_id"] == 15){
                $p=Pointage::all()->last();
                $p->time_out=explode(' ',$row["date_and_time"])[1];
                $p->save();
                $p->total=(DB::select('select TIMEDIFF(time_out,time_in) as total from table_pointage where id ='.$p->id)[0])->total;
                $p->save();
            }
  }
}
