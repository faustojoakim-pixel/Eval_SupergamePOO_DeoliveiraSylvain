<?php

Class ModelPlayer extends Model  {
  //Attribut
    private int $idplayer;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idteam;
//getters et setters
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getIdplayer(): int {
        return $this->idplayer;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setIdplayer(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return string
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return int
     */
    public function getScore(): int {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param int $score
     *
     * @return self
     */
    public function setScore(int $score): self {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of team
     *
     * @return string
     */
    public function getTeam(): string {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @param string $team
     *
     * @return self
     */
    public function setTeam(string $team): self {
        $this->team = $team;
        return $this;
    }

    /**
     * Get the value of idteam
     *
     * @return int
     */
    public function getIdteam(): int {
        return $this->idteam;
    }

    /**
     * Set the value of idteam
     *
     * @param int $idteam
     *
     * @return self
     */
    public function setIdteam(int $idteam): self {
        $this->idteam = $idteam;
        return $this;
    }

    public function FindALL(){
        try{
            $request = $this->getPdo()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM Player AS p INNER JOIN Team AS t ON p.id_team = t.id_team;');
            //3) Envoyer la requête à la BDD
            $request->execute();

            //4) Récupérer la réponse de la BDD
            // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
     //Fonction findByPseudo
     public function findbyPseudo(string $pseudo){
        try{
            $request=$this->getPDO()->prepare('SELECT p.id_player, p.pseudo, p.score, p.id_team
             FROM Player AS p
             WHERE p.pseudo = :pseudo');
             $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                $request->execute();
                return $request->fetch(PDO::FETCH_ASSOC);

                }catch(EXCEPTION $error){
            die($error->getMessage());

        }
     }

     //fonction add
     public function add(string $pseudo, int $score, int $idteam ){
        try{
            $request=$this->getPDo()->prepare('INSERT INTO pseudo, score,id_team  )VALUES(:pseudo,:score,:idteam)');

            $request->bindParam(':pseudo',$pseudo, PDO::PARAM_STR );
            $request->bindParam(':score',$score, PDO::PARAM_INT );
            $request->bindParam(':idteam',$idteam, PDO::PARAM_INT );

            $request->execute();

            return $this->getPdo()->lastInsertId();

             } catch (PDOException $error) {
        die($error->getMessage());

        }
     }

     //fonction delete
   
public function delete(int $id)
{
    try {
        
        $request = $this->getPdo()->prepare(
            'DELETE FROM Player WHERE id_player = :id_player'
        );

        $request->bindParam(':id_player', $idplayer, PDO::PARAM_INT);

      
        $request->execute();

       
        return $request->rowCount();

    } catch (PDOException $error) {
        die($error->getMessage());
    }
}

// Fonction update : modifie un joueur grâce à son id
public function update(int $idplayer, string $pseudo, int $score, int $idteam)
{
    try {
        
        $request = $this->getPdo()->prepare(
            'UPDATE Player
             SET pseudo = :pseudo, score = :score, id_team = :id_team
             WHERE id = :id'
        );

        // 2) Associer les valeurs aux paramètres
        $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $request->bindParam(':score', $score, PDO::PARAM_INT);
        $request->bindParam(':id_team', $idteam, PDO::PARAM_INT);
        $request->bindParam(':id_player', $idplayer, PDO::PARAM_INT);

        
        $request->execute();

       
        return $request->rowCount();

    } catch (PDOException $error) {
        die($error->getMessage());
    }
}


}
        
    





