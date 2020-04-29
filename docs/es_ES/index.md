Este complemento establece una conexión entre Slack y Jeedom para
enviar alertas desde Jeedom o chatear con Jeedom (en
usando interacciones).

Configuración del plugin 
=======================

Después de descargar el complemento, debe activarlo, no
no se requiere otra configuración.

![slack1](../images/slack1.PNG)

Configuración del equipo 
=============================

Se puede acceder a la configuración del equipo Slack desde el menú
Plugins :

![slack2](../images/slack2.PNG)

Así es como se ve la página del complemento Slack (aquí con 1 ya
equipos) :

![slack3](../images/slack3.PNG)

> **Tip**
>
> Como en muchos lugares de Jeedom, coloca el mouse en el extremo izquierdo
> abre un menú de acceso rápido (puedes
> desde tu perfil siempre déjalo visible).

Una vez que haces clic en uno de ellos, obtienes :

![slack4](../images/slack4.PNG)

Aquí encontrarás toda la configuración de tu equipo :

-   **Nombre del equipo** : nombre de su equipo Slack

-   **Activer** : activa su equipo

-   **Visible** : lo hace visible en el tablero

-   **Domaine** : nombre de dominio de su Slack (permite en particular si
    tienes varias holguras para diferenciarlas)

-   **Autenticación de token** : Token API flojo, útil solo
    para enviar archivos (capturar desde una cámara, por ejemplo), vea
    debajo del método para recuperarlo

-   **URL de retorno** : esta es la URL que debe darse en el webhook de
    Slack (tenga en cuenta que su Jeedom debe ser accesible
    del exterior)

A continuación encontrará la configuración de los comandos. :

-   **Nom** : Nombrebre de la orden

-   **Webhook** : URL para llamar para enviar un mensaje en Slack

-   **Destination** : no obligatorio, permite forzar el envío de un
    mensaje a un canal o usuario

-   Configuración avanzada (ruedas con muescas pequeñas) : Muestra
    La configuración avanzada del comando (método
    historia, widget ...)

-   Probar : Se usa para probar el comando

-   Eliminar (firmar -) : permite eliminar el comando

> **Tip**
>
> Por defecto hay 2 comandos : Remitente que te da el nombre del
> último remitente del mensaje y Mensaje que le da el mensaje,
> puede ser útil si quieres hacer algo que no sea
> posible con interacciones para desencadenar un escenario a la llegada
> de un nuevo mensaje, por ejemplo, y para recuperar el valor del mismo
> (por ejemplo, podemos imaginar que se lea el mensaje en Sonos o
> un Karotz)

Creación de cuenta floja 
==========================

Nada más solo vete [aquí](:https://slack.com/), y
ingrese una dirección de correo electrónico y un nombre de dominio / empresa, por ejemplo :

![slack5](../images/slack5.PNG)

Solo tienes que validar, recibirás un correo electrónico, debes
haga clic en el enlace para activar su cuenta y está bien

Entonces llegarás en tu Slack :

![slack6](../images/slack6.PNG)

Desde allí encontrarás a la izquierda los canales y
usuarios, en el centro puedes descargar la aplicación Slack para
iOS, Android, Mac o Windows

Agregar webhook saliente 
========================

Los Wekhooks permiten que Slack informe a Jeedom de la llegada de un
mensaje y espere la respuesta de Jeedom para enviárselo,
para hacer esto tienes que ir a la configuración :

![slack7](../images/slack7.PNG)

Luego haga clic en integración :

![slack8](../images/slack8.PNG)

En la parte inferior encontrará "WebHooks salientes" :

![slack9](../images/slack9.PNG)

Haga clic en "Agregar" :

![slack10](../images/slack10.PNG)

Luego "Agregar integración de WebHooks salientes" :

![slack11](../images/slack11.PNG)

Encontrará los diferentes parámetros en la parte inferior de la página. :

-   **Channel** : no es obligatorio, digamos a Slack que envíe todo
    que hay en este canal en Jeedom. Podemos por ejemplo crear
    un canal solo para Jeedom (más práctico que poner un
    palabra de activación)

-   **Word Trigger (s)** : no es obligatorio si tienes un canal
    de lo contrario, absolutamente necesitas uno. Este campo le permite definir una palabra.
    disparador para enviar a Jeedom, por ejemplo si coloca Jeedom
    todas sus solicitudes deben comenzar con Jeedom (ex : Jeedom
    cuánto está él en la habitación)

-   **URL (s)** : URL para llamar, la encuentras en tu página
    Equipo Jeedom bajo el nombre de "URL de retorno"

Los otros campos no son útiles, excepto tal vez el "Personalizar
Nombre "que permite definir el nombre del bot Jeedom (nombre con el que responde
Jeedom), también puede con "Personalizar icono" cambiar el icono de
Jeedom.

Luego haga clic en "Guardar configuración" y está bien

![slack12](../images/slack12.PNG)

Allí, puedes hablar con Jeedom a través de Slack

> **Important**
>
> No olvide en Jeedom ingresar su nombre de dominio (nombre de
> empresa), de lo contrario Jeedom se negará a responderle (tenga en cuenta este campo
> es sensible a la caja).

> **Tip**
>
> Como Jeedom separa el equipo por dominio, es
> posible si tiene múltiples áreas para separar equipos y
> así que los escenarios detrás.

Adición de webhook entrante 
=========================

Los webhooks entrantes permiten a Jeedom comunicar un mensaje en
un canal o directamente a una persona. Sin estos webhooks
Jeedom no podrá tomar la iniciativa de enviarte un mensaje.
Para hacer esto, vaya a la configuración :

![slack7](../images/slack7.PNG)

Luego haga clic en integración :

![slack8](../images/slack8.PNG)

En la parte inferior encontrará "WebHooks entrantes" :

![slack13](../images/slack13.PNG)

Luego debe elegir un canal o un usuario de
destino predeterminado (puede especificar uno por comando en
Jeedom) :

![slack14](../images/slack14.PNG)

Luego haga clic en "Agregar integración de WebHooks entrantes".

![slack15](../images/slack15.PNG)

En la parte inferior de la página encontrará la información del webhook, allí puede
solo recupere el valor del campo "URL de Web hook" y cópielo en
el campo Web hook de tu pedido.

> **Tip**
>
> En el campo de destino del pedido en Jeedom puedes
> especificar un canal (ex \#monchannel) o un usuario (ex @toto).

Aquí, bajo Jeedom solo tienes que guardar y allí puedes
desde Jeedom enviar mensajes en Slack

Recuperación de tokens 
=====================

Aquí le mostramos cómo recuperar su token para que Jeedom pueda enviar
archivos en Slack, y en particular capturas de cámara por
ejemplo Primero tienes que irte
[aquí](https://api.slack.com/custom-integrations/legacy-tokens), luego en la parte inferior continuar :

![slack17](../images/slack17.PNG)

Aquí, frente a su equipo, pídale a Slack que genere el token, lo hará
pedirle su contraseña y luego enviarlo de vuelta a la misma página,
en la parte inferior pide nuevamente el token. Después de unos segundos
aparecerá, solo cópielo en el campo de token en
Jeedom

> **Tip**
>
> Este paso es opcional, solo es útil para enviar
> Slack captura tu cámara por ejemplo.

Cual es el resultado ? 
========================

Aquí hay un ejemplo de lo que es posible hacer una vez que el complemento
configurado correctamente e interacciones creadas :

![slack16](../images/slack16.PNG)

> **Important**
>
> Si utiliza la función de escenario "preguntar", debe enviar
> la solicitud en un canal en el que Jeedom escucha las respuestas de lo contrario
> su solicitud de "preguntar" caerá en "tiempo de espera""
