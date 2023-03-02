\connect "test";

CREATE SEQUENCE portlet_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 20 CACHE 1;

CREATE TABLE "public"."portlet" (
    "portlet_id" integer DEFAULT nextval('portlet_seq') NOT NULL
    ,"header" text
    ,"portlet_name" text
    , CONSTRAINT "portlet_pk" PRIMARY KEY ("portlet_id")
) WITH (oids = false);

INSERT INTO "portlet" ("header", "portlet_name") VALUES
('Window title of portlet_01','portlet_01'),
('Window title of portlet_02','portlet_02'),
('Window title of portlet_03','portlet_03'),
('Window title of portlet_04','portlet_04');

CREATE SEQUENCE user_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 20 CACHE 1;

CREATE TABLE "public"."portlet_user" (
    "user_id" integer DEFAULT nextval('user_seq') NOT NULL
    ,"portlets_state" text
    ,"portlets_left" text
    ,"portlets_right" text 
    , CONSTRAINT "portlet_user_pk" PRIMARY KEY ("user_id")
) WITH (oids = false);

INSERT INTO "portlet_user" ("user_id","portlets_state", "portlets_left", "portlets_right") VALUES
(10,'','portlet_01,portlet_02','portlet_03,portlet_04');
