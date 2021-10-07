-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2021 at 12:13 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutry`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_request_logs`
--

CREATE TABLE `payment_request_logs` (
  `id` int(11) NOT NULL,
  `order_id` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_order_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_response` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_request_logs`
--

INSERT INTO `payment_request_logs` (`id`, `order_id`, `razorpay_order_id`, `amount`, `currency`, `razorpay_response`, `data`, `status`, `created_at`, `updated_at`) VALUES
(1, '216', 'order_HhtbzqgtqNzelj', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:29:03', '2021-08-06 11:29:03'),
(2, '216', 'order_HhtcLljUAJIs7Y', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:29:23', '2021-08-06 11:29:23'),
(3, '#041843', 'order_Hhtd4GEzzLmAdk', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:30:03', '2021-08-06 11:30:03'),
(4, '#029541', 'order_HhtgJ10DbkWfz7', 1999, 'INR', NULL, NULL, 'pending', '2021-08-06 11:33:07', '2021-08-06 11:33:07'),
(5, '#472857', 'order_Hhtl1tfn0UgMjt', 1999, 'INR', NULL, NULL, 'pending', '2021-08-06 11:37:36', '2021-08-06 11:37:36'),
(6, '#041843', 'order_HhtmngIc2G0Flz', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:39:16', '2021-08-06 11:39:16'),
(7, '216', 'order_HhtnFthjTU79lU', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:39:42', '2021-08-06 11:39:42'),
(8, '#772860', 'order_Hhtou5Hwwch8oE', 1999, 'INR', NULL, NULL, 'pending', '2021-08-06 11:41:16', '2021-08-06 11:41:16'),
(9, '#865585', 'order_Hhtqg9gaPLKlaK', 349, 'INR', NULL, NULL, 'pending', '2021-08-06 11:42:56', '2021-08-06 11:42:56'),
(10, '#885113', 'order_HhtrZCGAlqJvUE', 349, 'INR', NULL, NULL, 'pending', '2021-08-06 11:43:47', '2021-08-06 11:43:47'),
(11, '#496742', 'order_Hhtsx6ZsIdNyWE', 349, 'INR', NULL, NULL, 'pending', '2021-08-06 11:45:06', '2021-08-06 11:45:06'),
(12, '#994494', 'order_HhtulfWBfZWkf4', 349, 'INR', NULL, NULL, 'pending', '2021-08-06 11:46:49', '2021-08-06 11:46:49'),
(13, '216', 'order_Hhu2Zs9jTjjXzV', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:54:12', '2021-08-06 11:54:12'),
(14, '216', 'order_Hhu2nYdinprLte', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:54:25', '2021-08-06 11:54:25'),
(15, '216', 'order_Hhu3zkAYDSjnIQ', 100, 'INR', NULL, NULL, 'pending', '2021-08-06 11:55:33', '2021-08-06 11:55:33'),
(16, '#085652', 'order_HhuE7tV4Alu182', 349, 'INR', '"pay_HhuNKtObNaXcuD"', '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 'success', '2021-08-06 12:05:08', '2021-08-06 12:16:33'),
(17, '#903719', 'order_HhuN7hhjBTciXj', 349, 'INR', '"pay_HhuNKtObNaXcuD"', '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 'success', '2021-08-06 12:13:39', '2021-08-06 12:13:56'),
(18, '#675799', 'order_Hj04IMEAffH6q4', 1999, 'INR', NULL, NULL, 'pending', '2021-08-09 06:27:00', '2021-08-09 06:27:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_request_logs`
--
ALTER TABLE `payment_request_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_request_logs`
--
ALTER TABLE `payment_request_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
