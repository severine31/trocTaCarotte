<?php

namespace App\DataFixtures;

use Symfony\Component\Finder\Finder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Bundle to manage file and directories
        $finder = new Finder();
        $finder->in(__DIR__.'/../../devops');
        $finder->name('*.sql');
        $finder->files();
        $finder->sortByName();

        foreach( $finder as $file ){
            print "Importing: {$file->getBasename()} " . PHP_EOL;

            $sql = $file->getContents();

            $sqls = explode("\n", $sql);

            foreach ($sqls as $sql) {
                if ($sql != '') {
                    $manager->getConnection()->exec($sql);  // Execute native SQL
                }
            }

            $manager->flush();
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
