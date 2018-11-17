-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2018 at 09:52 AM
-- Server version: 10.1.37-MariaDB
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
-- Structure for view `vw_notification`
--
DROP TABLE IF EXISTS `vw_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cbpreparedpatrio`@`localhost` SQL SECURITY DEFINER VIEW `vw_notification`  AS  select `notifications`.`id` AS `id`,date_format(`notifications`.`dt`,'%M %d %Y') AS `dt`,`notifications`.`vendor` AS `notifications_vendor`,`notifications`.`transactionTime` AS `notifications_transactionTime`,`notifications`.`receipt` AS `notifications_receipt`,`notifications`.`transactionType` AS `notifications_transactionType`,`billing`.`firstName` AS `billing_firstName`,`billing`.`lastName` AS `billing_lastName`,`billing`.`fullName` AS `billing_fullName`,`billing`.`phoneNumber` AS `billing_phoneNumber`,`billing`.`email` AS `billing_email`,`billing_address`.`state` AS `billing_state`,`billing_address`.`postalCode` AS `billing_postalCode`,`billing_address`.`country` AS `billing_country`,`shipping`.`firstName` AS `shipping_firstName`,`shipping`.`lastName` AS `shipping_lastName`,`shipping`.`fullName` AS `shipping_fullName`,`shipping`.`phoneNumber` AS `shipping_phoneNumber`,`shipping`.`email` AS `shipping_email`,`shipping_address`.`address1` AS `shipping_address1`,`shipping_address`.`address2` AS `shipping_address2`,`shipping_address`.`city` AS `shipping_city`,`shipping_address`.`county` AS `shipping_county`,`shipping_address`.`state` AS `shipping_state`,`shipping_address`.`postalCode` AS `shipping_postalCode`,`shipping_address`.`country` AS `shipping_country`,`lineItems`.`itemNo` AS `lineItems_itemNo`,`lineItems`.`productTitle` AS `lineItems_productTitle`,`lineItems`.`shippable` AS `lineItems_shippable`,`lineItems`.`recurring` AS `lineItems_recurring`,`lineItems`.`accountAmount` AS `lineItems_accountAmount`,`lineItems`.`quantity` AS `lineItems_quantity`,`lineItems`.`downloadUrl` AS `lineItems_downloadUrl`,`lineItems`.`productPrice` AS `lineItems_productPrice`,`lineItems`.`productDiscount` AS `lineItems_productDiscount`,`lineItems`.`taxAmount` AS `lineItems_taxAmount`,`lineItems`.`shippingAmount` AS `lineItems_shippingAmount`,`lineItems`.`shippingLiable` AS `lineItems_shippingLiable`,`lineItems`.`paymentsProcessed` AS `lineItems_paymentsProcessed`,`lineItems`.`paymentsRemaining` AS `lineItems_paymentsRemaining`,`lineItems`.`nextPaymentDate` AS `lineItems_nextPaymentDate`,`lineItems`.`affiliatePayout` AS `lineItems_affiliatePayout`,`lineItems`.`lineItemType` AS `lineItems_lineItemType`,`notifications`.`affiliate` AS `notifications_affiliate`,`notifications`.`role` AS `notifications_role`,`notifications`.`totalAccountAmount` AS `notifications_totalAccountAmount`,`notifications`.`paymentMethod` AS `notifications_paymentMethod`,`notifications`.`totalOrderAmount` AS `notifications_totalOrderAmount`,`notifications`.`totalTaxAmount` AS `notifications_totalTaxAmount`,`notifications`.`totalShippingAmount` AS `notifications_totalShippingAmount`,`notifications`.`currency` AS `notifications_currency`,`notifications`.`orderLanguage` AS `notifications_orderLanguage`,`notifications`.`version` AS `notifications_version`,`notifications`.`attemptCount` AS `notifications_attemptCount`,`trackingCodes`.`trackingCodes` AS `trackingCodes_trackingCodes`,`hopfeed`.`hopfeedClickId` AS `hopfeed_hopfeedClickId`,`hopfeed`.`hopfeedApplicationId` AS `hopfeed_hopfeedApplicationId`,`hopfeed`.`hopfeedCreativeId` AS `hopfeed_hopfeedCreativeId`,`hopfeed`.`hopfeedApplicationPayout` AS `hopfeed_hopfeedApplicationPayout`,`hopfeed`.`hopfeedVendorPayout` AS `hopfeed_hopfeedVendorPayout`,`upsell`.`upsellOriginalReceipt` AS `upsell_upsellOriginalReceipt`,`upsell`.`upsellFlowId` AS `upsell_upsellFlowId`,`upsell`.`upsellSession` AS `upsell_upsellSession`,`upsell`.`upsellPath` AS `upsell_upsellPath`,`vendorVariables`.`v1` AS `vendorVariables_v1`,`vendorVariables`.`v2` AS `vendorVariables_v2` from (((((((((`notifications` left join `lineItems` on((`lineItems`.`lnkid` = `notifications`.`id`))) left join `billing` on((`billing`.`lnkid` = `notifications`.`id`))) left join `billing_address` on((`billing_address`.`lnkid` = `notifications`.`id`))) left join `shipping` on((`shipping`.`lnkid` = `notifications`.`id`))) left join `shipping_address` on((`shipping_address`.`lnkid` = `notifications`.`id`))) left join `trackingCodes` on((`trackingCodes`.`lnkid` = `notifications`.`id`))) left join `upsell` on((`upsell`.`lnkid` = `notifications`.`id`))) left join `vendorVariables` on((`vendorVariables`.`lnkid` = `notifications`.`id`))) left join `hopfeed` on((`hopfeed`.`lnkid` = `notifications`.`id`))) where ((`notifications`.`vendor` = 'totalpat') and (`notifications`.`transactionType` <> 'TEST') and (`notifications`.`transactionType` <> 'TEST_SALE')) order by `notifications`.`id` desc ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
