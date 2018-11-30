$(document).ready(function () {

    let $alert = $('#alert');
    let $result = $('#result');

    $(document).on('click', '#submitBtn', function (e) {
        e.preventDefault();
        dismissError();
        clearResult();

        let attempts = $('form').find('input[name=attempts]').val();

        if (attempts <= 0 || false === $.isNumeric(attempts)) {
            displayError("Input must be an integer greater than 1");
            return false;
        }

        let url = Routing.generate('simulation', {attempts: attempts});

        displaySpinner();

        $.ajax(url, {
            success: function (html) {
                $result.html(html);
            },
            error: function (xhr, status, error) {
                displayError(error);
                clearResult();
            }
        });
    });

    function displayError(message) {
        $alert.html(message).show();
    }

    function dismissError() {
        $alert.html('').hide();
    }

    function clearResult() {
        $result.html('');
    }

    function displaySpinner() {
        $result.html('<div class="loader">Loading...</div>');
    }
});
