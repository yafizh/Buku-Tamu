CREATE DATABASE `db_buku_tamu`;
USE `db_buku_tamu`;

CREATE TABLE `tabel_user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    user_username VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_status ENUM('ADMIN','PEGAWAI') NOT NULL,
    PRIMARY KEY (id_user)
);

CREATE TABLE `tabel_buku_tamu` (
    id_tamu INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    nomor_handphone VARCHAR(15) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_tamu),
    FOREIGN KEY (id_user) REFERENCES tabel_user (id_user)
);

INSERT INTO `tabel_user` (
    user_username,
    user_password,
    user_status
) VALUES 
('admin','admin','ADMIN'),
('daus','daus','PEGAWAI');

INSERT INTO `tabel_buku_tamu` (
    id_user,
    nama,
    alamat,
    tanggal,
    nomor_handphone,
    keperluan
) VALUES 
(2, 'Nurcholis', 'Astambul', '2021-12-1', '111111111', 'Magang'), 
(2, 'Nursahid Arya Suyudi', 'Binuang', '2021-11-1', '222222222', 'Berkunjung ke perpustakaan'), 
(2, 'Diki Suti Prasetya', 'Banjarbaru', '2020-05-05', '333333333', 'Berkunjung'), 
(2, 'Andry', 'Binuang', '2021-12-04', '444444444', 'Bertamu'), 
(2, 'Rania Nor Aida', 'Astambul', '2021-10-01', '555555555', 'Baca Buku'), 
(2, 'Ahmad Rifai', 'Martapura', '2021-12-03', '666666', 'Magang');
