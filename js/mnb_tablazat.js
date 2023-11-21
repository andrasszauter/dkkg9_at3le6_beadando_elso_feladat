$(document).ready(function () {
    const minDate = new Date($('#datum').attr('data-min'));
    const maxDate = new Date($('#datum').attr('data-max'));

    $('#datum').pickadate({
        format: 'yyyy-mm',
        min: minDate,
        max: maxDate,
        clear: '',
        selectYears: true,
        selectMonths: true
    });

    if (typeof(chartData) !== 'undefined') {
        const d1 = $('#deviza1').find(":selected").text();
        const d2 = $('#deviza2').find(":selected").text();
        const label = d1 + ' - ' + d2 + ' árfolyam';

        const chart = new Chart(document.getElementById('mnb_chart'), {
            type: 'line',
            data: {
                labels: chartData.map(row => row.date),
                datasets: [
                    {
                        label: label,
                        data: chartData.map(row => row.rate)
                    }
                ]
            }
        });
    }
});
