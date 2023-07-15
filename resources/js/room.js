import $ from 'jquery';
import select2 from 'select2';
select2($);

$('document').ready(function() {
    InitializeSelect2();
});

function InitializeSelect2()
{
    if($('.select2').length > 0){
        $('.select2').select2({
            placeholder: "Serveis de l'habitació",
            allowClear: true,
            multiple: true,
            class: "form-control"
        });
    }
}