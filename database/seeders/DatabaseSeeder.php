<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
    ]);

    // Agregar categorías
    Category::create(['name' => 'Generica', 'description' => 'Generica']);
    Category::create(['name' => 'Economica', 'description' => 'Económica']);
    Category::create(['name' => 'Premium', 'description' => 'Premium']);
  }
}
