<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $companies = Company::orderBy('id', 'DESC');

        $search = $request->query('search');

        if ($search) {
            $companies->bySearchTerms($search);
        }

        return view('companies.index', [
            'companies' => $companies->paginate(13),

            'old_search' => $search,
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
            'tutor' => 'required|numeric|min:1',
        ]);

        $company = new Company([
            'name' => $request->name,
            'CIF' => $request->cif,
            'location' => $request->location,
            'person_id' => (int)$request->tutor
        ]);

        $company->save();

        return Redirect::route('companies.show', [$company->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Company $company)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'course' => 'nullable|numeric|not_in:0',
            'graduated' => 'nullable|numeric|not_in:0',
            'notactive' => 'nullable|numeric|not_in:0',
        ]);

        $coordinator = $company->person;
        $students = Person::isStudentOfCompany($company->id);
        $courses = Course::all();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');
        $course = $request->query('course');
        $graduated = (bool)$request->query('graduated');
        $notactive = (bool)$request->query('notactive');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        if ($course) {
            $students->isStudentOfGrade($course);
        }

        if ($graduated) {
            $students->hasStudentDualSheetsGraduated();
        }

        $students->hasStudentDualSheetsGraduated($notactive);
        return view('companies.show', [
            'company' => $company,
            'coordinator' => $coordinator,
            'students' => $students->paginate(13),
            'courses' => $courses,

            'old_search' => $search,
            'old_course' => $course,
            'old_graduated' => $graduated,
            'old_notactive' => $notactive,
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
        $availableTutors = Person::companyTutors()->availableCompanyTutors()->orWhere('id', $company->person_id);

        return view('companies.edit', [
            'company' => $company,
            'tutors' => $availableTutors->get(),
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
        $company->person_id = (int)$request->tutor;

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
