// Function to fetch agriculture data
async function fetchAgricultureData() {
    const API_URL = 'https://bloomberg-api.p.rapidapi.com/bloomberg/agriculture'

    try {
        const response = await fetch(API_URL, {
            headers: {
                'X-RapidAPI-Key': '55cdedbea8msha7ce66d4412ea79p1f4ca6jsn2a05e28e6d70',
                'X-RapidAPI-Host': 'bloomberg-api.p.rapidapi.com'
            }
        });

        if (!response.ok) {
            throw new Error('Failed to fetch data');
        }

        const data = await response.json();
        displayAgricultureData(data);
    } catch (error) {
        console.error(error);
        alert('An error occurred while fetching agriculture data.');
    }
}

// Function to display agriculture data on the webpage
function displayAgricultureData(data) {
    const tableBody = document.querySelector('.table-body');

    // Clear existing table data
    tableBody.innerHTML = '';

    // Loop through agriculture data and create table rows
    Object.keys(data).forEach(key => {
        const commodity = data[key];
        // Determine if change is positive or negative
        const changeClass = commodity.Change > 0 ? 'positive-change' : 'negative-change';
        // Dynamically apply classes to table cells based on change value
        const row = `
            <tr class="table-row">
                <td class="table-data">
                    <h3>
                        <span class="coin-name">${commodity.name || 'N/A'}</span>
                    </h3>
                </td>
                <td class="table-data last-price">${commodity.Price || 'N/A'} ${commodity.Units || 'N/A'}</td>
                <td class="table-data last-update ${changeClass}">${commodity.Change || 'N/A'}</td>
                <td class="table-data market-cap ${changeClass}">${commodity['%Change'] || 'N/A'}</td>
                <td class="table-data">${commodity.Contract || 'N/A'}</td>
                <td class="table-data">${commodity['Time (EDT)'] || 'N/A'}</td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// Fetch agriculture data when the page loads
fetchAgricultureData();
