<?php
namespace Emergence;

use PDO;
use Doctrine\DBAL\DBALException;

class Versement extends DBManager
{
    protected $dbname = "emergence";
    protected $table = "versements";
    protected $id;
    public $date_versement;
    public $type_paiement;
    public $montant;
    public $commentaire;
    protected $last_abonn_id;
    protected $abonnement_id;

    /**
     * @return mixed
     */
    public function getAbonnementId()
    {
        return $this->abonnement_id;
    }

    /**
     * @param mixed $abonnement_id
     */
    public function setAbonnementId($abonnement_id)
    {
        $this->abonnement_id = $abonnement_id;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @return mixed
     */
    public function getLastAbonnId()
    {
        return $this->last_abonn_id;
    }

    /**
     * @param mixed $last_abonn_id
     */
    public function setLastAbonnId($last_abonn_id)
    {
        $this->last_abonn_id = $last_abonn_id;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
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

    /**
     * @param $date_versement
     * @param $commentaire
     * @param $montant
     * @param $abonn_id
     * @return int
     */
    public function AjoutVersement($date_versement, $commentaire, $montant, $abonn_id)
    {
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

    /**
     * @return int
     */
    public function AjoutVersementTEST()
    {
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'date_versement' => $this->getDateVersement(),
                'commentaire' => $this->getCommentaire(),
                'montant' => $this->getMontant(),
                'abonnement_id' => $this->getAbonnementId()
            ));
        } catch (DBALException $e) {
            sprintf("Insert Versements has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    public function VersementById($id)
    {
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where abonnement_id = ?', array($id))->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le versement id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteVersement($id)
    {
        try {
            return  DBManager::connect()->delete($this->getTable(), array('abonnement_id' => $id));
        } catch (DBALException $e) {
            sprintf("Impossible de supprimer l'abonnement avec id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function deleteVersementByID($id)
    {
        try {
            return  DBManager::connect()->delete($this->getTable(), array('id' => $id));
        } catch (DBALException $e) {
            sprintf("Impossible de supprimer l'abonnement avec id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getVersement($id)
    {
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le versement id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @return int
     */
    public function updateVersementById()
    {
        try {
            return DBManager::connect()->update(
                $this->getTable(),
                [
                    'date_versement' => $this->getDateVersement(),
                    'montant' => $this->getMontant(),
                    'commentaire' => $this->getCommentaire()
                ],
                [
                    'id' => $this->getId()
                ]
            );
        } catch (DBALException $e) {
            sprintf("Impossible de modifier l'abonnement id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }


    public function AjoutVersementByAbonId()
    {
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'date_versement' => $this->getDateVersement(),
                'commentaire' => $this->getCommentaire(),
                'montant' => $this->getMontant(),
                'abonnement_id' => $this->getAbonnementId()
            ));
        } catch (DBALException $e) {
            sprintf("Insert Versements has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }
}
