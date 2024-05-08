document.addEventListener("DOMContentLoaded", function() {
    const userTypeSelect = document.getElementById("user");
    const emailInput = document.querySelector('input[type="text"]');
    const adminPlaceholder = "Username";
    const studentPlaceholder = "Student Number";
    const userLogo = document.getElementById("userLogo");

    userTypeSelect.addEventListener("change", function() {
        const selectedUserType = userTypeSelect.value;
        if (selectedUserType === "admin") {
            emailInput.placeholder = adminPlaceholder;
            userLogo.src = "../images/adminLOGO.png";
        } else {
            emailInput.placeholder = studentPlaceholder;
            userLogo.src = "../images/studentLOGO.png";
        }
    });

});