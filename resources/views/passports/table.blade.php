@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered passport-datatable">
    <thead>
        <tr>
            <th>No Passport</th>
            <th>Expedition Date</th>
            <th>Expiry Date</th>
            <th>Extension Date</th>
            <th>Expity Extension Date</th>
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
          
          var table = $('.passport-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('passport.getPersonalInformationPassport', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'no_passport', name: 'no_passport'},
                  {data: 'expedition_date', name: 'expedition_date'}, 
                  {data: 'expiry_date', name: 'expiry_date'}, 
                  {data: 'extension_date', name: 'extension_date'}, 
                  {data: 'expiry_extension_date', name: 'expiry_extension_date'}, 
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