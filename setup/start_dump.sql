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

SELECT pg_catalog.setval('notaprogetto_id_seq', 1, false);


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

SELECT pg_catalog.setval('notaticket_id_seq', 1, false);


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

SELECT pg_catalog.setval('notautente_id_seq', 1, false);


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

SELECT pg_catalog.setval('progetto_id_seq', 1, false);


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

SELECT pg_catalog.setval('ticket_id_seq', 1, false);


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

SELECT pg_catalog.setval('utente_id_seq', 1, false);


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
\.


--
-- Data for Name: notaprogetto; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notaprogetto (id, testo, data, id_creatore, id_progetto) FROM stdin;
\.


--
-- Data for Name: notaticket; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notaticket (id, testo, data, id_creatore, id_ticket) FROM stdin;
\.


--
-- Data for Name: notautente; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY notautente (id, testo, data, id_creatore, id_destinatario) FROM stdin;
\.


--
-- Data for Name: partecipante; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY partecipante (id_utente, id_progetto, tipo, creatoil) FROM stdin;
\.


--
-- Data for Name: progetto; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY progetto (id, nome, descrizione, indirizzoweb, creatoil, id_proprietario) FROM stdin;
\.


--
-- Data for Name: ticket; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY ticket (id, titolo, descrizione, datacreazione, ultimamodifica, priorita, status, datachiusura, categoria, progetto, id_creatore, id_assegnato) FROM stdin;
\.


--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: bugbox
--

COPY utente (id, email, password, nome, cognome, indirizzo, residenza, telefono, dataregistrazione) FROM stdin;
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

