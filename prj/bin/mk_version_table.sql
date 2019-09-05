CREATE TABLE IF NOT EXISTS "version" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "filename" VARCHAR(100),
  "section" VARCHAR(30),
  "name" VARCHAR(10),
  "value" VARCHAR(100),
  "note" VARCHAR(100),
  "log_id" CHAR(65),
  UNIQUE (filename, name, log_id) ON CONFLICT ROLLBACK
);
