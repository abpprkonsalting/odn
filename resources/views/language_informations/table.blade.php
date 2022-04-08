@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-bordered course-datatable">
    <thead>
        <tr>
            <th>Language</th>
            <th>Language Skill</th>
            <th>Level</th>            
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    @include('layouts.datatables_js')
    <script type="text/javascript">
        $(function () {
          
          var table = $('.language_informations-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('languageInformations.getPersonalInformationLanguage', ['id' => $personalInformation->id]) }}",
              columns: [
                  {data: 'language.name', name: 'language'},
                  {data: 'language_skill.name', name: 'Language_skill'},                   
                  {data: 'level.name', name: 'level'},                   
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