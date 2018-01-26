<?php
namespace Emergence;

use Carbon\Carbon;

class Functions
{
    /**
     * @param $annee
     * @param $mois
     * @param $jr
     * @param $duree
     * @return string
     */
    public function DureeAbonnement($annee, $mois, $jr, $duree)
    {
        return Carbon::create($annee, $mois, $jr)->addMonths($duree)->toDateString();
    }

    /**
     * @param $date
     * @return false|string
     */
    public function Date_Format_Fr($date)
    {
        return date_format(date_create($date), 'd-m-Y');
    }

    /**
     * @param $array
     */
    public static function getNomberActivite($array)
    {
        $somme = 0;
        foreach ($array as $val) {
            $somme += $val->nb;
        }
        return $somme;
    }
}
