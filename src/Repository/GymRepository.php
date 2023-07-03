<?php

namespace App\Repository;

use App\Model\Gym;
use PDO;

class GymRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Enregistre une salle de sport en BDD
     * @param Gym $gym
     * @return int
     */
    public function registerGym(Gym $gym): int
    {
        $nom = $gym->getName();
        $adress = $gym->getAddress();
        $openingHours = $gym->getOpeningHours();

        $query = "INSERT INTO gym (name, adress, opening_hours) VALUES (:name, :adress, :opening_hours)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'name' => $nom,
            'adress' => $adress,
            'opening_hours' => $openingHours
        ]);

        // Assigner l'ID généré à l'objet Gym
        $gym->setId($this->db->lastInsertId());
        return $gym->getId();
    }

    /**
     * Supprime une salle de sport
     * @param Gym $gym
     * @return void
     */
    public function deleteGym(Gym $gym)
    {
        $id = $gym->getId();

        $query = "DELETE FROM gym WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

    /**
     * Retourne la liste des salles de sport
     * @return void
     */
    public function getGyms()
    {
        $query = "SELECT * FROM gym";
        $stmt = $this->db->query($query);

        $gyms = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gym = new Gym($row['name'], $row['adress'], $row['opening_hours']);
            $gym->setId($row['id']);
            $gyms[] = $gym;
        }

        return $gyms;
    }

    /**
     * Retourne une salle de sport via son identifiant
     * @param integer $id
     * @return Gym
     */
    public function getOneById(int $id): Gym
    {
        $query = "SELECT * FROM gym WHERE id =" . $id;
        $stmt = $this->db->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gym = new Gym($row['name'], $row['adress'], $row['opening_hours']);
            $gym->setId($row['id']);
        }

        return $gym;
    }
}
