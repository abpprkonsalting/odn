$(document).ready(function() {
    if ($("#province_id").length > 0) {
        var currentProvince = $("#province_id").val();
        if (currentProvince != "") {
            loadMunicipalities(currentProvince);
            $("#province_id").change(function(){
                var selectedProvinceId = $(this).val();
                loadMunicipalities(selectedProvinceId);
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