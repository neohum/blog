<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'Postgres',
            'Neon',
            'Web Development',
            'Laravel',
            'PHP',
            'JavaScript',
            'Database',
            'Design',
            'UI/UX',
            'AI',
            'Machine Learning',
            'Cloud Computing',
            'DevOps',
            'Security',
        ];
        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
