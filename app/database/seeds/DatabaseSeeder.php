<?php
 
class DatabaseSeeder extends Seeder {
 
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('CategorieTableSeeder');
        $this->call('ArticleTableSeeder');
        $this->call('CommentTableSeeder');
    }
 
}