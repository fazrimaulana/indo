-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jun 2017 pada 10.28
-- Versi Server: 10.1.13-MariaDB
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
-- Struktur dari tabel `categories`
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
-- Dumping data untuk tabel `categories`
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
(12, 8, 'kaos', 'kaos', 'Kaos Wanita', NULL, '2017-06-01 23:11:29', '2017-06-01 23:11:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, '20170605075555-apple-macbook-air-mmgf2-2016', 'uploads/products/20170605075555-apple-macbook-air-mmgf2-2016.jpg', '2017-06-05 00:55:55', '2017-06-05 00:55:55'),
(2, '20170605075556-mackbook-air', 'uploads/products/20170605075556-mackbook-air.jpg', '2017-06-05 00:55:56', '2017-06-05 00:55:56'),
(3, '20170605075830-asus-rog-gl552vw-dm136t-i7-6700hq', 'uploads/products/20170605075830-asus-rog-gl552vw-dm136t-i7-6700hq.jpg', '2017-06-05 00:58:30', '2017-06-05 00:58:30'),
(4, '20170605075959-laptop-dell-5410', 'uploads/products/20170605075959-laptop-dell-5410.jpg', '2017-06-05 00:59:59', '2017-06-05 00:59:59'),
(5, '20170605080104-laptop-msi-gl62-6qc', 'uploads/products/20170605080104-laptop-msi-gl62-6qc.jpg', '2017-06-05 01:01:04', '2017-06-05 01:01:04'),
(6, '20170605080324-lenovo-110', 'uploads/products/20170605080324-lenovo-110.jpg', '2017-06-05 01:03:24', '2017-06-05 01:03:24'),
(7, '20170605080325-lenovo-110', 'uploads/products/20170605080325-lenovo-110.jpg', '2017-06-05 01:03:25', '2017-06-05 01:03:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
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
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `parent_id`, `name`, `href`, `target`, `title`, `icon`, `module`, `permission`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.categories', '', 'Categories', '#', '', 'Categories Management', 'fa fa-thumb-tack', 'Categories', 'can_see_categories_menu', '94', '2017-05-18 21:10:37', '2017-06-05 01:28:00'),
(2, 'dashboard.categories.index', 'dashboard.categories', 'All Categories', 'dashboard/categories', '#', 'Categories Management', 'fa fa-puzzle', 'Categories', 'can_see_categories_index', '1', '2017-05-18 21:10:37', '2017-06-05 01:28:00'),
(3, 'dashboard.module', '', 'Modules', '#', '', 'Module Management', 'fa fa-puzzle-piece', 'Module', 'can_see_module_menu', '99', '2017-05-18 21:10:37', '2017-06-05 01:28:00'),
(4, 'dashboard.module.index', 'dashboard.module', 'Module', 'dashboard/modules', '#', 'Module Management', 'fa fa-puzzle', 'Module', 'can_see_module_index', '1', '2017-05-18 21:10:38', '2017-06-05 01:28:00'),
(5, 'dashboard.products', '', 'Products', '#', '', 'Products Management', 'fa fa-folder', 'Products', 'can_see_products_menu', '93', '2017-05-18 21:10:38', '2017-06-05 01:28:01'),
(6, 'dashboard.products.index', 'dashboard.products', 'All Products', 'dashboard/products', '#', 'Products Management', 'fa fa-puzzle', 'Products', 'can_see_products_index', '1', '2017-05-18 21:10:38', '2017-06-05 01:28:01'),
(7, 'dashboard.products.add', 'dashboard.products', 'Add Products', 'dashboard/products/add', '#', 'Products Management', 'fa fa-puzzle', 'Products', 'can_add_products', '1', '2017-05-18 21:10:38', '2017-06-05 01:28:01'),
(8, 'dashboard.setting.role', '', 'Role And Permission', '#', '', 'Role And Permission Management', 'fa fa-lock', 'Role', 'can_see_module_menu', '98', '2017-05-18 21:10:38', '2017-06-05 01:28:01'),
(9, 'dashboard.setting.role.index', 'dashboard.setting.role', 'Role', 'dashboard/settings/role', '#', 'Role Management', 'fa fa-puzzle', 'Role', 'can_see_module_index', '1', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(10, 'dashboard.setting.role.permission', 'dashboard.setting.role', 'Permission', 'dashboard/settings/permission', '#', 'Permission Management', 'fa fa-puzzle', 'Role', 'can_see_module_index', '1', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(11, 'dashboard.users', '', 'Users', '#', '', 'Users Management', 'fa fa-user', 'Users', 'can_see_users_menu', '96', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(12, 'dashboard.users.index', 'dashboard.users', 'All Users', 'dashboard/users', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_see_users_index', '1', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(13, 'dashboard.users.add', 'dashboard.users', 'Add New', 'dashboard/users/add', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_add_users', '1', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(14, 'dashboard.users.profile', 'dashboard.users', 'Your Profile', 'dashboard/users/profile', '#', 'Users Management', 'fa fa-puzzle', 'Users', 'can_see_users', '1', '2017-05-18 21:10:39', '2017-06-05 01:28:01'),
(15, 'dashboard.orders', '', 'Orders', '#', '', 'Orders Management', 'fa fa-shopping-cart', 'Orders', 'can_see_orders_menu', '95', '2017-05-23 00:58:01', '2017-06-05 01:28:00'),
(16, 'dashboard.orders.index', 'dashboard.orders', 'All Orders', 'dashboard/orders', '#', 'Orders Management', 'fa fa-puzzle', 'Orders', 'can_see_orders_index', '1', '2017-05-23 00:58:01', '2017-06-05 01:28:00'),
(17, 'dashboard.orders.transaction_methods.index', 'dashboard.orders', 'Transaction Methods', 'dashboard/transaction-methods', '#', 'Orders Management', 'fa fa-puzzle', 'Orders', 'can_see_transaction_methods_index', '1', '2017-05-23 00:58:01', '2017-06-05 01:28:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
(72, '2017_05_23_091154_create_order_details_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
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
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `keyword`, `version`, `author`, `web`, `repository`, `sequence`, `license`, `module`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Categories', 'Categories', '["Categories"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Categories', 'active', '2017-05-18 21:10:37', '2017-05-29 01:09:18'),
(2, 'Module Management', 'Core module', '["module","system","core"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Module', 'active', '2017-05-18 21:10:37', '2017-05-18 21:10:37'),
(3, 'Products', 'Products', '["Products"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Products', 'active', '2017-05-18 21:10:38', '2017-05-29 01:09:18'),
(4, 'Role And Permission', 'Role And Permission module', '["Role And Permission"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Role', 'active', '2017-05-18 21:10:38', '2017-05-29 01:09:18'),
(5, 'Users', 'Users', '["Users"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Users', 'active', '2017-05-18 21:10:39', '2017-05-29 01:09:18'),
(7, 'Orders', 'Orders', '["Orders"]', '0.0.1', 'Fazri Maulana', 'facebook.com/fazri.maulana1', 'github.com', '1', 'MIT', 'Orders', 'active', '2017-05-23 00:59:21', '2017-05-29 01:09:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_method_id` int(10) UNSIGNED NOT NULL,
  `buyer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` enum('Menunggu Pembayaran','Konfirmasi Pembayaran','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
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
-- Dumping data untuk tabel `permissions`
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
(50, 'can_add_transaction_method', 'can_add_transaction_method', 'can_add_transaction_method', '2017-05-23 01:29:22', '2017-05-23 01:29:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
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
-- Struktur dari tabel `products`
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
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `parent_id`, `name`, `condition`, `weight`, `min_order`, `max_order`, `price`, `description`, `stok`, `view`, `discount`, `start_time_discount`, `end_time_discount`, `custom`, `created_at`, `updated_at`) VALUES
(1, 6, 0, 'Three', 'Baru', '1', 1, 100000, '0', 'Pulsa Kartu Three', 100000, 0, '0', NULL, NULL, '{"prefix":["0896","0897","0898","0899"]}', '2017-06-05 00:47:33', '2017-06-05 00:47:33'),
(2, 6, 1, 'Three-5000', 'Baru', '1', 1, 1, '6500', 'Pulsa Three Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:48:07', '2017-06-05 00:48:07'),
(3, 6, 1, 'Three-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Three Sebesar 10000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:48:34', '2017-06-05 00:48:34'),
(4, 6, 0, 'Telkomsel', 'Baru', '1', 1, 100000, '0', 'Pulsa Kartu Telkomsel', 100000, 0, '0', NULL, NULL, '{"prefix":["0811","0812","0813","0821","0822","0823","0852","0853","0851"]}', '2017-06-05 00:50:05', '2017-06-05 00:50:05'),
(5, 6, 4, 'Tsel-5000', 'Baru', '1', 1, 1, '7000', 'Pulsa Telkomsel Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:51:00', '2017-06-05 00:51:00'),
(6, 6, 4, 'Tsel-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Telkomsel Sebesar 10000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:51:40', '2017-06-05 00:51:40'),
(7, 6, 0, 'Indosat', 'Baru', '1', 1, 100000, '0', 'Pulsa Indosat', 100000, 0, '0', NULL, NULL, '{"prefix":["0855","0856","0857","0858","0814","0815","0816"]}', '2017-06-05 00:52:11', '2017-06-05 00:53:03'),
(8, 6, 7, 'ISAT-5000', 'Baru', '1', 1, 1, '6500', 'Pulsa Indosat Sebesar 5000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:53:40', '2017-06-05 00:53:40'),
(9, 6, 7, 'ISAT-10000', 'Baru', '1', 1, 1, '12000', 'Pulsa Indosat Sebesar 10000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:54:18', '2017-06-05 00:54:18'),
(10, 11, 0, 'Apple MacBook Air MMGF2 2016', 'Baru', '100', 1, 1, '11650000', 'Deskripsi\r\n\r\nKami menjamin setiap transaksi anda dengan :\r\nGARANSI\r\nSetiap produk yang anda beli bergaransi resmi 1 Tahun yang dapat di claim di Apple Authorized Service Provider Indonesia (Khusus iPad,iPod,Macbook bila produk tersebut sudah launching di Indonesia dan untuk iPhone garansi bantu claim) dan garansi uang kembali bila produk yang anda beli tidak itu garansi 1x24 Jam TUKAR BARU bila produk yang anda terima cacat produksi setelah baru buka. Serta bisa di bantu claim garansi\r\n\r\nGRATIS\r\nKami juga memberikan GRATIS konsultasi mengenai setiap produk yang anda beli dengan memberikan referensi yang terbaik untuk anda, selain itu kita juga memberikan GRATIS bantu claim garansi bila bukan karena human error\r\n\r\nAMAN\r\nSetiap transaksi dengan kami pasti barang kami kirim selain itu bisa juga menggunakan jasa perantara Rekening Bersama (RekBer)\r\n\r\nTERJAMIN\r\nProduk yang anda beli kami jamin 100% ORIGINAL bukan barang replika selain itu dapat di cek di\r\n\r\n==================================================\r\nGaransi Resmi apple 1 Tahun\r\nBarang 100% ORIGINAL garansi uang kembali bila tidak original\r\n\r\n-Harap konfrimasi stock dan harga terlebih dahulu sebelum order\r\n-Harga sewaktu-waktu dapat berubah\r\n\r\nContact Us : Langsung PM saja', 1, 0, '10', '2017-06-05 00:00:00', '2017-06-10 00:00:00', NULL, '2017-06-05 00:57:33', '2017-06-05 01:04:45'),
(11, 11, 0, 'ASUS ROG GL552VW-DM136T I7-6700HQ', 'Baru', '1', 1, 1, '14599000', 'Deskripsi\r\n\r\nSpesifikasi :\r\nIntel Core i7-6700HQ 2.6GHz up to 3.5GHZ (6MB Cache)\r\n8GB RAM DDR4, 128GB SSD + 1000GB HDD\r\nIntel HD Graphics 530 & Geforce GTX960M 2GB DDR5\r\nWINDOWS 10 HOME 64bit\r\n15,6" inch FULL HD Matte Display\r\nDVD RW SuperMulti Drive\r\nHighlighted WASD keys with BACKLIT KEYBOARD\r\nHD webcam, card reader, WiFi b/g/n, Bluetooth v4.0, HDMI, Gigabit LAN, USB 3.1 type C, USB 3.0, USB 2.0\r\nWeight 2.6kg included 4 cells battery (removable)\r\nASUS 2 years Global warranty\r\n\r\nfree : ASUS ROG BACKPACK', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 00:58:53', '2017-06-05 00:58:53'),
(12, 11, 0, 'Laptop DELL 5410', 'Baru', '100', 1, 1, '6500000', 'Deskripsi\r\n\r\nSpesifikasi :\r\n\r\nCPU : AMD A10 8700 3,0 GHz\r\nRAM : 8 GB DDR4\r\nHDD : 1000 GB\r\nVGA : ATI Radeon Graphic R8\r\nOS : Windows 10 Home\r\n\r\nKelengkapan :\r\n\r\n-Unit Laptop\r\n-Charger\r\n-Kartu Garansi\r\n-Dus\r\n-Fullset\r\n\r\nBISA DI CICIL TANPA KARTU KREDIT!\r\n\r\nSyarat :\r\nKTP + dokumen pendukung minimal 1 (cth: KTP + SIM / KTP + NPWP / KTP + Kartu Keluarga,dll)\r\n\r\nDP 850.000 sudah termasuk admin. Bisa juga DP lebih tinggi.\r\nProses cepat hanya 30 menit. Langsung bawa pulang barangnya hari ini juga.\r\n\r\nLangsung aja chat saya via WhatsApp/SMS :\r\no813 1o1o 8547(Arizal)\r\n\r\nAlamat di e-Center Supermal Karawaci\r\nNama toko KING Computer, Lantai FF e-Center Blok G5 No 1&4', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:00:24', '2017-06-05 01:00:24'),
(13, 11, 0, 'Laptop MSI GL62 6QC', 'Baru', '100', 1, 1, '5000000', 'Laptop MSI GL62 6QC', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:01:32', '2017-06-05 01:01:32'),
(14, 11, 0, 'LENOVO 110', 'Baru', '111', 1, 1, '5400000', 'LENOVO 110', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:03:34', '2017-06-05 01:03:34'),
(15, 4, 0, 'Three', 'Baru', '1', 1, 1000, '0', 'Paket Data Kartu Three', 1000, 0, '0', NULL, NULL, '{"prefix":["0896","0897","0898","0899"]}', '2017-06-05 01:05:48', '2017-06-05 01:06:14'),
(16, 4, 15, 'Three-300MB', 'Baru', '1', 1, 1, '10700', 'Paket Data Three 300 MB', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:07:18', '2017-06-05 01:07:18'),
(17, 4, 0, 'Telkomsel', 'Baru', '1', 1, 100, '0', 'Paket Data Telkomsel', 100, 0, '0', NULL, NULL, '{"prefix":["0811","0812","0813","0821","0822","0823","0852","0853","0851"]}', '2017-06-05 01:08:07', '2017-06-05 01:08:07'),
(18, 4, 17, 'TSEL-50000', 'Baru', '1', 1, 1, '50000', 'Data Telkomsel 50000', 1, 0, '0', NULL, NULL, NULL, '2017-06-05 01:08:58', '2017-06-05 01:08:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_gallery`
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
-- Dumping data untuk tabel `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `gallery_id`, `set_utama`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, NULL, '2017-06-05 00:57:33'),
(2, 10, 2, 0, NULL, NULL),
(3, 11, 3, 0, NULL, NULL),
(4, 12, 4, 0, NULL, NULL),
(5, 13, 5, 0, NULL, NULL),
(6, 14, 6, 1, NULL, '2017-06-05 01:03:34'),
(7, 14, 7, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
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
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', 'Developer', NULL, NULL),
(2, 'admin', 'Administrator', 'Administrator', NULL, NULL),
(3, 'customer', 'Customer', 'Customer', NULL, '2017-05-28 21:10:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_methods`
--

CREATE TABLE `transaction_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_methods`
--

INSERT INTO `transaction_methods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Transfer', NULL, '2017-06-05 01:27:44', '2017-06-05 01:27:44'),
(2, 'Indomaret', NULL, '2017-06-05 01:27:53', '2017-06-05 01:27:53'),
(3, 'Alfamart', NULL, '2017-06-05 01:28:00', '2017-06-05 01:28:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `date_of_birth`, `gender`, `no_hp`, `email`, `password`, `photo`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fazrimaulana', 'Fazri Maulana', '1994-08-14', 'laki-laki', '089673797344', 'fm.fazri.m@gmail.com', '$2y$10$fIZQCFr/4dfIAX0O2P.Op.Of78FrLJa2EK.XIGyexauTBCv5Qz8Ka', NULL, NULL, '9iv0fQq3erlyrN5jHxSNOuRV6NVF1B0G53fPCNfVMas3XCfiG6dVDBEpr0q4', NULL, '2017-06-04 22:27:49'),
(2, 'fegy', 'Fegyawati', '1994-06-01', 'perempuan', NULL, 'fegya@gmail.com', '$2y$10$9QK7MybBpCeVO5nMk8KUDO9jzp1S2g6tteLpx9BIr02eFRjwi9B6e', NULL, 'Desa Jalaksanan Kecamatan Jalaksana Kabupaten Kuningan Provinsi Jawa Barat', 'g6z5a8O2KciUyHeqwgOoVjVmjuJ0Qmqfwon3SDSOe1J9dJALF3atMnln4LWz', '2017-05-25 20:08:46', '2017-05-25 21:09:42'),
(3, 'noviefujiantie', 'Novie Fujiantie Haeruman', NULL, 'perempuan', NULL, 'novie@gmail.com', '$2y$10$CqAcUvzJtiuqtGKl2WSdfumNI.A1CphbuUfopwDv5D2ennLCaGfX6', NULL, NULL, 'XPLaL2ONXHEmZD7a67boFw0t2a1BjTPS9KlyZemOByNUVYDdybsvl9m5aAJG', '2017-05-29 21:01:43', '2017-05-29 21:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_transaction_method_id_foreign` FOREIGN KEY (`transaction_method_id`) REFERENCES `transaction_methods` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
