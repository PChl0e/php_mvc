<?php

namespace App\Repository;

use App\Model\Member;
use App\Model\Membership;
use PDO;

class MemberRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Enregistre un membre en BDD
     * @param Member $member
     * @param integer $idMembership
     * @return void
     */
    public function registerMember(Member $member, int $idMembership)
    {
        $nom = $member->getName();
        $email = $member->getEmail();
        $age = $member->getAge();

        $query = "INSERT INTO member (name, email, age, id_membership) VALUES (:name, :email, :age, :id_membership)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'name' => $nom,
            'email' => $email,
            'age' => $age,
            'id_membership' => $idMembership
        ]);

        // Assigner l'ID généré à l'objet Member
        $member->setId($this->db->lastInsertId());
    }

    /**
     * Supptime un membre
     * @param Member $member
     * @return void
     */
    public function deleteMember(Member $member)
    {
        $id = $member->getId();

        $query = "DELETE FROM member WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

    /**
     * Retourne la liste des membres d'une salle de sport
     * @param integer $idGym Identifiant de la salle de sport
     * @return array
     */
    public function getMembers(int $idGym): array
    {
        $query = "SELECT * FROM `member` JOIN membership ON id_membership = membership.id WHERE membership.id_gym = " . $idGym;
        $stmt = $this->db->query($query);

        $members = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $member = new Member($row['name'], $row['email'], $row['age']);
            $member->setId($row['id']);
            $member->setMembership(new Membership($row['status'], $row['price']));
            $members[] = $member;
        }

        return $members;
    }
}
