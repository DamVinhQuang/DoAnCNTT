SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(18, 'foodmin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `note` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `pro_id`, `pro_name`, `quantity`, `address`, `phone`, `status`, `total`, `note`, `date_create`) VALUES
(61, 14, 18, 'Dâu tây đỏ ngọt (kg)', 1, 'Man Thiện, Long Thạnh Mỹ, Quận 9, Thành phố Thủ Đức', '0937711229', 0, 105000, 'Lựa trái nào ngọt á nha', '2022-11-18 13:42:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Bánh bông lan tình yêu', 18, 2, 350000, 'banh-bong-lan.jpg', 'Bánh bông lan trứng muối 20cm hình trái tim dễ thương tặng Vợ iu.Khuyến mại đèn cầy và 1 bộ dao thìa.', 1, '2021-10-22 04:15:10'),
(53, 'Bắp cải trắng (kg)', 18, 3, 25000, 'bap-cai-trang.jpg', 'Giá trị dinh dưỡng của Bắp cải trắng – Theo các chuyên gia dinh dưỡng, trong 100g bắp cải trắng chỉ chứa khoảng 27 calo ngoài ra nó còn có rất nhiều các thành phần khác như: 90g nước, 1.8g chất đạm, 5.4g tinh bột, 1.6g chất xơ, 6% vitamin B6, 7% mangan, 54%…', 0, '2022-11-18 08:20:02'),
(54, 'Cà rốt Đà Lạt (kg)', 18, 3, 36000, 'ca-rot-da-lat.jpg', ' Cà rốt có hàm lượng chất dinh dưỡng và vitamin A cao, được xem là nguyên liệu cần thiết cho các món ăn dặm của trẻ nhỏ, giúp trẻ sáng mắt và cung cấp nguồn chất xơ dồi dào.', 0, '2022-11-18 08:19:55'),
(55, 'Cà chua beef (kg)', 18, 3, 30000, 'ca-chua-beef.jpg', 'Cà chua là loại rau củ rất tốt cho sức khoẻ nhờ chứa nhiều dinh dưỡng đặc biệt là vitamin A, C, K ngoài ra loại quả này còn giúp làm đẹp da cho phái nữ rất tốt.', 0, '2022-11-18 08:19:46'),
(3, 'Chanh không hạt (kg)', 18, 3, 25000, 'chanh-khong-hat.jpg', 'Chanh to trái, tròn và mọng nước,có vị chua đậm đà cho nhiều món ăn hay nước uống, khiến cho nhiều người thích mê.', 0, '2022-11-18 08:22:41'),
(5, 'Bánh kem dâu', 18, 2, 120000, 'banh-kem-dau-tay.jpg', 'Bánh kem dâu tây với lớp kem và mứt thơm ngon, khó cưỡng', 1, '2022-11-18 08:22:28'),
(7, 'Xà lách xoong Đà Lạt (kg)', 18, 3, 39000, 'xa-lach-xoong-da-lat.jpg', 'Rau xà lách xoong Đà Lạt có hương vị tươi mát, ngon ngọt được nhiều người tiêu dùng ưa chuộng.', 1, '2022-11-18 08:22:20'),
(11, 'Mận An Phước (kg)', 18, 1, 45000, 'man-an-phuoc.jpg', 'Mận An Phước chín đỏ mọng đẹp mắt, màu sắc hấp dẫn, vị chua ngọt vừa phải dễ chịu', 1, '2022-11-18 08:22:12'),
(12, 'Bánh kem mô hình máy bay', 18, 2, 320000, 'banh-kem-mo-hinh-may-bay.jpg', 'Bánh kem hình máy bay được tạo hình từ cốt bánh kích thước 20x30cm.', 1, '2022-11-18 08:21:53'),
(13, 'Rau muống nước (kg)', 18, 3, 28000, 'rau-muong-nuoc.jpg', 'Rau muống nước được trồng và đóng gói theo những tiêu chuẩn nghiêm ngặt, bảo đảm các tiêu chuẩn xanh - sach, chất lượng và an toàn với người dùng.', 1, '2022-11-18 08:21:34'),
(16, 'Chuối già giống Nam Mỹ (kg)', 18, 1, 120000, 'chuoi.jpg', 'Chuối ăn ngon nhất khi chín vàng, trên vỏ bắt đầu có đốm nâu, khi đó chuối sẽ rất ngọt.', 1, '2022-11-18 08:21:23'),
(17, 'Bánh kem sân bóng', 18, 2, 550000, 'banh-kem-the-thao.jpg', 'Bánh kem sân bóng kích thước 20cm cho ai đam mê môn thể thao đá bóng.Khuyến mại đèn cầy và 1 bộ dao thìa.', 1, '2022-11-18 08:21:15'),
(18, 'Dâu bi Đà Lạt (kg)', 18, 1, 150000, 'dau_bi_dalat.jpg', '- Dâu sạch Thời Thìn được trồng theo phương pháp thuỷ canh trong môi trường khép kín cho chất lượng vượt trội đồng thời với phương pháp hiện đại hoàn toàn tránh được dịch bệnh, côn trùng cũng như hạn...', 1, '2022-11-18 08:21:01'),
(21, 'Táo Diva mini New Zealand (kg)', 18, 1, 52000, 'tao-diva-mini.jpg', 'Táo Diva mini là trái cây được nhập khẩu trực tiếp từ New Zealand.', 0, '2022-11-18 08:20:52'),
(22, 'Bánh kem Matcha', 18, 2, 600000, 'banhkemmatcha.jpg', 'Bánh kem matcha trà xanh, cực kỳ thơm ngon. Được khá nhiều người ưa chuộng', 1, '2022-11-18 08:22:01'),
(23, 'Khổ qua (kg)', 18, 3, 29000, 'kho-qua.jpg', 'Khổ qua hay mướp đắng là thực phẩm quen thuộc trong thực đơn hàng tuần của các bà nội trợ.', 1, '2022-11-18 08:20:15'),
(56, 'Bưởi da xanh (kg)', 18, 1, 50000, 'buoi-da-xanh.jpg', 'Bưởi Da xanh là trái cây đặc sản nổi tiếng của Việt Nam. Bưởi da xanh có đặc điểm vỏ có màu xanh đến xanh hơi vàng khi chín', 0, '2022-11-18 08:19:33'),
(57, 'Lê đường (kg)', 18, 1, 190000, 'le-duong.jpg', 'Lê đường được nhập khẩu từ Trung Quốc với đầy đủ các tiêu chuẩn chất lượng. Đặc điểm của lê là giòn, ngọt và mọng nước', 0, '2022-11-18 08:18:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Trái cây tươi'),
(2, 'Bánh kem ngọt'),
(3, 'Rau củ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `Sell_number` int(11) NOT NULL,
  `Import_quantity` int(11) NOT NULL,
  `Import_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `Sell_number`, `Import_quantity`, `Import_date`) VALUES
(2, 300, 1200, '2021-11-12 01:41:19'),
(3, 1200, 2000, '2021-11-12 01:42:44'),
(4, 100, 1000, '2021-11-12 01:43:12'),
(5, 700, 1500, '2021-11-12 01:43:38'),
(6, 100, 500, '2021-11-12 01:44:04'),
(7, 600, 1000, '2021-11-12 01:44:30'),
(8, 170, 300, '2021-11-12 01:44:52'),
(9, 100, 500, '2021-11-12 01:45:20'),
(10, 150, 400, '2021-11-19 12:29:46'),
(11, 160, 300, '2021-11-19 12:32:39'),
(12, 200, 500, '2021-11-19 12:32:54'),
(13, 320, 540, '2021-11-19 12:33:05'),
(14, 250, 350, '2021-11-19 12:33:17'),
(15, 700, 1000, '2021-11-19 12:33:34'),
(16, 300, 600, '2021-11-19 12:33:49'),
(17, 100, 200, '2021-11-19 12:34:01'),
(18, 500, 1000, '2021-12-14 02:25:29'),
(19, 300, 1250, '2021-12-14 02:25:29'),
(20, 400, 700, '2021-12-14 02:26:09'),
(21, 150, 500, '2021-12-14 02:26:30'),
(22, 190, 700, '2021-12-14 02:26:43'),
(23, 250, 800, '2021-12-14 02:26:58'),
(24, 800, 2000, '2021-12-14 02:27:10'),
(25, 300, 750, '2021-12-14 02:27:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `First_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `image`, `First_name`, `Last_name`, `phone`, `username`, `password`, `role_id`) VALUES
(1, 'avatar1.png', 'admin', 'name', 12345, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'avatar4.png', 'user', 'name', 123456, 'user123', '202cb962ac59075b964b07152d234b70', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
