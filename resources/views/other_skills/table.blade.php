@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered skill-datatable">
    <thead>
        <tr>
            <th>Skill Or Knowledge</th>
            <th>Place Or School</th>
            <th>Knowledge Date</th>
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
          
          var table = $('.skill-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('otherSkills.getPersonalInformationSkill', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'skill_or_knowledge', name: 'skill_or_knowledge'},
                  {data: 'place_or_school', name: 'place_or_school'}, 
                  {data: 'knowledge_date', name: 'knowledge_date'}, 
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