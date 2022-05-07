@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('.table').dataTable();
            if (dataTable != undefined) {
                var settings = dataTable.fnSettings();
                settings.fnDisplayEnd = function() {
                    var coloredCells = $("[class^='datatable-cell-color-']");
                    coloredCells.each(function($event) {
                        if (!$(this).hasClass("parent-colored")) {
                            var colorClass = $(this).attr("class");
                            $(this).parent().addClass(colorClass);
                            $(this).parent().addClass("parent-colored");
                        }
                    });
                    return true;
                }
            }
        });
    </script>
@endpush
