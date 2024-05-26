const spotifyParametersUrl = './backend/db/04_unloadSpotify.php';
const weatherdataUrl = './backend/db/05_mergeCurrentWeather.php'; // Needed for easter eggs

// Get html elements
const tuneInBtn = document.querySelector('#play-button');
const pauseBtn = document.querySelector('#recommendations-player-pause');
const spotifyText = document.querySelector('#spotify-text');
const iframePlayer = document.querySelector('#spotify-iframe');
const recommendationsPlayer = document.querySelector('#spotify-recommendations-player');
const weathermixPlayer = document.querySelector("#weathermix-player");

// Hide pause btn
pauseBtn.style.display = "none";
weathermixPlayer.style.display = "none";

// Event listener for tune in button
tuneInBtn.addEventListener('click', () => {

    // Rename button, remove info text
    tuneInBtn.textContent = "REMIX";
    spotifyText.style.display = "none";
    // Reset track list on remix
    document.querySelector('#recommendations-player-list').innerHTML = '';

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
                // // Debug:
                // console.log('Current Playlist Properties: ', data)
                let playerFallbackUrl = data.fallbackPlaylist;
                iframePlayer.innerHTML = `<iframe id="spotify-fallback-player" style="border-radius:12px" src="${playerFallbackUrl}" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>`;
                document.querySelector('#weathermix-player').style.display = "none";
            });
    } catch (error) {
        console.error(error);
    }

    // Get and display playlist
    if (localStorage.getItem("access_token")) {
        getPlaylist();
        weathermixPlayer.style.display = "block";
        pauseBtn.style.display = "block";
        // // Debug:
        // console.log("Playlist loaded")
    }
}
);

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
            .then(async data => {
                // // Debug:
                // console.log('Spotify Parameters: ', data);

                // Get request parameters
                let paramSeedGenre = data.seedGenre.replace(/['"]+/g, ''); // Remove quotes
                let paramMinAcousticness = data.minAcousticness;
                let paramMaxAcousticness = data.maxAcousticness;
                let paramMinDanceability = data.minDanceability;
                let paramMaxDanceability = data.maxDanceability;
                let paramMinEnergy = data.minEnergy;
                let paramMaxEnergy = data.maxEnergy;
                let paramMaxSpeechyness = data.maxSpeechyness;
                let paramMinValence = data.minValence;
                let paramMaxValence = data.maxValence;

                let genPlaylistUrl = `https://api.spotify.com/v1/recommendations?limit=20&seed_genres=${paramSeedGenre}&min_acousticness=${paramMinAcousticness}&max_acousticness=${paramMaxAcousticness}&min_danceability=${paramMinDanceability}&max_danceability=${paramMaxDanceability}&min_energy=${paramMinEnergy}&max_energy=${paramMaxEnergy}&max_speechiness=${paramMaxSpeechyness}&min_valence=${paramMinValence}&max_valence=${paramMaxValence}`;

                // // Debug:
                // console.log('API Fetch url: ', genPlaylistUrl);

                // fetch spotify data
                async function getRecommendations(genPlaylistUrl) {
                    // Get access token
                    let accessToken = localStorage.getItem("access_token");
                    if (!accessToken) {
                        console.error('Access token is missing');
                        // Display
                        return;
                    }

                    // Fetch recommendations using bearer token
                    const recommendationsResponse = await fetch(genPlaylistUrl, {
                        headers: {
                            Authorization: 'Bearer ' + accessToken  // Send bearer token with request
                        }
                    });
                    const recommendationsData = await recommendationsResponse.json();
                    // Debug:
                    console.log('Recommendation data: ', recommendationsData);

                    // Hijack spotify player :)

                    // Get user profle status to determine if fallback playlist should be displayed (player only works for premium users)
                    const profileEndpoint = "https://api.spotify.com/v1/me";
                    const profile = await fetch(profileEndpoint, {
                        headers: {
                            Authorization: 'Bearer ' + accessToken  // Send bearer token with request
                        }
                    });

                    const profileData = await profile.json();
                    const spotifyProduct = profileData.product;
                    // // Debug:
                    // console.log('Profile Data: ', profileData, spotifyProduct);

                    if (recommendationsResponse.ok && spotifyProduct === "premium") {
                        // Deactivate fallback playlist if data is available and profile is premium
                        iframePlayer.style.display = "none";

                        // Add recommendations to queue: https://developer.spotify.com/documentation/web-api/reference/add-to-queue
                        try {
                            for (const track of recommendationsData.tracks) {
                                const uri = track.uri.replace(/:/g, '%3A');
                                // // Debug:
                                // const uri = "spotify%3Atrack%3A4iV5W9uYEdYUVa79Axb7Rh"
                                const queueEndpoint = `https://api.spotify.com/v1/me/player/queue?uri=${uri}`;
                                await fetch(queueEndpoint, {
                                    method: 'POST',
                                    headers: {
                                        Authorization: 'Bearer ' + accessToken  // Send bearer token with request
                                    }

                                });

                                // Append tracks to track list
                                const recommendationsList = document.querySelector('#recommendations-player-list');
                                if (recommendationsList) {
                                    const li = document.createElement('li');
                                    li.className = "trackTitle";
                                    li.textContent = track.name;
                                    recommendationsList.appendChild(li);
                                    console.log('Track queued: ', track.name);
                                } else {
                                    console.error('Recommendations list element not found');
                                }
                            }
                        } catch (error) {
                            console.log(error)
                        }
                    }
                }


                getRecommendations(genPlaylistUrl);

                const accessToken = localStorage.getItem("access_token");

                // Play/pause btns: https://developer.spotify.com/documentation/web-api/reference/start-a-users-playback
                const playFunction = "https://api.spotify.com/v1/me/player/play";
                try {
                    await fetch(playFunction, {
                        method: 'PUT',
                        headers: {
                            Authorization: 'Bearer ' + accessToken  // Send bearer token with request
                        }
                    });
                } catch (error) {
                    console.error('Error playing playlist:', error);
                }

                //Skip one track to start with queue directly 
                const skipEndpoint = "https://api.spotify.com/v1/me/player/next";
                try {
                    await fetch(skipEndpoint, {
                        method: 'POST',
                        headers: {
                            Authorization: 'Bearer ' + accessToken  // Send bearer token with request
                        }
                    });
                } catch (error) {
                    console.error('Error skipping track:', error);
                }
            });
    } catch (error) {
        console.log(error);
    }
}

// Pause playback button
pauseBtn.addEventListener('click', async () => {
    const accessToken = localStorage.getItem("access_token");
    const pauseFunction = "https://api.spotify.com/v1/me/player/pause";
    try {
        await fetch(pauseFunction, {
            method: 'PUT',
            headers: {
                Authorization: 'Bearer ' + accessToken  // Send bearer token with request
            }
        });
    } catch (error) {
        console.error('Error pausing playback:', error);
    }
});
