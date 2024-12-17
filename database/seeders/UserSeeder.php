<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Jonathan',
      'email' => 'jonathanalvin@gmail.com',
      'password' => Hash::make('password123'), // Make sure to hash the password
    ]);
  }
}
