import Shufflejs from 'shufflejs'

const container = document.querySelector('#rooms-list')
let filters = []

if (container) {
    const shuffle = new Shufflejs(container, {
        itemSelector: '.col',
    })

    jQuery('input[name="shuffle-filter"]').on('change', function (ev) {
        const input = ev.currentTarget;
        if (input.checked) {
            input.parentElement.classList.add('active')
            filters.push(input.value)
        } else {
            input.parentElement.classList.remove('active')
            filters.splice(filters.indexOf(input.value), 1)
        }

        shuffle.filter(filters)
    });
}


