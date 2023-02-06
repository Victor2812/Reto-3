<form action="" method="GET">
                
    <!-- Row -->
    <div class="row mb-0 mb-sm-3 gx-0">

        <!-- Buscador -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
            <div class="form-outline">
                <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value="{{ $old_search }}"/>
            </div>
        </div>

        <!-- Grado -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
            <div class="form-group">
                <select class="form-select" name="grado">
                    <option value="" selected>Grado</option> <!-- TODO cargar grados -->
                </select>
            </div> 
        </div>

        <!-- Tutor Academico -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                <div class="form-group">
                    <select class="form-select" name="atutor">
                        <option value="" @selected(!$old_atutor)>Tutor Académico</option>
                        @foreach ($academicTutors as $tutor)
                            <option value="{{ $tutor->id }}" @selected($old_atutor == $tutor->id)>{{ $tutor->fullName() }}</option>
                        @endforeach
                    </select>
                </div>
        </div>

        <!-- Empresa -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
            <div class="form-group">
                <select class="form-select" name="company">
                    <option value="" @selected(!$old_company)>Empresa</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" @selected($old_company == $company->id)>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-0 mb-sm-3 gx-0">

        <!-- Tutor Empresa -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
            <div class="form-group">
                <select class="form-select" name="ctutor">
                    <option value="" selected>Tutor Empresa</option> <!-- TODO cargar empresa -->
                    @foreach ($companyTutors as $tutor)
                        <option value="{{ $tutor->id }}">{{ $tutor->fullName() }}</option> <!-- TODO cargar cursos -->
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Curso -->
        <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
            <div class="form-group">
                <select class="form-select" name="course">
                    <option value="" @selected(!$old_course)>Curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @selected($course->id == $old_course)>{{ $course->toText() }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Año Academico -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
            <div class="form-group">
                <select class="form-select" name="syear">
                    <option value="" @selected(!$old_syear)>Año academico</option>
                    @foreach ($schoolYears as $year)
                        <option value="{{ $year->id }}" @selected($year->id == $old_syear)>{{ $year->toText() }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Checkboxes -->
        <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">

            <!-- Titulados -->
            <div class="form-check d-flex justify-content-center align-items-center">
                <input class="form-check-input" type="checkbox" value="1" name="graduated" id="graduated" @checked($old_graduated)>
                <label class="form-check-label px-2 mt-1" for="graduated">
                    Titulados
                </label>
            </div>

            <!-- No Activos -->
            <div class="form-check d-flex justify-content-center align-items-center">
                <input class="form-check-input" type="checkbox" value="1" name="notactive" id="notactive" @checked($old_notactive)>
                <label class="form-check-label px-2 mt-1" for="notactive">
                    No Activos
                </label>
            </div>

        </div>
        <!-- End Checkboxes -->

        <!-- Submit -->
        <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
            <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
        </div>


    </div>
    <!-- End Row -->
</form>