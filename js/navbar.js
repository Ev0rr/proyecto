document.addEventListener("DOMContentLoaded", function () {
    const userIcon = document.getElementById('user-icon');
    const userOptions = document.getElementById('user-options');

    userIcon.addEventListener('click', function () {
        if (userOptions.style.display === 'block') {
            userOptions.style.display = 'none';
        } else {
            userOptions.style.display = 'block';
        }
    });

    document.addEventListener('click', function (event) {
        const isClickInside = userIcon.contains(event.target);
        if (!isClickInside) {
            userOptions.style.display = 'none';
        }
    });
});
