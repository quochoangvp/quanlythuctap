-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 06:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_team_quanlythuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigning_practice`
--

DROP TABLE IF EXISTS `assigning_practice`;
CREATE TABLE IF NOT EXISTS `assigning_practice` (
`ap_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job` text NOT NULL,
  `timesheets` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `assigning_practice`
--

TRUNCATE TABLE `assigning_practice`;
--
-- Dumping data for table `assigning_practice`
--

INSERT INTO `assigning_practice` (`ap_id`, `student_id`, `teacher_id`, `company_id`, `job`, `timesheets`, `created_at`, `ended_at`) VALUES
(2, 2, 2, 1, '', '', '2015-07-16 00:00:00', '2015-10-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
`classid` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `departmentid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `class`
--

TRUNCATE TABLE `class`;
--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `name`, `departmentid`) VALUES
(1, 'Cơ Khí 1 - K9', 1),
(2, 'Cơ Khí 1 - K6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `manager` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `userid` int(11) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `company`
--

TRUNCATE TABLE `company`;
--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `manager`, `address`, `userid`, `isactive`) VALUES
(1, 'FPT', '', 'Ninh Bình', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co_student`
--

DROP TABLE IF EXISTS `co_student`;
CREATE TABLE IF NOT EXISTS `co_student` (
`id` int(11) NOT NULL,
  `coid` int(11) NOT NULL,
  `mssv` int(11) NOT NULL,
  `kyhoc` int(11) NOT NULL,
  `point` varchar(93) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `co_student`
--

TRUNCATE TABLE `co_student`;
-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
`departmentid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `name`) VALUES
(1, 'Khoa Cơ Khí'),
(2, 'Khoa Du Lịch'),
(3, 'Khoa CNTT'),
(4, 'Khoa Kế Toán'),
(5, 'Khoa Ngoại Ngữ');

-- --------------------------------------------------------

--
-- Table structure for table `doc_introduce`
--

DROP TABLE IF EXISTS `doc_introduce`;
CREATE TABLE IF NOT EXISTS `doc_introduce` (
`id` int(11) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `presentee` varchar(50) NOT NULL,
  `mssv` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `limitdate` datetime NOT NULL,
  `confirmdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `doc_introduce`
--

TRUNCATE TABLE `doc_introduce`;
-- --------------------------------------------------------

--
-- Table structure for table `doc_studentcard`
--

DROP TABLE IF EXISTS `doc_studentcard`;
CREATE TABLE IF NOT EXISTS `doc_studentcard` (
`id` int(11) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mssv` int(11) NOT NULL,
  `birthday` datetime NOT NULL,
  `gender` varchar(5) NOT NULL,
  `household` varchar(100) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `classid` int(11) NOT NULL,
  `course` varchar(5) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `confirmdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `doc_studentcard`
--

TRUNCATE TABLE `doc_studentcard`;
-- --------------------------------------------------------

--
-- Table structure for table `doc_studentcertificate`
--

DROP TABLE IF EXISTS `doc_studentcertificate`;
CREATE TABLE IF NOT EXISTS `doc_studentcertificate` (
`id` int(11) NOT NULL,
  `confirm_person` varchar(50) NOT NULL,
  `mssv` int(11) NOT NULL,
  `birthday` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `classid` int(11) NOT NULL,
  `course` varchar(5) NOT NULL,
  `limitdate` datetime NOT NULL,
  `confirmate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `doc_studentcertificate`
--

TRUNCATE TABLE `doc_studentcertificate`;
-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
`form_id` int(11) NOT NULL,
  `form_title` varchar(255) NOT NULL,
  `form_body` text NOT NULL,
  `form_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `forms`
--

TRUNCATE TABLE `forms`;
--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `form_title`, `form_body`, `form_status`) VALUES
(2, 'Mẫu đơn sô 2', '<p><strong>Lời ch&agrave;o:</strong> K&iacute;nh gửi &ocirc;ng/b&agrave;&hellip;<br /><strong>Đoạn mở đầu:</strong>d&ugrave;ng 1-2 c&acirc;u để giới thiệu về bản th&acirc;n bạn v&agrave; vị tr&iacute; c&ocirc;ng việc m&agrave; bạn muốn ứng tuyển.<br /><strong>Đoạn giữa:</strong></p>\r\n<ul>\r\n<li>D&agrave;nh 3-4 c&acirc;u tr&igrave;nh b&agrave;y về kỹ năng v&agrave; kinh nghiệm thực sự đ&aacute;p ứng được y&ecirc;u cầu c&ocirc;ng việc.</li>\r\n<li>2-3 c&acirc;u tiếp theo thể hiện hiểu biết của bạn về c&ocirc;ng ty v&agrave; sự th&iacute;ch hợp của bạn với doanh nghiệp.</li>\r\n</ul>\r\n<p><strong>Đoạn cuối:</strong> khuyến kh&iacute;ch nh&agrave; tuyển dụng đọc hồ sơ của bạn. Kết th&uacute;c với một lời k&ecirc;u gọi h&agrave;nh động (v&iacute; dụ, như một cuộc phỏng vấn). Đừng qu&ecirc;n để lại số điện thoại v&agrave; email li&ecirc;n lạc.<br /><strong>Kết thư:</strong> D&ugrave;ng những cụm từ như &ldquo;Tr&acirc;n trọng&rdquo;, &ldquo;Ch&acirc;n th&agrave;nh&rdquo;&hellip; v&agrave; k&yacute; t&ecirc;n.</p>', 1),
(3, 'Mẫu đơn số 3', '<p>Nội dung mẫu đơn số 3</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` datetime NOT NULL,
  `address` text NOT NULL,
  `departmentid` int(11) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `lecturer`
--

TRUNCATE TABLE `lecturer`;
--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `userid`, `gender`, `birthday`, `address`, `departmentid`, `isactive`) VALUES
(1, 4, 1, '1989-12-12 00:12:00', 'Số 8, ngõ 198 Trần Cung, Cổ Nhuế, Từ Liêm, Hà Nội', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `practice_report`
--

DROP TABLE IF EXISTS `practice_report`;
CREATE TABLE IF NOT EXISTS `practice_report` (
`pr_id` int(11) NOT NULL,
  `pr_title` varchar(100) NOT NULL,
  `pr_attachment` varchar(60) NOT NULL,
  `teacher_cmt` text NOT NULL,
  `company_cmt` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `practice_report`
--

TRUNCATE TABLE `practice_report`;
--
-- Dumping data for table `practice_report`
--

INSERT INTO `practice_report` (`pr_id`, `pr_title`, `pr_attachment`, `teacher_cmt`, `company_cmt`, `user_id`) VALUES
(1, 'Báo cáo thực tập', 'fc51458e6458b4f7236bffe9f4f5b807.pdf', 'Tôi đã nhận xét về bài báo cáo này', 'Công ty tôi đã nhận xét về sinh viên này', 3),
(2, 'Báo cáo thực tập của sinh viên 2', 'c0efdd3f2136ebd463f9a0cd751c74ea.pdf', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `register_internship`
--

DROP TABLE IF EXISTS `register_internship`;
CREATE TABLE IF NOT EXISTS `register_internship` (
`reg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `reg_status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `register_internship`
--

TRUNCATE TABLE `register_internship`;
--
-- Dumping data for table `register_internship`
--

INSERT INTO `register_internship` (`reg_id`, `user_id`, `attachment`, `reg_status`, `created_at`, `updated_at`) VALUES
(1, 3, '4aa918f9e5264d43f11d2b6d94723a98.xls', 1, '2015-12-05 23:54:08', '2015-12-05 23:54:08'),
(2, 6, '6deabff6327dc7d32e7d756388f08636.docx', 0, '2015-12-05 23:55:55', '2015-12-05 23:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `required_forms`
--

DROP TABLE IF EXISTS `required_forms`;
CREATE TABLE IF NOT EXISTS `required_forms` (
`rqf_id` int(11) NOT NULL,
  `rqf_body` text NOT NULL,
  `rqf_status` tinyint(1) NOT NULL,
  `rqf_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `required_forms`
--

TRUNCATE TABLE `required_forms`;
--
-- Dumping data for table `required_forms`
--

INSERT INTO `required_forms` (`rqf_id`, `rqf_body`, `rqf_status`, `rqf_date`, `student_id`) VALUES
(1, '<p><strong>Lời ch&agrave;o:</strong> K&iacute;nh gửi &ocirc;ng/b&agrave;&hellip;<br /><strong>Đoạn mở đầu:</strong>d&ugrave;ng 1-2 c&acirc;u để giới thiệu về bản th&acirc;n bạn v&agrave; vị tr&iacute; c&ocirc;ng việc m&agrave; bạn muốn ứng tuyển.<br /><strong>Đoạn giữa:</strong></p>\r\n<ul>\r\n<li>D&agrave;nh 3-4 c&acirc;u tr&igrave;nh b&agrave;y về kỹ năng v&agrave; kinh nghiệm thực sự đ&aacute;p ứng được y&ecirc;u cầu c&ocirc;ng việc.</li>\r\n<li>2-3 c&acirc;u tiếp theo thể hiện hiểu biết của bạn về c&ocirc;ng ty v&agrave; sự th&iacute;ch hợp của bạn với doanh nghiệp.</li>\r\n</ul>\r\n<p><strong>Đoạn cuối:</strong> khuyến kh&iacute;ch nh&agrave; tuyển dụng đọc hồ sơ của bạn. Kết th&uacute;c với một lời k&ecirc;u gọi h&agrave;nh động (v&iacute; dụ, như một cuộc phỏng vấn). Đừng qu&ecirc;n để lại số điện thoại v&agrave; email li&ecirc;n lạc.<br /><strong>Kết thư:</strong> D&ugrave;ng những cụm từ như &ldquo;Tr&acirc;n trọng&rdquo;, &ldquo;Ch&acirc;n th&agrave;nh&rdquo;&hellip; v&agrave; k&yacute; t&ecirc;n.</p>', 1, '2015-12-16 00:16:00', 3),
(2, '<table width="709">\r\n<tbody>\r\n<tr>\r\n<td width="357">\r\n<p>TRƯỜNG ĐẠI HỌC B&Aacute;CH KHOA H&Agrave; NỘI</p>\r\n</td>\r\n<td width="352">\r\n<p><strong>CỘNG H&Ograve;A X&Atilde; HỘI CHỦ NGHĨA VIỆT NAM</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="357">\r\n<p><strong>VIỆN C&Ocirc;NG NGHỆ TH&Ocirc;NG TIN&nbsp; V&Agrave; TRUYỀN TH&Ocirc;NG</strong></p>\r\n<p>&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;</p>\r\n</td>\r\n<td width="352">\r\n<p><strong>Độc Lập &ndash; Tự do &ndash; Hạnh ph&uacute;c</strong></p>\r\n<p><strong>&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;&ndash;</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="357">\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n</td>\r\n<td width="352">\r\n<p><em>H&agrave; Nội, ng&agrave;y 11 th&aacute;ng 07 năm 2013</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p><strong>B&Aacute;O C&Aacute;O</strong></p>\r\n<p><strong>KẾT QUẢ THỰC TẬP TẠI ĐƠN VỊ NGO&Agrave;I TRƯỜNG</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>K&iacute;nh gửi</em>: Viện C&ocirc;ng nghệ th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng, Đại học B&aacute;ch khoa H&agrave; Nội</p>\r\n<p>&nbsp;</p>\r\n<p>Họ v&agrave; t&ecirc;n sinh vi&ecirc;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MSSV:</p>\r\n<p>Lớp, Kh&oacute;a:</p>\r\n<p>Điện thoại:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email</p>\r\n<p>Địa chỉ đến thực tập: <em>&lt;Ghi đầy đủ t&ecirc;n c&ocirc;ng ty&gt;</em></p>\r\n<p>Thời gian được cử đi thực tập: từ ng&agrave;y&hellip;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; đến ng&agrave;y&hellip;</p>\r\n<p>Gi&aacute;o vi&ecirc;n phụ tr&aacute;ch:</p>\r\n<ol>\r\n<li><strong>Nội dung c&ocirc;ng việc được giao:</strong></li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li><strong>Kết quả thực hiện:</strong></li>\r\n</ol>\r\n<ul>\r\n<li></li>\r\n<li><strong>Tự đ&aacute;nh gi&aacute; kết quả thực tập:</strong></li>\r\n<li><strong>Ưu điểm</strong></li>\r\n<li><strong>Nhược điểm</strong></li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td width="346">\r\n<p><em>&nbsp;</em></p>\r\n</td>\r\n<td width="304">\r\n<p><strong>SINH VI&Ecirc;N</strong></p>\r\n<p><em>(K&yacute; v&agrave; ghi r&otilde; họ t&ecirc;n)</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td width="336">\r\n<p><strong>X&Aacute;C NHẬN CỦA NƠI THỰC TẬP</strong></p>\r\n<p><em>(K&yacute;, ghi r&otilde; họ t&ecirc;n, đ&oacute;ng dấu)</em></p>\r\n</td>\r\n<td width="304">\r\n<p><strong>X&Aacute;C NHẬN CỦA VIỆN CNTT-TT</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>&nbsp;</strong></p>', 0, '0000-00-00 00:00:00', 3),
(3, '<p><strong>Lời ch&agrave;o:</strong> K&iacute;nh gửi &ocirc;ng/b&agrave;&hellip;<br /><strong>Đoạn mở đầu:</strong>d&ugrave;ng 1-2 c&acirc;u để giới thiệu về bản th&acirc;n bạn v&agrave; vị tr&iacute; c&ocirc;ng việc m&agrave; bạn muốn ứng tuyển.<br /><strong>Đoạn giữa:</strong></p>\r\n<ul>\r\n<li>D&agrave;nh 3-4 c&acirc;u tr&igrave;nh b&agrave;y về kỹ năng v&agrave; kinh nghiệm thực sự đ&aacute;p ứng được y&ecirc;u cầu c&ocirc;ng việc.</li>\r\n<li>2-3 c&acirc;u tiếp theo thể hiện hiểu biết của bạn về c&ocirc;ng ty v&agrave; sự th&iacute;ch hợp của bạn với doanh nghiệp.</li>\r\n</ul>\r\n<p><strong>Đoạn cuối:</strong> khuyến kh&iacute;ch nh&agrave; tuyển dụng đọc hồ sơ của bạn. Kết th&uacute;c với một lời k&ecirc;u gọi h&agrave;nh động (v&iacute; dụ, như một cuộc phỏng vấn). Đừng qu&ecirc;n để lại số điện thoại v&agrave; email li&ecirc;n lạc.<br /><strong>Kết thư:</strong> D&ugrave;ng những cụm từ như &ldquo;Tr&acirc;n trọng&rdquo;, &ldquo;Ch&acirc;n th&agrave;nh&rdquo;&hellip; v&agrave; k&yacute; t&ecirc;n.</p>', 0, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `mssv` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `classid` int(11) NOT NULL,
  `birthday` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `student`
--

TRUNCATE TABLE `student`;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `mssv`, `name`, `classid`, `birthday`, `email`, `phonenumber`, `account`, `user_id`) VALUES
(1, 70463592, 'Thái Thị Thủy', 1, '1990-11-25 00:00:00', 'thaithithuy@gmail.com', '0987654321', '70463592', 1),
(2, 70463596, 'Siêu Thài Tiên', 2, '0000-00-00 00:00:00', 'sieuthaitien@gmail.com', '0947654321', '70463592', 2),
(6, 22595242, 'Nguyên Phấn Đông', 2, '0000-00-00 00:00:00', 'nguyenphandong@gmail.com', '0987654345', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `training_result`
--

DROP TABLE IF EXISTS `training_result`;
CREATE TABLE IF NOT EXISTS `training_result` (
`id` int(11) NOT NULL,
  `mssv` int(11) NOT NULL,
  `diemquatrinh` int(11) NOT NULL,
  `diemhocky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `training_result`
--

TRUNCATE TABLE `training_result`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(99) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` datetime NOT NULL,
  `address` varchar(200) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `firstlogin` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `loginfailcount` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL COMMENT '1:Sinh viên; 2: Giảng viên phụ trách; 3: Công ty thực tập; 4: Giáo vụ; 5: Quản trị; 6: Bộ phận phụ trách',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `gender`, `birthday`, `address`, `departmentid`, `firstlogin`, `lastlogin`, `loginfailcount`, `type`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@admin.com', 1, '2015-11-30 00:00:00', 'Việt Nam', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5, 1),
(2, 'giangvienphutrach', '5096bc39d83244d0c329e2de3adba2ac', 'Giảng Viên Phụ Trách', 'giangvienphutrach@gmail.com', 0, '0000-00-00 00:00:00', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 2, 1),
(3, 'sinhvien', '615ad206666f8086103305b8f77173f4', 'Sinh Viên', 'sinhvien@gmail.com', 0, '0000-00-00 00:00:00', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1),
(4, 'congtythuctap', 'b896d3ea33634fe93adec2b05512b413', 'Công Ty Thực Tập', 'congtythuctap@gmail.com', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3, 1),
(5, 'giaovu', '9c5e8ed003d1ccebd3674e7040f844d6', 'Giáo Vụ', 'giaovu@gmail.com', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, 1),
(6, 'sinhvien2', 'e10adc3949ba59abbe56e057f20f883e', 'Sinh Viên 2', 'sinhvien2@gmail.com', 0, '0000-00-00 00:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1),
(7, 'bophanphutrach', 'ea830a2d69733eb4279c81cdba7567bf', 'Bộ phận phụ trách', 'bophanphutrach@gmail.com', 0, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigning_practice`
--
ALTER TABLE `assigning_practice`
 ADD PRIMARY KEY (`ap_id`), ADD UNIQUE KEY `student_id_2` (`student_id`), ADD KEY `student_id` (`student_id`,`teacher_id`,`company_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`classid`), ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `co_student`
--
ALTER TABLE `co_student`
 ADD PRIMARY KEY (`id`), ADD KEY `coid` (`coid`,`mssv`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `doc_introduce`
--
ALTER TABLE `doc_introduce`
 ADD PRIMARY KEY (`id`), ADD KEY `mssv` (`mssv`);

--
-- Indexes for table `doc_studentcard`
--
ALTER TABLE `doc_studentcard`
 ADD PRIMARY KEY (`id`), ADD KEY `receiver` (`receiver`,`mssv`,`classid`,`departmentid`);

--
-- Indexes for table `doc_studentcertificate`
--
ALTER TABLE `doc_studentcertificate`
 ADD PRIMARY KEY (`id`), ADD KEY `classid` (`classid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
 ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`,`departmentid`);

--
-- Indexes for table `practice_report`
--
ALTER TABLE `practice_report`
 ADD PRIMARY KEY (`pr_id`), ADD KEY `student_id` (`user_id`);

--
-- Indexes for table `register_internship`
--
ALTER TABLE `register_internship`
 ADD PRIMARY KEY (`reg_id`), ADD KEY `student_id` (`user_id`);

--
-- Indexes for table `required_forms`
--
ALTER TABLE `required_forms`
 ADD PRIMARY KEY (`rqf_id`), ADD KEY `user_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`), ADD KEY `mssv` (`mssv`,`classid`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `training_result`
--
ALTER TABLE `training_result`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `departmentid` (`departmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigning_practice`
--
ALTER TABLE `assigning_practice`
MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `co_student`
--
ALTER TABLE `co_student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doc_introduce`
--
ALTER TABLE `doc_introduce`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_studentcard`
--
ALTER TABLE `doc_studentcard`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_studentcertificate`
--
ALTER TABLE `doc_studentcertificate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `practice_report`
--
ALTER TABLE `practice_report`
MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register_internship`
--
ALTER TABLE `register_internship`
MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `required_forms`
--
ALTER TABLE `required_forms`
MODIFY `rqf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `training_result`
--
ALTER TABLE `training_result`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
