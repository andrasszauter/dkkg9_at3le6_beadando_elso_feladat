$(document).ready(function () {
    $('#menu-kilepes a').click(function (e) {
        e.preventDefault();
        $('<form>')
            .attr('action', $(this).attr('href'))
            .attr('method', 'POST')
            .appendTo('body')
            .submit();
    });
});
