@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered sea_going_experiencies-datatable">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Vessel</th>
            <th>Status</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Contract Time</th>
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
          
          var table = $('.sea_going_experiencies-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('seaGoingExperiencie.getPersonalInformationExperiencie', ['id' => $personalInformation->id]) }}",
              columns: [
                {data: 'rank.name', name: 'rank'},
                {data: 'vessel.name', name: 'vessel'},
                {data: 'status.name', name: 'status'},
                  {data: 'start_date', name: 'start_date'},
                  {data: 'end_date', name: 'end_date'}, 
                  {data: 'contract_time', name: 'contract_time'},
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