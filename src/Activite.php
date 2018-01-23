<?php

class Activite extends DBManager{

    protected $id;
    protected $nom;
    protected $actif;
    protected $dbname = "emergence";
    protected $table = "activites";
    protected $table_tye_abonn = "type_abonnement";
    protected $table_type_paiement = "type_de_paiements";

    /**
     * @return string
     */
    public function getTableTypePaiement()
    {
        return $this->table_type_paiement;
    }

    /**
     * @param string $table_type_paiement
     */
    public function setTableTypePaiement($table_type_paiement)
    {
        $this->table_type_paiement = $table_type_paiement;
    }

    /**
     * @return string
     */
    public function getTableTyeAbonn()
    {
        return $this->table_tye_abonn;
    }

    /**
     * @param string $table_tye_abonn
     */
    public function setTableTyeAbonn($table_tye_abonn)
    {
        $this->table_tye_abonn = $table_tye_abonn;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    public function AllActivite(){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable())->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer les données da la table activité id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function AllTypeabonnement(){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTableTyeAbonn())->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer les données da la table activité id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function AllTypePaiement(){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTableTypePaiement())->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer les données da la table activité id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function countActvite(){
        try {
            return DBManager::connect()->executeQuery('select count(id_activite) as nombre_activite, activites.nom_activite from abonnements, activites WHERE abonnements.id_activite = activites.id GROUP BY id_activite')->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer les données da la table activité id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }
}
