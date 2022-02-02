CREATE DATABASE `db_buku_tamu`;
USE `db_buku_tamu`;

CREATE TABLE `tabel_dokumen` (
    id_dokumen INT NOT NULL AUTO_INCREMENT,
    nomor_dokumen VARCHAR(255) NOT NULL,
    nama_dokumen VARCHAR(255) NOT NULL,
    isi_dokumen TEXT NOT NULL,
    keterangan ENUM('TERLAKSANA', 'BELUM TERLAKSANA', 'MASIH AGENDA') NOT NULL,
    PRIMARY KEY(id_dokumen)
);

CREATE TABLE `tabel_user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('ADMIN','PETUGAS') NOT NULL,
    PRIMARY KEY (id_user)
);

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_ruangan)
);

CREATE TABLE `tabel_agenda` (
    id_agenda INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    kegiatan TEXT NOT NULL,
    pejabat VARCHAR(255) NULL,
    fotografer VARCHAR(255) NULL,
    PRIMARY KEY (id_agenda),
    FOREIGN KEY (id_ruangan) REFERENCES tabel_ruangan (id_ruangan)
);

CREATE TABLE `tabel_buku_tamu` (
    id_tamu INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_ruangan INT NOT NULL,
    nomor_identitas VARCHAR(255) NOT NULL,
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
    FOREIGN KEY (id_user) REFERENCES tabel_user (id_user),
    FOREIGN KEY (id_ruangan) REFERENCES tabel_ruangan (id_ruangan)
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

CREATE VIEW 
    `view_agenda` 
AS 
    SELECT 
        tabel_agenda.*,
        tabel_ruangan.nama_ruangan 
    FROM 
        tabel_agenda 
    INNER JOIN 
        tabel_ruangan 
    ON 
        tabel_agenda.id_ruangan=tabel_ruangan.id_ruangan;

CREATE VIEW 
    `view_jumlah_kunjungan_ruangan` 
AS 
    SELECT 
        tabel_ruangan.*,
        (SELECT COUNT(id_tamu) FROM tabel_buku_tamu WHERE tabel_buku_tamu.id_ruangan=tabel_ruangan.id_ruangan) AS jumlah_kunjungan 
    FROM 
        tabel_ruangan;

CREATE VIEW 
    `view_jumlah_kunjungan_per_petugas` 
AS 
    SELECT 
        tabel_user.*,
        (SELECT COUNT(id_tamu) FROM tabel_buku_tamu WHERE tabel_buku_tamu.id_user=tabel_user.id_user) AS jumlah_pengunjung 
    FROM 
        tabel_user 
    WHERE 
        tabel_user.status = 'PETUGAS';


INSERT INTO `tabel_user` (
    nama,
    username,
    password,
    status
) VALUES 
('Firdaus', 'admin','admin','ADMIN'),
('Firdaus', 'daus','daus','PETUGAS');

INSERT INTO `tabel_ruangan` (
    nama_ruangan,
    keterangan 
) VALUES 
('Umum dan Kepegawaian', 'Ruangan Umum dan Kepegawaian'),
('Perencanaan dan Keuangan', 'Ruangan Perencanaan dan Keuangan'),
('Sekretaris', 'Ruangan Sekretaris'),
('Fungsional', 'Ruangan Fungsional'),
('Ruang Kepala Dinas', 'Ruangan Kepala Dinas'),
('Studio Mini', 'Ruangan Studio Mini'),
('Musholla', 'Ruangan Musholla'),
('Wakapitu', 'Ruangan Wakapitu'),
('Aula', 'Ruangan Aula'),
('Brailie Corner', 'Ruangan Brailie Corner'),
('Perpustakaan Keliling', 'Ruangan Perpustakaan Keliling'),
('Sirkulasi', 'Ruangan Sirkulasi'),
('Ruangan Anak', 'Ruangan Anak'),
('Depo Arsip', 'Ruangan Depo Arsip');

INSERT INTO `tabel_buku_tamu` (
    id_user,
    id_ruangan,
    nomor_identitas,
    nama,
    alamat,
    tanggal,
    jam_masuk,
    jam_keluar,
    nomor_handphone,
    keperluan,
    status_kunjungan,
    kesan_kunjungan 
) VALUES 
(2, 2, '18631111', 'Nurcholis', 'Astambul', '2021-12-1', '07:00:00', '08:00:00', '111111111', 'Magang', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631112', 'Nursahid Arya Suyudi', 'Binuang', '2021-11-1', '07:00:00', '08:00:00', '222222222', 'Berkunjung ke PERPUSTAKAAN', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631113', 'Diki Suti Prasetya', 'Banjarbaru', '2020-05-05', '07:00:00', '08:00:00', '333333333', 'Berkunjung', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631114', 'Andry', 'Binuang', '2021-12-04', '07:00:00', '08:00:00', '444444444', 'Bertamu', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631114', 'Rania Nor Aida', 'Astambul', '2021-10-01', '07:00:00', '08:00:00', '555555555', 'Baca Buku', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631115', 'Ahmad Rifai', 'Martapura', '2021-12-03', '07:00:00', '08:00:00', '666666', 'Magang', 'TELAH BERKUNJUNG', 'oke');
