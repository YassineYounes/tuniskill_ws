<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * Find all active categories
     */
    public function findActiveCategories(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('c.sortOrder', 'ASC')
            ->addOrderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find root categories (no parent)
     */
    public function findRootCategories(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.parent IS NULL')
            ->setParameter('active', true)
            ->orderBy('c.sortOrder', 'ASC')
            ->addOrderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find categories by parent
     */
    public function findByParent(Category $parent): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.parent = :parent')
            ->setParameter('active', true)
            ->setParameter('parent', $parent)
            ->orderBy('c.sortOrder', 'ASC')
            ->addOrderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find category by slug
     */
    public function findBySlug(string $slug): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.slug = :slug')
            ->setParameter('active', true)
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Search categories by name
     */
    public function searchCategories(string $query): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isActive = :active')
            ->andWhere('c.name LIKE :query OR c.description LIKE :query')
            ->setParameter('active', true)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Get category tree (hierarchical structure)
     */
    public function getCategoryTree(): array
    {
        $rootCategories = $this->findRootCategories();
        $tree = [];

        foreach ($rootCategories as $category) {
            $tree[] = $this->buildCategoryNode($category);
        }

        return $tree;
    }

    /**
     * Build category node with children
     */
    private function buildCategoryNode(Category $category): array
    {
        $node = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'slug' => $category->getSlug(),
            'description' => $category->getDescription(),
            'icon' => $category->getIcon(),
            'color' => $category->getColor(),
            'sortOrder' => $category->getSortOrder(),
            'children' => []
        ];

        $children = $this->findByParent($category);
        foreach ($children as $child) {
            $node['children'][] = $this->buildCategoryNode($child);
        }

        return $node;
    }

    /**
     * Get categories with course count
     */
    public function getCategoriesWithCourseCount(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c', 'COUNT(course.id) as courseCount')
            ->leftJoin('App\Entity\Course', 'course', 'WITH', 'course.category = c.name AND course.isActive = true')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->groupBy('c.id')
            ->orderBy('c.sortOrder', 'ASC')
            ->addOrderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find popular categories (by course count)
     */
    public function findPopularCategories(int $limit = 10): array
    {
        return $this->createQueryBuilder('c')
            ->select('c', 'COUNT(course.id) as courseCount')
            ->leftJoin('App\Entity\Course', 'course', 'WITH', 'course.category = c.name AND course.isActive = true')
            ->andWhere('c.isActive = :active')
            ->setParameter('active', true)
            ->groupBy('c.id')
            ->having('courseCount > 0')
            ->orderBy('courseCount', 'DESC')
            ->addOrderBy('c.name', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}

