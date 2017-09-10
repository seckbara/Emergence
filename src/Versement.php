<?php

class Versement extends DBManager{

    protected $dbname = "emergence";
    protected $table = "versements";
    protected $id;
    protected $date_versement;
    protected $type_paiement;
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
    public function getDateVersement()
    {
        return $this->date_versement;
    }

    /**
     * @param mixed $date_versement
     */
    public function setDateVersement($date_versement)
    {
        $this->date_versement = $date_versement;
    }

    /**
     * @return mixed
     */
    public function getTypePaiement()
    {
        return $this->type_paiement;
    }

    /**
     * @param mixed $type_paiement
     */
    public function setTypePaiement($type_paiement)
    {
        $this->type_paiement = $type_paiement;
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

    public function AjoutVersement($date_versement,$commentaire,$montant,$abonn_id){
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'date_versement' => $date_versement,
                'commentaire' => $commentaire,
                'montant' => $montant,
                'abonnement_id' => $abonn_id
            ));
        } catch (DBALException $e) {
            sprintf("Insert Versements has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }


}