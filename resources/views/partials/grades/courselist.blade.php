<div class="d-flex">
    @foreach ($courses as $course)
        <span @class(['grade-course', 'active' => $course->has_dual])>{{ $course->name }}</span>
    @endforeach
</div>