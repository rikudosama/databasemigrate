<?php

use Phinx\Seed\AbstractSeed;

class FillPostTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        //initialisation de faker
        $faker = \Faker\Factory::create();

        //tableau vite des categories
        $categories = [];

        //boucle creant 10 categories
        for ($i= 0; $i < 10; $i++) {
            $categories[] = [
                'name' => $faker->sentence(4),
                'slug' => $faker->slug
            ];
        }

        //un tableau initial de post vide
        $posts = [];

        //creons 100 posts en bouclant
        for ($i=0; $i < 100; $i++) {
            $timestamp = $faker->unixTime('now');
            $posts[] = [
                'name' => $faker->sentence(3),
                'slug' => $faker->slug,
                'description' => $faker->text(300),
                'created_at' => date('Y-m-d H:i:s', $timestamp),
                'updated_at' => date('Y-m-d H:i:s', $timestamp),
                'category_id' => rand(1, 10)
            ];
        }

        //on insert les categories en db
        $this->insert('categories', $categories);

        //on insert les posts en db
        $this->insert('posts', $posts);
    }
}
