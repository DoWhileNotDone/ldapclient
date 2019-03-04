\! echo "--- INIT SCRIPT ---"

DROP SCHEMA IF EXISTS ldapclient CASCADE;

DO
$do$
BEGIN
   IF NOT EXISTS (
      SELECT                       -- SELECT list can stay empty for this
      FROM   pg_catalog.pg_roles
      WHERE  rolname = 'ldapclient') THEN
      CREATE USER ldapclient WITH ENCRYPTED PASSWORD 'ldapclient';
   END IF;
END
$do$;

CREATE SCHEMA ldapclient AUTHORIZATION ldapclient;

\! echo "Creating Tables..."


\! echo "Granting Schema Privs..."
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA ldapclient TO ldapclient;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA ldapclient TO ldapclient;
