<?php
include_once("../libs/database.lib.php");
$db = new pgDb(true);
$db->connect();
$db->transaction("CREATE TABLE public.utente (
id serial not null,
email varchar(255) unique not null,
password char(16) not null,
nome varchar(255) not null,
cognome varchar(255) not null,
indirizzo varchar(255),
residenza varchar(255),
telefono varchar(20),
dataregistrazione timestamp with time zone not null default current_timestamp,
PRIMARY KEY (id)
);

CREATE TABLE public.progetto (
id serial not null,
nome varchar(255) not null,
descrizione text not null,
indirizzoweb varchar(255),
creatoil timestamp with time zone not null default current_timestamp,
id_proprietario integer  not null references utente(id),
PRIMARY KEY (id),
UNIQUE(id_proprietario,nome)
);

CREATE TABLE public.partecipante (
id_utente integer not null references utente(id),
id_progetto integer not null references progetto(id),
tipo varchar(20) not null default 'segnalatore' CHECK (tipo in ('amministratore','sviluppatore','segnalatore')),
creatoil timestamp with time zone not null default current_timestamp,
PRIMARY KEY (id_utente,id_progetto)
);

CREATE TABLE public.categoria (
nome varchar(255) not null,
descrizione text not null,
id_progetto integer not null references progetto(id),
PRIMARY KEY (nome,id_progetto),
UNIQUE (nome,id_progetto)
);

CREATE TABLE public.ticket (
id serial not null,
titolo varchar(255) not null,
descrizione text not null,
datacreazione timestamp with time zone not null default current_timestamp,
ultimamodifica timestamp with time zone not null default current_timestamp,
priorita integer not null CHECK (priorita>0 AND priorita<6),
status char(15) not null default 'nuovo' CHECK (status in ('nuovo','lavorazione','test','risolto','invalido')),
assegnato integer references utente(id),
datachiusura timestamp with time zone default null,
categoria varchar(255) not null,
progetto integer not null,
id_creatore integer not null references utente(id),
id_assegnato integer not null references utente(id),
PRIMARY KEY (id),
FOREIGN KEY(categoria,progetto) references categoria(nome,id_progetto),
UNIQUE(titolo,categoria)
);

CREATE TABLE public.file (
id serial not null,
estensione char(10) not null,
data timestamp with time zone not null default current_timestamp,
id_ticket integer not null references ticket(id),
PRIMARY KEY (id)
);

CREATE TABLE public.notaprogetto (
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id),
id_progetto integer not null references progetto(id),
PRIMARY KEY (id)
);

CREATE TABLE public.notaticket (
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id),
id_ticket integer not null references ticket(id),
PRIMARY KEY (id)
);

CREATE TABLE public.notautente (
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id),
id_destinatario integer not null references utente(id),
PRIMARY KEY (id)
);");
$db->close();
?>
