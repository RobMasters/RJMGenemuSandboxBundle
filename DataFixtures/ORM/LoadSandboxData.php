<?php

namespace RJM\Bundle\GenemuSandboxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RJM\Bundle\GenemuSandboxBundle\Entity\Author,
    RJM\Bundle\GenemuSandboxBundle\Entity\Category,
    RJM\Bundle\GenemuSandboxBundle\Entity\Post;

class LoadSandboxData implements FixtureInterface
{
    /**
     * @var Author[]
     */
    protected $authors;

    /**
     * @var Category[]
     */
    protected $categories;


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $this->authors = $this->loadAuthors($manager);
        $this->categories = $this->loadCategories($manager);
        $this->loadPosts($manager);

        $manager->flush();
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @return array|Author[]
     */
    private function loadAuthors(ObjectManager $manager)
    {
        return $this->loadData($manager, 'RJM\Bundle\GenemuSandboxBundle\Entity\Author', array(
            array(
                'username' => 'homer',
                'email' => 'homer@example.com'
            ),
            array(
                'username' => 'bart',
                'email' => 'bart@example.com'
            ),
            array(
                'username' => 'lisa',
                'email' => 'lisa@example.com'
            )
        ));
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @return array|Category[]
     */
    private function loadCategories(ObjectManager $manager)
    {
        return $this->loadData($manager, 'RJM\Bundle\GenemuSandboxBundle\Entity\Category', array(
            array(
                'name' => 'News'
            ),
            array(
                'name' => 'Sport'
            ),
            array(
                'name' => 'Technology'
            ),
            array(
                'name' => 'Environment'
            ),
            array(
                'name' => 'Fashion'
            ),
            array(
                'name' => 'Celebrity'
            )
        ));
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @return array|Post[]
     */
    private function loadPosts(ObjectManager $manager)
    {
        return $this->loadData($manager, 'RJM\Bundle\GenemuSandboxBundle\Entity\Post', array(
            array(
                'author' => $this->pickRandom($this->authors),
                'title' => 'Post 1',
                'body' => 'The body text for post 1',
                'publishedAt' => new \DateTime('now'),
                'active' => true,
                'category' => $this->pickRandom($this->categories)
            ),
            array(
                'author' => $this->pickRandom($this->authors),
                'title' => 'Post 2',
                'body' => 'The body text for post 2',
                'publishedAt' => new \DateTime('now'),
                'active' => true,
                'category' => $this->pickRandom($this->categories)
            ),
            array(
                'author' => $this->pickRandom($this->authors),
                'title' => 'Post 3',
                'body' => 'The body text for post 3',
                'publishedAt' => new \DateTime('now'),
                'active' => true,
                'category' => $this->pickRandom($this->categories)
            ),
            array(
                'author' => $this->pickRandom($this->authors),
                'title' => 'Post 4',
                'body' => 'The body text for post 5',
                'publishedAt' => new \DateTime('now'),
                'active' => false,
                'category' => $this->pickRandom($this->categories)
            )
        ));
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @param $classname
     * @param $data
     * @return array
     */
    private function loadData(ObjectManager $manager, $classname, $data)
    {
        $out = array();

        foreach ($data as $entityData) {
            $out[] = $entity = new $classname;
            foreach ($entityData as $key => $value) {
                $setter = sprintf('set%s', ucfirst($key));
                $entity->$setter($value);
            }

            $manager->persist($entity);
        }

        return $out;
    }

    /**
     * Pick a random entity from an array
     *
     * @param array $collection
     * @return mixed
     */
    private function pickRandom(array $collection)
    {
        return $collection[array_rand($collection)];
    }
}