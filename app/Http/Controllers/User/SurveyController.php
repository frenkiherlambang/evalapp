<?php

namespace App\Http\Controllers\User;

use App\Models\Survey;
use App\Models\Attempt;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SurveyController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index($id, BreadcrumbService $breadcrumbService): View
    {
        $breadcrumbs = $breadcrumbService->generateBreadcrumbs();
        return view('users.surveys.show', [
            'survey' => Survey::where('id', $id)->first(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function categoryShow($survey_id, $category_id, BreadcrumbService $breadcrumbService): View
    {
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $survey_id)->first();

        $surveyQuestionData = $attempt->survey_data;
        $surveyQuestionData = json_decode($surveyQuestionData, true);
        // dd($categories[0]['random_questions'][0]['random_choices']);
        $breadcrumbs = $breadcrumbService->generateBreadcrumbs();
        return view('users.surveys.categories.show', [
            'survey' => Survey::where('id', $survey_id)->first(),
            'category' => Category::where('id', $category_id)->first(),
            'breadcrumbs' => $breadcrumbs,
            'surveyQuestionData' => $surveyQuestionData[$category_id - 1],
        ]);
    }

    public function takeSurvey($id): RedirectResponse
    {
        // check if user has already attempted this survey
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $id)->first();
        if ($attempt) {
            return redirect()->route('users.surveys.show', [
                'id' => $id,
            ]);
        } else {
            $surveyData = Category::where('survey_id', $id)->with('randomQuestions', 'randomQuestions.randomChoices')->get()->toJson();
            $attempt = new Attempt();
            $attempt->user_id = auth()->id();
            $attempt->survey_id = $id;
            $attempt->survey_data = $surveyData;
            $attempt->save();
        }        
        return redirect()->route('users.surveys.show', [
            'id' => $id
        ]);
    }
}
