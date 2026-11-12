<?php

class ControllerHome extends Controller
{
    // Récupère tous les joueurs 
    public function displayPlayers(): void
    {
        $players = $this->getModel()->findAll();
        $this->getView()->setPlayers($players);
    }

    // Traite le formulaire d'ajout de joueur
    public function registerPlayer(): void
    {
        // 1) Vérifier que l'on reçoit bien le formulaire d'ajout
        if (!isset($_POST['submit'])) {
            return;
        }

        // 2) Vérifier que tous les champs sont présents et remplis
        if (empty($_POST['pseudo']) || !isset($_POST['score']) || $_POST['score'] === '' || empty($_POST['team'])) {
            $this->getView()->setMessage("Erreur : tous les champs doivent être remplis.");
            return;
        }

        // 3) Sécurités d'usage : nettoyage des données reçues
        $pseudo = htmlspecialchars(strip_tags(trim($_POST['pseudo'])), ENT_QUOTES);
        $score  = filter_var($_POST['score'], FILTER_VALIDATE_INT);
        $idTeam = filter_var($_POST['team'], FILTER_VALIDATE_INT);

        // 4) Vérifications : l'enregistrement a-t-il le droit de s'effectuer ?
        if ($pseudo === '' || mb_strlen($pseudo) > 50) {
            $this->getView()->setMessage("Erreur : le pseudo doit contenir entre 1 et 50 caractères.");
            return;
        }

        if ($score === false || $score < 0) {
            $this->getView()->setMessage("Erreur : le score doit être un nombre entier positif.");
            return;
        }

        if ($idTeam === false || !in_array($idTeam, [1, 2, 3], true)) {
            $this->getView()->setMessage("Erreur : l'équipe sélectionnée n'existe pas.");
            return;
        }

        if ($this->getModel()->findbyPseudo($pseudo)) {
            $this->getView()->setMessage("Erreur : le pseudo $pseudo est déjà utilisé.");
            return;
        }

        // 5) Effectuer l'enregistrement
        $this->getModel()->add($pseudo, $score, $idTeam);

        // 6) Message de succès
        $this->getView()->setMessage("Le joueur $pseudo a bien été ajouté.");
    }
}