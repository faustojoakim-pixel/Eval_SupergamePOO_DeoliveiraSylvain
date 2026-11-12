<?php 

Class ViewHome  {
  
       // Données fournies par le controller
    private string $message = '';
    private array $players = [];

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function setPlayers(array $players): void
    {
        $this->players = $players;
    }
    
    //Debut de la fonction displayheader
   public function displayHeader() {
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supergame</title>
</head>
<body>
<header>
  <h1>Supergame</h1>
  </header>
    ';
    }

    //Footer fin de la page html
    public function displayfooter() {
        echo '
        <footer>
        <p> Supergame - evaluation POO </p>
        </footer>
        </body>
        </html>';
}

//lance chaque display dans le bon ordre
 public function displayAll(): void
    {
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }

    // Affiche le <main> : formulaire d'ajout de joueur
      public function displayMain(): void
    {
        $message = $this->getMessage();

        $rows = '';
        foreach ($this->getPlayers() as $player) {
           
            $rows .= '<tr>
                        <td>' . htmlspecialchars($player['pseudo']) . '</td>
                        <td>' . htmlspecialchars($player['score']) . '</td>
                        <td>' . htmlspecialchars($player['team']) . '</td>
                      </tr>';
        }

        if ($rows === '') {
            $rows = '
                <tr>
                    <td colspan="3">Aucun joueur trouvé.</td>
                </tr>';
        }
        
    echo ' <main>
            <h1>Ajouter un joueur</h1>
            <p>' . htmlspecialchars($message) . '</p>
            <form method="POST" action="index.php?action=addPlayer">
                <label for="pseudo">pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required>
                <div>

                </div>

                <div>
                <label for ="score">score :</label>
                <input type="number" id="score" name="score" min="0" required>
                </div>

                <div>
                <label for="team">Equipe :</label>
                <select id="team" name="team" >
                    <option value="">Sélectionnez une équipe</option>
                    <option value="team1">Aucunne</option>
                    <option value="team2">TeamRocket</option>
                    <option value="team3">DreamTeam</option>
                </select>
                </div>

                <button type="submit" value="Ajouter">
            </form>

            <h2>Liste des joueurs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Score</th>
                        <th>Equipe</th>
                    </tr>
                </thead>
                <tbody>' . $rows .'
                </tbody>
            </table>
          </main>';
    }
}

      
    
