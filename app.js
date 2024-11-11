$(document).ready(function() {
    // AJAX for Sign In
    $('#signin-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var username = $('#signin-username').val();
        var password = $('#signin-password').val();

        $.ajax({
            url: 'signin.php',
            type: 'POST',
            data: { username: username, password: password },
            success: function(response) {
                $('#signin-result').html(response); // Display the response
            },
            error: function() {
                $('#signin-result').html('An error occurred. Please try again.');
            }
        });
    });

    // AJAX for Sign Up
    $('#signup-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var username = $('#signup-username').val();
        var password = $('#signup-password').val();

        $.ajax({
            url: 'signup.php',
            type: 'POST',
            data: { username: username, password: password },
            success: function(response) {
                $('#signup-result').html(response); // Display the response
            },
            error: function() {
                $('#signup-result').html('An error occurred. Please try again.');
            }
        });
    });
});
