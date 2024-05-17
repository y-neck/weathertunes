const clientId = ''; // Replace with your client ID
const params = new URLSearchParams(window.location.search);
const redirectUri = ''
const code = params.get("code");

const getAccessToken = async (clientId, code) => {
    // Get code verifier from localStorage
    const verifier = localStorage.getItem("verifier");

    // Set request parameters
    const params = new URLSearchParams();
    params.append("client_id", clientId); // Add client ID
    params.append("grant_type", "authorization_code"); // Grant type is "authorization_code"
    params.append("code", code); // Add authorization code from callback
    params.append("redirect_uri", redirectUri); // Add redirect URI
    params.append("code_verifier", verifier); // Add code verifier from localStorage

    // Fetch access token
    const result = await fetch("https://accounts.spotify.com/api/token", {
        method: "POST", // Use POST method
        headers: { "Content-Type": "application/x-www-form-urlencoded" }, // Set header for URL-encoded data
        body: params // Set request body with params
    });

    // Parse JSON response and return access_token
    const { access_token } = await result.json();
    return access_token;
}

/**
 * Redirects user to Spotify's authorization code flow
 * @param {string} clientId Spotify client ID
 */
const redirectToAuthCodeFlow = async (clientId) => {
    const verifier = generateCodeVerifier(128); // Generate PKCE code verifier
    const challenge = await generateCodeChallenge(verifier); // Generate SHA-256 challenge from code verifier

    localStorage.setItem("verifier", verifier); // Store code verifier in localStorage

    const params = new URLSearchParams();
    params.append("client_id", clientId); // Add client ID
    params.append("response_type", "code"); // Set response type to "code"
    params.append("redirect_uri", redirectUri); // Add redirect URI
    params.append("scope", "user-read-private user-read-email"); // Add scopes
    params.append("code_challenge_method", "S256"); // Set challenge method to SHA-256
    params.append("code_challenge", challenge); // Add challenge generated from code verifier

    document.location = `https://accounts.spotify.com/authorize?${params.toString()}`; // Redirect user to Spotify's authorization code flow
}

// Fetch user profile
const fetchProfile = async (token) => {
    const result = await fetch("https://api.spotify.com/v1/me", {
        method: "GET", headers: { Authorization: `Bearer ${token}` }
    });
    return await result.json();

}


if (!code) {
    console.log('Code not found')
    redirectToAuthCodeFlow(clientId);
} else {
    const accessToken = await getAccessToken(clientId, code);
    const profile = await fetchProfile(accessToken);

    //console.log(code);
    // console.log('Access token:', accessToken);
    // console.log('Profile:', profile);

}



/**
 * Generates a PKCE code verifier
 * @param {number} length Length of code verifier
 * @returns {string} PKCE code verifier
 */
function generateCodeVerifier(length) {
    let text = '';
    let possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for (let i = 0; i < length; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}

/**
 * Generates SHA-256 challenge from code verifier
 * @param {string} codeVerifier PKCE code verifier
 * @returns {Promise<string>} SHA-256 challenge
 */
async function generateCodeChallenge(codeVerifier) {
    const data = new TextEncoder().encode(codeVerifier);
    const digest = await window.crypto.subtle.digest('SHA-256', data);
    return btoa(String.fromCharCode.apply(null, [...new Uint8Array(digest)]))
        .replace(/\+/g, '-') // Replace + with - (see RFC 7636)
        .replace(/\//g, '_') // Replace / with _ (see RFC 7636)
        .replace(/=+$/, ''); // Remove any trailing =
}

// Export functions
export {
    redirectToAuthCodeFlow, getAccessToken, fetchProfile
}
