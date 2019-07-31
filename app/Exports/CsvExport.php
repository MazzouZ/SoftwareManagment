<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsvExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $requete= DB::select('SELECT Substr(date_debut,1,7) as mois,users.name,users.gross_salary,users.net_salary,SUM(nbr_jour) as somme_conge_mois ,group_concat(conges.cause separator \', \') as cause FROM users, conges WHERE conges.user_id=users.id GROUP BY mois,user_id')
            ;


//        $users=User::all();
        return collect($requete);
    }
    public function headings(): array
    {
        return [
            'Mois',
            'Nom',
            'Salaire',
            'Salaire Net',
            'Conge (J)',
            'Cause',
            'Prime',


        ];
    }
}
