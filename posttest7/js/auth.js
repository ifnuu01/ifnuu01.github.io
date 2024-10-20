
document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById("logout");

    logoutButton.addEventListener("click", function (event) {
        const confirmation = confirm("Are you sure you want to logout?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

