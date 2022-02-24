# Little Machine
Si tratta di un progetto universitario realizzato da me e da un mio compagno di
corso per l'esame di sviluppo di applicazioni web.
Si tratta di un e-commerce specializzato nella vendita di modellini di auto. \
Il progetto è stato realizzato utilizzando il PHP per implementare il backend, MySQL come database,
le api fetch per inviare le richieste al server e JQuery per gestire gli eventi.
## Contenuto del repository
* [Le api che implementano il backend](/public_html/api)
* [I file css](/public_html/css)
* [Pagine php che vengono incluse perchè implementano parti di codice che
  vengono ripetute](/public_html/include)
* [File JavaScript](/public_html/js)
* [Pagine php che realizzano l'interfaccia grafica del sito](/public_html/pages)
* [Test che verificano la creazione di un utente, il login e la modifica](/public_html/test)
## Funzionalità fornite
Il sito realizzato contiene le seguente funzionalità:
* Ricerca di un prodotto
* Creazione, login e modifica di un utente
* Sistema di crowdfounding dove vengono mostrate tutte le donazioni effettuate. 
  Un utente può scegliere di comparire come anonimo.
* Carrello salvato nel database per consentire l'accesso al carrello da diversi dispositivi
  con controllo della disponibilità del prodotto in magazzino.
* Lista degli ordini effettuati da un utente con anche prezzo ed indirizzo di spedizione al 
  momento dell'ordine.
* Insieme di API per accedere alle funzionalità fornite dall'e-commerce funzionanti tramite
  le sessioni
## Parti da implementare
In tutto il progetto non sono stati implementati i pagamenti.
## Installazione
Per installare il l'e-commerce è necessario realizzare il database 
importando il file [progettoSAW.sql](/public_html/database/progettoSAW.sql)
ed inserire all'interno del file [creds.php](creds.php) le credenziali necessarie per 
accedere al database.
## Garanzia limitata ed esclusioni di responsabilità
Trattandosi di un progetto universitario, il codice viene fornito senza garanzie. Non si concede alcuna garanzia per il software in termini di correttezza, accuratezza, affidabilità o altro. L'utente si assume totalmente il rischio utilizzando questo applicativo.
## Licenza
Il codice sorgente viene rilasciato con licenza [MIT](/../main/LICENSE). Framework, temi, librerie e tutte le tecnologie mantengono le loro relative licenze.
  
