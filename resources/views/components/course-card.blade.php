<div class="col-md-4 mb-4 d-flex">
    <div class="card w-100 h-100 course-card">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $course->title }}</h5>
            <!-- Hier zetten we een limiet op de beschrijving zodat de kaart niet te groot wordt. We gebruiken de Str::limit helper van Laravel om de tekst af te kappen na 100 tekens. -->
            <div class="mb-2">
            <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($course->description, 100) }}</p>
                <span class="badge bg-{{ $course->is_active ? 'success' : 'secondary' }}">
                    {{ $course->is_active ? 'ACTIVE' : 'INACTIVE' }}
                </span>
            </div>
            <form action="/courses/{{ $course->id }}/toggle" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary">
                    {{ $course->is_active ? 'Deactivate' : 'Activate' }}
                </button>
            </form>
        </div>
        <div class="card-footer text-muted">
            Created: {{ $course->created_at?->format('M d, Y') ?? 'Unknown' }}
        </div>
    </div>
</div>
