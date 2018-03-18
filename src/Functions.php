<?php
namespace Emergence;

use Carbon\Carbon;
use PDO;
use Exception;

class Functions extends DBManager
{
    protected $table_annee = "annee";

    /**
     * @return string
     */
    public function getTableAnnee(): string
    {
        return $this->table_annee;
    }

    /**
     * @param string $table_annee
     */
    public function setTableAnnee(string $table_annee)
    {
        $this->table_annee = $table_annee;
    }
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


    /**
     * @return array
     */
    public static function getAnnee()
    {
        try {
            return DBManager::connect()->executeQuery("select * from " .(new Functions())->getTableAnnee())->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function getYears($months, $years)
    {
        switch ($months) {
            case "12":
                return $years.'-'.$months.'-'.'31';
                break;
            case "11":
                return $years.'-'.$months.'-'.'30';
                break;
            case "10":
                return $years.'-'.$months.'-'.'31';
                break;
            case "9":
                return $years.'-'.'09'.'-'.'30';
                break;
            case "8":
                return $years.'-'.'08'.'-'.'31';
                break;
            case "7":
                return $years.'-'.'07'.'-'.'30';
                break;
            case "6":
                return $years.'-'.'06'.'-'.'31';
                break;
            case "5":
                return $years.'-'.'05'.'-'.'30';
                break;
            case "4":
                return $years.'-'.'04'.'-'.'31';
                break;
            case "3":
                return $years.'-'.'03'.'-'.'30';
                break;
            case "2":
                return $years.'-'.'02'.'-'.'28';
                break;
            case "1":
                return $years.'-'.'01'.'-'.'31';
                break;
        }
    }
}
