@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered seaman_book-datatable">
    <thead>
        <tr>
            <th>Number</th>
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
          
          var table = $('.seaman_book-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('seamanBook.getPersonalInformationSeamanBook', ['id' => $personalInformation->id]) }}",
              columns: [
                {data: 'number', name: 'number'},
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