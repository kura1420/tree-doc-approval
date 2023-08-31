<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companyWaitings = \App\Models\Document::where('status', 0)
            ->orderBy('company')
            ->select('company')
            ->distinct()
            ->get()
            ->map(function ($company) {
                $divisions = \App\Models\Document::where([
                        ['company', $company->company],
                        ['status', 0]
                    ])
                    ->orderBy('division')
                    ->select('division')
                    ->distinct()
                    ->get()
                    ->map(function ($division) use ($company) {
                        $depts = \App\Models\Document::where([
                                ['company', $company->company],
                                ['division', $division->division],
                                ['status', 0]
                            ])
                            ->orderBy('dept')
                            ->select('dept')
                            ->distinct()
                            ->get()
                            ->map(function ($dept) use ($company, $division) {
                                $documents = \App\Models\Document::where([
                                        ['company', $company->company],
                                        ['division', $division->division],
                                        ['dept', $dept->dept],
                                        ['status', 0]
                                    ])
                                    ->orderBy('dept')
                                    ->get();

                                $dept->documents = $documents;

                                return $dept;
                            });

                        $division->depts = $depts;

                        return $division;
                    });

                $company->divisions = $divisions;

                return $company;
            });

        $companyAccepts = \App\Models\Document::where('status', 1)
            ->orderBy('company')
            ->select('company')
            ->distinct()
            ->get()
            ->map(function ($company) {
                $divisions = \App\Models\Document::where([
                        ['company', $company->company],
                        ['status', 1]
                    ])
                    ->orderBy('division')
                    ->select('division')
                    ->distinct()
                    ->get()
                    ->map(function ($division) use ($company) {
                        $depts = \App\Models\Document::where([
                                ['company', $company->company],
                                ['division', $division->division],
                                ['status', 1]
                            ])
                            ->orderBy('dept')
                            ->select('dept')
                            ->distinct()
                            ->get()
                            ->map(function ($dept) use ($company, $division) {
                                $documents = \App\Models\Document::where([
                                        ['company', $company->company],
                                        ['division', $division->division],
                                        ['dept', $dept->dept],
                                        ['status', 1]
                                    ])
                                    ->orderBy('dept')
                                    ->get();

                                $dept->documents = $documents;

                                return $dept;
                            });

                        $division->depts = $depts;

                        return $division;
                    });

                $company->divisions = $divisions;

                return $company;
            });

        $companyRejects = \App\Models\Document::where('status', 2)
            ->orderBy('company')
            ->select('company')
            ->distinct()
            ->get()
            ->map(function ($company) {
                $divisions = \App\Models\Document::where([
                        ['company', $company->company],
                        ['status', 2]
                    ])
                    ->orderBy('division')
                    ->select('division')
                    ->distinct()
                    ->get()
                    ->map(function ($division) use ($company) {
                        $depts = \App\Models\Document::where([
                                ['company', $company->company],
                                ['division', $division->division],
                                ['status', 2]
                            ])
                            ->orderBy('dept')
                            ->select('dept')
                            ->distinct()
                            ->get()
                            ->map(function ($dept) use ($company, $division) {
                                $documents = \App\Models\Document::where([
                                        ['company', $company->company],
                                        ['division', $division->division],
                                        ['dept', $dept->dept],
                                        ['status', 2]
                                    ])
                                    ->orderBy('dept')
                                    ->get();

                                $dept->documents = $documents;

                                return $dept;
                            });

                        $division->depts = $depts;

                        return $division;
                    });

                $company->divisions = $divisions;

                return $company;
            });

        $documents = \App\Models\Document::get();

        return view('mobile.home', compact('documents', 'companyWaitings', 'companyAccepts', 'companyRejects'));
    }
}
