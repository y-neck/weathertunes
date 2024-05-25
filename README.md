# weathertunes

## Übersicht

### Data Flow

![Flowchart](https://github.com/y-neck/weathertunes/blob/main/frontend/public/img/documentation/api_flowchart_weathertunes.drawio.svg)

Weathertunes speichert alle 30 Minuten das aktuelle Wetter der [OpenMeteo](https://open-meteo.com/) API in einer Datenbank. Über eine weitere Datenbank wird das aktuelle Wetter der Wetterbeschreibung zugeordnet und im Frontend der Website dem Nutzer angezeigt.

Klicken Nutzende auf den Button "TUNE IN", so wird eine Anfrage an die [SPOTIFY API](https://developer.spotify.com/) gesendet, welche aufgrund von vordefinierten Werten eine entsprechende Playlist passend zum Wetter generiert. Diese wird anschliessend im Frontend angezeigt.
Sollte die Anfrage nicht erfolgreich sein, so wird eine vordefinierte Spotify-Playlist als Fallback-Option angezeigt.

### Screen Design

## Reflexion

### Learnings

### Schwierigkeiten

### Verwendete Ressourcen
