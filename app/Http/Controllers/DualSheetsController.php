<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\DiaryEvaluation;
use App\Models\DualSheet;
use App\Models\Person;
use App\Models\Grade;
use App\Models\JobEvaluation;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DualSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'course' => 'nullable|numeric|not_in:0',
            'atutor' => 'nullable|numeric|not_in:0',
            'ctutor' => 'nullable|numeric|not_in:0',
            'company' => 'nullable|numeric|not_in:0',
            'syear' => 'nullable|numeric|not_in:0',
            'graduated' => 'nullable|numeric|not_in:0|max:1',
            'notactive' => 'nullable|numeric|not_in:0|max:1',
        ]);

        // recoger lisado de alumno de la database
        $students = Person::students();
        $courses = Course::hasDual();
        $academicTutors = Person::allAcademicTutors();
        $companies = Company::all();
        $companyTutors = Person::companyTutors();
        $schoolYears = SchoolYear::all();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');
        $course = $request->query('course');
        $atutor = $request->query('atutor');
        $company = $request->query('company');
        $syear = $request->query('syear');
        $graduated = (bool)$request->query('graduated');
        $notactive = (bool)$request->query('notactive');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        if ($course) {
            $students->isStudentOfGrade($course);
        }

        if ($atutor) {
            $students->isStudentOfTutor($atutor);
        }

        if ($company) {
            $students->isStudentOfCompany($company);
        }

        if ($syear) {
            $students->isStudentOfSchoolYear($syear);
        }

        if ($graduated) {
            $students->hasStudentDualSheetsGraduated();
        }

        $students->hasStudentDualSheetsGraduated(!$notactive);

        return view('dualSheets.index', [
            // info de la DB
            'students' => $students->paginate(13),
            'courses' => $courses->get(),
            'academicTutors' => $academicTutors->get(),
            'companies' => $companies,
            'companyTutors' => $companyTutors->get(),
            'schoolYears' => $schoolYears,
            // terminos de busqueda previos
            'old_search' => $search,
            'old_course' => $course,
            'old_atutor' => $atutor,
            'old_company' => $company,
            'old_syear' => $syear,
            'old_graduated' => $graduated,
            'old_notactive' => $notactive,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Person::students();
        $tutors = Person::studentTutors();
        $companies = Company::all();
        $schoolYears = SchoolYear::orderBy('end', 'desc');
        $courses = Course::all();

        return view('dualSheets.create', [
            'students' => $students->get(),
            'tutors' => $tutors->get(),
            'companies' => $companies,
            'schoolYears' => $schoolYears->get(),
            'courses' => $courses,
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
            'student' => 'required|numeric|min:1',
            'tutor' => 'required|numeric|min:1',
            'company' => 'required|numeric|min:1',
            'year' => 'required|numeric|min:1',
            'course' => 'required|numeric|min:1',
        ]);

        $studentId = (int)$request->student;

        $sheet = new DualSheet([
            'student_id' => $studentId,
            'tutor_id' => (int)$request->tutor,
            'company_id' => (int)$request->company,
            'school_year_id' => (int)$request->year,
            'course_id' => (int)$request->course,
            'active' => true,
            'graduated' => false,
        ]);
        $sheet->save();

        DiaryEvaluation::factory()->create([
            'sheet_id' => $sheet->id,
        ]);

        JobEvaluation::factory()->create([
            'sheet_id' => $sheet->id,
        ]);

        return Redirect::route('dualSheets.show', [$studentId]);
    }

    /**
     * Historico de fichas duales de un alumno
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Person::where('id', '=', $id)->get()->first();
        if (!$student) {
            abort(404);
        }

        $sheets = $student->studentSheets()->latest()->get();
        return view('dualSheets.show', [
            'student' => $student,
            'sheets' => $sheets,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $student = Person::where('id', '=', $id)->get()->first();
        if (!$student) {
            abort(404);
        }

        if (($sheetId = $request->query('sheet', 0)) > 0) {
            $sheet = DualSheet::where('id', $sheetId)->first();
        } else {
            abort(404);
        }

        $students = Person::students();
        $tutors = Person::allAcademicTutors();
        $companies = Company::all();
        $schoolYears = SchoolYear::orderBy('end', 'desc');
        $courses = Course::all();

        return view("dualSheets.edit", [
            'student' => $student,
            'sheet' => $sheet,
            'students' => $students->get(),
            'tutors' => $tutors->get(),
            'companies' => $companies,
            'schoolYears' => $schoolYears->get(),
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  DualSheet $dualSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DualSheet $dualSheet)
    {
        $request->validate([
            'student' => 'required|numeric|min:1',
            'tutor' => 'required|numeric|min:1',
            'company' => 'required|numeric|min:1',
            'year' => 'required|numeric|min:1',
            'course' => 'required|numeric|min:1',
        ]);

        $dualSheet->student_id = (int)$request->student;
        $dualSheet->tutor_id = (int)$request->tutor;
        $dualSheet->company_id = (int)$request->company;
        $dualSheet->school_year_id = (int)$request->year;
        $dualSheet->course_id = (int)$request->course;

        $dualSheet->save();

        return Redirect::route('dualSheets.show', [
            $dualSheet->student_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DualSheet $dualSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(DualSheet $dualSheet)
    {
        $studentId = $dualSheet->student_id;
        
        DualSheet::destroy($dualSheet->id);
        return Redirect::route('dualSheets.show', [
            $studentId
        ]);
    }
}
