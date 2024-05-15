const spotifyParametersUrl = './backend/db/03_unloadSpotify.php'

// Get html elements
const tuneInBtn = document.querySelector('#play-button');
const player = document.querySelector('#spotify-container');

// Fetch parameter data
try {
    fetch(spotifyParametersUrl)
        .then(response => {
            // Check if the response is successful (status code 200)
            if (!response.ok) {
                throw new Error(Error);
            }
            // Parse the JSON response
            return response.json();
        })
        .then(data => {
            console.log('Spotify Parameters: ', data);
        })
} catch (error) {
    console.log(error)
}

// Event listener for tune in button
tuneInBtn.addEventListener('click', () => {
    console.log(data);
})
