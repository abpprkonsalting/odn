@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered memo-datatable">
    <thead>
        <tr>
            <th>Note</th>
            <th>Date</th>
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
          
          var table = $('.memo-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('memo.getPersonalInformationMemo', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'note', name: 'note'},
                  {data: 'memo_date', name: 'memo_date'}, 
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