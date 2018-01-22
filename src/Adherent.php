<?php
use Doctrine\DBAL\DBALException;

class Adherent extends DBManager {

    protected $dbname = "adherents";
    protected $table = "adherent";
    protected $table_Situation = "situations";

    public $nom_adherent;
    public $prenom_adherent;
    public $date_naissance;
    public $ville;
    public $sexe;
    public $tel;
    public $adresse;
    public $email;
    public $certificat;
    public $situation;
    public $quartier;
    public $num_secu;
    public $document;
    public $tel_fixe;
    public $commentaire;


    /**
     * Adherent constructor.
     */
    public function __construct()
    {

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
    public function getNomAdherent()
    {
        return $this->nom_adherent;
    }

    /**
     * @param mixed $nom_adherent
     */
    public function setNomAdherent($nom_adherent)
    {
        $this->nom_adherent = $nom_adherent;
    }

    /**
     * @return mixed
     */
    public function getPrenomAdherent()
    {
        return $this->prenom_adherent;
    }

    /**
     * @param mixed $prenom_adherent
     */
    public function setPrenomAdherent($prenom_adherent)
    {
        $this->prenom_adherent = $prenom_adherent;
    }

    /**
     * @return mixed
     */
    public function getNumSecu()
    {
        return $this->num_secu;
    }

    /**
     * @param mixed $num_secu
     */
    public function setNumSecu($num_secu)
    {
        $this->num_secu = $num_secu;
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }


    /**
     * @return string
     */
    public function getTableSituation()
    {
        return $this->table_Situation;
    }

    /**
     * @param string $table_Situation
     */
    public function setTableSituation($table_Situation)
    {
        $this->table_Situation = $table_Situation;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
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
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * @param mixed $certificat
     */
    public function setCertificat($certificat)
    {
        $this->certificat = $certificat;
    }

    /**
     * @return mixed
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * @param mixed $situation
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;
    }

    /**
     * @return mixed
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * @param mixed $quartier
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;
    }

    /**
     * @return mixed
     */
    public function getTelFixe()
    {
        return $this->tel_fixe;
    }

    /**
     * @param mixed $tel_fixe
     */
    public function setTelFixe($tel_fixe)
    {
        $this->tel_fixe = $tel_fixe;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @param $nom
     * @param $date_naissance
     * @param $prenom
     * @param $ville
     * @param $sexe
     * @param $tel
     * @param $adresse
     * @param $mail
     * @param $certificat
     * @param $situation
     * @param $quartier
     * @param $numer_secu
     * @param $type_doc
     * @param $tel_fixe
     * @param $commentaire
     * @return int
     */
    public function AjoutAdherents(){
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'nom_adherent' => $this->getNomAdherent(),
                'prenom_adherent' => $this->getPrenomAdherent(),
                'date_naissance' => $this->getDateNaissance(),
                'ville' => $this->getVille(),
                'sexe' => $this->getSexe(),
                'tel' => $this->getTel(),
                'adresse' => $this->getAdresse(),
                'email' => $this->getEmail(),
                'certificat' => $this->getCertificat(),
                'situation' => $this->getSituation(),
                'quartier' => $this->getQuartier(),
                'num_secu' => $this->getNumSecu(),
                'document' => $this->getDocument(),
                'tel_fixe' => $this->getTelFixe(),
                'commentaire' => $this->getCommentaire()
            ));
        } catch (DBALException $e) {
            sprintf("Insert adherent has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
            }
    }

    /**
     * @return mixed
     */
    public function LastIdAdherent(){
        try {
            return DBManager::connect()->executeQuery('select max(id) as id from '.$this->getTable())->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le dernier id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function AdherentById($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTable().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le dernier id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function Alladherent(){
        try {
            return DBManager::connect()->fetchAll('select * from '.$this->getTable());
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer le dernier id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function AllSituation(){
        try {
            return DBManager::connect()->fetchAll('select * from '.$this->getTableSituation().'');
        } catch (DBALException $e) {
            sprintf("Impossible des situation id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function SituationById($id){
        try {
            return DBManager::connect()->executeQuery('select * from '.$this->getTableSituation().' where id = ?', array($id))->fetch(PDO::FETCH_OBJ);
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer la situation id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    public function updateAdherent($nom, $prenom, $date_naissance, $tel, $adresse, $mail, $type_doc, $commentaire,$id){
        try {
             DBManager::connect()->update($this->getTable(), [
                'nom_adherent' => $nom,
                'prenom_adherent' => $prenom,
                'date_naissance' => $date_naissance,
                'tel' => $tel,
                'adresse' => $adresse,
                'email' => $mail,
                'document' => $type_doc,
                'commentaire' => $commentaire
            ],
                [
                    'id' => $id
                ]
            );
        } catch (DBALException $e) {
            sprintf("Impossible de recuperer la situation id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * @param $id
     */
    public function deleteAdherent($id){
        try {
            return  DBManager::connect()->delete($this->getTable(), array('id' => $id));
        } catch (DBALException $e) {
            sprintf("Impossible de supprimer l'adherents avec id: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }

}
