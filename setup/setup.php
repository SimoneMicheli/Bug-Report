<?php
include_once("../libs/database.lib.php");
$db = new pgDb(true);
$db->connect();
$db->transaction("
CREATE TABLE public.utente (
id serial not null,
email varchar(255) unique not null,
password char(32) not null,
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
id_proprietario integer  not null references utente(id) on delete no action,
PRIMARY KEY (id),
UNIQUE(id_proprietario,nome)
);

CREATE TABLE public.partecipante (
id_utente integer not null references utente(id) on delete no action,
id_progetto integer not null references progetto(id) on delete cascade,
tipo varchar(20) not null default 'notifier' CHECK (tipo in ('administrator','developer','notifier')),
creatoil timestamp with time zone not null default current_timestamp,
PRIMARY KEY (id_utente,id_progetto)
);

CREATE TABLE public.categoria (
nome varchar(255) not null,
id_progetto integer not null references progetto(id) on delete cascade,
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
status char(15) not null default 'new' CHECK (status in ('new','working','testing','fixed','invalid')),
datachiusura timestamp with time zone default null,
categoria varchar(255) not null,
progetto integer not null,
id_creatore integer not null references utente(id) on delete no action,
id_assegnato integer references utente(id) on delete set null,
PRIMARY KEY (id),
FOREIGN KEY(categoria,progetto) references categoria(nome,id_progetto) on delete cascade,
UNIQUE(titolo,categoria)
);

CREATE TABLE public.notaprogetto (
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id) on delete no action,
id_progetto integer not null references progetto(id) on delete cascade,
PRIMARY KEY (id)
);

CREATE TABLE public.notaticket(
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id) on delete no action,
id_ticket integer not null references ticket(id) on delete cascade,
PRIMARY KEY (id)
);

CREATE TABLE public.notautente (
id serial not null,
testo text not null,
data timestamp with time zone not null default current_timestamp,
id_creatore integer not null references utente(id) on delete no action,
id_destinatario integer not null references utente(id) on delete no action,
PRIMARY KEY (id)
);
");
$db->close();
//header( "Location: ./populate.php" );
?>
