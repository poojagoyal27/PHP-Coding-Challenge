@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>Agencies <small class="text-muted">with caregiver count</small></h1>


<!-- adding pagination class to add paginate functionality on top of the table -->
    <ul class="pagination justify-content-end" style="margin:20px 0">
        {{ $agencies->links() }}
    </ul>

            <ul class="list-group mt-4">
                @foreach ($agencies as $agency)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('agencies.show', $agency) }}">{{ $agency->name }}</a>
                    <span class="badge badge-primary badge-pill">{{ $agency->caregivers_count }}</span>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
