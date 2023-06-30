<?php

namespace App\Model;

use PDO;

class ClasseModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerClass(Classe $class, int $idGym)
    {
        $nom = $class->getName();
        $instructor = $class->getInstructor();
        $schedule = $class->getSchedule();

        $query = "INSERT INTO class (name, instructor, schedule, id_gym) VALUES (:name, :instructor, :schedule, :id_gym)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'name' => $nom,
            'instructor' => $instructor,
            'schedule' => $schedule,
            'id_gym' => $idGym
        ]);

        // Assigner l'ID généré à l'objet Class
        $class->setId($this->db->lastInsertId());
    }

    public function deleteClass(Classe $class)
    {
        $id = $class->getId();

        $query = "DELETE FROM class WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function getClasses()
    {
        $query = "SELECT * FROM class";
        $stmt = $this->db->query($query);

        $classes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $class = new Classe($row['name'], $row['instructor'], $row['schedule']);
            $class->setId($row['id']);
            $classes[] = $class;
        }

        return $classes;
    }
}
