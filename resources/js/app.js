import './bootstrap';
import './booking';
import './room';
import './user';
import './rooms-filters';

let delete_dialog = 'Estàs segur/a de que ho vols borrar?';

$('document').ready(function() {
    $('.btn_delete').on('click', function(e){
        if(confirm(delete_dialog))
        {
            return true;
        } else {
            e.stopPropagation();
            e.preventDefault();
            return false;
        }
    });

    $('.cancel-booking').on('click', function(e){
        if(confirm("Estàs segur/a de que vols cancel·lar aquesta reserva?"))
        {
            return true;
        } else {
            e.stopPropagation();
            e.preventDefault();
            return false;
        }
    });

    $('.info-messages').fadeOut(6000);
    $('.error-messages').fadeOut(6000);
});
