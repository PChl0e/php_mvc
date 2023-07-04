<?php

namespace App\ViewModel;

use App\Model\Classe;
use App\Model\Gym;
use App\Model\Member;
use App\Model\Membership;
use App\Repository\ClasseRepository;
use App\Repository\GymRepository;
use App\Repository\MemberRepository;
use App\Repository\MembershipRepository;
use PDO;

class GymViewModel
{
    private GymRepository $gymRepository;
    private MemberRepository $memberRepository;
    private MembershipRepository $membershipRepository;
    private ClasseRepository $classRepository;

    public function __construct(PDO $pdo)
    {
        $this->gymRepository = new GymRepository($pdo);
        $this->memberRepository = new MemberRepository($pdo);
        $this->membershipRepository = new MembershipRepository($pdo);
        $this->classRepository = new ClasseRepository($pdo);
    }

    /**
     * Sauvegarde d'un member
     * @param Member $member
     * @param integer $idMembership
     * @return void
     */
    public function registerMember(Member $member, int $idMembership)
    {
        $this->memberRepository->registerMember($member, $idMembership);
    }

    /**
     * Sauvegarde un abonnement
     * @param Membership $membership
     * @param integer $idGym
     * @return integer Identifiant de l'abonnement
     */
    public function registerMembership(Membership $membership, int $idGym): int
    {
        return $this->membershipRepository->registerMembership($membership, $idGym);
    }

    /**
     * Sauvegarde une salle de sport
     * @param Gym $gym
     * @return integer Identifiant de la salle de sport 
     */
    public function registerGym(Gym $gym): int
    {
        return $this->gymRepository->registerGym($gym);
    }

    /**
     * Sauvegarde un cours
     * @param Classe $classe
     * @param integer $idGym
     * @return void
     */
    public function registerClass(Classe $classe, int $idGym)
    {
        $this->classRepository->registerClass($classe, $idGym);
    }

    public function getClasses(int $idGym): array
    {
        return $this->classRepository->getClasses($idGym);
    }

    /**
     * Récupère les membres d'une salle de sport
     * @return array
     */
    public function getMembers(int $idGym): array
    {
        return $this->memberRepository->getMembers($idGym);
    }

    /**
     * Récupère une salle de sport via son identifiant
     * @param integer $id
     * @return Gym
     */
    public function getGym(int $id): Gym
    {
        return $this->gymRepository->getOneById($id);
    }
}
