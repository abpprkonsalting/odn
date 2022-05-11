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
              ajax: "{{ route('seaGoingExperience.getPersonalInformationSeaGoingExperience', ['id' => $personalInformation->id]) }}",
              columns: [
                {data: 'rank.name', name: 'rank_id'},
                {data: 'vessel.name', name: 'vessel_id'},
                {data: 'status.name', name: 'status_id'},
                  {data: 'start_date', name: 'start_date'},
                  {data: 'end_date', name: 'end_date'},
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
