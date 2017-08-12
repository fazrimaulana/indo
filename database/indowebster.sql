-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 03:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indowebster`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'BANK BRI', '002', NULL, NULL),
(2, 'BANK EKSPOR INDONESIA', '003', NULL, NULL),
(3, 'BANK MANDIRI', '008', NULL, NULL),
(4, 'BANK BNI', '009', NULL, NULL),
(5, 'BANK DANAMON', '011', NULL, NULL),
(6, 'PERMATA BANK', '013', NULL, NULL),
(7, 'BANK BCA', '014', NULL, NULL),
(8, 'BANK BII', '016', NULL, NULL),
(9, 'BANK PANIN', '019', NULL, NULL),
(10, 'BANK ARTA NIAGA KENCANA', '020', NULL, NULL),
(11, 'BANK NIAGA', '022', NULL, NULL),
(12, 'BANK BUANA IND', '023', NULL, NULL),
(13, 'BANK LIPPO', '026', NULL, NULL),
(14, 'BANK NISP', '028', NULL, NULL),
(15, 'AMERICAN EXPRESS BANK LTD', '030', NULL, NULL),
(16, 'CITIBANK N.A.', '031', NULL, NULL),
(17, 'JP. MORGAN CHASE BANK, N.A.', '032', NULL, NULL),
(18, 'BANK OF AMERICA, N.A', '033', NULL, NULL),
(19, 'ING INDONESIA BANK', '034', NULL, NULL),
(20, 'BANK MULTICOR TBK.', '036', NULL, NULL),
(21, 'BANK ARTHA GRAHA', '037', NULL, NULL),
(22, 'BANK CREDIT AGRICOLE INDOSUEZ', '039', NULL, NULL),
(23, 'THE BANGKOK BANK COMP. LTD', '040', NULL, NULL),
(24, 'THE HONGKONG & SHANGHAI B.C.', '041', NULL, NULL),
(25, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042', NULL, NULL),
(26, 'BANK SUMITOMO MITSUI INDONESIA', '045', NULL, NULL),
(27, 'BANK DBS INDONESIA', '046', NULL, NULL),
(28, 'BANK RESONA PERDANIA', '047', NULL, NULL),
(29, 'BANK MIZUHO INDONESIA', '048', NULL, NULL),
(30, 'STANDARD CHARTERED BANK', '050', NULL, NULL),
(31, 'BANK ABN AMRO', '052', NULL, NULL),
(32, 'BANK KEPPEL TATLEE BUANA', '053', NULL, NULL),
(33, 'BANK CAPITAL INDONESIA, TBK.', '054', NULL, NULL),
(34, 'BANK BNP PARIBAS INDONESIA', '057', NULL, NULL),
(35, 'BANK UOB INDONESIA', '058', NULL, NULL),
(36, 'KOREA EXCHANGE BANK DANAMON', '059', NULL, NULL),
(37, 'RABOBANK INTERNASIONAL INDONESIA', '060', NULL, NULL),
(38, 'ANZ PANIN BANK', '061', NULL, NULL),
(39, 'DEUTSCHE BANK AG.', '067', NULL, NULL),
(40, 'BANK WOORI INDONESIA', '068', NULL, NULL),
(41, 'BANK OF CHINA LIMITED', '069', NULL, NULL),
(42, 'BANK BUMI ARTA', '076', NULL, NULL),
(43, 'BANK EKONOMI', '087', NULL, NULL),
(44, 'BANK ANTARDAERAH', '088', NULL, NULL),
(45, 'BANK HAGA', '089', NULL, NULL),
(46, 'BANK IFI', '093', NULL, NULL),
(47, 'BANK CENTURY, TBK.', '095', NULL, NULL),
(48, 'BANK MAYAPADA', '097', NULL, NULL),
(49, 'BANK JABAR', '110', NULL, NULL),
(50, 'BANK DKI', '111', NULL, NULL),
(51, 'BPD DIY', '112', NULL, NULL),
(52, 'BANK JATENG', '113', NULL, NULL),
(53, 'BANK JATIM', '114', NULL, NULL),
(54, 'BPD JAMBI', '115', NULL, NULL),
(55, 'BPD ACEH', '116', NULL, NULL),
(56, 'BANK SUMUT', '117', NULL, NULL),
(57, 'BANK NAGARI', '118', NULL, NULL),
(58, 'BANK RIAU', '119', NULL, NULL),
(59, 'BANK SUMSEL', '120', NULL, NULL),
(60, 'BANK LAMPUNG', '121', NULL, NULL),
(61, 'BPD KALSEL', '122', NULL, NULL),
(62, 'BPD KALIMANTAN BARAT', '123', NULL, NULL),
(63, 'BPD KALTIM', '124', NULL, NULL),
(64, 'BPD KALTENG', '125', NULL, NULL),
(65, 'BPD SULSEL', '126', NULL, NULL),
(66, 'BANK SULUT', '127', NULL, NULL),
(67, 'BPD NTB', '128', NULL, NULL),
(68, 'BPD BALI', '129', NULL, NULL),
(69, 'BANK NTT', '130', NULL, NULL),
(70, 'BANK MALUKU', '131', NULL, NULL),
(71, 'BPD PAPUA', '132', NULL, NULL),
(72, 'BANK BENGKULU', '133', NULL, NULL),
(73, 'BPD SULAWESI TENGAH', '134', NULL, NULL),
(74, 'BANK SULTRA', '135', NULL, NULL),
(75, 'BANK NUSANTARA PARAHYANGAN', '145', NULL, NULL),
(76, 'BANK SWADESI', '146', NULL, NULL),
(77, 'BANK MUAMALAT', '147', NULL, NULL),
(78, 'BANK MESTIKA', '151', NULL, NULL),
(79, 'BANK METRO EXPRESS', '152', NULL, NULL),
(80, 'BANK SHINTA INDONESIA', '153', NULL, NULL),
(81, 'BANK MASPION', '157', NULL, NULL),
(82, 'BANK HAGAKITA', '159', NULL, NULL),
(83, 'BANK GANESHA', '161', NULL, NULL),
(84, 'BANK WINDU KENTJANA', '162', NULL, NULL),
(85, 'HALIM INDONESIA BANK', '164', NULL, NULL),
(86, 'BANK HARMONI INTERNATIONAL', '166', NULL, NULL),
(87, 'BANK KESAWAN', '167', NULL, NULL),
(88, 'BANK TABUNGAN NEGARA (PERSERO)', '200', NULL, NULL),
(89, 'BANK HIMPUNAN SAUDARA 1906, TBK .', '212', NULL, NULL),
(90, 'BANK TABUNGAN PENSIUNAN NASIONAL', '213', NULL, NULL),
(91, 'BANK SWAGUNA', '405', NULL, NULL),
(92, 'BANK JASA ARTA', '422', NULL, NULL),
(93, 'BANK MEGA', '426', NULL, NULL),
(94, 'BANK JASA JAKARTA', '427', NULL, NULL),
(95, 'BANK BUKOPIN', '441', NULL, NULL),
(96, 'BANK SYARIAH MANDIRI', '451', NULL, NULL),
(97, 'BANK BISNIS INTERNASIONAL', '459', NULL, NULL),
(98, 'BANK SRI PARTHA', '466', NULL, NULL),
(99, 'BANK JASA JAKARTA', '472', NULL, NULL),
(100, 'BANK BINTANG MANUNGGAL', '484', NULL, NULL),
(101, 'BANK BUMIPUTERA', '485', NULL, NULL),
(102, 'BANK YUDHA BHAKTI', '490', NULL, NULL),
(103, 'BANK MITRANIAGA', '491', NULL, NULL),
(104, 'BANK AGRO NIAGA', '494', NULL, NULL),
(105, 'BANK INDOMONEX', '498', NULL, NULL),
(106, 'BANK ROYAL INDONESIA', '501', NULL, NULL),
(107, 'BANK ALFINDO', '503', NULL, NULL),
(108, 'BANK SYARIAH MEGA', '506', NULL, NULL),
(109, 'BANK INA PERDANA', '513', NULL, NULL),
(110, 'BANK HARFA', '517', NULL, NULL),
(111, 'PRIMA MASTER BANK', '520', NULL, NULL),
(112, 'BANK PERSYARIKATAN INDONESIA', '521', NULL, NULL),
(113, 'BANK AKITA', '525', NULL, NULL),
(114, 'LIMAN INTERNATIONAL BANK', '526', NULL, NULL),
(115, 'ANGLOMAS INTERNASIONAL BANK', '531', NULL, NULL),
(116, 'BANK DIPO INTERNATIONAL', '523', NULL, NULL),
(117, 'BANK KESEJAHTERAAN EKONOMI', '535', NULL, NULL),
(118, 'BANK UIB', '536', NULL, NULL),
(119, 'BANK ARTOS IND', '542', NULL, NULL),
(120, 'BANK PURBA DANARTA', '547', NULL, NULL),
(121, 'BANK MULTI ARTA SENTOSA', '548', NULL, NULL),
(122, 'BANK MAYORA', '553', NULL, NULL),
(123, 'BANK INDEX SELINDO', '555', NULL, NULL),
(124, 'BANK VICTORIA INTERNATIONAL', '566', NULL, NULL),
(125, 'BANK EKSEKUTIF', '558', NULL, NULL),
(126, 'CENTRATAMA NASIONAL BANK', '559', NULL, NULL),
(127, 'BANK FAMA INTERNASIONAL', '562', NULL, NULL),
(128, 'BANK SINAR HARAPAN BALI', '564', NULL, NULL),
(129, 'BANK HARDA', '567', NULL, NULL),
(130, 'BANK FINCONESIA', '945', NULL, NULL),
(131, 'BANK MERINCORP', '946', NULL, NULL),
(132, 'BANK MAYBANK INDOCORP', '947', NULL, NULL),
(133, 'BANK OCBC – INDONESIA', '948', NULL, NULL),
(134, 'BANK CHINA TRUST INDONESIA', '949', NULL, NULL),
(135, 'BANK COMMONWEALTH', '950', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 0, 'lainnya', 'lainnya', 'Lainnya', NULL, NULL, NULL),
(2, 0, 'e-voucher', 'e-voucher', 'E-Voucher', NULL, '2017-05-18 21:14:29', '2017-05-28 20:47:56'),
(4, 2, 'paket data', 'paket-data', 'Paket Data', NULL, '2017-05-18 21:15:04', '2017-05-28 20:48:04'),
(6, 2, 'pulsa', 'pulsa', 'Pulsa', NULL, '2017-05-21 23:27:15', '2017-05-28 20:50:14'),
(7, 0, 'fashion pria', 'fashion-pria', 'Fashion Pria', NULL, '2017-05-31 00:44:12', '2017-05-31 00:44:12'),
(8, 0, 'fashion wanita', 'fashion-wanita', 'Fashion Wanita', NULL, '2017-05-31 00:44:31', '2017-05-31 00:44:31'),
(9, 0, 'handphone', 'handphone', 'Handphone', NULL, '2017-05-31 00:45:08', '2017-05-31 00:45:08'),
(10, 0, 'komputer', 'komputer', 'Komputer', NULL, '2017-05-31 00:45:26', '2017-05-31 00:45:26'),
(11, 10, 'laptop', 'laptop', 'Laptop', NULL, '2017-05-31 00:49:09', '2017-05-31 00:49:09'),
(12, 8, 'kaos', 'kaos', 'Kaos Wanita', NULL, '2017-06-01 23:11:29', '2017-06-01 23:11:29'),
(13, 2, 'token listrik', 'token-listrik', 'Token Listrik', NULL, '2017-07-05 23:52:05', '2017-07-05 23:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `confirmation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_to` int(10) UNSIGNED NOT NULL,
  `bank_from` int(10) UNSIGNED NOT NULL,
  `account_bank_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_img` text COLLATE utf8mb4_unicode_ci,
  `date_transfer` datetime NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `confirmations`
--

INSERT INTO `confirmations` (`id`, `order_id`, `confirmation_name`, `bank_to`, `bank_from`, `account_bank_no`, `account_name`, `transfer_amount`, `transfer_img`, `date_transfer`, `read`, `created_at`, `updated_at`) VALUES
(1, 10, 'Pembayaran', 7, 7, '12345678', 'Fazri Maulana', '11662000', NULL, '2017-07-17 09:00:00', 0, '2017-07-16 19:24:29', '2017-07-16 19:32:53'),
(2, 11, 'Pembayaran', 1, 1, '123456789', 'Fazri Maulana', '10412000', NULL, '2017-07-17 10:00:00', 0, '2017-07-16 19:29:35', '2017-07-17 21:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, '20170605075555-apple-macbook-air-mmgf2-2016', 'uploads/products/20170605075555-apple-macbook-air-mmgf2-2016.jpg', '2017-06-05 00:55:55', '2017-06-05 00:55:55'),
(2, '20170605075556-mackbook-air', 'uploads/products/20170605075556-mackbook-air.jpg', '2017-06-05 00:55:56', '2017-06-05 00:55:56'),
(3, '20170605075830-asus-rog-gl552vw-dm136t-i7-6700hq', 'uploads/products/20170605075830-asus-rog-gl552vw-dm136t-i7-6700hq.jpg', '2017-06-05 00:58:30', '2017-06-05 00:58:30'),
(4, '20170605075959-laptop-dell-5410', 'uploads/products/20170605075959-laptop-dell-5410.jpg', '2017-06-05 00:59:59', '2017-06-05 00:59:59'),
(5, '20170605080104-laptop-msi-gl62-6qc', 'uploads/products/20170605080104-laptop-msi-gl62-6qc.jpg', '2017-06-05 01:01:04', '2017-06-05 01:01:04'),
(6, '20170605080324-lenovo-110', 'uploads/products/20170605080324-lenovo-110.jpg', '2017-06-05 01:03:24', '2017-06-05 01:03:24'),
(7, '20170605080325-lenovo-110', 'uploads/products/20170605080325-lenovo-110.jpg', '2017-06-05 01:03:25', '2017-06-05 01:03:25'),
(9, '20170718035353-banner1', 'uploads/slideshow/20170718035353-banner1.jpg', '2017-07-17 20:53:53', '2017-07-17 20:53:53'),
(10, '20170718035410-banner2', 'uploads/slideshow/20170718035410-banner2.jpg', '2017-07-17 20:54:10', '2017-07-17 20:54:10'),
(11, '20170718035422-banner3', 'uploads/slideshow/20170718035422-banner3.jpg', '2017-07-17 20:54:22', '2017-07-17 20:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `parent_id`, `name`, `href`, `target`, `title`, `icon`, `module`, `permission`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.categories', '', 'Categories', '#', '', 'Categories Management', 'fa fa-thumb-tack', 'Categories', 'can_see_categories_menu', '93', '2017-05-18 21:10:37', '2017-08-08 20:22:55'),
(2, 'dashboard.categories.index', 'dashboard.categories', 'All Categories', 'dashboard/categories', '#', 'Categories Management', 'fa fa-puzzle', 'Categories', 'can_see_categories_index', '1', '2017-05-18 21:10:37', '2017-08-08 20:22:55'),
(3, 'dashboard.module', '', 'Modules', '#', '', 'Module Management', 'fa fa-puzzle-piece', 'Module', 'can_see_module_menu', '98', '2017-05-18 21:10:37', '2017-08-08 20:22:55'),
(4, 'dashboard.module.index', 'dashboard.module', 'Module', 'dashboard/modules', '#', 'Module Management', 'fa fa-puzzle', 'Module', 'can_see_module_index', '1', '2017-05-18 21:10:38', '2017-08-08 20:22:56'),
(5, 'dashboard.products', '', 'Products', '#', '', 'Products Management', 'fa fa-folder', 'Products', 'can_see_products_menu', '92', '2017-05-18 21:10:38', '2017-08-08 20:22:56'),
(6, 'dashboard.products.index', 'dashboard.products', 'All Products', 'dashboard/products', '#', 'Products Management', 'fa fa-puzzle', 'Products', 'can_see_products_index', '1', '2017-05-18 21:10:38', '2017-08-08 20:22:56'),
(7, 'dashboard.products.add', 'dashboard.products', 'Add Products', 'dashboard/products/add', '#', 'Products Management', 'fa fa-puzzle', 'Products', 'can_add_products', '1', '2017-05-18 21:10:38', '2017-08-08 20:22:56'),
(8, 'dashboard.setting.role', '', 'Role And Permission', '#', '', 'Role And Permission Management', 'fa fa-lock', 'Role', 'can_see_module_menu', '97', '2017-05-18 21:10:38', '2017-08-08 20:22:56'),
(9, 'dashboard.setting.role.index', 'dashboard.setting.role', 'Role', 'dashboard/settings/role', '#', 'Role Management', 'fa fa-puzzle', 'Role', 'can_see_module_index', '1', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(10, 'dashboard.setting.role.permission', 'dashboard.setting.role', 'Permission', 'dashboard/settings/permission', '#', 'Permission Management', 'fa fa-puzzle', 'Role', 'can_see_module_index', '1', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(11, 'dashboard.users', '', 'Users', '#', '', 'Users Management', 'fa fa-user', 'Users', 'can_see_users_menu', '96', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(12, 'dashboard.users.index', 'dashboard.users', 'All Users', 'dashboard/users', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_see_users_index', '1', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(13, 'dashboard.users.add', 'dashboard.users', 'Add New', 'dashboard/users/add', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_add_users', '1', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(14, 'dashboard.users.profile', 'dashboard.users', 'Your Profile', 'dashboard/users/profile', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_see_users', '1', '2017-05-18 21:10:39', '2017-08-08 20:22:56'),
(15, 'dashboard.orders', '', 'Orders', '#', '', 'Orders Management', 'fa fa-shopping-cart', 'Orders', 'can_see_orders_menu', '94', '2017-05-23 00:58:01', '2017-08-08 20:22:56'),
(16, 'dashboard.orders.index', 'dashboard.orders', 'All Orders', 'dashboard/orders', '#', 'Orders Management', 'fa fa-puzzle', 'Orders', 'can_see_orders_index', '1', '2017-05-23 00:58:01', '2017-08-08 20:22:56'),
(17, 'dashboard.orders.transaction_methods.index', 'dashboard.orders', 'Transaction Methods', 'dashboard/transaction-methods', '#', 'Orders Management', 'fa fa-puzzle', 'Orders', 'can_see_transaction_methods_index', '1', '2017-05-23 00:58:01', '2017-08-08 20:22:56'),
(19, 'dashboard.confirmations', '', 'Confirmations', 'dashboard/confirmations', '', 'Confirmation Management', 'fa fa-thumb-tack', 'Confirmation', 'can_see_confirmation_menu', '95', '2017-06-13 20:43:04', '2017-08-08 20:22:55'),
(20, 'dashboard.frontpage', '', 'Frontpage', '#', '', 'Frontpage Management', 'fa fa-globe', 'Frontpage', 'can_see_frontpage_menu', '99', '2017-07-17 00:10:20', '2017-08-08 20:22:55'),
(21, 'dashboard.frontpage.slideshow.index', 'dashboard.frontpage', 'Slideshow', 'dashboard/frontpage/slideshow', '#', 'Frontpage Management', 'fa fa-puzzle', 'Frontpage', 'can_see_slideshow_index', '1', '2017-07-17 00:10:20', '2017-08-08 20:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2017_03_24_023932_create_table_modules', 1),
(38, '2017_03_24_023941_create_table_menus', 1),
(39, '2017_05_16_064002_entrust_setup_tables', 1),
(40, '2017_05_17_023146_add_field_users_table', 1),
(41, '2017_05_17_080656_create_table_categories', 1),
(65, '2017_05_18_030709_create_products_table', 2),
(66, '2017_05_18_041659_create_galleries_table', 2),
(67, '2017_05_18_042542_create_product_gallery_table', 2),
(68, '2017_05_18_110119_add_field_parent_id_at_products_table', 2),
(69, '2017_05_23_030527_create_orders_table', 2),
(70, '2017_05_23_034523_create_transaction_method_table', 2),
(71, '2017_05_23_035123_add_field_transaction_method_id_at_orders_table', 2),
(72, '2017_05_23_091154_create_order_details_table', 2),
(73, '2017_06_08_050600_add_field_code_at_orders_table', 3),
(80, '2017_06_12_032344_create_confirmations_table', 4),
(81, '2017_06_12_035300_create_bank_table', 4),
(82, '2017_06_12_035800_add_field_bank_at_confirmations_table', 4),
(83, '2017_06_12_042425_add_field_code_at_banks_table', 4),
(84, '2017_06_12_091439_add_field_read_at_confirmations_table', 5),
(85, '2017_07_06_080030_add_field_adm_price_at_order_details_table', 6),
(86, '2017_07_10_065639_add_provinsi_kota_field_at_order_table', 7),
(88, '2017_07_13_024017_add_field_status_at_order_details', 8),
(89, '2017_07_14_024028_add_field_weight_at_table_orders', 9),
(90, '2017_07_17_020614_add_field_transfer_amount_at_confirmations_table', 10),
(92, '2017_07_17_101758_create_slideshow_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repository` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `keyword`, `version`, `author`, `web`, `repository`, `sequence`, `license`, `module`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Categories', 'Categories', '["Categories"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Categories', 'active', '2017-05-18 21:10:37', '2017-05-29 01:09:18'),
(2, 'Module Management', 'Core module', '["module","system","core"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Module', 'active', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(3, 'Products', 'Products', '["Products"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Products', 'active', '2017-05-18 21:10:38', '2017-05-29 01:09:18'),
(4, 'Role And Permission', 'Role And Permission module', '["Role And Permission"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Role', 'active', '2017-05-18 21:10:38', '2017-05-29 01:09:18'),
(5, 'Users', 'Users', '["Users"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Users', 'active', '2017-05-18 21:10:39', '2017-05-29 01:09:18'),
(7, 'Orders', 'Orders', '["Orders"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Orders', 'active', '2017-05-23 00:59:21', '2017-05-29 01:09:18'),
(8, 'Confirmation', 'Confirmation', '["Confirmation"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Confirmation', 'active', '2017-06-13 19:42:25', '2017-06-13 19:42:36'),
(9, 'Frontpage', 'Frontpage', '["Frontpage"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Frontpage', 'active', '2017-07-17 00:10:20', '2017-07-17 00:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_method_id` int(10) UNSIGNED NOT NULL,
  `buyer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` enum('Menunggu Pembayaran','Konfirmasi Pembayaran','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `transaction_method_id`, `buyer_name`, `buyer_email`, `buyer_phone_number`, `buyer_address`, `buyer_province`, `buyer_city`, `weight`, `courier`, `service`, `shipping_cost`, `order_status`, `total`, `created_at`, `updated_at`) VALUES
(10, '0338411020170714', 1, 'Fazri Maulana', 'fm.fazri.m@gmail.com', '089673797344', 'Desa Karangmangu', '9', '211', '100', 'pos', '{"service":"Paket Kilat Khusus","description":"Paket Kilat Khusus","cost":[{"value":12000,"etd":"2","note":""}]}', '12000', 'Menunggu Pembayaran', 11662000, '2017-07-13 20:38:41', '2017-07-13 20:38:41'),
(11, '0343082720170714', 1, 'Fazri Maulana', 'fm.fazri.m@gmail.com', '089673797344', 'Desa Jalaksana', '9', '211', '211', 'jne', '{"service":"OKE","description":"Ongkos Kirim Ekonomis","cost":[{"value":12000,"etd":"3-6","note":""}]}', '12000', 'Konfirmasi Pembayaran', 10412000, '2017-07-13 20:43:08', '2017-07-16 19:36:04'),
(12, '0347152520170714', 1, 'Fazri Maulana', 'fm.fazri.m@gmail.com', '089673797344', 'Desa Setianegara', '9', '211', '311', 'pos', '{"service":"Express Next Day Dokumen","description":"Express Next Day Dokumen","cost":[{"value":20000,"etd":"1","note":""}]}', '20000', 'Menunggu Pembayaran', 20019000, '2017-07-13 20:47:15', '2017-07-14 04:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_price` int(11) NOT NULL DEFAULT '0',
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Diproses','Dikirim','Terkirim','Diterima') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `product_name`, `qty`, `product_price`, `discount_price`, `adm_price`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(12, 10, 10, 'Apple MacBook Air MMGF2 2016', 1, '11650000', '0', 0, '11650000', 'Diproses', '2017-07-13 20:38:41', '2017-07-13 20:38:41'),
(13, 13, 11, 'Laptop MSI GL62 6QC', 1, '5000000', '0', 0, '5000000', 'Diproses', '2017-07-13 20:43:08', '2017-07-13 20:43:08'),
(14, 14, 11, 'LENOVO 110', 1, '5400000', '0', 0, '5400000', 'Diproses', '2017-07-13 20:43:08', '2017-07-13 20:43:08'),
(15, 11, 12, 'ASUS ROG GL552VW-DM136T I7-6700HQ', 1, '14599000', '0', 0, '14599000', 'Diproses', '2017-07-13 20:47:15', '2017-07-13 20:47:15'),
(16, 14, 12, 'LENOVO 110', 1, '5400000', '0', 0, '5400000', 'Diproses', '2017-07-13 20:47:16', '2017-07-13 20:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'can_see_categories', 'can_see_categories', 'can_see_categories', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(2, 'can_add_categories', 'can_add_categories', 'can_add_categories', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(3, 'can_edit_categories', 'can_edit_categories', 'can_edit_categories', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(4, 'can_delete_categories', 'can_delete_categories', 'can_delete_categories', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(5, 'can_see_categories_index', 'can_see_categories_index', 'can_see_categories_index', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(6, 'can_install_module', 'can_install_module', 'can_install_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(7, 'can_see_list_module', 'can_see_list_module', 'can_see_list_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(8, 'can_uninstall_module', 'can_uninstall_module', 'can_uninstall_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(9, 'can_see_detail_module', 'can_see_detail_module', 'can_see_detail_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(10, 'can_see_module_menu', 'can_see_module_menu', 'can_see_module_menu', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(11, 'can_see_module_index', 'can_see_module_index', 'can_see_module_index', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(12, 'can_see_module', 'can_see_module', 'can_see_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(13, 'can_active_module', 'can_active_module', 'can_active_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(14, 'can_inactive_module', 'can_inactive_module', 'can_inactive_module', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(15, 'can_see_products', 'can_see_products', 'can_see_products', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(16, 'can_add_products', 'can_add_products', 'can_add_products', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(17, 'can_edit_products', 'can_edit_products', 'can_edit_products', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(18, 'can_delete_products', 'can_delete_products', 'can_delete_products', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(19, 'can_see_products_index', 'can_see_products_index', 'can_see_products_index', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(20, 'can_see_products_menu', 'can_see_products_menu', 'can_see_products_menu', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(21, 'can_add_products_gallery', 'can_add_products_gallery', 'can_add_products_gallery', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(22, 'can_delete_product_gallery', 'can_delete_product_gallery', 'can_delete_product_gallery', '2017-05-18 21:10:38', '2017-05-18 21:10:38'),
(23, 'can_see_role', 'can_see_role', 'can_see_role', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(24, 'can_add_role', 'can_add_role', 'can_add_role', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(25, 'can_edit_role', 'can_edit_role', 'can_edit_role', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(26, 'can_delete_role', 'can_delete_role', 'can_delete_role', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(27, 'can_see_permission', 'can_see_permission', 'can_see_permission', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(28, 'can_add_permission', 'can_add_permission', 'can_add_permission', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(29, 'can_edit_permission', 'can_edit_permission', 'can_edit_permission', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(30, 'can_delete_permission', 'can_delete_permission', 'can_delete_permission', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(31, 'can_add_role_users', 'can_add_role_users', 'can_add_role_users', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(32, 'can_add_role_permissions', 'can_add_role_permissions', 'can_add_role_permissions', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(33, 'can_see_users_menu', 'can_see_users_menu', 'can_see_users_menu', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(34, 'can_see_users_index', 'can_see_users_index', 'can_see_users_index', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(35, 'can_see_users', 'can_see_users', 'can_see_users', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(36, 'can_add_users', 'can_add_users', 'can_add_users', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(37, 'can_edit_users', 'can_edit_users', 'can_edit_users', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(38, 'can_edit_users_password', 'can_edit_users_password', 'can_edit_users_password', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(39, 'can_delete_users', 'can_delete_users', 'can_delete_users', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(40, 'can_edit_users_apitoken', 'can_edit_users_apitoken', 'can_edit_users_apitoken', '2017-05-18 21:10:39', '2017-05-18 21:10:39'),
(41, 'can_see_orders_menu', 'can_see_orders_menu', 'can_see_orders_menu', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(42, 'can_see_orders_index', 'can_see_orders_index', 'can_see_orders_index', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(43, 'can_see_orders', 'can_see_orders', 'can_see_orders', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(44, 'can_add_orders', 'can_add_orders', 'can_add_orders', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(45, 'can_edit_orders', 'can_edit_orders', 'can_edit_orders', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(46, 'can_delete_orders', 'can_delete_orders', 'can_delete_orders', '2017-05-22 22:10:43', '2017-05-22 22:10:43'),
(47, 'can_see_transaction_methods_index', 'can_see_transaction_methods_index', 'can_see_transaction_methods_index', '2017-05-23 00:58:01', '2017-05-23 00:58:01'),
(48, 'can_see_transaction_method', 'can_see_transaction_method', 'can_see_transaction_method', '2017-05-23 00:58:01', '2017-05-23 00:58:01'),
(49, 'can_edit_transaction_method', 'can_edit_transaction_method', 'can_edit_transaction_method', '2017-05-23 01:17:55', '2017-05-23 01:17:55'),
(50, 'can_add_transaction_method', 'can_add_transaction_method', 'can_add_transaction_method', '2017-05-23 01:29:22', '2017-05-23 01:29:22'),
(51, 'can_see_confirmation', 'can_see_confirmation', 'can_see_confirmation', '2017-06-13 19:42:25', '2017-06-13 19:42:25'),
(52, 'can_add_confirmation', 'can_add_confirmation', 'can_add_confirmation', '2017-06-13 19:42:26', '2017-06-13 19:42:26'),
(53, 'can_edit_confirmation', 'can_edit_confirmation', 'can_edit_confirmation', '2017-06-13 19:42:26', '2017-06-13 19:42:26'),
(54, 'can_delete_confirmation', 'can_delete_confirmation', 'can_delete_confirmation', '2017-06-13 19:42:26', '2017-06-13 19:42:26'),
(55, 'can_see_confirmation_index', 'can_see_confirmation_index', 'can_see_confirmation_index', '2017-06-13 19:42:26', '2017-06-13 19:42:26'),
(56, 'can_see_confirmation_menu', 'can_see_confirmation_menu', 'can_see_confirmation_menu', '2017-06-13 19:42:26', '2017-06-13 19:42:26'),
(57, 'can_see_frontpage', 'can_see_frontpage', 'can_see_frontpage', '2017-07-17 00:10:20', '2017-07-17 00:10:20'),
(58, 'can_see_frontpage_index', 'can_see_frontpage_index', 'can_see_frontpage_index', '2017-07-17 00:10:20', '2017-07-17 00:10:20'),
(59, 'can_see_frontpage_menu', 'can_see_frontpage_menu', 'can_see_frontpage_menu', '2017-07-17 00:10:20', '2017-07-17 00:10:20'),
(60, 'can_see_slideshow', 'can_see_slideshow', 'can_see_slideshow', '2017-07-17 20:03:11', '2017-07-17 20:03:11'),
(61, 'can_add_slideshow', 'can_add_slideshow', 'can_add_slideshow', '2017-07-17 20:03:11', '2017-07-17 20:03:11'),
(62, 'can_edit_slideshow', 'can_edit_slideshow', 'can_edit_slideshow', '2017-07-17 20:03:11', '2017-07-17 20:03:11'),
(63, 'can_delete_slideshow', 'can_delete_slideshow', 'can_delete_slideshow', '2017-07-17 20:03:11', '2017-07-17 20:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` enum('Baru','Bekas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order` int(11) NOT NULL DEFAULT '1',
  `max_order` int(11) NOT NULL DEFAULT '1',
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time_discount` datetime DEFAULT NULL,
  `end_time_discount` datetime DEFAULT NULL,
  `custom` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `parent_id`, `name`, `condition`, `weight`, `min_order`, `max_order`, `price`, `description`, `stok`, `view`, `discount`, `start_time_discount`, `end_time_discount`, `custom`, `created_at`, `updated_at`) VALUES
(1, 6, 0, 'Three', 'Baru', '1', 1, 100000, '0', 'Pulsa Kartu Three', 100000, 0, '0', NULL, NULL, '{"prefix":["0896","0897","0898","0899"]}', '2017-06-05 00:47:33', '2017-06-05 00:47:33'),
(2, 6, 1, 'Three-5000', 'Baru', '1', 1, 1, '6500', 'Pulsa Three Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:48:07', '2017-06-05 00:48:07'),
(3, 6, 1, 'Three-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Three Sebesar 10000', 1, 0, '5', '2017-06-01 00:00:00', '2017-06-06 00:00:00', NULL, '2017-06-05 00:48:34', '2017-06-05 01:43:58'),
(4, 6, 0, 'Telkomsel', 'Baru', '1', 1, 100000, '0', 'Pulsa Kartu Telkomsel', 100000, 0, '0', NULL, NULL, '{"prefix":["0811","0812","0813","0821","0822","0823","0852","0853","0851"]}', '2017-06-05 00:50:05', '2017-06-05 00:50:05'),
(5, 6, 4, 'Tsel-5000', 'Baru', '1', 1, 1, '7000', 'Pulsa Telkomsel Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:51:00', '2017-06-05 00:51:00'),
(6, 6, 4, 'Tsel-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Telkomsel Sebesar 10000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:51:40', '2017-06-05 00:51:40'),
(7, 6, 0, 'Indosat', 'Baru', '1', 1, 100000, '0', 'Pulsa Indosat', 100000, 0, '0', NULL, NULL, '{"prefix":["0855","0856","0857","0858","0814","0815","0816"]}', '2017-06-05 00:52:11', '2017-06-05 00:53:03'),
(8, 6, 7, 'ISAT-5000', 'Baru', '1', 1, 1, '6500', 'Pulsa Indosat Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:53:40', '2017-06-05 00:53:40'),
(9, 6, 7, 'ISAT-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Indosat Sebesar 10000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:54:18', '2017-06-05 00:54:18'),
(10, 11, 0, 'Apple MacBook Air MMGF2 2016', 'Baru', '100', 1, 1, '11650000', 'Deskripsi\r\n\r\nKami menjamin setiap transaksi anda dengan :\r\nGARANSI\r\nSetiap produk yang anda beli bergaransi resmi 1 Tahun yang dapat di claim di Apple Authorized Service Provider Indonesia (Khusus iPad,iPod,Macbook bila produk tersebut sudah launching di Indonesia dan untuk iPhone garansi bantu claim) dan garansi uang kembali bila produk yang anda beli tidak itu garansi 1x24 Jam TUKAR BARU bila produk yang anda terima cacat produksi setelah baru buka. Serta bisa di bantu claim garansi\r\n\r\nGRATIS\r\nKami juga memberikan GRATIS konsultasi mengenai setiap produk yang anda beli dengan memberikan referensi yang terbaik untuk anda, selain itu kita juga memberikan GRATIS bantu claim garansi bila bukan karena human error\r\n\r\nAMAN\r\nSetiap transaksi dengan kami pasti barang kami kirim selain itu bisa juga menggunakan jasa perantara Rekening Bersama (RekBer)\r\n\r\nTERJAMIN\r\nProduk yang anda beli kami jamin 100% ORIGINAL bukan barang replika selain itu dapat di cek di\r\n\r\n==================================================\r\nGaransi Resmi apple 1 Tahun\r\nBarang 100% ORIGINAL garansi uang kembali bila tidak original\r\n\r\n-Harap konfrimasi stock dan harga terlebih dahulu sebelum order\r\n-Harga sewaktu-waktu dapat berubah\r\n\r\nContact Us : Langsung PM saja', 1, 0, '10', '2017-06-05 00:00:00', '2017-07-13 23:59:59', NULL, '2017-06-05 00:57:33', '2017-07-11 20:59:32'),
(11, 11, 0, 'ASUS ROG GL552VW-DM136T I7-6700HQ', 'Baru', '200', 1, 1, '14599000', 'Deskripsi\r\n\r\nSpesifikasi :\r\nIntel Core i7-6700HQ 2.6GHz up to 3.5GHZ (6MB Cache)\r\n8GB RAM DDR4, 128GB SSD + 1000GB HDD\r\nIntel HD Graphics 530 & Geforce GTX960M 2GB DDR5\r\nWINDOWS 10 HOME 64bit\r\n15,6" inch FULL HD Matte Display\r\nDVD RW SuperMulti Drive\r\nHighlighted WASD keys with BACKLIT KEYBOARD\r\nHD webcam, card reader, WiFi b/g/n, Bluetooth v4.0, HDMI, Gigabit LAN, USB 3.1 type C, USB 3.0, USB 2.0\r\nWeight 2.6kg included 4 cells battery (removable)\r\nASUS 2 years Global warranty\r\n\r\nfree : ASUS ROG BACKPACK', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:58:53', '2017-07-13 20:46:09'),
(12, 11, 0, 'Laptop DELL 5410', 'Baru', '100', 1, 1, '6500000', 'Deskripsi\r\n\r\nSpesifikasi :\r\n\r\nCPU : AMD A10 8700 3,0 GHz\r\nRAM : 8 GB DDR4\r\nHDD : 1000 GB\r\nVGA : ATI Radeon Graphic R8\r\nOS : Windows 10 Home\r\n\r\nKelengkapan :\r\n\r\n-Unit Laptop\r\n-Charger\r\n-Kartu Garansi\r\n-Dus\r\n-Fullset\r\n\r\nBISA DI CICIL TANPA KARTU KREDIT!\r\n\r\nSyarat :\r\nKTP + dokumen pendukung minimal 1 (cth: KTP + SIM / KTP + NPWP / KTP + Kartu Keluarga,dll)\r\n\r\nDP 850.000 sudah termasuk admin. Bisa juga DP lebih tinggi.\r\nProses cepat hanya 30 menit. Langsung bawa pulang barangnya hari ini juga.\r\n\r\nLangsung aja chat saya via WhatsApp/SMS :\r\no813 1o1o 8547(Arizal)\r\n\r\nAlamat di e-Center Supermal Karawaci\r\nNama toko KING Computer, Lantai FF e-Center Blok G5 No 1&4', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:00:24', '2017-06-05 01:00:24'),
(13, 11, 0, 'Laptop MSI GL62 6QC', 'Baru', '100', 1, 1, '5000000', 'Laptop MSI GL62 6QC', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:01:32', '2017-06-05 01:01:32'),
(14, 11, 0, 'LENOVO 110', 'Baru', '111', 1, 1, '5400000', 'LENOVO 110', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:03:34', '2017-06-05 01:03:34'),
(15, 4, 0, 'Three', 'Baru', '1', 1, 1000, '0', 'Paket Data Kartu Three', 1000, 0, '0', NULL, NULL, '{"prefix":["0896","0897","0898","0899"]}', '2017-06-05 01:05:48', '2017-06-05 01:06:14'),
(16, 4, 15, 'Three-300MB', 'Baru', '1', 1, 1, '10700', 'Paket Data Three 300 MB', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:07:18', '2017-06-05 01:07:18'),
(17, 4, 0, 'Telkomsel', 'Baru', '1', 1, 100, '0', 'Paket Data Telkomsel', 100, 0, '0', NULL, NULL, '{"prefix":["0811","0812","0813","0821","0822","0823","0852","0853","0851"]}', '2017-06-05 01:08:07', '2017-06-05 01:08:07'),
(18, 4, 17, 'TSEL-50000', 'Baru', '1', 1, 1, '50000', 'Data Telkomsel 50000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:08:58', '2017-06-05 01:08:58'),
(19, 13, 0, 'PLN', 'Baru', '1', 1, 1, '0', 'Token Listrik', 1, 0, '0', NULL, NULL, NULL, '2017-07-05 23:54:33', '2017-07-05 23:59:13'),
(20, 13, 19, 'Listrik-Rp. 20.000', 'Baru', '1', 1, 1, '30000', 'Token Listrik 20.000', 1, 0, '0', NULL, NULL, NULL, '2017-07-05 23:56:08', '2017-07-06 01:38:52'),
(21, 13, 19, 'Listrik-Rp. 50.000', 'Baru', '1', 1, 1, '55000', 'Token Listrik sebesar 50.000', 1, 0, '0', NULL, NULL, NULL, '2017-07-05 23:58:49', '2017-07-06 01:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `set_utama` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `gallery_id`, `set_utama`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, NULL, '2017-06-05 00:57:33'),
(2, 10, 2, 0, NULL, NULL),
(3, 11, 3, 0, NULL, NULL),
(4, 12, 4, 0, NULL, NULL),
(5, 13, 5, 0, NULL, NULL),
(6, 14, 6, 0, NULL, '2017-06-18 22:04:03'),
(7, 14, 7, 1, NULL, '2017-06-18 22:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', 'Developer', NULL, NULL),
(2, 'admin', 'Administrator', 'Administrator', NULL, NULL),
(3, 'customer', 'Customer', 'Customer', NULL, '2017-05-28 21:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `gallery_id`, `title`, `created_at`, `updated_at`) VALUES
(2, 9, 'Slideshow Pertama', '2017-07-17 20:53:53', '2017-07-17 20:53:53'),
(3, 10, 'Slideshow Kedua', '2017-07-17 20:54:10', '2017-07-17 20:54:10'),
(4, 11, 'Slideshow Ketiga', '2017-07-17 20:54:22', '2017-07-17 20:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_methods`
--

CREATE TABLE `transaction_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_methods`
--

INSERT INTO `transaction_methods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Transfer', NULL, '2017-06-05 01:27:44', '2017-06-05 01:27:44'),
(2, 'Indomaret', NULL, '2017-06-05 01:27:53', '2017-06-05 01:27:53'),
(3, 'Alfamart', NULL, '2017-06-05 01:28:00', '2017-06-05 01:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `date_of_birth`, `gender`, `no_hp`, `email`, `password`, `photo`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fazrimaulana', 'Fazri Maulana', '1994-08-14', 'laki-laki', '089673797344', 'fm.fazri.m@gmail.com', '$2y$10$fIZQCFr/4dfIAX0O2P.Op.Of78FrLJa2EK.XIGyexauTBCv5Qz8Ka', NULL, NULL, 'A5YFgsDlPD1b7TkORrivn6RYVoYWXeLbzYSSgb78Kcz0MPAURAAjl2Pkgl3g', NULL, '2017-06-04 22:27:49'),
(2, 'fegy', 'Fegyawati', '1994-06-01', 'perempuan', NULL, 'fegya@gmail.com', '$2y$10$9QK7MybBpCeVO5nMk8KUDO9jzp1S2g6tteLpx9BIr02eFRjwi9B6e', NULL, 'Desa Jalaksanan Kecamatan Jalaksana Kabupaten Kuningan Provinsi Jawa Barat', 'g6z5a8O2KciUyHeqwgOoVjVmjuJ0Qmqfwon3SDSOe1J9dJALF3atMnln4LWz', '2017-05-25 20:08:46', '2017-05-25 21:09:42'),
(3, 'noviefujiantie', 'Novie Fujiantie Haeruman', NULL, 'perempuan', NULL, 'novie@gmail.com', '$2y$10$CqAcUvzJtiuqtGKl2WSdfumNI.A1CphbuUfopwDv5D2ennLCaGfX6', NULL, NULL, 'XPLaL2ONXHEmZD7a67boFw0t2a1BjTPS9KlyZemOByNUVYDdybsvl9m5aAJG', '2017-05-29 21:01:43', '2017-05-29 21:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirmations_order_id_foreign` (`order_id`),
  ADD KEY `confirmations_bank_to_foreign` (`bank_to`),
  ADD KEY `confirmations_bank_from_foreign` (`bank_from`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_transaction_method_id_foreign` (`transaction_method_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_gallery_product_id_foreign` (`product_id`),
  ADD KEY `product_gallery_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slideshow_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `transaction_methods`
--
ALTER TABLE `transaction_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction_methods`
--
ALTER TABLE `transaction_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD CONSTRAINT `confirmations_bank_from_foreign` FOREIGN KEY (`bank_from`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `confirmations_bank_to_foreign` FOREIGN KEY (`bank_to`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `confirmations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_transaction_method_id_foreign` FOREIGN KEY (`transaction_method_id`) REFERENCES `transaction_methods` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD CONSTRAINT `slideshow_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
