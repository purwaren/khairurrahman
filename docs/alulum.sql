-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 01:33 AM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alulum`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 1, NULL, NULL),
('unit', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`id`, `name`, `type`, `description`, `bizrule`, `data`) VALUES
(1, 'admin', 2, 'role untuk admin', '', ''),
(2, 'management', 2, 'role untuk management', '', ''),
(3, 'unit', 2, 'role untuk unit pendidikan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`) VALUES
(1, 'Berita', 'Segala informasi terkait perguruan al ulum, berita umum dll', '2016-03-18 07:34:14', NULL, 'admin', NULL),
(2, 'Pengumuman', 'Segala informasi terkait pengumuman baik akademis maupun non akademis', '2016-03-20 12:45:27', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `permalink` varchar(128) NOT NULL,
  `summary` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `banner` varchar(128) NOT NULL,
  `flag_published` int(1) NOT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `permalink`, `summary`, `content`, `banner`, `flag_published`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`, `cat_id`) VALUES
(1, 'Berita Satu', 'berita-satu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra.</p>', '<p class="featured-image"><img class="img-responsive" src="/themes/edu/assets/images/news/news-1.jpg" alt=""></p>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra. Donec a turpis non lorem pulvinar posuere.</p>\r\n        \r\n        <p>Nulla facilisi. Aenean interdum iaculis odio, et suscipit lorem euismod et. Sed nec orci suscipit, accumsan mauris nec, vestibulum felis. Nam eu felis sem. Fusce ut odio ipsum. Duis orci ipsum, feugiat ac dignissim in, convallis quis tortor. Mauris semper tortor nec justo adipiscing volutpat. Donec suscipit rhoncus est, vitae pretium purus laoreet et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed iaculis risus felis, sit amet porta urna volutpat vel. Integer vestibulum, neque a condimentum fermentum, est nunc tincidunt nunc, eget sagittis turpis elit nec arcu. Curabitur tempus mauris vitae dignissim vehicula. Fusce vehicula malesuada aliquam.</p>\r\n        \r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p>  \r\n        <ul class="custom-list-style">\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n        </ul>\r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p> \r\n        <p class="box">\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim. <a href="#">Integer fringilla a purus sit amet laoreet.</a>\r\n        </p>', '/themes/edu/assets/images/news/news-thumb-1.jpg', 1, '2016-02-28 13:38:10', NULL, 'admin', NULL, 1),
(2, 'Berita Dua', 'berita-dua', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra.</p>', '<p class="featured-image"><img class="img-responsive" src="/themes/edu/assets/images/news/news-1.jpg" alt=""></p>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra. Donec a turpis non lorem pulvinar posuere.</p>\r\n        \r\n        <p>Nulla facilisi. Aenean interdum iaculis odio, et suscipit lorem euismod et. Sed nec orci suscipit, accumsan mauris nec, vestibulum felis. Nam eu felis sem. Fusce ut odio ipsum. Duis orci ipsum, feugiat ac dignissim in, convallis quis tortor. Mauris semper tortor nec justo adipiscing volutpat. Donec suscipit rhoncus est, vitae pretium purus laoreet et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed iaculis risus felis, sit amet porta urna volutpat vel. Integer vestibulum, neque a condimentum fermentum, est nunc tincidunt nunc, eget sagittis turpis elit nec arcu. Curabitur tempus mauris vitae dignissim vehicula. Fusce vehicula malesuada aliquam.</p>\r\n        \r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p>  \r\n        <ul class="custom-list-style">\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n        </ul>\r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p> \r\n        <p class="box">\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim. <a href="#">Integer fringilla a purus sit amet laoreet.</a>\r\n        </p>', '/themes/edu/assets/images/news/news-thumb-2.jpg', 1, '2016-02-27 13:38:10', NULL, 'admin', NULL, 1),
(3, 'Berita Tiga', 'berita-tiga', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra.</p>', '<p class="featured-image"><img class="img-responsive" src="/themes/edu/assets/images/news/news-1.jpg" alt=""></p>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra. Donec a turpis non lorem pulvinar posuere.</p>\r\n        \r\n        <p>Nulla facilisi. Aenean interdum iaculis odio, et suscipit lorem euismod et. Sed nec orci suscipit, accumsan mauris nec, vestibulum felis. Nam eu felis sem. Fusce ut odio ipsum. Duis orci ipsum, feugiat ac dignissim in, convallis quis tortor. Mauris semper tortor nec justo adipiscing volutpat. Donec suscipit rhoncus est, vitae pretium purus laoreet et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed iaculis risus felis, sit amet porta urna volutpat vel. Integer vestibulum, neque a condimentum fermentum, est nunc tincidunt nunc, eget sagittis turpis elit nec arcu. Curabitur tempus mauris vitae dignissim vehicula. Fusce vehicula malesuada aliquam.</p>\r\n        \r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p>  \r\n        <ul class="custom-list-style">\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n        </ul>\r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p> \r\n        <p class="box">\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim. <a href="#">Integer fringilla a purus sit amet laoreet.</a>\r\n        </p>', '/themes/edu/assets/images/news/news-thumb-3.jpg', 1, '2016-02-26 13:38:10', NULL, 'admin', NULL, 1),
(4, 'Berita Empat', 'berita-empat', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra.</p>', '<p class="featured-image"><img class="img-responsive" src="/themes/edu/assets/images/news/news-1.jpg" alt=""></p>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum pellentesque urna. Phasellus adipiscing et massa et aliquam. Ut odio magna, interdum quis dolor non, tristique vestibulum nisi. Nam accumsan convallis venenatis. Nullam posuere risus odio, in interdum felis venenatis sagittis. Integer malesuada porta fermentum. Sed luctus nibh sed mi auctor imperdiet. Cras et sapien rhoncus, pulvinar dolor sed, tincidunt massa. Nullam fringilla mauris non risus ultricies viverra. Donec a turpis non lorem pulvinar posuere.</p>\r\n        \r\n        <p>Nulla facilisi. Aenean interdum iaculis odio, et suscipit lorem euismod et. Sed nec orci suscipit, accumsan mauris nec, vestibulum felis. Nam eu felis sem. Fusce ut odio ipsum. Duis orci ipsum, feugiat ac dignissim in, convallis quis tortor. Mauris semper tortor nec justo adipiscing volutpat. Donec suscipit rhoncus est, vitae pretium purus laoreet et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed iaculis risus felis, sit amet porta urna volutpat vel. Integer vestibulum, neque a condimentum fermentum, est nunc tincidunt nunc, eget sagittis turpis elit nec arcu. Curabitur tempus mauris vitae dignissim vehicula. Fusce vehicula malesuada aliquam.</p>\r\n        \r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p>  \r\n        <ul class="custom-list-style">\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet.</li>\r\n            <li><i class="fa fa-check"></i>Aliquam tincidunt mauris eu risus.</li>\r\n            <li><i class="fa fa-check"></i>Ultricies eget vel aliquam libero.</li>\r\n        </ul>\r\n        <p>Nullam consequat lectus eget fringilla ultricies. Suspendisse potenti. Morbi in malesuada nibh. Morbi vel tellus eu magna tempor mattis. Praesent ut turpis feugiat, dignissim ipsum et, pharetra orci. Nullam in congue felis. Donec commodo metus metus, at faucibus purus convallis ac. Nullam quis tortor urna. In commodo metus sed tempus venenatis. Integer euismod consectetur lobortis. Mauris blandit in massa in rhoncus. Aliquam sit amet sollicitudin nulla. Ut nec mauris facilisis, pretium enim et, tristique risus. Fusce a ligula in velit congue hendrerit eu eget tortor.</p> \r\n        <p class="box">\r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim. <a href="#">Integer fringilla a purus sit amet laoreet.</a>\r\n        </p>', '/themes/edu/assets/images/news/news-thumb-4.jpg', 1, '2016-02-25 13:38:10', NULL, 'admin', NULL, 1),
(5, 'Test Berita Lagi', 'test-berita-lagi', '<p>With closify you can easily create any kind of image convas (cover, profile, or custom banner) with whatever size you define, and intelligently enough the Closify plugin would resize the image according to the size of container you defined with a respect of the image aspect ratio, and then it start to generate a dynamic widget that give you the capability to position/reposition your photo adequately; save the photo with the desired position and submit the position information to the server side for storage; change the photo you have chosen and just delete the selected photo.<a href="https://github.com/aelbuni/closify" class="symple-button default blue symple-all" target="_blank" title="Visit Site" rel="nofollow"></a></p>', '<p>With closify you can easily create any kind of image convas (cover, profile, or custom banner) with whatever size you define, and intelligently enough the Closify plugin would resize the image according to the size of container you defined with a respect of the image aspect ratio, and then it start to generate a dynamic widget that give you the capability to position/reposition your photo adequately; save the photo with the desired position and submit the position information to the server side for storage; change the photo you have chosen and just delete the selected photo.<a href="https://github.com/aelbuni/closify" class="symple-button default blue symple-all" target="_blank" title="Visit Site" rel="nofollow"></a></p><p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.Supports cross-domain, chunked and resumable file uploads and client-side image resizing.Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p><p><br></p><p>This event is triggered only for ajax uploads and before upload of each thumbnail file. This event is triggered after <code>filepreajax</code> and within the ajax <code>beforeSend</code>event. Additional parameters available are:</p><ul><li><code>data</code>: This is a data object (associative array) that sends the following information, whose keys are:<ul><li><code>form</code>: the FormData object which is passed via XHR2 (or empty object if not available).</li><li><code>files</code>: the file stack array (or empty object if not available).</li><li><code>extra</code>: the <code>uploadExtraData</code> settings for the plugin (or empty object if not available).</li><li><code>response</code>: the data sent via ajax response (or empty object if not available).</li><li><code>reader</code>: the FileReader instance if available.</li><li><code>jqXHR</code>: the <code>jQuery XMLHttpRequest</code> object used for this transaction (if available).</li></ul></li><li><code>previewId</code>: the identifier of each file''s parent thumbnail div element in the preview window.</li><li><code>index</code>: the zero-based index of the file in the file stack.</li></ul>', 'http://localhost/alulum/portal/assets/images/20160319100855.jpg', 1, '2016-03-19 10:28:05', NULL, 'admin', NULL, 1),
(6, 'Judul artikel oleh unit', 'artikel-unit', '<p>Papua yang gubernur dan warganya sebagian besar beragama Kristen saja berani melarang peredaran miras. Seharusnya, daerah lain juga berani melakukan hal serupa</p>', '<p><b>Jakarta</b> - Pemerintah daerah Papua telah menerbitkan Perda yang berisi larangan produksi dan penjualan minuman beralkohol di wilayah Papua. Ketua Bidang Ekonomi PP Muhammadiyah, Anwar Abbas mengapresiasi keputusan Pemda Papua dan meminta agar pemerintah daerah lain menerapkan peraturan serupa.</p><p>"Muhammadiyah mendukung sikap Gubernur Papua Lukas Enembe yang melarang penjualan minuman beralkohol di Papua termasuk di hotel-hotel berbintang yang ada di wilayah bumi Papua. Ini jelas merupakan sebuah keputusan sangat baik dan tepat karena sang gubernur telah melihat dan memahami betul bagaimana buruknya dampak yang diakibatkan minuman keras," kata Anwar, Minggu (10/4/2016).</p><p>Anwar mengimbau, pemerintah daerah di provinsi lain juga melakukan hal yang sama dengan Papua. Dia menjelaskan, Papua yang Gubernur dan warganya sebagian besar beragama Kristen saja berani melarang peredaran miras. Seharusnya, daerah lain juga berani melakukan hal serupa.</p><p>"Kebijakan ini hendaknya juga ditiru dan diikuti oleh gubernur-gubernur dari daerah lain. Kalau selama ini ada pihak-pihak yang takut melakukan dan membuat peraturannya karena dianggap perdanya berbau syariah maka apa yang dilakukan oleh Gubernur Papua ini jelas-jelas tidak bisa dilabeli dengan Perda Syariah karena beliau adalah seorang Kristen yang baik dan penduduk yang akan dikenakan peraturan tersebut adalah juga kebanyakannya beragama Kristen." jelasnya.</p><p>"Jadi peraturan ini dibuat oleh sang gubernur adalah semata-mata atas pertimbangan bagaimana dia bisa berbuat sesuatu yang baik dan berarti bagi rakyatnya karena selama ini sang gubernur sudah melihat dan menyaksikan sendiri dampak buruk dari minuman beralkohol tersebut dan dia tidak mau rakyatnya mati dan atau rumah tangga rakyatnya berantakan gara-gara minuman keras tersebut," imbuh Anwar.</p><p>Minuman beralkohol menurut Anwar, tidak memiliki manfaat sedikitpun. Yang ada malah minuman beralkohol menimbulkan banyak permasalahan bahkan sampai pada tindakan kriminal.</p><p>"Untuk itu Muhammadiyah menghimbau para kepala daerah untuk melakukan hal serupa agar negeri ini benar-benar bebas dari minuman yang merusak dan berbahaya tersebut," tegasnya.</p><p>Pemerintah Provinsi Papua telah resmi memberlakukan Peraturan Daerah (Perda) Nomor 15 tahun 2013 tentang pelarangan produksi, pengedaran dan penjualan minuman beralkohol. Perda tersebut merupakan langkah protektif dari pemerintah untuk menyelamatkan dan melindungi penduduk Papua dari bahaya minuman beralkohol. <br><strong>(Hbb/Hbb)</strong></p>', 'http://ajdevel.local/alulum/assets/images/20160410004814.png', 0, '2016-04-10 00:51:46', NULL, 'purwa', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `permalink` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `flag_published` int(1) NOT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `permalink`, `content`, `flag_published`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`) VALUES
(1, 'Profil Perguruan Al-Ulum', 'profil-perguruan-al-ulum', '<p><img src="http://localhost/alulum/portal/assets/images/20160317201817.jpg" alt="" style="display: block; margin: auto;" rel="display: block; margin: auto;"></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis urna lectus, a euismod metus facilisis sed. Aliquam tristique sapien et tincidunt semper. Mauris ornare, turpis ac molestie molestie, erat nisi placerat ipsum, sit amet imperdiet ipsum lacus eu orci. Suspendisse euismod mollis nibh eu rhoncus. </p><ul class="custom-list-style">\r\n                                <li><i class="fa fa-check"></i>Lorem ipsum dolor sit ame</li>\r\n                                <li><i class="fa fa-check"></i>Curabitur elit elit</li>\r\n                                <li><i class="fa fa-check"></i>Nunc tincidunt ipsum a risus</li>\r\n                                <li><i class="fa fa-check"></i>Integer vitae nisi a odio</li>\r\n                                <li><i class="fa fa-check"></i>Suspendisse bibendum tempor</li>\r\n                            </ul><blockquote class="custom-quote">\r\n                                <i class="fa fa-quote-left"></i>Viverra magna pellentesque in magnis gravida sit augue felis vehicula vestibulum semper penatibus justo ornare semper Gravida felis platea arcu mus non. Montes at posuere. Natoque.<br>\r\n                                <span class="name">Adam Windsor</span><br><span class="title">Principle, College Green Online</span><br>\r\n                            </blockquote><p>\r\n                            Morbi semper. Hac euismod bibendum odio sed sociosqu primis magna suscipit facilisi litora viverra eget nibh praesent vehicula luctus Integer nostra ac duis metus orci.\r\n    \r\n    Vehicula praesent dolor quam montes fames risus interdum. Tortor lacinia sem aenean sit tellus montes velit ultricies leo eget felis mollis quam. Non odio leo tempus condimentum. Neque. Potenti ornare sapien diam hymenaeos conubia ac. Euismod, venenatis Vulputate sodales morbi aliquet sollicitudin.    \r\n                            </p>', 1, '2016-02-28 11:10:24', NULL, 'admin', NULL),
(2, 'Halaman Test', 'halaman-test', '<p>Ini ni lorem isum paragraph satu test satu dua tiga biar ada teks di atas image</p><p><img src="http://localhost/alulum/portal/assets/images/20160317194830.png" alt="Screenshoot Image" rel="display: block; margin: auto;" style="display: block; margin: auto;"></p><p>Ini adalah halaman untuk testing saja</p><p>Lorem ipsum dolor sit amet</p><blockquote>Ntah mengapa ini terjadi</blockquote>', 1, '2016-03-17 19:59:48', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrant`
--

CREATE TABLE IF NOT EXISTS `registrant` (
`id` int(11) NOT NULL,
  `reg_number` varchar(16) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `birth_place` varchar(64) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nationality` varchar(64) NOT NULL,
  `fathers_name` varchar(256) NOT NULL,
  `mothers_name` varchar(256) NOT NULL,
  `school_origin` varchar(256) NOT NULL,
  `graduated_year` int(11) NOT NULL,
  `ijazah_number` varchar(32) NOT NULL,
  `selected_edu_level` varchar(64) NOT NULL,
  `flag_dokumen` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `secret_key` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrant`
--

INSERT INTO `registrant` (`id`, `reg_number`, `firstname`, `lastname`, `nickname`, `gender`, `birth_place`, `birth_date`, `address`, `phone`, `email`, `nationality`, `fathers_name`, `mothers_name`, `school_origin`, `graduated_year`, `ijazah_number`, `selected_edu_level`, `flag_dokumen`, `status`, `secret_key`) VALUES
(1, '2016040411224196', 'Nafis', 'Pradana', 'Nafis', 'male', 'Kebumen', '2016-03-08', 'Sitiadi, Puring', '081905242062', 'purwanto@pusilkom.com', 'WNI', 'Purwanto', 'Liani', 'TK ABC', 2016, '12434999003', 'SD', 0, 0, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `registrant_document`
--

CREATE TABLE IF NOT EXISTS `registrant_document` (
`id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` int(11) NOT NULL,
  `path` varchar(128) NOT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrant_document`
--

INSERT INTO `registrant_document` (`id`, `reg_id`, `name`, `type`, `path`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`) VALUES
(14, 1, 'Scan Ijazah Terakhir', 1, '/alulum/assets/file//ajdevel/www/alulum/assets/file/c29cc5249fca7e91af06b52add758131_ijazah.png', '2016-04-09 17:15:22', NULL, 'Nafis', NULL),
(15, 1, 'Scan Akta Kelahiran', 2, '/alulum/assets/file//ajdevel/www/alulum/assets/file/c29cc5249fca7e91af06b52add758131_akte.png', '2016-04-09 17:15:22', NULL, 'Nafis', NULL),
(16, 1, 'Scan Akta Kelahiran', 3, '/alulum/assets/file//ajdevel/www/alulum/assets/file/c29cc5249fca7e91af06b52add758131_kk.png', '2016-04-09 17:15:22', NULL, 'Nafis', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `flag_delete` int(1) NOT NULL DEFAULT '0',
  `login_atemp` int(1) NOT NULL DEFAULT '0',
  `last_login_attempt` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `salt`, `status`, `flag_delete`, `login_atemp`, `last_login_attempt`, `last_login_time`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`) VALUES
(1, 'Administrator', 'admin', 'and.thau@gmail.com', '$2y$13$2Qd1NqjjIj5Eyt1iVzcdT.8DNBaeI4NlIhvgg5L8sk0wpENWcjtg2', '$2y$13$jv/n.WhUXe0OdfVlkIGnc2', 1, 0, 0, NULL, NULL, '2016-03-17 13:28:17', NULL, 'admin', NULL),
(2, 'Purwanto', 'purwa', 'purwanto@modefashiongroup.com', '$2y$13$E/8Q2W27QpEiEGBpZPW5HuoohCvsrKq.p.NtU8Pdr64RzyHDPM7/C', '$2y$13$rwqp1gCirA8u6cHtW/GlhT', 1, 0, 0, NULL, NULL, '2016-03-17 13:36:49', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `YiiSession`
--

CREATE TABLE IF NOT EXISTS `YiiSession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `YiiSession`
--

INSERT INTO `YiiSession` (`id`, `expire`, `data`) VALUES
('462vh9jofg0gn0vj5khnmuejh5', 1460251156, 0x35313330396332336365356561373431333963353237366433363634623439375f5f69647c733a313a2231223b35313330396332336365356561373431333963353237366433363634623439375f5f6e616d657c733a353a2261646d696e223b353133303963323363653565613734313339633532373664333636346234393766756c6c6e616d657c733a31333a2241646d696e6973747261746f72223b35313330396332336365356561373431333963353237366433363634623439375f5f7374617465737c613a313a7b733a383a2266756c6c6e616d65223b623a313b7d);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
 ADD UNIQUE KEY `UNIQUE_KEY` (`itemname`,`userid`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQUE_KEY` (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrant`
--
ALTER TABLE `registrant`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrant_document`
--
ALTER TABLE `registrant_document`
 ADD PRIMARY KEY (`id`), ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `YiiSession`
--
ALTER TABLE `YiiSession`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authitem`
--
ALTER TABLE `authitem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registrant`
--
ALTER TABLE `registrant`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `registrant_document`
--
ALTER TABLE `registrant_document`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
ADD CONSTRAINT `authassignment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `registrant_document`
--
ALTER TABLE `registrant_document`
ADD CONSTRAINT `registrant_document_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registrant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
