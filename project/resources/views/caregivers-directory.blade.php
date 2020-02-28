@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h1>Caregivers Directory</h1>

            <ul class="pagination justify-content-end" style="margin:20px 0">
                {{ $caregivers->links() }}
            </ul>

            <table class="table table-sm table-bordered table-striped mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Agency</th>
                    </tr>
                </thead>
                <tbody>
                  <!-- Iterating throught the caregiver records to get the data from database -->
                    @foreach ($caregivers as $caregiver)
                    <tr>
                        <td>{{ $caregiver->name }}</td>
                        <td>{{ $caregiver->email }}</td>
                        <td>{{ $caregiver->position }}</td>
                        <!-- getting the caregiver agency name -->
                        <td>{{ ($caregiver->agency)->name }}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
