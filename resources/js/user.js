$('document').ready(function() {
    InitializeButtons();
});

function InitializeButtons()
{
    $('#btn-rooms').on('click', function(e){
        $('#user-rooms').show();
        $('#user-bookings').hide();
        $('#user-booking-requests').hide();
    });

    $('#btn-bookings').on('click', function(e){
        $('#user-rooms').hide();
        $('#user-bookings').show();
        $('#user-booking-requests').hide();
    });

    $('#btn-requests').on('click', function(e){
        $('#user-rooms').hide();
        $('#user-bookings').hide();
        $('#user-booking-requests').show();
    });
}