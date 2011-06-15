<?php
include_once("../libs/database.lib.php");
$db = new pgDb();
$db->connect();
$db->transaction("
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('steve@bugbox.it',md5('steve'),'Steve','Jobs',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('gianluca@bugbox.it',md5('gianluca'),'Gianluca','Demarinis','Via Cornagera 15','Selvino',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('simone@bugbox.it',md5('simone'),'Simone','Micheli','Via 24 Maggio','Zogno',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('mario@bugbox.it',md5('mario'),'Mario','Verdi',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('carlo@bugbox.it',md5('carlo'),'Carlo','Dentella',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('giuseppe@bugbox.it',md5('giuseppe'),'Giuseppe','Psaila',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('anna@bugbox.it',md5('anna'),'Anna','Zanga',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('maria@bugbox.it',md5('maria'),'Maria','Tedesco',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('pia@bugbox.it',md5('pia'),'Pia','Carrara',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('antonia@bugbox.it',md5('antonia'),'Antonia','Seghezzi',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('barbara@bugbox.it',md5('barbara'),'Barbara','Camozzi',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('jennifer@bugbox.it',md5('jennifer'),'Jennifer','Pellegrino',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('carlotta@bugbox.it',md5('carlotta'),'Carlotta','Gotti',null,'Paese',null);
INSERT INTO utente(email,password,nome,cognome,indirizzo,residenza,telefono) 
VALUES ('stefano@bugbox.it',md5('stefano'),'Stefano','Demarinis',null,'Paese',null);

INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Iphone 5','Progetto di creazione di un nuovo cellulare','www.iphone5.it','1');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Safari 12','Progetto di creazione di un nuovo browser','www.safari12.it','2');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Firefox 5','Progetto di creazione di un nuovo browser','www.firefox5.it','3');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Windows 8','Progetto di creazione di un nuovo sistema operativo','www.windows8.it','4');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Ipod 4','Progetto di creazione di un nuovo lettore mp3','www.ipod4.it','5');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Sony Ericcson Arc 2','Progetto di creazione di un nuovo cellulare','www.sony.it','6');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Apollo 15','Progetto di creazione di un nuovo missile','www.siampazzi.it','2');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Progetto inutile','Progetto di creazione di niente','www.boh.it','7');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Altro progetto inutile','Progetto di creazione di niente','www.riboh.it','8');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Ipad 3','Progetto di creazione di un nuovo tablet','www.ipad3.it','1');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Mac 999','Progetto di creazione di un nuovo pc','www.mac999.it','10');
INSERT INTO progetto(nome,descrizione,indirizzoweb,id_proprietario) 
VALUES ('Albinoleffe','Progetto di creazione di una squadra migliore','www.albinoleffe.it','14');

INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','5','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','8','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','9','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','10','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','11','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','3','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','6','notifier');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','1','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','2','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','3','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','4','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','5','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','5','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('7','11','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','11','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('9','12','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('14','8','administrator');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','9','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('7','10','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('6','11','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','12','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','12','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','12','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('8','1','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','7','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('3','4','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('4','6','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('5','8','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','1','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('1','2','developper');
INSERT INTO partecipante(id_utente,id_progetto,tipo) VALUES ('2','3','developper');


INSERT INTO categoria(nome,id_progetto) VALUES ('Antenna','1');
INSERT INTO categoria(nome,id_progetto) VALUES ('WiFi','1');
INSERT INTO categoria(nome,id_progetto) VALUES ('Schermo','1');
INSERT INTO categoria(nome,id_progetto) VALUES ('Velocita','2');
INSERT INTO categoria(nome,id_progetto) VALUES ('Strumenti per sviluppatori','2');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','3');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','4');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','5');
INSERT INTO categoria(nome,id_progetto) VALUES ('Categoria','3');
INSERT INTO categoria(nome,id_progetto) VALUES ('Categoria','4');
INSERT INTO categoria(nome,id_progetto) VALUES ('Categoria','5');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','6');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','7');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','8');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','9');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','10');
INSERT INTO categoria(nome,id_progetto) VALUES ('Categoria','10');
INSERT INTO categoria(nome,id_progetto) VALUES ('Nuova Categoria','10');
INSERT INTO categoria(nome,id_progetto) VALUES ('Categoria senza nome','10');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','11');
INSERT INTO categoria(nome,id_progetto) VALUES ('Altra categoria','12');

INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Non riceve l antenna','L antenna non riceve molto bene in galleria','1','Antenna','1','1','1');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Wi-fi non funzionante','Il wi-fi si scollega se il cellulare viene spento','2','WiFi','1','2','2');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Schermo piccolo','Lo schermo e da ingrandire','3','Schermo','1','3','3');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket4','Descrizione4','4','Altra categoria','5','1','1');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket5','Descrizione5','5','Altra categoria','10','4','5');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket6','Descrizione6','4','Altra categoria','12','8','5');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket7','Descrizione7','3','Categoria','5','12','11');
INSERT INTO ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato)
 VALUES ('Ticket8','Descrizione8','2','Categoria senza nome','10','4','6');

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
INSERT INTO notaticket(testo,id_creatore,id_ticket) VALUES ('Testo17','13','1');

INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo1','1','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo2','1','3');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo3','2','10');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo4','2','14');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo5','2','5');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo6','3','2');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo7','4','5');
INSERT INTO notautente(testo,id_creatore,id_destinatario) VALUES ('Testo8','6','1');
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
header( "Location: ./trigger.php" );
?>
