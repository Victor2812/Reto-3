<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Person;
use App\Models\Company;
use App\Models\DualSheet;
use App\Models\Grade;


// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Students
Breadcrumbs::for('students.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Alumnos', route('students.index'));
});

Breadcrumbs::for('students.create', function (BreadcrumbTrail $trail) {
    $trail->parent('students.index');
    $trail->push('Nuevo Alumno', route('students.create'));
});

Breadcrumbs::for('students.show', function (BreadcrumbTrail $trail, Person $student) {
    $trail->parent('students.index');
    $trail->push('Ficha Dual ' . $student->fullName(), route('students.show', $student));
});

Breadcrumbs::for('students.edit', function (BreadcrumbTrail $trail, Person $student) {
    $trail->parent('students.index');
    $trail->push('Editar: ' . $student->fullName(), route('students.edit', $student));
});

// Tutors
Breadcrumbs::for('tutors.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tutores', route('tutors.index'));
});

Breadcrumbs::for('tutors.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tutors.index');
    $trail->push('Nuevo Tutor', route('tutors.create'));
});

Breadcrumbs::for('tutors.show', function (BreadcrumbTrail $trail, Person $tutor) {
    $trail->parent('tutors.index');
    $trail->push($tutor->fullName(), route('tutors.show', $tutor));
});

Breadcrumbs::for('tutors.edit', function (BreadcrumbTrail $trail, Person $tutor) {
    $trail->parent('tutors.index');
    $trail->push('Editar: ' . $tutor->fullName(), route('tutors.edit', $tutor));
});

// Coordinators
Breadcrumbs::for('coordinators.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Coordinadores', route('coordinators.index'));
});

Breadcrumbs::for('coordinators.create', function (BreadcrumbTrail $trail) {
    $trail->parent('coordinators.index');
    $trail->push('Nuevo Coordinador', route('coordinators.create'));
});

Breadcrumbs::for('coordinators.show', function (BreadcrumbTrail $trail, Person $coordinator) {
    $trail->parent('coordinators.index');
    $trail->push($coordinator->fullName(), route('coordinators.show', $coordinator));
});

Breadcrumbs::for('coordinators.edit', function (BreadcrumbTrail $trail, Person $coordinator) {
    $trail->parent('coordinators.index');
    $trail->push('Editar: ' . $coordinator->fullName(), route('coordinators.edit', $coordinator));
});

// Companies
Breadcrumbs::for('companies.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Empresas', route('companies.index'));
});

Breadcrumbs::for('companies.create', function (BreadcrumbTrail $trail) {
    $trail->parent('companies.index');
    $trail->push('Nueva Empresa', route('companies.create'));
});

Breadcrumbs::for('companies.show', function (BreadcrumbTrail $trail, Company $company) {
    $trail->parent('companies.index');
    $trail->push($company->name, route('companies.show', $company));
});

Breadcrumbs::for('companies.edit', function (BreadcrumbTrail $trail, Company $company) {
    $trail->parent('companies.index');
    $trail->push($company->name, route('companies.edit', $company));
});

// TODO Grades
Breadcrumbs::for('grades.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Grados', route('grades.index'));
});

Breadcrumbs::for('grades.edit', function (BreadcrumbTrail $trail, Grade $grade) {
    $trail->parent('grades.index');
    $trail->push('Editar: ' . $grade->name, route('grades.edit', $grade));
});

// TODO Charts
Breadcrumbs::for('charts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Estadísticas', route('charts.index'));
});

// TODO Diaries
Breadcrumbs::for('diaries.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Diario', route('diaries.index'));
});

// TODO Dual Sheets
Breadcrumbs::for('dualSheets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Fichas Duales', route('dualSheets.index'));
});

Breadcrumbs::for('dualSheets.show', function (BreadcrumbTrail $trail, Person $student) {
    $trail->parent('dualSheets.index');
    $trail->push('Fichas Duales' . $student->fullName(), route('dualSheets.show', $student));
});

Breadcrumbs::for('dualSheets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dualSheets.index');
    $trail->push('Nueva Ficha Dual', route('dualSheets.create'));
});

Breadcrumbs::for('dualSheets.edit', function (BreadcrumbTrail $trail, Person $student) {
    $trail->parent('dualSheets.show');
    $trail->push('Editar' . $student->fullName(), route('dualSheets.edit'));
});






/*
// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
*/
