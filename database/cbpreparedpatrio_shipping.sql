-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2019 at 08:55 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbpreparedpatrio_shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

DROP TABLE IF EXISTS `1`;
CREATE TABLE `1` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `2`
--

DROP TABLE IF EXISTS `2`;
CREATE TABLE `2` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `3`
--

DROP TABLE IF EXISTS `3`;
CREATE TABLE `3` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `4`
--

DROP TABLE IF EXISTS `4`;
CREATE TABLE `4` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5`
--

DROP TABLE IF EXISTS `5`;
CREATE TABLE `5` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT '',
  `lastName` varchar(250) DEFAULT '',
  `fullName` varchar(250) DEFAULT '',
  `phoneNumber` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

DROP TABLE IF EXISTS `billing_address`;
CREATE TABLE `billing_address` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `state` varchar(250) DEFAULT '',
  `postalCode` varchar(250) DEFAULT '',
  `country` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_ship`
--

DROP TABLE IF EXISTS `daily_ship`;
CREATE TABLE `daily_ship` (
  `id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty01` int(11) DEFAULT NULL,
  `qty02` int(11) DEFAULT NULL,
  `qty03` int(11) DEFAULT NULL,
  `qty04` int(11) DEFAULT NULL,
  `qty05` int(11) DEFAULT NULL,
  `qty06` int(11) DEFAULT NULL,
  `qty07` int(11) DEFAULT NULL,
  `qty08` int(11) DEFAULT NULL,
  `qty09` int(11) DEFAULT NULL,
  `qty10` int(11) DEFAULT NULL,
  `qty11` int(11) DEFAULT NULL,
  `qty12` int(11) DEFAULT NULL,
  `qty13` int(11) DEFAULT NULL,
  `qty14` int(11) DEFAULT NULL,
  `qty30` int(11) DEFAULT NULL,
  `totalsold` int(11) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_ship_con`
--

DROP TABLE IF EXISTS `daily_ship_con`;
CREATE TABLE `daily_ship_con` (
  `id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty01` int(11) DEFAULT NULL,
  `qty02` int(11) DEFAULT NULL,
  `qty03` int(11) DEFAULT NULL,
  `qty04` int(11) DEFAULT NULL,
  `qty05` int(11) DEFAULT NULL,
  `qty06` int(11) DEFAULT NULL,
  `qty07` int(11) DEFAULT NULL,
  `qty08` int(11) DEFAULT NULL,
  `qty09` int(11) DEFAULT NULL,
  `qty10` int(11) DEFAULT NULL,
  `qty11` int(11) DEFAULT NULL,
  `qty12` int(11) DEFAULT NULL,
  `qty13` int(11) DEFAULT NULL,
  `qty14` int(11) DEFAULT NULL,
  `qty30` int(11) DEFAULT NULL,
  `totalsold` int(11) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_ship_is`
--

DROP TABLE IF EXISTS `daily_ship_is`;
CREATE TABLE `daily_ship_is` (
  `id` int(11) NOT NULL,
  `sku_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty01` int(11) DEFAULT NULL,
  `qty02` int(11) DEFAULT NULL,
  `qty03` int(11) DEFAULT NULL,
  `qty04` int(11) DEFAULT NULL,
  `qty05` int(11) DEFAULT NULL,
  `qty06` int(11) DEFAULT NULL,
  `qty07` int(11) DEFAULT NULL,
  `qty08` int(11) DEFAULT NULL,
  `qty09` int(11) DEFAULT NULL,
  `qty10` int(11) DEFAULT NULL,
  `qty11` int(11) DEFAULT NULL,
  `qty12` int(11) DEFAULT NULL,
  `qty13` int(11) DEFAULT NULL,
  `qty14` int(11) DEFAULT NULL,
  `qty30` int(11) DEFAULT NULL,
  `totalsold` int(11) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_ship_is_con`
--

DROP TABLE IF EXISTS `daily_ship_is_con`;
CREATE TABLE `daily_ship_is_con` (
  `id` int(11) NOT NULL,
  `sku_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty01` int(11) DEFAULT NULL,
  `qty02` int(11) DEFAULT NULL,
  `qty03` int(11) DEFAULT NULL,
  `qty04` int(11) DEFAULT NULL,
  `qty05` int(11) DEFAULT NULL,
  `qty06` int(11) DEFAULT NULL,
  `qty07` int(11) DEFAULT NULL,
  `qty08` int(11) DEFAULT NULL,
  `qty09` int(11) DEFAULT NULL,
  `qty10` int(11) DEFAULT NULL,
  `qty11` int(11) DEFAULT NULL,
  `qty12` int(11) DEFAULT NULL,
  `qty13` int(11) DEFAULT NULL,
  `qty14` int(11) DEFAULT NULL,
  `qty30` int(11) DEFAULT NULL,
  `totalsold` int(11) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hopfeed`
--

DROP TABLE IF EXISTS `hopfeed`;
CREATE TABLE `hopfeed` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `hopfeedClickId` varchar(250) DEFAULT '',
  `hopfeedApplicationId` varchar(250) DEFAULT '',
  `hopfeedCreativeId` varchar(250) DEFAULT '',
  `hopfeedApplicationPayout` varchar(250) DEFAULT '',
  `hopfeedVendorPayout` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `is_pwcp_active`
--

DROP TABLE IF EXISTS `is_pwcp_active`;
CREATE TABLE `is_pwcp_active` (
  `d` int(6) DEFAULT NULL,
  `lnk_name` varchar(200) NOT NULL,
  `ContactId` int(6) DEFAULT NULL,
  `Contact` varchar(22) DEFAULT NULL,
  `FirstName` varchar(13) DEFAULT NULL,
  `LastName` varchar(12) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `Co Name` varchar(10) DEFAULT NULL,
  `Street Address 1` varchar(33) DEFAULT NULL,
  `Street Address 2` varchar(20) DEFAULT NULL,
  `City` varchar(18) DEFAULT NULL,
  `State` varchar(8) DEFAULT NULL,
  `Postal Code` varchar(8) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Order Type` varchar(7) DEFAULT NULL,
  `Promo Code` varchar(10) DEFAULT NULL,
  `Order Id` int(6) DEFAULT NULL,
  `OrderTitle` varchar(39) DEFAULT NULL,
  `OrderDate` varchar(9) DEFAULT NULL,
  `Product Ids` int(3) DEFAULT NULL,
  `ProductName` varchar(43) DEFAULT NULL,
  `Serial` varchar(10) DEFAULT NULL,
  `Order Total` varchar(5) DEFAULT NULL,
  `Invoice Id` int(6) DEFAULT NULL,
  `Affiliate Id` int(1) DEFAULT NULL,
  `Tag Ids` varchar(261) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `is_pwcp_inactive`
--

DROP TABLE IF EXISTS `is_pwcp_inactive`;
CREATE TABLE `is_pwcp_inactive` (
  `d` int(6) DEFAULT NULL,
  `lnk_name` varchar(200) NOT NULL,
  `ContactId` int(6) DEFAULT NULL,
  `Contact` varchar(19) DEFAULT NULL,
  `FirstName` varchar(9) DEFAULT NULL,
  `LastName` varchar(11) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `Co Name` varchar(10) DEFAULT NULL,
  `Street Address 1` varchar(23) DEFAULT NULL,
  `Street Address 2` varchar(15) DEFAULT NULL,
  `City` varchar(16) DEFAULT NULL,
  `State` varchar(3) DEFAULT NULL,
  `Postal Code` varchar(7) DEFAULT NULL,
  `Country` varchar(17) DEFAULT NULL,
  `Order Type` varchar(7) DEFAULT NULL,
  `Promo Code` varchar(10) DEFAULT NULL,
  `Order Id` int(6) DEFAULT NULL,
  `Order Title` varchar(39) DEFAULT NULL,
  `Order Date` varchar(9) DEFAULT NULL,
  `Product Ids` int(3) DEFAULT NULL,
  `Product Name` varchar(43) DEFAULT NULL,
  `Serial` varchar(10) DEFAULT NULL,
  `Order Total` varchar(6) DEFAULT NULL,
  `Invoice Id` int(6) DEFAULT NULL,
  `Affiliate Id` int(1) DEFAULT NULL,
  `Tag Ids` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lineItems`
--

DROP TABLE IF EXISTS `lineItems`;
CREATE TABLE `lineItems` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `itemNo` varchar(250) DEFAULT '',
  `productTitle` varchar(250) DEFAULT '',
  `shippable` varchar(250) DEFAULT '',
  `recurring` varchar(250) DEFAULT '',
  `accountAmount` varchar(250) DEFAULT '',
  `quantity` varchar(250) DEFAULT '',
  `lineItemType` varchar(250) DEFAULT '',
  `productPrice` varchar(250) DEFAULT '',
  `productDiscount` varchar(250) DEFAULT '',
  `taxAmount` varchar(250) DEFAULT '',
  `shippingAmount` varchar(250) DEFAULT '',
  `shippingLiable` varchar(250) DEFAULT '',
  `rebillStatus` varchar(250) DEFAULT '',
  `rebillFrequency` varchar(250) DEFAULT '',
  `paymentsProcessed` varchar(250) DEFAULT '',
  `paymentsRemaining` varchar(250) DEFAULT '',
  `nextPaymentDate` varchar(250) DEFAULT '',
  `downloadUrl` varchar(250) DEFAULT '',
  `affiliatePayout` varchar(250) DEFAULT '',
  `rebillAmount` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transactionTime` varchar(250) DEFAULT '',
  `receipt` varchar(250) DEFAULT '',
  `transactionType` varchar(250) DEFAULT '',
  `vendor` varchar(250) DEFAULT '',
  `affiliate` varchar(250) DEFAULT '',
  `role` varchar(250) DEFAULT '',
  `totalAccountAmount` varchar(250) DEFAULT '',
  `paymentMethod` varchar(250) DEFAULT '',
  `totalOrderAmount` varchar(250) DEFAULT '',
  `totalTaxAmount` varchar(250) DEFAULT '',
  `totalShippingAmount` varchar(250) DEFAULT '',
  `currency` varchar(250) DEFAULT '',
  `orderLanguage` varchar(250) DEFAULT '',
  `version` varchar(250) DEFAULT '',
  `attemptCount` varchar(250) DEFAULT '',
  `posted` tinyint(4) NOT NULL DEFAULT '0',
  `declinedConsent` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentPlan`
--

DROP TABLE IF EXISTS `paymentPlan`;
CREATE TABLE `paymentPlan` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `rebillStatus` varchar(250) DEFAULT '',
  `rebillFrequency` varchar(250) DEFAULT '',
  `paymentsProcessed` varchar(250) DEFAULT '',
  `paymentsRemaining` varchar(250) DEFAULT '',
  `nextPaymentDate` varchar(250) DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rebillAmount` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_`
--

DROP TABLE IF EXISTS `pigman_`;
CREATE TABLE `pigman_` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `itemNo` varchar(250) DEFAULT '',
  `productTitle` varchar(250) DEFAULT '',
  `shippable` varchar(250) DEFAULT '',
  `recurring` varchar(250) DEFAULT '',
  `accountAmount` varchar(250) DEFAULT '',
  `quantity` varchar(250) DEFAULT '',
  `rebillStatus` varchar(250) DEFAULT '',
  `rebillFrequency` varchar(250) DEFAULT '',
  `rebillAmount` varchar(250) DEFAULT '',
  `paymentsProcessed` varchar(250) DEFAULT '',
  `paymentsRemaining` varchar(250) DEFAULT '',
  `nextPaymentDate` varchar(250) DEFAULT '',
  `downloadUrl` varchar(250) DEFAULT '',
  `lineItemType` varchar(250) DEFAULT '',
  `productPrice` varchar(250) DEFAULT '',
  `productDiscount` varchar(250) DEFAULT '',
  `affiliatePayout` varchar(250) DEFAULT '',
  `taxAmount` varchar(250) DEFAULT '',
  `shippingAmount` varchar(250) DEFAULT '',
  `shippingLiable` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_billing`
--

DROP TABLE IF EXISTS `pigman_billing`;
CREATE TABLE `pigman_billing` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT '',
  `lastName` varchar(250) DEFAULT '',
  `fullName` varchar(250) DEFAULT '',
  `phoneNumber` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_billing_address`
--

DROP TABLE IF EXISTS `pigman_billing_address`;
CREATE TABLE `pigman_billing_address` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `state` varchar(250) DEFAULT '',
  `postalCode` varchar(250) DEFAULT '',
  `country` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_lineItems`
--

DROP TABLE IF EXISTS `pigman_lineItems`;
CREATE TABLE `pigman_lineItems` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `itemNo` varchar(250) DEFAULT '',
  `productTitle` varchar(250) DEFAULT '',
  `shippable` varchar(250) DEFAULT '',
  `recurring` varchar(250) DEFAULT '',
  `accountAmount` varchar(250) DEFAULT '',
  `quantity` varchar(250) DEFAULT '',
  `lineItemType` varchar(250) DEFAULT '',
  `productPrice` varchar(250) DEFAULT '',
  `productDiscount` varchar(250) DEFAULT '',
  `taxAmount` varchar(250) DEFAULT '',
  `shippingAmount` varchar(250) DEFAULT '',
  `shippingLiable` varchar(250) DEFAULT '',
  `rebillStatus` varchar(250) DEFAULT '',
  `rebillFrequency` varchar(250) DEFAULT '',
  `rebillAmount` varchar(250) DEFAULT '',
  `paymentsProcessed` varchar(250) DEFAULT '',
  `paymentsRemaining` varchar(250) DEFAULT '',
  `nextPaymentDate` varchar(250) DEFAULT '',
  `downloadUrl` varchar(250) DEFAULT '',
  `affiliatePayout` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_notifications`
--

DROP TABLE IF EXISTS `pigman_notifications`;
CREATE TABLE `pigman_notifications` (
  `id` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transactionTime` varchar(250) DEFAULT '',
  `receipt` varchar(250) DEFAULT '',
  `transactionType` varchar(250) DEFAULT '',
  `vendor` varchar(250) DEFAULT '',
  `affiliate` varchar(250) DEFAULT '',
  `role` varchar(250) DEFAULT '',
  `totalAccountAmount` varchar(250) DEFAULT '',
  `paymentMethod` varchar(250) DEFAULT '',
  `totalOrderAmount` varchar(250) DEFAULT '',
  `totalTaxAmount` varchar(250) DEFAULT '',
  `totalShippingAmount` varchar(250) DEFAULT '',
  `currency` varchar(250) DEFAULT '',
  `orderLanguage` varchar(250) DEFAULT '',
  `version` varchar(250) DEFAULT '',
  `attemptCount` varchar(250) DEFAULT '',
  `posted` tinyint(4) NOT NULL DEFAULT '0',
  `declinedConsent` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_shipping`
--

DROP TABLE IF EXISTS `pigman_shipping`;
CREATE TABLE `pigman_shipping` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT '',
  `lastName` varchar(250) DEFAULT '',
  `fullName` varchar(250) DEFAULT '',
  `phoneNumber` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_shipping_address`
--

DROP TABLE IF EXISTS `pigman_shipping_address`;
CREATE TABLE `pigman_shipping_address` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `address1` varchar(250) DEFAULT '',
  `address2` varchar(250) DEFAULT '',
  `city` varchar(250) DEFAULT '',
  `county` varchar(250) DEFAULT '',
  `state` varchar(250) DEFAULT '',
  `postalCode` varchar(250) DEFAULT '',
  `country` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_sku_ho_goal`
--

DROP TABLE IF EXISTS `pigman_sku_ho_goal`;
CREATE TABLE `pigman_sku_ho_goal` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(1000) NOT NULL,
  `goal_id` int(255) NOT NULL,
  `offer_id` int(255) NOT NULL,
  `type` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_trackingCodes`
--

DROP TABLE IF EXISTS `pigman_trackingCodes`;
CREATE TABLE `pigman_trackingCodes` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `trackingCodes` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_transactionType`
--

DROP TABLE IF EXISTS `pigman_transactionType`;
CREATE TABLE `pigman_transactionType` (
  `id` int(11) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_upsell`
--

DROP TABLE IF EXISTS `pigman_upsell`;
CREATE TABLE `pigman_upsell` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `upsellFlowId` varchar(250) DEFAULT '',
  `upsellSession` varchar(250) DEFAULT '',
  `upsellOriginalReceipt` varchar(250) DEFAULT '',
  `upsellPath` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pigman_vendorVariables`
--

DROP TABLE IF EXISTS `pigman_vendorVariables`;
CREATE TABLE `pigman_vendorVariables` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `cbitems` varchar(250) DEFAULT '',
  `cbrblaccpt` varchar(250) DEFAULT '',
  `cbfid` varchar(250) DEFAULT '',
  `cbskin` varchar(250) DEFAULT '',
  `utm_source` varchar(250) DEFAULT '',
  `utm_campaign` varchar(250) DEFAULT '',
  `hop` varchar(250) DEFAULT '',
  `p` varchar(250) DEFAULT '',
  `utm_tid` varchar(250) DEFAULT '',
  `offer_id` varchar(250) DEFAULT '',
  `partner_id` varchar(250) DEFAULT '',
  `aff_sub` varchar(250) DEFAULT '',
  `cupsellreceipt` varchar(250) DEFAULT '',
  `cbur` varchar(250) DEFAULT '',
  `cbf` varchar(250) DEFAULT '',
  `lm` varchar(250) DEFAULT '',
  `firstname` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `fa_validate` varchar(250) DEFAULT '',
  `aff` varchar(250) DEFAULT '',
  `cookieUUID` varchar(250) DEFAULT '',
  `contestname` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT '',
  `lastName` varchar(250) DEFAULT '',
  `fullName` varchar(250) DEFAULT '',
  `phoneNumber` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `address1` varchar(250) DEFAULT '',
  `address2` varchar(250) DEFAULT '',
  `city` varchar(250) DEFAULT '',
  `county` varchar(250) DEFAULT '',
  `state` varchar(250) DEFAULT '',
  `postalCode` varchar(250) DEFAULT '',
  `country` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skus`
--

DROP TABLE IF EXISTS `skus`;
CREATE TABLE `skus` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(100) DEFAULT '',
  `prodName` varchar(250) DEFAULT '',
  `prodQty` int(11) NOT NULL,
  `prodType` varchar(100) DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodCode_grp` varchar(50) NOT NULL,
  `prodName_grp` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'activated',
  `prodName_common` varchar(250) DEFAULT NULL,
  `prodCode_other` varchar(100) DEFAULT NULL,
  `campaign_id` varchar(250) DEFAULT NULL,
  `tag_name` varchar(250) DEFAULT NULL,
  `goal_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skus_backup`
--

DROP TABLE IF EXISTS `skus_backup`;
CREATE TABLE `skus_backup` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(100) DEFAULT '',
  `prodName` varchar(250) DEFAULT '',
  `prodQty` int(11) NOT NULL,
  `prodType` varchar(100) DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodCode_grp` varchar(50) NOT NULL,
  `prodName_grp` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'activated',
  `prodName_common` varchar(250) DEFAULT NULL,
  `prodCode_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skus_balance`
--

DROP TABLE IF EXISTS `skus_balance`;
CREATE TABLE `skus_balance` (
  `onhand` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `sku_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prodName_common` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus_balance_is`
--

DROP TABLE IF EXISTS `skus_balance_is`;
CREATE TABLE `skus_balance_is` (
  `onhand` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prodName_common` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus_balance_is_con`
--

DROP TABLE IF EXISTS `skus_balance_is_con`;
CREATE TABLE `skus_balance_is_con` (
  `onhand` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prodName_common` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus_is`
--

DROP TABLE IF EXISTS `skus_is`;
CREATE TABLE `skus_is` (
  `id` int(11) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lyle_sku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `weight` text COLLATE utf8_unicode_ci,
  `item_number` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activated',
  `sku_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus_nov26`
--

DROP TABLE IF EXISTS `skus_nov26`;
CREATE TABLE `skus_nov26` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(100) DEFAULT '',
  `prodName` varchar(250) DEFAULT '',
  `prodQty` int(11) NOT NULL,
  `prodType` varchar(100) DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodCode_grp` varchar(50) NOT NULL,
  `prodName_grp` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'activated',
  `prodName_common` varchar(250) DEFAULT NULL,
  `prodCode_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skus_share_point`
--

DROP TABLE IF EXISTS `skus_share_point`;
CREATE TABLE `skus_share_point` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(100) DEFAULT '',
  `prodName` varchar(250) DEFAULT '',
  `prodQty` int(11) NOT NULL,
  `prodType` varchar(100) DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodCode_grp` varchar(50) NOT NULL,
  `prodName_grp` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'activated',
  `prodName_common` varchar(250) DEFAULT NULL,
  `prodCode_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sku_ho_goal`
--

DROP TABLE IF EXISTS `sku_ho_goal`;
CREATE TABLE `sku_ho_goal` (
  `id` int(11) NOT NULL,
  `prodCode` varchar(1000) NOT NULL,
  `goal_id` int(255) NOT NULL,
  `offer_id` int(255) NOT NULL,
  `type` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trackingCodes`
--

DROP TABLE IF EXISTS `trackingCodes`;
CREATE TABLE `trackingCodes` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `trackingCodes` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype`
--

DROP TABLE IF EXISTS `transactiontype`;
CREATE TABLE `transactiontype` (
  `id` int(11) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upsell`
--

DROP TABLE IF EXISTS `upsell`;
CREATE TABLE `upsell` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `upsellOriginalReceipt` varchar(250) DEFAULT '',
  `upsellFlowId` varchar(250) DEFAULT '',
  `upsellSession` varchar(250) DEFAULT '',
  `upsellPath` varchar(250) DEFAULT '',
  `itemNo` varchar(250) DEFAULT '',
  `productTitle` varchar(250) DEFAULT '',
  `shippable` varchar(250) DEFAULT '',
  `recurring` varchar(250) DEFAULT '',
  `accountAmount` varchar(250) DEFAULT '',
  `quantity` varchar(250) DEFAULT '',
  `lineItemType` varchar(250) DEFAULT '',
  `productPrice` varchar(250) DEFAULT '',
  `productDiscount` varchar(250) DEFAULT '',
  `taxAmount` varchar(250) DEFAULT '',
  `shippingAmount` varchar(250) DEFAULT '',
  `shippingLiable` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendorVariables`
--

DROP TABLE IF EXISTS `vendorVariables`;
CREATE TABLE `vendorVariables` (
  `id` int(11) NOT NULL,
  `lnkid` int(11) DEFAULT NULL,
  `cbur` varchar(250) DEFAULT '',
  `cbitems` varchar(250) DEFAULT '',
  `itemNo` varchar(250) DEFAULT '',
  `productTitle` varchar(250) DEFAULT '',
  `shippable` varchar(250) DEFAULT '',
  `recurring` varchar(250) DEFAULT '',
  `accountAmount` varchar(250) DEFAULT '',
  `quantity` varchar(250) DEFAULT '',
  `downloadUrl` varchar(250) DEFAULT '',
  `lineItemType` varchar(250) DEFAULT '',
  `productPrice` varchar(250) DEFAULT '',
  `productDiscount` varchar(250) DEFAULT '',
  `affiliatePayout` varchar(250) DEFAULT '',
  `taxAmount` varchar(250) DEFAULT '',
  `shippingAmount` varchar(250) DEFAULT '',
  `shippingLiable` varchar(250) DEFAULT '',
  `tid` varchar(250) DEFAULT '',
  `v1` varchar(50) NOT NULL,
  `v2` varchar(50) NOT NULL,
  `cbfid` varchar(250) DEFAULT '',
  `cbskin` varchar(250) DEFAULT '',
  `cupsellreceipt` varchar(250) DEFAULT '',
  `cbf` varchar(250) DEFAULT '',
  `hop` varchar(250) DEFAULT '',
  `p` varchar(250) DEFAULT '',
  `name` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `zipcode` varchar(250) DEFAULT '',
  `utm_campaign` varchar(250) DEFAULT '',
  `utm_source` varchar(250) DEFAULT '',
  `utm_medium` varchar(250) DEFAULT '',
  `subid` varchar(250) DEFAULT '',
  `fbclid` varchar(250) DEFAULT '',
  `inf_contact_key` varchar(250) DEFAULT '',
  `utm_term` varchar(250) DEFAULT '',
  `imt` varchar(250) DEFAULT '',
  `utm_content` varchar(250) DEFAULT '',
  `_ke` varchar(250) DEFAULT '',
  `traffic_source` varchar(250) DEFAULT '',
  `__s` varchar(250) DEFAULT '',
  `aff_sub2` varchar(250) DEFAULT '',
  `amp;cbskin` varchar(250) DEFAULT '',
  `amp;utm_source` varchar(250) DEFAULT '',
  `amp;utm_campaign` varchar(250) DEFAULT '',
  `amp;hop` varchar(250) DEFAULT '',
  `amp;p` varchar(250) DEFAULT '',
  `service` varchar(250) DEFAULT '',
  `op` varchar(250) DEFAULT '',
  `cbrblaccpt` varchar(250) DEFAULT '',
  `lm` varchar(250) DEFAULT '',
  `goal` varchar(250) DEFAULT '',
  `utm_tid` varchar(250) DEFAULT '',
  `utm_test` varchar(250) DEFAULT '',
  `offer_id` varchar(250) DEFAULT '',
  `partner_id` varchar(250) DEFAULT '',
  `aff_sub` varchar(250) DEFAULT '',
  `aff_sub3` varchar(250) DEFAULT '',
  `trk_msg` varchar(250) DEFAULT '',
  `trk_contact` varchar(250) DEFAULT '',
  `trk_sid` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vt_audit_pwcp`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vt_audit_pwcp`;
CREATE TABLE `vt_audit_pwcp` (
`dt` timestamp
,`transactionTime` varchar(250)
,`receipt` varchar(250)
,`transactionType` varchar(250)
,`itemNo` varchar(250)
,`downloadUrl` varchar(250)
,`affiliate` varchar(250)
,`vendor` varchar(250)
,`email` varchar(250)
,`firstName` varchar(250)
,`lastName` varchar(250)
,`address1` varchar(250)
,`address2` varchar(250)
,`city` varchar(250)
,`state` varchar(250)
,`country` varchar(250)
,`postalCode` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_active_names`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_active_names`;
CREATE TABLE `vw_active_names` (
`lnk_name` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_all_active_members`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_all_active_members`;
CREATE TABLE `vw_all_active_members` (
`lnk_name` varchar(500)
,`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`Dates` text
,`SKUs` text
,`ProductNames` text
,`Receipts` text
,`NoOfReBills` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_all_inactive_members`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_all_inactive_members`;
CREATE TABLE `vw_all_inactive_members` (
`lnk_name` varchar(500)
,`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`Dates` text
,`SKUs` text
,`ProductNames` text
,`Receipts` text
,`NoOfReBills` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_canceled_members`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_canceled_members`;
CREATE TABLE `vw_canceled_members` (
`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`LastID` int(11)
,`transactionType` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_CB_IS_Active`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_CB_IS_Active`;
CREATE TABLE `vw_CB_IS_Active` (
`CB_FirstName` varchar(250)
,`CB_LastName` varchar(250)
,`CB_Email` varchar(250)
,`CB_Dates` text
,`CB_SKUs` text
,`CB_ProductNames` text
,`CB_Receipts` text
,`CB_NoOfReBills` decimal(23,0)
,`lnk_name` varchar(500)
,`IS_FirstName` varchar(13)
,`IS_LastName` varchar(12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_CB_IS_Inactive`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_CB_IS_Inactive`;
CREATE TABLE `vw_CB_IS_Inactive` (
`CB_FirstName` varchar(250)
,`CB_LastName` varchar(250)
,`lnk_name` varchar(500)
,`IS_FirstName` varchar(9)
,`IS_LastName` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_consolidated`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_consolidated`;
CREATE TABLE `vw_consolidated` (
`prodCode_other` varchar(100)
,`prodCode_grp` varchar(50)
,`prodName_grp` varchar(250)
,`q1_is` decimal(54,0)
,`q2_is` decimal(54,0)
,`q3_is` decimal(54,0)
,`q4_is` decimal(54,0)
,`q5_is` decimal(54,0)
,`q6_is` decimal(54,0)
,`q7_is` decimal(54,0)
,`q8_is` decimal(54,0)
,`q9_is` decimal(54,0)
,`q10_is` decimal(54,0)
,`q11_is` decimal(54,0)
,`q12_is` decimal(54,0)
,`q13_is` decimal(54,0)
,`q14_is` decimal(54,0)
,`q30_is` decimal(54,0)
,`q1` decimal(54,0)
,`q2` decimal(54,0)
,`q3` decimal(54,0)
,`q4` decimal(54,0)
,`q5` decimal(54,0)
,`q6` decimal(54,0)
,`q7` decimal(54,0)
,`q8` decimal(54,0)
,`q9` decimal(54,0)
,`q10` decimal(54,0)
,`q11` decimal(54,0)
,`q12` decimal(54,0)
,`q13` decimal(54,0)
,`q14` decimal(54,0)
,`q30` decimal(54,0)
,`onhand` decimal(32,0)
,`sold` decimal(32,0)
,`cb_totalsold` decimal(54,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_consolidated_without_issku`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_consolidated_without_issku`;
CREATE TABLE `vw_consolidated_without_issku` (
`prodCode_grp` varchar(50)
,`prodName_grp` varchar(250)
,`q1_is` decimal(54,0)
,`q2_is` decimal(54,0)
,`q3_is` decimal(54,0)
,`q4_is` decimal(54,0)
,`q5_is` decimal(54,0)
,`q6_is` decimal(54,0)
,`q7_is` decimal(54,0)
,`q8_is` decimal(54,0)
,`q9_is` decimal(54,0)
,`q10_is` decimal(54,0)
,`q11_is` decimal(54,0)
,`q12_is` decimal(54,0)
,`q13_is` decimal(54,0)
,`q14_is` decimal(54,0)
,`q30_is` decimal(54,0)
,`q1` decimal(54,0)
,`q2` decimal(54,0)
,`q3` decimal(54,0)
,`q4` decimal(54,0)
,`q5` decimal(54,0)
,`q6` decimal(54,0)
,`q7` decimal(54,0)
,`q8` decimal(54,0)
,`q9` decimal(54,0)
,`q10` decimal(54,0)
,`q11` decimal(54,0)
,`q12` decimal(54,0)
,`q13` decimal(54,0)
,`q14` decimal(54,0)
,`q30` decimal(54,0)
,`onhand` decimal(32,0)
,`sold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_daily_ship_con`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_daily_ship_con`;
CREATE TABLE `vw_daily_ship_con` (
`item_number` varchar(50)
,`description` varchar(150)
,`qty01` decimal(32,0)
,`qty02` decimal(32,0)
,`qty03` decimal(32,0)
,`qty04` decimal(32,0)
,`qty05` decimal(32,0)
,`qty06` decimal(32,0)
,`qty07` decimal(32,0)
,`qty08` decimal(32,0)
,`qty09` decimal(32,0)
,`qty10` decimal(32,0)
,`qty11` decimal(32,0)
,`qty12` decimal(32,0)
,`qty13` decimal(32,0)
,`qty14` decimal(32,0)
,`qty30` decimal(32,0)
,`totalsold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_daily_ship_is_con`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_daily_ship_is_con`;
CREATE TABLE `vw_daily_ship_is_con` (
`sku_link` varchar(100)
,`sku` varchar(100)
,`description_is` varchar(150)
,`qty01_is` decimal(32,0)
,`qty02_is` decimal(32,0)
,`qty03_is` decimal(32,0)
,`qty04_is` decimal(32,0)
,`qty05_is` decimal(32,0)
,`qty06_is` decimal(32,0)
,`qty07_is` decimal(32,0)
,`qty08_is` decimal(32,0)
,`qty09_is` decimal(32,0)
,`qty10_is` decimal(32,0)
,`qty11_is` decimal(32,0)
,`qty12_is` decimal(32,0)
,`qty13_is` decimal(32,0)
,`qty14_is` decimal(32,0)
,`qty30_is` decimal(32,0)
,`totalsold_is` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_forbal_is`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_forbal_is`;
CREATE TABLE `vw_forbal_is` (
`prodCode` varchar(100)
,`prodCode_grp` varchar(50)
,`prodCode_other` varchar(100)
,`prodName_grp` varchar(250)
,`qty` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_front_end_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_front_end_details`;
CREATE TABLE `vw_front_end_details` (
`dt` timestamp
,`receipt` varchar(250)
,`vendor` varchar(250)
,`itemNo` varchar(250)
,`productTitle` varchar(250)
,`email` varchar(250)
,`firstName` varchar(250)
,`lastName` varchar(250)
,`affiliate` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_front_end_grp`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_front_end_grp`;
CREATE TABLE `vw_front_end_grp` (
`vendor` varchar(250)
,`itemNo` varchar(250)
,`productTitle` varchar(250)
,`email` varchar(250)
,`firstName` varchar(250)
,`lastName` varchar(250)
,`affiliate` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_inactive_names`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_inactive_names`;
CREATE TABLE `vw_inactive_names` (
`lnk_name` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_inventory`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_inventory`;
CREATE TABLE `vw_inventory` (
`prodCode` varchar(50)
,`prodName_common` varchar(250)
,`onhand` int(11)
,`sold` int(11)
,`qty01` decimal(32,0)
,`qty02` decimal(32,0)
,`qty03` decimal(32,0)
,`qty04` decimal(32,0)
,`qty05` decimal(32,0)
,`qty06` decimal(32,0)
,`qty07` decimal(32,0)
,`qty08` decimal(32,0)
,`qty09` decimal(32,0)
,`qty10` decimal(32,0)
,`qty11` decimal(32,0)
,`qty12` decimal(32,0)
,`qty13` decimal(32,0)
,`qty4` decimal(32,0)
,`qty5` decimal(32,0)
,`qty7` decimal(32,0)
,`qty14` decimal(32,0)
,`qty30` decimal(32,0)
,`totalsold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_inventory_is`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_inventory_is`;
CREATE TABLE `vw_inventory_is` (
`prodCode` varchar(100)
,`sku` varchar(100)
,`sku_link` varchar(100)
,`prodName_common` varchar(250)
,`onhand` int(11)
,`sold` int(11)
,`qty01` decimal(32,0)
,`qty02` decimal(32,0)
,`qty03` decimal(32,0)
,`qty04` decimal(32,0)
,`qty05` decimal(32,0)
,`qty06` decimal(32,0)
,`qty07` decimal(32,0)
,`qty08` decimal(32,0)
,`qty09` decimal(32,0)
,`qty10` decimal(32,0)
,`qty11` decimal(32,0)
,`qty12` decimal(32,0)
,`qty13` decimal(32,0)
,`qty4` decimal(32,0)
,`qty5` decimal(32,0)
,`qty7` decimal(32,0)
,`qty14` decimal(32,0)
,`qty30` decimal(32,0)
,`totalsold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_last_id`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_last_id`;
CREATE TABLE `vw_last_id` (
`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`LastID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_notification`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_notification`;
CREATE TABLE `vw_notification` (
`id` int(11)
,`dt` varchar(72)
,`notifications_vendor` varchar(250)
,`notifications_transactionTime` varchar(250)
,`notifications_receipt` varchar(250)
,`notifications_transactionType` varchar(250)
,`billing_firstName` varchar(250)
,`billing_lastName` varchar(250)
,`billing_fullName` varchar(250)
,`billing_phoneNumber` varchar(250)
,`billing_email` varchar(250)
,`billing_state` varchar(250)
,`billing_postalCode` varchar(250)
,`billing_country` varchar(250)
,`shipping_firstName` varchar(250)
,`shipping_lastName` varchar(250)
,`shipping_fullName` varchar(250)
,`shipping_phoneNumber` varchar(250)
,`shipping_email` varchar(250)
,`shipping_address1` varchar(250)
,`shipping_address2` varchar(250)
,`shipping_city` varchar(250)
,`shipping_county` varchar(250)
,`shipping_state` varchar(250)
,`shipping_postalCode` varchar(250)
,`shipping_country` varchar(250)
,`lineItems_itemNo` varchar(250)
,`lineItems_productTitle` varchar(250)
,`lineItems_shippable` varchar(250)
,`lineItems_recurring` varchar(250)
,`lineItems_accountAmount` varchar(250)
,`lineItems_quantity` varchar(250)
,`lineItems_downloadUrl` varchar(250)
,`lineItems_productPrice` varchar(250)
,`lineItems_productDiscount` varchar(250)
,`lineItems_taxAmount` varchar(250)
,`lineItems_shippingAmount` varchar(250)
,`lineItems_shippingLiable` varchar(250)
,`lineItems_paymentsProcessed` varchar(250)
,`lineItems_paymentsRemaining` varchar(250)
,`lineItems_nextPaymentDate` varchar(250)
,`lineItems_affiliatePayout` varchar(250)
,`lineItems_lineItemType` varchar(250)
,`notifications_affiliate` varchar(250)
,`notifications_role` varchar(250)
,`notifications_totalAccountAmount` varchar(250)
,`notifications_paymentMethod` varchar(250)
,`notifications_totalOrderAmount` varchar(250)
,`notifications_totalTaxAmount` varchar(250)
,`notifications_totalShippingAmount` varchar(250)
,`notifications_currency` varchar(250)
,`notifications_orderLanguage` varchar(250)
,`notifications_version` varchar(250)
,`notifications_attemptCount` varchar(250)
,`trackingCodes_trackingCodes` varchar(250)
,`hopfeed_hopfeedClickId` varchar(250)
,`hopfeed_hopfeedApplicationId` varchar(250)
,`hopfeed_hopfeedCreativeId` varchar(250)
,`hopfeed_hopfeedApplicationPayout` varchar(250)
,`hopfeed_hopfeedVendorPayout` varchar(250)
,`upsell_upsellOriginalReceipt` varchar(250)
,`upsell_upsellFlowId` varchar(250)
,`upsell_upsellSession` varchar(250)
,`upsell_upsellPath` varchar(250)
,`vendorVariables_v1` varchar(50)
,`vendorVariables_v2` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pigman_canceled_members`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_pigman_canceled_members`;
CREATE TABLE `vw_pigman_canceled_members` (
`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`LastID` int(11)
,`transactionType` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pigman_last_id`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_pigman_last_id`;
CREATE TABLE `vw_pigman_last_id` (
`firstName` varchar(250)
,`lastName` varchar(250)
,`email` varchar(250)
,`LastID` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vt_audit_pwcp`
--
DROP TABLE IF EXISTS `vt_audit_pwcp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vt_audit_pwcp`  AS  select `notifications`.`dt` AS `dt`,`notifications`.`transactionTime` AS `transactionTime`,`notifications`.`receipt` AS `receipt`,`notifications`.`transactionType` AS `transactionType`,`lineItems`.`itemNo` AS `itemNo`,`lineItems`.`downloadUrl` AS `downloadUrl`,`notifications`.`affiliate` AS `affiliate`,`notifications`.`vendor` AS `vendor`,`shipping`.`email` AS `email`,`shipping`.`firstName` AS `firstName`,`shipping`.`lastName` AS `lastName`,`shipping_address`.`address1` AS `address1`,`shipping_address`.`address2` AS `address2`,`shipping_address`.`city` AS `city`,`shipping_address`.`state` AS `state`,`shipping_address`.`country` AS `country`,`shipping_address`.`postalCode` AS `postalCode` from (((`notifications` left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) left join `shipping` on((`shipping`.`lnkid` = `notifications`.`id`))) left join `shipping_address` on((`shipping_address`.`lnkid` = `notifications`.`id`))) where (`lineItems`.`itemNo` like '%pwcp%') group by `notifications`.`dt`,`notifications`.`receipt`,`notifications`.`transactionType`,`lineItems`.`itemNo`,`lineItems`.`downloadUrl`,`notifications`.`affiliate`,`notifications`.`vendor` order by `notifications`.`dt` desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_active_names`
--
DROP TABLE IF EXISTS `vw_active_names`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_active_names`  AS  select `vw_all_active_members`.`lnk_name` AS `lnk_name` from `vw_all_active_members` union select `is_pwcp_active`.`lnk_name` AS `lnk_name` from `is_pwcp_active` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_all_active_members`
--
DROP TABLE IF EXISTS `vw_all_active_members`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_active_members`  AS  select distinct concat(`billing`.`firstName`,`billing`.`lastName`) AS `lnk_name`,`billing`.`firstName` AS `firstName`,`billing`.`lastName` AS `lastName`,`billing`.`email` AS `email`,group_concat(str_to_date(`notifications`.`dt`,'%Y-%m-%d') separator ', ') AS `Dates`,group_concat(`lineItems`.`itemNo` separator ', ') AS `SKUs`,group_concat(`lineItems`.`productTitle` separator ', ') AS `ProductNames`,group_concat(`notifications`.`receipt` separator ', ') AS `Receipts`,sum(if((`notifications`.`transactionType` = 'BILL'),1,0)) AS `NoOfReBills` from ((`billing` left join `notifications` on((`billing`.`lnkid` = `notifications`.`id`))) left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) where ((`lineItems`.`itemNo` like '%pwcp%') and (`notifications`.`transactionType` not in ('TEST','TEST_BILL','TEST_SALE')) and (not(`billing`.`email` in (select `vw_canceled_members`.`email` from `vw_canceled_members`))) and (`billing`.`firstName` <> '')) group by `billing`.`firstName`,`billing`.`lastName`,`billing`.`email` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_all_inactive_members`
--
DROP TABLE IF EXISTS `vw_all_inactive_members`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_inactive_members`  AS  select distinct concat(`billing`.`firstName`,`billing`.`lastName`) AS `lnk_name`,`billing`.`firstName` AS `firstName`,`billing`.`lastName` AS `lastName`,`billing`.`email` AS `email`,group_concat(str_to_date(`notifications`.`dt`,'%Y-%m-%d') separator ', ') AS `Dates`,group_concat(`lineItems`.`itemNo` separator ', ') AS `SKUs`,group_concat(`lineItems`.`productTitle` separator ', ') AS `ProductNames`,group_concat(`notifications`.`receipt` separator ', ') AS `Receipts`,sum(if((`notifications`.`transactionType` = 'BILL'),1,0)) AS `NoOfReBills` from ((`billing` left join `notifications` on((`billing`.`lnkid` = `notifications`.`id`))) left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) where ((`lineItems`.`itemNo` like '%pwcp%') and (`notifications`.`transactionType` not in ('TEST','TEST_BILL','TEST_SALE')) and `billing`.`email` in (select `vw_canceled_members`.`email` from `vw_canceled_members`) and (`billing`.`firstName` <> '')) group by `billing`.`firstName`,`billing`.`lastName`,`billing`.`email` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_canceled_members`
--
DROP TABLE IF EXISTS `vw_canceled_members`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_canceled_members`  AS  select `vw_last_id`.`firstName` AS `firstName`,`vw_last_id`.`lastName` AS `lastName`,`vw_last_id`.`email` AS `email`,`vw_last_id`.`LastID` AS `LastID`,`notifications`.`transactionType` AS `transactionType` from (`vw_last_id` left join `notifications` on((`notifications`.`id` = `vw_last_id`.`LastID`))) where ((`notifications`.`transactionType` = 'CANCEL-REBILL') or (`notifications`.`transactionType` = 'RFND') or (`notifications`.`transactionType` = 'CGBK')) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_CB_IS_Active`
--
DROP TABLE IF EXISTS `vw_CB_IS_Active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_CB_IS_Active`  AS  select `vw_all_active_members`.`firstName` AS `CB_FirstName`,`vw_all_active_members`.`lastName` AS `CB_LastName`,`vw_all_active_members`.`email` AS `CB_Email`,`vw_all_active_members`.`Dates` AS `CB_Dates`,`vw_all_active_members`.`SKUs` AS `CB_SKUs`,`vw_all_active_members`.`ProductNames` AS `CB_ProductNames`,`vw_all_active_members`.`Receipts` AS `CB_Receipts`,`vw_all_active_members`.`NoOfReBills` AS `CB_NoOfReBills`,`vw_active_names`.`lnk_name` AS `lnk_name`,`is_pwcp_active`.`FirstName` AS `IS_FirstName`,`is_pwcp_active`.`LastName` AS `IS_LastName` from ((`vw_active_names` left join `vw_all_active_members` on((`vw_all_active_members`.`lnk_name` = `vw_active_names`.`lnk_name`))) left join `is_pwcp_active` on((`is_pwcp_active`.`lnk_name` = `vw_active_names`.`lnk_name`))) group by `vw_all_active_members`.`firstName`,`vw_all_active_members`.`lastName`,`vw_active_names`.`lnk_name`,`is_pwcp_active`.`FirstName`,`is_pwcp_active`.`LastName` order by `vw_active_names`.`lnk_name` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_CB_IS_Inactive`
--
DROP TABLE IF EXISTS `vw_CB_IS_Inactive`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_CB_IS_Inactive`  AS  select `vw_all_inactive_members`.`firstName` AS `CB_FirstName`,`vw_all_inactive_members`.`lastName` AS `CB_LastName`,`vw_inactive_names`.`lnk_name` AS `lnk_name`,`is_pwcp_inactive`.`FirstName` AS `IS_FirstName`,`is_pwcp_inactive`.`LastName` AS `IS_LastName` from ((`vw_inactive_names` left join `vw_all_inactive_members` on((`vw_all_inactive_members`.`lnk_name` = `vw_inactive_names`.`lnk_name`))) left join `is_pwcp_inactive` on((`is_pwcp_inactive`.`lnk_name` = `vw_inactive_names`.`lnk_name`))) group by `vw_all_inactive_members`.`firstName`,`vw_all_inactive_members`.`lastName`,`vw_inactive_names`.`lnk_name`,`is_pwcp_inactive`.`FirstName`,`is_pwcp_inactive`.`LastName` order by `vw_inactive_names`.`lnk_name` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_consolidated`
--
DROP TABLE IF EXISTS `vw_consolidated`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_consolidated`  AS  select `skus`.`prodCode_other` AS `prodCode_other`,`skus`.`prodCode_grp` AS `prodCode_grp`,`skus`.`prodName_grp` AS `prodName_grp`,sum(`vw_daily_ship_is_con`.`qty01_is`) AS `q1_is`,sum(`vw_daily_ship_is_con`.`qty02_is`) AS `q2_is`,sum(`vw_daily_ship_is_con`.`qty03_is`) AS `q3_is`,sum(`vw_daily_ship_is_con`.`qty04_is`) AS `q4_is`,sum(`vw_daily_ship_is_con`.`qty05_is`) AS `q5_is`,sum(`vw_daily_ship_is_con`.`qty06_is`) AS `q6_is`,sum(`vw_daily_ship_is_con`.`qty07_is`) AS `q7_is`,sum(`vw_daily_ship_is_con`.`qty08_is`) AS `q8_is`,sum(`vw_daily_ship_is_con`.`qty09_is`) AS `q9_is`,sum(`vw_daily_ship_is_con`.`qty10_is`) AS `q10_is`,sum(`vw_daily_ship_is_con`.`qty11_is`) AS `q11_is`,sum(`vw_daily_ship_is_con`.`qty12_is`) AS `q12_is`,sum(`vw_daily_ship_is_con`.`qty13_is`) AS `q13_is`,sum(`vw_daily_ship_is_con`.`qty14_is`) AS `q14_is`,sum(`vw_daily_ship_is_con`.`qty30_is`) AS `q30_is`,sum(`vw_daily_ship_con`.`qty01`) AS `q1`,sum(`vw_daily_ship_con`.`qty02`) AS `q2`,sum(`vw_daily_ship_con`.`qty03`) AS `q3`,sum(`vw_daily_ship_con`.`qty04`) AS `q4`,sum(`vw_daily_ship_con`.`qty05`) AS `q5`,sum(`vw_daily_ship_con`.`qty06`) AS `q6`,sum(`vw_daily_ship_con`.`qty07`) AS `q7`,sum(`vw_daily_ship_con`.`qty08`) AS `q8`,sum(`vw_daily_ship_con`.`qty09`) AS `q9`,sum(`vw_daily_ship_con`.`qty10`) AS `q10`,sum(`vw_daily_ship_con`.`qty11`) AS `q11`,sum(`vw_daily_ship_con`.`qty12`) AS `q12`,sum(`vw_daily_ship_con`.`qty13`) AS `q13`,sum(`vw_daily_ship_con`.`qty14`) AS `q14`,sum(`vw_daily_ship_con`.`qty30`) AS `q30`,sum(`skus_balance_is_con`.`onhand`) AS `onhand`,sum(`skus_balance_is_con`.`sold`) AS `sold`,sum(`vw_daily_ship_con`.`totalsold`) AS `cb_totalsold` from (((`skus` left join `vw_daily_ship_is_con` on((`skus`.`prodCode` = `vw_daily_ship_is_con`.`sku`))) left join `vw_daily_ship_con` on((`skus`.`prodCode` = `vw_daily_ship_con`.`item_number`))) left join `skus_balance_is_con` on((`skus`.`prodCode` = `skus_balance_is_con`.`sku`))) group by `skus`.`prodCode_grp`,`skus`.`prodName_grp`,`skus`.`prodCode_other` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_consolidated_without_issku`
--
DROP TABLE IF EXISTS `vw_consolidated_without_issku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_consolidated_without_issku`  AS  select `skus`.`prodCode_grp` AS `prodCode_grp`,`skus`.`prodName_grp` AS `prodName_grp`,sum(`vw_daily_ship_is_con`.`qty01_is`) AS `q1_is`,sum(`vw_daily_ship_is_con`.`qty02_is`) AS `q2_is`,sum(`vw_daily_ship_is_con`.`qty03_is`) AS `q3_is`,sum(`vw_daily_ship_is_con`.`qty04_is`) AS `q4_is`,sum(`vw_daily_ship_is_con`.`qty05_is`) AS `q5_is`,sum(`vw_daily_ship_is_con`.`qty06_is`) AS `q6_is`,sum(`vw_daily_ship_is_con`.`qty07_is`) AS `q7_is`,sum(`vw_daily_ship_is_con`.`qty08_is`) AS `q8_is`,sum(`vw_daily_ship_is_con`.`qty09_is`) AS `q9_is`,sum(`vw_daily_ship_is_con`.`qty10_is`) AS `q10_is`,sum(`vw_daily_ship_is_con`.`qty11_is`) AS `q11_is`,sum(`vw_daily_ship_is_con`.`qty12_is`) AS `q12_is`,sum(`vw_daily_ship_is_con`.`qty13_is`) AS `q13_is`,sum(`vw_daily_ship_is_con`.`qty14_is`) AS `q14_is`,sum(`vw_daily_ship_is_con`.`qty30_is`) AS `q30_is`,sum(`vw_daily_ship_con`.`qty01`) AS `q1`,sum(`vw_daily_ship_con`.`qty02`) AS `q2`,sum(`vw_daily_ship_con`.`qty03`) AS `q3`,sum(`vw_daily_ship_con`.`qty04`) AS `q4`,sum(`vw_daily_ship_con`.`qty05`) AS `q5`,sum(`vw_daily_ship_con`.`qty06`) AS `q6`,sum(`vw_daily_ship_con`.`qty07`) AS `q7`,sum(`vw_daily_ship_con`.`qty08`) AS `q8`,sum(`vw_daily_ship_con`.`qty09`) AS `q9`,sum(`vw_daily_ship_con`.`qty10`) AS `q10`,sum(`vw_daily_ship_con`.`qty11`) AS `q11`,sum(`vw_daily_ship_con`.`qty12`) AS `q12`,sum(`vw_daily_ship_con`.`qty13`) AS `q13`,sum(`vw_daily_ship_con`.`qty14`) AS `q14`,sum(`vw_daily_ship_con`.`qty30`) AS `q30`,sum(`skus_balance_is_con`.`onhand`) AS `onhand`,sum(`skus_balance_is_con`.`sold`) AS `sold` from (((`skus` left join `vw_daily_ship_is_con` on((`skus`.`prodCode` = `vw_daily_ship_is_con`.`sku`))) left join `vw_daily_ship_con` on((`skus`.`prodCode` = `vw_daily_ship_con`.`item_number`))) left join `skus_balance_is_con` on((`skus`.`prodCode` = `skus_balance_is_con`.`sku`))) group by `skus`.`prodCode_grp`,`skus`.`prodName_grp` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_daily_ship_con`
--
DROP TABLE IF EXISTS `vw_daily_ship_con`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_daily_ship_con`  AS  select `daily_ship_con`.`item_number` AS `item_number`,`daily_ship_con`.`description` AS `description`,sum(`daily_ship_con`.`qty01`) AS `qty01`,sum(`daily_ship_con`.`qty02`) AS `qty02`,sum(`daily_ship_con`.`qty03`) AS `qty03`,sum(`daily_ship_con`.`qty04`) AS `qty04`,sum(`daily_ship_con`.`qty05`) AS `qty05`,sum(`daily_ship_con`.`qty06`) AS `qty06`,sum(`daily_ship_con`.`qty07`) AS `qty07`,sum(`daily_ship_con`.`qty08`) AS `qty08`,sum(`daily_ship_con`.`qty09`) AS `qty09`,sum(`daily_ship_con`.`qty10`) AS `qty10`,sum(`daily_ship_con`.`qty11`) AS `qty11`,sum(`daily_ship_con`.`qty12`) AS `qty12`,sum(`daily_ship_con`.`qty13`) AS `qty13`,sum(`daily_ship_con`.`qty14`) AS `qty14`,sum(`daily_ship_con`.`qty30`) AS `qty30`,sum(`daily_ship_con`.`totalsold`) AS `totalsold` from `daily_ship_con` group by `daily_ship_con`.`item_number`,`daily_ship_con`.`description` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_daily_ship_is_con`
--
DROP TABLE IF EXISTS `vw_daily_ship_is_con`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_daily_ship_is_con`  AS  select `daily_ship_is_con`.`sku_link` AS `sku_link`,`daily_ship_is_con`.`sku` AS `sku`,`daily_ship_is_con`.`description` AS `description_is`,sum(`daily_ship_is_con`.`qty01`) AS `qty01_is`,sum(`daily_ship_is_con`.`qty02`) AS `qty02_is`,sum(`daily_ship_is_con`.`qty03`) AS `qty03_is`,sum(`daily_ship_is_con`.`qty04`) AS `qty04_is`,sum(`daily_ship_is_con`.`qty05`) AS `qty05_is`,sum(`daily_ship_is_con`.`qty06`) AS `qty06_is`,sum(`daily_ship_is_con`.`qty07`) AS `qty07_is`,sum(`daily_ship_is_con`.`qty08`) AS `qty08_is`,sum(`daily_ship_is_con`.`qty09`) AS `qty09_is`,sum(`daily_ship_is_con`.`qty10`) AS `qty10_is`,sum(`daily_ship_is_con`.`qty11`) AS `qty11_is`,sum(`daily_ship_is_con`.`qty12`) AS `qty12_is`,sum(`daily_ship_is_con`.`qty13`) AS `qty13_is`,sum(`daily_ship_is_con`.`qty14`) AS `qty14_is`,sum(`daily_ship_is_con`.`qty30`) AS `qty30_is`,sum(`daily_ship_is_con`.`totalsold`) AS `totalsold_is` from `daily_ship_is_con` group by `daily_ship_is_con`.`sku_link`,`daily_ship_is_con`.`sku`,`daily_ship_is_con`.`description` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_forbal_is`
--
DROP TABLE IF EXISTS `vw_forbal_is`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_forbal_is`  AS  select `skus`.`prodCode` AS `prodCode`,`skus`.`prodCode_grp` AS `prodCode_grp`,`skus`.`prodCode_other` AS `prodCode_other`,`skus`.`prodName_grp` AS `prodName_grp`,sum(`lineItems`.`quantity`) AS `qty` from ((`skus` left join `lineItems` on((`lineItems`.`itemNo` = `skus`.`prodCode`))) left join `notifications` on((`notifications`.`id` = `lineItems`.`lnkid`))) where ((`lineItems`.`itemNo` <> '') and (`lineItems`.`itemNo` <> 'b-priority') and (`notifications`.`transactionType` <> 'TEST') and (`notifications`.`transactionType` <> 'TEST_SALE')) group by `skus`.`prodCode`,`skus`.`prodCode_grp`,`skus`.`prodCode_other`,`skus`.`prodName_grp` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_front_end_details`
--
DROP TABLE IF EXISTS `vw_front_end_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_front_end_details`  AS  select `notifications`.`dt` AS `dt`,`notifications`.`receipt` AS `receipt`,`notifications`.`vendor` AS `vendor`,`lineItems`.`itemNo` AS `itemNo`,`lineItems`.`productTitle` AS `productTitle`,`billing`.`email` AS `email`,`billing`.`firstName` AS `firstName`,`billing`.`lastName` AS `lastName`,`notifications`.`affiliate` AS `affiliate` from ((`notifications` left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) left join `billing` on((`billing`.`lnkid` = `notifications`.`id`))) where (((`lineItems`.`itemNo` like 'cptbook%') or (`lineItems`.`itemNo` like 'sgfl%') or (`lineItems`.`itemNo` like 'swt%') or (`lineItems`.`itemNo` like 'tclsr%') or (`lineItems`.`itemNo` like 'cpslbag%') or (`lineItems`.`itemNo` like 'cpusbat%') or (`lineItems`.`itemNo` like 'backpk%') or (`lineItems`.`itemNo` like 'gbgknf%') or (`lineItems`.`itemNo` like 'stflpkn%')) and (`billing`.`email` <> '') and (`notifications`.`vendor` = 'totalpat') and (`billing`.`email` <> '') and (`notifications`.`transactionType` = 'SALE')) group by `notifications`.`dt`,`notifications`.`receipt`,`lineItems`.`itemNo`,`lineItems`.`productTitle`,`billing`.`email`,`billing`.`firstName`,`billing`.`lastName`,`notifications`.`affiliate`,`notifications`.`vendor` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_front_end_grp`
--
DROP TABLE IF EXISTS `vw_front_end_grp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_front_end_grp`  AS  select `notifications`.`vendor` AS `vendor`,`lineItems`.`itemNo` AS `itemNo`,`lineItems`.`productTitle` AS `productTitle`,`billing`.`email` AS `email`,`billing`.`firstName` AS `firstName`,`billing`.`lastName` AS `lastName`,`notifications`.`affiliate` AS `affiliate` from ((`notifications` left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) left join `billing` on((`billing`.`lnkid` = `notifications`.`id`))) where (((`lineItems`.`itemNo` like 'cptbook%') or (`lineItems`.`itemNo` like 'sgfl%') or (`lineItems`.`itemNo` like 'swt%') or (`lineItems`.`itemNo` like 'tclsr%') or (`lineItems`.`itemNo` like 'cpslbag%') or (`lineItems`.`itemNo` like 'cpusbat%') or (`lineItems`.`itemNo` like 'backpk%') or (`lineItems`.`itemNo` like 'gbgknf%') or (`lineItems`.`itemNo` like 'stflpkn%')) and (`billing`.`email` <> '') and (`notifications`.`vendor` = 'totalpat') and (`billing`.`email` <> '') and (`notifications`.`transactionType` = 'SALE')) group by `lineItems`.`itemNo`,`lineItems`.`productTitle`,`billing`.`email`,`billing`.`firstName`,`billing`.`lastName`,`notifications`.`affiliate`,`notifications`.`vendor` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_inactive_names`
--
DROP TABLE IF EXISTS `vw_inactive_names`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inactive_names`  AS  select `vw_all_inactive_members`.`lnk_name` AS `lnk_name` from `vw_all_inactive_members` union select `is_pwcp_inactive`.`lnk_name` AS `lnk_name` from `is_pwcp_inactive` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_inventory`
--
DROP TABLE IF EXISTS `vw_inventory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory`  AS  select `skus`.`prodCode_grp` AS `prodCode`,`skus`.`prodName_grp` AS `prodName_common`,max(`skus_balance`.`onhand`) AS `onhand`,max(`skus_balance`.`sold`) AS `sold`,sum(`daily_ship`.`qty01`) AS `qty01`,sum(`daily_ship`.`qty02`) AS `qty02`,sum(`daily_ship`.`qty03`) AS `qty03`,sum(`daily_ship`.`qty04`) AS `qty04`,sum(`daily_ship`.`qty05`) AS `qty05`,sum(`daily_ship`.`qty06`) AS `qty06`,sum(`daily_ship`.`qty07`) AS `qty07`,sum(`daily_ship`.`qty08`) AS `qty08`,sum(`daily_ship`.`qty09`) AS `qty09`,sum(`daily_ship`.`qty10`) AS `qty10`,sum(`daily_ship`.`qty11`) AS `qty11`,sum(`daily_ship`.`qty12`) AS `qty12`,sum(`daily_ship`.`qty12`) AS `qty13`,sum(`daily_ship`.`qty04`) AS `qty4`,sum(`daily_ship`.`qty05`) AS `qty5`,sum(`daily_ship`.`qty07`) AS `qty7`,sum(`daily_ship`.`qty14`) AS `qty14`,sum(`daily_ship`.`qty30`) AS `qty30`,sum(`daily_ship`.`totalsold`) AS `totalsold` from ((`skus` left join `daily_ship` on((`skus`.`prodCode` = `daily_ship`.`item_number`))) left join `skus_balance` on((`skus`.`prodCode` = `skus_balance`.`sku_link`))) where ((`skus`.`prodCode` <> '1') and (`skus`.`prodCode` <> '2') and (`skus`.`prodCode` <> '3') and (`skus`.`prodCode` <> 'b-priority')) group by `skus`.`prodCode_grp`,`skus`.`prodName_grp` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_inventory_is`
--
DROP TABLE IF EXISTS `vw_inventory_is`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory_is`  AS  select `skus_is`.`sku` AS `prodCode`,`skus_is`.`sku` AS `sku`,`skus_is`.`sku_link` AS `sku_link`,`skus_balance_is`.`prodName_common` AS `prodName_common`,max(`skus_balance_is`.`onhand`) AS `onhand`,max(`skus_balance_is`.`sold`) AS `sold`,sum(`daily_ship_is`.`qty01`) AS `qty01`,sum(`daily_ship_is`.`qty02`) AS `qty02`,sum(`daily_ship_is`.`qty03`) AS `qty03`,sum(`daily_ship_is`.`qty04`) AS `qty04`,sum(`daily_ship_is`.`qty05`) AS `qty05`,sum(`daily_ship_is`.`qty06`) AS `qty06`,sum(`daily_ship_is`.`qty07`) AS `qty07`,sum(`daily_ship_is`.`qty08`) AS `qty08`,sum(`daily_ship_is`.`qty09`) AS `qty09`,sum(`daily_ship_is`.`qty10`) AS `qty10`,sum(`daily_ship_is`.`qty11`) AS `qty11`,sum(`daily_ship_is`.`qty12`) AS `qty12`,sum(`daily_ship_is`.`qty12`) AS `qty13`,sum(`daily_ship_is`.`qty04`) AS `qty4`,sum(`daily_ship_is`.`qty05`) AS `qty5`,sum(`daily_ship_is`.`qty07`) AS `qty7`,sum(`daily_ship_is`.`qty14`) AS `qty14`,sum(`daily_ship_is`.`qty30`) AS `qty30`,sum(`daily_ship_is`.`totalsold`) AS `totalsold` from ((`skus_is` left join `daily_ship_is` on((`skus_is`.`sku` = `daily_ship_is`.`sku`))) left join `skus_balance_is` on((`skus_is`.`sku_link` = `skus_balance_is`.`sku_link`))) where (`skus_is`.`sku` <> 'b-priority') group by `skus_is`.`sku`,`skus_is`.`sku_link`,`skus_balance_is`.`prodName_common` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_last_id`
--
DROP TABLE IF EXISTS `vw_last_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_last_id`  AS  select `billing`.`firstName` AS `firstName`,`billing`.`lastName` AS `lastName`,`billing`.`email` AS `email`,max(`notifications`.`id`) AS `LastID` from ((`billing` left join `notifications` on((`billing`.`lnkid` = `notifications`.`id`))) left join `lineItems` on((`notifications`.`id` = `lineItems`.`lnkid`))) where ((`lineItems`.`itemNo` like '%pwcp%') and (`notifications`.`transactionType` <> 'TEST') and (`notifications`.`transactionType` <> 'TEST_BILL') and (`notifications`.`transactionType` <> 'TEST_SALE') and (`notifications`.`receipt` <> 'N/A') and (`billing`.`firstName` <> '')) group by `billing`.`email` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_notification`
--
DROP TABLE IF EXISTS `vw_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_notification`  AS  select `notifications`.`id` AS `id`,date_format(`notifications`.`dt`,'%M %d %Y') AS `dt`,`notifications`.`vendor` AS `notifications_vendor`,`notifications`.`transactionTime` AS `notifications_transactionTime`,`notifications`.`receipt` AS `notifications_receipt`,`notifications`.`transactionType` AS `notifications_transactionType`,`billing`.`firstName` AS `billing_firstName`,`billing`.`lastName` AS `billing_lastName`,`billing`.`fullName` AS `billing_fullName`,`billing`.`phoneNumber` AS `billing_phoneNumber`,`billing`.`email` AS `billing_email`,`billing_address`.`state` AS `billing_state`,`billing_address`.`postalCode` AS `billing_postalCode`,`billing_address`.`country` AS `billing_country`,`shipping`.`firstName` AS `shipping_firstName`,`shipping`.`lastName` AS `shipping_lastName`,`shipping`.`fullName` AS `shipping_fullName`,`shipping`.`phoneNumber` AS `shipping_phoneNumber`,`shipping`.`email` AS `shipping_email`,`shipping_address`.`address1` AS `shipping_address1`,`shipping_address`.`address2` AS `shipping_address2`,`shipping_address`.`city` AS `shipping_city`,`shipping_address`.`county` AS `shipping_county`,`shipping_address`.`state` AS `shipping_state`,`shipping_address`.`postalCode` AS `shipping_postalCode`,`shipping_address`.`country` AS `shipping_country`,`lineItems`.`itemNo` AS `lineItems_itemNo`,`lineItems`.`productTitle` AS `lineItems_productTitle`,`lineItems`.`shippable` AS `lineItems_shippable`,`lineItems`.`recurring` AS `lineItems_recurring`,`lineItems`.`accountAmount` AS `lineItems_accountAmount`,`lineItems`.`quantity` AS `lineItems_quantity`,`lineItems`.`downloadUrl` AS `lineItems_downloadUrl`,`lineItems`.`productPrice` AS `lineItems_productPrice`,`lineItems`.`productDiscount` AS `lineItems_productDiscount`,`lineItems`.`taxAmount` AS `lineItems_taxAmount`,`lineItems`.`shippingAmount` AS `lineItems_shippingAmount`,`lineItems`.`shippingLiable` AS `lineItems_shippingLiable`,`lineItems`.`paymentsProcessed` AS `lineItems_paymentsProcessed`,`lineItems`.`paymentsRemaining` AS `lineItems_paymentsRemaining`,`lineItems`.`nextPaymentDate` AS `lineItems_nextPaymentDate`,`lineItems`.`affiliatePayout` AS `lineItems_affiliatePayout`,`lineItems`.`lineItemType` AS `lineItems_lineItemType`,`notifications`.`affiliate` AS `notifications_affiliate`,`notifications`.`role` AS `notifications_role`,`notifications`.`totalAccountAmount` AS `notifications_totalAccountAmount`,`notifications`.`paymentMethod` AS `notifications_paymentMethod`,`notifications`.`totalOrderAmount` AS `notifications_totalOrderAmount`,`notifications`.`totalTaxAmount` AS `notifications_totalTaxAmount`,`notifications`.`totalShippingAmount` AS `notifications_totalShippingAmount`,`notifications`.`currency` AS `notifications_currency`,`notifications`.`orderLanguage` AS `notifications_orderLanguage`,`notifications`.`version` AS `notifications_version`,`notifications`.`attemptCount` AS `notifications_attemptCount`,`trackingCodes`.`trackingCodes` AS `trackingCodes_trackingCodes`,`hopfeed`.`hopfeedClickId` AS `hopfeed_hopfeedClickId`,`hopfeed`.`hopfeedApplicationId` AS `hopfeed_hopfeedApplicationId`,`hopfeed`.`hopfeedCreativeId` AS `hopfeed_hopfeedCreativeId`,`hopfeed`.`hopfeedApplicationPayout` AS `hopfeed_hopfeedApplicationPayout`,`hopfeed`.`hopfeedVendorPayout` AS `hopfeed_hopfeedVendorPayout`,`upsell`.`upsellOriginalReceipt` AS `upsell_upsellOriginalReceipt`,`upsell`.`upsellFlowId` AS `upsell_upsellFlowId`,`upsell`.`upsellSession` AS `upsell_upsellSession`,`upsell`.`upsellPath` AS `upsell_upsellPath`,`vendorVariables`.`v1` AS `vendorVariables_v1`,`vendorVariables`.`v2` AS `vendorVariables_v2` from (((((((((`notifications` left join `lineItems` on((`lineItems`.`lnkid` = `notifications`.`id`))) left join `billing` on((`billing`.`lnkid` = `notifications`.`id`))) left join `billing_address` on((`billing_address`.`lnkid` = `notifications`.`id`))) left join `shipping` on((`shipping`.`lnkid` = `notifications`.`id`))) left join `shipping_address` on((`shipping_address`.`lnkid` = `notifications`.`id`))) left join `trackingCodes` on((`trackingCodes`.`lnkid` = `notifications`.`id`))) left join `upsell` on((`upsell`.`lnkid` = `notifications`.`id`))) left join `vendorVariables` on((`vendorVariables`.`lnkid` = `notifications`.`id`))) left join `hopfeed` on((`hopfeed`.`lnkid` = `notifications`.`id`))) where ((`notifications`.`vendor` = 'totalpat') and (`notifications`.`transactionType` <> 'TEST') and (`notifications`.`transactionType` <> 'TEST_SALE')) order by `notifications`.`id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pigman_canceled_members`
--
DROP TABLE IF EXISTS `vw_pigman_canceled_members`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pigman_canceled_members`  AS  select `vw_pigman_last_id`.`firstName` AS `firstName`,`vw_pigman_last_id`.`lastName` AS `lastName`,`vw_pigman_last_id`.`email` AS `email`,`vw_pigman_last_id`.`LastID` AS `LastID`,`pigman_notifications`.`transactionType` AS `transactionType` from (`vw_pigman_last_id` left join `pigman_notifications` on((`pigman_notifications`.`id` = `vw_pigman_last_id`.`LastID`))) where ((`pigman_notifications`.`transactionType` = 'CANCEL-REBILL') or (`pigman_notifications`.`transactionType` = 'RFND') or (`pigman_notifications`.`transactionType` = 'CGBK')) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pigman_last_id`
--
DROP TABLE IF EXISTS `vw_pigman_last_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cpses_cbxdma5bbz`@`localhost` SQL SECURITY DEFINER VIEW `vw_pigman_last_id`  AS  select `pigman_billing`.`firstName` AS `firstName`,`pigman_billing`.`lastName` AS `lastName`,`pigman_billing`.`email` AS `email`,max(`pigman_notifications`.`id`) AS `LastID` from ((`pigman_billing` left join `pigman_notifications` on((`pigman_billing`.`lnkid` = `pigman_notifications`.`id`))) left join `lineItems` on((`pigman_notifications`.`id` = `lineItems`.`lnkid`))) where ((`pigman_notifications`.`transactionType` <> 'TEST') and (`pigman_notifications`.`transactionType` <> 'TEST_BILL') and (`pigman_notifications`.`transactionType` <> 'TEST_SALE') and (`pigman_notifications`.`receipt` <> 'N/A') and (`pigman_billing`.`firstName` <> '')) group by `pigman_billing`.`email` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1`
--
ALTER TABLE `1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2`
--
ALTER TABLE `2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3`
--
ALTER TABLE `3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4`
--
ALTER TABLE `4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `5`
--
ALTER TABLE `5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `daily_ship`
--
ALTER TABLE `daily_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_ship_con`
--
ALTER TABLE `daily_ship_con`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_ship_is`
--
ALTER TABLE `daily_ship_is`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_ship_is_con`
--
ALTER TABLE `daily_ship_is_con`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hopfeed`
--
ALTER TABLE `hopfeed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `lineItems`
--
ALTER TABLE `lineItems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentPlan`
--
ALTER TABLE `paymentPlan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_`
--
ALTER TABLE `pigman_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pigman_billing`
--
ALTER TABLE `pigman_billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_billing_address`
--
ALTER TABLE `pigman_billing_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_lineItems`
--
ALTER TABLE `pigman_lineItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pigman_notifications`
--
ALTER TABLE `pigman_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pigman_shipping`
--
ALTER TABLE `pigman_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_shipping_address`
--
ALTER TABLE `pigman_shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_sku_ho_goal`
--
ALTER TABLE `pigman_sku_ho_goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pigman_trackingCodes`
--
ALTER TABLE `pigman_trackingCodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `pigman_transactionType`
--
ALTER TABLE `pigman_transactionType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pigman_upsell`
--
ALTER TABLE `pigman_upsell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pigman_vendorVariables`
--
ALTER TABLE `pigman_vendorVariables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodCode` (`prodCode`);

--
-- Indexes for table `skus_backup`
--
ALTER TABLE `skus_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodCode` (`prodCode`);

--
-- Indexes for table `skus_is`
--
ALTER TABLE `skus_is`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skus_nov26`
--
ALTER TABLE `skus_nov26`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodCode` (`prodCode`);

--
-- Indexes for table `skus_share_point`
--
ALTER TABLE `skus_share_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodCode` (`prodCode`);

--
-- Indexes for table `sku_ho_goal`
--
ALTER TABLE `sku_ho_goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackingCodes`
--
ALTER TABLE `trackingCodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `transactiontype`
--
ALTER TABLE `transactiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upsell`
--
ALTER TABLE `upsell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendorVariables`
--
ALTER TABLE `vendorVariables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lnkid` (`lnkid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1`
--
ALTER TABLE `1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2`
--
ALTER TABLE `2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `3`
--
ALTER TABLE `3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4`
--
ALTER TABLE `4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `5`
--
ALTER TABLE `5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_ship`
--
ALTER TABLE `daily_ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_ship_con`
--
ALTER TABLE `daily_ship_con`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_ship_is`
--
ALTER TABLE `daily_ship_is`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_ship_is_con`
--
ALTER TABLE `daily_ship_is_con`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hopfeed`
--
ALTER TABLE `hopfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lineItems`
--
ALTER TABLE `lineItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentPlan`
--
ALTER TABLE `paymentPlan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_`
--
ALTER TABLE `pigman_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_billing`
--
ALTER TABLE `pigman_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_billing_address`
--
ALTER TABLE `pigman_billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_lineItems`
--
ALTER TABLE `pigman_lineItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_notifications`
--
ALTER TABLE `pigman_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_shipping`
--
ALTER TABLE `pigman_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_shipping_address`
--
ALTER TABLE `pigman_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_sku_ho_goal`
--
ALTER TABLE `pigman_sku_ho_goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_trackingCodes`
--
ALTER TABLE `pigman_trackingCodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_transactionType`
--
ALTER TABLE `pigman_transactionType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_upsell`
--
ALTER TABLE `pigman_upsell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigman_vendorVariables`
--
ALTER TABLE `pigman_vendorVariables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus`
--
ALTER TABLE `skus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus_backup`
--
ALTER TABLE `skus_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus_is`
--
ALTER TABLE `skus_is`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus_nov26`
--
ALTER TABLE `skus_nov26`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus_share_point`
--
ALTER TABLE `skus_share_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sku_ho_goal`
--
ALTER TABLE `sku_ho_goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trackingCodes`
--
ALTER TABLE `trackingCodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactiontype`
--
ALTER TABLE `transactiontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upsell`
--
ALTER TABLE `upsell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendorVariables`
--
ALTER TABLE `vendorVariables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
