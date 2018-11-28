$(document).ready(function () {

    $(document).on('click', '#submitBtn', function (e) {
        e.preventDefault();

        let attempts = $('form').find('input[name=attempts]').val();
        let url = Routing.generate('simulation', {attempts: attempts});
        let $result = $('#results');

        $result.html('<div class="loader">Loading...</div>');

        $result.load(url, function () {

        });
    })

});
