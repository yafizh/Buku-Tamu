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

INSERT INTO `tabel_ruangan` (`id_ruangan`, `nama`, `ruangan`, `keterangan`) VALUES
(1, 'Umum dan Kepegawaian', '', 'Ruangan Umum dan Kepegawaian'),
(2, 'Perencanaan dan Keuangan', 'Lantai 2 Gedung A', 'Ruangan Perencanaan dan Keuangan'),
(3, 'Sekretariat', 'Lantai 2 Gedung A', 'Ruangan Sekretaris'),
(4, 'Fungsional', 'Lantai 1 Gedung A', 'Ruangan Fungsional'),
(5, 'Ruang Kepala Dinas', 'Lantai 2 Gedung A', 'Ruangan Kepala Dinas'),
(6, 'Studio Mini', '', 'Ruangan Studio Mini'),
(8, 'Wakapitu', '', 'Ruangan Wakapitu'),
(9, 'Aula', 'Lantai 1 Gedung B', 'Ruangan Aula'),
(10, 'Brailie Corner', 'Lantai 1 Gedung A', 'Ruangan Brailie Corner'),
(11, 'Perpustakaan', 'Lantai 1 Gedung A', 'Ruangan Perpustakaan'),
(12, 'Sirkulasi', '', 'Ruangan Sirkulasi'),
(13, 'Ruangan Anak', 'Lantai 1 Gedung C', 'Ruangan Anak'),
(14, 'Depo Arsip', 'Lantai 1 Gedung C', 'Ruangan Depo Arsip');


INSERT INTO `tabel_agenda` 
(`id_agenda`, `id_ruangan`, `id_user`, `tanggal`, `waktu`, `kegiatan`, `jenis`, `status`) VALUES
(1, 11, 3, '2022-06-21', '23:11:00', 'kunjungan membaca buku', 'KUNJUNGAN SEKOLAH', 'DISETUJUI'),
(2, 11, 2, '2022-06-27', '13:19:00', 'Acara giat buku', 'KUNJUNGAN SEKOLAH', 'DISETUJUI'),
(3, 9, 2, '2022-06-27', '13:21:00', 'Seminar pengadaan buku baru', 'INTERNAL', 'DISETUJUI'),
(4, 6, 1, '2022-06-27', '14:30:00', 'Seminar Workshop ', 'INTERNAL', 'DISETUJUI'),
(5, 9, 1, '2022-06-27', '15:00:00', 'Rapat Mingguan', 'INTERNAL', 'DISETUJUI'),
(6, 11, 4, '2022-06-29', '14:30:00', 'kunjungan baca buku', 'KUNJUNGAN SEKOLAH', 'DISETUJUI'),
(7, 11, 4, '2022-06-22', '14:30:00', 'kunjungan sekolah', 'KUNJUNGAN SEKOLAH', 'DISETUJUI'),
(8, 11, 4, '2022-06-09', '14:35:00', 'baca buku', 'KUNJUNGAN SEKOLAH', 'DISETUJUI'),
(9, 11, 2, '2022-06-27', '14:46:00', 'baca buku', 'KUNJUNGAN SEKOLAH', 'PENGAJUAN'),
(10, 11, 2, '2022-06-28', '10:00:00', 'baca buku', 'KUNJUNGAN SEKOLAH', 'PENGAJUAN'),
(11, 11, 2, '2022-06-29', '14:48:00', 'baca buku', 'KUNJUNGAN SEKOLAH', 'PENGAJUAN'),
(12, 5, 1, '2022-06-27', '14:59:00', 'rapat', 'INTERNAL', 'PENGAJUAN'),
(13, 2, 1, '2022-06-27', '14:59:00', 'rapat', 'INTERNAL', 'PENGAJUAN'),
(14, 1, 1, '2022-06-27', '14:59:00', 'rapat', 'INTERNAL', 'PENGAJUAN'),
(15, 9, 1, '2022-06-27', '09:00:00', 'seminar', 'EVENT', 'PENGAJUAN'),
(16, 2, 1, '2022-06-28', '11:00:00', 'rapat mingguan', 'INTERNAL', 'PENGAJUAN'),
(17, 6, 1, '2022-06-28', '11:00:00', 'seminar', 'EVENT', 'PENGAJUAN'),
(18, 3, 1, '2022-06-29', '10:00:00', 'rapat kerja', 'INTERNAL', 'PENGAJUAN'),
(19, 9, 1, '2022-06-28', '00:00:00', 'makan siang', 'INTERNAL', 'DITOLAK'),
(20, 4, 1, '2022-06-30', '10:30:00', 'rapat', 'INTERNAL', 'PENGAJUAN'),
(21, 9, 1, '2022-06-28', '09:00:00', 'perlombaan tingkat sd', 'EVENT', 'PENGAJUAN'),
(22, 9, 1, '2022-06-28', '10:00:00', 'perlombaan cerpen tingkat smp/mts', 'EVENT', 'PENGAJUAN'),
(23, 9, 1, '2022-06-28', '11:00:00', 'perlombaan cerpen tingkat sma', 'EVENT', 'PENGAJUAN'),
(24, 9, 1, '2022-06-01', '10:00:00', 'technical meeting lomba perpustakaan sekolah', 'EVENT', 'PENGAJUAN'),
(25, 9, 1, '2022-06-28', '09:00:00', 'pengumuman lomba perpustakaan sekolah', 'EVENT', 'PENGAJUAN'),
(26, 6, 1, '2022-06-28', '10:00:00', 'lomba story telling tingkat sd', 'EVENT', 'PENGAJUAN'),
(27, 6, 1, '2022-06-28', '11:30:00', 'lomba story telling tingkat smp', 'EVENT', 'PENGAJUAN'),
(28, 6, 1, '2022-06-29', '09:00:00', 'lomba story telling tingkat sma', 'EVENT', 'PENGAJUAN'),
(29, 11, 1, '2022-06-28', '11:41:00', 'Belajar keperpustakaan', 'KUNJUNGAN SEKOLAH', 'PENGAJUAN'),
(30, 11, 1, '2022-06-29', '11:00:00', 'Belajar', 'KUNJUNGAN SEKOLAH', 'PENGAJUAN');

INSERT INTO `tabel_buku_tamu` (`id_tamu`, `id_user`, `id_ruangan`, `nomor_identitas`, `nama`, `tanggal`, `jam_masuk`, `jam_keluar`, `alamat`, `nomor_handphone`, `keperluan`, `status_kunjungan`, `kesan_kunjungan`) VALUES
(1, 2, 2, '18631111', 'Nurcholis', '2021-12-01', '07:00:00', '08:00:00', 'Astambul', '111111111', 'Magang', 'TELAH BERKUNJUNG', 'oke'),
(2, 2, 2, '18631112', 'Nursahid Arya Suyudi', '2021-11-01', '07:00:00', '08:00:00', 'Binuang', '222222222', 'Berkunjung ke PERPUSTAKAAN', 'TELAH BERKUNJUNG', 'oke'),
(3, 2, 2, '18631113', 'Diki Suti Prasetya', '2020-05-05', '07:00:00', '08:00:00', 'Banjarbaru', '333333333', 'Berkunjung', 'TELAH BERKUNJUNG', 'oke'),
(4, 2, 2, '18631114', 'Andry', '2021-12-04', '07:00:00', '08:00:00', 'Binuang', '444444444', 'Bertamu', 'TELAH BERKUNJUNG', 'oke'),
(5, 2, 2, '18631114', 'Rania Nor Aida', '2021-10-01', '07:00:00', '08:00:00', 'Astambul', '555555555', 'Baca Buku', 'TELAH BERKUNJUNG', 'oke'),
(6, 2, 2, '18631115', 'Ahmad Rifai', '2021-12-03', '07:00:00', '08:00:00', 'Martapura', '666666', 'Magang', 'TELAH BERKUNJUNG', 'oke'),
(7, 2, 3, '17638723', 'Said Hanafi', '2022-06-21', '22:47:00', '22:50:00', 'Jalan Sekumpul Gang Merpati No 12 ', '081265347832', 'Bertemu Ibu Sekretaris', 'TELAH BERKUNJUNG', 'sangat baik jamuannya'),
(8, 2, 5, '18456251', 'Syla Ferdayanti', '2022-06-21', '22:58:00', '23:04:00', 'Jalan Panglima Batur No 86 Komet Raya', '085252654568', 'meminta persetujuan', 'TELAH BERKUNJUNG', 'baik'),
(9, 2, 9, '18237612', 'Iqbal Tama', '2022-06-27', '13:13:00', '13:21:00', 'Jln Bhayangkara No 46 Banjarbaru', '089633762381', 'acara silaturahmi', 'TELAH BERKUNJUNG', 'sangat baik'),
(10, 2, 5, '15237621', 'Cahya Melati ', '2022-06-27', '13:16:00', '13:23:00', 'Jln Batas Kota No 28 Banjarbaru', '085265287522', 'mengembalikan surat', 'TELAH BERKUNJUNG', 'sangat senang'),
(11, 2, 11, '18273472', 'Yandi Dodi', '2022-06-27', '13:18:00', '13:24:00', 'Jln A Yani KM. 34 No 112', '085721225634', 'Meminjam Buku', 'TELAH BERKUNJUNG', 'baik'),
(12, 2, 11, '127266212', 'Hafiz Ramadhan', '2022-06-27', '14:17:00', '14:24:00', 'Jln A Yani KM. 33 No 45', '086732776532', 'mengembalikan buku', 'TELAH BERKUNJUNG', 'sangat baik'),
(13, 2, 6, '14627121', 'Hendri Saputra', '2022-06-27', '14:18:00', '14:24:00', 'Jln Karang Anyar 1 No 34 Banjarbaru', '085234768273', 'menghadiri rapat', 'TELAH BERKUNJUNG', 'baik'),
(14, 2, 6, '17266221', 'Verisa Berdetta', '2022-06-27', '14:20:00', '14:25:00', 'Jl Astoria No 76 Sungai Besar', '085376459011', 'menghadiri rapat', 'TELAH BERKUNJUNG', 'sangat senang'),
(15, 2, 6, '17628122', 'Rizki Nanda Putra', '2022-06-27', '14:22:00', '14:25:00', 'Jln Dahlina Raya No 23 Sungai Besar', '087823234545', 'menghadiri rapat', 'TELAH BERKUNJUNG', 'sangat senang'),
(16, 2, 6, '15425632', 'Laila Fika', '2022-06-27', '14:23:00', '14:25:00', 'Jln Batas Kota No 99 Banjarbaru', '085676231089', 'menghadiri rapat', 'TELAH BERKUNJUNG', 'sangat baik');

INSERT INTO `tabel_petugas` (`id_petugas`, `nama`, `tugas`, `tanggal`) VALUES
(1, 'Iqbal Hamdani', 'Pustakawan', '2022-06-01'),
(2, 'Firdaus', 'Menjaga Tamu', '2022-06-01'),
(3, 'Ranti', 'Merapikan Rak Buku', '2022-06-01'),
(4, 'Firdaus', 'Merapikan Rak Buku', '2022-07-01'),
(6, 'Fandi', 'Menjaga Tamu', '2022-06-01'),
(7, 'Putra', 'Merapikan Rak Buku', '2022-06-01'),
(8, 'Lia', 'Pustakawan', '2022-06-01'),
(9, 'Yayah', 'Menjaga Tamu', '2022-06-01'),
(10, 'Gilang', 'Merapikan Rak Buku', '2022-06-01'),
(11, 'Hayati', 'Pustakawan', '2022-06-01');

INSERT INTO `tabel_rak_buku` (`id_rak_buku`, `nomor_rak`, `kategori_rak`, `keterangan`) VALUES
(1, '1', 'Bahasa Indonesia', 'SMA'),
(2, '2', 'Bahasa Arab', 'SD'),
(3, '3', 'Kimia', 'SMA'),
(4, '4', 'IPA', 'SMP/MTS'),
(5, '5', 'Kewarganegaraan', 'SD'),
(6, '6', 'Matematika', 'SMP/MTS'),
(7, '7', 'Fisika', 'SMA'),
(8, '8', 'Fikih', 'MTS'),
(9, '9', 'Bahasa Inggris', 'SMA');
