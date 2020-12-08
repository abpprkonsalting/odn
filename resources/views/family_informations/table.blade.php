@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered family_informations-datatable">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Next Of Kins</th>
            <th>Family Status</th>
            <th>Province</th>
            <th>Municipality</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    @include('layouts.datatables_js')
    <script type="text/javascript">
        $(function () {
          
        var table = $('.family_informations-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('familyInformations.getPersonalInformationFamily', ['id' => $personalInformation->id]) }}",
            columns: [
                {data: 'full_name', name: 'full_name'},
                {data: 'birth_date', name: 'birth_date'},
                {data: 'next_of_kind.name', name: 'next_of_kins_id'},
                {data: 'family_status.name', name: 'family_status_id'},
                {data: 'province.name', name: 'provinces_id'},
                {data: 'municipality.name', name: 'municipalities_id'},
                {data: 'phone_number', name: 'phone_number'}, 
                {data: 'address', name: 'address'}, 
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
            });
          
        });
      </script>
@endpush