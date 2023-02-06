<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Grade;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC');

        return view('companies.index', [
            'companies' => $companies->paginate(13),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $availableTutors = Person::companyTutors()->availableCompanyTutors();

        return view('companies.create', [
            'tutors' => $availableTutors->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'cif' => 'required|string|min:9|max:9',
            'location' => 'required|string|max:255',
            'tutor' => 'nullable|numeric|min:0|not_in:0',
        ]);

        $company = new Company([
            'name' => $request->name,
            'CIF' => $request->cif,
            'location' => $request->location,
        ]);

        // TODO: añadir tutor

        $company->save();

        return Redirect::route('companies.show', [$company->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $availableTutors = Person::companyTutors()->availableCompanyTutors();

        return view('companies.edit', [
            'company' => $company,
            'tutors' => $availableTutors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'cif' => 'required|string|min:9|max:9',
            'location' => 'required|string|max:255',
            'tutor' => 'nullable|numeric|min:0|not_in:0',
        ]);

        $company->name = trim($request->name);
        $company->CIF = trim($request->cif);
        $company->location = trim($request->location);
        // TODO: añadir tutor

        $company->save();

        return Redirect::route('companies.edit', [$company->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return Redirect::route('companies.index');
    }
}
