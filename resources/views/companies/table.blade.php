@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered company-datatable">
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Current</th>
            <th>Engine Type</th>
            <th>Rank</th>
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
          
          var table = $('.company-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('company.getPersonalInformationCompany', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'company_name', name: 'company_name'},
                  {data: 'current', name: 'current'}, 
                  {data: 'engine_type.name', name: 'engine_type'}, 
                  {data: 'rank.name', name: 'rank'}, 
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