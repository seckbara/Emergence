<?php

class Abonnement extends DBManager{

    protected $dbname = "emergence";
    protected $table = "abonnements";
    protected $tablepaiement = "type_de_paiements";
    protected $tableactivite = "activites";
    protected $tabletypeabonnement = "type_abonnement";

    /**
     * @return string
     */
    public function getTabletypeabonnement()
    {
        return $this->tabletypeabonnement;
    }

    /**
     * @param string $tabletypeabonnement
     */
    public function setTabletypeabonnement($tabletypeabonnement)
    {
        $this->tabletypeabonnement = $tabletypeabonnement;
    }

    /**
     * @return string
     */
    public function getTableactivite()
    {
        return $this->tableactivite;
    }

    /**
     * @param string $tableactivite
     */
    public function setTableactivite($tableactivite)
    {
        $this->tableactivite = $tableactivite;
    }

    protected $id;
    protected  $date_certificat;
    protected $type_abonnement;
    protected $date_abonnement;
    protected $duree_abonnement;

    /**
     * @return string
     */
    public function getTablepaiement()
    {
        return $this->tablepaiement;
    }

    /**
     * @param string $tablepaiement
     */
    public function setTablepaiement($tablepaiement)
    {
        $this->tablepaiement = $tablepaiement;
    }
    protected $montant;

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateCertificat()
    {
        return $this->date_certificat;
    }

    /**
     * @param mixed $date_certificat
     */
    public function setDateCertificat($date_certificat)
    {
        $this->date_certificat = $date_certificat;
    }

    /**
     * @return mixed
     */
    public function getTypeAbonnement()
    {
        return $this->type_abonnement;
    }

    /**
     * @param mixed $type_abonnement
     */
    public function setTypeAbonnement($type_abonnement)
    {
        $this->type_abonnement = $type_abonnement;
    }

    /**
     * @return mixed
     */
    public function getDateAbonnement()
    {
        return $this->date_abonnement;
    }

    /**
     * @param mixed $date_abonnement
     */
    public function setDateAbonnement($date_abonnement)
    {
        $this->date_abonnement = $date_abonnement;
    }

    /**
     * @return mixed
     */
    public function getDureeAbonnement()
    {
        return $this->duree_abonnement;
    }

    /**
     * @param mixed $duree_abonnement
     */
    public function setDureeAbonnement($duree_abonnement)
    {
        $this->duree_abonnement = $duree_abonnement;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }


    public function AjoutAbonnement($date_certificat,$type_abonn,$date_abonn,$duree_abonn,$montant,$id_adherent,$id_activite,$type_paie){
        try {
            $query =  DBManager::connect()->insert($this->getTable(), array(
                'date_certificat' => $date_certificat,
                'type_abonnement' => $type_abonn,
                'date_abonnement' => $date_abonn,
                'duree_abonnement' => $duree_abonn,
                'montant' => $montant,
                'id_adherent' => $id_adherent,
                'id_activite' => $id_activite,
                'type_paiement' => $type_paie
            ));

            return $query;

        } catch (DBALException $e) {
            sprintf("Insert abonnement has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
            echo "Insert abonnement has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString();
        }
    }

    /**
     * @return mixed
     */
    public function LastIdAbonnement(){
        try {
            return DBManager::connect()->executeQuery('select max(id) as id from '.$this->getTable().'')->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le dernier id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @return mixed
     */
    public function AllabonnementByAdherent(){
        try {
            return DBManager::connect()->executeQuery('select * from abonnements, adherent WHERE abonnements.id_adherent = adherent.id ORDER BY adherent.id ASC ')->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer la liste des abonnements: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    public function AbonnementById($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer l'abonnement id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function TypePaiment($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTablepaiement().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le type de paiement %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function TypeActivite($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTableactivite().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le type d'activite %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function TypeAbonn($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTabletypeabonnement().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le type d'abonnement %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     */
    public function deleteAbonnement($id){
        try {
            return  DBManager::connect()->delete($this->getTable(), array('id' => $id));
        } catch (DBALException $e) {
            sprintf("Impossible de supprimer l'abonnement avec id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function AbonnementByIdAdhe($id){
        try {
            return DBManager::connect()->executeQuery('select id from '.$this->getTable().' where id_adherent = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer l'abonnement id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }
}