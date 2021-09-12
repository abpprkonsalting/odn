@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered course-datatable">
    <thead>
        <tr>
            <th>Country</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Course Number</th>
            <th>Certificate Number</th>
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
          
          var table = $('.course-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('course.getPersonalInformationCourse', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'country.name', name: 'country'},
                  {data: 'start_date', name: 'start_date'}, 
                  {data: 'end_date', name: 'end_date'}, 
                  {data: 'course_number.name', name: 'course_number'}, 
                  {data: 'certificate_number', name: 'certificate_number'}, 
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