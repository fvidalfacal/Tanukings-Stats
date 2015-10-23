
<?php

require_once 'connexion.php';

class game {

    var $game_ID;
    var $sum_ID;
    var $champ_ID;
    var $victory;
    var $type;
    var $kill;
    var $death;
    var $assists;
    var $time;
    var $cs;
    var $pinkBought;
    var $wardPlaced;

    function __construct($id) {
        $this->sum_ID = $id;
        $this->values($this->recupDatas());
    }

    function recupDatas() {
        // récupération des données globales de la game dans data 
        $api_key = 'apikey';

        $url = 'https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/' . $this->sum_ID . '/recent?api_key=' . $api_key;
        $content = file_get_contents($url);
        $datas = json_decode($content, true);
        return $datas;
    }

    function values($datas) {
        // récupération des données utiles a stocké dans la base de données
        // isset de $data ?
        foreach ($datas['games'] as $key => $value) {
            if (( $value['subType'] == 'RANKED_SOLO_5x5' ) || ( $value['subType'] == 'RANKED_TEAM_5x5' ) || ( $value['subType'] == 'RANKED_PREMADE_5x5' )) {
                $this->game_ID = $value['gameId'];
                $this->champ_ID = $value['championId'];
                $this->victory = $value['stats']['win'];
                $this->type = $value['subType'];
                if (!isset($value['stats']['championsKilled'])) {
                    $this->kill = 0;
                } else {
                    $this->kill = $value['stats']['championsKilled'];
                }
                if (!isset($value['stats']['numDeaths'])) {
                    $this->death = 0;
                } else {
                    $this->death = $value['stats']['numDeaths'];
                }
                if (!isset($value['stats']['assists'])) {
                    $this->assists = 0;
                } else {
                    $this->assists = $value['stats']['assists'];
                }
                if (!isset($value['stats']['timePlayed'])) {
                    $this->time = 0;
                } else {
                    $this->time = $value['stats']['timePlayed'];
                }
                if (!isset($value['stats']['minionsKilled'])) {
                    $this->cs = 0;
                } else {
                    $this->cs = $value['stats']['minionsKilled'];
                }
                if (!isset($value['stats']['sightWardsBought'])) {
                    $this->pinkBought = 0;
                } else {
                    $this->pinkBought = $value['stats']['sightWardsBought'];
                }
                if (!isset($value['stats']['wardPlaced'])) {
                    $this->wardPlaced = 0;
                } else {
                    $this->wardPlaced = $value['stats']['wardPlaced'];
                }

                // ajout de la game dans la bd ici
                $this->addGame();
            }
        }
    }

    function addGame() {
        // ajout de la game dans la base de données
        $stmt = ' INSERT INTO `riot`.`game` (`game_ID`, `sum_ID`, `champ_ID`, `type`, `victory`, `kill`, `death`, `assist`, `time`, `cs`, `pinkBought`, `wardPlaced`) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ';
        date_default_timezone_set('UTC');
        $timeVal = date('H:i:s', $this->time);
        $val = array($this->game_ID, $this->sum_ID, $this->champ_ID, $this->type, $this->victory, $this->kill,
            $this->death, $this->assists, $timeVal, $this->cs, $this->pinkBought, $this->wardPlaced);
        $res = Connexion::query($stmt, $val);
        return $res;
    }

    static function getInfo($idjoueur, $typeGame) {
        // on récup dans la base de données
        // param accepté `game_ID`, `sum_ID`, `champ_ID`, `type`, `victory`, `kill`, `death`, `assist`, `time`, `cs`, `pinkBought`, `wardPlaced` + nom du champion grace a son id(game.champ_ID)
        $stmt = ' SELECT `type`, `victory`, `kill`, `death`, `assist`, `time`, `cs`, `pinkBought`, `wardPlaced` , `nom` FROM `game` , `champion` 
			WHERE `game`.`champ_ID` = `champion`.`champ_ID` AND `type` = ? AND `sum_ID` = ? ';
        $res = Connexion::table($stmt, array($idjoueur, $typeGame));
        return $res;
    }

}
