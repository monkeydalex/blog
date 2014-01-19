<?php
 
class CategorieTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('categories')->insert(
 
            array (
                array(
                    'id' => 1,
                    'title' => 'Catégorie 1',
                    'description' => 'blablabla',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00'
                ),
                array(
                    'id' => 2,
                    'title' => 'Catégorie 2',
                    'description' => 'blablabla',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00'
                ),
                array(
                    'id' => 3,
                    'title' => 'Catégorie 3',
                    'description' => 'blablabla',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00'
                ),
                array(
                    'id' => 4,
                    'title' => 'Catégorie 4',
                    'description' => 'blablabla',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00'
                )
            )
        );
    }
 
}