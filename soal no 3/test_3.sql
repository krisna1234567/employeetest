CREATE TABLE karyawan(
     id_karyawan INT(11) auto_increment primary key,
     nik VARCHAR(10) unique,
     nama VARCHAR(100),
    ttl DATE,
    alamat TEXT,
    id_jabatan INT(11), id_dept INT(11));

CREATE TABLE jabatan(
     id_jabatan INT(11) auto_increment primary key,
     nama_jabatan VARCHAR(100),
    id_level INT(11));

CREATE TABLE departement(
    id_dept INT(11) auto_increment primary key,
    nama_dept VARCHAR(100));

CREATE TABLE level(
	id_level INT(11) auto_increment primary key,
	nama_level VARCHAR(100));


insert into departement(nama_dept)
	VALUES('IT'),
	('Sales'),
	('Finance');


insert into level(nama_level)
	VALUES('Low Management'),
	('Middle Management'),
	('Top Management');


insert into jabatan(nama_jabatan, id_level)
	VALUES('Staf', '1'),
	('Supervisor','2'),
	('Manager', '3');


insert into karyawan(nik, nama, ttl, alamat, id_jabatan, id_dept)
	VALUES('06511658', 'Krisna', '1998-04-25', 'Ciawi', 3, 1),
	('065116124', 'Budi', '2000-05-01', 'Depok', 2, 2),
	('065116123', 'Joko', '2005-04-01', 'Depok', 1, 3);

SELECT nama, nama_jabatan, nama_dept, nama_level FROM karyawan a JOIN jabatan b On a.id_jabatan = b.id_jabatan JOIN departement c On a.id_dept = c.id_dept JOIN level d On b.id_level = d.id_level;

UPDATE karyawan SET nama = 'Joko Anwar' Where id_karyawan = 3;

DELETE from karyawan where id_karyawan = 2;









