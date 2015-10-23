<?php


/**
 * Description of champion
 *
 * @author fvidalfa
 */
class champion {
    private $id;
    private $name;
    /**
     * 
     * @param int $id, l'identifiant du message qui permet de créer l'objet Message
     */
    public function __construct($id) {
        $this->id = $id;
        //Requête pour récupérer les informations en fonction de l'id utilisateur
        $query = "SELECT nom FROM champion WHERE champ_ID = ?;";
        //Résultats
        $results = Connexion::table($query, array($this->id));
        $this->name = $results[0]['nom'];
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
    public function getName(){
        return $this->name;
    }
    
    /**
     * 
     * @return varchar url
     */
    public function getLinkChampionSquare(){
        $url = 'http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/'.$this->name.'.png';
        return $url;
    }
}
