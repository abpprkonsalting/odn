@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered shore_experiencies-datatable">
    <thead>
        <tr>
            <th>Name</th>
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
          
          var table = $('.shore_experiencies-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('shoreExperiencie.getPersonalInformationExperiencie', ['id' => $personalInformation->id]) }}",
              columns: [
                {data: 'name', name: 'name'},
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