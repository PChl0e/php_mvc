<?php

namespace App\ViewModel;

use App\Model\Classe;
use App\Model\ClasseModel;
use App\Model\Gym;
use App\Model\GymModel;
use App\Model\Member;
use App\Model\MemberModel;
use App\Model\Membership;
use App\Model\MembershipModel;
use PDO;

class GymViewModel
{
    private GymModel $gymModel;
    private MemberModel $memberModel;
    private MembershipModel $membershipModel;
    private ClasseModel $classModel;

    public function __construct(PDO $pdo)
    {
        $this->gymModel = new GymModel($pdo);
        $this->memberModel = new MemberModel($pdo);
        $this->membershipModel = new MembershipModel($pdo);
        $this->classModel = new ClasseModel($pdo);
    }

    /**
     * Sauvegarde d'un member
     * @param Member $member
     * @param integer $idMembership
     * @return void
     */
    public function registerMember(Member $member, int $idMembership)
    {
        $this->memberModel->registerMember($member, $idMembership);
    }

    /**
     * Sauvegarde un abonnement
     * @param Membership $membership
     * @param integer $idGym
     * @return integer Identifiant de l'abonnement
     */
    public function registerMembership(Membership $membership, int $idGym): int
    {
        return $this->membershipModel->registerMembership($membership, $idGym);
    }

    /**
     * Sauvegarde une salle de sport
     * @param Gym $gym
     * @return integer Identifiant de la salle de sport 
     */
    public function registerGym(Gym $gym): int
    {
        return $this->gymModel->registerGym($gym);
    }

    /**
     * Sauvegarde un cours
     * @param Classe $classe
     * @param integer $idGym
     * @return void
     */
    public function registerClass(Classe $classe, int $idGym)
    {
        $this->classModel->registerClass($classe, $idGym);
    }

    public function getClasses(): array
    {
        return $this->classModel->getClasses();
    }

    public function getMembers(): array
    {
        return $this->memberModel->getMembers();
    }

    public function getGyms(): array
    {
        return $this->gymModel->getGyms();
    }
}
