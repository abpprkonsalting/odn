<!-- Internal File Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('internal_file_number', 'Internal File Number:') !!}
    {!! Form::text('internal_file_number', null, ['class' => 'form-control']) !!}
</div>

<!-- External File Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('external_file_number', 'External File Number:') !!}
    {!! Form::text('external_file_number', null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    <div class="row">
        <!-- Full Name Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('full_name', 'Full Name:') !!}
            {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Id Number Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('id_number', 'ID Number:') !!}
            {!! Form::text('id_number', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Serial Number Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('serial_number', 'Serial Number:') !!}
            {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Birthday Field -->
<div class="form-group col-sm-6 date">
    {!! Form::label('birthday', 'Birthday:') !!}
    <div class="input-group date">
        {!! Form::text('birthday', null, ['class' => 'form-control datepicker', 'id' => 'birthday','autocomplete' => 'off']) !!}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Birthplace Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthplace', 'Birthplace:') !!}
    {!! Form::text('birthplace', null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    <div class="row">
        <!-- Province Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('province_id', 'Province:') !!}
            {!! Form::select('province_id', $provinceItems, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Municipality Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('municipality_id', 'Municipality:') !!}
            {!! Form::select('municipality_id', [], null, ['class' => 'form-control']) !!}
        </div>

        <!-- Address Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <!-- Principal Phone Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('principal_phone', 'Principal Phone:') !!}
            {!! Form::text('principal_phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Secondary Phone Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('secondary_phone', 'Secondary Phone:') !!}
            {!! Form::text('secondary_phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Cell Phone Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('cell_phone', 'Cell Phone:') !!}
            {!! Form::text('cell_phone', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <!-- Cell Phone Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('skin_color', 'Skin Color:') !!}
            {!! Form::text('skin_color', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Eyes Color Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('eyes_color_id', 'Eyes Color:') !!}
            {!! Form::select('eyes_color_id', $eyesColorIdItems, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Hair Color Id Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('hair_color_id', 'Hair Color:') !!}
            {!! Form::select('hair_color_id', $hairColorIdItems, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Height Field -->
<div class="form-group col-sm-6">
    {!! Form::label('height', 'Height:') !!}
    <div class="input-group">
        {!! Form::number('height', null, ['class' => 'form-control text-right']) !!}
        <span class="input-group-addon">cm</span>
    </div>
    
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    <div class="input-group">
        {!! Form::number('weight', null, ['class' => 'form-control text-right']) !!}
        <span class="input-group-addon">lb</span>
    </div>
    
</div>

<!-- Particular Sings Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<!-- particular_sings Field -->
<div class="form-group col-sm-6">
    {!! Form::label('particular_sings', 'Particular Sings:') !!}
    {!! Form::text('particular_sings', null, ['class' => 'form-control']) !!}
</div>

<!-- Political Integration Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('political_integration_id', 'Political Integration:') !!}
    {!! Form::select('political_integration_id', $politicalIntegrationItems, null, ['class' => 'form-control']) !!}
</div>

<!-- School Grade Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_grade_id', 'School Grade:') !!}
    {!! Form::select('school_grade_id', $schoolGradeIdItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Marital Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marital_status_id', 'Marital Status:') !!}
    {!! Form::select('marital_status_id', $maritalStatusIdItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex', 'Sex:') !!}
    {!! Form::select('sex', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    <div class="row">
        <div class="form-group col-sm-10">
            {!! Form::label('avatar', 'Avatar:') !!}
            {!! Form::file('avatar', null, ['class' => '']) !!}
        </div>
        @if(isset($personalInformation))
            <div class="col-sm-2">
                <img src="{{ $personalInformation->avatar}}" class="thumbnail pull-right" width="100px" height="auto"/>
            </div>
        @endif
    </div>
</div>


<!-- Relevant Action Field -->
<div class="form-group col-sm-12">
    {!! Form::label('relevant_action', 'Relevant Action:') !!}
    {!! Form::textarea('relevant_action', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personalInformations.index') }}" class="btn btn-default">Cancel</a>
</div>