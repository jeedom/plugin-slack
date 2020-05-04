Dieses Plugin stellt eine Verbindung zwischen Slack und Jeedom für her
Sende Benachrichtigungen von Jeedom oder chatte mit Jeedom (in
Interaktionen verwenden).

Plugin Konfiguration 
=======================

Nachdem Sie das Plugin heruntergeladen haben, müssen Sie es aktivieren, dies ist jedoch nicht der Fall
Keine andere Konfiguration erforderlich.

![slack1](../images/slack1.PNG)

Gerätekonfiguration 
=============================

Die Konfiguration der Slack-Ausrüstung ist über das Menü zugänglich
Plugins :

![slack2](../images/slack2.PNG)

So sieht die Slack-Plugin-Seite aus (hier mit bereits 1
Ausrüstung) :

![slack3](../images/slack3.PNG)

> **Tip**
>
> Setzen Sie die Maus wie an vielen Stellen auf Jeedom ganz links
> ruft ein Schnellzugriffsmenü auf (Sie können
> von deinem Profil immer sichtbar lassen).

Sobald Sie auf eine davon klicken, erhalten Sie :

![slack4](../images/slack4.PNG)

Hier finden Sie die gesamte Konfiguration Ihrer Geräte :

-   **Name der Ausrüstung** : Name Ihrer Slack-Ausrüstung

-   **Activer** : macht Ihre Ausrüstung aktiv

-   **Visible** : macht es auf dem Dashboard sichtbar

-   **Domaine** : Domain Name Ihres Slack (erlaubt insbesondere wenn
    Sie haben mehrere Slack, um sie zu unterscheiden)

-   **Token-Authentifizierung** : Slack API Token, nur nützlich
    Informationen zum Senden von Dateien (z. B. Aufnahme von einer Kamera) finden Sie unter
    unter der Methode, um es wiederherzustellen

-   **URL zurückgeben** : Dies ist die URL, die im Webhook von angegeben werden muss
    Locker (bitte beachten Sie, dass Ihr Jeedom zugänglich sein muss
    von außen)

Nachfolgend finden Sie die Konfiguration der Befehle :

-   **Nom** : Name der Bestellung

-   **Webhook** : URL zum Anrufen, um eine Nachricht auf Slack zu senden

-   **Destination** : nicht obligatorisch, ermöglicht das Erzwingen des Sendens von a
    Nachricht an einen Kanal oder Benutzer

-   Erweiterte Konfiguration (kleine gekerbte Räder) : Anzeigen
    die erweiterte Konfiguration des Befehls (Methode
    Geschichte, Widget…)

-   Test : Wird zum Testen des Befehls verwendet

-   Löschen (unterschreiben -) : ermöglicht das Löschen des Befehls

> **Tip**
>
> Standardmäßig gibt es 2 Befehle : Absender, der Ihnen den Namen des gibt
> letzter Absender der Nachricht und Nachricht, die Ihnen die Nachricht gibt,
> Es kann nützlich sein, wenn Sie etwas tun möchten, das nicht der Fall ist
> möglich mit Interaktionen, um ein Szenario bei der Ankunft auszulösen
> einer neuen Nachricht zum Beispiel und um den Wert davon wiederherzustellen
> (Wir können uns zum Beispiel vorstellen, die Nachricht auf Sonos oder Sonos lesen zu lassen
> ein Karotz)

Lockere Kontoerstellung 
==========================

Nichts mehr einfach gehen [hier](:https://slack.com/), und von
Geben Sie beispielsweise eine E-Mail-Adresse und einen Domain- / Firmennamen ein :

![slack5](../images/slack5.PNG)

Sie müssen nur validieren, Sie erhalten eine E-Mail, Sie müssen
Klicken Sie auf den Link, um Ihr Konto zu aktivieren und es ist gut

Dann kommen Sie auf Ihrem Slack an :

![slack6](../images/slack6.PNG)

Von dort finden Sie links die Kanäle und
Benutzer, in der Mitte können Sie die Slack-App für herunterladen
iOS, Android, Mac oder Windows

Hinausgehenden Webhook hinzufügen 
========================

Mit Wekhooks kann Slack Jeedom über die Ankunft von a informieren
Nachricht und warten Sie auf Jeedom Antwort, um es an Sie weiterzuleiten,
Dazu müssen Sie zu den Einstellungen gehen :

![slack7](../images/slack7.PNG)

Klicken Sie dann auf Integration :

![slack8](../images/slack8.PNG)

Unten finden Sie "Ausgehende WebHooks"" :

![slack9](../images/slack9.PNG)

Klicken Sie auf "Hinzufügen" :

![slack10](../images/slack10.PNG)

Dann "Outgoing WebHooks Integration hinzufügen" :

![slack11](../images/slack11.PNG)

Die verschiedenen Parameter finden Sie unten auf der Seite :

-   **Channel** : nicht erforderlich, lassen Sie uns Slack anweisen, alles zu senden
    Was ist in diesem Kanal bei Jeedom. Wir können zum Beispiel erstellen
    ein Kanal nur für Jeedom (praktischer als ein
    Auslösewort)

-   **Wortauslöser** : Nicht obligatorisch, wenn Sie einen Kanal haben
    sonst brauchst du unbedingt einen. In diesem Feld können Sie ein Wort definieren
    Auslöser für das Senden an Jeedom, zum Beispiel, wenn Sie Jeedom setzen
    Alle Ihre Anfragen müssen mit Jeedom beginnen (z : Jeedom
    Wie viel ist er im Raum?

-   **URL (s)** : Die anzurufende URL finden Sie auf Ihrer Seite
    Jeedom Ausrüstung unter dem Namen "return URL"

Die anderen Felder sind nicht nützlich, außer vielleicht "Anpassen"
Name ", mit dem der Name des Jeedom-Bots definiert werden kann (Name, mit dem geantwortet wird
Jeedom) können Sie auch mit "Symbol anpassen" das Symbol von ändern
Jeedom.

Klicken Sie dann auf "Einstellungen speichern" und es ist gut

![slack12](../images/slack12.PNG)

Dort kannst du über Slack mit Jeedom sprechen

> **Important**
>
> Vergessen Sie nicht, in Jeedom Ihren Domainnamen (Name von) einzugeben
> Firma), sonst wird Jeedom sich weigern, Ihnen zu antworten (beachten Sie dieses Feld
> ist empfindlich gegenüber der Box).

> **Tip**
>
> Da Jeedom die Ausrüstung nach Domänen trennt, ist dies der Fall
> möglich, wenn Sie mehrere Bereiche haben, um Geräte zu trennen und
> also die Szenarien dahinter.

Hinzufügen eines eingehenden Webhooks 
=========================

Eingehende Webhooks ermöglichen es Jeedom, eine Nachricht weiterzuleiten
ein Kanal oder direkt zu einer Person. Ohne diese Webhooks
Jeedom kann nicht die Initiative ergreifen, um Ihnen eine Nachricht zu senden.
Dazu müssen Sie zu den Einstellungen gehen :

![slack7](../images/slack7.PNG)

Klicken Sie dann auf Integration :

![slack8](../images/slack8.PNG)

Ganz unten finden Sie "Incoming WebHooks" :

![slack13](../images/slack13.PNG)

Dann müssen Sie einen Kanal oder einen Benutzer auswählen
Standardziel (Sie können dann eines pro Befehl in angeben
Jeedom) :

![slack14](../images/slack14.PNG)

Klicken Sie dann auf "Eingehende WebHooks-Integration hinzufügen"".

![slack15](../images/slack15.PNG)

Am Ende der Seite finden Sie die Informationen des Webhooks
Rufen Sie einfach den Wert aus dem Feld "Webhook-URL" ab und kopieren Sie ihn in
das Webhook-Feld Ihrer Bestellung.

> **Tip**
>
> Im Zielfeld der Bestellung in Jeedom können Sie
> Geben Sie einen Kanal (ex \#monchannel) oder einen Benutzer (ex @toto) an..

Hier unter Jeedom muss man nur sparen und dort kann man
von Jeedom senden Nachrichten auf Slack

Token-Wiederherstellung 
=====================

Hier erfahren Sie, wie Sie Ihren Token abrufen, damit Jeedom ihn senden kann
Dateien auf Slack und insbesondere Kameraaufnahmen von
Beispiel. Zuerst musst du gehen
[hier](https://api.slack.com/custom-integrations/legacy-tokens), dann ganz unten weiter :

![slack17](../images/slack17.PNG)

Bitten Sie Slack hier vor Ihrem Team, den Token zu generieren
Fragen Sie nach Ihrem Passwort und senden Sie es dann zurück auf dieselbe Seite,
Fragen Sie unten erneut nach dem Token. Nach ein paar Sekunden
es wird angezeigt, kopieren Sie es einfach in das Token-Feld auf
Jeedom

> **Tip**
>
> Dieser Schritt ist optional und nur zum Senden nützlich
> Slack erfasst zum Beispiel Ihre Kamera.

Was ist das Ergebnis? ? 
========================

Hier ist ein Beispiel dafür, was es möglich ist, das Plugin einmal zu verwenden
richtig konfiguriert und Interaktionen erstellt :

![slack16](../images/slack16.PNG)

> **Important**
>
> Wenn Sie die Szenariofunktion "Fragen" verwenden, müssen Sie senden
> die Anfrage auf einem Kanal, auf dem Jeedom sonst auf die Antworten hört
> Ihre "Ask" -Anforderung fällt in "Timeout""
