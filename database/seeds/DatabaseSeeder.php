<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ChannelTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TaggablesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(LikeeableTableSeeder::class);
    }
}
