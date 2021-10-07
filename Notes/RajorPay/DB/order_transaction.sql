-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2021 at 12:14 PM
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
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `transaction_id` int(11) NOT NULL,
  `withdraw_id` bigint(20) DEFAULT NULL,
  `payment_mode` enum('Online','Wallet','Bank Transfer') NOT NULL DEFAULT 'Online',
  `transaction_status` enum('Success','Failed','Pending') NOT NULL DEFAULT 'Pending',
  `order_id` int(11) DEFAULT NULL,
  `response` longtext,
  `amount` double(16,2) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`transaction_id`, `withdraw_id`, `payment_mode`, `transaction_status`, `order_id`, `response`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuEIG9aJREoCQ","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"8225491"},"created_at":1628251518}', 349.00, 'CR', '2021-08-06 12:05:23', '2021-08-06 12:05:23'),
(2, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuEIG9aJREoCQ","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"8225491"},"created_at":1628251518}', 349.00, 'CR', '2021-08-06 12:12:25', '2021-08-06 12:12:25'),
(3, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuEIG9aJREoCQ","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"8225491"},"created_at":1628251518}', 349.00, 'CR', '2021-08-06 12:12:38', '2021-08-06 12:12:38'),
(4, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 349.00, 'CR', '2021-08-06 12:13:56', '2021-08-06 12:13:56'),
(5, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuEIG9aJREoCQ","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"8225491"},"created_at":1628251518}', 349.00, 'CR', '2021-08-06 12:16:06', '2021-08-06 12:16:06'),
(6, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 349.00, 'CR', '2021-08-06 12:16:33', '2021-08-06 12:16:33'),
(7, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 349.00, 'CR', '2021-08-06 12:16:34', '2021-08-06 12:16:34'),
(8, NULL, 'Online', 'Success', 0, '{"id":"pay_HhuNKtObNaXcuD","entity":"payment","amount":34900,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"Your Charges Amount","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"rvrajniverma158@gmail.com","contact":"+917860603024","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"4312372"},"created_at":1628252031}', 349.00, 'CR', '2021-08-06 12:16:49', '2021-08-06 12:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
