<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Survey;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;

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

        Survey::factory()->create([
            'name' => 'Test Survey',
            'description' => 'This is a test survey.',
        ]);
        Category::factory()->count(5)->create(
            [
                'survey_id' => 1,
            ]
        );
        foreach(Category::all() as $category) {
            Question::factory()->count(20)->make()->each(function($question) use ($category) {
                $question->survey_id = $category->survey_id;
                $category->questions()->save($question);
                $question->choices()->saveMany(
                    \App\Models\Choice::factory()->count(4)->make()
                );
            });
        }
        $questions = Question::all();
        foreach($questions as $question) {
            $question->choices()->inRandomOrder()->first()->update([
                'is_correct' => true,
            ]);
        }
       
    }
}
