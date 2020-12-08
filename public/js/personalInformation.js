$(document).ready(function() {
    if ($("#province_id").length > 0) {
        var currentProvince = $("#province_id").val();
        if (currentProvince != "") {
            loadMunicipalities(currentProvince);
            $("#province_id").change(function() {
                var selectedProvinceId = $(this).val();
                loadMunicipalities(selectedProvinceId);
            });
        }
    }

    if($("#license_endorsement_types_id").length > 0) {
        var license_endorsement_types_id = $("#license_endorsement_types_id").val();
        if(license_endorsement_types_id != "") {
            loadLicenseEndorsementNames(license_endorsement_types_id);
            $("#license_endorsement_types_id").change(function() {
                var selectedLicenseEndorsementType = $(this).val();
                loadLicenseEndorsementNames(selectedLicenseEndorsementType);
            });
        }
    }

    if($("input[name='same_address_as_marine']").length > 0) {
        if($("input[name='same_address_as_marine']").is(":checked")) {
            $("#containerAddressFields").hide();
        }

        $("input[name='same_address_as_marine']").change(function() {
            if($(this).is(":checked")) {
                $("#containerAddressFields").hide();

                var personalInformationId = $("input[name='personal_informations_id']").val();
                
                $.ajax({
                    'url': '/personalInformations/getAjaxPersonalInformationById/' + personalInformationId,
                    'method': 'GET',
                    'dataType': 'json',
                    'success': function(data) {
                        $("#province_id").val(data.province_id);
                        loadMunicipalities(data.province_id);
                        $("#municipality_id").val(data.municipality_id);
                        $("#address").val(data.address);
                        //console.log(data);
                    },
                    'error': function(jqXHR, textStatus, errorThrown){
                        console.log("Error Status: " + textStatus + ". Message: " + errorThrown);
                    }
                });
            } 
            else {
                $("#containerAddressFields").show();
            }
        });        
    }

    function loadLicenseEndorsementNames(licenseEndorsementType) {
        if(licenseEndorsementType != "") {
            $.ajax({
                'url': '/licenseEndorsementNames/getAjaxByLicenseEndorsementTypeId/' + licenseEndorsementType,
                'method': 'GET',
                'dataType': 'json',
                'success': function(data){
                    var $dropdown = $("#license_endorsement_names_id");
                    $dropdown.html("");
                    $.each(data, function() {
                        $dropdown.append($("<option />").val(this.id).text(this.name));
                    });
                },
                'error': function(jqXHR, textStatus, errorThrown){
                    console.log("Error Status: " + textStatus + ". Message: " + errorThrown);
                }
            });
        }
    }

    function loadMunicipalities(provinceId) { 
        if (provinceId != "") {
            $.ajax({
                'url': '/province/getAjaxProvinceById/' + provinceId,
                'method': 'GET',
                'dataType': 'json',
                'success': function(data){
                    var $dropdown = $("#municipality_id");
                    $dropdown.html("");
                    $.each(data.municipalities, function() {
                        $dropdown.append($("<option />").val(this.id).text(this.name));
                    });
                },
                'error': function(jqXHR, textStatus, errorThrown){
                    console.log("Error Status: " + textStatus + ". Message: " + errorThrown);
                }
            });
        }
    }
});