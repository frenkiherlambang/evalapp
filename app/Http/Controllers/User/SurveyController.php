<?php

namespace App\Http\Controllers\User;

use App\Models\Survey;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

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
        $questions = Question::where('category_id', $category_id)->inRandomOrder()->paginate(1);
        $breadcrumbs = $breadcrumbService->generateBreadcrumbs();
        return view('users.surveys.categories.show', [
            'survey' => Survey::where('id', $survey_id)->first(),
            'category' => Category::where('id', $category_id)->first(),
            'breadcrumbs' => $breadcrumbs,
            'questions' => $questions,
        ]);
    }
}
