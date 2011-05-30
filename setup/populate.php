<?php
include_once("../libs/database.php");
$db = new pgDb();
$db->connect();
$db->transaction("
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('utente1@bugbox.it','1','Utente1','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente2@bugbox.it','2','Utente2','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente3@bugbox.it','3','Utente3','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente4@bugbox.it','4','Utente4','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente5@bugbox.it','5','Utente5','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente6@bugbox.it','6','Utente6','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente7@bugbox.it','7','Utente7','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente8@bugbox.it','8','Utente8','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente9@bugbox.it','9','Utente9','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente10@bugbox.it','10','Utente10','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente11@bugbox.it','11','Utente11','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente12@bugbox.it','12','Utente12','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente13@bugbox.it','13','Utente13','Prova',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('Utente14@bugbox.it','14','Utente14','Prova',null,'Paese',null);

INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto1','Descrizione1','www1','1');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto2','Descrizione2','www2','2');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto3','Descrizione3','www3','3');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto4','Descrizione4','www4','4');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto5','Descrizione5','www5','5');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto6','Descrizione6','www6','6');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto7','Descrizione7','www7','1');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto8','Descrizione8','www8','2');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto9','Descrizione9','www9','7');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto10','Descrizione10','www10','8');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto11','Descrizione11','www11','10');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto12','Descrizione12','www12','14');

INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','5','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','8','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','9','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','10','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','11','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','3','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','6','segnalatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','1','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','2','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','3','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','4','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','5','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','5','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('7','11','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','11','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('9','12','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('14','8','amministratore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','9','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('7','10','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','11','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','12','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','12','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','12','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','1','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','7','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','4','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','6','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','8','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','1','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','2','sviluppatore');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','3','sviluppatore');


INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','1');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria2','Descrizione2','1');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria3','Descrizione3','1');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','2');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria2','Descrizione2','2');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','3');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','4');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','5');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria2','Descrizione2','3');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria2','Descrizione2','4');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria4','Descrizione4','5');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','6');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','7');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','8');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','9');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria1','Descrizione1','10');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria2','Descrizione2','10');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria5','Descrizione5','10');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria6','Descrizione6','10');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria8','Descrizione8','11');
INSERT INTO categoria(nome,descrizione,id_progetto) VALUES ('Categoria10','Descrizione10','12');

INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket1','Descrizione1','1','Categoria1','1','1','1');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket2','Descrizione2','1','Categoria2','1','2','2');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket3','Descrizione3','1','Categoria3','1','3','3');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket4','Descrizione4','1','Categoria4','5','1','1');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket5','Descrizione5','1','Categoria2','10','4','5');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket6','Descrizione6','1','Categoria10','12','8','5');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket7','Descrizione7','1','Categoria1','5','12','11');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket8','Descrizione8','1','Categoria6','10','4','6');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket9','Descrizione9','1','Categoria3','1','8','10');

INSERT INTO file(estensione,id_ticket) VALUES ('png','1');
INSERT INTO file(estensione,id_ticket) VALUES ('jpg','1');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','2');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','3');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','4');
INSERT INTO file(estensione,id_ticket) VALUES ('png','6');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','6');
INSERT INTO file(estensione,id_ticket) VALUES ('png','6');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','7');
INSERT INTO file(estensione,id_ticket) VALUES ('gif','7');
INSERT INTO file(estensione,id_ticket) VALUES ('png','8');
INSERT INTO file(estensione,id_ticket) VALUES ('html','8');
INSERT INTO file(estensione,id_ticket) VALUES ('php','8');
INSERT INTO file(estensione,id_ticket) VALUES ('exe','8');

INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo1','1','1');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo2','1','2');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo3','2','1');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo4','2','3');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo5','2','5');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo6','3','2');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo7','6','5');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo8','6','6');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo9','6','7');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo10','7','1');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo11','8','3');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo12','9','5');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo13','10','1');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo14','10','8');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo15','11','4');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo16','12','9');
INSERT INTO notaprogetto(testo,id_creatore,id_progetto) VALUES ('Testo17','13','1');

INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo1','1','2');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo2','1','3');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo3','2','2');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo4','2','4');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo5','2','5');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo6','3','2');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo7','4','5');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo8','6','6');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo9','6','6');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo10','7','2');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo11','8','3');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo12','9','5');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo13','10','1');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo14','11','8');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo15','11','4');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo16','13','9');
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo17','13','1');

INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo1','1','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo2','1','3');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo3','2','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo4','2','14');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo5','2','5');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo6','3','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo7','4','5');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo8','6','6');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo9','6','6');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo10','7','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo11','8','3');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo12','9','5');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo13','10','1');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo14','11','8');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo15','11','4');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo16','13','9');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo17','13','1');
");
$db->close();
?>
