<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductInputsTableSeeder::class);
        $this->call(ProductOutputTableSeeder::class);
        $this->call(ProductPhotosTableSeeder::class);
    }
}
