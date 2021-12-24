CREATE DATABASE `db_buku_tamu`;
USE `db_buku_tamu`;

CREATE TABLE `tabel_buku_tamu` (
    id_tamu INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    nomor_handphone VARCHAR(15) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_tamu)
);

INSERT INTO `tabel_buku_tamu` (
    nama,
    alamat,
    tanggal,
    nomor_handphone,
    keperluan
) VALUES 
('Nurcholis', 'Astambul', '2021-12-1', '111111111', 'Magang'), 
('Nursahid Arya Suyudi', 'Binuang', '2021-11-1', '222222222', 'Berkunjung ke perpustakaan'), 
('Diki Suti Prasetya', 'Banjarbaru', '2020-05-05', '333333333', 'Berkunjung'), 
('Andry', 'Binuang', '2021-12-04', '444444444', 'Bertamu'), 
('Rania Nor Aida', 'Astambul', '2021-10-01', '555555555', 'Baca Buku'), 
('Ahmad Rifai', 'Martapura', '2021-12-03', '666666', 'Magang');
