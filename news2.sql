-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`) VALUES
(1, 'tejal kota', 'kotatejal12@gmail.com', 'tejal'),
(2, 'snehal', 'snehal.ket2002@gmail.com', '8080879871');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `des`) VALUES
(1, 'Business', 'business'),
(2, 'Stocks', 'stocks'),
(3, 'Economy', 'economy');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `comment`) VALUES
(1, 'user1', 'user1@gmail.com', 'this is user1'),
(2, 'user2', 'user2@gmail.com', 'good news website');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `category`, `thumbnail`, `admin`) VALUES
(1, 'Digital transformation high on manufacturing sector\'s agenda: PwC India survey  ', 'CXOs of organizations in the domestic market, including multinational companies (MNCs), were interviewed to gain insights into the digital transformation trends of the manufacturing sector, a PwC India survey said.\r\nDigital transformation is high on the agenda for the manufacturing sector and 54 per cent of the companies have implemented artificial intelligence and analytics for business functions, according to a PwC India survey. PwC India said it conducted the survey to understand the current digital landscape in the Indian manufacturing industry and assess the prospect of laying down the future roadmap.\r\n\r\nCXOs of organisations in the domestic market, including multinational companies (MNCs), were interviewed to gain insights into the digital transformation trends of the manufacturing sector.\r\n\r\n\r\n\r\n', '2023-06-20', 'Business', 'nimg1.jpg', 'kotatejal12@gmail.com'),
(2, 'India to Lead Impact Measurement Market in Asia-Pacific With Over $500 Million Revenue by 2030', 'As the ESG, Sustainability & Impact Measurement and Management (IMM) market evolved over the last two decades, India has now emerged as a significant IMM market in Asia-Pacific with $531 million in projected revenues by 2030. India’s revenue in 2020 was pegged at $137 million.\r\n\r\nThe findings are reported in The Size of ESG, Sustainability and Impact Measurement & Management Market study by Aspire Circle and Aspire Impact.', '2023-06-16', 'Business', 'nextbillion.png', 'kotatejal12@gmail.com'),
(3, 'Donor disclosure rules tightened for trusts  ', 'These entities will also have to furnish an undertaking to the effect that the activities undertaken by them were charitable, religious or religious-cum- charitable in nature. The CBDT has also tweaked the format of the undertaking to be given as per the latest rules that will come into effect from October 1.\r\nThese entities will also have to furnish an undertaking to the effect that the activities undertaken by them were charitable, religious or religious-cum- charitable in nature. The CBDT has also tweaked the format of the undertaking to be given as per the latest rules that will come into effect from October 1.\r\nThe government had recently revamped the registration framework for charitable organizations, for claiming tax exemption or obtaining 80G certificate under the Act.\r\n', '2023-06-26', 'Business', 'cbdt.jpg', 'kotatejal12@gmail.com'),
(4, 'India Stock Market Outlook', 'The month of June presented a blockbuster rally in the Indian stock market that led both the NIFTY 50 and BSE Sensex to climb to their all-time highs, not once but thrice. The NIFTY 50 traded near the 19,300 mark and Sensex surpassed 65,000 as the month ended on the back of strong inflows from foreign institutional investors (FIIs), robust corporate balance sheets, moderating inflation and growth picking up coupled with expectations of a normal monsoon season, all of which bolstered the sentiment of market participants. \r\nAjit Banerjee, the chief investment officer of Shriram Life Insurance, believes the Indian markets are at the starting point of a mid-to-long term bull market. \r\n\r\n“Our country’s strong growth potential, commendable financial results and political and macro-economic stability already make it a wonderful opportunity for FIIs to sustain their inflows. Hence, the outlook for July looks positive,” says Banerjee. \r\n\r\nNirvi Ashar, fundamental analyst at Religare Broking, thinks while easing inflation data and consistent inflow from FIIs will keep on boosting the market sentiment, corporate earnings outcome will keep stock-specific volatility high and concerns with regards to global growth may impact investors’ sentiments. \r\n\r\nPoonam Tandon, chief investment officer at IndiaFirst life Insurance, says the recent rally might see markets remaining range bound with a negative bias in the near-term.\r\n\r\nMarkets are likely to consolidate with profit-taking bias, as Q1FY24 earnings are being discounted, believes Dharmesh Kant, the head of equity research at Cholamandalam Securities.', '2023-06-27', 'Stocks', 'growth-stocks.jpg', 'kotatejal12@gmail.com'),
(5, 'Tech View: Nifty breaks above key resistance at 18,800', 'Nifty broke out above the 18,800 level and is close to surpassing the peak of 18,887 levels, accompanied by a long positive candle with minor upper shadow on the daily charts. The MACD showed a bullish crossover with a resistance level of 19,000 predicted to be on the horizon. Although the RSI and Nifty can keep the index strong, the moving averages are below the current index value, which reinforces a bullish outlook. Finally, the writers of call options at the 18,800 strike were seen closing their positions, signaling positive sentiment.\r\nMaking higher highs for the last 12 weeks, Nifty formed a bullish candle on the weekly frame. Now, it has to hold above 18,777 zones to witness an up move towards 18,888 and 19,000 zones, while on the downside support exists at 18,710 and 18,676 zones, said Chandan Taparia of Motilal Oswal.\r\n\r\n\r\n\r\n', '2023-06-16', 'Stocks', 'Nifty_1669509049999_1685353797332.jpg', 'snehal.ket2002@gmail.com'),
(6, 'S&P 500 leaps to highest close in 14 months', 'The S&P 500 and Nasdaq surged on Thursday to close at their highest in 14 months, as investors cheered economic data that fueled bets that the U.S. Federal Reserve is nearing the end of its aggressive interest-rate hike campaign.\r\nTreasury yields slid after a slew of economic data pointed to easing inflation, helping offset worries about future rate hikes and boosting Apple and Microsoft to record highs. \r\n\r\n', '2023-06-16', 'Stocks', 'stck.jpg', 'snehal.ket2002@gmail.com'),
(7, 'HSBC, Barclays carry out inaugural trades  ', 'Mumbai: HSBC and Barclays carried out their inaugural rupee non-deliverable derivatives contracts on Wednesday, a day after the Reserve Bank of India permitted such transactions.\r\nHSBC carried out its first rupee non-deliverable options trade with Reliance Industries, while executing non-deliverable forward transactions with other counterparties.\r\n\r\n“The first day of trading under the liberalised RBI guidelines permitting Indian resident corporates to transact in non-deliverable derivative contracts witnessed hectic activity. We expect this momentum to continue with a larger set of clients expected to access markets for such products in coming weeks,” said Vijay Santhanam, managing director, Barclays Bank India.\r\nThe step was taken in order to develop the onshore rupee non-deliverable derivatives contract market and to provide residents with the flexibility to efficiently plan their hedging activities, the RBI said.\r\n\r\n“We are delighted to execute the first non-deliverable derivative contracts (NDDCs) with a resident entity today. This transaction further reaffirms our capabilities and market expertise amidst the evolving environment,” said Anita Mishra, head of markets & securities services at HSBC India.', '2023-06-18', 'Business', 'hsbc.jpg', 'snehal.ket2002@gmail.com'),
(8, 'Trading Tools & Tech: Harnessing power of innovation for successful trading ', 'Advanced technologies have revolutionized the way traders operate in financial markets. Algorithmic trading, black-box trading, relies on computer programs to execute trades based on predefined rules and algorithms. Charting tools empower traders to visualize financial data, identify patterns, and create custom indicators and trading strategies. Advanced mobile trading apps and desktop trading software facilitate real-time data access, customized alerts, and educational resources. Overall, these innovations have made trading more accessible, efficient, and profitable, enabling traders to succeed in today’s dynamic and competitive markets. In the dynamic changing landscape of the stock market, traders are constantly seeking an edge to gain a competitive advantage.\r\nWith the advent of advanced technologies, a wide array of trading tools has emerged, revolutionizing the way traders operate.\r\nadvanced charting tools, robust trading software and real-time news platforms have revolutionized the way traders operate in financial markets.\r\nThese innovations have empowered traders to make more informed decisions and execute trades with greater precision.\r\n\r\n\r\n\r\n\r\n\r\n', '2023-07-18', 'Stocks', 'trading-tools-tech-harnessing-power-of-innovation.jpg', 'snehal.ket2002@gmail.com'),
(9, 'India-US strategic relationship: trade ties can push multilateralism', 'R V Anuradha, Partner, Clarus Law Associates recounted that the WTO system, although an imperfect bargain, remains unique given the enforceability of its rules. She noted that the world has come too far ahead in terms of economic interdependence, and there is somewhere a realization of the need for minimum cooperation between countries in order to maintain the global economic system.\r\nLeadership by India and the United States will be indispensable for the success of the multilateral trading system. \"We need to find ways for the two countries to collaborate and together demonstrate their shared commitment to trade multilateralism”, said Pradeep S. Mehta, Secretary General, CUTS International.\r\n\r\n\r\n', '2023-06-19', 'Economy', 'india-us-agencies.jpg', 'kotatejal12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
