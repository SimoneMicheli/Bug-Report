--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE OR REPLACE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: controllanotautente(); Type: FUNCTION; Schema: public; Owner: bugbox
--

CREATE FUNCTION controllanotautente() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
begin
if (new.id_creatore=new.id_destinatario)
then
raise exception 'No auto message';
end if;
return new;
end;
$$;


ALTER FUNCTION public.controllanotautente() OWNER TO bugbox;

--
-- Name: controllaticket(); Type: FUNCTION; Schema: public; Owner: bugbox
--

CREATE FUNCTION controllaticket() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
begin
if (new.id_assegnato is null AND new.status <> 'new')
then
raise exception 'Assigned to is null and status is not new';
end if;
if (new.datachiusura is null AND new.status ='resolved')
then
raise exception 'A closed ticket must have a closed date';
end if;
return new;
end;
$$;


ALTER FUNCTION public.controllaticket() OWNER TO bugbox;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE categoria (
    nome character varying(255) NOT NULL,
    id_progetto integer NOT NULL
);


ALTER TABLE public.categoria OWNER TO bugbox;

--
-- Name: notaprogetto; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE notaprogetto (
    id integer NOT NULL,
    testo text NOT NULL,
    data timestamp with time zone DEFAULT now() NOT NULL,
    id_creatore integer NOT NULL,
    id_progetto integer NOT NULL
);


ALTER TABLE public.notaprogetto OWNER TO bugbox;

--
-- Name: notaprogetto_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE notaprogetto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notaprogetto_id_seq OWNER TO bugbox;

--
-- Name: notaprogetto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE notaprogetto_id_seq OWNED BY notaprogetto.id;


--
-- Name: notaprogetto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('notaprogetto_id_seq', 15, true);


--
-- Name: notaticket; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE notaticket (
    id integer NOT NULL,
    testo text NOT NULL,
    data timestamp with time zone DEFAULT now() NOT NULL,
    id_creatore integer NOT NULL,
    id_ticket integer NOT NULL
);


ALTER TABLE public.notaticket OWNER TO bugbox;

--
-- Name: notaticket_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE notaticket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notaticket_id_seq OWNER TO bugbox;

--
-- Name: notaticket_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE notaticket_id_seq OWNED BY notaticket.id;


--
-- Name: notaticket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('notaticket_id_seq', 16, true);


--
-- Name: notautente; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE notautente (
    id integer NOT NULL,
    testo text NOT NULL,
    data timestamp with time zone DEFAULT now() NOT NULL,
    id_creatore integer NOT NULL,
    id_destinatario integer NOT NULL
);


ALTER TABLE public.notautente OWNER TO bugbox;

--
-- Name: notautente_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE notautente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notautente_id_seq OWNER TO bugbox;

--
-- Name: notautente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE notautente_id_seq OWNED BY notautente.id;


--
-- Name: notautente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('notautente_id_seq', 17, true);


--
-- Name: partecipante; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE partecipante (
    id_utente integer NOT NULL,
    id_progetto integer NOT NULL,
    tipo character varying(20) DEFAULT 'notifier'::character varying NOT NULL,
    creatoil timestamp with time zone DEFAULT now() NOT NULL,
    CONSTRAINT partecipante_tipo_check CHECK (((tipo)::text = ANY ((ARRAY['administrator'::character varying, 'developer'::character varying, 'notifier'::character varying])::text[])))
);


ALTER TABLE public.partecipante OWNER TO bugbox;

--
-- Name: progetto; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE progetto (
    id integer NOT NULL,
    nome character varying(255) NOT NULL,
    descrizione text NOT NULL,
    indirizzoweb character varying(255),
    creatoil timestamp with time zone DEFAULT now() NOT NULL,
    id_proprietario integer NOT NULL
);


ALTER TABLE public.progetto OWNER TO bugbox;

--
-- Name: progetto_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE progetto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.progetto_id_seq OWNER TO bugbox;

--
-- Name: progetto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE progetto_id_seq OWNED BY progetto.id;


--
-- Name: progetto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('progetto_id_seq', 12, true);


--
-- Name: ticket; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE ticket (
    id integer NOT NULL,
    titolo character varying(255) NOT NULL,
    descrizione text NOT NULL,
    datacreazione timestamp with time zone DEFAULT now() NOT NULL,
    ultimamodifica timestamp with time zone DEFAULT now() NOT NULL,
    priorita integer NOT NULL,
    status character(15) DEFAULT 'new'::bpchar NOT NULL,
    datachiusura timestamp with time zone,
    categoria character varying(255) NOT NULL,
    progetto integer NOT NULL,
    id_creatore integer NOT NULL,
    id_assegnato integer,
    CONSTRAINT ticket_priorita_check CHECK (((priorita > 0) AND (priorita < 6))),
    CONSTRAINT ticket_status_check CHECK ((status = ANY (ARRAY['new'::bpchar, 'working'::bpchar, 'testing'::bpchar, 'fixed'::bpchar, 'invalid'::bpchar])))
);


ALTER TABLE public.ticket OWNER TO bugbox;

--
-- Name: ticket_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE ticket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ticket_id_seq OWNER TO bugbox;

--
-- Name: ticket_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE ticket_id_seq OWNED BY ticket.id;


--
-- Name: ticket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('ticket_id_seq', 8, true);


--
-- Name: utente; Type: TABLE; Schema: public; Owner: bugbox; Tablespace: 
--

CREATE TABLE utente (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character(32) NOT NULL,
    nome character varying(255) NOT NULL,
    cognome character varying(255) NOT NULL,
    indirizzo character varying(255),
    residenza character varying(255),
    telefono character varying(20),
    dataregistrazione timestamp with time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.utente OWNER TO bugbox;

--
-- Name: utente_id_seq; Type: SEQUENCE; Schema: public; Owner: bugbox
--

CREATE SEQUENCE utente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utente_id_seq OWNER TO bugbox;

--
-- Name: utente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bugbox
--

ALTER SEQUENCE utente_id_seq OWNED BY utente.id;


--
-- Name: utente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bugbox
--

SELECT pg_catalog.setval('utente_id_seq', 17, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE notaprogetto ALTER COLUMN id SET DEFAULT nextval('notaprogetto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE notaticket ALTER COLUMN id SET DEFAULT nextval('notaticket_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE notautente ALTER COLUMN id SET DEFAULT nextval('notautente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE progetto ALTER COLUMN id SET DEFAULT nextval('progetto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE ticket ALTER COLUMN id SET DEFAULT nextval('ticket_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bugbox
--

ALTER TABLE utente ALTER COLUMN id SET DEFAULT nextval('utente_id_seq'::regclass);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY categoria (nome, id_progetto) FROM stdin;
Antenna	1
WiFi	1
Schermo	1
Velocita	2
Strumenti per sviluppatori	2
Altra categoria	3
Altra categoria	4
Altra categoria	5
Categoria	3
Categoria	4
Categoria	5
Altra categoria	6
Altra categoria	7
Altra categoria	8
Altra categoria	9
Altra categoria	10
Categoria	10
Nuova Categoria	10
Categoria senza nome	10
Altra categoria	11
Altra categoria	12
\.


--
-- Data for Name: notaprogetto; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notaprogetto (id, testo, data, id_creatore, id_progetto) FROM stdin;
1	This project should be finished by December. We can not afford to delay much longer the construction of this new smartphone	2011-06-20 18:13:28.677835+02	1	1
2	Testo2	2011-06-20 18:13:28.677835+02	1	2
3	Boys but we did not already a phone like that?	2011-06-20 18:13:28.677835+02	2	1
4	Testo4	2011-06-20 18:13:28.677835+02	2	3
5	Testo5	2011-06-20 18:13:28.677835+02	2	4
6	Testo6	2011-06-20 18:13:28.677835+02	3	2
7	Testo7	2011-06-20 18:13:28.677835+02	6	8
8	Testo8	2011-06-20 18:13:28.677835+02	6	6
9	Testo9	2011-06-20 18:13:28.677835+02	6	7
10	How boring this project. Unfortunately Steve will never cease to produce mobile phones and then we will be forced to go on with this damn stuff.	2011-06-20 18:13:28.677835+02	7	1
11	Testo11	2011-06-20 18:13:28.677835+02	8	3
12	Testo12	2011-06-20 18:13:28.677835+02	9	6
13	Testo13	2011-06-20 18:13:28.677835+02	10	8
14	Testo14	2011-06-20 18:13:28.677835+02	11	4
15	Testo15	2011-06-20 18:13:28.677835+02	12	9
\.


--
-- Data for Name: notaticket; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notaticket (id, testo, data, id_creatore, id_ticket) FROM stdin;
1	Testo1	2011-06-20 18:13:28.677835+02	1	2
2	Testo2	2011-06-20 18:13:28.677835+02	1	3
3	Testo3	2011-06-20 18:13:28.677835+02	2	2
4	Testo4	2011-06-20 18:13:28.677835+02	2	4
5	Testo5	2011-06-20 18:13:28.677835+02	2	5
6	Testo6	2011-06-20 18:13:28.677835+02	3	2
7	Testo7	2011-06-20 18:13:28.677835+02	4	5
8	Testo8	2011-06-20 18:13:28.677835+02	6	6
9	Testo9	2011-06-20 18:13:28.677835+02	6	6
10	Testo10	2011-06-20 18:13:28.677835+02	7	2
11	Testo11	2011-06-20 18:13:28.677835+02	8	3
12	Testo12	2011-06-20 18:13:28.677835+02	9	5
13	Testo13	2011-06-20 18:13:28.677835+02	10	1
14	Testo14	2011-06-20 18:13:28.677835+02	11	8
15	Testo15	2011-06-20 18:13:28.677835+02	11	4
16	Testo17	2011-06-20 18:13:28.677835+02	13	1
\.


--
-- Data for Name: notautente; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notautente (id, testo, data, id_creatore, id_destinatario) FROM stdin;
1	Testo1	2011-06-20 18:13:28.677835+02	1	2
2	Testo2	2011-06-20 18:13:28.677835+02	1	3
3	Testo3	2011-06-20 18:13:28.677835+02	2	10
4	Testo4	2011-06-20 18:13:28.677835+02	2	14
5	Testo5	2011-06-20 18:13:28.677835+02	2	5
6	Testo6	2011-06-20 18:13:28.677835+02	3	2
7	Testo7	2011-06-20 18:13:28.677835+02	4	5
8	Hi Steve, how are you? Im searching the project that we made together last year, where you put it?	2011-06-20 18:13:28.677835+02	6	1
9	Testo9	2011-06-20 18:13:28.677835+02	6	6
10	Testo10	2011-06-20 18:13:28.677835+02	7	2
11	Testo11	2011-06-20 18:13:28.677835+02	8	3
12	Testo12	2011-06-20 18:13:28.677835+02	9	5
13	You closed the gas? Mom	2011-06-20 18:13:28.677835+02	10	1
14	Testo14	2011-06-20 18:13:28.677835+02	11	8
15	Testo15	2011-06-20 18:13:28.677835+02	11	4
16	Testo16	2011-06-20 18:13:28.677835+02	13	9
17	Careful with that stuff, they will arrest us!	2011-06-20 18:13:28.677835+02	13	1
\.


--
-- Data for Name: partecipante; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY partecipante (id_utente, id_progetto, tipo, creatoil) FROM stdin;
1	5	developer	2011-06-20 18:13:28.677835+02
2	8	notifier	2011-06-20 18:13:28.677835+02
3	9	notifier	2011-06-20 18:13:28.677835+02
1	10	notifier	2011-06-20 18:13:28.677835+02
4	11	notifier	2011-06-20 18:13:28.677835+02
5	3	notifier	2011-06-20 18:13:28.677835+02
6	6	notifier	2011-06-20 18:13:28.677835+02
1	1	administrator	2011-06-20 18:13:28.677835+02
2	2	administrator	2011-06-20 18:13:28.677835+02
3	3	administrator	2011-06-20 18:13:28.677835+02
4	4	administrator	2011-06-20 18:13:28.677835+02
5	5	administrator	2011-06-20 18:13:28.677835+02
6	5	administrator	2011-06-20 18:13:28.677835+02
7	11	administrator	2011-06-20 18:13:28.677835+02
8	11	administrator	2011-06-20 18:13:28.677835+02
9	12	administrator	2011-06-20 18:13:28.677835+02
14	8	administrator	2011-06-20 18:13:28.677835+02
8	9	developer	2011-06-20 18:13:28.677835+02
7	10	developer	2011-06-20 18:13:28.677835+02
6	11	developer	2011-06-20 18:13:28.677835+02
8	12	developer	2011-06-20 18:13:28.677835+02
5	12	developer	2011-06-20 18:13:28.677835+02
4	12	developer	2011-06-20 18:13:28.677835+02
8	1	developer	2011-06-20 18:13:28.677835+02
2	7	developer	2011-06-20 18:13:28.677835+02
3	4	developer	2011-06-20 18:13:28.677835+02
4	6	developer	2011-06-20 18:13:28.677835+02
5	8	developer	2011-06-20 18:13:28.677835+02
2	1	developer	2011-06-20 18:13:28.677835+02
1	2	developer	2011-06-20 18:13:28.677835+02
2	3	developer	2011-06-20 18:13:28.677835+02
\.


--
-- Data for Name: progetto; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY progetto (id, nome, descrizione, indirizzoweb, creatoil, id_proprietario) FROM stdin;
1	Iphone 5	Progetto di creazione di un nuovo cellulare	www.iphone5.it	2011-06-20 18:13:28.677835+02	1
2	Safari 12	Progetto di creazione di un nuovo browser	www.safari12.it	2011-06-20 18:13:28.677835+02	2
3	Firefox 5	Progetto di creazione di un nuovo browser	www.firefox5.it	2011-06-20 18:13:28.677835+02	3
4	Windows 8	Progetto di creazione di un nuovo sistema operativo	www.windows8.it	2011-06-20 18:13:28.677835+02	4
5	Ipod 4	Progetto di creazione di un nuovo lettore mp3	www.ipod4.it	2011-06-20 18:13:28.677835+02	5
6	Sony Ericcson Arc 2	Progetto di creazione di un nuovo cellulare	www.sony.it	2011-06-20 18:13:28.677835+02	6
7	Apollo 15	Progetto di creazione di un nuovo missile	www.siampazzi.it	2011-06-20 18:13:28.677835+02	2
8	Progetto inutile	Progetto di creazione di niente	www.boh.it	2011-06-20 18:13:28.677835+02	7
9	Altro progetto inutile	Progetto di creazione di niente	www.riboh.it	2011-06-20 18:13:28.677835+02	8
10	Ipad 3	Progetto di creazione di un nuovo tablet	www.ipad3.it	2011-06-20 18:13:28.677835+02	1
11	Mac 999	Progetto di creazione di un nuovo pc	www.mac999.it	2011-06-20 18:13:28.677835+02	10
12	Albinoleffe	Progetto di creazione di una squadra migliore	www.albinoleffe.it	2011-06-20 18:13:28.677835+02	14
\.


--
-- Data for Name: ticket; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY ticket (id, titolo, descrizione, datacreazione, ultimamodifica, priorita, status, datachiusura, categoria, progetto, id_creatore, id_assegnato) FROM stdin;
1	Non riceve l antenna	L antenna non riceve molto bene in galleria	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	1	new            	\N	Antenna	1	1	1
2	Wi-fi non funzionante	Il wi-fi si scollega se il cellulare viene spento	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	2	new            	\N	WiFi	1	2	2
3	Schermo piccolo	Lo schermo e da ingrandire	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	3	new            	\N	Schermo	1	3	3
4	Friut-Ninja	Vedere nel progetto ipad	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	4	new            	\N	Altra categoria	5	1	1
5	Colori	Bianco e nero non bastano, dobbiamo aggiungere altri colori	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	5	new            	\N	Altra categoria	10	4	5
6	Ticket6	Descrizione6	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	4	new            	\N	Altra categoria	12	8	5
7	Riproduzione musica	Non riproduce le canzoni di Vasco	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	3	new            	\N	Categoria	5	12	11
8	Fruit-Ninja	Alcuni giochi, come fruitninja, vanno a scatti!	2011-06-20 18:13:28.677835+02	2011-06-20 18:13:28.677835+02	2	new            	\N	Categoria senza nome	10	4	6
\.


--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY utente (id, email, password, nome, cognome, indirizzo, residenza, telefono, dataregistrazione) FROM stdin;
1	steve@bugbox.it	d69403e2673e611d4cbd3fad6fd1788e	Steve	Jobs	\N	Paese	\N	2011-06-20 18:13:28.677835+02
2	gianluca@bugbox.it	77aaddd8de3aadc90393716e4e2b3464	Gianluca	Demarinis	Via Cornagera 15	Selvino	\N	2011-06-20 18:13:28.677835+02
3	simone@bugbox.it	47eb752bac1c08c75e30d9624b3e58b7	Simone	Micheli	Via 24 Maggio	Zogno	\N	2011-06-20 18:13:28.677835+02
4	mario@bugbox.it	de2f15d014d40b93578d255e6221fd60	Mario	Verdi	\N	Paese	\N	2011-06-20 18:13:28.677835+02
5	carlo@bugbox.it	7d6543d7862a07edf7902086f39b4b9a	Carlo	Dentella	\N	Paese	\N	2011-06-20 18:13:28.677835+02
6	giuseppe@bugbox.it	353f9bfab2d01dbb1db343fdaf9ab02e	Giuseppe	Psaila	\N	Paese	\N	2011-06-20 18:13:28.677835+02
7	anna@bugbox.it	a70f9e38ff015afaa9ab0aacabee2e13	Anna	Zanga	\N	Paese	\N	2011-06-20 18:13:28.677835+02
8	maria@bugbox.it	263bce650e68ab4e23f28263760b9fa5	Maria	Tedesco	\N	Paese	\N	2011-06-20 18:13:28.677835+02
9	pia@bugbox.it	32adf050226995bf2311421ebe0698e0	Pia	Carrara	\N	Paese	\N	2011-06-20 18:13:28.677835+02
10	antonia@bugbox.it	4a6f93feab73fbe7b10942a4a4e4b83c	Antonia	Seghezzi	\N	Paese	\N	2011-06-20 18:13:28.677835+02
11	barbara@bugbox.it	4d6c4d6b5b6c7fd2c43727ce32a56f4e	Barbara	Camozzi	\N	Paese	\N	2011-06-20 18:13:28.677835+02
12	jennifer@bugbox.it	1660fe5c81c4ce64a2611494c439e1ba	Jennifer	Pellegrino	\N	Paese	\N	2011-06-20 18:13:28.677835+02
13	carlotta@bugbox.it	22a3d92dfcfc5b9d13b553d2d6ffc746	Carlotta	Gotti	\N	Paese	\N	2011-06-20 18:13:28.677835+02
14	stefano@bugbox.it	317a58affea472972b63bffdd3392ae0	Stefano	Demarinis	\N	Paese	\N	2011-06-20 18:13:28.677835+02
\.


--
-- Name: categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (nome, id_progetto);


--
-- Name: notaprogetto_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY notaprogetto
    ADD CONSTRAINT notaprogetto_pkey PRIMARY KEY (id);


--
-- Name: notaticket_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY notaticket
    ADD CONSTRAINT notaticket_pkey PRIMARY KEY (id);


--
-- Name: notautente_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY notautente
    ADD CONSTRAINT notautente_pkey PRIMARY KEY (id);


--
-- Name: partecipante_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY partecipante
    ADD CONSTRAINT partecipante_pkey PRIMARY KEY (id_utente, id_progetto);


--
-- Name: progetto_id_proprietario_nome_key; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY progetto
    ADD CONSTRAINT progetto_id_proprietario_nome_key UNIQUE (id_proprietario, nome);


--
-- Name: progetto_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY progetto
    ADD CONSTRAINT progetto_pkey PRIMARY KEY (id);


--
-- Name: ticket_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (id);


--
-- Name: ticket_titolo_categoria_key; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY ticket
    ADD CONSTRAINT ticket_titolo_categoria_key UNIQUE (titolo, categoria);


--
-- Name: utente_email_key; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY utente
    ADD CONSTRAINT utente_email_key UNIQUE (email);


--
-- Name: utente_pkey; Type: CONSTRAINT; Schema: public; Owner: bugbox; Tablespace: 
--

ALTER TABLE ONLY utente
    ADD CONSTRAINT utente_pkey PRIMARY KEY (id);


--
-- Name: controllanotautente; Type: TRIGGER; Schema: public; Owner: bugbox
--

CREATE TRIGGER controllanotautente BEFORE INSERT OR UPDATE ON notautente FOR EACH ROW EXECUTE PROCEDURE controllanotautente();


--
-- Name: controllaticket; Type: TRIGGER; Schema: public; Owner: bugbox
--

CREATE TRIGGER controllaticket BEFORE INSERT OR UPDATE ON ticket FOR EACH ROW EXECUTE PROCEDURE controllaticket();


--
-- Name: categoria_id_progetto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_id_progetto_fkey FOREIGN KEY (id_progetto) REFERENCES progetto(id) ON DELETE CASCADE;


--
-- Name: notaprogetto_id_creatore_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notaprogetto
    ADD CONSTRAINT notaprogetto_id_creatore_fkey FOREIGN KEY (id_creatore) REFERENCES utente(id);


--
-- Name: notaprogetto_id_progetto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notaprogetto
    ADD CONSTRAINT notaprogetto_id_progetto_fkey FOREIGN KEY (id_progetto) REFERENCES progetto(id) ON DELETE CASCADE;


--
-- Name: notaticket_id_creatore_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notaticket
    ADD CONSTRAINT notaticket_id_creatore_fkey FOREIGN KEY (id_creatore) REFERENCES utente(id);


--
-- Name: notaticket_id_ticket_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notaticket
    ADD CONSTRAINT notaticket_id_ticket_fkey FOREIGN KEY (id_ticket) REFERENCES ticket(id) ON DELETE CASCADE;


--
-- Name: notautente_id_creatore_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notautente
    ADD CONSTRAINT notautente_id_creatore_fkey FOREIGN KEY (id_creatore) REFERENCES utente(id);


--
-- Name: notautente_id_destinatario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY notautente
    ADD CONSTRAINT notautente_id_destinatario_fkey FOREIGN KEY (id_destinatario) REFERENCES utente(id);


--
-- Name: partecipante_id_progetto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY partecipante
    ADD CONSTRAINT partecipante_id_progetto_fkey FOREIGN KEY (id_progetto) REFERENCES progetto(id) ON DELETE CASCADE;


--
-- Name: partecipante_id_utente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY partecipante
    ADD CONSTRAINT partecipante_id_utente_fkey FOREIGN KEY (id_utente) REFERENCES utente(id);


--
-- Name: progetto_id_proprietario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY progetto
    ADD CONSTRAINT progetto_id_proprietario_fkey FOREIGN KEY (id_proprietario) REFERENCES utente(id);


--
-- Name: ticket_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY ticket
    ADD CONSTRAINT ticket_categoria_fkey FOREIGN KEY (categoria, progetto) REFERENCES categoria(nome, id_progetto) ON DELETE CASCADE;


--
-- Name: ticket_id_assegnato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY ticket
    ADD CONSTRAINT ticket_id_assegnato_fkey FOREIGN KEY (id_assegnato) REFERENCES utente(id) ON DELETE SET NULL;


--
-- Name: ticket_id_creatore_fkey; Type: FK CONSTRAINT; Schema: public; Owner: bugbox
--

ALTER TABLE ONLY ticket
    ADD CONSTRAINT ticket_id_creatore_fkey FOREIGN KEY (id_creatore) REFERENCES utente(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

