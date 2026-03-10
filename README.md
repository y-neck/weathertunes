# Weathertunes
Weathertunes sammelt alle 30 Minuten die aktuellen Wetterdaten der Stadt Bern, um dir bei jeder Wetterlage eine passende Spotify-Playlist zusammenzustellen.

> Weathertunes wird momentan überarbeitet. Bald erwartet dich v2!

## Übersicht

### Data Flow

![Flowchart](https://github.com/y-neck/weathertunes/blob/main/public/img/documentation/api_flowchart_weathertunes.drawio.svg)

Weathertunes ruft alle 30 Minuten das aktuelle Wetter der [OpenMeteo](https://open-meteo.com/)-API ab und speichert es in einer Datenbank. Das aktuelle Wetter wird der entsprechenden Wetterbeschreibung zugeordnet und im Frontend der Website dem Nutzer angezeigt.
Um eine möglichst durchschnittliche Wetterlage für die gesamte Schweiz zu erhalten, wird das aktuelle Wetter der Wetterstation Payerne CH verwendet.

Klicken Nutzende auf den Button "TUNE IN", so wird eine Anfrage an die [SPOTIFY-API](https://developer.spotify.com/) gesendet, welche aufgrund von vordefinierten Werten eine entsprechende Playlist passend zum Wetter generiert. Diese wird anschliessend im Frontend angezeigt.
Sollte die Anfrage nicht erfolgreich sein, so wird eine vordefinierte Spotify-Playlist als Fallback-Option angezeigt.

### Screen Design
Für das Design haben wir mit einem Bento-Box-System gearbeitet. Um den Schriftgrad optimal den Boxen anzupassen, entschieden wir uns für die variable Schrift "Roboto Flex".
Ebenfalls wollten wir, dass sich das Design je nach Wetter verändert. Dazu haben wir für jede Wetterlage ein eigenes Farbschema zusammengestellt, welches ausgehend vom aktuellen Wetter dynamisch auf der Website angepasst wird.

### Verwendete Ressourcen
OpenMeteo API = https://open-meteo.com/en/docs
Spotify Web API = https://developer.spotify.com/documentation/web-api
