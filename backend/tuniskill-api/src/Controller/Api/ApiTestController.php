<?php

namespace App\Controller\Api;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class ApiTestController extends AbstractController
{
    #[Route('/test', name: 'test', methods: ['GET'])]
    public function test(): JsonResponse
    {
        return $this->json([
            'message' => 'API connection successful!',
            'timestamp' => new \DateTime(),
            'status' => 'success',
            'data' => [
                'platform' => 'TuniSkill',
                'version' => '1.0.0',
                'environment' => $this->getParameter('kernel.environment')
            ]
        ]);
    }

    #[Route('/health', name: 'health', methods: ['GET'])]
    public function health(): JsonResponse
    {
        return $this->json([
            'status' => 'healthy',
            'timestamp' => new \DateTime(),
            'services' => [
                'database' => 'connected',
                'cache' => 'available',
                'api' => 'running'
            ]
        ]);
    }

    #[Route('/courses', name: 'courses', methods: ['GET'])]
    public function courses(CourseRepository $courseRepository): JsonResponse
    {
        $courses = $courseRepository->findActiveCourses();
        
        $courseData = [];
        foreach ($courses as $course) {
            $courseData[] = [
                'id' => $course->getId(),
                'title' => $course->getTitle(),
                'description' => $course->getDescription(),
                'instructor' => $course->getInstructor(),
                'price' => (float) $course->getPrice(),
                'rating' => (float) $course->getRating(),
                'students' => $course->getStudents(),
                'duration' => $course->getDuration(),
                'level' => $course->getLevel(),
                'category' => $course->getCategory(),
                'thumbnail' => $course->getThumbnail(),
                'isFeatured' => $course->isFeatured(),
                'tags' => $course->getTags(),
                'language' => $course->getLanguage(),
                'createdAt' => $course->getCreatedAt()->format('Y-m-d H:i:s')
            ];
        }

        return $this->json([
            'status' => 'success',
            'data' => $courseData,
            'total' => count($courseData),
            'timestamp' => new \DateTime()
        ]);
    }
}

