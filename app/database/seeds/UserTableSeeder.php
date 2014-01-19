<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->insert(
 
            array(
                array(
                    'id' => 1,
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'email' => 'admin@plop.fr',
                    'statut' => 'admin',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00',
                ),
 
                array(
                    'id' => 2,
                    'username' => 'Dupont',
                    'password' => Hash::make('dupont'),
                    'email' => 'dupont@plop.fr',
                    'statut' => 'user',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00',
                ),
 
                array(
                    'id' => 3,
                    'username' => 'Durand',
                    'password' => Hash::make('durand'),
                    'email' => 'durand@plop.fr',
                    'statut' => 'user',
                    'created_at' => '2013-02-06 00:00:00',
                    'updated_at' => '2013-02-06 00:00:00',
                )
            )
        );
    }
}