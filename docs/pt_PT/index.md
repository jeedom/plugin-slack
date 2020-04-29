Este plugin estabelece uma conexão entre Slack e Jeedom para
envie alertas do Jeedom ou converse com o Jeedom (em
usando interações).

Configuração do plugin 
=======================

Depois de baixar o plugin, você deve ativá-lo, ele não
nenhuma outra configuração é necessária.

![slack1](../images/slack1.PNG)

Configuração do equipamento 
=============================

A configuração do equipamento Slack pode ser acessada no menu
Plugins :

![slack2](../images/slack2.PNG)

É assim que a página do plugin Slack se parece (aqui com 1
equipamento) :

![slack3](../images/slack3.PNG)

> **Tip**
>
> Como em muitos lugares em Jeedom, coloque o mouse na extremidade esquerda
> abre um menu de acesso rápido (você pode
> do seu perfil, deixe-o sempre visível).

Depois de clicar em um deles, você obtém :

![slack4](../images/slack4.PNG)

Aqui você encontra toda a configuração do seu equipamento :

-   **Nome de equipamentos** : nome do seu equipamento Slack

-   **Activer** : torna seu equipamento ativo

-   **Visible** : torna visível no painel

-   **Domaine** : nome de domínio do seu Slack (permite, em particular, se
    você tem vários Slack para diferenciá-los)

-   **Autenticação de token** : Token da API do Slack, útil apenas
    para enviar arquivos (captura de uma câmera, por exemplo), consulte
    abaixo do método para recuperá-lo

-   **URL de retorno** : este é o URL que deve ser fornecido no webhook de
    Slack (observe que seu Jeedom deve estar acessível
    de fora)

Abaixo você encontrará a configuração dos comandos :

-   **Nom** : nome do comando

-   **Webhook** : URL para ligar para enviar uma mensagem no Slack

-   **Destination** : não obrigatório, permite forçar o envio de um
    mensagem para um canal ou usuário

-   Configuração avançada (pequenas rodas dentadas) : permite exibir
    a configuração avançada do comando (método
    história, widget ...)

-   Teste : permite testar o comando

-   Excluir (assinar -) : permite excluir o comando

> **Tip**
>
> Por padrão, existem 2 comandos : Remetente que fornece o nome do
> último remetente da mensagem e a mensagem que fornece a mensagem,
> pode ser útil se você quiser fazer algo que não é
> possível com interações para desencadear um cenário na chegada
> de uma nova mensagem, por exemplo, e para recuperar o valor dela
> (podemos, por exemplo, imaginar a leitura da mensagem no Sonos ou
> Karotz)

Criação de conta no Slack 
==========================

Nada mais basta ir [aqui](:https://slack.com/), e de
insira um endereço de e-mail e um nome de domínio / empresa, por exemplo :

![slack5](../images/slack5.PNG)

Você só precisa validar, você receberá um e-mail, você deve
clique no link para ativar sua conta e é bom

Então você chegará no seu Slack :

![slack6](../images/slack6.PNG)

A partir daí, você encontra à esquerda os canais e
usuários, no centro você pode baixar o aplicativo Slack para
iOS, Android, Mac ou Windows

Adicionando webhook de saída 
========================

Os Wekhooks permitem que o Slack informe Jeedom da chegada de um
mensagem e aguarde a resposta da Jeedom para encaminhá-la para você,
para fazer isso, você tem que ir para as configurações :

![slack7](../images/slack7.PNG)

Depois clique em integração :

![slack8](../images/slack8.PNG)

Na parte inferior, você encontrará "WebHooks de saída" :

![slack9](../images/slack9.PNG)

Clique em "Adicionar" :

![slack10](../images/slack10.PNG)

Em seguida, "Adicionar integração de WebHooks de saída" :

![slack11](../images/slack11.PNG)

Você encontrará os diferentes parâmetros na parte inferior da página :

-   **Channel** : não é necessário, vamos dizer ao Slack para enviar tudo
    o que há neste canal na Jeedom. Por exemplo, podemos criar
    um canal apenas para Jeedom (mais prático do que colocar um
    palavra de gatilho)

-   **Gatilho (s) do Word** : não é obrigatório se você tem um canal
    caso contrário, você absolutamente precisa de um. Este campo permite definir uma palavra
    gatilho para enviar para o Jeedom, por exemplo, se você colocar o Jeedom
    todos os seus pedidos devem começar com Jeedom (ex : Jeedom
    quanto ele está na sala)

-   **URL (s)** : URL para ligar, você o encontra na sua página
    Equipamento Jeedom com o nome de "URL de retorno"

Os outros campos não são úteis, exceto talvez o "Personalizar
Nome ", que permite definir o nome do bot Jeedom (nome com o qual responde
Jeedom), você também pode, com "Personalizar ícone", alterar o ícone de
Jeedom.

Em seguida, clique em "Salvar configurações" e é bom

![slack12](../images/slack12.PNG)

Lá, você pode conversar com Jeedom através do Slack

> **Important**
>
> Não esqueça no Jeedom de inserir seu nome de domínio (nome de
> empresa), caso contrário, a Jeedom se recusará a responder (observe este campo
> é sensível à caixa).

> **Tip**
>
> Como a Jeedom separa o equipamento por domínio, é
> possível se você tiver várias áreas para separar equipamentos e
> então os cenários por trás.

Adição de webhook recebido 
=========================

Os webhooks recebidos permitem que o Jeedom comunique uma mensagem no
um canal ou diretamente para uma pessoa. Sem esses webhooks
Jeedom não poderá tomar a iniciativa de enviar uma mensagem.
Para fazer isso, vá para as configurações :

![slack7](../images/slack7.PNG)

Depois clique em integração :

![slack8](../images/slack8.PNG)

Na parte inferior, você encontrará "WebHooks de entrada" :

![slack13](../images/slack13.PNG)

Então você precisa escolher um canal ou um usuário de
destino padrão (você pode especificar um por comando em
Jeedom) :

![slack14](../images/slack14.PNG)

Em seguida, clique em "Adicionar integração de WebHooks de entrada".

![slack15](../images/slack15.PNG)

Na parte inferior da página, você encontra as informações do webhook, lá você
recupere o valor do campo "Webhook URL" e copie-o para
o campo Webhook do seu pedido.

> **Tip**
>
> No campo de destino do pedido em Jeedom, você pode
> especifique um canal (ex \#monchannel) ou um usuário (ex @toto).

Aqui, no Jeedom, você só precisa salvar e lá pode
de Jeedom envia mensagens no Slack

Recuperação de token 
=====================

Veja como recuperar seu token para que o Jeedom possa enviar
arquivos no Slack e, em particular, capturas de câmera por
exemplo. Primeiro você tem que ir
[aqui](https://api.slack.com/custom-integrations/legacy-tokens), então, no fundo, continue :

![slack17](../images/slack17.PNG)

Aqui na frente de sua equipe, peça ao Slack para gerar o token, ele será
solicite sua senha e envie-o de volta à mesma página,
na parte inferior, peça o token novamente. Depois de alguns segundos
aparecer, basta copiá-lo no campo token em
Jeedom

> **Tip**
>
> Esta etapa é opcional, é útil apenas para enviar
> O Slack captura sua câmera, por exemplo.

Qual é o resultado ? 
========================

Aqui está um exemplo do que é possível fazer quando o plug-in
adequadamente configurado e interações criadas :

![slack16](../images/slack16.PNG)

> **Important**
>
> Se você usar a função de cenário "ask", deverá enviar
> a solicitação em um canal no qual Jeedom ouve as respostas, caso contrário
> sua solicitação "perguntar" cairá em "tempo limite""
