<?php

namespace App\Model;

use PDO;

class MemberModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

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

    public function deleteMember(Member $member)
    {
        $id = $member->getId();

        $query = "DELETE FROM member WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function getMembers()
    {
        $query = "SELECT * FROM member";
        $stmt = $this->db->query($query);

        $members = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $member = new Member($row['name'], $row['email'], $row['age']);
            $member->setId($row['id']);
            $query = "SELECT * FROM membership WHERE id =" . $row['id_membership'];
            $stmtMembership = $this->db->query($query);
            $rowMembership = $stmtMembership->fetch(PDO::FETCH_ASSOC);
            $member->setMembership(new Membership($rowMembership['status'], $rowMembership['price']));
            $members[] = $member;
        }

        return $members;
    }
}
