import { redirectToAuthCodeFlow } from "./spotifyAuth.config.js";
import { getAccessToken } from "./spotifyAuth.config.js";
import { fetchProfile } from "./spotifyAuth.config.js";

const spotifyParametersUrl = './backend/db/04_unloadSpotify.php';
const weatherdataUrl = './backend/db/05_mergeCurrentWeather.php';

// Get html elements
const tuneInBtn = document.querySelector('#play-button');
const player = document.querySelector('#spotify-container');

// Event listener for tune in button
tuneInBtn.addEventListener('click', () => {
    console.log("tune in button clicked");

    // Load fallback playlist
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
                console.log('Current Playlist Properties: ', data)
                let playerFallbackUrl = data.fallbackPlaylist
                player.innerHTML = `<iframe style="border-radius:12px" src="${playerFallbackUrl}" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>`
            })
    } catch (error) {
        console.error(error);
    }
    // TODO: Check auth -> if not logged in, get api token
    if (!fetchProfile) {





        // TODO: call spotifyAuth
    }
    // getPlaylist();
}
)

// Fetch parameter data
function getPlaylist() {
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

                // TODO: create url with parameters

                // TODO: fetch spotify data

                // TODO: insert spotify data into html


            })
    } catch (error) {
        console.log(error)
    }
}
