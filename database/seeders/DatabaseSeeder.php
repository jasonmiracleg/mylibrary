<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Shop;
use App\Models\User;
use App\Models\Sales;
use App\Models\Writer;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Model::unguard();
        $this->call([PublisherSeeder::class, RoleSeeder::class, UserSeeder::class]); // Calling other seeder
        Model::reguard();
        User::factory(5)->create();
        Writer::factory(5)->create();
        Book::factory(10)->create();
        Shop::factory(10)->create();
        Sales::factory(10)->create();
    }
}
