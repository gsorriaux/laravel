<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'titre' => 'La Machine à explorer le temps',
                'description' => 'raconte à ses amis toutes les époques dans lesquelles il s’est rendu.',
                'author_id' => '1',
                'année_de_parution' => '1895',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')      
            ],
            [
                'titre' => '1984',
                'description' => 'Dans une Grande-Bretagne dystopique, Big Brother contrôle toute la vie des être humains.',
                'author_id' => '2',
                'année_de_parution' => '1949',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                
            ],
            [
                'titre' => 'Chroniques martiennes',
                'description' => 'a civilisation martienne disparaît rapidement à cause de l’arrivée des êtres humains.',
                'author_id' => '3',
                'année_de_parution' => '1950',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                
            ]
        ]);
    }
}
