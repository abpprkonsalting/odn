<!-- Personal Information Id Field -->
{!! Form::hidden('personal_informations_id', isset($personalInformation->id) ? $personalInformation->id : $operationalInformation->personalInformation->id ) !!}


<div class="col-xs-12">
    <div class="row">
        <!-- Disponibility Date Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('disponibility_date', 'Disponibility Date:') !!}
            <div class="input-group date">
                {!! Form::text('disponibility_date', null, ['class' => 'form-control datepicker', 'id' => 'disponibility_date', 'autocomplete' => 'off']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>

        @push('scripts')
        <script type="text/javascript">
            //Date picker
            $('#disponibility_date').datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy'
            })
        </script>
        @endpush

        <!-- Rank Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ranks_id', 'Rank:') !!}
            {!! Form::select('ranks_id', $rankItems, null, ['class' => 'form-control']) !!}
        </div>
    </div>


</div>
<div class="col-xs-12">
    <div class="row">
        <!-- Status Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('statuses_id', 'Status:') !!}
            {!! Form::select('statuses_id', $statusesItems, null, ['class' => 'form-control'], $statusesItemsAttributes) !!}
        </div>

        @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                document.hideShowVessel = function($event) {
                    selected = $($event.target.options[$event.target.options.selectedIndex])
                    isOnBoardStatus = selected.attr('data-onboard');
                    if (isOnBoardStatus == undefined) {
                        $('#vessel-form-group').hide();
                    } else {
                        $('#vessel-form-group').show();
                    }
                }
                statusesSelect = $('#statuses_id');
                if (statusesSelect != undefined) {
                    $('#statuses_id').change(statusesSelect,document.hideShowVessel);
                    $event = {}
                    $event.target = statusesSelect[0];
                    document.hideShowVessel($event);
                }
            });
        </script>
        @endpush

        <!-- Vessel Id Field -->
        <div id="vessel-form-group" class="form-group col-sm-6">
            {!! Form::label('vessel_id', 'Vessel:') !!}
            {!! Form::select('vessel_id', $vesselItems, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>