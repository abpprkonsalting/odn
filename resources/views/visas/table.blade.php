@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered visa-datatable">
    <thead>
        <tr>
            <th>Visa Types</th>
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
          
          var table = $('.visa-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('visa.getPersonalInformationVisa', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'visa_type.name', name: 'visa_types_id'},
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