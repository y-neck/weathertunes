# Weathertunes
Weathertunes sammelt alle 30 Minuten die aktuellen Wetterdaten der Stadt Bern, um dir bei jeder Wetterlage eine passende Spotify-Playlist zusammenzustellen.

## Übersicht

### Data Flow

![Flowchart](https://github.com/y-neck/weathertunes/blob/main/frontend/public/img/documentation/api_flowchart_weathertunes.drawio.svg)

Weathertunes speichert alle 30 Minuten das aktuelle Wetter der [OpenMeteo](https://open-meteo.com/) API in einer Datenbank. Über eine weitere Datenbank wird das aktuelle Wetter der Wetterbeschreibung zugeordnet und im Frontend der Website dem Nutzer angezeigt.

Klicken Nutzende auf den Button "TUNE IN", so wird eine Anfrage an die [SPOTIFY API](https://developer.spotify.com/) gesendet, welche aufgrund von vordefinierten Werten eine entsprechende Playlist passend zum Wetter generiert. Diese wird anschliessend im Frontend angezeigt.
Sollte die Anfrage nicht erfolgreich sein, so wird eine vordefinierte Spotify-Playlist als Fallback-Option angezeigt.

### Screen Design
Für das Design haben wir mit einem Bento Box System gearbeitet. Um den Schriftgrad optimal den Boxen anzupassen, entschieden wir uns für die variable Schrift "Roboto Flex".
Ebenfalls wollten wir, dass sich das Design je nach Wetter verändert. Dazu haben wir für jede Wetterlage ein eigenes Farbschema zusammengestellt, welches dynamisch auf der Website angepasst wird.

## Reflexion

### Learnings
Insgesamt sind wir mit unserem Resultat sehr zufrieden, obwohl es noch viel Verbesserungspotential gibt. Daher wird die Website sicherlich von Zeit zu Zeit weiterentwickelt werden.

### Schwierigkeiten
Die Integration der Spotify Web API war aufgrund einer unvollständigen Dokumentation von Seiten Spotify die grösste Herausforderung.

### Verwendete Ressourcen
OpenMeteo API = https://open-meteo.com/en/docs
Spotify Web API = https://developer.spotify.com/documentation/web-api