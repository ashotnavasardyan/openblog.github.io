-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2018 at 09:39 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '\n            <h2>Something About Me and Blogging</h2>\n		 <div class=	\'about-section	\'>\n			 <div class=	\'about-grid	\'>\n				 <h3>WHY I STARTED THIS BLOG?</h3>\n				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \n				 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including\n				 versions of Lorem Ipsum.</p>\n				 <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages \n				 and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n			 </div>\n			 <div class=	\'about-grid2	\'>\n				 <h3>WHY YOU SHOULD READ THIS BLOG?</h3>\n				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including\n				 versions of Lorem Ipsum.</p>	\n				 <ul>\n					 <li><a href=	\'#	\'>Always free from repetition</a></li>\n					 <li><a href=	\'#	\'>Vestibulum rhoncus nibh quis dui fermentum iaculis.</a></li>\n					 <li><a href=	\'#	\'>The standard chunk of Lorem Ipsum</a></li>\n					 <li><a href=	\'#	\'>In consequat dolor in lorem egestas ultrices.</a></li>\n					 <li><a href=	\'#	\'>Ultrices rhoncus nibh quis dui.</a></li>\n				 </ul>	\n			 </div>\n			 <div class=	\'who-iam	\'>\n				 <h3>WHO THE IAM?</h3>\n				 <div class=	\'man-info	\'>\n					 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p>\n				     <h4>Some facts about me.</h4>  \n					 <li>Nullam at turpis a orci pretium pharetra.</li>\n					 <li>Curabitur tincidunt purus mollis facilisis placerat.</li>\n					 <li>Mauris a nulla ac est tincidunt interdum.</li>\n					 <li>Pellentesque vel enim nec urna imperdiet mollis.</li>\n					 <li>Integer interdum risus et scelerisque volutpat.</li>\n				 </div>\n				 <div class=	\'man-pic	\'>\n				 <img src=	\'/images/man.jpg	\' alt=	\'	\'/>\n				 </div>\n				 <div class=	\'clearfix	\'></div>\n			 </div>			 \n		  </div>');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `alias`, `title`, `text`, `images`, `desc`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Python', 'About Python', '<h1>&nbsp;<span class=\"marker\">Quick &amp; Easy to Learn</span></h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;Documentation for Python&#39;s standard library, along with tutorials and guides, are available online.</h3>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<pre>\r\n<code>&gt;&gt;&gt; def fib(n):\r\n&gt;&gt;&gt;     a, b = 0, 1\r\n&gt;&gt;&gt;     while a &lt; n:\r\n&gt;&gt;&gt;         print(a, end=&#39; &#39;)\r\n&gt;&gt;&gt;         a, b = b, a+b\r\n&gt;&gt;&gt;     print()\r\n&gt;&gt;&gt; fib(1000)</code></pre>\r\n</div>\r\n\r\n<p><small><code><em><a href=\"https://www.python.org/success-stories/industrial-light-magic-runs-python/\">ILM runs a batch processing environment capable of modeling, rendering and compositing tens of thousands of motion picture frames per day. Thousands of machines running Linux, IRIX, Compaq Tru64, OS X, Solaris, and Windows join together to provide a production pipeline used by ~800 users daily. Speed of development is key, and Python was a faster way to code (and re-code) the programs that control this production pipeline.</a>&nbsp;</em></code></small></p>', '1527341222.png', 'Why you must to learn python , it is very very easy', 1, 3, '2018-05-26 08:53:33', '2018-05-26 09:54:58'),
(2, 'Php', 'About Php', '<h1>&nbsp;Quick &amp; Easy to Learn</h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;Documentation for Python&#39;s standard library, along with tutorials and guides, are available online.</h3>\r\n\r\n<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\"><code>&gt;&gt;&gt; def fib(n):<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; a, b = 0, 1<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; while a &lt; n:<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; print(a, end=&#39; &#39;)<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a, b = b, a+b<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; print()<br />\r\n&gt;&gt;&gt; fib(1000)</code></div>\r\n\r\n<p><small><code><em><a href=\"https://www.python.org/success-stories/industrial-light-magic-runs-python/\">ILM runs a batch processing environment capable of modeling, rendering and compositing tens of thousands of motion picture frames per day. Thousands of machines running Linux, IRIX, Compaq Tru64, OS X, Solaris, and Windows join together to provide a production pipeline used by ~800 users daily. Speed of development is key, and Python was a faster way to code (and re-code) the programs that control this production pipeline.</a>&nbsp;</em></code></small></p>', '1527342883.jpg', 'Php is a server side language', 1, 2, '2018-05-26 09:54:43', '2018-05-26 09:54:43'),
(3, 'PHP2', 'About PHP 7.2', '<h1>This is a text about php&nbsp;</h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PHP</td>\r\n			<td>PHP</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;Documentation for Python&#39;s standard library, along with tutorials and guides, are available online.</h3>\r\n\r\n<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\"><code>&gt;&gt;&gt; def fib(n):<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; a, b = 0, 1<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; while a &lt; n:<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; print(a, end=&#39; &#39;)<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a, b = b, a+b<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; print()<br />\r\n&gt;&gt;&gt; fib(1000)</code></div>\r\n\r\n<p><small><code><em><a href=\"https://www.python.org/success-stories/industrial-light-magic-runs-python/\">ILM runs a batch processing environment capable of modeling, rendering and compositing tens of thousands of motion picture frames per day. Thousands of machines running Linux, IRIX, Compaq Tru64, OS X, Solaris, and Windows join together to provide a production pipeline used by ~800 users daily. Speed of development is key, and Python was a faster way to code (and re-code) the programs that control this production pipeline.</a>&nbsp;</em></code></small></p>', '1527342982.jpg', 'Php 7.2 is a latest version of php', 1, 2, '2018-05-26 09:56:22', '2018-05-26 09:56:22'),
(4, 'Pyhton 2', 'About Python 3', '<h1>Quick &amp; Easy to Learn</h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Python</td>\r\n			<td>Python</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;Documentation for Python&#39;s standard library, along with tutorials and guides, are available online.</h3>\r\n\r\n<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\"><code>&gt;&gt;&gt; def fib(n):<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; a, b = 0, 1<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; while a &lt; n:<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; print(a, end=&#39; &#39;)<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a, b = b, a+b<br />\r\n&gt;&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp; print()<br />\r\n&gt;&gt;&gt; fib(1000)</code></div>\r\n\r\n<p><small><code><em><a href=\"https://www.python.org/success-stories/industrial-light-magic-runs-python/\">ILM runs a batch processing environment capable of modeling, rendering and compositing tens of thousands of motion picture frames per day. Thousands of machines running Linux, IRIX, Compaq Tru64, OS X, Solaris, and Windows join together to provide a production pipeline used by ~800 users daily. Speed of development is key, and Python was a faster way to code (and re-code) the programs that control this production pipeline.</a>&nbsp;</em></code></small></p>', '1527343050.png', 'Python 3 is latest version of python language', 1, 3, '2018-05-26 09:57:30', '2018-05-26 09:57:30'),
(5, 'dwdwdw', 'dwdwdwdwdwdwd', '<p>wdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ew&nbsp;wdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewwdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewvwdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewwdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewwdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewwdwdwdfewfkwefkwefwefwe8f9ew8f9ew8f9ewv</p>', '1527408576.mp4', 'wdwdwdwdwdwdwdwdwdwd', 1, 2, '2018-05-27 04:09:37', '2018-05-27 04:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `alias`, `name`, `created_at`, `updated_at`) VALUES
(1, 'none', 'none', NULL, NULL),
(2, 'php', 'PHP', NULL, NULL),
(3, 'python', 'Python', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `title`, `parent_id`, `user_id`, `article_id`, `created_at`, `updated_at`) VALUES
(2, 'wdwdwdwdwdwd', 'wdwdwd', 0, 1, 1, '2018-05-27 03:16:27', '2018-05-27 03:16:27'),
(3, 'wdwdwdd', 'wdwd', 0, 1, 1, '2018-05-27 03:17:31', '2018-05-27 03:17:31'),
(4, 'wdwd', 'wdwd', 0, 1, 1, '2018-05-27 03:17:51', '2018-05-27 03:17:51'),
(5, 'efefef', 'efefefef', 0, 1, 1, '2018-05-27 03:18:39', '2018-05-27 03:18:39'),
(6, 'eeeee', 'eeeeee', 0, 1, 1, '2018-05-27 03:20:03', '2018-05-27 03:20:03'),
(7, 'im e674545', 'Hi ee', 0, 1, 2, '2018-05-27 03:57:25', '2018-05-27 03:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, NULL),
(2, 'Contact', 'contact', NULL, NULL),
(3, 'About', 'about', NULL, NULL),
(4, 'My Room', 'myroom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_10_180326_create_menu_table', 1),
(4, '2018_04_10_181537_create_comment_table', 1),
(5, '2018_04_10_182631_create_article_table', 1),
(6, '2018_04_10_183257_create_category_table', 1),
(7, '2018_04_10_200907_change_article_table', 1),
(8, '2018_04_10_201016_change_comments_table', 1),
(9, '2018_05_26_085438_create_right_bar_table', 1),
(10, '2018_05_26_090557_create_about_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_bar`
--

CREATE TABLE `right_bar` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `right_bar`
--

INSERT INTO `right_bar` (`id`, `title`, `path`, `created_at`, `updated_at`) VALUES
(1, 'My Posts', 'myroom/posts', NULL, NULL),
(2, 'My Comments', 'myroom/comments', NULL, NULL),
(3, 'My Subscribes', 'myroom/subscribes', NULL, NULL),
(4, 'Account Settings', 'myroom/settings', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashot Navasardyan', 'ashotn@list.ru', '$2y$10$cisse0JZD1hICjcxiRqdveIaUKIJYX5LPlmHa7I0WHKhErW1w/Nuu', '1527340829.jpg', 'X0ddrPwLumDqtrfm9wDE9c3RP27V390wMEMZvuHwNGDtTuVYKTcXPnIWEFVu', '2018-05-26 08:36:44', '2018-05-26 09:20:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_article_id_foreign` (`article_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `right_bar`
--
ALTER TABLE `right_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `right_bar`
--
ALTER TABLE `right_bar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
