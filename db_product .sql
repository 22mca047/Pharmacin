-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 09:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `areawisecustomer`
-- (See below for the actual view)
--
CREATE TABLE `areawisecustomer` (
`customer_id` int(5)
,`customer_name` varchar(15)
,`customer_gender` varchar(6)
,`customer_dob` date
,`customer_mobileno` bigint(20)
,`customer_address` varchar(100)
,`customer_email` varchar(100)
,`customer_image` varchar(100)
,`area_name` varchar(15)
,`area_pincode` int(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `areawisevendor`
-- (See below for the actual view)
--
CREATE TABLE `areawisevendor` (
`area_id` int(5)
,`vendor_id` int(5)
,`vendor_name` varchar(15)
,`vendor_mobileno` varchar(10)
,`vendor_address` varchar(100)
,`vendor_details` varchar(100)
,`vendor_email` varchar(35)
,`shop_name` varchar(50)
,`shop_timing` varchar(30)
,`vendor_photo` varchar(100)
,`area_name` varchar(15)
,`area_pincode` int(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `categoryproduct`
-- (See below for the actual view)
--
CREATE TABLE `categoryproduct` (
`pro_id` int(11)
,`pro_name` varchar(100)
,`pro_price` int(5)
,`pro_details` varchar(500)
,`pro_image` varchar(100)
,`category_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `companyproduct`
-- (See below for the actual view)
--
CREATE TABLE `companyproduct` (
`pro_id` int(11)
,`pro_name` varchar(100)
,`pro_price` int(5)
,`pro_details` varchar(500)
,`pro_image` varchar(100)
,`company_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderwisestatus`
-- (See below for the actual view)
--
CREATE TABLE `orderwisestatus` (
`details_id` int(5)
,`shipping_name` varchar(35)
,`shipping_mobileno` bigint(20)
,`shipping_address` varchar(100)
,`pro_price` int(5)
,`pro_qty` int(5)
,`status` varchar(50)
,`vendor_id` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `statuswiseorder`
-- (See below for the actual view)
--
CREATE TABLE `statuswiseorder` (
`details_id` int(5)
,`shipping_name` varchar(35)
,`shipping_mobileno` bigint(20)
,`shipping_address` varchar(100)
,`pro_price` int(5)
,`pro_qty` int(5)
,`status` varchar(50)
,`vendor_id` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_email` varchar(35) NOT NULL,
  `admin_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_image`, `admin_email`, `admin_password`) VALUES
(101, 'Paresh Sindha', 'paresh.jpg', 'pareshshihsindha@gmail.com', 'Admin101'),
(201, 'Hitesh Prajapati', 'hitesh.jpg', 'hiteshprajapati7818@gmail.com', 'Admin201'),
(301, 'Jaini Shah', 'jaini.jpg', 'shahjaini4040@gmail.com', 'Admin301');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(5) NOT NULL,
  `area_name` varchar(15) NOT NULL,
  `area_pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_name`, `area_pincode`) VALUES
(1, 'city', 380001),
(2, 'Jivraj Park', 380051),
(3, 'memnagar', 380052);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Ayurvedic Care'),
(2, 'Covid Essentials'),
(3, 'Diabetic Care'),
(4, 'Fitness  And Supplements'),
(5, 'Healthcare Devices'),
(6, 'Home Care'),
(7, 'Skin Care'),
(8, 'Personal Care');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(5) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `company_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_logo`) VALUES
(1, 'Himalya', 'himalaya.jpg'),
(2, 'Dr.Ortho', 'dr-ortho.jpg'),
(3, 'Mamaearth', 'mamaearth-logo.jpg'),
(4, 'Patanjali', 'patanjali.jpg'),
(5, 'Dabur', 'dabur.jpg'),
(6, 'Savlon', 'Savlon-logo.jpg'),
(7, 'Aarshaveda', 'aarshaveda_logo.jpg'),
(8, 'Fair And Lovely', 'fair&lovely.jpg'),
(9, 'Accu-chek', 'accu-check.jpg'),
(10, 'Sugar Free', 'Sugar-free-logo.jpg'),
(11, 'Accsure', 'Accu-sure-logo.jpg'),
(12, 'Pertexa', 'pertexa-logo.jpg'),
(13, 'Dettol', 'dettol-logo.jpg'),
(14, 'Dove', 'Dove-logo.jpg'),
(15, 'Lakme', 'lakme-logo.jpg'),
(16, 'Roop Mantra', 'Roop-mantra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(5) NOT NULL,
  `customer_name` varchar(15) NOT NULL,
  `customer_gender` varchar(6) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_image` varchar(100) NOT NULL,
  `customer_mobileno` bigint(20) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(8) NOT NULL,
  `area_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_gender`, `customer_dob`, `customer_image`, `customer_mobileno`, `customer_address`, `customer_email`, `customer_password`, `area_id`) VALUES
(1001, 'Meet Sindha ', 'Male', '2001-09-23', 'meet.jpg', 9586129401, '60,laxmikrupa society near vastrapur railway crossing-380051', 'meet2001@gmail.com', 'meet@23', 2),
(1002, 'Prisha Shah', 'female', '2002-08-22', 'prisha.jpg', 7990794846, 'D-3,premjyot tower,gurukul-380052', 'codeofcollage@gmail.com', '1234', 3),
(1003, 'Aarav Prajapati', 'male', '2000-12-31', 'aarav.jpg', 6356374602, 'C-1, shri shraddha app. near jaltarang-380051', 'aarav31@gmail.com', 'arav@31', 2),
(1004, 'Rohit Rajwadi', 'Male', '2002-02-22', 'rohit.jpg', 7096179732, '20, new giriraj society, near vastrapur railway crossing, jivrajpark, ahemdabad-380051', 'rohit22@gmail.com', 'rohit@22', 2),
(1005, 'Vrunda Rasania', 'female', '2001-12-28', 'vrunda.jpg', 8780316961, '28, shakti blossom, memnagar ,ahemdabad-380052', 'vrunda28@gmail.com', 'vrunda@2', 3),
(1006, 'Jensi Shah', 'Female', '2001-06-16', 'jensi.jpg', 7978623196, 'B/S/6 , shree nandeshwar app. opp, omkameshwar flat, vejalpur, Ahmedabad-380051', 'jensi16@gmail.com', 'jensi@16', 2),
(1008, 'viren kapadiya', 'Male', '1999-11-18', 'viren.jpg', 9898456789, 'shri ram society , mahalaxmi six road , city , ahmedabad-380001', 'viren18@gmail.com', 'viren@18', 1),
(1010, 'Arhan Patel', 'Male', '2022-02-08', 'arhan.jpg', 9877969587, '17,raja maheta pole  Ahmedabad-380001.', 'arhan08@gmail.com', 'arhan@08', 1),
(1011, 'Aarti Shah', 'Female', '1995-01-19', 'aarti.jpg', 9987965966, '1292-harkishandas pole, mandawi pole Ahmedabad-380001', 'aarti19@gmail.com', 'aarti@19', 1),
(1012, 'Sivam Rajput', 'Male', '1999-02-09', 'sivam.jpg', 9876858549, 'B-7 sunvila row house, near sarjan tower, memnagar, Ahmedabad-380052. ', 'sivam09@gmail.com', 'sivam@9', 3),
(1013, 'Lalit Patel', 'Male', '1999-12-15', 'lalit.jpg', 9995574738, 'Z-10, paramveer app, near mamnagar bus-stand, memnagar, ahmedabad-380052', 'lalit15@gmail.com', 'lalit@15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(5) NOT NULL,
  `feedback_ratings` int(5) NOT NULL,
  `feedback_date` varchar(10) NOT NULL,
  `feedback_details` varchar(100) NOT NULL,
  `details_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_ratings`, `feedback_date`, `feedback_details`, `details_id`) VALUES
(1, 5, '2022-04-10', 'Nice Service ', 2),
(2, 4, '2022-04-21', 'Great Service with Great Price', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `details_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `pro_ven_id` int(5) NOT NULL,
  `pro_qty` int(5) NOT NULL,
  `pro_price` int(5) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`details_id`, `order_id`, `pro_ven_id`, `pro_qty`, `pro_price`, `status`) VALUES
(1, 1, 39, 2, 125, 'Pending'),
(2, 1, 40, 2, 257, 'Pending'),
(3, 2, 48, 2, 150, 'Pending'),
(4, 2, 25, 2, 125, 'Pending'),
(5, 3, 209, 2, 180, 'Pending'),
(6, 3, 191, 2, 280, 'Completed'),
(7, 4, 201, 2, 107, 'Completed'),
(8, 4, 189, 2, 58, 'Cancel'),
(9, 5, 196, 2, 225, 'Cancel'),
(10, 5, 210, 2, 620, 'Pending'),
(11, 6, 47, 2, 135, 'Pending'),
(12, 6, 20, 2, 330, 'Cancel'),
(13, 7, 18, 1, 1110, 'Pending'),
(14, 7, 22, 2, 110, 'Pending'),
(15, 8, 19, 1, 1220, 'Pending'),
(16, 8, 211, 2, 630, 'Pending'),
(17, 9, 203, 1, 1072, 'Pending'),
(18, 9, 210, 2, 620, 'Pending'),
(19, 10, 189, 2, 58, 'Pending'),
(20, 11, 188, 2, 127, 'Pending'),
(21, 11, 189, 1, 58, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordermaster`
--

CREATE TABLE `tbl_ordermaster` (
  `order_id` int(5) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `shipping_name` varchar(35) NOT NULL,
  `shipping_mobileno` bigint(20) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `customer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ordermaster`
--

INSERT INTO `tbl_ordermaster` (`order_id`, `order_date`, `order_status`, `shipping_name`, `shipping_mobileno`, `shipping_address`, `customer_id`) VALUES
(1, '2022-04-19', 'Pending', 'Meet P Sindha', 9586129401, '60,laxmikrupa society near vastrapur railway crossing-380051', 1001),
(2, '2022-04-19', 'Pending', 'Meet Sindha', 9975483493, '60,laxmikrupa society near vastrapur railway crossing-380051', 1001),
(3, '2022-04-19', 'Pending', 'Meet', 9574883343, '60,laxmikrupa society near vastrapur railway crossing-380051', 1001),
(4, '2022-04-19', 'Pending', 'Prisha J Shah', 7990794846, 'D-3,premjyot tower,gurukul-380052', 1002),
(5, '2022-04-19', 'Pending', 'Prisha shah', 9375664830, 'D-3,premjyot tower,gurukul-380052', 1002),
(6, '2022-04-19', 'Pending', 'Prisha ', 9974389523, 'D-3,premjyot tower,gurukul-380052', 1002),
(7, '2022-04-19', 'Pending', 'Viren H Kapadiya', 9898456789, 'shri ram society , mahalaxmi six road , city , ahmedabad-380001', 1008),
(8, '2022-04-19', 'Pending', 'viren kapadiya', 9957348475, 'shri ram society , mahalaxmi six road , city , ahmedabad-380001', 1008),
(9, '2022-04-19', 'Pending', 'Viren', 9977884456, 'shri ram society , mahalaxmi six road , city , ahmedabad-380001', 1008),
(10, '2022-04-21', 'Pending', 'Prishaben', 7990794846, 'D-3,premjyot tower,gurukul-380052', 1002),
(11, '2022-04-22', 'Pending', 'Prisha Shah', 9878453454, 'D-3 Premjyot tower, gurukul, ahmedabad-380052', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  `method` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `order_id`, `amount`, `method`) VALUES
(1, 1, 764, 'RazorPay'),
(2, 2, 550, 'COD'),
(3, 3, 920, 'RazorPay'),
(4, 4, 330, 'RazorPay'),
(5, 5, 1690, 'COD'),
(6, 6, 930, 'RazorPay'),
(7, 7, 1330, 'RazorPay'),
(8, 8, 2480, 'COD'),
(9, 9, 2312, 'RazorPay'),
(10, 10, 116, 'RazorPay'),
(11, 11, 312, 'RazorPay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_price` int(5) NOT NULL,
  `pro_details` varchar(500) NOT NULL,
  `pro_image` varchar(100) NOT NULL,
  `category_id` int(5) NOT NULL,
  `company_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `pro_details`, `pro_image`, `category_id`, `company_id`) VALUES
(1, 'Himalaya Natural Glow Kesar Face Cream 50 Gm', 78, 'Himalaya Natural Glow Kesar Face Cream is a skin-lightening cream that uses advanced techniques which helps enhance skin tone evenness and lighten it, remove under-eye circles and mend dull uneven complexions and pigmentation.', 'himalaya-natural-glow-kesar-face-cream.jpg', 1, 1),
(2, 'Himalaya Neem Tablets - 60 N', 127, 'Himalaya products are safe and made keeping in mind high quality and best results. The Himalaya neem tablets have been made to ensure skin health.', 'Himalaya Neem Tablet.jpg', 1, 1),
(3, 'Dr Ortho Pain Relief Ointment Tube Of 30 G', 58, 'Dr. Ortho Pain Relief Ointment is formulated to offer relief from joint pain. Enriched with active ingredients, it stimulates blood circulation and offers relief from muscle and limb stiffness.', 'dr-ortho-pain-relief-ointment-tube-of-30g.jpg', 1, 2),
(4, 'Dr.Ortho Ayurvedic Bottle Of 60 Capsules', 260, 'The Dr. Ortho Ayurvedic Capsules effectively treat pain in the muscles and joints. These ayurvedic capsules are formulated with 8 powerful herbs, which include Kunduru, Guggul Shuddh, Rasna, Methi, Sunthi, Ashwagandha, Shilajit Shudh and Vishamushi.', 'drortho-ayurvedic-bottle-of-60.jpg', 1, 2),
(5, 'Dr.Ortho Pain Relief Oil 100 Ml', 280, 'Dr. Ortho Pain Relief Oil is an ayurvedic medicine that is used for all kinds of pains. The active ingredients of Dr. Ortho Pain Relief Oil help in the stimulation of blood circulation, stiff muscles and limbs, body aches, muscular pains, severe joint pain or swelling, joint aches and pain.', 'drortho-pain-relief-oil-100ml.jpg', 1, 2),
(6, 'Dabur Chyawanprash - 2X Immunity - 500 Gm', 189, 'Dabur Chyawanprash is a widely used Ayurvedic formulation that has been used by millions of people to boost their immunity.', 'dabur-chyawanprash-2-x-immunity-500gm.jpg', 2, 5),
(7, 'Dabur Sitopaladi Churna Cough Paste Bottle(500G)', 629, 'Dabur Sitopaladi Churna is an ayurvedic medicine that is primarily used for the treatment of cough and the common cold.', 'dabur-sitopaladi-churna-cold-cough-paste-bottle-of-500g.jpg', 2, 5),
(8, 'Accu Chek Instant Blood Glucose Test Strip 25', 639, 'Brand :- ACCU-CHEK INSTANT, Expires on or After :- 07/05/2022, Country of Origin :- Usa, India, Warranty :- 1 Year from date of purchase', 'accu-chek-instant-blood-glucose-test-strip-25.jpg', 3, 9),
(9, 'Accu-Chek Active Glucometer Kit', 1247, 'The Accu-Chek Active Glucometer kit is a machine that is used together with Accu-Chek Active strips to measure the glucose content in the blood.', 'The Accu-Chek Active Glucometer kit.jpg', 3, 9),
(10, 'Sugar Free Gold Sweetener Tablets Strip Of 500', 225, 'Sugar free Natura is made utilizing Sucralose which is a subordinate of sugar. Sucralose poses a flavour like sugar, yet doesn\'t contain a similar measure of calories.', 'sugar-free-gold-sweetener-tablets-strip-of-500-1.jpg', 3, 10),
(11, 'Sugar Free Green (Stevia Natural) 200gm ', 141, 'Consuming sugar daily is very unhealthy and can lead to a lot of health problems. To reduce your calorie intake especially through sugar, try the natural Sugar Free Green sweetener.', 'Sugar Free Green Made From Stevia Natural 200gm.jpg', 3, 10),
(12, 'Aarshaveda Amla Powder - Organic - 200 G', 157, 'Brand :-  AARSHAVEDA AMLA , Expires on or After :-  07/05/2022 , Country of Origin :-  India', 'aarshaveda-amla-powder-organic-200-g.jpg', 4, 7),
(13, 'Aarshaveda Neem Powder Organic - 200 G', 162, '\r\nBrand :- AARSHAVEDA NEEM , \r\nExpires on or After :- 07/05/2022 , \r\nCountry of Origin :- India', 'aarshaveda-neem-powder-organic-200g.jpg', 4, 7),
(14, 'Himalaya Diabecon Ds Tablets - 60', 134, 'Himalaya tablets for diabetes care contain herbal ingredients and extracts to provide a comprehensive solution as part of your diabetes management routine. ', 'himalaya-diabecon-ds-tablets-60s.jpg', 4, 1),
(15, 'Himalaya Geriforte Tablets - 100', 107, 'Himalaya Geriforte tablets, known for their antioxidant properties, have been formulated to improve the immune system. ', 'himalaya-geriforte-tablets-100s.jpg', 4, 1),
(16, 'Accusure Digital Thermometer', 316, 'The Accusure Digital Thermometer features a hard tip and should be a vital part of everyone\'s home health and safety.', 'Accusure Digital Thermometer.jpg', 5, 11),
(17, 'Accusure Fingertip Pulse Oximeter ', 1072, 'AccuSure YK011 Fingertip Pulse Oximeter is specially designed to accurately monitor Spo2 and pulse rate. The oximeter comes with new and advanced features such as auto power-off function and a low battery indicator.', 'Accusure Fingertip Pulse Oximeter - Yk011.jpg', 5, 11),
(18, 'Accusure Simple Blood Glucose Meter', 1121, 'AccuSure Simple Blood Glucose Meter is a complete home-care solution for diabetes management. It helps you to control diabetes and achieve target blood sugar levels. It ensures hygienic and fast blood absorption.', 'Accusure Simple Blood Glucose Meter-1.jpg', 5, 11),
(19, 'Pul Finger-Tip Pulse Oximeter\r\n                 ', 1225, 'PUL Oximeter is use for calculate the oxygen saturation of the blood and the pulse rate.', 'pul-fingertip-pulse-oximeter-2.jpg', 5, 12),
(20, 'Dettol Antiseptic Liquid Bottle Of 1 L', 331, 'Dettol Antiseptic Liquid is a topical liquid for cuts and wounds, as well as for maintaining home hygiene. Dettol liquid can also be used with proper dilution, to sanitize your home, toys and babywear by killing over 100 illness-causing germs.', 'dettol-antiseptic-liquid-bottle-of-1-l.jpg', 6, 13),
(21, 'Dettol Disinfection Kit (Covid-19)', 521, 'Dettol Antiseptic Hand Sanitizer contains 70% of alcohol that effectively provides adequate protection against bacteria, viruses and fungi.', 'dettol-disinfection-kit-clinical-strength-sanitizer-disinfectant-wipes.jpg', 6, 13),
(22, 'Dettol Liquid Disinfectant Cleaner  (500ml)', 112, 'Dettol Liquid Disinfectant Cleaner Surface Sanitizer Spray uses a combination of synthetic elements that is lethal to germs and viruses. Its success rate is 99.9% against harmful microbes.', 'Dettol Liquid Disinfectant Cleaner Surface Sanitizer Spray 500ml-3.jpg', 6, 13),
(23, 'Savlon Antiseptic Disinfectant Liquid 1000 Ml', 261, 'Savlon Antiseptic Disinfectant Liquid is used to prevent infections caused by bacteria, microbes and viruses.', 'savlon-antiseptic-disinfectant-liquid-1000-ml.jpg', 6, 6),
(24, 'Savlon Surface Disinfectant Spray 170g', 140, 'The dirt and germs on surfaces can easily be cleaned to give access to a hygienic environment with Savlon Surface Disinfectant Spray.', 'Savlon Surface Disinfectant Spray 170g-1.jpg', 6, 6),
(25, 'Fair & Lovely Instant Glow Facewash-100 G', 129, 'Fair & Lovely Instant Glow Facewash is enriched with multivitamins including Vitamin B3, Vitamin C and Vitamin E which nourishes and moisturizes while cleansing your skin from deep within and imparts a natural glow.', 'fair-lovely-instant-glow-facewash-with-fairness-multivitamins-facewash-100g.jpg', 8, 8),
(26, 'Fair & Lovely Winter Fairness Face Cream - 80 G', 201, 'Fair & Lovely Winter Fairness Face Cream is designed to counteract the dryness of the skin caused by the effects of winter.', 'Fair & Lovely  Face Cream.jpg', 8, 8),
(27, 'Mens Fair And Lovely Instant Face Wash-100 G', 131, 'Men\'s Fair And Lovely Instant Oil Clear Magnet Action Face Wash is a quality men’s skincare product from the international experts at Fair & Lovely.', 'Mens Fair And Lovely Instant Oil Clear Face Wash-100 Gm.jpg', 8, 8),
(28, 'Mamaearth Tea & Ginger Oil Shampoo(250 Ml)', 314, 'Stimulate and renew your hair with an outlandish mix of tea tree and ginger oil that helps in reducing itch and irritation while contributing to the health and cleanliness of the scalp while soothing dryness and itchiness.', 'Mamaearth Tea Tree & Ginger Oil Shampoo(250 Ml).jpg', 8, 3),
(29, 'Mamaearth Natural Charcoal Face Wash', 224, 'Looking for an answer to healthy and glowing skin? Mamaearth SLS & Paraben-free Charcoal Face Wash is your solution.', 'Mamaearth Charcoal Natural Charcoal Face Wash(100 Ml).jpg', 8, 3),
(30, 'Mamaearth Onion Conditioner Bottle (250 Ml)', 314, 'The Mamaearth Onion Conditioner helps fight the most typical hair problem- hair fall. Composed of onion seed oil, almond oil and coconut oil, the Mamaearth Onion Conditioner helps fight hair fall and accelerates hair growth.', 'Mamaearth Onion Conditioner Bottle Of 250 Ml.jpg', 8, 3),
(31, 'Dove Cream Beauty Bathing Bar(Buy 4 Get 1 Free)-100 G', 246, 'Are you searching for a soap that leaves your skin feeling silky soft and moisturised? Look no further. Dove Cream Beauty Bathing Bar is the answer to your needs. ', 'Dove Cream Beauty Bathing Bar(Buy 4 Get 1 Free)-100 G.jpg', 7, 14),
(32, 'Dove Deeply Nourishing Body Wash - 800 Ml', 379, 'Dove Deeply Nourishing Body Wash is a moisturising body cleanser with Nutrium Moisture technology.', 'Dove Deeply Nourishing Body Wash - 800 Ml.jpg', 7, 14),
(33, 'Dove Go Fresh Revitalize Body Wash - 190 Ml', 140, 'Dove Go Fresh Revitalize Body Wash nourishes your skin deeply and keeps it fresh. It enhances the bathing experience and leaves the skin moisturised. It is very mild and doesn\'t cause any dryness.', 'Dove Go Fresh Revitalize Body Wash - 190 Ml.jpg', 7, 14),
(34, 'Lakme 9 To 5 Naturale Aloe Aqua Gel-50 G', 166, 'Lakme is one of the most popular and trusted cosmetic brands in the market. The 9 to 5 range of products from Lakme is meant for everyday use and specially formulated for working women who spend long hours outside the home.', 'Lakme 9 To 5 Naturale Aloe Aqua Gel-50 G.jpg', 7, 15),
(35, 'Lakme Blush & Glow Strawberry \nFaceWash(100G)', 193, 'Lakme Blush And Glow Face Wash Strawberry have been specially formulated by the experts at Lakme Salon to give your skin a gorgeous strawberry-like glow.', 'Lakme Blush & Glow Strawberry .jpg', 7, 15),
(36, 'Lakme Peach Milk Ultra Light Gel -150 G', 273, 'Brand :- LAKME PEACH MILK\r\nExpires on or After :- 07/05/2022\r\nCountry of Origin :- India', 'lakme-peach-milk-ultra-light-gel-150-g-3.jpg', 7, 15),
(37, 'Lakme Sun Expert Spf 50 Gel - 100 G', 409, 'Lakme Sun Expert SPF 50 Gel is a revolutionary gel that Lakme skin experts design and it is formulated with the Lakme sun protection formula.', 'Lakme Sun Expert Spf 50 Gel - 100 G.jpg', 7, 15),
(38, 'Roop Mantra Ayurvedic Fairness Cream(60G)', 116, 'Roop Mantra Fairness Cream is made from natural, herbal ingredients to provide nourishment and boost the skin\'s ability to fight against damage.', 'roop-mantra-ayurvedic-fairness-cream-tube-of-60-g-2.jpg', 7, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_vendor`
--

CREATE TABLE `tbl_product_vendor` (
  `pro_ven_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `pro_ven_price` int(5) NOT NULL,
  `pro_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_vendor`
--

INSERT INTO `tbl_product_vendor` (`pro_ven_id`, `pro_id`, `vendor_id`, `pro_ven_price`, `pro_qty`) VALUES
(1, 1, 1, 76, 15),
(2, 2, 1, 126, 16),
(3, 3, 1, 56, 17),
(4, 4, 1, 158, 17),
(5, 5, 1, 278, 14),
(6, 6, 1, 185, 19),
(7, 7, 1, 625, 16),
(8, 8, 1, 636, 19),
(9, 9, 1, 1245, 19),
(10, 10, 1, 220, 14),
(11, 11, 1, 140, 18),
(12, 12, 1, 155, 19),
(13, 13, 1, 160, 14),
(14, 14, 1, 130, 20),
(15, 15, 1, 106, 12),
(16, 16, 1, 314, 16),
(17, 17, 1, 1070, 11),
(18, 18, 1, 1110, 16),
(19, 19, 1, 1220, 13),
(20, 20, 1, 330, 14),
(21, 21, 1, 518, 14),
(22, 22, 1, 110, 18),
(23, 23, 1, 258, 14),
(24, 24, 1, 138, 12),
(25, 25, 1, 125, 17),
(26, 26, 1, 198, 19),
(27, 27, 1, 128, 21),
(28, 28, 1, 310, 20),
(29, 29, 1, 220, 13),
(30, 30, 1, 310, 15),
(31, 31, 1, 244, 17),
(32, 32, 1, 365, 18),
(33, 33, 1, 130, 16),
(34, 34, 1, 155, 16),
(35, 35, 1, 188, 13),
(36, 36, 1, 265, 14),
(37, 37, 1, 400, 16),
(38, 38, 1, 110, 12),
(39, 2, 3, 125, 13),
(40, 4, 3, 257, 17),
(41, 5, 3, 279, 17),
(42, 6, 3, 186, 16),
(43, 7, 3, 624, 16),
(44, 8, 3, 637, 13),
(45, 9, 3, 1240, 15),
(46, 10, 3, 222, 12),
(47, 11, 3, 135, 12),
(48, 12, 3, 150, 16),
(49, 13, 3, 162, 16),
(50, 14, 3, 132, 14),
(51, 15, 3, 105, 15),
(52, 16, 3, 312, 15),
(53, 17, 3, 1072, 12),
(54, 18, 3, 1120, 12),
(55, 19, 3, 1224, 14),
(56, 20, 3, 328, 15),
(57, 21, 3, 520, 16),
(58, 22, 3, 110, 12),
(59, 23, 3, 259, 15),
(60, 24, 3, 137, 16),
(61, 25, 3, 127, 21),
(62, 26, 3, 200, 20),
(63, 27, 3, 130, 14),
(64, 28, 3, 312, 15),
(65, 29, 3, 222, 16),
(66, 30, 3, 312, 18),
(67, 31, 3, 240, 12),
(68, 32, 3, 375, 15),
(69, 33, 3, 135, 17),
(70, 34, 3, 160, 13),
(71, 35, 3, 190, 13),
(72, 36, 3, 270, 13),
(73, 37, 3, 405, 15),
(74, 38, 3, 112, 15),
(75, 1, 4, 75, 14),
(76, 2, 4, 120, 16),
(77, 3, 4, 55, 16),
(78, 4, 4, 256, 17),
(79, 5, 4, 278, 13),
(80, 6, 4, 186, 16),
(81, 7, 4, 622, 15),
(82, 8, 4, 636, 17),
(83, 9, 4, 1247, 15),
(84, 10, 4, 223, 16),
(85, 11, 4, 134, 16),
(86, 12, 4, 149, 17),
(87, 13, 4, 160, 14),
(88, 14, 4, 133, 15),
(89, 15, 4, 104, 15),
(90, 15, 4, 313, 13),
(91, 17, 4, 1071, 14),
(92, 18, 4, 1119, 13),
(93, 19, 4, 1220, 13),
(94, 20, 4, 326, 15),
(95, 1, 5, 74, 15),
(96, 2, 5, 123, 15),
(97, 3, 5, 50, 16),
(98, 4, 5, 254, 13),
(99, 5, 5, 273, 14),
(100, 6, 5, 175, 15),
(101, 7, 5, 623, 16),
(102, 8, 5, 637, 16),
(103, 9, 5, 1230, 15),
(104, 10, 5, 220, 21),
(105, 11, 5, 141, 20),
(106, 12, 5, 153, 14),
(107, 13, 5, 160, 17),
(108, 14, 5, 130, 13),
(109, 15, 5, 100, 16),
(110, 16, 5, 300, 15),
(111, 17, 5, 1070, 14),
(112, 18, 5, 1110, 13),
(113, 19, 5, 1210, 17),
(114, 20, 5, 325, 16),
(115, 21, 5, 510, 15),
(116, 22, 5, 110, 15),
(117, 23, 5, 250, 14),
(118, 24, 5, 130, 11),
(119, 25, 5, 120, 10),
(120, 1, 8, 78, 14),
(121, 2, 8, 127, 17),
(122, 3, 8, 58, 16),
(123, 4, 8, 260, 14),
(124, 5, 8, 280, 14),
(125, 6, 8, 189, 12),
(126, 7, 8, 629, 14),
(127, 8, 8, 639, 13),
(128, 9, 8, 1247, 12),
(129, 10, 8, 225, 19),
(130, 11, 8, 141, 14),
(131, 12, 8, 157, 14),
(132, 13, 8, 162, 15),
(133, 14, 8, 134, 12),
(134, 15, 8, 107, 12),
(135, 16, 8, 316, 18),
(136, 17, 8, 1072, 15),
(137, 18, 8, 1121, 12),
(138, 19, 8, 1225, 13),
(139, 20, 8, 331, 17),
(140, 21, 8, 521, 16),
(141, 22, 8, 112, 16),
(142, 23, 8, 261, 15),
(143, 24, 8, 140, 15),
(144, 25, 8, 129, 16),
(145, 1, 9, 70, 20),
(146, 2, 9, 120, 21),
(147, 3, 9, 50, 19),
(148, 4, 9, 250, 15),
(149, 5, 9, 270, 13),
(150, 6, 9, 180, 13),
(151, 7, 9, 620, 13),
(152, 8, 9, 630, 14),
(153, 9, 9, 1240, 16),
(154, 10, 9, 220, 12),
(155, 11, 9, 135, 12),
(156, 12, 9, 150, 20),
(157, 13, 9, 160, 13),
(158, 14, 9, 130, 20),
(159, 15, 9, 100, 22),
(160, 16, 9, 310, 17),
(161, 17, 9, 1050, 15),
(162, 18, 9, 1115, 14),
(163, 19, 9, 1220, 21),
(164, 20, 9, 325, 20),
(165, 21, 9, 515, 15),
(166, 22, 9, 105, 18),
(167, 1, 10, 75, 16),
(168, 2, 10, 125, 15),
(169, 3, 10, 55, 19),
(170, 4, 10, 255, 14),
(171, 5, 10, 275, 15),
(172, 6, 10, 185, 13),
(173, 7, 10, 625, 18),
(174, 8, 10, 635, 12),
(175, 9, 10, 1245, 16),
(176, 10, 10, 223, 13),
(177, 11, 10, 137, 15),
(178, 12, 10, 155, 12),
(179, 13, 10, 161, 11),
(180, 14, 10, 132, 16),
(181, 15, 10, 105, 19),
(182, 16, 10, 314, 14),
(183, 17, 10, 1070, 12),
(184, 18, 10, 1117, 15),
(185, 19, 10, 1222, 13),
(186, 20, 10, 330, 18),
(187, 1, 2, 78, 13),
(188, 2, 2, 127, 11),
(189, 3, 2, 58, 17),
(190, 4, 2, 260, 16),
(191, 5, 2, 280, 12),
(192, 6, 2, 189, 20),
(193, 7, 2, 629, 15),
(194, 8, 2, 639, 12),
(195, 9, 2, 1247, 16),
(196, 10, 2, 225, 16),
(197, 11, 2, 141, 13),
(198, 12, 2, 157, 14),
(199, 13, 2, 162, 16),
(200, 14, 2, 134, 17),
(201, 15, 2, 107, 21),
(202, 16, 2, 316, 17),
(203, 17, 2, 1072, 16),
(204, 1, 6, 70, 21),
(205, 2, 6, 120, 20),
(206, 3, 6, 50, 13),
(207, 4, 6, 250, 15),
(208, 5, 6, 270, 14),
(209, 6, 6, 180, 17),
(210, 7, 6, 620, 16),
(211, 8, 6, 630, 15),
(212, 9, 6, 1240, 0),
(213, 10, 6, 220, 15),
(214, 11, 6, 135, 16),
(215, 12, 6, 150, 15),
(216, 13, 6, 160, 14),
(217, 14, 6, 130, 21),
(218, 15, 6, 100, 21),
(219, 16, 6, 310, 14),
(220, 17, 6, 1050, 16),
(221, 18, 6, 1115, 16),
(222, 19, 6, 1220, 13),
(223, 20, 6, 325, 15),
(224, 21, 6, 515, 14),
(225, 22, 6, 105, 16),
(226, 23, 6, 250, 15),
(227, 24, 6, 130, 21),
(228, 25, 6, 120, 20),
(229, 1, 7, 75, 16),
(230, 2, 7, 125, 17),
(231, 3, 7, 55, 16),
(232, 4, 7, 255, 13),
(233, 5, 7, 275, 12),
(234, 6, 7, 185, 18),
(235, 7, 7, 625, 19),
(236, 8, 7, 635, 17),
(237, 9, 7, 1245, 16),
(238, 10, 7, 223, 16),
(239, 11, 7, 137, 17),
(240, 12, 7, 155, 18),
(241, 13, 7, 161, 18),
(242, 14, 7, 132, 15),
(243, 15, 7, 105, 15),
(244, 16, 7, 314, 17),
(245, 17, 7, 1070, 17),
(246, 18, 7, 1117, 14),
(247, 19, 7, 1222, 16),
(248, 20, 7, 330, 15),
(249, 21, 7, 517, 15),
(250, 22, 7, 107, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(5) NOT NULL,
  `vendor_name` varchar(15) NOT NULL,
  `vendor_mobileno` varchar(10) NOT NULL,
  `vendor_address` varchar(100) NOT NULL,
  `vendor_details` varchar(100) NOT NULL,
  `vendor_email` varchar(35) NOT NULL,
  `vendor_password` varchar(16) NOT NULL,
  `vendor_photo` varchar(100) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_timing` varchar(30) NOT NULL,
  `shop_image` varchar(100) NOT NULL,
  `area_id` int(6) NOT NULL,
  `is_blocked` varchar(10) NOT NULL DEFAULT '1',
  `is_verified` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendor_name`, `vendor_mobileno`, `vendor_address`, `vendor_details`, `vendor_email`, `vendor_password`, `vendor_photo`, `shop_name`, `shop_timing`, `shop_image`, `area_id`, `is_blocked`, `is_verified`) VALUES
(1, 'Vanraj roy', '958596854', 'D-3,shreyas complex, near vastrapur railway crosing, vejalpur, Ahmedabad -380001', 'Shreeji medical & chemist', 'vanrajroy@gmail.com', '12345', 'vanraj.jpg', 'Giri Medical Store', '10:00 am to 10:00 pm', 'giri-medical.jpg', 1, '1', 1),
(2, 'Hitesh patel', '6356379602', 'C-2, shardhaa complex, near shubhash chock, gurukul, Ahmedabad-380052', 'HP medical Store \nWe Provide Medicines As Well As Other Products..', 'pareshcpi114@gmail.com', '1234', 'hitesh.jpg', 'Hitesh Medical Store', '10:00 am to 5:00 pm', 'hitesh-medical.jpg', 3, '1', 1),
(3, 'Dev Pathak', '9796858644', 'shop no g 6, shanti sadan complex 1, vejalpur, Ahmedabad-380051', 'we sell helthcare products  and skin care products', 'dev23@gmail.com', '@dev23', 'dev.jpg', 'Dev medical Shop', '10:00 am to 6:00 pm', 'dev-medical-store.jpg', 2, '1', 1),
(4, 'Sanjay Patel', '7866564786', 'Shop No 4/A , Suvidha Complex, opp Data House, vejalpur, Ahmedabad-380051', 'we sell all the products', 'sanjay31@gmail.com', '@sanjay31', 'sanjay.jpg', 'Sanjay Medical Store', '10:00 am to 9:00 pm', 'sanjay-medical.jpg', 2, '0', 1),
(5, 'Mukesh shah', '7768584767', 'Shop no G-7 , Palm plaza, makarba road, vejalpur, Ahmedabad - 380051 ', 'we sell skin care product , we providing home delivery.', 'codeofcollage@gmail.com', '@mukesh22', 'mukesh.jpg', 'Ambika Medical Store', '10:00 am to 9:00 pm', 'ambika-medical.jpg', 2, '1', 0),
(6, 'Kamlesh bhai', '9875659456', 'U-10,Uma Complex, memnagar, Ahmedabad-380052', 'we sell all the medicine', 'umamedical@gmail.com', 'Uma07', 'kamlesh.jpg', 'Uma medical Shop', '10:00 am to 5:00 pm', 'Uma.jpg', 3, '1', 1),
(7, 'Hashmukh Patel', '9945738547', 'v-10 , Shree Umiya complex , memnagar bus-stand , Ahmedabad.-380052', 'We sell medicin as well as health care products.', 'umiyamedical@gmail.com', 'umiya@10', 'Hasmukh Patel.jpg', 'Umiya medical Shop', '10:00 am to 6:00 pm', 'Umiya Medical.jpg', 3, '0', 1);

-- --------------------------------------------------------

--
-- Structure for view `areawisecustomer`
--
DROP TABLE IF EXISTS `areawisecustomer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `areawisecustomer`  AS SELECT `tbl_customer`.`customer_id` AS `customer_id`, `tbl_customer`.`customer_name` AS `customer_name`, `tbl_customer`.`customer_gender` AS `customer_gender`, `tbl_customer`.`customer_dob` AS `customer_dob`, `tbl_customer`.`customer_mobileno` AS `customer_mobileno`, `tbl_customer`.`customer_address` AS `customer_address`, `tbl_customer`.`customer_email` AS `customer_email`, `tbl_customer`.`customer_image` AS `customer_image`, `tbl_area`.`area_name` AS `area_name`, `tbl_area`.`area_pincode` AS `area_pincode` FROM (`tbl_customer` join `tbl_area` on(`tbl_area`.`area_id` = `tbl_customer`.`area_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `areawisevendor`
--
DROP TABLE IF EXISTS `areawisevendor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `areawisevendor`  AS SELECT `tbl_area`.`area_id` AS `area_id`, `tbl_vendor`.`vendor_id` AS `vendor_id`, `tbl_vendor`.`vendor_name` AS `vendor_name`, `tbl_vendor`.`vendor_mobileno` AS `vendor_mobileno`, `tbl_vendor`.`vendor_address` AS `vendor_address`, `tbl_vendor`.`vendor_details` AS `vendor_details`, `tbl_vendor`.`vendor_email` AS `vendor_email`, `tbl_vendor`.`shop_name` AS `shop_name`, `tbl_vendor`.`shop_timing` AS `shop_timing`, `tbl_vendor`.`vendor_photo` AS `vendor_photo`, `tbl_area`.`area_name` AS `area_name`, `tbl_area`.`area_pincode` AS `area_pincode` FROM (`tbl_vendor` join `tbl_area` on(`tbl_area`.`area_id` = `tbl_vendor`.`area_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `categoryproduct`
--
DROP TABLE IF EXISTS `categoryproduct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoryproduct`  AS SELECT `tbl_product`.`pro_id` AS `pro_id`, `tbl_product`.`pro_name` AS `pro_name`, `tbl_product`.`pro_price` AS `pro_price`, `tbl_product`.`pro_details` AS `pro_details`, `tbl_product`.`pro_image` AS `pro_image`, `tbl_category`.`category_name` AS `category_name` FROM (`tbl_product` join `tbl_category` on(`tbl_category`.`category_id` = `tbl_product`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `companyproduct`
--
DROP TABLE IF EXISTS `companyproduct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `companyproduct`  AS SELECT `tbl_product`.`pro_id` AS `pro_id`, `tbl_product`.`pro_name` AS `pro_name`, `tbl_product`.`pro_price` AS `pro_price`, `tbl_product`.`pro_details` AS `pro_details`, `tbl_product`.`pro_image` AS `pro_image`, `tbl_company`.`company_name` AS `company_name` FROM (`tbl_product` join `tbl_company` on(`tbl_company`.`company_id` = `tbl_product`.`company_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `orderwisestatus`
--
DROP TABLE IF EXISTS `orderwisestatus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderwisestatus`  AS SELECT `tbl_orderdetails`.`details_id` AS `details_id`, `tbl_ordermaster`.`shipping_name` AS `shipping_name`, `tbl_ordermaster`.`shipping_mobileno` AS `shipping_mobileno`, `tbl_ordermaster`.`shipping_address` AS `shipping_address`, `tbl_orderdetails`.`pro_price` AS `pro_price`, `tbl_orderdetails`.`pro_qty` AS `pro_qty`, `tbl_orderdetails`.`status` AS `status`, `tbl_product_vendor`.`vendor_id` AS `vendor_id` FROM ((`tbl_orderdetails` join `tbl_product_vendor` on(`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)) join `tbl_ordermaster` on(`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `statuswiseorder`
--
DROP TABLE IF EXISTS `statuswiseorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `statuswiseorder`  AS SELECT `tbl_orderdetails`.`details_id` AS `details_id`, `tbl_ordermaster`.`shipping_name` AS `shipping_name`, `tbl_ordermaster`.`shipping_mobileno` AS `shipping_mobileno`, `tbl_ordermaster`.`shipping_address` AS `shipping_address`, `tbl_orderdetails`.`pro_price` AS `pro_price`, `tbl_orderdetails`.`pro_qty` AS `pro_qty`, `tbl_orderdetails`.`status` AS `status`, `tbl_product_vendor`.`vendor_id` AS `vendor_id` FROM ((`tbl_orderdetails` join `tbl_product_vendor` on(`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)) join `tbl_ordermaster` on(`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `tbl_ordermaster`
--
ALTER TABLE `tbl_ordermaster`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_product_vendor`
--
ALTER TABLE `tbl_product_vendor`
  ADD PRIMARY KEY (`pro_ven_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `details_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_ordermaster`
--
ALTER TABLE `tbl_ordermaster`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_product_vendor`
--
ALTER TABLE `tbl_product_vendor`
  MODIFY `pro_ven_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
