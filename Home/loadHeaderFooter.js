// loadHeaderFooter.js

// Function to load the header
function loadHeader() {
    const headerContainer = document.getElementById('header-container');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'header.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            headerContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Function to load the footer
function loadFooter() {
    const footerContainer = document.getElementById('footer-container');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'footer.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            footerContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Call the functions to load header and footer
loadHeader();
loadFooter();
