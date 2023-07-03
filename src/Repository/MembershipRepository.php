<?php

namespace App\Repository;

use App\Model\Membership;
use PDO;

class MembershipRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Sauvegarde un abonnement
     * @param Membership $membership
     * @param integer $idGym
     * @return integer
     */
    public function registerMembership(Membership $membership, int $idGym): int
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

    /**
     * Supprime un abonnement
     * @param Membership $membership
     * @return void
     */
    public function deleteMembership(Membership $membership)
    {
        $id = $membership->getId();

        $query = "DELETE FROM membership WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }
}
