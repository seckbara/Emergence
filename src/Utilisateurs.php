<?php
namespace Emergence;

use PDO;
use Doctrine\DBAL\DBALException;

class Utilisateurs extends DBManager
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $dbname = "emergence";
    protected $table = "utilisateurs";

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

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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

    public function SaveUsers($nom, $prenom, $email, $password)
    {
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'username' => $nom,
                'lastname' => $prenom,
                'email' => $email,
                'passw' => $password
            ));
        } catch (DBALException $e) {
            sprintf("Insert utilsateurs has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function VerifExistUser($prenom)
    {
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where lastname = ?', array($prenom))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le prenom id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function ConnectUser($email, $pass)
    {
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where email = ? and passw = ?', array($email, $pass))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le prenom id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }
}
