@section('css')
@include('layouts.datatables_css')
@endsection

<table class="table table-bordered languageInformations-datatable">
    <thead>
        <tr>
            <th>Language</th>
            <th>Language Skill</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
@include('layouts.datatables_js')
<script type="text/javascript">
    $(function() {
        table = $('.languageInformations-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('languageInformation.getPersonalInformationLanguage', ['id' => $personalInformation->id]) }}",
            columns: [{
                    data: 'language.name',
                    name: 'languages_id'
                },
                {
                    data: 'language_skill.name',
                    name: 'language_skills_id'
                },
                {
                    data: 'level.name',
                    name: 'levels_id'
                },
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