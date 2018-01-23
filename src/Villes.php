<?php
namespace Emergence;
use Emergence\DBManager;
use PDO;
class Villes  extends DBManager
{
    protected $dbname = "emergence";
    protected $table = "villes";

    public $id;
    public $nom;

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

    public function AllVilles(){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable())->fetchAll(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le dernier id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }    }

}