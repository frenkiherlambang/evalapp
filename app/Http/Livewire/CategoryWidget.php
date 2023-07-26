<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Choice;
use Livewire\Component;
use App\Models\Category;
use App\Models\CategoryFeedback;
use Illuminate\Support\Facades\Log;

class CategoryWidget extends Component
{
    public $surveyQuestionData;
    public $questions = [];
    public $currentQuestion;
    public $currentQuestionId = 0;
    public $answers = [];
    public $attempt;

    protected $queryString = [
        'currentQuestionId' => ['except' => 0],
    ];

    public function mount()
    {
        $this->answers = Answer::where([
            'attempt_id' => $this->attempt->id,
            'survey_id' => $this->attempt->survey_id,
        ])->pluck('choice_id', 'question_id')->toArray();
    }


    public function updatingAnswers($value, $key)
    {
        $this->answers[$key] = $value;
        $selectedChoice = Choice::find($value);
        // dd($selectedChoice->question->category_id);
        Answer::updateOrCreate([
            'user_id' => auth()->id(),
            'question_id' => $key,
            'category_id' => $selectedChoice->question->category_id,
            'attempt_id' => $this->attempt->id,
            'survey_id' => $this->attempt->survey_id,
        ], [
            'choice_id' => $value,
            'answer' => $selectedChoice['content'],
            'is_correct' => $selectedChoice->is_correct,
            'points' => $selectedChoice->is_correct ? 5 : 0,
        ]);

        $points = Answer::where([
            'user_id' => auth()->id(),
            'category_id' => $selectedChoice->question->category_id,
        ])->sum('points');
        Log::debug('points: ' . $points);
        $category = Category::find($selectedChoice->question->category_id);
        $feedback = collect($category->feedbacks)->where('points', '>=', $points)->first();
        Log::debug('feedback: ' . $feedback['text'] ?? 'no feedback');
        if($feedback) {
            CategoryFeedback::updateOrCreate([
                'user_id' => auth()->id(),
                'category_id' => $selectedChoice->question->category_id,
            ], [
                'text' => $feedback['text'],
                'color' => $feedback['color'],
                'fontColor' => $feedback['fontColor'],
                'points' => $points,
            ]);
        }


    }

    public function changeQuestion($questionId)
    {
        $this->currentQuestionId = $questionId;
    }

    public function nextQuestion()
    {
        if($this->currentQuestionId < count($this->surveyQuestionData['random_questions']) - 1)
        {
            $this->currentQuestionId++;
        }
    }
    public function previousQuestion()
    {
        if($this->currentQuestionId > 0)
        {
            $this->currentQuestionId--;
        }
    }
    public function render()
    {
        $this->currentQuestion = $this->surveyQuestionData['random_questions'][$this->currentQuestionId];
        return view('livewire.category-widget', [
            'surveyQuestionData' => $this->surveyQuestionData,
            'currentQuestion' => $this->currentQuestion,
        ]);
    }
}
