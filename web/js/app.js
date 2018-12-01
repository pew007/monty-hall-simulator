$(document).ready(function () {

    let $alert = $('#alert');
    let $result = $('#result');
    let $input = $('input[name=attempts]');
    let $submit = $('#submitBtn');

    $input.on('keyup', function () {
        let input = $(this).val();

        if (false === $.isNumeric(input) || input >= 1000000) {
            displayError("Please enter an integer between 1 and 999999");
            disableSubmit();
        } else {
            dismissError();
            enableSubmit();
        }
    });

    $submit.on('click', function (e) {
        e.preventDefault();
        dismissError();
        clearResult();

        displaySpinner();

        $.ajax(Routing.generate('simulation', {attempts: $input.val()}), {
            success: function (html) {
                $result.html(html);
            },
            error:   function (xhr, status, error) {
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

    function disableSubmit() {
        $submit.prop('disabled', true);
    }

    function enableSubmit() {
        $submit.prop('disabled', false);
    }
});
