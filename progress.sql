-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.9.1
-- PostgreSQL version: 10.0
-- Project Site: pgmodeler.io
-- Model Author: ---


-- Database creation must be done outside a multicommand file.
-- These commands were put in this file only as a convenience.
-- -- object: progress | type: DATABASE --
-- -- DROP DATABASE IF EXISTS progress;
-- CREATE DATABASE progress;
-- -- ddl-end --
-- 

-- object: public.activities | type: TABLE --
-- DROP TABLE IF EXISTS public.activities CASCADE;
CREATE TABLE public.activities(
	theme_id smallint,
	activity_id smallint NOT NULL,
	activity_title varchar(100),
	description text,
	startdate date,
	intended_completion_date date,
	completion_date date,
	performance_measure_indicator varchar(100),
	baseline smallint,
	target smallint,
	achieved smallint,
	status varchar(100),
	activity_state varchar(100),
	strategy_id smallint,
	theme_id_themes smallint,
	logger_id_stuff_logger integer,
	strategy varchar(250),
	CONSTRAINT activities_pk PRIMARY KEY (activity_id)

);
-- ddl-end --
ALTER TABLE public.activities OWNER TO postgres;
-- ddl-end --

-- object: public.strategy | type: TABLE --
-- DROP TABLE IF EXISTS public.strategy CASCADE;
CREATE TABLE public.strategy(
	strategy_id smallint NOT NULL ,
	strategy varchar(250),
	description text,
	startdate date,
	intended_completion_date date,
	completion_date date,
	modified_on date,
	supervising_unit varchar(100),
	additional_info text,
	deleted varchar(100),
	CONSTRAINT topic_pk PRIMARY KEY (strategy_id)

);
-- ddl-end --
ALTER TABLE public.strategy OWNER TO postgres;
-- ddl-end --

-- object: public.status | type: TABLE --
-- DROP TABLE IF EXISTS public.status CASCADE;
CREATE TABLE public.status(
	username varchar(100),
	activity varchar(250),
	status_update varchar(250),
	update_date date,
	activity_id_activities smallint,
	theme_id_themes smallint
);
-- ddl-end --
ALTER TABLE public.status OWNER TO postgres;
-- ddl-end --

-- object: public.themes | type: TABLE --
-- DROP TABLE IF EXISTS public.themes CASCADE;
CREATE TABLE public.themes(
	theme_id smallint NOT NULL,
	theme varchar(100),
	completion_date date,
	strategy varchar(250),
	start_date date,
	intended_completion_date date,
	strategy_id_strategy smallint,
	CONSTRAINT theme_pk PRIMARY KEY (theme_id)

);
-- ddl-end --
ALTER TABLE public.themes OWNER TO postgres;
-- ddl-end --

-- object: public.users | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.users CASCADE;
CREATE SEQUENCE public.users
	INCREMENT BY 1
	MINVALUE 0
	MAXVALUE 2147483647
	START WITH 1
	CACHE 1
	NO CYCLE
	OWNED BY NONE;
-- ddl-end --
ALTER SEQUENCE public.users OWNER TO postgres;
-- ddl-end --

-- object: public.users | type: TABLE --
-- DROP TABLE IF EXISTS public.users CASCADE;
CREATE TABLE public.users(
	username varchar(100) NOT NULL,
	password varchar(20),
	email varchar(100),
	pj varchar,
	fullname varchar(50),
	designation varchar(100),
	station varchar(100),
	CONSTRAINT users_pk PRIMARY KEY (username)

);
-- ddl-end --
ALTER TABLE public.users OWNER TO postgres;
-- ddl-end --

-- object: public.responsibility | type: TABLE --
-- DROP TABLE IF EXISTS public.responsibility CASCADE;
CREATE TABLE public.responsibility(
	username varchar(50),
	activity_id smallint,
	responsibility_id smallint NOT NULL,
	username_users varchar(100),
	activity_id_activities smallint,
	CONSTRAINT responsibity_pk PRIMARY KEY (responsibility_id)

);
-- ddl-end --
ALTER TABLE public.responsibility OWNER TO postgres;
-- ddl-end --

-- object: public.stuff_logger | type: TABLE --
-- DROP TABLE IF EXISTS public.stuff_logger CASCADE;
CREATE TABLE public.stuff_logger(
	logger_id serial NOT NULL,
	username varchar,
	action_time timestamp,
	activity_id smallint,
	action varchar(100),
	description varchar(100),
	username_users varchar(100),
	CONSTRAINT stuff_logger_pk PRIMARY KEY (logger_id)

);
-- ddl-end --
ALTER TABLE public.stuff_logger OWNER TO postgres;
-- ddl-end --

-- object: public.strategy | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.strategy CASCADE;
CREATE SEQUENCE public.strategy
	INCREMENT BY 1
	MINVALUE 0
	MAXVALUE 2147483647
	START WITH 1
	CACHE 1
	NO CYCLE
	OWNED BY NONE; 
-- ddl-end --
ALTER SEQUENCE public.strategy OWNER TO postgres;
-- ddl-end --

-- object: themes_fk | type: CONSTRAINT --
-- ALTER TABLE public.activities DROP CONSTRAINT IF EXISTS themes_fk CASCADE;
ALTER TABLE public.activities ADD CONSTRAINT themes_fk FOREIGN KEY (theme_id_themes)
REFERENCES public.themes (theme_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: activities_fk | type: CONSTRAINT --
-- ALTER TABLE public.status DROP CONSTRAINT IF EXISTS activities_fk CASCADE;
ALTER TABLE public.status ADD CONSTRAINT activities_fk FOREIGN KEY (activity_id_activities)
REFERENCES public.activities (activity_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: themes_fk | type: CONSTRAINT --
-- ALTER TABLE public.status DROP CONSTRAINT IF EXISTS themes_fk CASCADE;
ALTER TABLE public.status ADD CONSTRAINT themes_fk FOREIGN KEY (theme_id_themes)
REFERENCES public.themes (theme_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: users_fk | type: CONSTRAINT --
-- ALTER TABLE public.responsibility DROP CONSTRAINT IF EXISTS users_fk CASCADE;
ALTER TABLE public.responsibility ADD CONSTRAINT users_fk FOREIGN KEY (username_users)
REFERENCES public.users (username) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: users_fk | type: CONSTRAINT --
-- ALTER TABLE public.stuff_logger DROP CONSTRAINT IF EXISTS users_fk CASCADE;
ALTER TABLE public.stuff_logger ADD CONSTRAINT users_fk FOREIGN KEY (username_users)
REFERENCES public.users (username) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: stuff_logger_fk | type: CONSTRAINT --
-- ALTER TABLE public.activities DROP CONSTRAINT IF EXISTS stuff_logger_fk CASCADE;
ALTER TABLE public.activities ADD CONSTRAINT stuff_logger_fk FOREIGN KEY (logger_id_stuff_logger)
REFERENCES public.stuff_logger (logger_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: strategy_fk | type: CONSTRAINT --
-- ALTER TABLE public.themes DROP CONSTRAINT IF EXISTS strategy_fk CASCADE;
ALTER TABLE public.themes ADD CONSTRAINT strategy_fk FOREIGN KEY (strategy_id_strategy)  
REFERENCES public.strategy (strategy_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.theme_resp | type: TABLE --
-- DROP TABLE IF EXISTS public.theme_resp CASCADE;
CREATE TABLE public.theme_resp(
	responsibility_id smallint,
	theme_id smallint NOT NULL,
	username varchar(100),
	theme_id_themes smallint,
	username_users varchar(100),
	CONSTRAINT theme_resp_pk PRIMARY KEY (theme_id)

);
-- ddl-end --
ALTER TABLE public.theme_resp OWNER TO postgres;
-- ddl-end --

-- object: public.strategy_resp | type: TABLE --
-- DROP TABLE IF EXISTS public.strategy_resp CASCADE;
CREATE TABLE public.strategy_resp(
	responsibility_id smallint,
	strategy_id smallint NOT NULL,
	username varchar(100),
	strategy_id_strategy smallint,
	username_users varchar(100),
	CONSTRAINT strategy_resp_pk PRIMARY KEY (strategy_id)

);
-- ddl-end --
ALTER TABLE public.strategy_resp OWNER TO postgres;
-- ddl-end --

-- object: activities_fk | type: CONSTRAINT --
-- ALTER TABLE public.responsibility DROP CONSTRAINT IF EXISTS activities_fk CASCADE;
ALTER TABLE public.responsibility ADD CONSTRAINT activities_fk FOREIGN KEY (activity_id_activities)
REFERENCES public.activities (activity_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: strategy_fk | type: CONSTRAINT --
-- ALTER TABLE public.strategy_resp DROP CONSTRAINT IF EXISTS strategy_fk CASCADE;
ALTER TABLE public.strategy_resp ADD CONSTRAINT strategy_fk FOREIGN KEY (strategy_id_strategy)
REFERENCES public.strategy (strategy_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: themes_fk | type: CONSTRAINT --
-- ALTER TABLE public.theme_resp DROP CONSTRAINT IF EXISTS themes_fk CASCADE;
ALTER TABLE public.theme_resp ADD CONSTRAINT themes_fk FOREIGN KEY (theme_id_themes)
REFERENCES public.themes (theme_id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: users_fk | type: CONSTRAINT --
-- ALTER TABLE public.theme_resp DROP CONSTRAINT IF EXISTS users_fk CASCADE;
ALTER TABLE public.theme_resp ADD CONSTRAINT users_fk FOREIGN KEY (username_users)
REFERENCES public.users (username) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: users_fk | type: CONSTRAINT --
-- ALTER TABLE public.strategy_resp DROP CONSTRAINT IF EXISTS users_fk CASCADE;
ALTER TABLE public.strategy_resp ADD CONSTRAINT users_fk FOREIGN KEY (username_users)
REFERENCES public.users (username) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --


