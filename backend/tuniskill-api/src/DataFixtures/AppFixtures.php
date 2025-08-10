<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Course;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Create Categories
        $categories = $this->createCategories($manager);
        
        // Create Users
        $users = $this->createUsers($manager);
        
        // Create Courses
        $this->createCourses($manager, $categories, $users);

        $manager->flush();
    }

    private function createCategories(ObjectManager $manager): array
    {
        $categoriesData = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Learn to build modern web applications',
                'icon' => 'code',
                'color' => '#3B82F6',
                'sortOrder' => 1
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Create mobile apps for iOS and Android',
                'icon' => 'smartphone',
                'color' => '#10B981',
                'sortOrder' => 2
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'description' => 'Analyze data and build machine learning models',
                'icon' => 'bar-chart',
                'color' => '#8B5CF6',
                'sortOrder' => 3
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'UI/UX design and graphic design courses',
                'icon' => 'palette',
                'color' => '#F59E0B',
                'sortOrder' => 4
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Business skills and entrepreneurship',
                'icon' => 'briefcase',
                'color' => '#EF4444',
                'sortOrder' => 5
            ]
        ];

        $categories = [];
        foreach ($categoriesData as $categoryData) {
            $category = new Category();
            $category->setName($categoryData['name']);
            $category->setSlug($categoryData['slug']);
            $category->setDescription($categoryData['description']);
            $category->setIcon($categoryData['icon']);
            $category->setColor($categoryData['color']);
            $category->setSortOrder($categoryData['sortOrder']);
            
            $manager->persist($category);
            $categories[] = $category;
        }

        return $categories;
    }

    private function createUsers(ObjectManager $manager): array
    {
        $usersData = [
            [
                'email' => 'admin@tuniskill.com',
                'firstName' => 'Admin',
                'lastName' => 'User',
                'userType' => 'admin',
                'roles' => ['ROLE_ADMIN'],
                'country' => 'Tunisia',
                'city' => 'Tunis'
            ],
            [
                'email' => 'john.doe@example.com',
                'firstName' => 'John',
                'lastName' => 'Doe',
                'userType' => 'instructor',
                'roles' => ['ROLE_INSTRUCTOR'],
                'country' => 'USA',
                'city' => 'New York'
            ],
            [
                'email' => 'jane.smith@example.com',
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'userType' => 'instructor',
                'roles' => ['ROLE_INSTRUCTOR'],
                'country' => 'UK',
                'city' => 'London'
            ],
            [
                'email' => 'ahmed.benali@example.com',
                'firstName' => 'Ahmed',
                'lastName' => 'Ben Ali',
                'userType' => 'instructor',
                'roles' => ['ROLE_INSTRUCTOR'],
                'country' => 'Tunisia',
                'city' => 'Sfax'
            ],
            [
                'email' => 'student@example.com',
                'firstName' => 'Student',
                'lastName' => 'User',
                'userType' => 'student',
                'roles' => ['ROLE_USER'],
                'country' => 'Tunisia',
                'city' => 'Tunis'
            ]
        ];

        $users = [];
        foreach ($usersData as $userData) {
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setFirstName($userData['firstName']);
            $user->setLastName($userData['lastName']);
            $user->setUserType($userData['userType']);
            $user->setRoles($userData['roles']);
            $user->setCountry($userData['country']);
            $user->setCity($userData['city']);
            $user->setVerified(true);
            
            // Set password as 'password123' for all users
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'password123');
            $user->setPassword($hashedPassword);
            
            $manager->persist($user);
            $users[] = $user;
        }

        return $users;
    }

    private function createCourses(ObjectManager $manager, array $categories, array $users): void
    {
        $coursesData = [
            [
                'title' => 'Complete Web Development Bootcamp',
                'description' => 'Learn HTML, CSS, JavaScript, React, Node.js, and more in this comprehensive web development course.',
                'instructor' => 'John Doe',
                'price' => '99.99',
                'rating' => '4.8',
                'students' => 1250,
                'duration' => '40 hours',
                'level' => 'Beginner',
                'category' => 'Web Development',
                'isFeatured' => true,
                'requirements' => 'Basic computer skills, No programming experience required',
                'whatYouWillLearn' => 'HTML5 and CSS3, JavaScript ES6+, React.js, Node.js and Express, MongoDB, Git and GitHub',
                'language' => 'en',
                'tags' => ['html', 'css', 'javascript', 'react', 'nodejs']
            ],
            [
                'title' => 'React Native Mobile App Development',
                'description' => 'Build cross-platform mobile applications using React Native and JavaScript.',
                'instructor' => 'Jane Smith',
                'price' => '149.99',
                'rating' => '4.6',
                'students' => 890,
                'duration' => '35 hours',
                'level' => 'Intermediate',
                'category' => 'Mobile Development',
                'isFeatured' => true,
                'requirements' => 'Basic JavaScript knowledge, React.js fundamentals',
                'whatYouWillLearn' => 'React Native fundamentals, Navigation, State management, API integration, Publishing to app stores',
                'language' => 'en',
                'tags' => ['react-native', 'mobile', 'javascript', 'ios', 'android']
            ],
            [
                'title' => 'Data Science with Python',
                'description' => 'Master data analysis, visualization, and machine learning with Python.',
                'instructor' => 'Ahmed Ben Ali',
                'price' => '129.99',
                'rating' => '4.7',
                'students' => 567,
                'duration' => '50 hours',
                'level' => 'Intermediate',
                'category' => 'Data Science',
                'isFeatured' => false,
                'requirements' => 'Basic Python knowledge, High school mathematics',
                'whatYouWillLearn' => 'Pandas and NumPy, Data visualization with Matplotlib, Machine learning with Scikit-learn, Statistical analysis',
                'language' => 'en',
                'tags' => ['python', 'data-science', 'machine-learning', 'pandas', 'matplotlib']
            ],
            [
                'title' => 'UI/UX Design Fundamentals',
                'description' => 'Learn the principles of user interface and user experience design.',
                'instructor' => 'Jane Smith',
                'price' => '79.99',
                'rating' => '4.5',
                'students' => 432,
                'duration' => '25 hours',
                'level' => 'Beginner',
                'category' => 'Design',
                'isFeatured' => false,
                'requirements' => 'No prior design experience required, Access to design software (Figma recommended)',
                'whatYouWillLearn' => 'Design principles, User research methods, Wireframing and prototyping, Figma mastery, Design systems',
                'language' => 'en',
                'tags' => ['ui', 'ux', 'design', 'figma', 'prototyping']
            ],
            [
                'title' => 'Digital Marketing Mastery',
                'description' => 'Complete guide to digital marketing including SEO, social media, and paid advertising.',
                'instructor' => 'John Doe',
                'price' => '89.99',
                'rating' => '4.4',
                'students' => 678,
                'duration' => '30 hours',
                'level' => 'Beginner',
                'category' => 'Business',
                'isFeatured' => true,
                'requirements' => 'Basic computer skills, Interest in marketing',
                'whatYouWillLearn' => 'SEO optimization, Social media marketing, Google Ads, Email marketing, Analytics and reporting',
                'language' => 'en',
                'tags' => ['marketing', 'seo', 'social-media', 'google-ads', 'analytics']
            ],
            [
                'title' => 'Advanced JavaScript Concepts',
                'description' => 'Deep dive into advanced JavaScript concepts including closures, prototypes, and async programming.',
                'instructor' => 'Ahmed Ben Ali',
                'price' => '119.99',
                'rating' => '4.9',
                'students' => 345,
                'duration' => '28 hours',
                'level' => 'Advanced',
                'category' => 'Web Development',
                'isFeatured' => false,
                'requirements' => 'Solid JavaScript fundamentals, ES6+ knowledge',
                'whatYouWillLearn' => 'Closures and scope, Prototypes and inheritance, Async/await and Promises, Design patterns, Performance optimization',
                'language' => 'en',
                'tags' => ['javascript', 'advanced', 'async', 'closures', 'prototypes']
            ]
        ];

        foreach ($coursesData as $courseData) {
            $course = new Course();
            $course->setTitle($courseData['title']);
            $course->setDescription($courseData['description']);
            $course->setInstructor($courseData['instructor']);
            $course->setPrice($courseData['price']);
            $course->setRating($courseData['rating']);
            $course->setStudents($courseData['students']);
            $course->setDuration($courseData['duration']);
            $course->setLevel($courseData['level']);
            $course->setCategory($courseData['category']);
            $course->setFeatured($courseData['isFeatured']);
            $course->setRequirements($courseData['requirements']);
            $course->setWhatYouWillLearn($courseData['whatYouWillLearn']);
            $course->setLanguage($courseData['language']);
            $course->setTags($courseData['tags']);
            $course->setThumbnail('https://via.placeholder.com/400x300?text=' . urlencode($courseData['title']));
            
            $manager->persist($course);
        }
    }
}

