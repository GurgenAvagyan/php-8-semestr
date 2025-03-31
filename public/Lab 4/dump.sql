DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(50) NOT NULL,
    "email" character varying(100) NOT NULL,
    "password" character varying(255) NOT NULL,
    CONSTRAINT "users_email_key" UNIQUE ("email"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "users_username_key" UNIQUE ("username")
) WITH (oids = false);

TRUNCATE "users";
INSERT INTO "users" ("id", "username", "email", "password") VALUES
(1,	'admin',	'point@gmail.com',	'$2y$10$NkCFTmpSO25PABkJaACSqe3d0UOM0e9XoFeAW8IZQPvWemwy9nKre'),
(2,	'admin23',	'point23@gmail.com',	'$2y$10$j1pj13u/PxVybIGQRqguYOEgGV27l7PAFAqLmtVsD5Y9H.uUpdd.a');
