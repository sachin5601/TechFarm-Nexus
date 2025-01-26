// Function to load the header
function loadHeader() {
    const headerContainer = document.getElementById('header-container');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../headerFooter/header.html', true); // Adjusted path for header
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            headerContainer.innerHTML = xhr.responseText;
        } else if (xhr.readyState === 4) {
            console.error('Failed to load header:', xhr.status); // Error handling
        }
    };
    xhr.send();
}

// Function to load the footer
function loadFooter() {
    const footerContainer = document.getElementById('footer-container');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../headerFooter/footer.html', true); // Adjusted path for footer
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            footerContainer.innerHTML = xhr.responseText;
        } else if (xhr.readyState === 4) {
            console.error('Failed to load footer:', xhr.status); // Error handling
        }
    };
    xhr.send();
}

// Call the functions to load header and footer
document.addEventListener("DOMContentLoaded", function() {
    loadHeader();
    loadFooter();
});
