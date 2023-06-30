<?php

namespace App\Model;

use PDO;

class MembershipModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerMembership(Membership $membership, int $idGym)
    {
        $status = $membership->getStatus();
        $price = $membership->getPrice();

        $query = "INSERT INTO membership (status, price, id_gym) VALUES (:status, :price, :id_gym)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'status' => $status,
            'price' => $price,
            'id_gym' => $idGym
        ]);

        // Assigner l'ID généré à l'objet Membership
        $membership->setId($this->db->lastInsertId());
        return $membership->getId();
    }

    public function deleteMembership(Membership $membership)
    {
        $id = $membership->getId();

        $query = "DELETE FROM membership WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function getMemberships()
    {
        $query = "SELECT * FROM membership";
        $stmt = $this->db->query($query);

        $memberships = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $membership = new Membership($row['status'], $row['price']);
            $membership->setId($row['id']);
            $memberships[] = $membership;
        }

        return $memberships;
    }
}
