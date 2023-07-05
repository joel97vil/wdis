import datepicker from 'js-datepicker';
import { split } from 'lodash';

const customDays = ['Dil.', 'Dim.', 'Dix.', 'Dij.', 'Div.', 'Dis.', 'Diu.'];
const customMonths = ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'];

let initial_datepicker = null;
let final_datepicker = null;
let occupated_dates = [];


$('document').ready(function() {
    //Other events
    $('#book').on('click', function(){
        $('#div-form').show();
        $(this).hide();
    });

    GetUnavailableDates();
});

async function GetUnavailableDates()
{
    let url = '/booking/getDates/';
    let id = parseInt($('#room_id').val());

    await $.ajax({
        method: 'get',
        url: url + id,
        success: function(data){
            let dates = [];

            for(let i = 0; i < JSON.parse(data).length; i++)
            {
                let curr_data = JSON.parse(data)[i].date;
                let date = split(curr_data, ' ')[0];
                let year = parseInt(split(date, '-')[0]);
                let month = parseInt(split(date, '-')[1]);
                let day = parseInt(split(date, '-')[2]);
                dates.push(new Date(year, month - 1, day));
            }
            
            occupated_dates = dates;
        }
    });
    
    InitializeInitialDatepicker();
    InitializeFinalDatepicker();
}

function GetMinumumDate()
{
    let result = $('#initial_date').val();
    let ret = new Date();

    if(result != '')
    {
        let year = parseInt(split(result, '/')[2]);
        let month = parseInt(split(result, '/')[1]);
        let day = parseInt(split(result, '/')[0]);
        ret = new Date(year, month - 1, day);
    }

    return ret;
}

function InitializeInitialDatepicker()
{
    $('#initial_date').keypress(function(e) {
        e.preventDefault();
        return false;
    });

    if($('#initial_date').length == 1){
        //Initial datepicker definition
        initial_datepicker = datepicker('#initial_date', {
            onSelect: (instance, date) => {
                $('#final_date_label').show();
                $('#final_date').show();

                if($(this).val() != '' && $('#final_date').val() != '')
                {
                    $('#btn_book').removeAttr('disabled');
                } else {
                    $('#btn_book').prop('disabled', true);
                }

                if(date != null){
                    final_datepicker.setMin(date);
                }
            },
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value // => '1/1/2099'
            },
            showAllDates: true,
            customDays: customDays,
            customMonths: customMonths,
            disabledDates: occupated_dates,
            events: occupated_dates,
            minDate: new Date(),
        });
    }
}

function InitializeFinalDatepicker()
{
    $('#final_date').keypress(function(e) {
        e.preventDefault();
        return false;
    });

    if($('#final_date').length == 1){
        //Final datepicker definition
        final_datepicker = datepicker('#final_date', {
            onSelect: (instance, date) => {
                if($('#initial_date').val() != '' && $('#final_date').val() != '')
                {
                    $('#btn_book').removeAttr('disabled');
                } else {
                    $('#btn_book').prop('disabled', true);
                }
            },
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
                input.value = value // => '1/1/2099'
            },
            showAllDates: true,
            customDays: customDays,
            customMonths: customMonths,
            disabledDates: occupated_dates,
            events: occupated_dates,
            minDate: GetMinumumDate(),
        });
    }
}