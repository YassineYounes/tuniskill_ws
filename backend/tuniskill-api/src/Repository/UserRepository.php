<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * Find all active users
     */
    public function findActiveUsers(): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find users by type
     */
    public function findByUserType(string $userType): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->andWhere('u.userType = :userType')
            ->setParameter('active', true)
            ->setParameter('userType', $userType)
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find instructors
     */
    public function findInstructors(): array
    {
        return $this->findByUserType('instructor');
    }

    /**
     * Find students
     */
    public function findStudents(): array
    {
        return $this->findByUserType('student');
    }

    /**
     * Find admins
     */
    public function findAdmins(): array
    {
        return $this->findByUserType('admin');
    }

    /**
     * Search users by name or email
     */
    public function searchUsers(string $query): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->andWhere('u.firstName LIKE :query OR u.lastName LIKE :query OR u.email LIKE :query')
            ->setParameter('active', true)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('u.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find recently registered users
     */
    public function findRecentUsers(int $limit = 10): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('u.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Get user statistics
     */
    public function getUserStats(): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('COUNT(u.id) as totalUsers')
            ->addSelect('COUNT(CASE WHEN u.userType = \'student\' THEN 1 END) as totalStudents')
            ->addSelect('COUNT(CASE WHEN u.userType = \'instructor\' THEN 1 END) as totalInstructors')
            ->addSelect('COUNT(CASE WHEN u.isVerified = true THEN 1 END) as verifiedUsers')
            ->andWhere('u.isActive = :active')
            ->setParameter('active', true);

        return $qb->getQuery()->getSingleResult();
    }

    /**
     * Find users by country
     */
    public function findByCountry(string $country): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->andWhere('u.country = :country')
            ->setParameter('active', true)
            ->setParameter('country', $country)
            ->orderBy('u.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find unverified users
     */
    public function findUnverifiedUsers(): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.isActive = :active')
            ->andWhere('u.isVerified = :verified')
            ->setParameter('active', true)
            ->setParameter('verified', false)
            ->orderBy('u.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

