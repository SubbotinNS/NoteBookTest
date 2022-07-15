USE laravel_notebooktest;
CREATE TABLE migrations (
  id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  migration VARCHAR(255) NOT NULL,
  batch INT(11) NOT NULL
);

INSERT INTO migrations VALUES (29, '2014_10_12_000000_create_users_table',2);
INSERT INTO migrations VALUES (30, '2014_10_12_100000_create_password_resets_table',2);
INSERT INTO migrations VALUES (31, '2019_08_19_000000_create_failed_jobs_table',2);
INSERT INTO migrations VALUES (32, '2019_12_14_000001_create_personal_access_tokens_table',2);
INSERT INTO migrations VALUES (33, '2022_07_13_215742_create_notebooktable',2);
