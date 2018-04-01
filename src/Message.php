<?php

namespace Emergence;

class Message extends DBManager
{
    private $id;
    private $table = "messages";
    private $message;
    private $expediteur;
    private $destinataire;
    private $date_envoie;
    private $sujet;

    /**
     * Message constructor.
     */
    public function __construct()
    {
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
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * @param mixed $expediteur
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;
    }

    /**
     * @return mixed
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * @param mixed $destinataire
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
    }

    /**
     * @return mixed
     */
    public function getDateEnvoie()
    {
        return $this->date_envoie;
    }

    /**
     * @param mixed $date_envoie
     */
    public function setDateEnvoie($date_envoie)
    {
        $this->date_envoie = $date_envoie;
    }

    /**
     * @return mixed
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @param mixed $sujet
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }

    /**
     * @return int
     */
    public function sendMessage()
    {
        try {
            return DBManager::connect()->insert($this->getTable(), array(
                'sujet' => $this->getSujet(),
                'expediteur' => $this->getExpediteur(),
                'destinataire' => $this->getDestinataire(),
                'message' => $this->getMessage(),
                'date_envoie' => $this->getDateEnvoie()
            ));
        } catch (DBALException $e) {
            sprintf("Insert utilsateurs has a PDO Error: %s, with stack trace: %s", $e->getMessage(), $e->getTraceAsString());
        }
    }
}
