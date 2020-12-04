@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered licenseEndorsement-datatable">
    <thead>
        <tr>
            <th>Number:</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>
            <th>Countries</th>
            <th>License Endorsement Types </th>
            <th>License Endorsement Names </th>
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
          
          var table = $('.licenseEndorsement-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('licenseEndorsement.getPersonalInformationLicense', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'number', name: 'number'},
                  {data: 'issue_date', name: 'issue_date'},
                  {data: 'expiry_date', name: 'expiry_date'},
                  {data: 'country.name', name: 'countries_id'},
                  {data: 'license_endorsement_type.name', name: 'license_endorsement_types_id'},
                  {data: 'license_endorsement_name.name', name: 'license_endorsement_names_id'},
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