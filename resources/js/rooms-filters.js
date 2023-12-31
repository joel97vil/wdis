import Shufflejs from 'shufflejs';

const container = document.querySelector('#rooms-list');
const enter_keycode = '13';

let filters = [];

if (container) {
    const shuffle = new Shufflejs(container, {
        itemSelector: '.col',
    });

    $('input[name="shuffle-filter"]').on('change', function (ev) {
        const input = ev.currentTarget;
        if (input.checked) {
            input.parentElement.classList.add('active');
            filters.push(input.value);
        } else {
            input.parentElement.classList.remove('active');
            filters.splice(filters.indexOf(input.value), 1);
        }

        shuffle.filter(filters);
    });

    $('.shuffle-filter').on('change', function(event) {
        const input = event.currentTarget;
        if(input.value) {
            filters.splice(filters.find(x => x.indexOf("e_") > -1) || x.indexOf("tp_") > -1);
            filters.push(input.value);
        }

        shuffle.filter(filters);
    });

    $('.shuffle-filter').on('keyup', function(event) {
        //const input = event.currentTarget;
        const searchTxt = event.currentTarget.value.toLowerCase().trim();

        if(event.keyCode == enter_keycode) {
            shuffle.filter((element, obj) => {
                const name = element.getAttribute('data-name').toLowerCase().trim();
                const city = element.getAttribute('data-city').toLowerCase().trim();
                const establishment = element.getAttribute('data-establishment-name').toLowerCase().trim();
                const occupancy = element.getAttribute('data-occupancy').trim();
                const address = element.getAttribute('data-address').toLowerCase().trim();
                
                return name.includes(searchTxt) || city.includes(searchTxt) || establishment.includes(searchTxt) || occupancy.includes(searchTxt) || address.includes(searchTxt);
            });
        }
    });
}


