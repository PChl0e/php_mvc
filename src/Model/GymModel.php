<?php

namespace App\Model;

use PDO;

class GymModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerGym(Gym $gym)
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

    public function deleteGym(Gym $gym)
    {
        $id = $gym->getId();

        $query = "DELETE FROM gym WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

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
}
