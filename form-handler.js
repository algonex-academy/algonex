$(document).ready(function () {
    // Handle form submission
    $("form").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        // Validate form fields
        if (name === "" || email === "" || subject === "" || message === "") {
            alert("Please fill in all fields.");
            return;
        }

        // Simple email validation regex
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        // Create form data object
        var formData = {
            name: name,
            email: email,
            subject: subject,
            message: message
        };

        // Send data using AJAX
        $.ajax({
            url: "thank-you.php", // Your PHP script to handle form submission
            type: "POST",
            data: formData,
            success: function (response) {
                // If the form is successfully submitted, show a success message
                alert("Message sent successfully!");
                // Optionally, reset the form after successful submission
                $("form")[0].reset();
            },
            error: function (xhr, status, error) {
                // If there is an error, show an error message
                alert("An error occurred. Please try again.");
            }
        });
    });
});
