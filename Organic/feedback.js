document.getElementById("feedbackForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent actual form submission

    // Show success message
    document.getElementById("successMessage").classList.remove("hidden");

    // Reset the form
    document.getElementById("feedbackForm").reset();
});
