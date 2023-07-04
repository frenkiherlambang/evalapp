<?php

namespace App\Http\Controllers\User;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use App\Http\Controllers\Controller;
use App\Models\Attempt;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function __invoke(): \Illuminate\View\View
    {
        $breadcrumbs = new BreadcrumbService();
        $breadcrumbs = $breadcrumbs->generateBreadcrumbs();
        Survey::all();
        
        return view('users.dashboard', [
            'breadcrumbs' => $breadcrumbs,
            'surveys' => Survey::all()
        ]);
    }
}
