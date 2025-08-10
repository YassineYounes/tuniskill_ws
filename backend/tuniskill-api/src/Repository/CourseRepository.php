<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Course>
 */
class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }

    /**
     * Find all active courses
     */
    public function findActiveCourses(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find featured courses
     */
    public function findFeaturedCourses(int $limit = 6): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.isFeatured = :featured')
            ->setParameter('active', true)
            ->setParameter('featured', true)
            ->orderBy('c.rating', 'DESC')
            ->addOrderBy('c.students', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find courses by category
     */
    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.category = :category')
            ->setParameter('active', true)
            ->setParameter('category', $category)
            ->orderBy('c.rating', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Search courses by title, description, or instructor
     */
    public function searchCourses(string $query): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.title LIKE :query OR c.description LIKE :query OR c.instructor LIKE :query')
            ->setParameter('active', true)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('c.rating', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find courses by level
     */
    public function findByLevel(string $level): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.level = :level')
            ->setParameter('active', true)
            ->setParameter('level', $level)
            ->orderBy('c.rating', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find courses by price range
     */
    public function findByPriceRange(float $minPrice, float $maxPrice): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.price BETWEEN :minPrice AND :maxPrice')
            ->setParameter('active', true)
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->orderBy('c.price', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Get course statistics
     */
    public function getCourseStats(): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c.id) as totalCourses')
            ->addSelect('AVG(c.rating) as averageRating')
            ->addSelect('SUM(c.students) as totalStudents')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true);

        return $qb->getQuery()->getSingleResult();
    }

    /**
     * Find popular courses (by student count)
     */
    public function findPopularCourses(int $limit = 10): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('c.students', 'DESC')
            ->addOrderBy('c.rating', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find recently added courses
     */
    public function findRecentCourses(int $limit = 10): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('c.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}

