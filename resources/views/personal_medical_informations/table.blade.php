@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered personal_medical_informations-datatable">
    <thead>
        <tr>
            <th>Medical Information</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>
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
          
          var table = $('.personal_medical_informations-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('personalMedicalInformation.getPersonalInformationMedical', ['id' => $personalInformation->id]) }}",
              columns: [
                {data: 'medical_information.name', name: 'medical_informations_id'},
                {data: 'issue_date', name: 'issue_date'},
                {data: 'expiry_date', name: 'expiry_date'}, 
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