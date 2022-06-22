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
    status ENUM('ADMIN','PETUGAS', 'SEKOLAH') NOT NULL,
    tanggal DATE NOT NULL,
    PRIMARY KEY (id_user)
);

CREATE TABLE `tabel_petugas` (
    id_petugas INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    tugas VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    PRIMARY KEY (id_petugas)
);

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    ruangan VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_ruangan)
);

CREATE TABLE `tabel_rak_buku` (
    id_rak_buku INT NOT NULL AUTO_INCREMENT,
    nomor_rak VARCHAR(255) NOT NULL,
    kategori_rak VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_rak_buku)
);

CREATE TABLE `tabel_agenda` (
    id_agenda INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    id_user INT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    kegiatan TEXT NOT NULL,
    jenis ENUM('KUNJUNGAN SEKOLAH', 'EVENT', 'INTERNAL'),
    status ENUM('PENGAJUAN', 'DITOLAK', 'DISETUJUI'),
    PRIMARY KEY (id_agenda),
    FOREIGN KEY (id_ruangan) REFERENCES tabel_ruangan (id_ruangan), 
    FOREIGN KEY (id_user) REFERENCES tabel_user (id_user)
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
        tabel_ruangan.nama AS nama_ruangan,
        tabel_ruangan.ruangan,
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
        tabel_ruangan.nama AS nama_ruangan, 
        tabel_ruangan.ruangan 
    FROM 
        tabel_agenda 
    INNER JOIN 
        tabel_ruangan 
    ON 
        tabel_agenda.id_ruangan=tabel_ruangan.id_ruangan;

CREATE VIEW 
    `view_jumlah_kunjungan` 
AS 
    SELECT 
        MONTH(tanggal) AS bulan, 
        YEAR(tanggal) AS tahun, 
        COUNT(id_tamu) AS jumlah 
    FROM 
        tabel_buku_tamu 
    GROUP BY 
        YEAR(tanggal), MONTH(tanggal);

CREATE VIEW 
    `view_jumlah_kunjungan_agenda_dan_tamu` 
AS 
    (
    SELECT 
        'Umum' AS 'jenis',
        MONTH(tanggal) AS bulan, 
        YEAR(tanggal) AS tahun, 
        COUNT(id_tamu) AS jumlah 
    FROM 
        tabel_buku_tamu 
    GROUP BY 
        YEAR(tanggal), MONTH(tanggal)
    )
    UNION ALL
    (
    SELECT 
        jenis,
        MONTH(tanggal) AS bulan, 
        YEAR(tanggal) AS tahun, 
        COUNT(id_agenda) AS jumlah 
    FROM 
        tabel_agenda 
    WHERE 
        jenis='KUNJUNGAN SEKOLAH' 
    GROUP BY 
        YEAR(tanggal), MONTH(tanggal)
    );

INSERT INTO `tabel_user` (
    nama,
    username,
    password,
    status 
) VALUES 
('Firdaus', 'admin','admin','ADMIN'),
('Firdaus', 'daus','daus','PETUGAS'),
('SMA 1 Martapura', 'sma1martapura','sma1martapura','SEKOLAH'),
('SMA 2 Martapura', 'sma2martapura','sma2martapura','SEKOLAH');

INSERT INTO `tabel_ruangan` (
    nama,
    ruangan,
    keterangan 
) VALUES 
('Umum dan Kepegawaian', '','Ruangan Umum dan Kepegawaian'),
('Perencanaan dan Keuangan', '','Ruangan Perencanaan dan Keuangan'),
('Sekretaris', '','Ruangan Sekretaris'),
('Fungsional', '','Ruangan Fungsional'),
('Ruang Kepala Dinas', '','Ruangan Kepala Dinas'),
('Studio Mini', '','Ruangan Studio Mini'),
('Musholla', '','Ruangan Musholla'),
('Wakapitu', '','Ruangan Wakapitu'),
('Aula', '','Ruangan Aula'),
('Brailie Corner', '','Ruangan Brailie Corner'),
('Perpustakaan Keliling', '','Ruangan Perpustakaan Keliling'),
('Sirkulasi', '','Ruangan Sirkulasi'),
('Ruangan Anak', '','Ruangan Anak'),
('Depo Arsip', '','Ruangan Depo Arsip');

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
(2, 2, '18631111', 'Nurcholis', 'Astambul', '2022-6-1', '07:00:00', '08:00:00', '111111111', 'Magang', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631112', 'Nursahid Arya Suyudi', 'Binuang', '2022-5-1', '07:00:00', '08:00:00', '222222222', 'Berkunjung ke PERPUSTAKAAN', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631113', 'Diki Suti Prasetya', 'Banjarbaru', '2020-05-05', '07:00:00', '08:00:00', '333333333', 'Berkunjung', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631114', 'Andry', 'Binuang', '2022-6-04', '07:00:00', '08:00:00', '444444444', 'Bertamu', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631114', 'Rania Nor Aida', 'Astambul', '2022-10-01', '07:00:00', '08:00:00', '555555555', 'Baca Buku', 'TELAH BERKUNJUNG', 'oke'), 
(2, 2, '18631115', 'Ahmad Rifai', 'Martapura', '2022-6-03', '07:00:00', '08:00:00', '666666', 'Magang', 'TELAH BERKUNJUNG', 'oke');
