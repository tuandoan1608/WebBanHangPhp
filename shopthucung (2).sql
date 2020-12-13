-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2020 lúc 12:20 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthucung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `parentID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`, `parentID`, `status`, `created_at`, `updated_at`) VALUES
(51, 'đồ cho chó', 'do-cho-cho', 0, 1, '2020-11-28 06:41:57', '2020-11-28 06:41:57'),
(52, 'Thuốc và y tế cho chó', 'thuoc-va-y-te-cho-cho', 51, 1, '2020-11-28 06:42:33', '2020-11-28 06:42:33'),
(53, 'Đồ cho mèo', 'do-cho-meo', 0, 1, '2020-11-28 06:42:45', '2020-11-28 06:42:45'),
(54, 'Áo cho mèo', 'ao-cho-meo', 53, 1, '2020-11-28 06:43:12', '2020-11-28 06:43:12'),
(55, 'Quần cho mèo', 'quan-cho-meo', 53, 1, '2020-11-28 06:43:26', '2020-11-28 06:43:26'),
(56, 'thức ăn cho mèo', 'thuc-an-cho-meo', 53, 1, '2020-11-28 06:43:41', '2020-11-28 07:02:04'),
(57, 'thức ăn cho chó', 'thuc-an-cho-cho', 51, 1, '2020-11-28 06:44:01', '2020-11-28 06:44:01'),
(58, 'Dụng cụ cho chó', 'dung-cu-cho-cho', 51, 1, '2020-11-28 06:44:24', '2020-11-28 06:44:24'),
(59, 'Đồ chơi & dụng cụ huấn luyện chó', 'do-choi-dung-cu-huan-luyen-cho', 51, 1, '2020-11-28 06:44:55', '2020-11-28 06:44:55'),
(61, 'shop vật nuôi khác', 'shop-vat-nuoi-khac', 0, 1, '2020-11-28 06:45:28', '2020-11-28 06:45:28'),
(62, 'thức ăn khô', 'thuc-an-kho', 57, 1, '2020-12-02 08:47:01', '2020-12-02 08:47:01'),
(63, 'thức ăn ước', 'thuc-an-uoc', 57, 1, '2020-12-02 08:47:13', '2020-12-02 08:47:13'),
(64, 'pate cho chó', 'pate-cho-cho', 57, 1, '2020-12-02 08:47:30', '2020-12-02 08:47:30'),
(65, 'thuốc trừ ve bọ cho chó', 'thuoc-tru-ve-bo-cho-cho', 52, 1, '2020-12-02 08:47:51', '2020-12-02 08:47:51'),
(66, 'thuốc nhỏ mắt cho chó', 'thuoc-nho-mat-cho-cho', 52, 1, '2020-12-02 08:48:05', '2020-12-02 08:48:05'),
(67, 'thức ăn viên cho mèo', 'thuc-an-vien-cho-meo', 56, 1, '2020-12-02 08:49:05', '2020-12-02 08:49:05'),
(68, 'vòng cỗ, dây, rọ mõm cho chó', 'vong-co-day-ro-mom-cho-cho', 51, 1, '2020-12-02 08:49:36', '2020-12-02 08:49:36'),
(69, 'Dụng cụ vệ sinh và chuồng', 'dung-cu-ve-sinh-va-chuong', 51, 1, '2020-12-03 09:58:43', '2020-12-03 09:58:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `codeCoupon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `discount`, `type`, `status`, `codeCoupon`) VALUES
(1, 'giảm giá ngày 28-11', 20, 1, 1, 'giamgia'),
(2, 'khuyến mãi ngày chủ nhật', 20000, 2, 1, 'chunhatvuive');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommer`
--

CREATE TABLE `custommer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `custommer`
--

INSERT INTO `custommer` (`id`, `name`, `email`, `phone`, `address`, `password`, `status`) VALUES
(1, 'nhu', '3@gmail.com', 234525245, 'were', '$2y$10$9fB1TW2Cp2MCkU842R7QYuK.nlQgFzwgqgOmOaa3uUW9bU65lW8hu', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `parentID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `link`, `parentID`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Đồ cho chó', 'do-cho-cho', 0, 1, '2020-11-16 01:10:29', '2020-11-17 00:51:01'),
(3, 'Đồ cho mèo', 'do-cho-meo', 0, 1, '2020-11-16 07:14:28', '2020-11-16 07:14:28'),
(4, 'liên hệ', 'lien-he', 0, 0, '2020-11-16 07:14:40', '2020-11-25 00:18:19'),
(6, 'sdfdsf', 'sdfdsf', 1, 1, '2020-11-16 13:24:25', '2020-11-16 13:24:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2020_11_09_193420_create_listmenus_table', 2),
(7, '2020_11_11_080447_create_menus_table', 3),
(8, '2020_11_12_060710_create_products_table', 4),
(9, '2020_11_12_072154_create_product_imgages_table', 5),
(10, '2020_11_13_063737_create_categories_table', 6),
(13, '2020_11_15_163858_create_slides_table', 7),
(14, '2020_11_16_162408_create_settings_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `parentID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `parentID`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(1, 'Thông tin hửu ích cho mèo', 0, '2020-11-20 07:03:12', '2020-11-29 18:24:36', 'thong-tin-huu-ich-cho-meo', 1),
(2, 'Bản tin cho chó', 0, '2020-11-20 07:04:04', '2020-11-20 07:04:04', 'ban-tin-cho-cho', 1),
(3, 'Câu hỏi thường gặp', 0, '2020-11-29 18:25:52', '2020-11-29 18:25:52', 'cau-hoi-thuong-gap', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_content`
--

CREATE TABLE `news_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `descript` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `slug` varchar(250) NOT NULL,
  `new_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `View_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news_content`
--

INSERT INTO `news_content` (`id`, `name`, `descript`, `image`, `slug`, `new_id`, `content`, `View_count`, `created_at`, `updated_at`) VALUES
(8, 'Thức ăn kho cho mèo cat eya chất lượng tốt, giá thành rẽ', 'Làm sao để cung cấp được đầy đủ chất dinh dưỡng cho quàng thượng ? Sản phẩm thức ăn hạt nào cung cấp được đủ các chất dinh dưỡng đó ? PetCity sẽ review cho các Sen một sản phẩm cực kì chất lượng mà giá lại siêu yêu luôn ạt dinh dưỡng đó', '/storage/news/6/hbLI6Hzik5MStfruRMYd.jpg', 'thuc-an-kho-cho-meo-cat-eya-chat-luong-tot-gia-thanh-re', 1, '<p>L&agrave;m sao để cung cấp được đầy đủ chất dinh dưỡng cho qu&agrave;ng thượng ? Sản phẩm thức ăn hạt n&agrave;o cung cấp được đủ c&aacute;c chất dinh dưỡng đ&oacute; ? PetCity sẽ review cho c&aacute;c Sen một sản phẩm cực k&igrave; chất lượng m&agrave; gi&aacute; lại si&ecirc;u y&ecirc;u lu&ocirc;n ạ<em>t dinh dưỡng đ&oacute;</em></p>\r\n<p><strong><a href=\"https://www.petcity.vn/brand/cats-eye-han-quoc\" target=\"_blank\" rel=\"noopener\">Thương hiệu Cat Eye</a></strong></p>\r\n<p>C&ugrave;ng với&nbsp;<a href=\"https://www.petcity.vn/brand/royal-canin\" target=\"_blank\" rel=\"noopener\">Royal Canin</a>&nbsp;v&agrave; Blisk, thương hiệu<a href=\"https://www.petcity.vn/thuc-an-kho-cho-meo-gia-re.html\" target=\"_blank\" rel=\"noopener\">&nbsp;thức ăn cho m&egrave;o</a>&nbsp;Cat Eye l&agrave; một trong 3 thương hiệu được đ&aacute;nh gi&aacute; tốt nhất cho dinh dưỡng của m&egrave;o. Đ&acirc;y l&agrave; thương hiệu c&oacute; xuất xứ từ H&agrave;n Quốc, được ph&acirc;n phối ở khắp c&aacute;c quốc gia tr&ecirc;n thế giới bởi thương hiệu n&agrave;y nổi tiếng l&agrave; d&ograve;ng thức ăn tốt nhất cho hệ ti&ecirc;u h&oacute;a của m&egrave;o.</p>\r\n<p><strong>Sản phẩm thức ăn kh&ocirc; Cat Eye</strong></p>\r\n<p>D&ugrave;ng được với cho m&egrave;o ở tất cả c&aacute;c độ tuổi : m&egrave;o nhỏ, m&egrave;o trung b&igrave;nh, m&egrave;o trưởng th&agrave;nh v&agrave; n&oacute; c&ograve;n kh&ocirc;ng g&acirc;y t&aacute;c hại với cả những d&ograve;ng m&egrave;o c&aacute;i đang trong thời kỳ cho con b&uacute;.</p>\r\n<p><img src=\"https://www.petcity.vn/media/news/1301_2.jpg\" alt=\"\" width=\"545\" height=\"545\" /></p>\r\n<p>Ch&iacute;nh v&igrave; sự an to&agrave;n, l&agrave;nh t&iacute;nh n&agrave;y, n&ecirc;n rất nhiều c&aacute;c bạn tin thường rất hay sử dụng dạng thức ăn n&agrave;y để cung cấp dinh dưỡng cho m&egrave;o, kể cả khi m&egrave;o đang gặp c&aacute;c vấn đề về sức khỏe.&nbsp;</p>\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n<p>Bột Chicke, Bột c&aacute;, Ng&ocirc; v&agrave;ng, L&uacute;a m&igrave;, Bột đậu n&agrave;nh, Gạo ủ, Bột củ cải, Cellulose dạng bột, Hạt lanh, Dầu đậu n&agrave;nh, Men kh&ocirc;, Mỡ động vật, Ti&ecirc;u h&oacute;a g&agrave; kh&ocirc;, Taurine, Vitamin E, Vitamin C, Methionine , Kali Clorua, Choline Clorua, Ferlic Sulfate, Zinc Sulfate, Mangan Sulfate, Copper Oxide, Niacin, Canxi, Pantothenate, Riboflavin, Biotin, Folic Acid, Thiamine Mononitrate.&nbsp;Pyridoxine Clorua, Menadione Sodium Bisulfate (nguồn hoạt động của Vitamin K), Cobalt Sulfate, Natri Selenite, Canxi Iodate, Kho&aacute;ng chất hữu cơ, Chiết xuất Yucca kh&ocirc;.</p>\r\n<p><strong>C&ocirc;ng dụng&nbsp;</strong></p>\r\n<p>- C&aacute;c th&agrave;nh phần dinh dưỡng gi&uacute;p hỗ trợ tối đa hệ ti&ecirc;u h&oacute;a, cải thiện vấn đề hấp thụ chất dinh dưỡng kể cả với những ch&uacute; m&egrave;o đang gặp t&igrave;nh trạng yếu về sức khỏe.</p>\r\n<p>- Gi&uacute;p cải thiện hệ thống miễn dịch của m&egrave;o v&agrave; gi&uacute;p cho m&egrave;o nh&agrave; bạn ăn ngon miệng hơn, đảm bảo sức khỏe hơn.</p>\r\n<p><img src=\"https://www.petcity.vn/media/news/1301_aaa.jpg\" alt=\"\" width=\"767\" height=\"476\" /></p>\r\n<p>- Với c&aacute;c vitamin v&agrave; dưỡng chất, sản phẩm c&ograve;n l&agrave;m giảm lượng rụng l&ocirc;ng, gi&uacute;p m&egrave;o c&oacute; l&agrave;n da khỏe , l&ocirc;ng b&oacute;ng mượt, mềm mịn hơn.</p>\r\n<p>- Cat Eye ph&aacute;t huy tối đa thị lực của m&egrave;o&nbsp;</p>\r\n<p>- Đặc biệt thức ăn n&agrave;y c&ograve;n l&agrave;m giảm tỷ lệ l&ocirc;ng v&oacute;n cục trong hệ ti&ecirc;u h&oacute;a, hỗ trợ đ&aacute;ng kể c&aacute;c vấn đề ti&ecirc;u h&oacute;a m&agrave; m&egrave;o hay gặp phải.</p>\r\n<p><strong>C&aacute;ch sử dụng :</strong>&nbsp;cho ăn trực tiếp (kh&ocirc;ng qua chế&nbsp;</p>\r\n<p><strong>Bảo quản&nbsp;:</strong>&nbsp;ở nơi c&oacute; kh&ocirc;ng kh&iacute; tho&aacute;ng m&aacute;t, tr&aacute;nh tiếp x&uacute;c với &aacute;nh nắng mặt trời</p>\r\n<p>Xem th&ecirc;m :&nbsp;<a href=\"https://www.petcity.vn/review-cac-loai-thuc-an-cho-meo-tot-nhat-ban-nen-chon.html\" target=\"_blank\" rel=\"noopener\">Review c&aacute;c loại thức ăn cho m&egrave;o tốt nhất bạn n&ecirc;n chọn</a></p>', 1, '2020-11-29 18:32:00', '2020-11-29 18:32:00'),
(9, 'Thức ăn mèo ba tư nên chọn loại nào', 'Mèo ba tư là loại mèo khá khảnh ăn và khó nuôi bởi vậy việc chọn mua thức ăn cho mèo ba tư ( mèo persian) nên chọn loại nào ? chính hãng ở đâu tại Hà Nội và Tp HCM', '/storage/news/6/27DOlIZkWdT7T1elXeeG.jpg', 'thuc-an-meo-ba-tu-nen-chon-loai-nao', 1, '<p>M&egrave;o Ba Tư rất kh&oacute; chăm. Đối với m&egrave;o con dưới 1 th&aacute;ng tuổi bạn chỉ n&ecirc;n cho em ấy b&uacute; mẹ v&igrave; l&uacute;c n&agrave;y hệ ti&ecirc;u h&oacute;a của m&egrave;o chưa tốt v&agrave; cũng chưa c&oacute; răng để nhai. Bắt đầu từ 1 &ndash; 2 th&aacute;ng tuổi, c&oacute; thể bắt đầu cho m&egrave;o ăn dặm với ch&aacute;o lo&atilde;ng trộn với nhiều thịt xay thật nhuyễn. M&egrave;o cứng c&aacute;p hơn một t&iacute; bạn c&oacute; thể trộn thức ăn kh&ocirc; hơn. Khối lượng thức ăn mỗi ng&agrave;y với m&egrave;o ở độ tuổi n&agrave;y từ 25 &ndash; 40g / ng&agrave;y, chia l&agrave; 5 bữa để dễ hấp thụ.</p>\r\n<p>M&egrave;o con từ 2 &ndash; 4 th&aacute;ng tuổi đ&atilde; kh&aacute; cứng c&aacute;p rồi th&igrave; chỉ cần cho ăn 3 bữa / ng&agrave;y, với khối lượng 40 &ndash; 65g. Thời gian n&agrave;y c&oacute; thể bắt đầu tập cho m&egrave;o ăn c&aacute;c loại thức ăn kh&ocirc; đ&oacute;ng g&oacute;i, v&igrave; kh&ocirc;ng phải l&uacute;c n&agrave;o bạn cũng c&oacute; thời gian để nấu thức ăn cho ch&uacute;ng.</p>\r\n<p>&gt;&gt;&gt; Sản phẩm thức ăn cho m&egrave;o ba tư&nbsp;persian ph&ugrave; hợp ở độ tuổi n&agrave;y:&nbsp;<a href=\"https://www.petcity.vn/Thuc-an-Persian-Kitten-400g/p3963.html\">Persian Kitten (t&uacute;i 400g) - Thức ăn cho m&egrave;o</a></p>\r\n<p><img src=\"https://www.petcity.vn/media/news/2211_Screenshot_1.png\" alt=\"\" width=\"323\" height=\"325\" /></p>\r\n<p>M&egrave;o từ 4 th&aacute;ng tuổi trở l&ecirc;n. L&uacute;c n&agrave;y đ&atilde; được coi l&agrave; cỡ nhỡ, chỉ cần cho ăn 2 bữa / ng&agrave;y với khối lượng từ 60 &ndash; 80g cho m&egrave;o nặng dưới 3kg, v&agrave; 80 &ndash; 130g cho m&egrave;o nặng tr&ecirc;n 3kg.</p>\r\n<p>&gt;&gt;&gt; Trong giai đoạn n&agrave;y th&igrave; sản phẩm thức ăn&nbsp;<a href=\"https://www.petcity.vn/me-o-thuc-an-meo-persian-1-1-kg.html\">Me-o - Thức ăn m&egrave;o Persian 1.1kg</a>&nbsp;l&agrave; sản phẩm ph&ugrave; hợp với ch&uacute;ng</p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/3049_thuc-an-cho-meo-me-o-persian-anti-hairball-1.jpg\" alt=\"\" width=\"289\" height=\"289\" /></p>\r\n<p>M&egrave;o l&agrave; động vật ăn thịt vậy n&ecirc;n chế độ ăn của m&egrave;o Ba Tư phải c&oacute; nhiều thịt. Ch&uacute;ng rất th&iacute;ch thịt b&ograve;, b&igrave;nh d&acirc;n hơn th&igrave; thịt g&agrave; hoặc c&aacute;, tuy nhi&ecirc;n n&ecirc;n hạn chế cho ăn thịt lợn v&igrave; thịt lợn nhiều mỡ, nhưng nội tạng lợn như tim, gan, &oacute;c th&igrave; rất tốt. Tr&aacute;nh cho ăn thịt hoặc nội tạng sống nh&eacute;. Cũng cần cho ăn th&ecirc;m ch&aacute;o v&agrave; rau củ quả xay nhuyễn để bổ sung th&ecirc;m vitamin v&agrave; tăng đề kh&aacute;ng.</p>', 0, '2020-11-29 18:34:16', '2020-11-29 18:34:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `custummer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `displayname` varchar(100) NOT NULL,
  `parentID` int(11) NOT NULL,
  `key_permission` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `name`, `displayname`, `parentID`, `key_permission`, `created_at`, `update_at`) VALUES
(6, 'Module sản phẩm', 'Module sản phẩm', 0, NULL, NULL, NULL),
(7, 'Xem', 'Xem', 6, 'list_product', NULL, NULL),
(8, 'Thêm', 'Thêm', 6, 'add_product', NULL, NULL),
(9, 'Sửa', 'Sửa', 6, 'edit_product', NULL, NULL),
(10, 'Xóa', 'Xóa', 6, 'delete_product', NULL, NULL),
(11, 'Module danh mục sản phẩm', 'Module danh mục sản phẩm', 0, NULL, NULL, NULL),
(12, 'Xem', 'Xem', 11, 'list_category', NULL, NULL),
(13, 'Thêm', 'Thêm', 11, 'add_category', NULL, NULL),
(14, 'Sửa', 'Sửa', 11, 'add_category', NULL, NULL),
(15, 'Xóa', 'Xóa', 11, 'delete_category', NULL, NULL),
(16, 'slide', 'slide', 0, NULL, NULL, NULL),
(17, 'Xem', 'Xem', 16, 'list_slide', NULL, NULL),
(18, 'Thêm', 'Thêm', 16, 'add_slide', NULL, NULL),
(19, 'Sửa', 'Sửa', 16, 'edit_slide', NULL, NULL),
(20, 'Xóa', 'Xóa', 16, 'delete_slide', NULL, NULL),
(21, 'sản phẩm', 'sản phẩm', 0, NULL, NULL, NULL),
(22, 'Xem', 'Xem', 21, 'list_product', NULL, NULL),
(23, 'Thêm', 'Thêm', 21, 'add_product', NULL, NULL),
(24, 'Sửa', 'Sửa', 21, 'edit_product', NULL, NULL),
(25, 'Xóa', 'Xóa', 21, 'delete_product', NULL, NULL),
(26, 'accout', 'accout', 0, NULL, NULL, NULL),
(27, 'Xem', 'Xem', 26, 'list_accout', NULL, NULL),
(28, 'Thêm', 'Thêm', 26, 'add_accout', NULL, NULL),
(29, 'Sửa', 'Sửa', 26, 'edit_accout', NULL, NULL),
(30, 'Xóa', 'Xóa', 26, 'delete_accout', NULL, NULL),
(31, 'setting', 'setting', 0, NULL, NULL, NULL),
(32, 'Xem', 'Xem', 31, 'list_setting', NULL, NULL),
(33, 'Thêm', 'Thêm', 31, 'add_setting', NULL, NULL),
(34, 'Sửa', 'Sửa', 31, 'edit_setting', NULL, NULL),
(35, 'Xóa', 'Xóa', 31, 'delete_setting', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(6, 5, 7, NULL, NULL),
(7, 5, 8, NULL, NULL),
(8, 5, 9, NULL, NULL),
(9, 5, 10, NULL, NULL),
(10, 5, 12, NULL, NULL),
(11, 5, 13, NULL, NULL),
(12, 5, 14, NULL, NULL),
(13, 5, 15, NULL, NULL),
(14, 6, 7, NULL, NULL),
(15, 6, 8, NULL, NULL),
(16, 6, 9, NULL, NULL),
(17, 6, 10, NULL, NULL),
(18, 6, 12, NULL, NULL),
(19, 5, 22, NULL, NULL),
(20, 5, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `code` text NOT NULL,
  `metatitle` text NOT NULL,
  `decription` text DEFAULT NULL,
  `keyword` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `Discount` int(11) NOT NULL DEFAULT 1,
  `brand` text NOT NULL,
  `promotionPrice` text DEFAULT '0',
  `categoryID` int(11) NOT NULL,
  `tophot` int(11) DEFAULT NULL,
  `View_count` varchar(500) DEFAULT '0',
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `metatitle`, `decription`, `keyword`, `image`, `price`, `Discount`, `brand`, `promotionPrice`, `categoryID`, `tophot`, `View_count`, `detail`, `created_at`, `updated_at`) VALUES
(8, 'Nệm oval ABC màu cam size 1', 'Ra2j52Hn', 'nem-oval-abc-mau-cam-size-1', NULL, 'gerg, erg ,erg ,erg erg ,erg', '/storage/produc/6/731ArZEhEcVpCWUMJXxV.jpg', 160000, 15, 'ABC', '136', 62, NULL, '0', '<p>&nbsp;</p>\r\n<p>+ Với nhiều người, ch&oacute; m&egrave;o kh&ocirc;ng chỉ l&agrave; động vật gi&uacute;p giữ nh&agrave;, đuổi chuột m&agrave; c&ograve;n l&agrave; người bạn nhỏ th&acirc;n thiết v&agrave; rất trung th&agrave;nh.</p>\r\n<p>+ Do đ&oacute;, h&atilde;y thể hiện t&igrave;nh y&ecirc;u thương của bạn d&agrave;nh cho &ldquo;người bạn nhỏ&rdquo; đ&aacute;ng y&ecirc;u n&agrave;y bằng c&aacute;ch trang bị cho ch&uacute;ng một chiếc nệm nằm &ecirc;m &aacute;i v&agrave; xinh xắn của ABC để th&uacute; cưng c&oacute; một nơi thư gi&atilde;n thật thoải m&aacute;i.</p>\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n<p>- Chất liệu cotton th&ocirc;ng tho&aacute;ng, dễ vệ sinh, rất ph&ugrave; hợp với kh&iacute; hậu n&oacute;ng ẩm ở Việt Nam.</p>\r\n<p>- Bề mặt nằm c&oacute; 2 lớp nệm tạo sự &ecirc;m &aacute;i, th&uacute; cưng nh&agrave; bạn sẽ lu&ocirc;n c&oacute; cảm gi&aacute;c được n&acirc;ng niu v&agrave; y&ecirc;u chiều.</p>\r\n<p>- Thiết kế nệm h&igrave;nh oval sinh động với gam m&agrave;u nổi bật v&agrave; h&igrave;nh dấu ch&acirc;n ngộ nghĩnh của ch&uacute; ch&oacute; trải đều khắp, họa tiết mang đến sự quen thuộc v&agrave; gần gũi cho ch&uacute; c&uacute;n đ&aacute;ng y&ecirc;u trong nh&agrave;.</p>\r\n<p><strong>HƯỚNG DẪN CHỌN SIZE</strong></p>\r\n<p>- Size 1: k&iacute;ch thước 42 x 11 x 32 cm</p>\r\n<p>- Size 2: k&iacute;ch thước 48 x 13 x 34 cm</p>\r\n<p>- Size 3: k&iacute;ch thước 50 x 15 x 38 cm</p>\r\n<p>- Size 4: k&iacute;ch thước 54 x 16 x 41 cm</p>\r\n<p>- Size 5: k&iacute;ch thước 58 x 17 x 44 cm</p>\r\n<p><img title=\"Nệm oval ABC m&agrave;u cam size 1\" src=\"https://www.petcity.vn/media/product/1067_nem_oval_abc_mau_cam_size1.jpg\" alt=\"Nệm oval ABC m&agrave;u cam size 1\" /></p>\r\n<p>&nbsp;</p>', '2020-11-28 07:15:46', '2020-12-02 12:00:01'),
(9, '[S]Áo phao lót bông cho thú cưng', 'Pm66A4vJ', 'sao-phao-lot-bong-cho-thu-cung', NULL, 'ao cho cho', '/storage/produc/6/MK8j9fbkTiZgFc1B04fC.jpg', 99000, 1, 'ret', '0', 62, NULL, '0', '<p>&Aacute;o phao l&oacute;t b&ocirc;ng cho ch&oacute; m&egrave;o th&uacute; cưng m&egrave;o may mắn l&agrave; sản phẩm kh&ocirc;ng thể thiếu khi m&ugrave;a đ&ocirc;ng về. Boss sẽ tr&ocirc;ng thật s&agrave;nh điệu nhưng kh&ocirc;ng k&eacute;m phần ấm &aacute;p khi kho&aacute;c l&ecirc;n m&igrave;nh&nbsp;<strong>Bộ sưu tập m&ugrave;a đ&ocirc;ng 2020</strong>&nbsp;của&nbsp;<a href=\"https://www.petcity.vn/\" target=\"_blank\" rel=\"noopener\">PetCity</a>.</p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/4398_af32cb3be3812b1fd858ecf21af35aaequot.jpg\" alt=\"\" width=\"400\" /></p>\r\n<p><strong>Bảng size tham khảo</strong></p>\r\n<ul>\r\n<li>S : 1,2kg-2,5kg d&agrave;i lưng ~25cm</li>\r\n<li>M : 2.5kg-3.5kg d&agrave;i lưng ~30cm</li>\r\n<li>&nbsp;L : 3,5kg-4.5kg d&agrave;i lưng ~35cm</li>\r\n<li>XL : 4,5kg-7kg d&agrave;i lưng ~40cm</li>\r\n<li>XXL : 7-10kg d&agrave;i lưng ~45cm</li>\r\n</ul>\r\n<p><img src=\"https://www.petcity.vn/media/lib/4399_1ec208d94502bb5ce213.jpg\" alt=\"\" width=\"400\" /></p>\r\n<p><strong>Lưu &yacute;:</strong></p>\r\n<p>Số liệu tr&ecirc;n chỉ mang t&iacute;nh chất tương đối. Size &aacute;o c&ograve;n phụ thuộc v&agrave;o giống c&uacute;n miu độ d&agrave;y l&ocirc;ng v&agrave; sai số c&acirc;n nặng hoặc chiều d&agrave;i lưng do dụng cụ đo của mỗi người kh&aacute;c nhau, quần &aacute;o c&oacute; thể c&oacute; sai số 2-3cm.</p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/4398_ee08242842f3bcade5e2.jpg\" alt=\"\" width=\"400\" /></p>\r\n<p><em>L&oacute;t b&ocirc;ng ấm &aacute;p</em></p>\r\n<p><strong>Chất liệu:&nbsp;</strong></p>\r\n<ul>\r\n<li>Phao l&oacute;t b&ocirc;ng d&agrave;y dặn</li>\r\n<li>Khuy bấm chắc chắn, dễ mặc</li>\r\n</ul>\r\n<p><img src=\"https://www.petcity.vn/media/lib/4398_4d720a1d47c6b998e0d7.jpg\" alt=\"\" width=\"400\" /></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -59px; top: -14px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '2020-11-28 07:20:09', '2020-11-29 19:14:50'),
(10, 'Nhà lều Angry birds', '62hbeTg1', 'nha-leu-angry-birds', NULL, 'rthtrh', '/storage/produc/6/Nf2GnSXbMIiiUZ19kl23.jpg', 4555, 10, 'rth', '4099.5', 58, NULL, '2', '<p><span data-mce-mark=\"1\">Nh&agrave; Angry birds cho ch&oacute; m&egrave;o, kiểu d&aacute;ng v&agrave; m&agrave;u sắc đẹp, hấp dẫn th&uacute; cưng nh&agrave; bạn, chất liệu bền, chắc chắn, b&aacute;n rẻ nhất tại PetCity.vn</span></p>\r\n<p><strong><span data-mce-mark=\"1\">ĐẶC ĐIỂM NỔI BẬT</span></strong></p>\r\n<p><span data-mce-mark=\"1\">- Ng&ocirc;i nh&agrave; được l&agrave;m từ chất liệu cotton th&ocirc;ng tho&aacute;ng, dễ vệ sinh v&agrave; ph&ugrave; hợp với kh&iacute; hậu n&oacute;ng ẩm ở Việt Nam.</span></p>\r\n<p><span data-mce-mark=\"1\">- Bề mặt nằm c&oacute; lớp l&oacute;t cotton &ecirc;m c&ugrave;ng thiết kế h&igrave;nh ng&ocirc;i nh&agrave; với 3 mặt bao quanh nhằm tạo cho th&uacute; cưng của bạn cảm gi&aacute;c được che chở an to&agrave;n v&agrave; ấm &aacute;p.</span></p>\r\n<p><span data-mce-mark=\"1\">- Nh&agrave; cho th&uacute; cưng sử dụng gam m&agrave;u nổi bật kết hợp với những đường kẻ sọc c&aacute; t&iacute;nh, đ&acirc;y chắc chắn sẽ l&agrave; nơi thư gi&atilde;n l&yacute; tưởng, l&agrave;m h&agrave;i l&ograve;ng những ch&uacute; c&uacute;n con xinh xắn.</span></p>\r\n<p><span data-mce-mark=\"1\">- K&iacute;ch thước : 40*40*45cm</span></p>\r\n<p><img title=\"Nh&agrave; lều Angry birds\" src=\"https://www.petcity.vn/media/product/386_1_386_dem_angry_birds.jpg\" alt=\"Nh&agrave; lều Angry birds\" width=\"362\" height=\"347\" /></p>\r\n<p><img title=\"Nh&agrave; lều Angry birds\" src=\"https://www.petcity.vn/media/product/386_2_nha_leu_cho_meo_abcpet_angrybird_v1.jpg\" alt=\"Nh&agrave; lều Angry birds\" width=\"518\" height=\"389\" /></p>\r\n<p><img title=\"Nh&agrave; lều Angry birds\" src=\"https://www.petcity.vn/media/product/386_1_nha_leu_cho_meo_abcpet_angrybird_v2.jpg\" alt=\"Nh&agrave; lều Angry birds\" width=\"440\" height=\"329\" /></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -33px; top: 31.8889px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '2020-11-28 07:20:45', '2020-11-29 19:17:28'),
(11, 'Thức ăn cho mèo Me-o 350g', 'RpLAWhgJ', 'thuc-an-cho-meo-me-o-350g', NULL, 'erger', '/storage/produc/6/8IqWgpsVBbtLAZ95ABJm.jpg', 3456, 56, 'apple', '1520.64', 57, NULL, '7', '<p><strong>Th&ocirc;ng tin sản phẩm:</strong></p>\r\n<p>- Protein từ Sữa v&agrave; C&aacute; Biển gi&uacute;p ph&aacute;t triển cơ thể v&agrave; cơ bắp khỏe mạnh</p>\r\n<p>- Acid Amino cần thiết cho chức năng của mắt v&agrave; cải thiện thị gi&aacute;c của m&egrave;o</p>\r\n<p>- Tăng cường hệ thống miễn dịch v&agrave; gi&uacute;p giảm t&aacute;c động của stress l&ecirc;n sức khỏe của m&egrave;o</p>\r\n<p>- Canxi, Photpho v&agrave; Vitamin D gi&uacute;p l&agrave;m chắc răng v&agrave; xương</p>\r\n<p>- Flutd gi&uacute;p ngăn ngừa bệnh đường tiết niệu tr&ecirc;n m&egrave;o v&agrave; sỏi b&agrave;ng quang</p>\r\n<p>- Omega 3&amp;6 v&agrave; Kẽm từ dầu chất lượng cao trong hợp chất với kẽm gi&uacute;p nu&ocirc;i dưỡng t&oacute;c v&agrave; da m&egrave;o</p>\r\n<p>- C&ocirc;ng thức Natri thấp gi&uacute;p giảm nguy cơ cao huyết &aacute;p, bệnh thận v&agrave; tim ở M&egrave;o</p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/2193_ThcnMeothng350g.jpg\" alt=\"\" width=\"552\" height=\"552\" /></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -29px; top: -14px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '2020-11-28 07:21:24', '2020-11-29 19:20:02'),
(12, 'Petstar - Balo di chuyển phi hành gia', 'sDun8hwv', 'petstar-balo-di-chuyen-phi-hanh-gia', NULL, 'werwer', '/storage/produc/6/zyVn2uGjbtjqb6stkOti.jpg', 666666, 15, 'werewr', '464.09999999999997', 58, NULL, '2', '<p>Với sản phẩm n&agrave;y, ch&oacute; m&egrave;o cưng của bạn c&oacute; thể nh&igrave;n ra thế giới v&agrave; tận hưởng phong cảnh, nh&igrave;n ngắm b&ecirc;n ng&ograve;ai, tương t&aacute;c với thế giới b&ecirc;n ngo&agrave;i<br />Điểm đặc biệt của balo l&agrave; nhựa trong sang trọngSản phẩm được l&agrave;m từ những chất liệu th&acirc;n thiện, kh&ocirc;ng độc hại v&agrave; nhất l&agrave; dễ d&agrave;ng lau ch&ugrave;i khi b&aacute;m bẩn.</p>\r\n<p>Sản phẩm ph&ugrave; hợp cho vật nu&ocirc;i c&oacute; trọng lựơng dưới 6kg</p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/3757_balo-trong-vang.jpg\" alt=\"\" /></p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/3757_8727323850-1832263803.jpg\" alt=\"\" /></p>\r\n<p><img src=\"https://www.petcity.vn/media/lib/3757_8711494375-1832263803.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -137px; top: -14px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '2020-11-28 07:22:01', '2020-11-29 19:22:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_imgages`
--

CREATE TABLE `product_imgages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `productID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_imgages`
--

INSERT INTO `product_imgages` (`id`, `image`, `productID`, `created_at`, `updated_at`) VALUES
(26, '/storage/produc/6/haUDPv4SX4dFzl2FgHIU.jpg', 8, '2020-11-29 19:12:05', '2020-11-29 19:12:05'),
(27, '/storage/produc/6/wu5RWdL4hKfDKJ5hYkCB.jpg', 9, '2020-11-29 19:14:50', '2020-11-29 19:14:50'),
(28, '/storage/produc/6/9oPUNRqKTcgnuWAjRfWz.jpg', 10, '2020-11-29 19:17:28', '2020-11-29 19:17:28'),
(29, '/storage/produc/6/K3rOcnzASZ3QPeopIrn7.jpg', 11, '2020-11-29 19:20:02', '2020-11-29 19:20:02'),
(30, '/storage/produc/6/SXxVeeRN75pEhokKUSEc.jpg', 12, '2020-11-29 19:22:08', '2020-11-29 19:22:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(5, 'admin', 'quản trị', '2020-11-17 17:37:58', '2020-11-17 17:37:58'),
(6, 'edite', 'sửa', '2020-11-17 17:38:34', '2020-11-17 17:38:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'face-book', 'asdsdsd', 'Text', 1, '2020-11-16 10:16:38', '2020-11-16 10:16:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `descript` text NOT NULL,
  `title` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `image`, `descript`, `title`, `status`, `created_at`, `updated_at`) VALUES
(4, '/storage/slide/1/hLZDWAyqX4ZbAcEKXu3V.png', 'ád', 'áds', 1, '2020-11-15 09:59:36', '2020-11-25 00:25:49'),
(5, '/storage/slide/1/KJgrlhuvastfFczWxK8l.png', 'ád', 'ád', 1, '2020-11-15 09:59:42', '2020-11-15 09:59:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'tuan', '1@gmail.com', '2020-11-18 06:34:24', '$2y$10$kHgygoDDbhrfAyIQQX.Fxet3wqqfoqpKaaCuHkSSCTpb/Qe9KBCvK', '8nS57TgcgrpxlN54Md5JrDxAyfS9MT2Bwvin5yfXfIScAHUx9XriYcvKQVpx', 1, NULL, '2020-11-17 14:37:02'),
(6, 'tuan', '2@gmail.com', '2020-11-18 06:57:23', '$2y$10$9fB1TW2Cp2MCkU842R7QYuK.nlQgFzwgqgOmOaa3uUW9bU65lW8hu', NULL, 1, '2020-11-17 14:56:25', '2020-11-17 14:56:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `user_role`, `created_at`, `update_at`) VALUES
(3, 6, 1, NULL, NULL),
(4, 6, 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custommer`
--
ALTER TABLE `custommer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_content`
--
ALTER TABLE `news_content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_imgages`
--
ALTER TABLE `product_imgages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `custommer`
--
ALTER TABLE `custommer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news_content`
--
ALTER TABLE `news_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_imgages`
--
ALTER TABLE `product_imgages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
