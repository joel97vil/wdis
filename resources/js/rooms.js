import $ from 'jquery';
import select2 from 'select2';
select2($);

$('document').ready(function() {
    firstSearch();
    initializeLoadMore();
    initializeSelect2();
});

function initializeLoadMore()
{
    $('#load-more').on('click', function(e){
        //TODO: Ajax call to load 12 next rooms
    });
}

function firstSearch()
{
    if($('#general-filter').val().length > 0)
    {
        //TODO: Fire shufflejs filtering event
        $('#general-filter').trigger();
    }
}

function initializeSelect2()
{
    if($('.select2').length > 0){
        $('.select2').select2({
            placeholder: "Serveis de l'habitació",
            allowClear: true,
            theme: "classic"
        });
    }
}