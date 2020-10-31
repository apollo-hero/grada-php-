-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 184.168.155.13
-- Generation Time: Mar 29, 2012 at 12:11 AM
-- Server version: 5.0.92
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccolnwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `idCatering` int(80) NOT NULL auto_increment,
  `cateringName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `cateringDesc` text collate utf8_unicode_ci NOT NULL,
  `cateringImg` varchar(50) collate utf8_unicode_ci NOT NULL,
  `cateringPrice` varchar(15) collate utf8_unicode_ci NOT NULL,
  `cateringStatus` varchar(25) collate utf8_unicode_ci NOT NULL,
  `idcateringfullCat` int(10) NOT NULL,
  PRIMARY KEY  (`idCatering`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` VALUES(12, 'MEDITERRANEAN ', 'SOUVLAKI STICKS \r\nGreek style seasoned Chicken and Steak skewers\r\nMEDITERRANEAN GARDEN SALAD\r\nFRESH GREEK SALAD with FETA CHEESE\r\nTZAZZIKI DIPPING\r\nHUMUS & PITTA BREAD\r\n', 'img_2012221416588.jpg', '14.95', '', 6);
INSERT INTO `catering` VALUES(14, 'SUPER TACO BAR', 'CHICKEN, STEAK or SHRIMP FAJITAS \r\nWHITE or MEXICAN RICE \r\nBLACK or PINTO BEANS \r\nFLOUR TORTILLAS  \r\nSALSA&SALAD BAR: fresh salsa, pico de gallo, cheese, lettuce   \r\nGUACAMOLE, SOUR CREAM, and CORN CHIPS  \r\n', 'img_20122214165836.jpg', '12.95', '', 6);
INSERT INTO `catering` VALUES(15, 'CHICKEN PARMIGIANA', 'TENDER CHICKEN BREAST - PARMIGIANA STYLE\r\nPENNE PASTA with GRILLED VEGGIES & MARINARA  \r\nGARLIC BREAD \r\nCAESAR or GREEN SALAD \r\n(please specify salad selection in the box below)\r\nCHOCOLATE CHIP COOKIES', 'img_2012221416593.jpg', '12.95', '', 6);
INSERT INTO `catering` VALUES(16, 'SANDWICH MIX', 'ASSORTED SANDWICHES \r\nplease make sandwich selection from our Catering Menu and enter it in the box below \r\nPASTA CAPRESE or ORZO PASTA SALAD (specify below)\r\nGREEN or CAESAR SALAD (specify below)\r\nCHOCOLATE CHIP COOKIES \r\n', 'img_201221132054.jpg', '12.95', '', 3);
INSERT INTO `catering` VALUES(17, 'ASSORTED WRAPS ', 'ASSORTED WRAPS \r\nmake your own wrap selection, choose from our Catering Menu and enter it in the box below \r\nPASTA CAPRESE or ORZO PASTA SALAD \r\nGREEN or CAESAR SALAD (specify Salad selection below)\r\nCHOCOLATE CHIP COOKIES \r\n', 'img_201221132142.jpg', '11.95', '', 4);
INSERT INTO `catering` VALUES(18, 'FRUIT & PASTRY BUFFET', 'Light and refreshing Breakfast option\r\nLOW-FAT YOGURT (vanilla or strawberry flavor) \r\nFRESH FRUIT & BERRIES MIX served with ORGANIC GRANOLA \r\nASSORTED PASTRY PLATTER \r\n(please specify pastry selection below) \r\nCOFFEE (served with condiments)', 'img_2012211314224.jpg', '12.95', '', 1);
INSERT INTO `catering` VALUES(19, 'POWER BREAKFAST BUFFET', 'SCRAMBLED EGGS\r\nBREAKFAST STYLE POTATOES\r\nBACON, HAM or SAUSAGE \r\n(please specify meat selection below)\r\nBREAKFAST BREADS with condiments, or TORTILLAS and salsa\r\nFRESHLY SQUEEZED ORANGE JUICE and COFFEE \r\n', 'img_2012221417131.jpg', '12.95', '', 1);
INSERT INTO `catering` VALUES(20, 'BREAKFAST CONTINENTAL STYLE ', 'ASSORTED PASTRY PLATTER and PRESERVES\r\n(please select from Full Catering Menu page and enter in box below)\r\nFRESHLY SLICED FRUITS \r\nMINI PARFAITS\r\nCOFFEE & ORANGE JUICE \r\nserved with all condiments', 'img_2012211315215.jpg', '10.75', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cateringAddons`
--

CREATE TABLE `cateringAddons` (
  `idCateringAddons` int(20) NOT NULL auto_increment,
  `cateringAddonsTitle` varchar(50) collate utf8_unicode_ci NOT NULL,
  `cateringAddonsPrice` varchar(10) collate utf8_unicode_ci NOT NULL,
  `cateringAddonsType` varchar(15) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idCateringAddons`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cateringAddons`
--

INSERT INTO `cateringAddons` VALUES(24, 'Diet Coke', '+0.90', 'beverges');
INSERT INTO `cateringAddons` VALUES(23, 'Coke', '+0.90', 'beverges');
INSERT INTO `cateringAddons` VALUES(21, 'FIJI Water', '+1.35', 'beverges');
INSERT INTO `cateringAddons` VALUES(22, 'Orange Juice 12oz', '+1.35', 'beverges');
INSERT INTO `cateringAddons` VALUES(19, 'Whole Fruits', '+1.00', 'dessert');
INSERT INTO `cateringAddons` VALUES(20, 'Bottled Water', '+0.90', 'beverges');
INSERT INTO `cateringAddons` VALUES(17, 'Cheese Cake w/trimming', '+1.95', 'dessert');
INSERT INTO `cateringAddons` VALUES(18, 'Chocolate Brownies', '+1.25', 'dessert');
INSERT INTO `cateringAddons` VALUES(16, 'Cheese Cake', '+1.50', 'dessert');
INSERT INTO `cateringAddons` VALUES(15, 'Lemon Cake ', '+1.50', 'dessert');
INSERT INTO `cateringAddons` VALUES(25, 'Sprite ', '+0.90', 'beverges');
INSERT INTO `cateringAddons` VALUES(26, 'Sprite - Diet (12oz)', '+0.90', 'dessert');
INSERT INTO `cateringAddons` VALUES(27, 'Gatorade', '1.89', 'beverges');
INSERT INTO `cateringAddons` VALUES(28, 'Vitamin Water', '+1.89', 'beverges');

-- --------------------------------------------------------

--
-- Table structure for table `cateringfullCat`
--

CREATE TABLE `cateringfullCat` (
  `idcateringfullCat` int(5) NOT NULL auto_increment,
  `cateringfullCatName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `cateringfullCatDesc` text collate utf8_unicode_ci NOT NULL,
  `cateringfullCatImg1` varchar(50) collate utf8_unicode_ci NOT NULL,
  `cateringfullCatImg2` varchar(50) collate utf8_unicode_ci NOT NULL,
  `cateringfullCatImg3` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idcateringfullCat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cateringfullCat`
--

INSERT INTO `cateringfullCat` VALUES(1, 'BREAKFAST', '', '', '', '');
INSERT INTO `cateringfullCat` VALUES(2, 'APPETIZERS', '', '', '', '');
INSERT INTO `cateringfullCat` VALUES(3, 'SANDWICH SELECTION', 'Served with 2 salads of your choice, chips and cookies $11.95 /person', '', '', '');
INSERT INTO `cateringfullCat` VALUES(4, 'WRAPS', '', '', '', '');
INSERT INTO `cateringfullCat` VALUES(5, 'SALAD SELECTION - CATERING', '', '', '', '');
INSERT INTO `cateringfullCat` VALUES(6, 'ENTRÉES ', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cateringfullItem`
--

CREATE TABLE `cateringfullItem` (
  `idcateringfullItem` int(100) NOT NULL auto_increment,
  `cateringfullItemName` varchar(240) collate utf8_unicode_ci NOT NULL,
  `cateringfullItemDesc` text collate utf8_unicode_ci NOT NULL,
  `idcateringfullCat` int(30) NOT NULL,
  `cateringfullItemStatus` varchar(100) collate utf8_unicode_ci NOT NULL,
  `cateringfullItemPrice` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idcateringfullItem`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `cateringfullItem`
--

INSERT INTO `cateringfullItem` VALUES(4, 'FRESH BAKERY ASSORTMENT ', 'Selection of muffins, bagels, croissants, or Danish pastries and sweet breads, served with cream-cheese, butter and preserves. $5.25/person MIN. 12', 1, '', '5.25/p.');
INSERT INTO `cateringfullItem` VALUES(3, 'MOTE CHRISTO BREAKFAST SANDWICH ', 'Served with syrup and individual fruit cups. $5.95/person MIN.12', 1, '', '5.95/p.');
INSERT INTO `cateringfullItem` VALUES(58, 'HEARTY OATMEAL', 'Breakfast for good start! Our old-fashioned, steel-cut oatmeal is served hot with following condiments: raising, brown sugar, butter, and milk. $ 3.75/person MIN. 15', 1, '', '');
INSERT INTO `cateringfullItem` VALUES(6, 'BREAKFAST SANDWICH PLATTER ', 'Breakfast sandwiches made on croissants or your choice of bread, in three variations: Bacon and Cheese, Ham and Cheese, and Spinach and Cheese. $4.50 each MIN.12 BUFFET STYLE SERVING with Country potatoes, butter and preserves, selection of two meats $6.95/p.', 1, '', '6.95/p.');
INSERT INTO `cateringfullItem` VALUES(7, 'VEGETARIAN EGG-WHITE BREAKFAST BURRITOS', 'Healthy choice. Egg whites wraps made on whole wheat tortilla, you can choose from Spinach and Feta cheese, and pico de gallo, Bacon and cheese. 6.95/person MIN.12', 1, '', '6.95/p.');
INSERT INTO `cateringfullItem` VALUES(8, 'BREAKFAST BURRITO PLATTER ', 'Flour tortillas stuffed with fluffy scrambled eggs, cheese, potatoes, and your choice of bacon, sausage, spinach, or no meat. $4.50 ea. MIN.12\r\nBUFFET STYLE OF SERVING with breakfast potatoes, pico de gallo, salsa and sour cream $6.95/person \r\n', 1, '', '6.95/p.');
INSERT INTO `cateringfullItem` VALUES(9, 'FRUIT AND YOGURT PARFAIT CUPS ', 'Assorted low-fat yogurt, selection of fresh fruits (banana, strawberries, or blueberries) topped with organic granola. $5.25/person \r\nBUFFET STYLE – served separately, with 3 choices of fruit, and individual fruit cups (CAN ONLY BE ORDERED AS ADDITION TO ANY OTHER ITEM)\r\n', 1, '', '5.25/p.');
INSERT INTO `cateringfullItem` VALUES(10, 'ARTISAN CHEESE and FRUIT PLATES ', 'Beautifully arranged Baby Brie, Swiss Ementaller, Mozzarella, Sharp Cheddar, and Apple Jack cheeses, with red and white grapes, organic green apples, and other fresh sliced fruits, served with assorted nuts and crackers. $ 11.95/person MIN.12', 2, '', '11.95/p.');
INSERT INTO `cateringfullItem` VALUES(11, 'SLICED MEATS PARTY PLATTER ', 'Selection of Prosciutto, Deli corned beef, Smoked Turkey Breas, Italian salami and fresh cucumber, served with pickles, green olives, and cherry tomato. $12.95/person', 2, '', '12.95/p.');
INSERT INTO `cateringfullItem` VALUES(12, 'CRUDITE PLATTER (SLICED FRESH VEGETABLES) ', 'Fresh vegetables, sliced and garnished, with side of Ranch dip.  $3.95/person (CAN ONLY BE ORDERED AS ADDITION TO OTHER ITEM) ', 2, '', '3.95/p.');
INSERT INTO `cateringfullItem` VALUES(13, 'FRESH FRUIT PLATTER  ', 'Fresh fruits, sliced and garnished, with side of caramelized vanilla dip.  $3.95/person (CAN ONLY BE ORDERED AS ADDITION TO OTHER ITEM) ', 2, '', '3.95/p.');
INSERT INTO `cateringfullItem` VALUES(57, 'MEDITERRANEAN APPETIZER', 'You will love it… Humus, Tzazziki (Greek yogurt with cucumber & mint), and Dulmas(stuffed grape leafs) served with pitta chips and kalamata olive pesto $4.95/person MIN 20', 2, '', '');
INSERT INTO `cateringfullItem` VALUES(15, 'CHICKEN SATAY ', 'Lightly spicy marinated Chicken breasts sticks, served with traditional Thai peanut sauce, with side of steamed rice. $4.95/person MIN. 20', 2, '', '4.95/p.');
INSERT INTO `cateringfullItem` VALUES(16, 'SHRIMP COCKTAIL ', 'This party essential comes on platter with delicious house-made sauce. It could be served on martini glasses if desired. 6.95/person MIN.15', 2, '', '');
INSERT INTO `cateringfullItem` VALUES(17, 'ALBACORE TUNA-SALAD SANDWICH', 'Albacore tuna-salad mix with celery, olives, pickles, mayonnaise, white pepper and slightly salted', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(18, 'CHICKEN-SALAD SANDWICH', 'Tender Chicken breast mixed with mayonnaise, celery, apples, cranberries, plus lettuce and tomato, on your choice of bread ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(19, 'CALIFORNIA CLUB with AVOCADO', 'Sliced smoked turkey breast, avocado, tomato, lettuce, hint of red onion, crumbles of bacon, Swiss cheese, and ranch dressing spread; Recommended choice of bread – croissant ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(20, 'SMOKED TURKEY & SWISS', 'Smoked Turkey breasts sliced, Swiss cheese, green leaf lettuce, onion, tomato, mustard and mayo, on your choice of bread ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(21, 'BLT with AVOCADO', 'Bacon, lettuce, tomato, with avocado, mayonnaise and Dijon mustard spread; your choice of bread ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(22, 'HAM & CHEESE', 'Sliced honey ham, cheddar cheese, tomato, Iceberg lettuce, pickles, mustard and mayonnaise ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(23, 'ROAST BEEF ', 'Slow-roasted beef, pickles, tomato, provolone and cheddar cheese, horseradish, green leaf lettuce, mustard and mayo ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(24, 'CLASSIC ITALIAN', 'Ham, Italian Salami, pepperoni, sliced pepperoncini, pickles, red onion, provolone cheese, bell peppers, tomato, shredded iceberg lettuce, mustard and mayonnaise ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(25, 'CAPRESE TOMATO MOZZARELLA SANDWICH (Vegetarian)', 'Sliced fine ripe steak-tomatoes, fresh basil leafs, baby spinach leafs, and soft mozzarella cheese; oregano, olive oil-balsamic vinaigrette drizzle ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(26, 'GRILLED VEGGIE SANDWICH', 'Grilled veggies: red bell pepper, yellow squash, asparagus, red onion, provolone cheese, cilantro pesto spread, spinach leafs ', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(27, 'GRILLED CHICKEN SANDWICH', 'Grilled Chicken, bell peppers, sun dried tomato, green lettuce leafs, Cilantro-Pesto with mayo and balsamic vinegar spread; your choice of bread', 3, '', '');
INSERT INTO `cateringfullItem` VALUES(28, 'CHICKEN-SALAD WRAP', 'Our delicious chicken salad mix, green leafs, sprouts, and orange hearts, wrapped tortilla of your choice ', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(29, 'AVOCADO-VEGGIE WRAP', 'Avocado, green leaf lettuce, cucumber, tomato, sliced bell pepper, shredded carrots, alfalfa sprouts, cilantro, olive oil drizzled; recommended in spinach or sundried tomato wrap, your choice of Ranch, humus, or other sauces on the side', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(30, 'CHICKEN CAESAR WRAP', 'Grilled chicken, romaine lettuce, hint of red onion, parmesan cheese, bacon, crunched croutons; served with creamy Caesar dipping sauce on the side', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(31, 'SPICY THAI GRILLED CHICKEN WRAP ', 'Thai grilled chicken breasts, green leaf lettuce, tomato, cucumber, shredded carrot, bean sprouts, cilantro, served with Thai-peanut dipping sauce and sesame-ginger on the side', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(32, 'SOUTH WESTERN STYLE WRAP', 'Grilled chicken, roasted corn, black beans, sliced pepper jack cheese, shredded mozzarella cheese, green leaf lettuce, cucumber, tomato; served with Southwestern sauce on the side, and your choice of tortilla flavor (recommended: on sundried tomato tortilla)', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(34, 'TURKEY and CREAM-CHEESE CUT WRAPS', 'Sliced smoked turkey, cucumber, carrots, cream cheese spread, green leafs, served with ranch ', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(35, 'SPRING ROLLS ', 'Chicken or Shrimp, with Avocado; cucumber, rice noodles, bean sprouts, lettuce, cilantro, wrapped in rice paper; served with hot-sauce, sesame-ginger soy sauce, and Thai-peanut sauce on the side', 4, '', '');
INSERT INTO `cateringfullItem` VALUES(37, 'ORGANIC GREEN', '\r\nOrganic baby spring mix, sliced young cucumber, and green onion, served seasoned with olive oil, salt and pepper, or tossed with servings upon delivery\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(38, 'CRISPY CAESAR ', '\r\nFresh cut crispy Romaine lettuce, croutons, and parmesan cheese with dressing on the side\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(39, 'ANTIOXIDANT', '\r\nBaby spring mix, fresh blueberries, dried cranberries, strawberries, apples, fresh mint leafs, red onion, cucumbers, blue cheese, served with vanilla bean balsamic vinaigrette dressing\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(40, 'CHOPPED GREEK GARDEN SALAD', '\r\nSliced fresh cucumber, tomatoes, black olives, artichoke hearts, Italian parsley, Feta cheese, lemon juice, black pepper, extra virgin olive oil, over a bedding of Organic green mix\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(41, 'FRESH MEDITERRANEAN SALAD (WITH CUBES OF FETA CHEESE)', 'Diced fresh cucumber, tomatoes, bell pepper, green olives, artichoke hearts, Feta cheese, lemon juice, extra virgin olive oil (The way salad is made and served, it doesn’t need dressings)\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(43, 'TANGARINE HARTS - ORIENTAL STYLE SALAD', '\r\nFresh iceberg lettuce, Napa cabbage, red cabbage, edamame, carrot, green onion, cilantro, rice noodle; served with Oriental sesame ginger dressing on the side\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(44, 'ANGEL HAIR – PASTA SALAD', '\r\nAngel hair pasta, mixed with diced roma tomatoes, fresh basil, feta and Parmesan cheese, and tossed with extra virgin olive oil\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(45, 'CAPRESE PASTA SALAD', '\r\nPenne pasta mixed with cut cherry tomatoes, fresh basil leafs, fresh mozzarella, seasoned and mixed with olive oil\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(46, 'ORZO PASTA SALAD ', '\r\nOrzo pasta, asparagus, bell pepper, Italian parsley, parmesan cheese, red onion, tossed in virgin olive oil\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(47, 'TRI-PASTA ROTINI - ITALIAN STYLE', '\r\nRotini pasta, sliced olives, onion, bell pepper, seasoned and tossed in olive oil\r\n', 5, '', '');
INSERT INTO `cateringfullItem` VALUES(48, 'CHICKEN PARMESAN', 'Tender chicken breasts in bread crumbles, marinara sauce over penne pasta, garlic bread', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(49, 'BOW TIE PASTA ALFREDO WITH CHICKEN or VEGETARIAN', 'Bow tie pasta in white Alfredo sauce, mixed with chicken slices and vegetables', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(50, 'PASTA WITH GRILLED VEGGIES IN MARINARA SAUCE (Vegetarian)', 'This pasta option is vegetarian, and it comes with your choice of pasta, with veggie-marinara sauce', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(51, 'KUNG PAO CHICKEN', 'Kung-pao seasoned chicken, with peanuts, Thai chili and, lemon grass, onion, and seasoning; served with rice on the side', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(52, 'TERYAKI CHICKEN, STEAK, or SALMON', 'Teryaki glazed Chicken, Steak, or Salmon, served over rice and steamed vegetables', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(53, 'MONGOLIAN BEEF', 'Fine sliced steak, marinated and grilled with soy garlic-sauce and served with sides of steamed rice and broccoli, or other vegetables by your choice', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(54, 'CHICKEN & STEAK SOUVLAKI', 'Greek style seasoned Chicken and Steak skewers, served with Mediterranean sides and appetizers ', 6, '', '');
INSERT INTO `cateringfullItem` VALUES(55, 'SUPER TACO BAR', 'Chicken, steak, or shrimp Fajitas -steamed white or Mexican rice  -pinto or black beans  -salsa bar: fresh salsa, pico de gallo, grated cheese, fresh cut lettuce -corn chips, guacamole, and sour cream -corn and flour tortill', 6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cateringText`
--

CREATE TABLE `cateringText` (
  `idCatTxt` int(5) NOT NULL auto_increment,
  `catTitle` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `catTxt` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `catTitleShrt` int(10) NOT NULL,
  `catTxtShrt` int(10) NOT NULL,
  PRIMARY KEY  (`idCatTxt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cateringText`
--

INSERT INTO `cateringText` VALUES(3, 'WELCOME TO CCOL GROUP ORDERS & CATERING SERVICES', 'We carefully created these 8 pre-selected packages, and we are now offering them at your convenience for fast and easy on-line ordering. And not just that we hope to save you some time and money, but we guaranty that most of them are the best deal in town. \r\nIn case that you would like to place a custom order please go to <a href="index.php?page=catering-full-menu">Full Catering Menu</a> page, to see our full catering offer, and give us a call any time at 949-945-7702. Also use this page to customize your on-line orders. <br /><br />\r\nTHANK YOU FOR CHOOSING CORPORATE CATERING ONLINE!\r\n<br />\r\n<br />', 15, 170);
INSERT INTO `cateringText` VALUES(2, 'WELCOME TO CCOL! ENJOY THE FUSION OF WORLD WIDE CUISINES, ALL AT ONE PLACE...', 'Per your request we can make you anything. You name it! Our Catering Menu features and consists of simple snacks and sandwiches, or world most popular dishes and cuisines. You can choose from: Breakfast and Appetizers, to Asian, All American, Italian, Mexican, Mediterranean, plus variety of Salads, Sandwiches, Wraps, or custom cooked meals are available as well. Our Chefs and cooks use only the best and the freshest ingredients, and organic or locally grown produce and products. We always follow the #1 rule in the kitchen: Only high quality and fresh ingredients could be used to prepare good food.  \r\n<br /><br />\r\nHowever, we don''t want to overwhelm you with some book-like, long written and listed menu. Therefore, we would like to highly recommend some of the items bellow, that are specially created for Corporate Events and needs. We exclusively created breakfast and lunch selections, and just by entering the number of people your order is placed. Besides that, we  guaranty that some of these preselected packages are the best deal in town.\r\n', 16, 170);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `idComp` int(100) NOT NULL auto_increment,
  `companyName` varchar(200) collate utf8_unicode_ci NOT NULL,
  `adress` varchar(240) collate utf8_unicode_ci NOT NULL,
  `city` varchar(200) collate utf8_unicode_ci NOT NULL,
  `suite` varchar(50) collate utf8_unicode_ci NOT NULL,
  `zipCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `contactPerson` text collate utf8_unicode_ci NOT NULL,
  `deliveryTime` varchar(20) collate utf8_unicode_ci NOT NULL,
  `deliveryTime2nd` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idComp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` VALUES(5, 'Corporate Catering Online', '17821 Sky Park Circle', 'Irvine', 'A', '92614', 'Grada Lukic', '09:20 AM - 09:35 AM', '');
INSERT INTO `company` VALUES(8, 'HID Global (Barranca Pkwy)', '15370 Barranca Pkwy', '  Irvine', 'n/a', '92618', 'n/a', '8:00AM - 8:15AM', '');
INSERT INTO `company` VALUES(9, 'NIKKEN', '52 Dscovery', 'Irvine', 'n/a', '92618', 'n/a', '8:30AM - 8:45AM', '');
INSERT INTO `company` VALUES(10, 'THALES', '58 Discovery ', 'Irvine', 'all', '92618', 'Ask front desk', '9:00AM - 9:15AM', '');
INSERT INTO `company` VALUES(11, 'CAL STATE FULLERTON (Irvine)', '3 Banting ', 'Irvine', 'All', '92618', 'Front Desk', '9:30AM - 9:45AM', '');
INSERT INTO `company` VALUES(12, 'Med Weigh & Lasers', '60 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:50AM - 10:05AM', '');
INSERT INTO `company` VALUES(13, 'Pharma Pass', '68 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '10:00 AM - 10:10AM', '');
INSERT INTO `company` VALUES(14, 'Upstanding', '70 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:05 AM', '');
INSERT INTO `company` VALUES(15, 'Spectrum Risk Management', '74 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(16, 'NORCOMP Southern California', '76 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(17, 'Morgan Marketing', '78 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(18, 'Braden & Tucci', '82 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(19, 'Whittlesey Doyle ', '94 Discovery', 'Irvine ', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(20, 'OUTCLICK Media', '96 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(21, 'Wu & Cheung, LLP - Lawyers ', '98 Discovery', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(22, 'RPM Engineers, Inc.', '102 Discovery ', 'Irvine', 'All', '92618', 'Front Desk', '9:55AM - 10:10AM', '');
INSERT INTO `company` VALUES(23, 'Maruchan, Inc.', '15800 Laguna Canyon Rd.', 'Irvine', 'All', '92619', 'Front Desk', '10:45AM - 11:00AM', '');
INSERT INTO `company` VALUES(24, 'United Medical Imaging', '15825 Laguna Canyon Rd.', 'Irvine', 'All', '92619', 'Front Desk', '11:15AM - 11:30AM', '');
INSERT INTO `company` VALUES(25, 'OC ORTHOPEDICS & Sports Medical Group', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:15AM - 11:30AM', '');
INSERT INTO `company` VALUES(26, 'Irvine-Gastroentorology / Liver Center', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:20AM - 11:30AM', '');
INSERT INTO `company` VALUES(27, 'Pain Care Providers', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:20AM - 11:30AM', '');
INSERT INTO `company` VALUES(28, 'Specialty Surgical Center Irvine', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:25AM - 11:40AM', '');
INSERT INTO `company` VALUES(29, 'OTTO BOCK Healthcare ', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:30AM - 11:45', '');
INSERT INTO `company` VALUES(30, 'Nerve PRO Medical Corporation', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:30AM - 11:45', '');
INSERT INTO `company` VALUES(31, 'Charles R. Sexton MD General Cosmetic Dermatology', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:15AM - 11:30AM', '');
INSERT INTO `company` VALUES(32, 'OC Dental Specialist ', '15825 Laguna Canyon Road', 'Irvine', 'All', '92619', 'Front Desk', '11:30AM - 11:45AM', '');
INSERT INTO `company` VALUES(33, 'HID Global (Discovery)', '53 Discovery', 'Irvine', 'All', '92619', 'Front Desk', '12:00PM - 12:15PM', '');
INSERT INTO `company` VALUES(34, 'Billabong', '117 Waterworks Way', 'Irvine', 'All', '92619', 'Front Desk', '12:30PM - 12:45PM', '');
INSERT INTO `company` VALUES(35, 'Element ', '121 Waterworks Way', 'Irvine', '100', '92619', 'Front Desk', '12:45PM - 1:00PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `idcoupons` int(240) NOT NULL auto_increment,
  `couponID` varchar(50) collate utf8_unicode_ci NOT NULL,
  `couponStart` date NOT NULL,
  `couponExp` date NOT NULL,
  `couponAmount` varchar(100) collate utf8_unicode_ci NOT NULL,
  `couponAct` varchar(15) collate utf8_unicode_ci NOT NULL,
  `couponType` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idcoupons`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` VALUES(1, 'cx2387b', '2012-03-01', '2012-04-01', '3.00', '', 'absolute');
INSERT INTO `coupons` VALUES(2, 'expired', '2012-01-01', '2012-01-31', '10', '0', 'absolute');
INSERT INTO `coupons` VALUES(3, 'inactive', '2012-03-01', '2012-03-31', '10', '1', 'absolute');
INSERT INTO `coupons` VALUES(4, 'percent', '2012-03-01', '2012-03-31', '10', '0', 'percent');
INSERT INTO `coupons` VALUES(5, 'absolute', '2012-03-01', '2012-03-31', '10', '0', 'absolute');

-- --------------------------------------------------------

--
-- Table structure for table `dropDown`
--

CREATE TABLE `dropDown` (
  `idDropDown` int(20) NOT NULL auto_increment,
  `dropDownName` varchar(100) NOT NULL,
  `position` varchar(10) NOT NULL,
  `showPrizes` enum('show','hide') NOT NULL,
  `showQty` enum('show','hide') NOT NULL,
  `displayIn` text NOT NULL,
  PRIMARY KEY  (`idDropDown`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `dropDown`
--

INSERT INTO `dropDown` VALUES(1, 'WHOLE FRESH FRUIT', '3', 'show', 'show', '120, 100, 99, 98, 97, 96, 95, 94, 93, 92, 90, 89, 88, 86, 85, 84, 81, 122, 110, 109, 108, 107, 106, 105, 104, 103, 102, 101, 61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42, 116, 115, 114, 112, 111, 62, 60, 10, 8, 7, 6, 5, 4');
INSERT INTO `dropDown` VALUES(3, 'ALL SNACKS', '4', 'show', 'show', '120, 100, 99, 98, 97, 96, 95, 94, 93, 92, 90, 89, 88, 86, 85, 84, 81, 122, 110, 109, 108, 107, 106, 105, 104, 103, 102, 101, 61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42, 116, 115, 114, 112, 111, 62, 60, 10, 8, 7, 6, 5, 4');
INSERT INTO `dropDown` VALUES(4, 'SWEETS & DESSERT', '6', 'show', 'show', '120, 100, 99, 98, 97, 96, 95, 94, 93, 92, 90, 89, 88, 86, 85, 84, 81, 122, 110, 109, 108, 107, 106, 105, 104, 103, 102, 101, 61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42, 116, 115, 114, 112, 111, 62, 60, 10, 8, 7, 6, 5, 4');
INSERT INTO `dropDown` VALUES(5, 'SOFT BEVERAGE', '5', 'show', 'show', '120, 100, 99, 98, 97, 96, 95, 94, 93, 92, 90, 89, 88, 86, 85, 84, 81, 122, 110, 109, 108, 107, 106, 105, 104, 103, 102, 101, 61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42, 116, 115, 114, 112, 111, 62, 60, 10, 8, 7, 6, 5, 4');
INSERT INTO `dropDown` VALUES(6, 'CHANGE DRESSINGS', '1', 'hide', 'hide', '120, 100, 99, 98, 97, 96, 95, 94, 93, 92, 90, 89, 88, 86, 85, 84, 122, 110, 109, 108, 107, 106, 105');
INSERT INTO `dropDown` VALUES(7, 'CHOOSE LETTUCE', '2', 'hide', 'hide', '98, 96, 90, 88, 86, 85');
INSERT INTO `dropDown` VALUES(8, 'CHOOSE TORTILLA FLAVOR', '1', 'hide', 'hide', '116, 115, 114, 112, 111, 62, 5, 4');
INSERT INTO `dropDown` VALUES(9, 'CHOICE OF MEAT', '2', 'hide', 'hide', '6, 4');
INSERT INTO `dropDown` VALUES(10, 'BREAD CHOICE', '1', 'hide', 'hide', '61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42, 6');
INSERT INTO `dropDown` VALUES(11, 'ADD SIDES', '2', 'show', 'show', '97, 61, 59, 58, 55, 54, 52, 50, 48, 47, 46, 45, 44, 43, 42');
INSERT INTO `dropDown` VALUES(21, 'MEAT CHOICE', '2', 'show', 'show', '89, 84');
INSERT INTO `dropDown` VALUES(12, 'CHOOSE YOGURT FLAVOR', '1', 'hide', 'hide', '8, 7');
INSERT INTO `dropDown` VALUES(22, 'ADD MEAT', '2', 'show', 'show', '122, 110, 109, 108, 106, 105, 101');
INSERT INTO `dropDown` VALUES(14, 'PICK FRESH PASTRY', '1', 'show', 'show', '10');
INSERT INTO `dropDown` VALUES(15, 'TRIMMINGS', '2', 'show', 'show', '10');
INSERT INTO `dropDown` VALUES(20, 'CHOOSE BERRIES', '2', 'show', 'hide', '8, 7');
INSERT INTO `dropDown` VALUES(17, 'CHOICES:', '1', 'show', 'hide', '60');
INSERT INTO `dropDown` VALUES(18, 'PROTEIN CHOICE', '2', 'show', 'show', '120, 100, 99, 95, 92');
INSERT INTO `dropDown` VALUES(19, 'DIPPING & SAUCES', '2', 'hide', 'hide', '81, 102, 116, 115, 114, 112, 111, 62');

-- --------------------------------------------------------

--
-- Table structure for table `dropDownItems`
--

CREATE TABLE `dropDownItems` (
  `idItemDropDown` int(210) NOT NULL auto_increment,
  `dropDownItemName` varchar(200) collate utf8_unicode_ci NOT NULL,
  `idDropDown` int(100) NOT NULL,
  `dropDownItemPrice` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ddVisible` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idItemDropDown`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=186 ;

--
-- Dumping data for table `dropDownItems`
--

INSERT INTO `dropDownItems` VALUES(2, 'Banana', 1, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(49, 'Ranch', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(4, 'Romaine lettuce', 7, '', 'show');
INSERT INTO `dropDownItems` VALUES(7, 'Kettle One - Natural', 3, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(8, 'Kettle One - Sea Salt & Pepper', 3, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(126, 'Smart Water', 5, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(10, 'Oatmeal Cookie', 4, '1.35', 'show');
INSERT INTO `dropDownItems` VALUES(11, 'Chocolate Chip Cookie', 4, '1.25', 'show');
INSERT INTO `dropDownItems` VALUES(12, 'Coca cola - Regular', 5, '1.15', 'show');
INSERT INTO `dropDownItems` VALUES(13, 'Coca cola - Diet', 5, '1.15', 'show');
INSERT INTO `dropDownItems` VALUES(14, 'Apple juice', 5, '1.50', 'show');
INSERT INTO `dropDownItems` VALUES(15, 'Balsamic Vinaigrette', 6, '', '');
INSERT INTO `dropDownItems` VALUES(110, 'Apple - Fuji', 1, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(109, 'Apple - Granny Smith', 1, '1.19', 'show');
INSERT INTO `dropDownItems` VALUES(18, 'Carrot Cake (slice)', 4, '2.75', 'show');
INSERT INTO `dropDownItems` VALUES(19, 'Home-made Brownie', 4, '2.25', 'show');
INSERT INTO `dropDownItems` VALUES(20, 'Croissant', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(21, 'Whole Wheat', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(22, 'Multigrain', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(23, 'Sourdough', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(24, 'Country White', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(25, 'Squaw', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(26, 'Baguette', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(27, 'Sandwich Roll', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(28, 'Ciabatta', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(176, 'Orzo Pasta Salad 8 oz', 11, '2.50', 'show');
INSERT INTO `dropDownItems` VALUES(175, 'Rotini Pasta Salad 8 oz', 11, '2.89', 'show');
INSERT INTO `dropDownItems` VALUES(178, 'Side Caesar Salad 12 oz', 11, '3.25', 'show');
INSERT INTO `dropDownItems` VALUES(41, 'Organic Spring Mix ', 7, '', 'show');
INSERT INTO `dropDownItems` VALUES(177, 'Side Green Salad 12oz', 11, '3.25', 'show');
INSERT INTO `dropDownItems` VALUES(64, 'Whole Wheat Tortilla', 8, '', 'show');
INSERT INTO `dropDownItems` VALUES(173, 'Coleslaw 6oz', 11, '2.25', 'show');
INSERT INTO `dropDownItems` VALUES(40, 'Rye', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(42, 'Organic Baby Spinach', 7, '', 'show');
INSERT INTO `dropDownItems` VALUES(43, 'Iceberg ', 7, '', 'show');
INSERT INTO `dropDownItems` VALUES(44, 'Iceberg-Romaine Mix', 7, '', 'show');
INSERT INTO `dropDownItems` VALUES(50, 'Honey-Mustard', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(51, 'Caesar (regular)', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(52, 'Caesar (creamy)', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(53, 'Italian', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(54, 'Raspberry Vinaigrette ', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(55, 'Oriental Sesame-ginger', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(57, 'Soy Sauce', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(59, 'Kettle One - Salt & Vinegar', 3, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(60, 'Kettle One - BBQ', 3, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(61, 'Lays - Original', 3, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(62, 'Arrowhead Bottled Water', 5, '0.90', 'show');
INSERT INTO `dropDownItems` VALUES(63, 'Aqua Fina - Bottled Water', 5, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(65, 'Flour Tortilla', 8, '', 'show');
INSERT INTO `dropDownItems` VALUES(66, 'Spinach Tortilla', 8, '', 'show');
INSERT INTO `dropDownItems` VALUES(67, 'Sundried Tomato Tortilla', 8, '', 'show');
INSERT INTO `dropDownItems` VALUES(69, 'FIJI Bottled Water', 5, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(70, 'Butter Croissant', 14, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(71, 'Cream Cheese Croissant', 14, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(72, 'Strawberry-Cream cheese Croissant ', 14, '1.95', 'show');
INSERT INTO `dropDownItems` VALUES(73, 'Chocolate Croissant', 14, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(74, 'Ham & Cheese Croissant', 14, '2.79', 'show');
INSERT INTO `dropDownItems` VALUES(75, 'Cinnamon-Raisins Roll', 14, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(76, 'Bagel - plain', 14, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(77, 'Sesame Seeds Bagel', 14, '1.99', 'show');
INSERT INTO `dropDownItems` VALUES(78, 'Vanilla White Vinaigrette', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(79, 'Orange-Honey Vinaigrette', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(80, 'Blue-cheese Dressing', 6, '', '');
INSERT INTO `dropDownItems` VALUES(81, 'Thousand Island', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(82, 'Southwestern ', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(83, 'Thai Peanut Sauce', 6, '', 'show');
INSERT INTO `dropDownItems` VALUES(84, 'Lemon Bar', 4, '2.75', 'show');
INSERT INTO `dropDownItems` VALUES(85, 'Red Velvet Cheese Cake', 4, '3.25', 'show');
INSERT INTO `dropDownItems` VALUES(86, 'Tiramisu', 4, '3.25', 'show');
INSERT INTO `dropDownItems` VALUES(87, 'Lays - BBQ', 3, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(88, 'Everything Bagel', 14, '1.99', 'show');
INSERT INTO `dropDownItems` VALUES(89, 'Cream Cheese', 15, '0.59', 'show');
INSERT INTO `dropDownItems` VALUES(90, 'Butter chip', 15, '0.29', 'show');
INSERT INTO `dropDownItems` VALUES(91, 'Strawberry-preserves', 15, '0.29', 'show');
INSERT INTO `dropDownItems` VALUES(92, 'Apple Jam preserves', 15, '0.29', 'show');
INSERT INTO `dropDownItems` VALUES(93, 'Mixed fruit preserves', 15, '0.39', 'show');
INSERT INTO `dropDownItems` VALUES(94, 'Fresh Strawberries', 15, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(95, 'Fresh Blueberries', 15, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(96, 'Low-fat Vanilla ', 12, '', 'show');
INSERT INTO `dropDownItems` VALUES(97, 'low-fat Strawberry ', 12, '', 'show');
INSERT INTO `dropDownItems` VALUES(98, 'Blueberries', 13, '', 'show');
INSERT INTO `dropDownItems` VALUES(99, 'Strawberry', 13, '', 'show');
INSERT INTO `dropDownItems` VALUES(100, 'Blackberries', 13, '', 'show');
INSERT INTO `dropDownItems` VALUES(101, 'Plain Low-fat ', 12, '', 'show');
INSERT INTO `dropDownItems` VALUES(174, 'Potato Salad 8 oz', 11, '2.95', 'show');
INSERT INTO `dropDownItems` VALUES(172, 'Beet Salad 8 oz', 11, '2.95', 'show');
INSERT INTO `dropDownItems` VALUES(111, 'Pear - D''anjou', 1, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(112, 'Naval Orange', 1, '1.19', 'show');
INSERT INTO `dropDownItems` VALUES(113, 'Blueberries 4 oz', 1, '2.89', 'show');
INSERT INTO `dropDownItems` VALUES(114, 'Strawberries 8 oz', 1, '3.29', 'show');
INSERT INTO `dropDownItems` VALUES(115, 'Grape Medley 12 oz', 1, '3.79', 'show');
INSERT INTO `dropDownItems` VALUES(116, 'Pineapple only 8 oz', 1, '3.29', 'show');
INSERT INTO `dropDownItems` VALUES(117, 'Cantaloupe only 8 oz', 1, '2.99', 'show');
INSERT INTO `dropDownItems` VALUES(118, 'Honey Dew 8 oz', 1, '2.99', 'show');
INSERT INTO `dropDownItems` VALUES(119, 'Rustic Italian', 10, '', 'show');
INSERT INTO `dropDownItems` VALUES(120, 'Bacon', 9, '', 'show');
INSERT INTO `dropDownItems` VALUES(121, 'Ham', 9, '', 'show');
INSERT INTO `dropDownItems` VALUES(122, 'Sausage', 9, '', 'show');
INSERT INTO `dropDownItems` VALUES(123, 'No meat', 9, '', 'show');
INSERT INTO `dropDownItems` VALUES(124, 'Chorizo', 9, '', 'show');
INSERT INTO `dropDownItems` VALUES(125, 'Cilantro-Pesto Tortilla', 8, '', 'show');
INSERT INTO `dropDownItems` VALUES(127, 'Perrier', 5, '1.99', 'show');
INSERT INTO `dropDownItems` VALUES(128, 'San Pellegrino', 5, '1.99', 'show');
INSERT INTO `dropDownItems` VALUES(129, 'Gatorade Lemon-lime', 5, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(130, 'Gatorade Fruit Punch', 5, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(131, 'Gatorade - Orange', 5, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(132, 'Orange Juice', 5, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(133, 'Cranberry Juice', 5, '1.99', 'show');
INSERT INTO `dropDownItems` VALUES(134, 'Diet COKE', 5, '1.15', 'show');
INSERT INTO `dropDownItems` VALUES(135, 'Regular Coke', 5, '1.15', 'show');
INSERT INTO `dropDownItems` VALUES(136, 'Chicken', 17, '0', 'show');
INSERT INTO `dropDownItems` VALUES(137, 'Avocado', 17, '0', 'show');
INSERT INTO `dropDownItems` VALUES(161, 'Chicken-Avocado', 17, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(139, 'Shrimp', 17, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(160, 'Shrimp-Avocado', 17, '1.50', '');
INSERT INTO `dropDownItems` VALUES(141, 'Cream Cheese & LOX', 15, '3.99', 'show');
INSERT INTO `dropDownItems` VALUES(142, 'Whole Chicken Breast', 18, '0', 'show');
INSERT INTO `dropDownItems` VALUES(143, 'Salmon Fillet', 18, '1.49', 'show');
INSERT INTO `dropDownItems` VALUES(144, 'Shrimps', 18, '1.49', 'show');
INSERT INTO `dropDownItems` VALUES(145, 'Ranch ', 19, '', 'show');
INSERT INTO `dropDownItems` VALUES(146, 'Humus', 19, '', 'show');
INSERT INTO `dropDownItems` VALUES(147, 'Santa Fe with Cilantro', 19, '', 'show');
INSERT INTO `dropDownItems` VALUES(148, 'Thai peanut sauce', 19, '', 'show');
INSERT INTO `dropDownItems` VALUES(149, 'Blueberries', 20, '0', 'show');
INSERT INTO `dropDownItems` VALUES(151, 'Strawberries', 20, '0', '');
INSERT INTO `dropDownItems` VALUES(152, 'Chicken', 21, '0', 'show');
INSERT INTO `dropDownItems` VALUES(153, 'Steak', 21, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(155, 'Ground Beef', 21, '0.79', 'show');
INSERT INTO `dropDownItems` VALUES(156, 'No sauce', 19, '', '');
INSERT INTO `dropDownItems` VALUES(157, 'Quaker Oatmeal Chewy Bar', 3, '1.50', 'show');
INSERT INTO `dropDownItems` VALUES(158, 'Kelloggs Nutrigrain Bar', 3, '1.50', 'show');
INSERT INTO `dropDownItems` VALUES(159, 'Fiber Plus Antioxidant Bar', 3, '1.29', 'show');
INSERT INTO `dropDownItems` VALUES(162, 'Grilled Chicken', 22, '1.25', 'show');
INSERT INTO `dropDownItems` VALUES(163, 'Shredded Chicken ', 22, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(164, 'Petite Salmon Filet ', 22, '2.99', 'show');
INSERT INTO `dropDownItems` VALUES(165, 'Turkey', 22, '1.00', 'show');
INSERT INTO `dropDownItems` VALUES(166, 'Almonds (unsalted) 4oz', 3, '2.19', 'show');
INSERT INTO `dropDownItems` VALUES(167, 'Planters Peanuts 1oz', 3, '1.79', 'show');
INSERT INTO `dropDownItems` VALUES(168, 'Planters Mixed Nuts 1oz', 3, '1.89', 'show');
INSERT INTO `dropDownItems` VALUES(179, 'Hard broiled Egg', 11, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(182, 'Strawberry&Blueberry', 20, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(181, 'Strawberry-Banana', 20, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(183, 'Blueberry-Banana', 20, '0.99', 'show');
INSERT INTO `dropDownItems` VALUES(185, 'Santa Fe w/Cilantro', 6, '', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `lunchbox`
--

CREATE TABLE `lunchbox` (
  `idLunchBox` int(20) NOT NULL auto_increment,
  `lunchBoxName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lunchBoxDesc` text collate utf8_unicode_ci NOT NULL,
  `lunchBoxImg` varchar(200) collate utf8_unicode_ci NOT NULL,
  `lunchBoxPrice` varchar(20) collate utf8_unicode_ci NOT NULL,
  `lunchBoxStatus` varchar(30) collate utf8_unicode_ci NOT NULL,
  `lunchBoxCategory` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idLunchBox`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lunch box menu' AUTO_INCREMENT=123 ;

--
-- Dumping data for table `lunchbox`
--

INSERT INTO `lunchbox` VALUES(4, 'Breakfast Burritos', 'Scrambled eggs, shredded cheddar,  potato, pico de gallo, with your choice of meat: Ham, Bacon, Steak, Sausage, Chorizo, or No meat; pluse options of tortilla flavor; (for meat and tortilla flavor choice, please select your favorite from the drop down menu in customization option)', 'img_20122012224936.jpg', '4.39', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(5, 'Vegetarian Egg-White Burrito', 'Egg whites only, with Spinach & Feta cheese, Pico de Gallo and your choice of tortilla; Please choose tortilla flavor from the drop-down menu (recommended on: Whole wheat, or Sundried-tomato tortilla flavor)\r\n', 'img_20122012224221.jpg', '6.79', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(6, 'Breakfast Sandwich', 'Scrambled eggs, melted cheddar cheese, with Ham, Bacon, Sausage, or No meat (please choose from the drop-down menu); made on Croissant or your choice of bread\r\n', 'img_20123328103426.jpg', '4.29', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(7, 'Berry Fruit Parfait 12 oz', 'Low-fat Yogurt, all natural granola, and fresh berry fruits; (Choose your berries and yogurt flavor from the drop down menus in the customization option)', 'img_20122012223538.jpg', '3.99', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(8, 'Yogurt Muesli 12oz', 'Description: Bircher muesli is a traditional Swiss recipe, far superior to any breakfast cereal found on the market. Ingredients: low-fat yogurt (strawberry flavor recommended), oats, and diced fruit (fresh orange, green apple, pineapple, strawberries) NOTE: add berries and choose yogurt flavor from the drop down menus', 'img_2012201222348.jpg', '5.49', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(10, 'Fresh Pastry Assortment', 'Choose any pastry and trimming from customization drop-down menu: Butter croissant-plain, Ham-Cheese croissant, Chocolate croissant, Berry -cream cheese Danish, Cinnamon-roll, Apple Strudel, Bagel-plain, Bagel-sesame, and Everything- Bagel.', 'img_20122611224838.jpg', '1.79', '', 'Breakfast');
INSERT INTO `lunchbox` VALUES(42, 'PITA BREAD CHICKEN SANDWICH', '\r\nSeasoned and marinated Grilled Chicken stripes, sundried tomato and olive pesto spread, organic baby spinach leaves, red bell pepper, feta cheese crumbles, hint of red onion, oregano; mustard and mayo on the side; Recommended on Original (soft) Pitta bread (click Customize to make a Bread Selection, or for additional changes)  \r\n', 'img_20123422165329.jpg', '8.95', 'special', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(43, 'BRIE, BLUE & PEARS', 'Our Chef’s signature dish: Slices of finest prosciutto, Brie cheese, fresh pears, Organic baby spinach leafs, and crumbles of blue cheese; Pesto spread, mustard and mayo, served on the side; Recommended on rustic Italian roll (click Customize to make a Bread Selection, or for additional changes)  \r\n', 'img_20123422165244.jpg', '9.95', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(44, 'GRILLED CHICKEN w/PESTO', '\r\nCilantro-Pesto with mayo and balsamic vinegar spread, Marinated Grilled Chicken breast, bell pepper, sun dried tomato, and feta cheese, hint of green onion; Recommended on Ciabatta Roll (click Customize to make a Bread Selection, or for additional changes)  \r\n', 'img_20123422165132.jpg', '7.25', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(45, 'GRILLED CHICKEN CAPRESE', ' Your choice of bread, Grilled Chicken layered with ripe steak-tomatoes, fresh basil leafs, baby spinach, and soft Mozzarella cheese; with sprinkles of oregano, and slightly seasoned with just a drizzle of olive oil-balsamic vinaigrette dressing; (click Customize to make a Bread Selection, or for additional changes) )  \r\n', 'img_20123328104416.jpg', '7.49', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(46, 'HONEY HAM & BRIE', '\r\nDescription: Sliced Smoked Honey-Ham, Brie cheese, pickles, tomato, green leaf or butter lettuce; With mustard, mayo, and Dijon mustard spread, served on the side, (click Customize to make a Bread Selection, or for additional changes) \r\nPrice: 7.99$  \r\n', 'img_20123328104318.jpg', '7.29', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(47, 'AVOCADO & VEGGIES SANDWICH', 'VEGETARIAN – Artichoke hearts, fresh sliced tomato, avocado slices, sliced bell pepper, cucumber, sprouts, green leaf or butter lettuce, and provolone cheese, mustard, mayo, and pesto sauce on the side; (click Customize to make a Bread Selection, or for additional changes)   \r\n\r\n', 'img_20123422164115.jpg', '6.89', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(48, 'BLT  with AVOCADO', 'Crispy Bacon strips, tomato, green leaf or butter lettuce, avocado slices, and hint of red onion; mayonnaise and Dijon mustard spread served on the side; (click Customize to make a Bread Selection, or for additional changes)  \r\n', 'img_20123422164014.jpg', '6.25', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(50, 'The GODFATHER', 'Thin-sliced prosciutto, Italian salami, fine-cut steak tomato, sliced provolone and fresh Mozzarella cheese, topped with chopped fresh basil, sliced pepperoncini, black olives, butter lettuce leaves, shredded Iceberg, mustard and mayo on the side (click Customize to make a Bread Selection, or for additional changes)   \r\n  ', 'img_20123422163919.jpg', '8.99', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(52, 'ROAST BEEF', 'House-made slow roasted beef, tomato, Swiss, provolone and shredded cheddar cheese, horseradish, butter or green leaf lettuce, pickles, mustard and mayo on the side; (click Customize to make a Bread Selection, or for additional changes). Recommended on Rustic Italian bread, or Ciabatta Roll \r\n\r\n', 'img_20123422163023.jpg', '6.89', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(54, 'TURKEY & SWISS', '\r\nSmoked Turkey breast, genuine Swiss cheese, fresh tomato, green leaf or butter lettuce, bell pepper and hint of red onion; Cilantro-pesto, mustard, and mayo on the side… Your choice of bread (click Customize to make a Bread Selection, or for additional changes)   \r\n \r\n', 'img_2012342216304.jpg', '6.25', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(55, 'TUNA SANDWICH', 'White Albacore tuna-salad, seasoned with mix of celery, green olives, mayo, white pepper, and slightly salted; Served with crackers, fresh bunch of baby spinach leafs, cherry tomatoes, and multigrain bread on the side; (click Customize to make a Bread Selection, or for additional changes)   \r\n\r\n', 'img_20123422161842.jpg', '6.89', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(58, 'APPLE JACK', 'Sliced Smoked Turkey breast, green apple veggies, provolone cheese, jalapeno-jack cheese, tomato, and green leaf or butter lettuce leafs; Honey mustard dressing, plus mustard and mayo, served on the side; your choice of bread (click Customize to make a Bread Selection, or for additional changes)  \r\n\r\n', 'img_20123422161536.jpg', '6.95', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(59, 'CHICKEN-SALAD SANDWICH', 'Tender Chicken breast pulled and mixed with mayonnaise, celery, apples, cranberries, and just hint of salt and pepper, green leaf or butter lettuce and tomato, on your choice of bread (click Customize to make a Bread Selection, or for additional changes)   \r\n\r\n', 'img_2012342216459.jpg', '6.89', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(60, 'Spring Rolls', 'Chicken or Shrimp, Avocado; cucumber, rice noodles, bean sprouts, lettuce, cilantro, wrapped in rice paper and served with hot-sauce, sesame-ginger soy sauce, and Thai-peanut sauce on the side\r\n\r\n', 'img_2012201223432.jpg', '6.49', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(61, 'CALIFORNIA CLUB', 'Sliced Smoked Turkey breast, fresh avocado, tomato, Swiss cheese, bacon bits or stripes, butter lettuce or green leaves, and hint of red onion; Ranch dressing spread, mustard and mayo served on the side; (click Customize to make a Bread Selection, or for additional changes\r\n   \r\n\r\n', 'img_201234221618.jpg', '6.95', '', 'Sandwiches');
INSERT INTO `lunchbox` VALUES(62, 'Santa Fe Wrap', '\r\nGrilled chicken, roasted corn, black beans, sliced pepper jack cheese, shredded mozzarella cheese, green leaf lettuce, cucumber, tomato; served with Southwestern sauce on the side, and your choice of tortilla flavor (recommended: on sundried tomato tortilla)\r\n\r\n', 'img_2012261123636.jpg', '6.95', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(81, 'FANCY TRAY ', 'Grilled chicken stripes, unsalted almonds, green apples, young cucumber, edamame, cherry tomatoes, baby brie cheese, grapes, strawberries and whole grain crackers; your choice of dipping sauce or dressing to be served on side(humus, ranch, honey mustard, olive pesto dip, Thai-peanut sauce), please use ''Customize'' option to add all choices\r\n\r\n', 'img_20122611215632.jpg', '8.49', 'special', 'Salads');
INSERT INTO `lunchbox` VALUES(84, 'MEDITERRANEAN KEBOB SALAD', 'Souvlaki-style seasoned and Grilled Chicken Skewer, or Steak Skewer, sliced fresh cucumber, tomatoes, olives, artichoke hearts, Italian parsley, Feta cheese, lemon juice, black pepper, and hint of olive oil, over Organic green mix; served with Pitta bread and humus on the side, plus your choose of dressing\r\n', 'img_2012332811938.jpg', '8.29', '', 'Salads');
INSERT INTO `lunchbox` VALUES(85, 'FRESH MEX WITH STEAK', 'Mexican style Seasoned steak strips; roasted corn, red and green onion, avocado, tomatoes, black beans, bell pepper, gelso cheese, topped with fresh avocado and jalapeno; served with pico de gallo, chips and salsa on the side; Recommended with southwestern dressing ', 'img_2012332804955.jpg', '9.79', '', 'Salads');
INSERT INTO `lunchbox` VALUES(86, 'HEALTHY MEX SALAD MEAL', 'Lightly seasoned and grilled Chicken breast, topped with black beans, roasted corn, roasted bell pepper, avocado, jicama, tomato, and cilantro; served with pico de gallo, corn chips and salsa on side; Recommended with honey-lime vinaigrette dressing', 'img_2012332804344.jpg', '8.79', '', 'Salads');
INSERT INTO `lunchbox` VALUES(88, 'SUPER-TACO SALAD MEAL', 'Option of taco-seasoned flank steak, ground beef, chicken cubes, or shrimps; roasted corn, black beans, cherry tomatoes, with both pepper jack, and grated mixed cheese, topped with sour cream, avocado and jalapenos; served with corn tortillas taco style, pico de gallo, chips and salsa; Recommended with southwestern dressing (Santa Fe)', 'img_201233281188.jpg', '7.89', '', 'Salads');
INSERT INTO `lunchbox` VALUES(89, 'AVOCADO SOUTHWEST SALAD ', 'Description: Slightly spicy south-western style seasoned and grilled Chicken breast, topped with avocado, bacon, cucumber, cherry tomatoes, served with multigrain bread roll and butter; recommended on a bed of romaine lettuce and Ranch dressing', 'img_2012332804912.jpg', '8.29', '', 'Salads');
INSERT INTO `lunchbox` VALUES(90, 'CHEF''S MEAL SALAD', 'Slices of Carved Turkey, bacon bits, thin sliced ham stripes, cucumber, tomato, Cheddar & Monterey cheese, hard boiled egg, black olives, parsley, over your choice of lettuce; served with multigrain roll and butter chip on the side; Recommended with Ranch dressing ', 'img_2012332804533.jpg', '7.99', '', 'Salads');
INSERT INTO `lunchbox` VALUES(92, 'CAESAR MEAL SALAD', 'Choice of Salmon fillet or Whole Chicken breast, on freshly cut crispy Romaine lettuce, croutons, and shaved parmesan cheese, served with Garlic bread and butter chips on the side; you can choose creamy or regular Caesar dressing from the dressing choices drop-down customization option', 'img_201233280458.jpg', '7.89', '', 'Salads');
INSERT INTO `lunchbox` VALUES(93, 'THAI GRILLED CHICKEN SALAD', 'Thai seasoned grilled Chicken; wild rice side, shredded carrots, red cabbage, bean sprouts, tomato, wonton strips, hint of chopped green onion, cilantro, fresh lime veggies, ''crashed'' peanuts and cashews; served with Sesame-ginger soy sauce and Thai style peanut-sauce on the side', 'img_2012332804043.jpg', '8.79', '', 'Salads');
INSERT INTO `lunchbox` VALUES(94, 'CHINESE CHICKEN SALAD', 'Shreaded Chicken breast, Fresh iceberg lettuce, Napa cabbage, mandarin orange hearts, water chestnuts, red cabbage, green peas, carrot, green onion, cilantro, rice noodle; served with wiled rice and Oriental sesame ginger dressing on the side', 'img_2012332803837.jpg', '8.79', '', 'Salads');
INSERT INTO `lunchbox` VALUES(95, 'CRANBERRY, PECAN & PEARS', 'Grilled Chicken breast, or Salmon Fillet; cucumber, cherry tomato, cranberries, caramelized pecans, feta cheese, pear, parsley, sprouts, and mozzarella cheese, over Organic baby spinach and spring mix; Recommended with Vanilla white vinaigrette dressing\r\n\r\n', 'img_2012332803759.jpg', '8.99', '', 'Salads');
INSERT INTO `lunchbox` VALUES(96, 'TUNA PASTA SALAD MEAL', 'TUNA PASTA SALAD MEAL\r\nDescription: Albacore tuna chunks over lightly seasoned penne pasta, with sweet peas, olives, diced Roma or cherry tomato, and parsley, served with organic baby spinach leafs, feta cheese, and crunchy multigrain crackers on the side; Recommended with raspberry-vinaigrette dressing', 'img_201233281919.jpg', '7.29', '', 'Salads');
INSERT INTO `lunchbox` VALUES(97, 'ORGANIC COBB SALAD MEAL', 'Lemon-crust seasoned and grilled whole Chicken breast, hard broiled eggs, cucumber, cherry tomatoes, avocado, and hint of red onions, topped with thin sliced Swiss cheese and crumbled bacon; originally served on a bedding of Organic baby spinach, or you can choose other lettuce options from the customization drop-down menu; Recommended with honey-mustard dressing \r\n', 'img_2012332811124.jpg', '8.79', '', 'Salads');
INSERT INTO `lunchbox` VALUES(98, 'CALIFORNIA COBB SALAD MEAL', 'Whole Grilled Chicken breast, fresh corn, tomato, hard broiled eggs, bacon bits, avocado, blue cheese, over your choice of lettuce mix, served with artisan ciabatta roll and butter chips on the side; Recommended with Balsamic or Raspberry vinaigrette dressing', 'img_2012332803433.jpg', '8.29', '', 'Salads');
INSERT INTO `lunchbox` VALUES(99, 'BLACKENED FISH or CHICKEN ', 'Blackened grilled Salmon fillet, Chicken breast, or Shrimps; toasted walnuts, sprouts, hint of green onion, dried cranberries, cherry tomatoes, feta cheese, red onion, over Organic spring mix lettuce; Recommended with vinaigrette dressing, and organic spring mix ', 'img_2012332803311.jpg', '8.29', '', 'Salads');
INSERT INTO `lunchbox` VALUES(100, 'ANTIOXIDANT SALAD MEAL', 'Your choice of grilled Salmon fillet, or Chicken Breast; freshly sliced strawberries, cranberries, blueberries, green apple, cucumbers, fresh mint leafs, hint of red onion, cherry tomato, and ricotta cheese, over Organic spring mix and baby-spinach; Recommended with vanilla-bean balsamic vinaigrette dressing', 'img_2012332803154.jpg', '8.99', '', 'Salads');
INSERT INTO `lunchbox` VALUES(101, 'Veggies with Ranch (18 oz)', 'Organic baby carrot, cucumber, celery, broccoli, (no egg) mozzarella and cheddar cheese cheese, and your choice of Ranch or Humus dip ', 'img_2012332810454.jpg', '5.49', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(102, 'Fruit Salad (18 oz)', 'Fresh seasonal fruit: strawberries, green apple, oranges, pineapple, grapes, and blueberries, honeydew, and melon, served with Caramelized fruit dipping sauce', 'img_20123328102718.jpg', '5.29', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(103, 'Caprese Small Salad', '(Vegetarian) Fine cut steak-tomatoes, creamy fresh mozzarella cheese, and basil leafs, over a bedding of Organic spring-mix lettuce; or choose from other lettuce choices trough customization options in drop down menu ', 'img_20123328102551.jpg', '4.99', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(104, 'Tuna-salad on Green Mix', 'Albacore tuna mixed with celery, mayo, green olives, and seasoned white pepper, plus cherry tomatoes,  and sliced cucumbers; Recommended dressing: Raspberry vinaigrette, plus your choice of spring mix or baby spinach lettuce', 'img_20123328102058.jpg', '5.99', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(105, 'Spinach & Strawberries ', 'Sliced fresh strawberries, mandarin orange hearts, avocado, pine nuts, and goat cheese, all on fresh spinach bedding; Recommended with Raspberry-vinaigrette, or balsamic vinaigrette dressing, or make your dressing choice by choosing from customization drop-down menu option', 'img_20123328102032.jpg', '5.29', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(106, 'Edamame & Tofu Salad', 'Tofu Cubes, iceberg lettuce, Napa cabbage, red cabbage, green peas, shredded carrot, chopped green onion, cilantro, rice noodle, may-fun crispy noodles; recommended with sesame-ginger dressing', 'img_20123328101528.jpg', '5.49', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(107, 'QUINOA Salad', '(Vegetarian) Cooked quinoa, celery, cherry tomato, carrots, cucumber, edamame beans, fresh herbs, toasted pine nuts or seeds, olive oil & lemon, recommended over baby spinach, or your choice of lettuce; Recommended dressing: Honey-mustard ', 'img_20123328101150.jpg', '5.99', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(108, 'Organic Green Salad', 'Butter lettuce leafs, red radish, sliced fresh cucumbers, cherry tomatoes, fresh avocado, shaved parmesan cheese, and hint of green onion, on Organic spring mix lettuce, slightly salted and tossed with drizzles of olive oil; Your choice of dressing ', 'img_20123328101132.jpg', '4.99', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(109, 'Candy Walnut & Apples', 'Toasted and sweetened candy walnuts, fresh apple slices, cherry tomatoes, blue cheese (served separately), and dried cranberries, over Organic mix greens; Recommended dressing: balsamic-vinaigrette', 'img_20123328101111.jpg', '5.29', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(110, 'Orange-Coated Almond Salad', 'Slices of sweet juicy orange, cherry tomato, sprouts, shaved parmesan cheese, and orange coated almonds, over a bedding of Organic spring mix; Recommended with White balsamic vinaigrette dressing', 'img_20123328101042.jpg', '4.99', '', 'SMALL SALADS & SIDES');
INSERT INTO `lunchbox` VALUES(111, 'Chicken Caesar Wrap', 'Grilled chicken, romaine lettuce, hint of red onion, parmesan cheese, bacon, crunched croutons; served with creamy Caesar dipping sauce on the side\r\n', 'img_2012201223117.jpg', '6.95', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(112, 'Thai Grilled-Chicken Wrap', 'Thai grilled chicken breasts, green leaf lettuce, tomato, cucumber, shredded carrot, bean sprouts, cilantro, served with Thai-peanut dipping sauce and sesame-ginger on the side\r\n', 'img_20122012231346.jpg', '7.25', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(114, 'Chicken-salad Wrapped', 'Our delicious chicken salad mix, green leafs, sprouts, and orange hearts, wrapped tortilla of your choice (whole wheat, spinach-herb, sundried-tomato, pesto-garlic, and other flavors available)\r\n', 'img_20122012231725.jpg', '6.95', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(115, 'Turkey-Avocado ', 'Sliced turkey breast, cucumber, avocado, tomato, green leaf lettuce, herbs & cream cheese spread, provolone cheese, wrapped in variety of tortilla flavors offered (by your choice), and served with cranberry ranch dipping sauce on the side\r\n', 'img_20122012231953.jpg', '7.25', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(116, 'Avocado Veggie Wrap', 'Avocado, green leaf lettuce, cucumber, tomato, sliced bell pepper, shredded carrots, alfalfa sprouts, cilantro, olive oil drizzled; recommended in spinach or sundried tomato wrap, your choice of Ranch, humus, or other sauces on the side\r\n', 'img_20122012232058.jpg', '6.95', '', 'Wraps');
INSERT INTO `lunchbox` VALUES(120, 'LEMON-GRASS CHICKEN SALAD', 'Grilled Chicken breast, or Grilled Salmon Filet (please use options below to make selection); Organic baby mix greens, Organic baby spinach, grilled pineapple, jicama, toasted coconut, cashews, Thai chili, Thai basil; always served with lemongrass lychee vinaigrette dressing;\r\n', 'img_201233280276.jpg', '8.49', 'special', 'Salads');
INSERT INTO `lunchbox` VALUES(122, 'Small Mediterranean Salad', 'Refreshing mix of garden vegetables, feta cheese, and herbs; served with olive oil and vinaigrette on the side; Add meat and enjoy it as a wonderful meal', 'img_2012332810306.jpg', '5.29', '', 'SMALL SALADS & SIDES');

-- --------------------------------------------------------

--
-- Table structure for table `lunchBoxCat`
--

CREATE TABLE `lunchBoxCat` (
  `idlunchBoxCat` int(30) NOT NULL auto_increment,
  `lunchBoxCatName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `lunchBoxCatDesc` text collate utf8_unicode_ci NOT NULL,
  `lunchBoxCatImg` varchar(200) collate utf8_unicode_ci NOT NULL,
  `lunchBoxCatType` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idlunchBoxCat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lunchBoxCat`
--

INSERT INTO `lunchBoxCat` VALUES(1, 'DESSERT', ' \r\n', 'img_20121325235917.jpg', 'Desserts');
INSERT INTO `lunchBoxCat` VALUES(2, 'HEALTHY SNACKS ', '', 'img_2012142602235.jpg', 'Desserts');
INSERT INTO `lunchBoxCat` VALUES(8, 'SMALL & SIDE ORDERS', '', 'img_2012142603435.jpg', 'Apetizers & Sides');
INSERT INTO `lunchBoxCat` VALUES(9, 'SOFT DRINKS', '', 'img_201214260159.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(3, 'BOTTLED WATER', '', 'img_20123227214052.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(4, 'VITAMIN WATER', '', 'img_2012132519150.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(5, 'MINERAL WATER', '', 'img_20121426184524.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(6, 'GATORADE', '', 'img_2012132519748.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(7, 'SODAS', '', 'img_2012142601554.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(10, 'WHOLE FRESH FRUIT ', '', 'img_2012142602712.jpg', 'Desserts');
INSERT INTO `lunchBoxCat` VALUES(11, 'CHIPS & SNACKS', '', 'img_2012152701118.jpg', 'Beverages & other');
INSERT INTO `lunchBoxCat` VALUES(12, 'ENERGY DRINKS', '', 'img_20121527172656.jpg', 'Beverages & other');

-- --------------------------------------------------------

--
-- Table structure for table `lunchBoxItem`
--

CREATE TABLE `lunchBoxItem` (
  `idlunchBoxItem` int(11) NOT NULL auto_increment,
  `lunchBoxItemName` varchar(120) collate utf8_unicode_ci NOT NULL,
  `lunchBoxItemDesc` text collate utf8_unicode_ci NOT NULL,
  `idlunchBoxCat` int(30) NOT NULL,
  `lunchBoxItemStatus` varchar(20) collate utf8_unicode_ci NOT NULL,
  `lunchBoxItemPrice` varchar(200) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idlunchBoxItem`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=131 ;

--
-- Dumping data for table `lunchBoxItem`
--

INSERT INTO `lunchBoxItem` VALUES(13, 'Perrier (11.15 fl oz)', '', 5, '', '2.29');
INSERT INTO `lunchBoxItem` VALUES(2, 'Kelloggs Nutrigrain Bar', '', 2, '', '1.50');
INSERT INTO `lunchBoxItem` VALUES(38, 'Quaker Oatmeal Chewy Bar', '', 2, '', '1.50');
INSERT INTO `lunchBoxItem` VALUES(6, 'Chocolate chip Cookies', '', 1, '', '1.25');
INSERT INTO `lunchBoxItem` VALUES(7, 'Oatmeal Cookie', '', 1, '', '1.25');
INSERT INTO `lunchBoxItem` VALUES(8, 'Carrot Cake', '', 1, '', '3.50');
INSERT INTO `lunchBoxItem` VALUES(9, 'Arrowhead (16.9 fl oz)', '', 3, '', '0.95');
INSERT INTO `lunchBoxItem` VALUES(10, 'Chrystal Gyezer (16.9 fl oz)', '', 3, '', '0.95');
INSERT INTO `lunchBoxItem` VALUES(11, 'Endurance - Regular (20oz)', '', 4, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(12, 'Endurance - Zero (20 oz)', '', 4, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(14, 'San Pellegrino (11.15 fl oz)', '', 5, '', '2.29');
INSERT INTO `lunchBoxItem` VALUES(15, 'Lemon-Lime (20oz)', '', 6, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(16, 'Orange (20oz)', '', 6, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(17, 'Fruit Punch (20oz)', '', 6, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(19, 'COKE (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(66, 'DIET Coke (12 oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(67, 'COKE - Zero (12oz)', '', 7, '', '1.10');
INSERT INTO `lunchBoxItem` VALUES(24, 'Lemon Bar', '', 1, '', '2.95');
INSERT INTO `lunchBoxItem` VALUES(25, 'Famous Brownie', '', 1, '', '2.49');
INSERT INTO `lunchBoxItem` VALUES(26, 'Cheese Cake w/fruit trimming ', '', 1, '', '3.89');
INSERT INTO `lunchBoxItem` VALUES(27, 'Apple - Fuji', '', 10, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(28, 'Apple - Granny Smith', '', 10, '', '1.19');
INSERT INTO `lunchBoxItem` VALUES(30, 'Banana ', '', 10, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(32, 'Naval Orange ', '', 10, '', '1.19');
INSERT INTO `lunchBoxItem` VALUES(33, 'Fresh Strawberries (8oz)', '', 10, '', '3.29');
INSERT INTO `lunchBoxItem` VALUES(34, 'Fresh Blueberries (4 oz)', '', 10, '', '2.89');
INSERT INTO `lunchBoxItem` VALUES(35, 'Pineapple only (8oz)', '', 10, '', '3.29');
INSERT INTO `lunchBoxItem` VALUES(36, 'Honeydew (8oz)', '', 10, '', '2.99');
INSERT INTO `lunchBoxItem` VALUES(37, 'Fiber Plus Antioxidant Bar', '', 2, '', '1.50');
INSERT INTO `lunchBoxItem` VALUES(39, 'Nature Valley Protein Bar', 'Peanut Butter Dark Chocolate', 2, '', '1.25');
INSERT INTO `lunchBoxItem` VALUES(40, 'Nature Valley Protein BarPeanut Butter Dark Chocolate', '', 2, '', '1.25');
INSERT INTO `lunchBoxItem` VALUES(41, 'Fiber One Flax Plus Pumpkin Granola Bar', '', 2, '', '1.25');
INSERT INTO `lunchBoxItem` VALUES(42, 'Cantaloupe (8oz)', '', 10, '', '2.99');
INSERT INTO `lunchBoxItem` VALUES(127, 'Grape Medley (12oz)', '', 10, '', '3.79');
INSERT INTO `lunchBoxItem` VALUES(44, 'O.J. - Freshly squeezed (12oz)', '', 9, '', '3.49');
INSERT INTO `lunchBoxItem` VALUES(45, 'Tropicana Orange Juice (10oz)', '', 9, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(47, 'Cranberry Juice (10oz)', '', 9, '', '1.99');
INSERT INTO `lunchBoxItem` VALUES(50, 'San Pellegrino - Lime (11.15 oz)', '', 5, '', '2.25');
INSERT INTO `lunchBoxItem` VALUES(51, 'Highland Springs (16.5 fl oz)', '', 5, '', '2.29');
INSERT INTO `lunchBoxItem` VALUES(52, 'Milk - Organic (Horizon)', '', 9, '', '2.00');
INSERT INTO `lunchBoxItem` VALUES(53, 'Chocolate Milk - Organic', '', 9, '', '2.25');
INSERT INTO `lunchBoxItem` VALUES(55, 'Aquafina (16.9 fl oz)', '', 3, '', '1.00');
INSERT INTO `lunchBoxItem` VALUES(56, 'Smart Water', '', 3, '', '1.49');
INSERT INTO `lunchBoxItem` VALUES(57, 'FIJI', '', 3, '', '1.49');
INSERT INTO `lunchBoxItem` VALUES(58, 'Strength - Regular (20oz)', '', 4, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(59, 'Strength - Zero (20oz)', '', 4, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(60, 'Essential - Regular (20oz)', '', 4, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(61, 'Essential - Zero (20oz)', '', 4, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(62, 'Focus - Regular (20oz)', '', 4, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(63, 'Focus - Zero (20oz)', '', 4, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(64, 'Balance - Regular (20oz)', '', 4, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(65, 'Balance - Zero (20oz)', '', 4, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(68, 'PEPSI (12 oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(69, 'DIET Pepsi (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(72, 'Dr. Pepper - Regular (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(73, 'Dr. Pepper - Diet (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(74, 'Dr. Pepper - Cherry (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(75, 'Sprite - Regular (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(76, 'Sprite - Diet (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(77, '7-UP - Regular (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(78, '7-UP - Diet (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(79, 'Mountain Dew (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(80, 'Mountain Dew - Diet (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(82, 'FANTA - Orange (12oz)', '', 7, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(84, 'Edamame (8oz)', '', 8, '', '2.95');
INSERT INTO `lunchBoxItem` VALUES(85, 'Rice - regular (8oz)', '', 8, '', '1.50');
INSERT INTO `lunchBoxItem` VALUES(86, 'Brown Rice (8oz)', '', 8, '', '1.95');
INSERT INTO `lunchBoxItem` VALUES(87, 'Orzo Pasta Salad (8oz)', '', 8, '', '2.99');
INSERT INTO `lunchBoxItem` VALUES(89, 'Caprese Pasta Salad (8oz)', '', 8, '', '2.50');
INSERT INTO `lunchBoxItem` VALUES(90, 'Rotini Pasta Salad (8oz)', '', 8, '', '2.89');
INSERT INTO `lunchBoxItem` VALUES(91, 'Tuna-Chipotle Pasta Salad (8oz)', '', 8, '', '2.99');
INSERT INTO `lunchBoxItem` VALUES(94, 'Beet Salad (8oz)', '', 8, '', '2.95');
INSERT INTO `lunchBoxItem` VALUES(95, 'Potato Salad (8oz)', '', 8, '', '2.95');
INSERT INTO `lunchBoxItem` VALUES(96, 'Coleslaw (6oz)', '', 8, '', '2.25');
INSERT INTO `lunchBoxItem` VALUES(97, 'Small Caesar Salad (16oz)', '', 8, '', '3.25');
INSERT INTO `lunchBoxItem` VALUES(98, 'Small Green Salad (16oz)', '', 8, '', '3.25');
INSERT INTO `lunchBoxItem` VALUES(99, 'Chips & Salsa (16 oz)', '', 8, '', '3.79');
INSERT INTO `lunchBoxItem` VALUES(100, 'LAYS Potato Chips - Original (1oz)', '', 11, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(101, 'LAYS Potato Chips - BBQ (1oz)', '', 11, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(102, 'KETTLE CLASSICS - Natural (1.75oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(103, 'KETTLE CLASSICS - Salt & Pepper (1.75oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(104, 'KETTLE CLASSICS - Salt & Vinegar (1.75oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(106, 'KETTLE CLASSICS - BBQ (1.75oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(107, 'SUN CHIPS - Original (1.5oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(108, 'SUN CHIPS - French onion (1.5oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(109, 'SUN CHIPS - Garden Salsa (1.5oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(110, 'SUN CHIPS - Cheddar (1.5oz)', '', 11, '', '1.29');
INSERT INTO `lunchBoxItem` VALUES(111, 'CHITOS - Crunchy (1.5 oz)', '', 11, '', '1.39');
INSERT INTO `lunchBoxItem` VALUES(112, 'CHITOS - Puffs (1.5oz)', '', 11, '', '1.49');
INSERT INTO `lunchBoxItem` VALUES(113, 'DORITOS - Ranch (1oz)', '', 11, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(114, 'DORITOS - Nacho Cheese (1oz)', '', 11, '', '0.99');
INSERT INTO `lunchBoxItem` VALUES(115, 'DORITOS - Collisions ', '', 11, '', '1.50');
INSERT INTO `lunchBoxItem` VALUES(116, 'RAW ALMONDS (3.5oz)', '', 11, '', '2.19');
INSERT INTO `lunchBoxItem` VALUES(118, 'PLANTERS PEANUTS - Salted (1oz)', '', 11, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(119, 'PLANTERS MIXED NUTS (1oz)', '', 11, '', '1.89');
INSERT INTO `lunchBoxItem` VALUES(120, 'SNICKERS Bar', '', 11, '', '1.69');
INSERT INTO `lunchBoxItem` VALUES(121, 'TWIX', '', 11, '', '1.79');
INSERT INTO `lunchBoxItem` VALUES(122, 'BOUNTY Coconut', '', 11, '', '1.49');
INSERT INTO `lunchBoxItem` VALUES(123, 'Red Bull - Sugar Free (8.4oz)', '', 12, '', '2.95');
INSERT INTO `lunchBoxItem` VALUES(124, 'Red Bull - Regular (8.4oz)', '', 12, '', '2.89');
INSERT INTO `lunchBoxItem` VALUES(125, 'Rock Star (16oz)', '', 12, '', '3.29');
INSERT INTO `lunchBoxItem` VALUES(126, 'Rock Star - Diet (16oz)', '', 12, '', '3.29');
INSERT INTO `lunchBoxItem` VALUES(128, 'Red Velvet Cheese Cake', '', 1, '', '3.89');
INSERT INTO `lunchBoxItem` VALUES(129, 'Monster - Reg. (16 oz)', '', 12, '', '2.29');
INSERT INTO `lunchBoxItem` VALUES(130, 'Monster - Sugar Free (16 oz)', '', 12, '', '2.29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(240) NOT NULL auto_increment,
  `order_type_id` int(1) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `customer_email` varchar(120) collate utf8_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `message` tinytext collate utf8_unicode_ci NOT NULL,
  `payed` tinyint(4) default NULL,
  `order_total` decimal(11,2) default NULL,
  `customer_phone` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` VALUES(49, 0, 5, 'Tomislav Palic', 'ptomassss@gmail.com', '09:20:00', '2012-03-25', '', 1, NULL, NULL);
INSERT INTO `orders` VALUES(50, 0, 7, 'Tomislav Palic', 'ptomassss@gmail.com', '12:30:00', '2012-03-28', '', 1, NULL, NULL);
INSERT INTO `orders` VALUES(51, 0, 5, 'Tomas Palic', 'ptomassss@aol.com', '09:20:00', '2012-03-28', '', 1, NULL, NULL);
INSERT INTO `orders` VALUES(52, 0, 5, 'Tomislav Palic', 'ptomassss@gmail.com', '09:20:00', '2012-03-28', '', 1, NULL, NULL);
INSERT INTO `orders` VALUES(53, 0, 30, 'mike fuller', 'ccolcontactinfo@gmail.com', '11:30:00', '2012-03-28', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_content`
--

CREATE TABLE `order_content` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `item_id` varchar(255) collate utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `item_price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `lunch_box_id` int(11) default NULL,
  `lunch_box_item_id` int(11) default NULL,
  `drop_down_item_id` int(11) default NULL,
  `parent_id` varchar(255) collate utf8_unicode_ci default NULL,
  `type` varchar(10) collate utf8_unicode_ci default NULL,
  `subtotal` decimal(11,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=747 ;

--
-- Dumping data for table `order_content`
--

INSERT INTO `order_content` VALUES(714, 49, 'lunch-box-menu-item-100-1', 'Organic Spinach Salad Meal', 8.79, 1, 100, 0, 0, '-1', 'meal', 16.21);
INSERT INTO `order_content` VALUES(715, 49, '50', 'Honey-Mustard', 0.00, 1, 0, 0, 50, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(716, 49, '142', 'Chicken Breast', 0.00, 1, 0, 0, 142, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(717, 49, '11', 'Chocolate Chip Cookie', 1.25, 1, 0, 0, 11, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(718, 49, '110', 'Fiji Apple - Organic', 1.39, 1, 0, 0, 110, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(719, 49, '126', 'Smart Water', 1.79, 1, 0, 0, 126, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(720, 49, '8', 'Kettle One -Sea Salt &#38; Pepper', 1.49, 1, 0, 0, 8, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(721, 49, 'custom-kitchen-messsage-100', 'Custom Kitchen Message:no onion', 1.50, 1, 0, 0, 0, 'lunch-box-menu-item-100-1', 'addon', 0.00);
INSERT INTO `order_content` VALUES(722, 50, 'lunch-box-menu-item-100-1', 'ANTIOXIDANT SALAD MEAL', 8.99, 1, 100, 0, 0, '-1', 'meal', 8.99);
INSERT INTO `order_content` VALUES(723, 50, 'lunch-box-menu-item-100-2', 'ANTIOXIDANT SALAD MEAL', 8.99, 1, 100, 0, 0, '-1', 'meal', 15.86);
INSERT INTO `order_content` VALUES(724, 50, '143', 'Salmon Fillet', 1.25, 1, 0, 0, 143, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(725, 50, '50', 'Honey-Mustard', 0.00, 1, 0, 0, 50, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(726, 50, '126', 'Smart Water', 1.79, 1, 0, 0, 126, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(727, 50, '11', 'Chocolate Chip Cookie', 1.25, 1, 0, 0, 11, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(728, 50, '7', 'Kettle One - Natural', 1.29, 1, 0, 0, 7, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(729, 50, '110', 'Apple - Fuji', 1.29, 1, 0, 0, 110, 'lunch-box-menu-item-100-2', 'addon', 0.00);
INSERT INTO `order_content` VALUES(730, 50, 'lunch-box-menu-item-96-3', 'ORGANIC SPINACH COBB SALAD', 8.79, 1, 96, 0, 0, '-1', 'meal', 13.67);
INSERT INTO `order_content` VALUES(731, 50, '50', 'Honey-Mustard', 0.00, 1, 0, 0, 50, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(732, 50, '43', 'Iceberg', 0.00, 1, 0, 0, 43, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(733, 50, '12', 'Coca cola - Regular', 1.15, 1, 0, 0, 12, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(734, 50, '8', 'Kettle One - Sea Salt &#38; Pepper', 1.29, 1, 0, 0, 8, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(735, 50, '11', 'Chocolate Chip Cookie', 1.25, 1, 0, 0, 11, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(736, 50, '109', 'Apple - Granny Smith', 1.19, 1, 0, 0, 109, 'lunch-box-menu-item-96-3', 'addon', 0.00);
INSERT INTO `order_content` VALUES(737, 51, 'lunch-box-menu-item-61-10', 'CALIFORNIA CLUB', 6.95, 1, 61, 0, 0, '-1', 'meal', 15.93);
INSERT INTO `order_content` VALUES(738, 51, '20', 'Croissant', 0.00, 1, 0, 0, 20, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(739, 51, '176', 'Orzo Pasta Salad 8 oz', 2.50, 1, 0, 0, 176, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(740, 51, '111', 'Pear - D&#39;anjou', 1.29, 1, 0, 0, 111, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(741, 51, '13', 'Coca cola - Diet', 1.15, 1, 0, 0, 13, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(742, 51, '59', 'Kettle One - Salt &#38; Vinegar', 1.29, 1, 0, 0, 59, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(743, 51, '18', 'Carrot Cake (slice)', 2.75, 1, 0, 0, 18, 'lunch-box-menu-item-61-10', 'addon', 0.00);
INSERT INTO `order_content` VALUES(744, 52, 'lunch-box-menu-item-99-1', 'BLACKENED FISH or CHICKEN', 8.29, 1, 99, 0, 0, '-1', 'meal', 8.29);
INSERT INTO `order_content` VALUES(745, 52, 'lunch-box-menu-item-100-2', 'ANTIOXIDANT SALAD MEAL', 8.99, 1, 100, 0, 0, '-1', 'meal', 8.99);
INSERT INTO `order_content` VALUES(746, 53, 'lunch-box-menu-item-58-1', 'APPLE JACK', 6.95, 1, 58, 0, 0, '-1', 'meal', 6.95);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `idPage` int(30) NOT NULL auto_increment,
  `permalinkPage` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `pageContent` text character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idPage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` VALUES(1, 'lunch-box-menu', '');
INSERT INTO `pages` VALUES(2, 'why-ccol', '<h2 style="text-transform: none; text-align: center; ">\r\n	<span style="font-size:22px;"><span style="color: rgb(255, 165, 0); ">PRACTICE HEALTHY DIET &amp; LIFE STYLE AT YOUR WORKPLACE&nbsp;</span></span></h2>\r\n<p style="text-transform: none; text-align: justify; ">\r\n	<span style="font-size: 14px; "><span style="color:#ffa500;"><span style="font-family:verdana,geneva,sans-serif;"><strong>CORPORATE CATERING ONLINE</strong></span></span><span style="font-family: verdana, geneva, sans-serif; "><span style="color:#ffa500;"> </span>is a unique, completely NEW business model, that had never been offered before.</span><font face="tahoma, geneva, sans-serif"><b>&nbsp;</b></font></span><span style="font-family:verdana,geneva,sans-serif;"><span style="font-size: 14px; ">We provide healthy alternative to all busy working men and women who struggle to practice appropriate diet, and enjoy freshly made, nutritionally rich, and quality daily meal at their busy work place. Or simpler, we offer healthy alternative to eating out every day. We are not middleman between you and the restaurants, so you don&#39;t need to pay for expensive delivery, or service fees. We offer</span></span><span style="font-family: verdana, geneva, sans-serif; font-size: 14px; ">&nbsp;FREE DELIVERY and NO MINIMUM ORDER is required.&nbsp;</span><span style="font-size: 14px; font-family: verdana, geneva, sans-serif; ">Our Menu is carefully crafted for those who would want and expect more nutrition, better value, and freshest ingredients, than what has been offered in fast-food restaurants, downstairs Cafes, and especially Vending machines, or unreliable vendor trucks and coolers. We offer tasty, delicious, vibrant, and freshly made meal selection that will help you perform better and go through your day right. Plus enjoy your favorite dish exactly the way you want it. Fully customize your order, and add variety of snacks, drinks, or even whole fresh fruit...&nbsp;</span></p>\r\n<div id="lipsum">\r\n	<p>\r\n		<span style="font-size:14px;"><span style="font-family:verdana,geneva,sans-serif;"><span style="color:#b22222;"><strong>OUR MISSION</strong></span> is to provide&nbsp;</span></span><span style="font-family: verdana, geneva, sans-serif; font-size: 14px; ">freshly made, nutritionally rich and healthy meals, with convenience of FREE DELIVERY</span><span style="font-family: verdana, geneva, sans-serif; font-size: 14px; ">&nbsp;to all busy people who struggle to practice healthy diet and healthy life style at their work place.</span></p>\r\n	<p>\r\n		<span style="color:#ffa500;"><font face="tahoma, geneva, sans-serif" style="font-size: 16px; "><strong><img alt="" src="http://corporatecateringonline.com/upload/img_201233280145.jpg" style="float: right; width: 315px; height: 409px; " />EAT HEALTHY &amp; FRESH -&nbsp;</strong></font><span style="font-size: 16px; "><font face="tahoma, geneva, sans-serif"><strong>even if you are busy or overwhelmed with work&nbsp;</strong></font></span></span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- WE PREPARE OUR MEALS FROM ORGANIC, ALL NATURAL, AND NEVER FROZEN INGREDIENTS</span></p>\r\n	<p>\r\n		<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; ">- OUR CAREFULLY SELECTED MENU LET YOU CHOOSE FROM VARIETY OF HEALTHY AND VIBRANT OPTIONS</span></p>\r\n	<p>\r\n		<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; ">- YOU CAN FULLY CUSTOMIZE YOUR ORDER </span></p>\r\n	<p>\r\n		<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; ">- ALL MEALS ARE PREPARED EXACTLY THE WAY YOU ORDERED, AND YOU ARE RECEIVING IT LABELED, WITH YOUR NAME ON IT</span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- WE ALSO OFFER GREAT AND HEALTHY BREAKFAST CHOICES, AND YOU CAN ENJOY THEM AT YOUR PREFERRED DELIVERY TIME</span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- BESIDE THAT, YOU WON&#39;T NEED TO WORRY ANYMORE WHERE, WHEN, AND HOW TO GET YOUR LUNCH EVERY DAY. SAVE YOURSELF FROM ALL THAT HASSLE. WE DELIVER FOR FREE AND ALWAYS ON TIME&nbsp;</span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- WE OFFER MORE THEN JUST BREAKFAST, SANDWICHES AND SALADS, WE ALSO CARRY SOME CONVENIENCE-STORE ITEMS, INCLUDING WHOLE FRESH FRUITS, GREAT SELECTION OF BEVERAGES, AND HEALTHY SNACKS</span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">-&nbsp;</span><span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">YOU WON&#39;T NEED TO RUSH OUT FOR LUNCH-BREAK ANY MORE...</span><span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">YOUR LUNCH IS NOW DELIVERED TO YOU&nbsp;<strong>FOR FREE</strong>&nbsp;AND&nbsp;WITH&nbsp;Corporate Catering OnLine</span><span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">&nbsp;YOU CAN PLAN YOUR DAY RIGHT AND</span><span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">&nbsp;<strong>ENJOY YOUR WELL DESERVED LUNCH BREAK</strong></span></p>\r\n	<p>\r\n		<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- SATISFACTION GUARANTEED OR YOUR MONEY BACK</span></p>\r\n	<p style="text-align: left; ">\r\n		<span style="color:#696969;"><span style="font-size:18px;"><span style="text-align: left; ">CORPORATE CATERING ONLINE IS THE BEST WAY TO PLAN YOUR DAY!</span></span></span></p>\r\n</div>\r\n<p>\r\n	<span style="color:#ffd700;"><font face="tahoma, geneva, sans-serif" style="font-size: 16px; ">&nbsp;</font></span><span style="color:#ffa500;"><strong style="font-size: 16px; font-family: arial, helvetica, sans-serif; ">SAVE TIME, SAVE $$$, ENJOY CONVENIENCE OF&nbsp;FREE DELIVERY&nbsp;</strong></span></p>\r\n<p>\r\n	<span style="font-size: 14px; "><span style="font-family: tahoma, geneva, sans-serif; "><img alt="" src="http://corporatecateringonline.com/upload/img_2012216123336.jpg" style="float: right; width: 315px; height: 210px; " />- OUR DELIVERY IS ABSOLUTELY FREE, NO HIDDEN FEES, NO GIMMICKS</span></span></p>\r\n<p>\r\n	<span style="font-size: 14px; "><span style="font-family: tahoma, geneva, sans-serif; ">- NO MINIMUM ORDER REQUIREMENTS</span></span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- MORE THEN AFFORDABLE PRICES, BEST VALUE FOR THE DOLLAR</span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- PLUS RECEIVE DISCOUNTS, COUPONS, AND SPECIALS</span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- ALL AT ONE PLACE, SINGLE AND INDIVIDUAL ORDERS DELIVERY, CATERING &amp; GROUP ORDERING, MANY OTHER PRODUCTS, LOOK NO FURTHER</span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- EACH ORDER IS MADE FRESH, EVERY MORNING, AND JUST THE WAY YOU WANT IT</span></p>\r\n<p>\r\n	<img alt="" src="http://www.corporatecateringonline.com/images/mission.png" style="width: 971px; height: 71px; " /></p>\r\n<p>\r\n	<span style="font-family: verdana, geneva, sans-serif; font-size: 14px; "><span style="color:#b22222;"><strong>OUR VISION</strong></span>&nbsp;is to set higher standards, and open new prospective in Food Delivery industry. We see future where people in need are not being taken advantage of by either being charged inadequate delivery fees, required to minimum order, or forced to eat unhealthy and often food from mistrustful mobile facilities...&nbsp;We see our effort as moving forward, toward better standards in both, food choice and delivery service. Or as we like to say: We will work hard to bring back dignity to the word CATERING, and to make everyone think twice before they use it to describe their services. We will work hard to set new, better standards, and to fulfill our mission.</span></p>\r\n<p>\r\n	<span style="color:#ffa500;"><font face="arial, helvetica, sans-serif" size="3"><b>STAY HEALTHY AND PRACTICE HEALTHY LIFE STYLE WITH CCOL&nbsp;</b></font></span></p>\r\n<p>\r\n	<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; "><img alt="" src="http://corporatecateringonline.com/upload/img_201221611381.jpg" style="float: right; width: 315px; height: 210px; " />- &quot;WE ARE WHAT WE EAT&quot; it has been said, THAT&#39;S WHY <strong>WE OFFER HEALTHIER OPTIONS AND BETTER FOOD QUALITY</strong></span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">-GOOD FOOD MEANS LESS FRUSTRATION AND BETTER THINKING AND DECISION MAKING PROCESS</span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- EVERYONE THINKS BETTER AND PERFORMS BETTER AT WORK IF NOT HUNGRY, WITH CCOL YOU WILL NEVER NEED TO WORRY ABOUT YOUR LUNCH OPTIONS</span></p>\r\n<p>\r\n	<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; ">- OUR RECIPES ARE MADE IN PERFECT NUTRITIONAL BALANCE AND MODERATE CALORIE VALUE, SO AFTER YOUR LUNCH BREAK YOU WILL NOT FEEL TIRED AND SLEEPY</span></p>\r\n<p>\r\n	<span style="font-family: tahoma, geneva, sans-serif; font-size: 14px; ">- WE OFFER LIGHT AND HEALTHY OPTIONS, AND ALL OUR FOOD ITEMS ARE MADE FROM ALL FRESH AND BEST QUALITY INGREDIENTS</span></p>\r\n<p>\r\n	<span style="font-size: 14px; font-family: tahoma, geneva, sans-serif; ">- WITH BETTER FOOD CHOICES YOU WILL FEEL BETTER, MORE ENERGIZED, AND READY TO COPE WITH MANY CHALLENGES AT WORK AND TASKS WITHIN YOUR EVERYDAY ROUTINE</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2 style="text-align: center; ">\r\n	<span style="color:#b22222;"><span style="font-size: 22px; ">THE BEST WAY TO PLAN YOUR DAY!</span></span></h2>\r\n');
INSERT INTO `pages` VALUES(3, 'faq', '<h2 style="text-align: center; ">\r\n	Frequently Asked Questions&nbsp;</h2>\r\n<p style="text-align: center; ">\r\n	<span style="font-family:verdana,geneva,sans-serif;"><span style="font-size:12px;">Here you can find most of the answers to your questions and about our service, and you can always call us at 949-945-7702, or send us an email to info@corporatecateringonline.com</span></span></p>\r\n<p style="text-align: center; ">\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		<a href="#q1">Why is this service different from other websites that also offer online ordering?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q2">How would I know if I qualify for free delivery?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q3">Is delivery really free?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q4">Is there a Minimum Orer required for delivery?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q5">Do I need to register and what are the benefits if I do?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q6">What is the difference between Meal-Salad and regular, small or side salad?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q7">Can I order food for some other days, or just for the next day delivery?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q8">I can&#39;t find where to I enter mu coupon?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q9">My coupon is not working, what should I do?</a></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<a href="#q10">How do I cancel my order if something happen and I need too?</a></li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q1">Why is this service different than other website that also offer online ordering?&nbsp;</a></h2>\r\n<p style="text-align: justify; ">\r\n	We are not the middleman between you and restaurants. We do not require minimum order, and our delivery is absolutely free. And most of all with other websites ordering process is way too complicated and time consuming. Our ordering process is quick, simple and self explainatory, and you get to see the food pictures. With other websites you will be asked to &quot;choose the restaurant&quot; and then you will be charged multiple times for delivery fees. Restaurants will charge you (most likely $4.99) their own delivery fee, and the website company will also charge you their delivery and the middleman service (usually about $7.99). On top of that, most of the restaurants have minimum order requirements, which usually vary between $20-$40, depends on the restaurant. This all makes those services way too expensive. Plus there are certain limitations that apply, and your order may be rejected by the restaurant. Their delivery time may vary... There are many other and various reasons why other online based food ordering services are highly inconvenient.</p>\r\n<p style="text-align: justify; ">\r\n	With Corporate Catering Online your delivery is absolutely FREE, and we don&#39;t have a Minimum order requirement policy. Plus you can fully customize your order, and send a direct message to our kitchen. Your meal is made for you, and exactly the way you prefer, not generically produced (read &quot;packed and shipped&quot;). Other than that, we have great selection of meals, so you won&#39;t need to worry about finding your favorite dish. Your order will be labeled and delivered with your name and custom notes on it. We guaranty accuracy in terms of delivery time and your order customization specifics with 100% satisfaction guaranty and money back policy.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q2">How would I know if I qualify for free delivery?</a></h2>\r\n<p style="text-align: justify; ">\r\n	All you need to do is to enter your location/company&#39;s name where prompted on the home page of this website. If you know about our service, you most likely are qualified for free delivery. All steps from there are pretty self explanatory as we tried to simplify customization and ordering process.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q3">Is delivery really free?</a></h2>\r\n<p style="text-align: justify; ">\r\n	Yes. Delivery is absolutely free for all lunch box orders made through our website. And we don&#39;t require minimum order, as well. You can order only one item, regardless of the price, and we will still deliver it for free. Our unique concept and business model is based on delivery time scheduling, so that way we can afford to deliver to you for FREE.&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q4">Is there a Minimum order required for delivery?</a></h2>\r\n<p style="text-align: justify; ">\r\n	NO Minimum Order is required. You can order only one item, regardless of the price, and we will still deliver it for free. Our unique concept and business model is based on delivery time scheduling, so that way we can afford to deliver to any order for FREE. Enjoy quiality and convenience, all at one place.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q5">Do I need to register and what are the benefits if I do?</a></h2>\r\n<p style="text-align: justify; ">\r\n	We recommend to all our customers to register. Benefits of creating an account are free foods, discounts, promotion, and many yearly contests that will qualify you for valuable rewards with any purchase. Our policy clearly states that your account information will not be sold, disclosed, or used for any other purposes than for the purpose of this website.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q6">What is the difference between Meal Salad and Regular, small or side Salad?</a></h2>\r\n<p style="text-align: justify; ">\r\n	Meal salads are still salads, but made as full meals. All meal-salads are made with full portion of meat (eg. whole Chicken breast, steak or salmon filet, etc.), and these types of salads include a small side, which will make it a meal, and it&#39;s usually slice or roll of bread with butter, or for example in some cases rice, or side (deli) salad. Meal &quot;in our book&quot; doesn&#39;t mean that you will receive soda and fries along with it... Regular salads from another hand are little less in size, with sliced or diced meat choice, and could be ordered as addition to a sandwich, wraps, or any other item from our Menu. Regular salads are also decent size meals, but with meal-salad your are getting better value for the dollar. The idea behind meal-salads is also to have full meal, in terms of nutrition and calorie values, and a salad that will keep you full, but while you&#39;re still eating something light. So far, we had great feedbacks and respond on it and it is highly recommended option. In addition to this, you can also check our Side orders, which are smaller size deli containers and salads, that are recommended as a side to your other orders.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q7">Can I order food for any other day, or just for next day delivery?</a></h2>\r\n<p style="text-align: justify; ">\r\n	Yes. On the checkout process you will be asked to choose if you would like your food to be delivered next day, or any other day of the week. In case that you wish your delivery for any other day, please go to the calendar and select desired delivery date. In case that for your delivery location we have two delivery times scheduled (breakfast and lunch) please make sure that you specified preferred delivery time, as well. You lunch will be there every day of the week, if you wish to, and exactly at the scheduled &nbsp;time.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q8">I can&#39;t find where to enter my coupon?</a></h2>\r\n<p style="text-align: justify; ">\r\n	Coupon submittal box is placed at the end of the CHECKOUT page . If you don&#39;t see it, you should first check if you are logged in, or registered. As stated in our Terms &amp; Polices of the website use &quot;only registered users will be able to receive and use promotions, coupons, and discounts&quot;. If you don&#39;t see a coupon box on the Checkout page, you may need to re-register, or create an account as an Individual User (check/choose Individual User, at the registration process). If this doesn&#39;t help please call us at 949-945-7702.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q9">My coupon is not working, what should I do?</a></h2>\r\n<p style="text-align: justify; ">\r\n	If your coupon is not working it&#39;s probably expired or already used before. If that is a fresh and valid coupon, but still not working, you will need to call our general number (949-945-7702) or to email us at info@corporatecateringonline.com with the subject line: Request for a coupon replacement in your email title. We will replace your coupon in 5-7 business day. Please also include non-working coupon code and date stamped on it, or date when you received or from us. Our high security web system may prevent some coupons to be used twice, or more times.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<a name="q10">How do I cancel my order, If something happened and I have to?</a></h2>\r\n<p style="text-align: justify; ">\r\n	No changes or cancelations could be made on line. So please make sure that you contact us over the phone at least 24 hours before your scheduled delivery date so we can cancel your order. In that case we will be able to cancel or give you credit for your next order. Please call 949-945-7702 and our representative will help you wit the process. Don&#39;t forget that our representatives are available MON - FRI from 9:00AM to 5:00PM. We will be more than happy to help you with cancelation. However, please note that there will be a cancelation fee of $2.00 (to cover bank fees, which are non refundable to us). No voice mail messages or emails will be eligible for cancelation refunds.</p>\r\n');
INSERT INTO `pages` VALUES(4, 'terms-and-policies', '<h2 style="text-align: center; ">\r\n	Terms and Policies</h2>\r\n<h2>\r\n	<span style="font-size:16px;"><span style="font-family:tahoma,geneva,sans-serif;"><strong>SINGLE LUNCH BOX ORDERS - <span style="font-size:14px;">Free Delivery, no minimum order required</span></strong></span></span></h2>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">To verify if you are qualified for FREE DELIVERY please go to the home-page of this website and enter the name of your company where prompted (and address if needed). If qualify, you will be able to proceed with order, register and create an account.&nbsp;We highly recommend to everyone to register, however you can use all website features and functions even if you are not registered user.&nbsp;Only registered users will be eligible to use coupons, and to receive additional promotions and discounts. Your information will not be disclosed, shared, sold or leased to anyone else, and it will be used only for the purpose of this website transactions. To protect your personal information from unauthorized access and use, we use security measures that comply with Federal laws.&nbsp;</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;"><strong style="font-family: verdana, geneva, sans-serif; ">Enjoy 100% money back guaranty and satisfaction policy.</strong>&nbsp;In certain cases purchase will not be refundable, so<strong style="font-family: verdana, geneva, sans-serif; "> please read&nbsp;General Terms and Conditions of Website Use Agreement thoroughly</strong>, and make sure that you fully understand all Terms &amp; Policies and requirements that apply for FREE DELIVERY including money back policy.&nbsp;</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">When using our website (&quot;Service&quot;), you may review food, beverage, and other products offered, and place an order for each one of them to be delivered to you. Upon completing your order online CCOL will review your order and acknowledge receipt with an e-mail message that will be sent to your submitted e-mail address. Please note that your order will be finalized and accepted after the completion of check out process, where you will be prompted to enter your personal and credit or debit card information, and to make a payment for items ordered. The execution of your order and the charge to your credit card will be verified with an e-mail sent to you, and that will be deemed as the confirmation and the acceptance of your order.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">All orders placed trough this website will be delivered to your place of work only (your company&#39;s address) and to a prearranged pick up location. This location is determined by your location&#39;s Office Manager, HR department, other individual who may be related to this matter, or majority of employees at your location that are using our service. If not previously informed, please contact some of them to learn about routine procedures and the pick up spot for your location.&nbsp;</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">Corporate Catering Online is not responsible for any event that occurs after our Delivery personnel left the building/delivery location and&nbsp;<u style="font-family: verdana, geneva, sans-serif; ">money back 100% satisfaction policy will not apply for such claims and events</u>. So please make sure that you choose right &quot;delivery notification option&quot; at the checkout, and we recommend that you are signed on to your company&#39;s internal email list, since this method will be used as a <u>general</u> delivery notification system, and to avoid any interruption and service disturbance. WE GUARANTY THAT ALL ORDERS WILL BE DELIVERED IN ACCURATE TIMELY MANNER, OR YOU AMY BE eligible FOR REFUND.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;">Prices are subject to change without notice.</span></p>\r\n<h2>\r\n	<span style="font-size:16px;"><span style="font-family:tahoma,geneva,sans-serif;"><strong>CATERING ORDERS <span style="font-size:14px;">(delivery charge applies)</span></strong></span></span></h2>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">To place <u>On-line Catering order</u> you would need to have a Corporate Account opened, or to be registered as a Corporate User (click and choose &#39;Corporate User&#39; on the registration form). </span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">PLEASE NOTE: that FREE DELIVERY service apply ONLY for Individual Users (not Catering). All&nbsp;Catering and Group orders placed on line are subjects to flat delivery rate charge of $25, plus local sales tax (exe. 7.75% for Orange County, California). However, included in that minimum charge, our friendly staff member will help you with set up and placement of food.&nbsp;This is not a gratuity charge, and gratuity and tips should be added only if you are satisfied with the overall food and service quality. Thank you for understanding.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">Orders could be also placed by phone or Fax.&nbsp;Please note that all&nbsp;<strong>non-online catering orders</strong>&nbsp;would need to be placed at least 2 (two) days a head (and prior to your event). For phone and Fax orders there is 15% delivery and service charge, plus local sales tax, that will be included in each&nbsp;<strong>non-online catering order</strong>&nbsp;invoice. This is not a gratuity charge. However, gratuity and tips should be added only if you are satisfied with the overall food and service quality.&nbsp;We will do our best to accommodate last minute requests, but please try to place all catering orders at least 48 hours prior to your event.&nbsp;</span></span></p>\r\n<p>\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;">Prices for Catering menu and services are subject to change without notice.</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#ffa500;"><strong style="font-family: tahoma, geneva, sans-serif; font-size: 16px; ">GENERAL TERMS &amp; CONDITIONS - WEBSITE USE AGREEMENT</strong></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Please read our General terms and conditions (&quot;Terms&quot;&nbsp;or&nbsp;&quot;Terms of Use&quot;) carefully, because they represent a binding agreement between you (&ldquo;Customer&rdquo;) and Corporate Catering Online (&ldquo;CCOL&rdquo;).</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">By accessing our website, and by using any of its services, you indicate that you understand and accept all Terms &amp; Conditions disclosed. If you do not agree with any or all of them please feel free to browse the website pages and content, but do not use any of our services. Also, you can always submit any questions that you may have regarding the Terms of Use to&nbsp;<a href="mailto:info@corporatecateringonline.com">info@corporatecateringonline.com</a>, or refer to our FAQ page and try to find answers to your possible inquiry.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family: verdana, geneva, sans-serif; ">All orders placed trough this website will be delivered to prearranged pick up location. This location is determined by Customer&#39;s Office Manager, HR department, other individual who may be related to this matter, or majority of employees at your business location who are using our services. If not previously informed, please contact some of them to learn about pick up spot for your location.&nbsp;</span><u style="font-family: verdana, geneva, sans-serif; ">NOTE</u><span style="font-family: verdana, geneva, sans-serif; ">: CCOL is not responsible for any event that occurs after our Delivery personnel leaves the building/delivery location and&nbsp;</span><u style="font-family: verdana, geneva, sans-serif; ">money back 100% satisfaction policy will not apply for such claims and events</u><span style="font-family: verdana, geneva, sans-serif; ">. So please make sure that you check &quot;delivery notification option&quot; at the checkout process, and that you are signed up to your company&#39;s internal email list, since this method will be used as a general delivery notification system, and to avoid any interruption and service disturbance. WE GUARANTY THAT ALL ORDERS WILL BE DELIVERED IN POPPER TIMELY MANNER, OR YOU CAN ASK FOR REFUND.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family: verdana, geneva, sans-serif; ">When using our website (&quot;Service&quot;), you may review food, beverage, and other products offered, and place an order for each one of them to be delivered to you. Upon completing your order online CCOL will review your order and acknowledge receipt with an e-mail message that will be sent to your submitted e-mail address. Please note that your order will be finalized and accepted after the completion of check out process, where you will be prompted to enter your personal and credit or debit card information, and to make a payment for items ordered. The execution of your order and the charge to your credit card will be verified with an e-mail sent to you, and that will be deemed as the confirmation and the acceptance of your order.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family: verdana, geneva, sans-serif; ">Prices are subject to change without notice.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Availability</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Our online ordering services are available only to the employees of the companies where we previously made a delivery arrangement, and may only be used by individuals who work in such companies. We also can only provide our services to adults that can be legally bound by contracts under the applicable law. Each user of the Website must be a holder of valid credit or debit card and need to provide us with a valid e-mail address for contact purposes.&nbsp;Corporate Catering Online services are available for all major credit and debit card types.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Registration and user account</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Certain services of our website are available to registered users only. If you wish to place an order, you will be asked to first verify your delivery location, and then to open a user account. The registration is completely free and it enables you to order food online and receive information about discounts, special offers, and&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; ">new services available.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">BY REGISTERING OR PLACING AN ORDER ONLINE YOU REPRESENT AND WARRANT THAT YOU ARE 18 YEARS OF AGE OR OLDER.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">When you register CCOL will ask you to provide certain contact and personal details, such as your full name, a valid e-mail address and a password and then provide additional details, such as credit or debit card details, and delivery and billing address (including address, city, state, country and zip/postal code). Bear in mind that false, incorrect, or out dated information may prevent you from registering and impair the ability to provide you with the services, or/and to contact you. CCOL will clearly indicate the fields for mandatory completion. If you do not enter the necessary data in these fields, you will not be able to register for our service.<br />\r\n	To login, you must use your personal code (such as: email address and password). You agree to maintain your access code in absolute confidentiality and refrain from disclosing it to others. Make sure that you change your password frequently and at least once every six months. If you forget your access code, CCOL will provide you with means to change it.<br />\r\n	You are fully accountable for any outcome that may result from your failure to provide complete details in the course of the registration process, from your failure to keep your account details in confidence, and for any use or misuse of your account on the Website as a result of conveying your details to someone else.<br />\r\n	You may terminate your account at any time, by sending a request for termination at <a href="mailto:info@corporatecateringonline.com">info@corporatecateringonline.com</a>. CCOL may require you to verify your termination notice by sending an additional termination request message, either by e-mail or through any other means, as a precondition for terminating your account. Your account will terminate 7 days following your notification, and from that date of termination you will no longer be able to use our service or access your account.<br />\r\n	Notwithstanding any remedies that may be available under any applicable law, CCOL may temporarily or permanently deny, limit, suspend, or terminate your user account, prohibit you from accessing, or/and take technical and legal steps to keep you off our website, and this will happen if CCOL believes that -</span></span></p>\r\n<ul>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you have abused your rights to use the website; or</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you have breached these Terms; or</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you deliberately submitted false information; or,</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you have performed any act or omission that violates any applicable law, rules, or regulations; or,</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you have performed any act or omission which is harmful or likely to be harmful to CCOL, or any other third party, including other users and suppliers of CCOL; or,</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you made use of our website to perform an illegal act, or for the purpose of enabling, facilitating, assisting or inducing the performance of such an act; or,</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">you conveyed your account access code to another person.</span></span></p>\r\n	</li>\r\n</ul>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Charges and Payments</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">The current prices of all of the items posted on our website are provided by CCOL, and all of them are subject to change without notice. CCOL also holds the right to change the delivery rates and availability of any item in our menu without prior notice. All prices are stated in U.S. Dollars. Any changes in any prices and rates will take effect immediately after being posted on our website.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">You represent and warrant that you will pay full price (and if needed taxes) in a timely manner and as confirmation of your online ordering. Failing to settle your payments may prevent you from receiving your order, and further using our website, notwithstanding any other remedies available to CCOL under the applicable law.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Privacy</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL fully respects your privacy. CCOL does not knowingly collect any personally identifiable information without your consent. To place an order, you will be asked to register and provide personal details such as your full name, a valid e-mail address and a password and then provide additional details such as complete credit or debit card details and billing address (including address, city, state, country and zip/postal code).<br />\r\n	Further personally identifiable information may be collected when CCOL exchanges communications with you through the contact page, for example, if you submit an inquiry to the customer support.<br />\r\n	Please note that e-mail communication may not be secured, and therefore you should not provide us with credit or debit card details in your e-mail messages sent to us.<br />\r\n	When you use our services CCOL may use various legal and technologically accepted measures to collect information about your habits and store such information in web server log files, to maintain and enhance the quality of online services offered only, and to customize your experience. For example, CCOL may record the frequency and scope of your use of the Services, the duration of your sessions, the web pages that you visit, the information that you read, food and dining preferences, advertisements that you view or click on, whether you have visited the Services before, the Internet Protocol (IP) address that you use to access the Services, the geographic location of the computer system that you are using to sign-in or use the services and the browser and operating system that you use, and all with purpose to get statistically presented picture of how to improve its own services.<br />\r\n	CCOL may collect and organize such information either by itself or by a third party services (e.g., Google Analytics) for CCOL&rsquo;s internal purposes, such as tracking on number of visitors, products viewed, categories viewed, general online sales, sales of specific products, etc.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>What CCOL do with your personal information?</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL does not disclose your personal information to any third party. But CCOL may use your personal information for the following purposes:</span></span></p>\r\n<ul>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to provide you with better services and to enable you to use them;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to improve and customize your experience with the existing services;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to develop and improve new services;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to better learn and understand what services and products customers prefer;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to provide you with support, assistance and updates;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to handle inquiries, complaints and to collect payments;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to send you updates and notices, to provide you with information relating to the services and to provide you with further marketing and advertising material, such as information about new services that may interest you, subject to your prior indication of consent;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to facilitate communication between you and CCOL;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to conduct surveys from time to time;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to enforce the Terms of Use of the Services Terms of Use ;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to contact you as and when CCOL believes it to be necessary;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to comply with any applicable law and assist law enforcement agencies as required;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to collect fees and debts, and to prevent fraud, misappropriation, infringements, identity thefts and any other misuse of our online ordering services;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">to take any action in any case of dispute, or legal proceeding of any kind between you and us, or between you and other users or third parties with respect to, or in relation with our website and services;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">For any other purpose stipulated in this policy, or in the Terms of Use.</span></span></p>\r\n	</li>\r\n</ul>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>When can possibly CCOL share information with others</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL does not sell, rent or lease your personally identifiable information to third parties for any of their marketing purposes. CCOL may share personally identifiable information with others in any of the following instances or <u>subject to your explicit consent:</u></span></span></p>\r\n<ul>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">If CCOL reasonably believes that you have breached the Terms of Use, or abused your rights to use our website services, or performed any act or omission that CCOL reasonably believes to be violating any applicable law, rules, or regulations. In these cases, CCOL may share your information with law enforcement and other competent authorities, and with any third party, as may be required to handle any result of your wrongdoing;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">If CCOL is required, or reasonably believes that is required by law to share or disclose your information;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">In any case of dispute, or legal proceeding of any kind between you and us, or between you and other users or third parties with respect to, or in relation with the Services;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">In any case where CCOL may reasonably believe that sharing information is necessary to prevent imminent physical harm or damage to property;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">If CCOL organizes the operation of the Services within a different framework, or through another legal structure or entity, or if CCOL is acquired by, or merged with another entity, provided however, that those entities agree to be bound by the provisions of this policy, with respective changes taken into consideration;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL may also share personally identifiable information with companies or organizations directly connected, or directly affiliated with CCOL, such as legal subsidiaries, sister-companies and parent companies, with the express provision that their use of such information <u>must comply with this policy</u>.</span></span></p>\r\n	</li>\r\n</ul>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Intellectual Property</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">The Intellectual Property rights of our website and online services, including copyrights, trademarks, trade names, patents, trade secrets, and work methods, and any other rights, are the sole property of CORPORATE CATERING ONLINE and GRAL, LLC, or of third parties by whom CCOL and GRAL, LLC were licensed according to law. These rights apply, among others, to any textual and non-textual information, including menus, images, graphic design, online services offered, data and its processing, our website&#39; computer code(s) and any other detail concerning its operation.<br />\r\n	You may not copy, duplicate, distribute, sell, market, and translate any information, including trademarks, images, pictures, texts and computer code from our website, without receiving CCOL&rsquo;s explicit prior consent in writing.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Trademarks appearing on our website (whether registered or not), the name of CORPORATE CATERING ONLINE, as well as the Website&#39;s Domain name &ndash; are the sole property of CCOL. You may not use them without CCOL&rsquo;s written consent.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">All the information in this section (Intellectual Property) including but not limited to: copyrights, trademarks, trade names, patents, trade secrets, and work methods (recipes, clients&rsquo; contact information, customers&rsquo; personal information, ways of communication and doing business in general on and of the website) are considered to be a Confidential Information, and the rest of our employees, patrons, owners and their families depends on this information, and is such confidential information is disclosed to any third party without the consent and knowledge of suitable CCOL&rsquo;s representative, CCOL holds the right to take legal action in order to recover all occurred and any possible damages.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong style="font-family: verdana, geneva, sans-serif; ">This Website is not directed to children under the age of 18&nbsp;</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">If you are a child under the age of 18 years old, you may browse the content of our website, but you may not place an order online or provide CCOL with any personally identifiable information.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Acceptable use of the Website</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Subject to these Terms you may access and use our website, create an account, and order food online.&nbsp;The following Terms define the acceptable use of the Website. While using the Website you agree to refrain from willfully, or carelessly:</span></span></p>\r\n<ul>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Interfering with or disrupting the functionality of the Website;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Violating any applicable local, state, national or international law, statute, ordinance, rule or regulation;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Impersonating any person or entity, or making any false statement about your identity, employment, agency or affiliation with any person or entity;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Providing false or misleading credit card details and/or false delivery address when placing an order online;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Displaying the Website or any part thereof in an exposed or concealed frame;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Linking to certain elements on the Website independently from the web pages on which they originally appear;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email, transmit or otherwise make available any information and materials that infringes third party&rsquo;s rights, including our Intellectual Property Rights;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email, transmit or otherwise make available software viruses, Trojan horses, warms and any other malicious application to computers and networks;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email, transmit or otherwise make available any information or material which may constitute or encourages conduct that would be constitute a criminal offense or civil wrong doing or otherwise violets any applicable law;</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Email, transmit or otherwise make available any information or material which may be deemed threatening, abusive, harassing, defamatory, libelous, vulgar, obscene or racially, ethnically or otherwise objectionable.</span></span></p>\r\n	</li>\r\n	<li>\r\n		<p style="text-align: justify; ">\r\n			<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Disobey or breach these Terms or any other applicable instructions conveyed by CCOL and its officers, patrons, representatives, and owners.</span></span></p>\r\n	</li>\r\n</ul>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Termination of operation</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL may at all times, in its sole discretion, terminate the operation of our website, or any part thereof, temporarily or permanently. CCOL may not give any notice prior to the termination of our website. At any time, certain content or a service may be blocked, removed or deleted without maintaining any backup copy. You agree and acknowledge that CCOL does not assume any responsibility with respect to, or in connection with the termination of our website&#39;s operations and loss of any data as a result.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Amendments to the Terms</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL may from time to time change the Terms, including any and all documents, forms and policies incorporated thereto. Substantial changes will take effect 30 days after an initial notification was posted on our website&#39;s homepage, or any other relevant web pages on our website. Other changes will take effect 7 days after their initial posting on our website, unless the Terms are amended to comply with legal requirements, where in such cases the amendments will become effective as required, or ordered, by law.<br />\r\n	You agree to be bound by any of the changes made in all Terms and Conditions of this website, including changes to any and all documents, forms and policies incorporated thereto. Continuing to use the Website will indicate your acceptance of the amended terms. If you do not agree with any of the amended terms, then you must avoid any further use of this website.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Changes and Availability</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL may from time to time change its website&rsquo;s structure, layout, design or display, as well as the scope and availability of the information and content therein, without giving any previous notice. Changes of this type by their very nature are likely to result in glitches or cause inconvenience of some kind. You shall not have any plea, claim or demand whatsoever against CCOL ensuing from the introduction of aforesaid changes or from glitches or any kind of failure resulting from their introduction. The CCOL&rsquo;s website as it is depends on different factors such as software, hardware and communication networks (internet, etc), and its contractors and suppliers. By their nature, these factors are not fault free or tolerant, hereafter CCOL can&#39;t guarantee that the website will not be disturbed, will be timely, secure or error free.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Disclaimer of Warranty</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">YOU ACKNOWLEDGE AND AGREE THAT THIS WEBSITE IS BEING PROVIDED FOR USE &quot;AS IS&quot;, AND THEREFORE YOU WILL NOT HAVE ANY PLEA, CLAIM OR DEMAND VIS-A-VIS CCOL IN RESPECT OF THE WEBSITE&#39;S PROPERTIES, ABILITIES, LIMITATIONS OR COMPATIBILITY WITH YOUR NEEDS. THE USE OF THE WEBSITE IS ACCORDINGLY BEING MADE AT YOUR SOLE AND WHOLE RISK, WITHOUT WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, NON-INFRINGEMENT, COMPATIBILITY, SECURITY OR ACCURACY.<br />\r\n	CCOL DOES NOT WARRANT THAT THE WEBSITE WILL OPERATE IN AN UNINTERRUPTED OR ERROR-FREE MANNER OR THAT THE WEBSITE IS ALWAYS FREE FROM ALL HARMFUL COMPONENTS. USE OF INFORMATION OR CONTENT OBTAINED FROM OR THROUGH OUR WEBSITE IS AT YOUR OWN RISK.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Governing Law, Jurisdiction</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">These Terms will be governed by and construed in accordance with the laws of the State of California.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Severability</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">If any provision of the Terms is held to be illegal, invalid, or unenforceable by a competent court, then the provision will be performed and enforced to the maximum extent permitted by law, and the remaining provisions of the Terms will continue to remain in full force and effect.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>General</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">The Terms and Conditions constitute the entire agreement between you and CCOL with respect to the use of our website and the services therein.<br />\r\n	No waiver, concession, extension, representation, alteration, addition, or derogation from the Terms by CCOL, or pursuant to the Terms, will be effective unless consented explicitly and executed in writing by CCOL&#39;s authorized representative.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">The Terms and Conditions will take precedence over all documents, forms and policies incorporated thereto, which may conflict with these Terms, unless specifically indicated in such documents that a certain provision is determined notwithstanding any of the provisions of these Terms.<br />\r\n	Failure on CCOL part to demand performance of any provision in the Terms will not constitute a waiver of any of CCOL&rsquo;s rights under the Terms.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Changes in Ownership</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">CCOL may incorporate the ownership or management of the Website as a separate corporation, or transfer ownership rights and title of our website, to a third party, provided that your rights according to these Terms are not harmed by the transfer of rights. In that case, a copy of the details and information related to you will be transferred to the corporation receiving the rights in the website and you hereby give your prior consent thereto.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>No Assignment</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Your rights and obligations under the Terms are not assignable. Any attempted or actual assignment thereof by you will be null and void without CCOL&rsquo;s prior explicit and written consent.</span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;"><strong>Survival</strong></span></span></p>\r\n<p style="text-align: justify; ">\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">The provisions of the intellectual property, disclaimer of warranty, limitation of liability and indemnification sections, will survive the termination, or expiration of the Terms.</span></span></p>\r\n<p>\r\n	<span style="font-size:12px;"><span style="font-family:verdana,geneva,sans-serif;">Last updated: [January, 2012]</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n');
INSERT INTO `pages` VALUES(5, 'contact-us', '<h2 style="text-align: center; ">\r\n	Contact us&nbsp;</h2>\r\n<h2 style="text-align: center; ">\r\n	Tel 949.945.7702 &nbsp; &nbsp; M-F 9:00AM-5:00PM</h2>\r\n<p>\r\n	<span style="font-family:tahoma,geneva,sans-serif;"><strong>If you are enjoying our cooking, and we are unable to deliver to you, contact us at any time to place a&nbsp;PICK -UP order. Thank you for&nbsp;using CCOL!</strong></span></p>\r\n');
INSERT INTO `pages` VALUES(6, 'request-a-quote', '<h2 style="text-align: center; ">\r\n	NEED HELP FOR YOU NEXT EVENT? REQUEST A QUOTE...</h2>\r\n<p style="text-align: center; ">\r\n	<strong style="font-family: tahoma, geneva, sans-serif; "><span style="font-size: 14px; ">To request a quote for your next event, please fill in and submit form below. We will email you back with few tips, and our proposal of what we think it would be the best way to do it. You will get our best offer instantly.</span></strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `idphotos` int(200) NOT NULL auto_increment,
  `photosImg` varchar(230) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idphotos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` VALUES(1, 'img_20121224174255.jpg');
INSERT INTO `photos` VALUES(12, 'img_201233280145.jpg');
INSERT INTO `photos` VALUES(3, 'img_20121527235349.jpg');
INSERT INTO `photos` VALUES(11, 'img_20122315141755.jpg');
INSERT INTO `photos` VALUES(6, 'img_201221611381.jpg');
INSERT INTO `photos` VALUES(7, 'img_2012216123323.jpg');
INSERT INTO `photos` VALUES(8, 'img_2012216123336.jpg');
INSERT INTO `photos` VALUES(9, 'img_2012216123349.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photosCcolCat`
--

CREATE TABLE `photosCcolCat` (
  `idphotosCcolCat` int(50) NOT NULL auto_increment,
  `photosCcolCatImg` varchar(100) collate utf8_unicode_ci NOT NULL,
  `idcateringfullCat` int(50) NOT NULL,
  PRIMARY KEY  (`idphotosCcolCat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `photosCcolCat`
--

INSERT INTO `photosCcolCat` VALUES(8, 'img_201221605232.jpg', 1);
INSERT INTO `photosCcolCat` VALUES(9, 'img_201221605246.jpg', 1);
INSERT INTO `photosCcolCat` VALUES(10, 'img_20122160530.jpg', 1);
INSERT INTO `photosCcolCat` VALUES(18, 'img_20122160590.jpg', 4);
INSERT INTO `photosCcolCat` VALUES(17, 'img_201221605840.jpg', 4);
INSERT INTO `photosCcolCat` VALUES(13, 'img_20122160559.jpg', 4);
INSERT INTO `photosCcolCat` VALUES(14, 'img_201221605656.jpg', 5);
INSERT INTO `photosCcolCat` VALUES(15, 'img_201221605710.jpg', 5);
INSERT INTO `photosCcolCat` VALUES(16, 'img_201221605720.jpg', 5);
INSERT INTO `photosCcolCat` VALUES(19, 'img_2012216114.jpg', 6);
INSERT INTO `photosCcolCat` VALUES(20, 'img_20122161124.jpg', 6);
INSERT INTO `photosCcolCat` VALUES(22, 'img_20122161358.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeId` int(100) NOT NULL auto_increment,
  `routeName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `driver` varchar(240) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`routeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` VALUES(1, 'A2', 'New');
INSERT INTO `route` VALUES(2, 'B', 'New');
INSERT INTO `route` VALUES(3, 'C', 'New');
INSERT INTO `route` VALUES(4, 'A', 'Jaimee');
INSERT INTO `route` VALUES(5, 'ABCD', 'Daniel Dulic');

-- --------------------------------------------------------

--
-- Table structure for table `routecomp`
--

CREATE TABLE `routecomp` (
  `routeCompId` int(200) NOT NULL auto_increment,
  `companyId` int(150) NOT NULL,
  `routeId` int(100) NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  PRIMARY KEY  (`routeCompId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `routecomp`
--

INSERT INTO `routecomp` VALUES(42, 5, 5, '09:00:00', '09:30:00');
INSERT INTO `routecomp` VALUES(43, 7, 5, '10:00:00', '10:30:00');
INSERT INTO `routecomp` VALUES(44, 1, 5, '11:00:00', '11:30:00');
INSERT INTO `routecomp` VALUES(45, 8, 4, '08:00:00', '08:15:00');
INSERT INTO `routecomp` VALUES(46, 33, 5, '12:00:00', '12:15:00');
INSERT INTO `routecomp` VALUES(47, 7, 5, '12:30:00', '12:45:00');
INSERT INTO `routecomp` VALUES(48, 7, 5, '00:00:13', '13:15:00');
INSERT INTO `routecomp` VALUES(49, 7, 5, '19:00:00', '19:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `idSlider` int(5) NOT NULL auto_increment,
  `filenameSlider` varchar(240) collate utf8_unicode_ci NOT NULL,
  `titleSlider` varchar(100) collate utf8_unicode_ci NOT NULL,
  `descSlider` text collate utf8_unicode_ci NOT NULL,
  `readMore` varchar(240) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idSlider`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` VALUES(2, 'img_201112011683.jpg', 'WHY CCOL (ABOUT US)', 'We are not middleman between you and the restaurants. Our delivery is absolutely FREE, and NO MINIMUM ORDER is required. We make fresh and delicious food in our 5,000 sq ft fully equipped kitchen facility, and with our professional staff we are ready to take on any task.  ', 'http://corporatecateringonline.com/index.php?page=why-ccol');
INSERT INTO `slider` VALUES(10, 'img_20122161592.jpg', 'CHECK OUT OUR FULL OFFER', 'You will be pleasantly surprised to see our full offer. Don''t miss out, check our Desserts and Beverages sections. Fully customize all your orders, add anything from whole fresh fruits to variety of healthy snacks. Enjoy our FREE DELIVERY and NO MINIMUM ORDER service. ', 'http://corporatecateringonline.com/index.php?page=lunch-box-menu');
INSERT INTO `slider` VALUES(11, 'img_20122162411.jpg', 'WE ALSO PROVIDE FULL CORPORATE CATERING SERVICE', 'From small meetings to large Corporate Events. Find it all at one place. Affordable prices, delicious food, and professional and accurate delivery service. Enjoy convenience of our easy to use on-line ordering system, and save yourself some time and money.', 'http://corporatecateringonline.com/index.php?page=catering-menu');
INSERT INTO `slider` VALUES(20, 'img_20122416184711.jpg', 'WE MAKE GREAT CORPORATE EVENTS EVEN BETTER...', 'Have a long meeting, or an event to host? No time for shopping around and to call different caterers... You can always try our easy to use online ordering system, or try requesting a quote and we''ll send you our best offer instantly. \r\n', 'http://corporatecateringonline.com/index.php?page=request-a-quote');

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `idSubcat` int(15) NOT NULL auto_increment,
  `catId` int(10) NOT NULL,
  `subcatName` varchar(40) collate utf8_unicode_ci NOT NULL,
  `subcatDetails` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idSubcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` VALUES(1, 4, 'Testname 12', 'Description of the subcategory. 312');
INSERT INTO `subcat` VALUES(2, 0, 'testt', 'tterer');
INSERT INTO `subcat` VALUES(3, 0, 'tetete', 'tetetetststs');
INSERT INTO `subcat` VALUES(5, 5, 'teteastete', 'tetetetetwtstsetest s thf');
INSERT INTO `subcat` VALUES(6, 0, 'tester2', 'tehhtekhtkjhjk tkjsegtkjesktlgshejkl');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(20) NOT NULL auto_increment,
  `username` varchar(15) collate utf8_unicode_ci NOT NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
  `email` varchar(40) collate utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `secondname` varchar(80) collate utf8_unicode_ci NOT NULL,
  `registerdate` varchar(40) collate utf8_unicode_ci NOT NULL,
  `note` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(6, 'testuser', '05f4c7f46069e5b874ff36f5f3810bde', 'test@user.com', 'Test', 'User', '12.12.2011. 11:35', '');
INSERT INTO `users` VALUES(7, 'gradimir', '8e1072c5c824dec075bb47291efe616c', 'grada@corporatecateringonline.com', 'Gradimir', 'Lukić', '19.01.2012. 22:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersFE`
--

CREATE TABLE `usersFE` (
  `idUser` int(200) NOT NULL auto_increment,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(40) collate utf8_unicode_ci NOT NULL,
  `fname` varchar(30) collate utf8_unicode_ci NOT NULL,
  `lname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `type` varchar(50) collate utf8_unicode_ci NOT NULL,
  `companyName` varchar(240) collate utf8_unicode_ci NOT NULL,
  `address` varchar(240) collate utf8_unicode_ci NOT NULL,
  `zipCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `companyId` int(40) NOT NULL,
  `telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `fax` varchar(30) collate utf8_unicode_ci NOT NULL,
  `newsletters` varchar(5) collate utf8_unicode_ci NOT NULL,
  `dateReg` varchar(20) collate utf8_unicode_ci NOT NULL,
  `ban` varchar(5) collate utf8_unicode_ci NOT NULL,
  `city` varchar(100) collate utf8_unicode_ci NOT NULL,
  `suite` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `usersFE`
--

INSERT INTO `usersFE` VALUES(8, 'grada@corporatecateringonline.com', '070a53565ccdd4ded54a63a5ffc127cd', 'gradimir', 'lukic', 'corporate', '', '', '', 5, '', '', '1', '01.03.2012. 10:53', '', '', '');
INSERT INTO `usersFE` VALUES(18, 'tom.palic.programming@gmail.com', '85a4dd9f5b542b2b1b1b34a7fab3cbde', 'Tomislav', 'Palic', 'individual', '', '', '', 5, '', '', '1', '16.03.2012. 14:57', '', '', '');
INSERT INTO `usersFE` VALUES(19, 'lizzybill@gmail.com', '202cb962ac59075b964b07152d234b70', 'yai', 'kim', 'corporate', 'Ricoh', '13224 Warner Avenue', '92345', 7, '', '', '1', '25.03.2012. 19:04', '', 'Tustin', '100');
INSERT INTO `usersFE` VALUES(20, 'g.trader@hotmail.com', '070a53565ccdd4ded54a63a5ffc127cd', 'Gradimir', 'Lukic', 'individual', '', '', '', 0, '', '', '1', '26.03.2012. 10:42', '', '', '');
INSERT INTO `usersFE` VALUES(21, 'ptomassss@gmail.com', '85a4dd9f5b542b2b1b1b34a7fab3cbde', 'Tomas', 'Palic', 'individual', 'Corporate Catering Online', '17821 Sky Park Circle', '92614', 5, '', '', '1', '27.03.2012. 03:38', '', 'Irvine', 'A');
