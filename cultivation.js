// Define an object to store crop information
const cropInfo = {
    crop1: "Cultivation tips for Crop 1...",
    crop2: "Cultivation tips for Crop 2...",
    // Add more crop information as needed
};

// Add click event listeners to each crop icon
document.querySelectorAll('.crop-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        const cropName = this.getAttribute('data-crop');
        const cultivationTips = cropInfo[cropName];

        // Display the cultivation tips in an alert (you can customize this)
        alert(cultivationTips);
    });
});
