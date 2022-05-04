@extends('partials.pdf')

@section('content')
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path() . "/img/logo.png" }}">
        </div>
        <h1>CURRICULUM VITAE</h1>
        <div id="project">
            <div><span>Full Name</span> {{ $personalInformation->full_name}}</div>
            <div><span>Birth Date</span> {{ $personalInformation->birthday}}</div>
            <div><span>Birth Place</span> {{ $personalInformation->birthplace}}</div>
            <div><span>Nationality</span> {{ $personalInformation->birthplace}}</div>
            <div><span>Marital Status</span>{{ $personalInformation->maritalStatus->name}}</div>
            <div><span> Height  (cm)</span> {{ $personalInformation->height}}</div>
            <div><span>Weight  (lb)</span> {{ $personalInformation->weight}}</div>
            <div><span>Sex</span> {{ $personalInformation->sex}}</div>
        </div>
        <div id="avatar">
            @if (!empty($personalInformation->avatar))
                <img src="{{ public_path() . "/$personalInformation->avatar" }}">
            @endif
        </div>

    </header>
    <h3>ADDRESS</h3>
    <table>
        <tbody>
            <tr>
                <td class="width50"><p class="text-left">{{ $personalInformation->address}}</p></td>
                <td class="width50"><p class="text-left">Municipality:{{ $personalInformation->municipality->name}}</p>
                    <p class="text-left">Province:{{ $personalInformation->province->name}}</p>
                    <p class="text-left">Principal Phone:{{ $personalInformation->principal_phone}}</p>
                    <p class="text-left">Secondary Phone:{{ $personalInformation->secondary_phone}}</p>
                    <p class="text-left">Cell Phone:{{ $personalInformation->cell_phone}}</p>
                    <p class="text-left">Email:{{ $personalInformation->email}}</p>
                </td>

            </tr>
        </tbody>
    </table>

    <main>
        <h3>NEXT OF KIN INFORMATION </h3>
        <table>
            <tbody>
                @foreach ($personalInformation->familyInformations as $familyInformation)
                    <tr>
                        <th class="th-align-left"><b>FULL NAME</b></th>
                        <th class="th-align-left" colspan="3">{{ $familyInformation->full_name}}</th>
                    </tr>
                    <tr>
                        <td><b>NEXT OF KING</b></td>
                        <td >{{ $familyInformation->nextOfKind->name }}</td>
                        <td ><b>FAMILY STATUS</b></td>
                        <td >{{ $familyInformation->familyStatus->name }}</td>
                    </tr>
                    <tr>
                        <td ><b>BIRTH DATE</b></td>
                        <td >{{ $familyInformation->birth_date }}</td>
                        <td ><b>PHONE NUMBER</b></td>
                        <td >{{ $familyInformation->phone_number }}</td>
                    </tr>
                    <tr>
                        <td ><b>PROVINCE</b></td>
                        <td >{{ $familyInformation->province->name }}</td>
                        <td ><b>MUNICIPALITY</b></td>
                        <td >{{ $familyInformation->municipality->name }}</td>
                    </tr>
                    <tr>
                        <td><b>ADDRESS</b></td>
                        <td colspan="3">{{ $familyInformation->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>PASSPORTS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">NO PASSPORT</th>
                        <th class="th-align-left">Expedition Date</th>
                        <th class="th-align-left">Expiry Date</th>
                        <th class="th-align-left">Extension Date</th>
                        <th class="th-align-left">Expity Extension Date</th>
                    </tr>
                    @foreach ($personalInformation->passports as $passport)
                    <tr>
                        <td>{{ $passport->no_passport }}</td>
                        <td>{{ $passport->expedition_date }}</td>
                        <td>{{ $passport->expiry_date }}</td>
                        <td>{{ $passport->extension_date }}</td>
                        <td>{{ $passport->expiry_extension_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>SEAMAN BOOKS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Number</th>
                        <th class="th-align-left">Issue Date</th>
                        <th class="th-align-left">Expiry Date</th>

                    </tr>
                    @foreach ($personalInformation->seamanBooks as $seamanBook)
                    <tr>
                        <td>{{ $seamanBook->number}}</td>
                        <td>{{ $seamanBook->issue_date }}</td>
                        <td>{{ $seamanBook->expiry_date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>MEDICAL INFORMATIONS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Medical Certificates</th>
                        <th class="th-align-left">Issue Date</th>
                        <th class="th-align-left">Expiry Date</th>

                    </tr>
                    @foreach ($personalInformation->personalMedicalInformations as $personalMedicalInformation)
                    <tr>
                        <td>{{ $personalMedicalInformation->medicalInformation->name}}</td>
                        <td>{{ $personalMedicalInformation->issue_date }}</td>
                        <td>{{ $personalMedicalInformation->expiry_date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>COURSES</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Country</th>
                        <th class="th-align-left">Course Number</th>
                        <th class="th-align-left">Certificate Number</th>
                        <th class="th-align-left">Issue Date</th>

                    </tr>
                    @foreach ($personalInformation->courses as $course)

                    <tr>
                        <td>{{ $course->country->name}}</td>
                        <td>{{ $course->courseNumber->name }}</td>
                        <td>{{ $course->certificate_number }}</td>
                        <td>{{ $course->issue_date }}</td>

                    </tr>

                @endforeach
            </tbody>
        </table>
        <h3>OTHER SKILLS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Skill Or Knowledge</th>
                        <th class="th-align-left">Place Or School</th>
                        <th class="th-align-left">Knowledge Date</th>
                        <th class="th-align-left">Empirical</th>

                    </tr>
                    @foreach ($personalInformation->otherSkills as $otherSkill)
                    <tr>
                        <td>{{ $otherSkill->skill_or_knowledge}}</td>
                        <td>{{ $otherSkill->place_or_school }}</td>
                        <td>{{ $otherSkill->knowledge_date }}</td>
                        <td>{{ $otherSkill->empirical }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>SHORE EXPERIENCIES</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Name</th>
                        <th class="th-align-left">Issue Date</th>
                        <th class="th-align-left">Expiry Date</th>


                    </tr>
                    @foreach ($personalInformation->shoreExperiencies as $shoreExperiencie)
                    <tr>
                        <td>{{ $shoreExperiencie->name}}</td>
                        <td>{{ $shoreExperiencie->issue_date }}</td>
                        <td>{{ $shoreExperiencie->expiry_date }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>LICENSES & ENDORSEMENTS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Number</th>
                        <th class="th-align-left">Countries</th>
                        <th class="th-align-left">License Endorsement Types</th>
                        <th class="th-align-left">License Endorsement Names</th>
                        <th class="th-align-left">Issue Date</th>
                        <th class="th-align-left">Expiry Date</th>


                    </tr>
                    @foreach ($personalInformation->licenseEndorsements as $licenseEndorsement)
                    <tr>
                        <td>{{ $licenseEndorsement->number}}</td>
                        <td>{{ $licenseEndorsement->country->name }}</td>
                        <td>{{ $licenseEndorsement->licenseEndorsementType->name }}</td>
                        <td>{{ $licenseEndorsement->licenseEndorsementName->name }}</td>
                        <td>{{ $licenseEndorsement->issue_date }}</td>
                        <td>{{ $licenseEndorsement->expiry_date }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>MEMOS</h3>
        <table>
            <tbody>

                    <tr>
                        <th class="th-align-left">Memo Date</th>
                        <th class="th-align-left">Note</th>



                    </tr>
                    @foreach ($personalInformation->memos as $memo)
                    <tr>
                        <td>{{ $memo->memo_date}}</td>
                        <td>{{ $memo->note}}</td>



                    </tr>
                @endforeach
            </tbody>
        </table>
        {{--
        <h3>COMPANY</h3>
        <table>
            <tbody>
                @foreach ($personalInformation->companies as $company)
                    <tr>
                        <th class="th-align-left"><b>COMPANY NAME</b></th>
                        <th class="th-align-left" colspan="3">{{ $company->company_name}}</th>
                    </tr>
                    <tr>
                        <th class="th-align-left"><b>ENGINE TYPE</b></th>
                        <th class="th-align-left" colspan="3">{{ $company->engineType->name}}</th>
                        <th class="th-align-left"><b>VESSEL</b></th>
                        <th class="th-align-left" colspan="3">{{ $company->vessel}}</th>
                    </tr>
                    <tr>
                        <th class="th-align-left"><b>SIGN ON DATE</b></th>
                        <th class="th-align-left" colspan="3">{{ $company->sign_on_date}}</th>
                        <th class="th-align-left"><b>SIGN OFF DATE</b></th>
                        <th class="th-align-left" colspan="3">{{ $company->sign_off_date}}</th>
                    </tr>

                    <tr>

                        <td ><b>FLAG</b></td>
                        <td >{{ $company->flag->name }}</td>
                        <td><b>CURRENT</b></td>
                        <td >{{ $company->current }}</td>
                        <td ><b>DTW</b></td>
                        <td >{{ $company->dtw }}</td>
                        <td ><b>FIX OVER TIME</b></td>
                        <td >{{ $company->fix_over_time }}</td>


                    </tr>
                    <tr><td ><b>RANK</b></td>
                        <td >{{ $company->rank->name }}</td>
                        <td ><b>GROSS TONNAGE</b></td>
                        <td >{{ $company->gross_tonnage }}</td>
                        <td ><b>BPH</b></td>
                        <td >{{ $company->bph}}</td>
                        <td ><b>POWER KW</b></td>
                        <td >{{ $company->power_kw }}</td>
                    </tr>
                    <tr>
                        <td ><b>LEAVE PAY</b></td>
                        <td >{{ $company->leave_pay }}</td>
                        <td ><b>BASIC SALARY</b></td>
                        <td >{{ $company->basic_salary }}</td>
                        <td ><b>CONTRACT PERIOD</b></td>
                        <td >{{ $company->contract_period }}</td>
                        <td ><b>TOTAL SALARY</b></td>
                        <td >{{ $company->total_salary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>--}}
    </main>
@endsection
