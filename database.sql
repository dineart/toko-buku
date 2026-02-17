-- Database: web_baru_2026
-- Aplikasi Toko Buku

-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS `web_baru_2026`;
USE `web_baru_2026`;

-- Table: kategori
DROP TABLE IF EXISTS `buku`;
DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: buku
CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(150) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` longtext,
  `tanggal_tambah` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert kategori standar di dunia perbukuan
INSERT INTO `kategori` (`nama`, `deskripsi`) VALUES 
('Fiksi', 'Novel, cerita pendek, dan karya fiksi lainnya yang menghibur'),
('Non-Fiksi', 'Buku faktual tentang berbagai topik dan teori'),
('Biografi', 'Kisah hidup dan autobiografi tokoh-tokoh terkenal'),
('Sejarah', 'Buku tentang peristiwa sejarah dan perkembangan peradaban'),
('Sains & Teknologi', 'Buku tentang ilmu pengetahuan, teknologi, dan inovasi'),
('Bisnis & Ekonomi', 'Panduan bisnis, entrepreneurship, dan literasi keuangan'),
('Psikologi & Pengembangan Diri', 'Buku tentang psikologi, motivasi, dan pengembangan pribadi'),
('Pendidikan', 'Buku referensi pendidikan dan pembelajaran'),
('Kesehatan & Kebugaran', 'Buku tentang kesehatan, nutrisi, dan gaya hidup sehat'),
('Seni & Desain', 'Buku tentang seni, fotografi, desain, dan kreativitas'),
('Memasak & Kuliner', 'Resep dan panduan memasak dari berbagai masakan'),
('Perjalanan', 'Panduan wisata, travel stories, dan eksplorasi dunia'),
('Anak-Anak', 'Buku cerita, dongeng, dan buku edukatif untuk anak-anak'),
('Remaja', 'Novel remaja, young adult fiction, dan cerita untuk remaja'),
('Komik & Manga', 'Komik, manga, dan graphic novels'),
('Referensi', 'Kamus, ensiklopedi, dan buku referensi lainnya');

-- Insert data buku sample
INSERT INTO `buku` (`judul`, `penulis`, `kategori_id`, `harga`, `stok`, `deskripsi`) VALUES 
('Clean Code', 'Robert C. Martin', 5, 350000, 15, 'Panduan lengkap menulis kode yang bersih, terstruktur, dan mudah dipahami.'),
('The Pragmatic Programmer', 'David Thomas, Andrew Hunt', 5, 285000, 12, 'Panduan praktis menjadi programmer yang efektif dan produktif.'),
('Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 1, 175000, 20, 'Petualangan sihir dimulai dari sekolah sihir Hogwarts.'),
('Sapiens: Brief History of Humankind', 'Yuval Noah Harari', 4, 295000, 14, 'Perjalanan manusia dari zaman batu hingga era modern.'),
('Start with Why', 'Simon Sinek', 6, 225000, 18, 'Temukan tujuan sejati dalam membangun bisnis dan mencapai kesuksesan.'),
('Introduction to Algorithms', 'Thomas H. Cormen', 5, 450000, 8, 'Referensi lengkap tentang algoritma dan struktur data.'),
('Atomic Habits', 'James Clear', 7, 199000, 25, 'Cara membangun kebiasaan baik dan mengubah hidup melalui perubahan kecil.'),
('1984', 'George Orwell', 1, 150000, 10, 'Novel distopia tentang totalitarianisme dan kontrol sosial.'),
('Educated', 'Tara Westover', 3, 240000, 9, 'Cerita pengalaman mendapat pendidikan melalui perjuangan dan ketabahan.'),
('Sejarah Indonesia Kuno', 'Bambang Oetoro', 4, 180000, 7, 'Ikhtisar lengkap sejarah nusantara dari masa kuno.'),
('Rich Dad Poor Dad', 'Robert T. Kiyosaki', 6, 220000, 22, 'Pelajaran finansial dan cara membangun kekayaan sejak muda.'),
('The Power of Now', 'Eckhart Tolle', 7, 210000, 16, 'Buku tentang hidup di masa sekarang dan menemukan kedamaian batin.'),
('Sapiens Junior', 'Yuval Noah Harari', 13, 95000, 30, 'Versi singkat Sapiens yang diadaptasi untuk anak-anak.'),
('One Piece Vol. 1', 'Eiichiro Oda', 15, 45000, 50, 'Komik manga petualangan bajak laut terpopuler di dunia.'),
('Healthy Mind Healthy Body', 'Dr. Deepak Chopra', 8, 185000, 11, 'Panduan kesehatan holistik dan keseimbangan tubuh pikiran.'),
('The Art of French Cooking', 'Julia Child', 11, 320000, 5, 'Panduan masakan Prancis klasik untuk pemula hingga ahli.');
