function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.navigate-after-close').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const targetHref = link.getAttribute('href');

            // Close the offcanvas
            const offcanvasElement = document.getElementById('offcanvasWithBackdrop');
            const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);

            if (offcanvasInstance) {
                offcanvasInstance.hide();

                // Wait for transition to finish before navigating
                offcanvasElement.addEventListener('hidden.bs.offcanvas', function handleNav() {
                    window.location.href = targetHref;
                    offcanvasElement.removeEventListener('hidden.bs.offcanvas', handleNav); // cleanup
                });
            } else {
                // fallback in case offcanvas instance not found
                window.location.href = targetHref;
            }
        });
    });
});

function showLogin() {
    document.getElementById('compatibility-check').scrollIntoView({ behavior: 'smooth' });
    $("#loginDiv").show();
    $("#signupDiv").hide();
}

function showRegister() {
    document.getElementById('compatibility-check').scrollIntoView({ behavior: 'smooth' });
    $("#loginDiv").hide();
    $("#signupDiv").show();
}