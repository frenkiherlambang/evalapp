<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Attempt;
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

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Survey::factory()->create([
            'name' => 'Test Survey',
            'description' => 'This is a test survey.',
        ]);
        Category::factory()->count(5)->create(
            [
                'survey_id' => 1,
                'feedbacks' => [
                    [
                        'points' => 20,
                        'text' => 'You need to work harder.',
                        'color' => '#FEE2E2',
                        'fontColor' => '#B91C1C'
                    ],
                    [
                        'points' => 40,
                        'text' => 'You can do better.',
                        'color' => '#ffedd5',
                        'fontColor' => '#c2410c'
                    ],
                    [
                        'points' => 60,
                        'text' => 'You are doing good.',
                        'color' => '#fef3c7',
                        'fontColor' => '#b45309'
                    ],
                    [
                        'points' => 80,
                        'text' => 'You are doing great.',
                        'color' => '#fef9c3',
                        'fontColor' => '#a16207'
                    ],
                    [
                        'points' => 100,
                        'text' => 'You are doing excellent.',
                        'color' => '#dcfce7',
                        'fontColor' => '#15803d'
                    ],
                ],
            ]
        );

        $categories = Category::all();
        foreach($categories as $category) {
            Question::factory()->count(20)->make()->each(function($question) use ($category) {
                $question->survey_id = $category->survey_id;
                $category->questions()->save($question);
                $question->choices()->saveMany(
                    \App\Models\Choice::factory()->count(4)->make()
                );
            });
        }
        $questions = Question::all();
        $surveyData = Category::where('survey_id', 1)->with([
            'randomQuestions:id,category_id,content',
            'randomQuestions.randomChoices:id,question_id,content'
        ])->select(['id', 'name', 'survey_id'])->get()->toArray();
        $attempt = new Attempt();
        $attempt->user_id = 1;
        $attempt->survey_id = 1;
        $attempt->survey_data = $surveyData;
        $attempt->save();

        foreach($questions as $question) {
            $choice = $question->choices()->inRandomOrder()->first();
            $choice->update([
                'is_correct' => true,
            ]);
            Answer::create([
                'attempt_id' => 1,
                'user_id' => $user->id,
                'survey_id' => $question->survey_id,
                'question_id' => $question->id,
                'category_id' => $question->category_id,
                'choice_id' => $choice->id,
                'points' => 5,
                'is_correct' => true,
                'answer' => $choice->content,
            ]);
        }
        foreach($categories as $category)
        {
            $points = Answer::where([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ])->sum('points');
            $feedback = collect($category->feedbacks)->where('points', '>=', $points)->sortByDesc('points')->first();
            if($feedback) {
                \App\Models\CategoryFeedback::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'text' => $feedback['text'],
                    'color' => $feedback['color'],
                    'fontColor' => $feedback['fontColor'],
                    'points' => $points,
                ]);
            }
        }

    }
}
