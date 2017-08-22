<?php
use Doctrine\DBAL\DBALException;

class Adherents extends DBManager {

    protected $dbname = "adherents";
    protected $table = "adherent";

    public $nom;
    public $prenom;
    public $date_naissance;
    public $ville;
    public $sexe;
    public $tel;
    public $adresse;
    public $mail;
    public $certificat;
    public $situation;
    public $quartier;
    public $numer_secu;
    public $type_doc;
    public $tel_fixe;
    public $commentaire;

    /**
     * Adherent constructor.
     */
    public function __construct()
    {

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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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
    public function getNumerSecu()
    {
        return $this->numer_secu;
    }

    /**
     * @param mixed $numer_secu
     */
    public function setNumerSecu($numer_secu)
    {
        $this->numer_secu = $numer_secu;
    }

    /**
     * @return mixed
     */
    public function getTypeDoc()
    {
        return $this->type_doc;
    }

    /**
     * @param mixed $type_doc
     */
    public function setTypeDoc($type_doc)
    {
        $this->type_doc = $type_doc;
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

    public function AjoutAdherents($nom, $date_naissance, $prenom, $ville, $sexe, $tel, $adresse, $mail, $certificat,$situation,
                                   $quartier,$type_doc, $tel_fixe, $commentaire){
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'nom_adherent' => '$nom',
                'date_naissance' => '$date_naissance',
                'prenom_adherent' => '$prenom',
                'ville' => '$ville',
                'sexe' => '$sexe',
                'tel' => '$tel',
                'adresse' => '$adresse',
                'email' => '$mail',
                'certificat' => '$certificat',
                'situation' => '$situation',
                'quartier' => '$quartier',
                'num_secu' => '$nom',
                'document' => '$type_doc',
                'tel_fixe' => '$tel_fixe',
                'commentaire' => '$commentaire'
            ));
        } catch (DBALException $e) {
            sprintf("Update tarifs has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
            }
    }


}