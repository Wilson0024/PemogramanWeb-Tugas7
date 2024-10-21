CREATE DATABASE mhs;

use mhs;

CREATE TABLE identitas (
    npm varchar(12) NOT NULL,
    nama varchar(20),
    alamat varchar(100),
    tgl_lhr date,
    jk char(1),
    email varchar(40),
    PRIMARY KEY(npm)
);

CREATE TABLE users (
    username varchar(20),
    pass varchar(100),
    npm varchar(12),
    level char(1),
    foreign key (npm) REFERENCES identitas(npm)
);

INSERT INTO identitas (npm, nama, alamat, tgl_lhr, jk, email) VALUES 
('140810230001', 'Budi Santoso', 'Jalan Merdeka No. 10', '2000-02-15', 'L', 'budi@example.com'),
('140810230002', 'Ayu Lestari', 'Jalan Mawar No. 5', '2000-03-22', 'P', 'ayu@example.com');


INSERT INTO users (username, pass, npm, level) VALUES 
('budisantoso', SHA1('passwordbudi'), '140810230001', '1'),
('ayulestari', SHA1('passwordayu'), '140810230002', '1');

INSERT INTO users (username, pass, level) VALUES 
('admin', SHA1('passwordadmin'), '2');

