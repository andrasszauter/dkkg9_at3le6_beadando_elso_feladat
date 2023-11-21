$(document).ready(function () {
    const minDate = new Date($('#datum').attr('data-min'));
    const maxDate = new Date($('#datum').attr('data-max'));

    $('#datum').pickadate({
        format: 'yyyy-mm-dd',
        min: minDate,
        max: maxDate,
        clear: ''
    });
});
