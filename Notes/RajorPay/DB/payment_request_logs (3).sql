-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2021 at 01:42 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziggledb`
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
  `cuid` int(11) DEFAULT NULL,
  `mobile` int(20) DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_response` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_request_logs`
--

INSERT INTO `payment_request_logs` (`id`, `order_id`, `razorpay_order_id`, `amount`, `cuid`, `mobile`, `currency`, `razorpay_response`, `data`, `status`, `paid_amount`, `created_at`, `updated_at`) VALUES
(1, '216', 'order_HhtbzqgtqNzelj', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:29:03', '2021-08-06 11:29:03'),
(2, '216', 'order_HhtcLljUAJIs7Y', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:29:23', '2021-08-06 11:29:23'),
(3, '#041843', 'order_Hhtd4GEzzLmAdk', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:30:03', '2021-08-06 11:30:03'),
(4, '#029541', 'order_HhtgJ10DbkWfz7', 1999, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:33:07', '2021-08-06 11:33:07'),
(5, '#472857', 'order_Hhtl1tfn0UgMjt', 1999, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:37:36', '2021-08-06 11:37:36'),
(6, '#041843', 'order_HhtmngIc2G0Flz', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:39:16', '2021-08-06 11:39:16'),
(7, '216', 'order_HhtnFthjTU79lU', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:39:42', '2021-08-06 11:39:42'),
(8, '#772860', 'order_Hhtou5Hwwch8oE', 1999, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:41:16', '2021-08-06 11:41:16'),
(9, '#865585', 'order_Hhtqg9gaPLKlaK', 349, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:42:56', '2021-08-06 11:42:56'),
(10, '#885113', 'order_HhtrZCGAlqJvUE', 349, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:43:47', '2021-08-06 11:43:47'),
(11, '#496742', 'order_Hhtsx6ZsIdNyWE', 349, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:45:06', '2021-08-06 11:45:06'),
(12, '#994494', 'order_HhtulfWBfZWkf4', 349, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:46:49', '2021-08-06 11:46:49'),
(13, '216', 'order_Hhu2Zs9jTjjXzV', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:54:12', '2021-08-06 11:54:12'),
(14, '216', 'order_Hhu2nYdinprLte', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:54:25', '2021-08-06 11:54:25'),
(15, '216', 'order_Hhu3zkAYDSjnIQ', 100, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-06 11:55:33', '2021-08-06 11:55:33'),
(16, '#085652', 'order_HhuE7tV4Alu182', 349, NULL, NULL, 'INR', '"pay_HhuNKtObNaXcuD"', '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 'success', '0', '2021-08-06 12:05:08', '2021-08-06 12:16:33'),
(17, '#903719', 'order_HhuN7hhjBTciXj', 349, NULL, NULL, 'INR', '"pay_HhuNKtObNaXcuD"', '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 'success', '0', '2021-08-06 12:13:39', '2021-08-06 12:13:56'),
(18, '#675799', 'order_Hj04IMEAffH6q4', 1999, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-09 06:27:00', '2021-08-09 06:27:00'),
(19, '1628078336', 'order_Hj3pvSheDcIrC0', 1001, NULL, NULL, 'INR', '"pay_Hj1HCcf0o8S0F3"', '{"error":{"code":"BAD_REQUEST_ERROR","description":"The id provided does not exist","source":"NA","step":"NA","reason":"NA","metadata":[]}}', 'pending', '0', '2021-08-09 10:08:10', '2021-08-09 10:49:04'),
(20, '1628078336', 'order_Hj3x27wuQ5jLfU', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-09 10:14:54', '2021-08-09 10:14:54'),
(21, '1628078336', 'order_Hj4HKiF5dFuoyH', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-09 10:34:07', '2021-08-09 10:34:07'),
(22, '1628078336', 'order_HjODWNbTgJYWgD', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 06:04:22', '2021-08-10 06:04:22'),
(23, '1628078336', 'order_HjOqQyS18jkRGV', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 06:41:13', '2021-08-10 06:41:13'),
(24, '#004482', 'order_HjPdlXCipyC4LF', 1759, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 07:27:55', '2021-08-10 07:27:55'),
(25, '#803170', 'order_HjPfSszzsMguQY', 1759, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 07:29:31', '2021-08-10 07:29:31'),
(26, '#207618', 'order_HjPh0mHI5ieVgy', 1539, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 07:30:59', '2021-08-10 07:30:59'),
(27, '#723258', 'order_HjPp2fmmsX9HhT', 1539, NULL, NULL, 'INR', '"pay_HjPpH3w6n41F9U"', '{"error":{"code":"BAD_REQUEST_ERROR","description":"The id provided does not exist","source":"NA","step":"NA","reason":"NA","metadata":[]}}', 'pending', '0', '2021-08-10 07:38:35', '2021-08-10 07:50:45'),
(28, '1628078336', 'order_HjQ0tOU9RMpBaW', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 07:49:48', '2021-08-10 07:49:48'),
(29, '1628078336', 'order_HjQ1MQysmDRajC', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 07:50:15', '2021-08-10 07:50:15'),
(30, '#707073', 'order_HjQHYZnkzh6vJv', 1539, NULL, NULL, 'INR', '"pay_Hh8yUil1wciBaw"', '{"id":"pay_Hh8yUil1wciBaw","entity":"payment","amount":2000,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1581996@gmail.com","contact":"+919792872635","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"7083328"},"created_at":1628085105}', 'success', '0', '2021-08-10 08:05:35', '2021-08-10 09:52:02'),
(31, '1628078336', 'order_HjQmnXGf9gL9v0', 1001, NULL, NULL, 'INR', NULL, NULL, 'pending', '0', '2021-08-10 08:35:09', '2021-08-10 08:35:09'),
(32, '#203747', 'order_HjS8jQ2igBee7G', 1759, NULL, NULL, 'INR', '"pay_HjS8tsqyxEyYJ4"', '{"id":"pay_HjS8tsqyxEyYJ4","entity":"payment","amount":175890,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1588@gmail.com","contact":"+918303538929","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"7726052"},"created_at":1628589287}', 'success', '0', '2021-08-10 09:54:37', '2021-08-10 09:54:52'),
(33, '#198917', 'order_HjSMoaKjLdpmth', 1539, NULL, NULL, 'INR', '"pay_HjSOKGb4m81KXP"', '{"id":"pay_HjSOKGb4m81KXP","entity":"payment","amount":153890,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1588@gmail.com","contact":"+918303538929","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"9545134"},"created_at":1628590163}', 'success', '0', '2021-08-10 10:07:57', '2021-08-10 10:09:27'),
(34, '#048309', 'order_HjnEedSITl2419', 1539, NULL, NULL, 'INR', '"pay_HjnErXHkJMqoRb"', '{"id":"pay_HjnErXHkJMqoRb","entity":"payment","amount":153890,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1588@gmail.com","contact":"+918303538929","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"5704725"},"created_at":1628663579}', 'success', '0', '2021-08-11 06:32:47', '2021-08-11 06:33:03'),
(35, '#857710', 'order_HjnGv4W8AGl2E6', 1539, NULL, NULL, 'INR', '"pay_HjnH7MVSvfTovX"', '{"id":"pay_HjnH7MVSvfTovX","entity":"payment","amount":153890,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1588@gmail.com","contact":"+918303538929","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"5762310"},"created_at":1628663707}', 'success', '0', '2021-08-11 06:34:56', '2021-08-11 06:35:12'),
(36, '#79911531372', 'order_HjoBM7a7gd6ExL', 1001, NULL, NULL, 'INR', '"pay_Hh8yUil1wciBaw"', '{"id":"pay_Hh8yUil1wciBaw","entity":"payment","amount":2000,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1581996@gmail.com","contact":"+919792872635","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"7083328"},"created_at":1628085105}', 'success', '0', '2021-08-11 07:28:21', '2021-08-11 07:29:13'),
(37, '1628078336', 'order_HjojHX7lN3LmEc', 1001, 111, 2147483647, 'INR', '"pay_Hh8yUil1wciBaw"', '{"id":"pay_Hh8yUil1wciBaw","entity":"payment","amount":2000,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rajni1581996@gmail.com","contact":"+919792872635","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"7083328"},"created_at":1628085105}', 'success', '20', '2021-08-11 08:00:28', '2021-08-11 08:05:39');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
