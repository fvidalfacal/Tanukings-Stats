<?php
require_once 'connexion.php';
class summoner {
    private $id;
    private $name;
    private $server;
    private $rank;
    /**
     * 
     * @param int $id, l'identifiant du message qui permet de créer l'objet Message
     */
    public function __construct($name) {
        $this->name = $name;
        //Requête pour récupérer les informations en fonction de l'id utilisateur
        $query = "SELECT sum_ID, sum_Server, sum_Rank FROM summoner WHERE sum_Name = ?;";
        //Résultats
        $results = Connexion::table($query, array($this->name));
        $this->id = $results[0]['sum_ID'];
        $this->server = $results[0]['sum_Server'];
        $this->rank = $results[0]['sum_Rank'];
    }
    /**
     * 
     * @return int id
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * 
     * @return varchar server
     */
    public function getServer(){
        return $this->server;
    }
    
    /**
     * 
     * @return varchar rank
     */
    public function getRank(){
        //Traitement pour l'affichage propre du rank?
        return $this->rank;
    }
    
}    