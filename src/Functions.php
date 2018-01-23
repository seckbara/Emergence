<?php
namespace Emergence;
use Carbon\Carbon;
class Functions{

    public function DureeAbonnement($annee,$mois, $jr, $duree){
        return Carbon::create($annee, $mois, $jr)->addMonths($duree)->toDateString();
    }

    public  function Date_Format_Fr($date){
        return date_format(date_create($date), 'd-m-Y');
    }
}