-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2022 at 05:42 AM
-- Server version: 5.7.32-35-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtzbwkpngrdpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '500% increase in total number of property showings', '2022-06-24 23:54:58', '2022-07-08 16:21:38'),
(2, 'Ability to show from your home or office, on any device with an internet connection', '2022-06-24 23:55:06', '2022-07-08 16:21:56'),
(3, 'No travel time required for showings, no traffic jams, no inconvenient last minute cancellations– which saves you money!', '2022-06-24 23:55:11', '2022-07-08 16:22:11'),
(4, 'Flexible showing time to meet your prospect\'s busy schedules– weekends and evenings are now possible', '2022-06-24 23:55:15', '2022-07-08 16:22:28'),
(5, '24 hour camera security for your properties', '2022-06-24 23:55:19', '2022-07-08 16:22:47'),
(6, 'Enjoyable process for clients– no pressure from an ever-present agent', '2022-06-24 23:55:23', '2022-07-08 16:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postalcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `customer_id`, `fullname`, `phonenumber`, `address1`, `address2`, `country_id`, `state`, `city`, `postalcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rigic Global Solutions Private Limited', '+919898598555', '201', 'shilalekh', 100, 'gujarat', 'surat', '395009', NULL, '2022-06-26 23:27:05'),
(2, 4, 'keyur patel patel', '+919898598555', '201', 'shilalekh', 103, 'gujarat', 'surat', '395009', '2022-06-26 23:30:25', '2022-06-26 23:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`id`, `number`, `title`, `text`, `content`, `created_at`, `updated_at`) VALUES
(1, '1', 'We send you the <br />Delet Kit', NULL, '<ul>\n                                <li>3 <span class=\"blue-color\">Delet</span> <strong>Surveillance Cameras</strong> for security and tour guidance</li>\n                                <li><span class=\"blue-color\">Delet</span> <strong>Video Conference Screen</strong> for video calls with your prospective clients </li>\n                               <li><span class=\"blue-color\">Delet</span> <strong> Smart Lock</strong> to remotely lock and unlock the property for showings</li>\n                            </ul>', '2022-06-25 00:05:40', '2022-07-08 16:11:26'),
(2, '2', 'Your kit is linked to your account on the Delet Software', NULL, '<ul><li>Schedule appointments and view property showings calendar </li> <li>Unlock and lock the property door with the click of a button</li><li>Meet with your potential clients via video call</li><li>Manage your properties, agents & clients</li><li>Keep records and notes of all showings and prospects</li></ul>', '2022-06-25 00:06:40', '2022-07-08 16:13:16'),
(3, '3', 'Let the showings <br/>begin!', NULL, '<ul><li>Unlock the door remotely using the <strong>Delet Software</strong></li><li>Communicate via video call on the video conference screen</li><li>Answer any questions or concerns about the property</li><li>Monitor at all times via the <strong>Delet Surveillance Cameras</strong></li></ul>', '2022-06-25 00:07:34', '2022-07-08 16:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `common_blocks`
--

CREATE TABLE `common_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `common_blocks`
--

INSERT INTO `common_blocks` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '500% more showings', '<p>Delet has proven to increase property showing amounts by 450%-550%. It ensures a quick and easy turnaround when it comes to home tours, and you save time and money by not having to leave your office.</p>', '2022-06-13 02:08:56', '2022-07-12 05:31:03'),
(2, 'Higher conversion rate', '<p>Prospective tenants tend to feel more confident to move forward with their lease when there is no agent present. Delet alleviates any pressure and offers a more enjoyable and relaxed showing.</p>', '2022-06-13 02:09:09', '2022-07-12 05:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sitelink` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `telephone`, `email`, `sitelink`, `created_at`, `updated_at`) VALUES
(1, '1120 S. Robertson Blvd LA </br>CA 90035 12', '310-926-7313', 'info@delet.com', 'https://www.delet.com', NULL, '2022-06-13 01:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL),
(2, 'Åland Islands', 'AX', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(3, 'Albania', 'AL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(4, 'Algeria', 'DZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(5, 'American Samoa', 'AS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(6, 'Andorra', 'AD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(7, 'Angola', 'AO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(8, 'Anguilla', 'AI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(9, 'Antarctica', 'AQ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(10, 'Antigua and Barbuda', 'AG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(11, 'Argentina', 'AR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(12, 'Armenia', 'AM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(13, 'Aruba', 'AW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(14, 'Australia', 'AU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(15, 'Austria', 'AT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(16, 'Azerbaijan', 'AZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(17, 'Bahamas', 'BS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(18, 'Bahrain', 'BH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(19, 'Bangladesh', 'BD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(20, 'Barbados', 'BB', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(21, 'Belarus', 'BY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(22, 'Belgium', 'BE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(23, 'Belize', 'BZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(24, 'Benin', 'BJ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(25, 'Bermuda', 'BM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(26, 'Bhutan', 'BT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(27, 'Bolivia, Plurinational State of', 'BO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(29, 'Bosnia and Herzegovina', 'BA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(30, 'Botswana', 'BW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(31, 'Bouvet Island', 'BV', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(32, 'Brazil', 'BR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(33, 'British Indian Ocean Territory', 'IO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(34, 'Brunei Darussalam', 'BN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(35, 'Bulgaria', 'BG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(36, 'Burkina Faso', 'BF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(37, 'Burundi', 'BI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(38, 'Cambodia', 'KH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(39, 'Cameroon', 'CM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(40, 'Canada', 'CA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(41, 'Cape Verde', 'CV', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(42, 'Cayman Islands', 'KY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(43, 'Central African Republic', 'CF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(44, 'Chad', 'TD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(45, 'Chile', 'CL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(46, 'China', 'CN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(47, 'Christmas Island', 'CX', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(48, 'Cocos (Keeling) Islands', 'CC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(49, 'Colombia', 'CO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(50, 'Comoros', 'KM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(51, 'Congo', 'CG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(52, 'Congo, the Democratic Republic of the', 'CD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(53, 'Cook Islands', 'CK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(54, 'Costa Rica', 'CR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(55, 'Côte d\'Ivoire', 'CI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(56, 'Croatia', 'HR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(57, 'Cuba', 'CU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(58, 'Curaçao', 'CW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(59, 'Cyprus', 'CY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(60, 'Czech Republic', 'CZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(61, 'Denmark', 'DK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(62, 'Djibouti', 'DJ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(63, 'Dominica', 'DM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(64, 'Dominican Republic', 'DO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(65, 'Ecuador', 'EC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(66, 'Egypt', 'EG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(67, 'El Salvador', 'SV', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(68, 'Equatorial Guinea', 'GQ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(69, 'Eritrea', 'ER', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(70, 'Estonia', 'EE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(71, 'Ethiopia', 'ET', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(72, 'Falkland Islands (Malvinas)', 'FK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(73, 'Faroe Islands', 'FO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(74, 'Fiji', 'FJ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(75, 'Finland', 'FI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(76, 'France', 'FR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(77, 'French Guiana', 'GF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(78, 'French Polynesia', 'PF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(79, 'French Southern Territories', 'TF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(80, 'Gabon', 'GA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(81, 'Gambia', 'GM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(82, 'Georgia', 'GE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(83, 'Germany', 'DE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(84, 'Ghana', 'GH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(85, 'Gibraltar', 'GI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(86, 'Greece', 'GR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(87, 'Greenland', 'GL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(88, 'Grenada', 'GD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(89, 'Guadeloupe', 'GP', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(90, 'Guam', 'GU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(91, 'Guatemala', 'GT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(92, 'Guernsey', 'GG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(93, 'Guinea', 'GN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(94, 'Guinea-Bissau', 'GW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(95, 'Guyana', 'GY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(96, 'Haiti', 'HT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(97, 'Heard Island and McDonald Mcdonald Islands', 'HM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(98, 'Holy See (Vatican City State)', 'VA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(99, 'Honduras', 'HN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(100, 'Hong Kong', 'HK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(101, 'Hungary', 'HU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(102, 'Iceland', 'IS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(103, 'India', 'IN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(104, 'Indonesia', 'ID', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(105, 'Iran, Islamic Republic of', 'IR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(106, 'Iraq', 'IQ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(107, 'Ireland', 'IE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(108, 'Isle of Man', 'IM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(109, 'Israel', 'IL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(110, 'Italy', 'IT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(111, 'Jamaica', 'JM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(112, 'Japan', 'JP', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(113, 'Jersey', 'JE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(114, 'Jordan', 'JO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(115, 'Kazakhstan', 'KZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(116, 'Kenya', 'KE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(117, 'Kiribati', 'KI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(118, 'Korea, Democratic People\'s Republic of', 'KP', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(119, 'Korea, Republic of', 'KR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(120, 'Kuwait', 'KW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(121, 'Kyrgyzstan', 'KG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(122, 'Lao People\'s Democratic Republic', 'LA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(123, 'Latvia', 'LV', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(124, 'Lebanon', 'LB', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(125, 'Lesotho', 'LS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(126, 'Liberia', 'LR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(127, 'Libya', 'LY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(128, 'Liechtenstein', 'LI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(129, 'Lithuania', 'LT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(130, 'Luxembourg', 'LU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(131, 'Macao', 'MO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(132, 'Macedonia, the Former Yugoslav Republic of', 'MK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(133, 'Madagascar', 'MG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(134, 'Malawi', 'MW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(135, 'Malaysia', 'MY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(136, 'Maldives', 'MV', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(137, 'Mali', 'ML', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(138, 'Malta', 'MT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(139, 'Marshall Islands', 'MH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(140, 'Martinique', 'MQ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(141, 'Mauritania', 'MR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(142, 'Mauritius', 'MU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(143, 'Mayotte', 'YT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(144, 'Mexico', 'MX', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(145, 'Micronesia, Federated States of', 'FM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(146, 'Moldova, Republic of', 'MD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(147, 'Monaco', 'MC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(148, 'Mongolia', 'MN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(149, 'Montenegro', 'ME', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(150, 'Montserrat', 'MS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(151, 'Morocco', 'MA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(152, 'Mozambique', 'MZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(153, 'Myanmar', 'MM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(154, 'Namibia', 'NA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(155, 'Nauru', 'NR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(156, 'Nepal', 'NP', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(157, 'Netherlands', 'NL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(158, 'New Caledonia', 'NC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(159, 'New Zealand', 'NZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(160, 'Nicaragua', 'NI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(161, 'Niger', 'NE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(162, 'Nigeria', 'NG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(163, 'Niue', 'NU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(164, 'Norfolk Island', 'NF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(165, 'Northern Mariana Islands', 'MP', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(166, 'Norway', 'NO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(167, 'Oman', 'OM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(168, 'Pakistan', 'PK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(169, 'Palau', 'PW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(170, 'Palestine, State of', 'PS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(171, 'Panama', 'PA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(172, 'Papua New Guinea', 'PG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(173, 'Paraguay', 'PY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(174, 'Peru', 'PE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(175, 'Philippines', 'PH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(176, 'Pitcairn', 'PN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(177, 'Poland', 'PL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(178, 'Portugal', 'PT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(179, 'Puerto Rico', 'PR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(180, 'Qatar', 'QA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(181, 'Réunion', 'RE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(182, 'Romania', 'RO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(183, 'Russian Federation', 'RU', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(184, 'Rwanda', 'RW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(185, 'Saint Barthélemy', 'BL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(187, 'Saint Kitts and Nevis', 'KN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(188, 'Saint Lucia', 'LC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(189, 'Saint Martin (French part)', 'MF', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(190, 'Saint Pierre and Miquelon', 'PM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(191, 'Saint Vincent and the Grenadines', 'VC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(192, 'Samoa', 'WS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(193, 'San Marino', 'SM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(194, 'Sao Tome and Principe', 'ST', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(195, 'Saudi Arabia', 'SA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(196, 'Senegal', 'SN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(197, 'Serbia', 'RS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(198, 'Seychelles', 'SC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(199, 'Sierra Leone', 'SL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(200, 'Singapore', 'SG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(201, 'Sint Maarten (Dutch part)', 'SX', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(202, 'Slovakia', 'SK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(203, 'Slovenia', 'SI', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(204, 'Solomon Islands', 'SB', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(205, 'Somalia', 'SO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(206, 'South Africa', 'ZA', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(207, 'South Georgia and the South Sandwich Islands', 'GS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(208, 'South Sudan', 'SS', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(209, 'Spain', 'ES', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(210, 'Sri Lanka', 'LK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(211, 'Sudan', 'SD', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(212, 'Suriname', 'SR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(213, 'Svalbard and Jan Mayen', 'SJ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(214, 'Swaziland', 'SZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(215, 'Sweden', 'SE', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(216, 'Switzerland', 'CH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(217, 'Syrian Arab Republic', 'SY', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(218, 'Taiwan', 'TW', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(219, 'Tajikistan', 'TJ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(220, 'Tanzania, United Republic of', 'TZ', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(221, 'Thailand', 'TH', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(222, 'Timor-Leste', 'TL', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(223, 'Togo', 'TG', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(224, 'Tokelau', 'TK', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(225, 'Tonga', 'TO', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(226, 'Trinidad and Tobago', 'TT', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(227, 'Tunisia', 'TN', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(228, 'Turkey', 'TR', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(229, 'Turkmenistan', 'TM', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(230, 'Turks and Caicos Islands', 'TC', '2022-06-14 02:12:18', '2022-06-14 02:12:18'),
(231, 'Tuvalu', 'TV', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(232, 'Uganda', 'UG', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(233, 'Ukraine', 'UA', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(234, 'United Arab Emirates', 'AE', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(235, 'United Kingdom', 'GB', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(236, 'United States', 'US', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(237, 'United States Minor Outlying Islands', 'UM', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(238, 'Uruguay', 'UY', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(239, 'Uzbekistan', 'UZ', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(240, 'Vanuatu', 'VU', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(241, 'Venezuela, Bolivarian Republic of', 'VE', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(242, 'Viet Nam', 'VN', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(243, 'Virgin Islands, British', 'VG', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(244, 'Virgin Islands, U.S.', 'VI', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(245, 'Wallis and Futuna', 'WF', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(246, 'Western Sahara', 'EH', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(247, 'Yemen', 'YE', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(248, 'Zambia', 'ZM', '2022-06-14 02:12:19', '2022-06-14 02:12:19'),
(249, 'Zimbabwe', 'ZW', '2022-06-14 02:12:19', '2022-06-14 02:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `startdate`, `enddate`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'ERTTYSUI', '2022-07-08', '2022-07-09', 10, '2022-07-07 04:24:45', '2022-07-08 01:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keyur', 'keyur@example.com', NULL, '$2y$10$spEG58jZ5GaYV34ta5Hxle9H4mZF2KySAdk90OuU70o2WXl9KPzU6', NULL, '2022-06-14 02:04:41', '2022-06-16 00:46:05'),
(4, 'hiral', 'hiral@rigicgspl.com', '2022-06-16 01:21:18', '$2y$10$iZLQCXQqsZBq9smHf7oSDOKvceJcDK/QQ6HWHhVSuLYKKhVj0WGTW', NULL, '2022-06-16 01:05:54', '2022-06-16 01:21:18'),
(5, 'keyur', 'keyurpatel@example.com', NULL, '$2y$10$LqjY5w/46W.dEdvnNIcxeek3FQwYMgk/Ofc81MupNthP.Lg1Hp746', NULL, '2022-06-17 00:43:45', '2022-06-17 00:43:45'),
(6, 'Malay Desai', 'malay@rigicgspl.com', '2022-06-17 01:24:46', '$2y$10$zO9zHpM.DsLg6OV9OY09OOlsmY.XmuaooRCJurSt989P0PGvnTdg6', NULL, '2022-06-17 01:24:33', '2022-06-17 01:24:46'),
(7, 'jay patel', 'jay@example.com', NULL, '$2y$10$9vKMysa1H9jmaJ9Hf30ltO2EB4t453Dsh5OaAJP6uMTXb9n5.9I/e', NULL, '2022-06-17 01:25:56', '2022-06-20 00:33:37'),
(8, 'jay joshi', 'jay@yopmail.com', '2022-06-19 22:39:17', '$2y$10$zO9zHpM.DsLg6OV9OY09OOlsmY.XmuaooRCJurSt989P0PGvnTdg6', NULL, '2022-06-19 22:39:07', '2022-06-20 01:04:09'),
(9, 'Keyur Patel', 'keyurdeltest@yopmail.com', '2022-06-29 12:38:14', '$2y$10$XtfLrJ5iDI7Ad6OGzsIZ4.wYrSj9aEzZy0KMcmNaEf3Dfg4.Mqf3C', NULL, '2022-06-29 12:37:56', '2022-06-29 12:38:14'),
(10, 'Delet / 123', 'Eavlytesting@gmail.com', '2022-06-29 17:23:07', '$2y$10$b4Gcw9yhb8dnS0c175jtSOiDx8iTZiUk4.g9zy7en2a1VehIt.wWi', NULL, '2022-06-29 17:22:17', '2022-06-29 20:50:33'),
(11, 'Rob', 'rob@yopmail.com', '2022-07-05 04:15:04', '$2y$10$oMhX4OQy6qznZDHU.vNE3uazJdjoEcYQGBzxatYTYb.LGVyT727S.', NULL, '2022-07-05 04:10:34', '2022-07-05 04:15:04'),
(12, 'john wisdon', 'john123@gmail.com', NULL, '$2y$10$TqnqOgr7zsk3akx2Fbd7Jevxnv9uXLDZoP9Delqoj4MhqaUpPAkKa', NULL, '2022-07-05 04:53:20', '2022-07-05 04:53:20'),
(13, 'John wisdon', 'john123@yopmail.com', '2022-07-05 04:54:19', '$2y$10$VHf1coJy9vEKHsBEbE3lwu1WsIYijxfSegTqb1N29uH9lE2ZlE.Sm', NULL, '2022-07-05 04:53:49', '2022-07-05 04:56:47'),
(14, 'JayKishan', 'admin17@gmail.com', NULL, '$2y$10$ysPcjKysjLPCKwrDP5br1eOr6rrYB7YTiCd7mZWrArr4NGtHH2FOq', NULL, '2022-07-05 07:15:55', '2022-07-05 07:15:55'),
(15, 'test', 'test@yopmail.com', '2022-07-06 11:58:59', '$2y$10$fCJJqQmtYrLL8mZx4lePLedl7j4eW2Bnit1MFN3iQmYcw3/I0uOee', NULL, '2022-07-06 11:58:46', '2022-07-06 11:58:59'),
(16, 'Dharav', 'dharav@yopmail.com', '2022-07-08 14:00:38', '$2y$10$S0PwTlVkwCjLypIrH/bVgeJHoMcn1Q/CIIYhX35qP82bo.HxAWIh6', NULL, '2022-07-08 13:59:46', '2022-07-08 14:00:38'),
(17, 'Delet Testing', 'Shayna@delet.com', '2022-07-08 20:26:07', '$2y$10$G4sXhCiySh0j1nTHz.8KaulsVJUtZXhKArE7RBA3JUl9akX847UFO', NULL, '2022-07-08 20:25:36', '2022-07-08 20:26:07'),
(18, 'Cristi Banu', 'chris.bannu@gmail.com', '2022-07-10 09:17:26', '$2y$10$ocI1EUdx8UepVFgeBl5xxud0Uh7D2/4mkmceDm4522KmzP8iMAnXy', NULL, '2022-07-10 09:17:12', '2022-07-10 09:17:26'),
(19, 'Delet inc', 'Info@delet.com', '2022-07-11 19:06:37', '$2y$10$x7jmLQrLMrhKdfqGr0lqrOzKUWCSE3VH/TE8cfSHKL7D9ldzCFwuu', NULL, '2022-07-11 19:04:43', '2022-07-11 19:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Client Management', 'features/icon-client-management.svg', '<p>The Delet software saves prospective client contact information, making it easy to reach out and respond to inquiries.</p>', '2022-06-13 02:15:10', '2022-07-09 11:03:51'),
(3, 'High-Tech Security', 'features/icon-high-tech-security.svg', '<p>Delet provides top-notch security with the 3 convenient plug-in surveillance cameras, the remote access lock only you and your agents can control, and personalized logins for all your employees.</p>', '2022-06-13 02:16:08', '2022-07-09 11:05:04'),
(4, 'Convenient Scheduling', 'features/icon-automated-scheduling.svg', '<p>Prospective tenants can use the electronic appointment scheduling system to book showings with ease.</p>', '2022-06-13 02:16:37', '2022-07-09 11:05:57'),
(5, 'Easy-to-Use Software', 'features/icon-easy-to-use-software.svg', '<p>With the intuitive workflow, you’ll save time and energy on those tedious daily tasks. Our support team is always ready to help as well.</p>', '2022-06-13 02:17:09', '2022-07-09 11:06:21'),
(6, 'Reusable Equipment', 'features/icon-reusable-equipment.svg', '<p>Once a property is sold or rented out, the lock and entire system are easy to uninstall and ready to be used again at your next listing.</p>', '2022-06-13 02:17:43', '2022-07-09 11:07:13'),
(7, 'Enhanced Privacy', 'features/icon-enhanced-privacy.svg', '<p>With no pressure from an agent present, your prospects will feel at home while viewing the property and be ready to make the move in no time.</p>', '2022-06-13 02:18:09', '2022-06-13 02:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bannertext` text COLLATE utf8_unicode_ci NOT NULL,
  `videotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videourl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title1text` text COLLATE utf8_unicode_ci NOT NULL,
  `benefittitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flowtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flowcontent` text COLLATE utf8_unicode_ci,
  `featuredpacktitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testimonialstitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `bannertext`, `videotitle`, `videourl`, `title1text`, `benefittitle`, `flowtitle`, `flowcontent`, `featuredpacktitle`, `testimonialstitle`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"blue-text\">Renting out or selling properties?</div>\n<h1>Try remote agent showings</h1>\n<p>Our state-of-art software and equipment offers agents the ability to show properties to potential tenants right from their office or home.</p>\n<div class=\"banner-bullet\">\n	<ul>\n		<li><i class=\"far fa-check\"></i> 500% more showings in the same time interval</li>\n		<li><i class=\"far fa-check\"></i> Better conversion rate per number of showings</li>\n	</ul>\n</div>\n<div class=\"banner-btn\"><a href=\"how-it-works.html\" class=\"btn-blue\">SHOW ME HOW</a></div>', 'Spend less, earn more', '/assets/images/movie.mp4', 'Show 5x the amount of homes', 'You’ll benefit from', 'The Flow', '<h3 class=\"h3-left\">THE FLOW</h3>\n                        <ol>\n                            <li>Set up equipment in 5 minutes</li>\n                            <li>Provide client link to book appointment and upload ID</li><li>View scheduling calendar</li>\n                            <li>Showing time!</li>\n                            <li>Unlock door remotely from your personal device</li><li>Communicate with client through video conference screen</li><li>Monitor tour via surveillance cameras</li>\n                            <li>Answer any questions and lock up, all from your home or office</li>\n                        </ol>\n                        <h3 class=\"h3-right\">THE FLOW</h3>', 'Feature packed, easy to use', 'Great experience, happy clients', '2022-06-13 03:23:00', '2022-07-08 16:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `inquiry_type`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'general', 'Keyur Patel', 'keyur@rigicglobalsolutions.com', '+919638464855', 'Hello This is a test', '2022-06-30 09:55:41', '2022-06-30 09:55:41'),
(2, 'general', 'keyur patel patel', 'keyur@example.com', '+919898598555', 'Nice', '2022-06-30 09:58:07', '2022-06-30 09:58:07'),
(3, 'general', 'dger', 'wet@c.c', NULL, NULL, '2022-07-05 05:03:52', '2022-07-05 05:03:52'),
(4, 'sales', 'dfqd', 'test@yopmail.com', NULL, NULL, '2022-07-05 05:07:19', '2022-07-05 05:07:19'),
(5, 'consultation', 'firstname', 'newTest@yopmail.com', '9879599564', 'This is testing', '2022-07-05 05:07:55', '2022-07-05 05:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_064738_create_contacts_table', 2),
(6, '2022_06_13_070029_create_social_media_table', 3),
(7, '2022_06_13_073320_create_common_blocks_table', 4),
(8, '2022_06_13_073953_create_features_table', 5),
(9, '2022_06_13_075256_create_testimonials_table', 6),
(10, '2022_06_13_082737_create_settings_table', 7),
(11, '2022_06_13_084028_create_steps_table', 8),
(12, '2022_06_13_084636_create_home_pages_table', 9),
(13, '2022_06_13_112316_create_customers_table', 10),
(14, '2022_06_14_074020_create_countries_table', 11),
(15, '2022_06_14_074443_create_billing_addresses_table', 12),
(16, '2022_06_14_075144_create_shipping_addresses_table', 13),
(17, '2022_06_21_060008_create_products_table', 14),
(18, '2022_06_23_110942_create_orders_table', 15),
(19, '2022_06_23_111933_create_order_items_table', 16),
(20, '2022_06_25_052233_create_benefits_table', 17),
(21, '2022_06_25_053115_create_boxes_table', 18),
(25, '2022_06_27_055452_create_tickets_table', 19),
(26, '2022_06_27_055500_create_ticket_replies_table', 19),
(27, '2022_06_27_055518_create_reply_attachments_table', 19),
(28, '2022_06_29_063046_create_subscriptions_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(21, 8, 649, 'Order Placed', '2022-06-29 01:08:40', '2022-06-29 01:08:40'),
(22, 8, 1298, 'Order Placed', '2022-06-29 01:10:37', '2022-06-29 01:10:37'),
(23, 8, 17880, 'Order Placed', '2022-06-29 06:32:46', '2022-06-29 06:32:46'),
(24, 9, 1298, 'Order Placed', '2022-06-29 12:46:56', '2022-06-29 12:46:56'),
(25, 10, 1298, 'Order Placed', '2022-06-29 17:25:10', '2022-06-29 17:25:10'),
(26, 11, 649, 'Order Placed', '2022-07-05 04:21:39', '2022-07-05 04:21:39'),
(27, 11, 18529, 'Order Placed', '2022-07-05 04:35:37', '2022-07-05 04:35:37'),
(28, 11, 18529, 'Order Placed', '2022-07-05 04:35:45', '2022-07-05 04:35:45'),
(29, 11, 18529, 'Order Placed', '2022-07-05 04:35:55', '2022-07-05 04:35:55'),
(30, 11, 18529, 'Order Placed', '2022-07-05 04:36:12', '2022-07-05 04:36:12'),
(31, 11, 18529, 'Order Placed', '2022-07-05 04:36:20', '2022-07-05 04:36:20'),
(32, 11, 18529, 'Order Placed', '2022-07-05 04:37:39', '2022-07-05 04:37:39'),
(33, 11, 18529, 'Order Placed', '2022-07-05 04:43:32', '2022-07-05 04:43:32'),
(34, 11, 18529, 'Order Placed', '2022-07-05 04:44:16', '2022-07-05 04:44:16'),
(35, 11, 54289, 'Order Placed', '2022-07-05 05:32:12', '2022-07-05 05:32:12'),
(36, 16, 347, 'Order Placed', '2022-07-08 14:01:29', '2022-07-08 14:01:29'),
(37, 17, 49, 'Order Placed', '2022-07-08 20:27:51', '2022-07-08 20:27:51'),
(38, 17, 49, 'Order Placed', '2022-07-08 20:28:53', '2022-07-08 20:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `title`, `price`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 21, 'Individual', 149, 1, 149, '2022-06-29 01:08:40', '2022-06-29 01:08:40'),
(2, 21, 'deposites', 500, 1, 500, '2022-06-29 01:08:40', '2022-06-29 01:08:40'),
(3, 22, 'Individual', 149, 2, 298, '2022-06-29 01:10:37', '2022-06-29 01:10:37'),
(4, 22, 'deposites', 500, 2, 1000, '2022-06-29 01:10:37', '2022-06-29 01:10:37'),
(5, 23, 'Agency', 1788, 10, 17880, '2022-06-29 06:32:46', '2022-06-29 06:32:46'),
(6, 24, 'Individual', 149, 2, 298, '2022-06-29 12:46:56', '2022-06-29 12:46:56'),
(7, 24, 'deposites', 500, 2, 1000, '2022-06-29 12:46:56', '2022-06-29 12:46:56'),
(8, 25, 'Individual', 149, 2, 298, '2022-06-29 17:25:10', '2022-06-29 17:25:10'),
(9, 25, 'deposites', 500, 2, 1000, '2022-06-29 17:25:10', '2022-06-29 17:25:10'),
(10, 26, 'Individual', 149, 1, 149, '2022-07-05 04:21:39', '2022-07-05 04:21:39'),
(11, 26, 'deposites', 500, 1, 500, '2022-07-05 04:21:39', '2022-07-05 04:21:39'),
(12, 27, 'Individual', 149, 1, 149, '2022-07-05 04:35:37', '2022-07-05 04:35:37'),
(13, 27, 'deposites', 500, 1, 500, '2022-07-05 04:35:37', '2022-07-05 04:35:37'),
(14, 27, 'Agency', 1788, 10, 17880, '2022-07-05 04:35:37', '2022-07-05 04:35:37'),
(15, 28, 'Individual', 149, 1, 149, '2022-07-05 04:35:45', '2022-07-05 04:35:45'),
(16, 28, 'deposites', 500, 1, 500, '2022-07-05 04:35:45', '2022-07-05 04:35:45'),
(17, 28, 'Agency', 1788, 10, 17880, '2022-07-05 04:35:45', '2022-07-05 04:35:45'),
(18, 29, 'Individual', 149, 1, 149, '2022-07-05 04:35:55', '2022-07-05 04:35:55'),
(19, 29, 'deposites', 500, 1, 500, '2022-07-05 04:35:55', '2022-07-05 04:35:55'),
(20, 29, 'Agency', 1788, 10, 17880, '2022-07-05 04:35:55', '2022-07-05 04:35:55'),
(21, 30, 'Individual', 149, 1, 149, '2022-07-05 04:36:12', '2022-07-05 04:36:12'),
(22, 30, 'deposites', 500, 1, 500, '2022-07-05 04:36:12', '2022-07-05 04:36:12'),
(23, 30, 'Agency', 1788, 10, 17880, '2022-07-05 04:36:12', '2022-07-05 04:36:12'),
(24, 31, 'Individual', 149, 1, 149, '2022-07-05 04:36:20', '2022-07-05 04:36:20'),
(25, 31, 'deposites', 500, 1, 500, '2022-07-05 04:36:20', '2022-07-05 04:36:20'),
(26, 31, 'Agency', 1788, 10, 17880, '2022-07-05 04:36:20', '2022-07-05 04:36:20'),
(27, 32, 'Individual', 149, 1, 149, '2022-07-05 04:37:39', '2022-07-05 04:37:39'),
(28, 32, 'deposites', 500, 1, 500, '2022-07-05 04:37:39', '2022-07-05 04:37:39'),
(29, 32, 'Agency', 1788, 10, 17880, '2022-07-05 04:37:39', '2022-07-05 04:37:39'),
(30, 33, 'Individual', 149, 1, 149, '2022-07-05 04:43:32', '2022-07-05 04:43:32'),
(31, 33, 'deposites', 500, 1, 500, '2022-07-05 04:43:32', '2022-07-05 04:43:32'),
(32, 33, 'Agency', 1788, 10, 17880, '2022-07-05 04:43:32', '2022-07-05 04:43:32'),
(33, 34, 'Individual', 149, 1, 149, '2022-07-05 04:44:16', '2022-07-05 04:44:16'),
(34, 34, 'deposites', 500, 1, 500, '2022-07-05 04:44:16', '2022-07-05 04:44:16'),
(35, 34, 'Agency', 1788, 10, 17880, '2022-07-05 04:44:16', '2022-07-05 04:44:16'),
(36, 35, 'Individual', 149, 1, 149, '2022-07-05 05:32:12', '2022-07-05 05:32:12'),
(37, 35, 'deposites', 500, 1, 500, '2022-07-05 05:32:12', '2022-07-05 05:32:12'),
(38, 35, 'Agency', 1788, 30, 53640, '2022-07-05 05:32:12', '2022-07-05 05:32:12'),
(39, 36, 'Premium Package', 149, 1, 149, '2022-07-08 14:01:29', '2022-07-08 14:01:29'),
(40, 36, 'Advanced Package', 99, 2, 198, '2022-07-08 14:01:29', '2022-07-08 14:01:29'),
(41, 37, 'Basic Package', 49, 1, 49, '2022-07-08 20:27:51', '2022-07-08 20:27:51'),
(42, 38, 'Basic Package', 49, 1, 49, '2022-07-08 20:28:53', '2022-07-08 20:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('keyur@example.com', 'WlTXPSz84064bKEkGvxP7zDTYeME3ZmrigZTjc3L5NS5gEIHo00rnv6eulNvh9yu', '2022-06-16 04:22:53'),
('keyur@example.com', 'kZTzlMiWoM0q8nCVxyrS0vvs4c2LI3XMxLP4NF5KN8AcBgXzJOpyUF5lYE3Zlpai', '2022-06-16 04:23:11'),
('hiral@rigicgspl.com', 'Lddtla7M1zgVhvXlnmoWnvJZ1nqXv5Ux4nJDkhL3U4ybewD7ZhHXhA7ahaFjgtnI', '2022-06-16 23:25:01'),
('hiral@rigicgspl.com', 'pm1rgJMIpnkDvea6ngypEAWjdQPebAhc7MjsIxgLVIjEmawcb78DGoJgNzevKtFc', '2022-06-16 23:26:15'),
('hiral@rigicgspl.com', 'j4H2KCtcgw8NbGwCwIr02MzbWGQx7sX6VBbHJCmmsPAsg2xG9FVaKx3v7RF1oL6B', '2022-06-16 23:26:21'),
('hiral@rigicgspl.com', 'ELqW2IuZqp3OpuQPkXsEcnKoSSOUPAuBMCRxinH7sVAM2Z8PEl5iaTUrhwCexdc5', '2022-06-16 23:26:52'),
('hiral@rigicgspl.com', 'pfUijUCWJQWvvt2uSzqByYxnyf7pnZdTDqobEFxJuEuFR0VUTU0BpM7lxDO1EPwB', '2022-06-16 23:27:44'),
('hiral@rigicgspl.com', 'VWZW0gDnHGkbSbaYwW3xwG9cY8dUiy2g4zC4GbUINeOEUvoxEwyBnY0dbTkZ6Cs0', '2022-06-16 23:28:21'),
('hiral@rigicgspl.com', 'UZNAYLDM7HAyFcasexyEfjKQ6Dc7vyyc2CVGhV8glOX95MQOOiGCrBBJI4VGXloC', '2022-06-16 23:29:45'),
('hiral@rigicgspl.com', 'o3KguvEtgJ1rNGQIE3ywn5afgGCi2AkZxNulo8jIEAKdRLTydgzRcRnsxkohzxCj', '2022-06-16 23:30:33'),
('hiral@rigicgspl.com', 'tC7SkwZiVGx9UyZsIC5WaDvX1lYNeoDMpGSixQjmHayK1bPjQEVA1byQadYUEQ5x', '2022-06-16 23:32:20'),
('hiral@rigicgspl.com', '3BfWoF5jwkJXZsgq9qiEFRlZa2pBbd0u6gthXzXvFnIfXgTmdfM85fkYwxszhuke', '2022-06-16 23:32:49'),
('hiral@rigicgspl.com', 'MDAFKL6nMPJFcNWVLhuQ8KWHOCN6gzoLxXqx63M4So04dq5BDLsHC2WFLh3ewaiL', '2022-06-16 23:33:54'),
('hiral@rigicgspl.com', 'XiWTtWnoOHR3d1wBtkIhuUY3VsgNZzDP3mA0DIcGcxUmA1IbUPdDr2QDoEJOTbEM', '2022-06-16 23:34:23'),
('hiral@rigicgspl.com', 'bFdFu5t3UpjUBDbXUFuSR37h98cdTvqkNeZrMRm72KVeljmtvjZCC1grWN1r9bBh', '2022-06-16 23:35:06'),
('hiral@rigicgspl.com', 'OW9vHe3OkwsT43uikJ2gGlJ9wN1libzREhBjIlTBmdBFm1nCOt4Q3HzC82m87bbV', '2022-06-16 23:35:22'),
('rob@yopmail.com', '0hu4vISEuFGBMVeHPWIUXGOXuu4N9KpvOsABh6Cq9cfO1QxLGYcS1pInVvLRdWBF', '2022-07-05 05:28:35'),
('rob@yopmail.com', '30A74l9iWTeB4BrYNgI8JADaaR9YtbkgIre8Z5w0OxbaMe48DwiAqZdW7ComYDLy', '2022-07-05 05:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `mimumqty` int(11) NOT NULL DEFAULT '1',
  `softwareprice` double NOT NULL DEFAULT '0',
  `deposite` double NOT NULL DEFAULT '0',
  `hardware_included` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `frquency` enum('Monthly','Yearly') COLLATE utf8_unicode_ci NOT NULL,
  `stripe_price_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `price`, `mimumqty`, `softwareprice`, `deposite`, `hardware_included`, `description`, `frquency`, `stripe_price_id`, `created_at`, `updated_at`) VALUES
(1, 'Basic Package', 'Basic', 49, 1, 0, 0, '<ul><li>1 X Smart Lock</li></ul>', '<ul><li>CRM access for multiple users</li><li>Clients management</li><li>Properties management</li><li>Showing management</li><li>Automated scheduling</li><li>Hi Tech security</li><li>Reusable equipment</li></ul>', 'Monthly', 'price_1LDkeEFUgux1bk9xADTmRzy3', '2022-06-21 00:46:14', '2022-07-06 18:26:11'),
(2, 'Advanced Package', 'Advanced', 99, 1, 0, 0, '<ul><li>1 X Smart Lock</li><li>3 X Security Cameras&nbsp;</li></ul>', '<ul><li>CRM access for multiple users</li><li>Clients management</li><li>Properties management</li><li>Showing management</li><li>Automated scheduling</li><li>Hi Tech security</li><li>Reusable equipment</li></ul>', 'Monthly', 'price_1LDkeEFUgux1bk9xubjCvaph', '2022-06-21 00:54:07', '2022-07-06 17:52:31'),
(3, 'Premium Package', 'Premium', 149, 1, 0, 0, '<ul><li>1 X Smart Lock</li><li>3 X Security Cameras&nbsp;</li><li>1 X video Conference Screen&nbsp;</li></ul>', '<ul><li>CRM access for multiple users</li><li>Clients management</li><li>Properties management</li><li>Showing management</li><li>Automated scheduling</li><li>Hi Tech security</li><li>Reusable equipment</li></ul>', 'Monthly', NULL, '2022-07-06 11:56:14', '2022-07-06 17:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `reply_attachments`
--

CREATE TABLE `reply_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_reply_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headerlogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footerlogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footercontent` text COLLATE utf8_unicode_ci NOT NULL,
  `trytitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trydescription` text COLLATE utf8_unicode_ci NOT NULL,
  `trybuttontext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trybuttonlink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `howitworktitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `howitworkcontent` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `headerlogo`, `footerlogo`, `footercontent`, `trytitle`, `trydescription`, `trybuttontext`, `trybuttonlink`, `howitworktitle`, `howitworkcontent`, `created_at`, `updated_at`) VALUES
(1, 'setting/logo.svg', 'setting/logo.svg', 'State-of-the art software and equipment that allows you to provide showings to potential tenants without leaving your office or home, saving you time, energy, and money, while also being more convenient for your clients.', 'try', 'Schedule your free consultation today to learn more about how our services can help your agency.', 'free consultation', '/contact-us', 'Showings just got easier', '<p><strong>Delet</strong>’s intuitive digital property showing software will have you renting out vacant properties with productivity, speed, and convenience.</p>', '2022-06-13 03:07:19', '2022-07-09 10:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postalcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `customer_id`, `fullname`, `phonenumber`, `address1`, `address2`, `country_id`, `state`, `city`, `postalcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rob Johnson', '9885698568', '33,Douglous', NULL, 236, 'California', 'Bangalore', '3301023', '2022-06-20 05:34:16', '2022-07-05 04:31:18'),
(5, 4, 'keyur patel patel', '+919898598555', '201', 'shilalekh', 103, 'gujarat', 'surat', '395009', '2022-06-26 23:30:25', '2022-06-26 23:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `title`, `image`, `link`, `created_at`, `updated_at`) VALUES
(5, 'Facebook', 'socialmedia/icon-facebook.svg', 'https://www.facebook.com/deletusa', '2022-06-13 01:52:52', '2022-06-13 02:00:10'),
(6, 'Instagram', 'socialmedia/icon-instagram.svg', 'https://www.instagram.com/deletinc/', '2022-06-13 02:01:04', '2022-06-13 02:01:04'),
(7, 'Tiktok', 'socialmedia/icon-tiktok.svg', 'https://www.tiktok.com/@deletusa', '2022-06-13 02:01:41', '2022-06-13 02:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stepnumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `title`, `stepnumber`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Equipment', '1', '<p>You have the option to install the technology package yourself, or someone from our team can do it for an additional fee. Your properties will be secure and only available to enter when you provide prospective tenants with access via the remote system.</p>', 'steps/how-it-work-step-1.svg', '2022-06-13 03:13:30', '2022-07-08 16:32:00'),
(2, 'Appointment', '2', '<p>Once you approve an appointment, Delet’s system sends confirmation to the client. You can either unlock the property from your computer, or have the system send a unique link 5 minutes before the showing for the prospect to do it themselves.&nbsp;</p>', 'steps/how-it-work-step-2.svg', '2022-06-13 03:14:05', '2022-07-08 16:32:24'),
(3, 'Welcome', '3', '<p>Once prospective tenants have entered the property, you can greet them and answer questions from the communication portal. Prospects will love the freedom to roam their new home with the comfort of a zero-pressure environment.</p>', 'steps/how-it-work-step-3.svg', '2022-06-13 03:14:43', '2022-07-08 16:32:44'),
(4, 'Signing', '4', '<p>Since contact-free showings have proven to have a higher conversion rate than showings with an agent present, turning a lead into a client will be more effective for both parties. Lease signing can be easily completed online via the software.</p>', 'steps/how-it-work-step-4.svg', '2022-06-13 03:15:27', '2022-07-08 16:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_amount` double DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `subscriptionid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_period_start` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_period_end` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_invoice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jsonresponse` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscription_amount`, `customer_id`, `order_id`, `subscriptionid`, `current_period_start`, `current_period_end`, `latest_invoice`, `jsonresponse`, `created_at`, `updated_at`) VALUES
(1, 149, 8, 21, 'sub_1LFuXvFUgux1bk9xOIFvCRe1', '1656484723', '1659076723', 'in_1LFuXvFUgux1bk9xBWe1WKnU', NULL, '2022-06-28 06:54:32', '2022-06-29 06:54:38'),
(2, 298, 8, 22, 'sub_1LFuZoFUgux1bk9xAIMxIUyd', '1656484840', '1659076840', 'in_1LFuZoFUgux1bk9xARKlHRB1', '', '2022-06-29 01:10:43', '2022-06-29 01:10:43'),
(3, 298, 9, 24, 'sub_1LG0IIFUgux1bk9x3QiY4wGB', '1656506818', '1659098818', 'in_1LG0IIFUgux1bk9xkKa29W3T', '', '2022-06-29 12:47:01', '2022-06-29 12:47:01'),
(4, 298, 10, 25, 'sub_1LG4dZFUgux1bk9xqSd3ngYA', '1656523513', '1659115513', 'in_1LG4dZFUgux1bk9xPkPP2qHS', '', '2022-06-29 17:25:15', '2022-06-29 17:25:15'),
(5, 149, 11, 26, 'sub_1LI3GcFUgux1bk9xyiCo2DCS', '1656994902', '1659673302', 'in_1LI3GcFUgux1bk9xGR8WMfJQ', '', '2022-07-05 04:21:44', '2022-07-05 04:21:44'),
(6, 0, 16, 36, 'sub_1LJHkMFUgux1bk9xTpjDHvOM', '1657288890', '1659967290', 'in_1LJHkNFUgux1bk9xQioOPMEP', '', '2022-07-08 14:01:33', '2022-07-08 14:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `position`, `company`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Michael Williams', 'CEO', 'Live Side', 'testimonials/client-1.jpg', 'Delet helped our agency tremendously, now we rent twice as many properties in the sasme amount of time.', '2022-06-13 02:30:00', '2022-06-13 02:30:00'),
(2, 'linda james', 'ceo', 'Urban Rent', 'testimonials/client-2.jpg', 'The software is extremely easy to use, and our agents can now cater for a lot more potential tenants. No more wasted time in traffic, everything gets done a lot quicker.', '2022-06-13 02:30:33', '2022-06-13 02:30:33'),
(3, 'jessica donovan', 'agent', 'Dominique', 'testimonials/client-4.jpg', 'Amazing technology, a must have in any agency!', '2022-06-13 02:31:44', '2022-06-13 02:31:44'),
(4, 'frank strongman', 'ceo', 'Urban Rent', 'testimonials/client-3.jpg', 'Wonderful app, our conversion rate increased by 25% in the last year, and our expenses dropped by 15%. Absolutely amazing.', '2022-06-13 02:33:04', '2022-06-13 02:33:04'),
(5, 'Michael Williams', 'CEO', 'Live Side', 'testimonials/client-1.jpg', 'Delet helped our agency tremendously, now we rent twice as many properties in the sasme amount of time.', '2022-06-29 13:02:58', '2022-06-29 13:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `customer_id`, `subject`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'New Support Ticket', '<p>Nice Try</p>', 'Open', '2022-06-27 01:27:24', '2022-06-29 06:47:57'),
(2, 8, 'New Ticket', 'New Ticket Content', 'Open', '2022-06-29 06:57:27', '2022-06-29 06:57:27'),
(3, 9, 'Payment', 'I have a query for order #24', 'Open', '2022-06-29 12:47:56', '2022-06-29 12:47:56'),
(4, 10, 'inquiry', 'fgf', 'Open', '2022-06-29 19:15:37', '2022-06-29 19:15:37'),
(5, 11, 'BIG Deals is coming!', 'This is new ticket testing', 'Open', '2022-07-05 05:26:56', '2022-07-05 05:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `commented_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `images` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `comment`, `commented_by`, `images`, `created_at`, `updated_at`) VALUES
(3, 1, '<p>Nice</p>', 'admin', '[{\"image\":\"support\\/34bd7ff3-c41f-4042-b7b3-c3711d70beb9.jpg\"}]', '2022-06-27 01:49:44', '2022-06-27 02:21:03'),
(4, 1, '<p>Nice</p>', 'admin', '[{\"image\":\"support\\/client-1.jpg\"},{\"image\":\"support\\/client-2.jpg\"}]', '2022-06-27 01:58:53', '2022-06-27 02:22:12'),
(5, 1, '<p>Okay</p>', 'admin', '[{\"image\":null}]', '2022-06-27 02:19:17', '2022-06-27 02:19:17'),
(6, 1, 'Okay Thx', 'user', '[]', '2022-06-29 06:48:57', '2022-06-29 06:48:57'),
(7, 1, 'Hello, I have another query. Please check this screen shot.', 'user', '[]', '2022-06-29 06:53:26', '2022-06-29 06:53:26'),
(8, 1, 'Nice going....greate Job', 'user', '[{\"image\":\"support\\/1656505563_client-2.jpg\"}]', '2022-06-29 06:56:03', '2022-06-29 06:56:31'),
(9, 2, '<p>We are checking the same. Please wait for a while</p>', 'admin', '[{\"image\":null}]', '2022-06-29 06:59:04', '2022-06-29 06:59:04'),
(10, 2, 'Nice try', 'user', '[{\"image\":\"support\\/1656505811_client-1.jpg\"},{\"image\":\"support\\/1656505811_client-2.jpg\"}]', '2022-06-29 07:00:11', '2022-06-29 07:00:11'),
(11, 3, '<p>Please provide addtitional Details</p>', 'admin', '[{\"image\":null}]', '2022-06-29 12:50:48', '2022-06-29 12:50:48'),
(12, 3, 'Here are the infos..', 'user', '[{\"image\":\"support\\/1656507069_client-1.jpg\"}]', '2022-06-29 12:51:09', '2022-06-29 12:51:09'),
(13, 3, '<p>We are checking. We will update ASAP.</p>', 'admin', '[{\"image\":null}]', '2022-06-29 12:51:31', '2022-06-29 12:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keyur', 'keyur@rigicgspl.com', NULL, '$2y$10$pHBpbXNovAmcHIH8RFjALuZ9svUmVtUJMyoPed1lTkBD8wa11yi6G', '93S9Rv8uK7ZHwBVPwlKLULA6kfSPxXa6EjhpYKny7ywwyvk7cM8obQw3oT0R', '2022-06-13 01:14:34', '2022-06-13 01:14:34'),
(2, 'Mayu', 'mayur@example.com', NULL, '$2y$10$6dvI7h8dDe04kbpCq05omOvYHPdngJJbQRa2aYmYDZTR.bMrwsYaC', NULL, '2022-06-25 00:27:04', '2022-06-25 00:29:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_addresses_customer_id_index` (`customer_id`),
  ADD KEY `billing_addresses_country_id_index` (`country_id`);

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_blocks`
--
ALTER TABLE `common_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inquiries_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_index` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_index` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_attachments`
--
ALTER TABLE `reply_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_attachments_ticket_reply_id_index` (`ticket_reply_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_customer_id_index` (`customer_id`),
  ADD KEY `shipping_addresses_country_id_index` (`country_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_customer_id_index` (`customer_id`),
  ADD KEY `subscriptions_order_id_index` (`order_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_customer_id_index` (`customer_id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_index` (`ticket_id`);

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
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `common_blocks`
--
ALTER TABLE `common_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply_attachments`
--
ALTER TABLE `reply_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply_attachments`
--
ALTER TABLE `reply_attachments`
  ADD CONSTRAINT `reply_attachments_ticket_reply_id_foreign` FOREIGN KEY (`ticket_reply_id`) REFERENCES `ticket_replies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `shipping_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
