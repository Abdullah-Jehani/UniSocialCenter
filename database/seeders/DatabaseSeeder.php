<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $names = ['IT', 'Engineering', 'medicine'];
        foreach ($names as $name) {
            Department::create(['name' => $name]);

            $posts = ['post1', 'post2', 'post3'];
            foreach ($posts as $post) {
                post::create(['content' => $post]);
            }
        }
    }
}
