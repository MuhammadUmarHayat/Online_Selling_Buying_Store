
-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `userid` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`userid`, `password`, `status`, `doj`) VALUES
('admin', 'admin', 'ok', '2023-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `qty` int(12) NOT NULL,
  `unitprice` int(12) NOT NULL,
  `total` int(12) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` longblob NOT NULL,
  `description` varchar(255) NOT NULL,
  `authority` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(12) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(12) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--
-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(12) NOT NULL,
  `orderId` int(12) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `amount` int(12) NOT NULL,
  `receivedBy` varchar(150) NOT NULL,
  `Date` varchar(150) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `size` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` int(12) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `qty` int(12) NOT NULL,
  `manDate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `authority` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--
-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(12) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `title` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_of_sale` varchar(255) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `secrete_question` varchar(255) NOT NULL,
  `secrete_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=766;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
