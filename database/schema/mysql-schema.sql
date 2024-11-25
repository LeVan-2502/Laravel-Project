/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `binh_luans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binh_luans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tai_khoan_id` bigint unsigned NOT NULL,
  `san_pham_id` bigint unsigned NOT NULL,
  `danh_gia` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `binh_luans_tai_khoan_id_foreign` (`tai_khoan_id`),
  KEY `binh_luans_san_pham_id_foreign` (`san_pham_id`),
  CONSTRAINT `binh_luans_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `binh_luans_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `chi_tiet_don_hangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint unsigned NOT NULL,
  `bien_the_id` bigint unsigned NOT NULL,
  `so_luong` int NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `tong_tien` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chi_tiet_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  KEY `chi_tiet_don_hangs_bien_the_id_foreign` (`bien_the_id`),
  CONSTRAINT `chi_tiet_don_hangs_bien_the_id_foreign` FOREIGN KEY (`bien_the_id`) REFERENCES `san_pham_bien_thes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chi_tiet_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `chi_tiet_thanh_toans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_thanh_toans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint unsigned NOT NULL,
  `trang_thai_thanh_toan_id` bigint unsigned NOT NULL,
  `tai_khoan_id` bigint unsigned DEFAULT NULL,
  `thoi_gian` timestamp NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chi_tiet_thanh_toans_don_hang_id_foreign` (`don_hang_id`),
  KEY `chi_tiet_thanh_toans_trang_thai_thanh_toan_id_foreign` (`trang_thai_thanh_toan_id`),
  KEY `chi_tiet_thanh_toans_tai_khoan_id_foreign` (`tai_khoan_id`),
  CONSTRAINT `chi_tiet_thanh_toans_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chi_tiet_thanh_toans_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `chi_tiet_thanh_toans_trang_thai_thanh_toan_id_foreign` FOREIGN KEY (`trang_thai_thanh_toan_id`) REFERENCES `trang_thai_thanh_toans` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `chi_tiet_trang_thais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_trang_thais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint unsigned NOT NULL,
  `trang_thai_id` bigint unsigned NOT NULL,
  `tai_khoan_id` bigint unsigned DEFAULT NULL,
  `thoi_gian` timestamp NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chi_tiet_trang_thais_don_hang_id_foreign` (`don_hang_id`),
  KEY `chi_tiet_trang_thais_trang_thai_id_foreign` (`trang_thai_id`),
  KEY `chi_tiet_trang_thais_tai_khoan_id_foreign` (`tai_khoan_id`),
  CONSTRAINT `chi_tiet_trang_thais_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chi_tiet_trang_thais_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `chi_tiet_trang_thais_trang_thai_id_foreign` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `chi_tiet_van_chuyens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_van_chuyens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint unsigned NOT NULL,
  `van_chuyen_id` bigint unsigned NOT NULL,
  `trang_thai` enum('Đang giao hàng','Hoàn thành','Hủy bỏ') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang giao hàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chi_tiet_van_chuyens_don_hang_id_foreign` (`don_hang_id`),
  KEY `chi_tiet_van_chuyens_van_chuyen_id_foreign` (`van_chuyen_id`),
  CONSTRAINT `chi_tiet_van_chuyens_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chi_tiet_van_chuyens_van_chuyen_id_foreign` FOREIGN KEY (`van_chuyen_id`) REFERENCES `van_chuyens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `danh_mucs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danh_mucs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `don_hangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `don_hangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ma_don_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan_id` bigint unsigned NOT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `thanh_toan` decimal(15,2) NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `van_chuyen_id` bigint unsigned DEFAULT NULL,
  `khuyen_mai_id` bigint unsigned NOT NULL,
  `phuong_thuc_id` bigint unsigned NOT NULL,
  `trang_thai_don_hang_id` bigint unsigned NOT NULL,
  `trang_thai_thanh_toan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `don_hangs_ma_don_hang_unique` (`ma_don_hang`),
  KEY `don_hangs_tai_khoan_id_foreign` (`tai_khoan_id`),
  KEY `don_hangs_khuyen_mai_id_foreign` (`khuyen_mai_id`),
  KEY `don_hangs_phuong_thuc_id_foreign` (`phuong_thuc_id`),
  KEY `don_hangs_trang_thai_don_hang_id_foreign` (`trang_thai_don_hang_id`),
  KEY `don_hangs_trang_thai_thanh_toan_id_foreign` (`trang_thai_thanh_toan_id`),
  KEY `don_hangs_van_chuyen_id_foreign` (`van_chuyen_id`),
  CONSTRAINT `don_hangs_khuyen_mai_id_foreign` FOREIGN KEY (`khuyen_mai_id`) REFERENCES `khuyen_mais` (`id`) ON DELETE CASCADE,
  CONSTRAINT `don_hangs_phuong_thuc_id_foreign` FOREIGN KEY (`phuong_thuc_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `don_hangs_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `don_hangs_trang_thai_don_hang_id_foreign` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `don_hangs_trang_thai_thanh_toan_id_foreign` FOREIGN KEY (`trang_thai_thanh_toan_id`) REFERENCES `trang_thai_thanh_toans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `don_hangs_van_chuyen_id_foreign` FOREIGN KEY (`van_chuyen_id`) REFERENCES `van_chuyens` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `hoan_tra_don_hangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoan_tra_don_hangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint unsigned NOT NULL,
  `ly_do_hoan_tra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` enum('dang_xu_ly','da_hoan_tra') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang_xu_ly',
  `ngay_hoan_tra` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hoan_tra_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  CONSTRAINT `hoan_tra_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `khuyen_mais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khuyen_mais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ma_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `gia_tri` decimal(15,2) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `khuyen_mais_ma_khuyen_mai_unique` (`ma_khuyen_mai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `phan_hois`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phan_hois` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tai_khoan_id` bigint unsigned NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phan_hois_tai_khoan_id_foreign` (`tai_khoan_id`),
  CONSTRAINT `phan_hois_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `phuong_thuc_thanh_toans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_phuong_thuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_bien_thes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_bien_thes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `san_pham_id` bigint unsigned NOT NULL,
  `san_pham_color_id` bigint unsigned NOT NULL,
  `san_pham_size_id` bigint unsigned NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` bigint NOT NULL,
  `so_luong` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `san_pham_bien_thes_san_pham_id_foreign` (`san_pham_id`),
  KEY `san_pham_bien_thes_san_pham_color_id_foreign` (`san_pham_color_id`),
  KEY `san_pham_bien_thes_san_pham_size_id_foreign` (`san_pham_size_id`),
  CONSTRAINT `san_pham_bien_thes_san_pham_color_id_foreign` FOREIGN KEY (`san_pham_color_id`) REFERENCES `san_pham_colors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `san_pham_bien_thes_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `san_pham_bien_thes_san_pham_size_id_foreign` FOREIGN KEY (`san_pham_size_id`) REFERENCES `san_pham_sizes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_mau_sac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_mau` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_don_hangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_don_hangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `san_pham_id` bigint unsigned NOT NULL,
  `don_hang_id` bigint unsigned NOT NULL,
  `so_luong` int NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `san_pham_don_hangs_san_pham_id_foreign` (`san_pham_id`),
  KEY `san_pham_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  CONSTRAINT `san_pham_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `san_pham_don_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `san_pham_id` bigint unsigned NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `san_pham_galleries_san_pham_id_foreign` (`san_pham_id`),
  CONSTRAINT `san_pham_galleries_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_size` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_pham_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham_tags` (
  `san_pham_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`san_pham_id`,`tag_id`),
  KEY `san_pham_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `san_pham_tags_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `san_pham_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `san_phams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_phams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `gia` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `so_luong_ton` int NOT NULL DEFAULT '0',
  `trang_thai` int NOT NULL DEFAULT '1',
  `thuong_hieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danh_muc_id` bigint unsigned NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xep_hang_tb` decimal(3,2) NOT NULL DEFAULT '0.00',
  `luot_xem` int NOT NULL DEFAULT '0',
  `mo_ta_ngan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `san_phams_slug_unique` (`slug`),
  KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`),
  CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_ten_unique` (`ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `tai_khoans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tai_khoans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_tai_khoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro_id` int NOT NULL,
  `gioi_tinh` int NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'he_thongs/avatar_default.jpeg',
  `gioi_thieu` text COLLATE utf8mb4_unicode_ci,
  `trang_thai` int NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tai_khoans_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `trang_thai_don_hangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trang_thai_don_hangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trang_thai_don_hangs_ma_trang_thai_unique` (`ma_trang_thai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `trang_thai_thanh_toans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trang_thai_thanh_toans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trang_thai_thanh_toans_ma_trang_thai_unique` (`ma_trang_thai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vai_tros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vai_tros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_vai_tro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `van_chuyens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `van_chuyens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_van_chuyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'2014_10_12_100000_create_password_reset_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2024_08_18_144150_create_danh_mucs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2024_08_18_164934_create_tai_khoans_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2024_08_19_102057_create_vai_tros_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2024_08_21_000254_create_thuong_hieus_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2024_08_21_084109_create_san_phams_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2024_08_21_085355_create_tags_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2024_08_21_085558_create_san_pham_sizes_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2024_08_21_085639_create_san_pham_colors_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2024_08_21_085704_create_san_pham_galleries_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2024_08_21_085744_create_san_pham_bien_thes_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2024_08_21_134401_create_san_pham_tags_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2024_08_23_124424_create_phan_hois_table',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2024_08_23_154328_add_gia_column_to_san_pham_bien_thes_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2024_08_25_135443_create_trang_thai_don_hangs_table',5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2024_08_25_140440_create_phuong_thuc_thanh_toans_table',6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24,'2024_08_25_141026_create_khuyen_mais_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2024_08_25_141027_create_don_hangs_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2024_08_25_144950_create_ch_tiet_don_hangs_table',8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27,'2024_08_25_144950_create_chi_tiet_don_hangs_table',9);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2024_08_25_150152_create_van_chuyens_table',9);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29,'2024_08_25_150155_create_van_chuyens_table',10);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30,'2024_08_25_141026_create_trang_thai_thanh_toans_table',11);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31,'2024_08_25_152558_create_hoan_tra_don_hangs_table',11);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32,'2024_08_25_232610_add_trang_thai_thanh_toan_id_to_don_hangs_table',12);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (33,'2024_08_25_240000_create_chi_tiet_don_hangs_table',13);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (34,'2024_08_26_065350_create_van_chuyen_table',14);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (35,'2024_08_26_065635_create_chi_tiet_van_chuyens_table',14);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (36,'2024_08_26_065357_create_van_chuyen_table',15);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (37,'2024_08_26_065639_create_chi_tiet_van_chuyens_table',15);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (38,'2024_08_26_094522_remove_columns_from_don_hangs_table',16);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (39,'2024_08_26_094523_remove_columns_from_don_hangs_table',17);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (40,'2024_08_26_095547_create_trang_thai_don_hangs_table',18);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (41,'2024_08_26_095560_create_chi_tiet_trang_thais_table',19);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (42,'2024_08_26_104952_create_chi_tiet_thanh_toans_table',20);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (43,'2024_08_26_104953_create_chi_tiet_thanh_toans_table',21);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (44,'2024_08_25_141029_create_don_hangs_table',22);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (45,'2024_08_25_239999_create_trang_thai_don_hangs_table',23);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (46,'2024_08_25_141028_create_trang_thai_don_hangs_table',24);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (47,'2024_08_25_141030_create_don_hangs_table',24);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (48,'2024_08_26_134218_add_mo_ta_to_trang_thai_don_hangs_table',25);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (49,'2024_08_26_150001_create_chi_tiet_thanh_toans_table',26);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (50,'2024_08_27_055330_create_san_pham_don_hangs_table',27);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (51,'2024_08_28_010615_update_tong_tien_in_chi_tiet_don_hangs',28);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (52,'2024_08_28_011055_update_chi_tiet_trang_thai_table',29);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (53,'2024_08_28_023331_add_ben_van_chuyen_to_don_hangs',30);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (54,'2024_08_28_023901_update_ben_van_chuyen_to_van_chuyen_id',31);
