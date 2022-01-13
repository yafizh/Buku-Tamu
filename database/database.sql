CREATE DATABASE `db_buku_tamu`;
USE `db_buku_tamu`;

CREATE TABLE `tabel_user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('ADMIN','PEGAWAI') NOT NULL,
    PRIMARY KEY (id_user)
);

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_ruangan)
);

CREATE TABLE `tabel_buku_tamu` (
    id_tamu INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_ruangan INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    jam_masuk TIME NOT NULL,
    jam_keluar TIME NULL,
    alamat VARCHAR(255) NOT NULL,
    nomor_handphone VARCHAR(15) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    status_kunjungan ENUM('SEDANG BERKUNJUNG', 'TELAH BERKUNJUNG') NOT NULL,
    kesan_kunjungan TEXT NOT NULL,
    PRIMARY KEY (id_tamu),
    FOREIGN KEY (id_user) REFERENCES tabel_user (id_user)
);

CREATE VIEW 
    `view_buku_tamu` 
AS 
    SELECT 
        tabel_buku_tamu.*,
        tabel_user.nama AS nama_user,
        tabel_user.username,
        tabel_ruangan.nama_ruangan,
        tabel_ruangan.keterangan 
    FROM 
        tabel_buku_tamu 
    INNER JOIN 
        tabel_user 
    ON 
        tabel_user.id_user=tabel_buku_tamu.id_user 
    INNER JOIN 
        tabel_ruangan 
    ON 
        tabel_ruangan.id_ruangan=tabel_buku_tamu.id_ruangan;


INSERT INTO `tabel_user` (
    nama,
    username,
    password,
    status
) VALUES 
('Firdaus', 'admin','admin','ADMIN'),
('Firdaus', 'daus','daus','PEGAWAI');

INSERT INTO `tabel_ruangan` (
    nama_ruangan,
    keterangan 
) VALUES 
('PERPUSTAKAAN', 'Ruangan Perpustakaan'),
('SEKRETARIAT', 'Ruangan Sekretariat'),
('KEPALA DINAS', 'Ruangan Kepala Dinas'),
('BAGIAN UMUM DAN KEPEGAWAIN', 'Ruangan Bagian Umum dan Kepegawain'),
('BAGIAN PERENCANAAN DAN KEUANGAN', 'Ruangan Bagian Perencanaan dan Keuangan'),
('KEARSIPAN', 'Ruangan Kearsipan');

INSERT INTO `tabel_buku_tamu` (
    id_user,
    id_ruangan,
    nama,
    alamat,
    tanggal,
    jam_masuk,
    jam_keluar,
    nomor_handphone,
    keperluan,
    status_kunjungan  
) VALUES 
(2, 2, 'Nurcholis', 'Astambul', '2021-12-1', '07:00:00', '08:00:00', '111111111', 'Magang', 'TELAH BERKUNJUNG'), 
(2, 2, 'Nursahid Arya Suyudi', 'Binuang', '2021-11-1', '07:00:00', '08:00:00', '222222222', 'Berkunjung ke PERPUSTAKAAN', 'TELAH BERKUNJUNG'), 
(2, 2, 'Diki Suti Prasetya', 'Banjarbaru', '2020-05-05', '07:00:00', '08:00:00', '333333333', 'Berkunjung', 'TELAH BERKUNJUNG'), 
(2, 2, 'Andry', 'Binuang', '2021-12-04', '07:00:00', '08:00:00', '444444444', 'Bertamu', 'TELAH BERKUNJUNG'), 
(2, 2, 'Rania Nor Aida', 'Astambul', '2021-10-01', '07:00:00', '08:00:00', '555555555', 'Baca Buku', 'TELAH BERKUNJUNG'), 
(2, 2, 'Ahmad Rifai', 'Martapura', '2021-12-03', '07:00:00', '08:00:00', '666666', 'Magang', 'TELAH BERKUNJUNG');
