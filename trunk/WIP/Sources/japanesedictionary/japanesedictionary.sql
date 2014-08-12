-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2014 at 01:09 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `japanesedictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer_content` varchar(200) NOT NULL,
  `answer_correct` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer_content`, `answer_correct`) VALUES
(1, 1, 'きれい', 1),
(2, 1, 'きれいだ', 0),
(3, 1, 'きれいで', 0),
(4, 1, 'きれいな', 0),
(5, 2, 'ことが  ', 0),
(6, 2, 'ことに', 0),
(7, 2, 'ような', 0),
(8, 2, 'ように ', 1),
(9, 3, 'おつかれに', 0),
(10, 3, 'おつかれ', 1),
(11, 3, 'おつき', 0),
(12, 3, 'おつきに', 0),
(13, 4, 'ほど', 0),
(14, 4, 'より', 0),
(15, 4, 'くらい', 1),
(16, 4, 'ほうが', 0),
(17, 5, 'つよい ', 1),
(18, 5, 'つよくて', 0),
(19, 5, 'つよそう', 0),
(20, 5, 'つよいそう  ', 0),
(21, 6, 'きのう', 0),
(22, 6, 'きょう', 0),
(23, 6, 'あした', 0),
(24, 6, 'あさって', 1),
(25, 7, 'にちようび', 1),
(26, 7, 'かようび', 0),
(27, 7, 'すいようび', 0),
(28, 7, 'もくようび', 0),
(29, 8, 'わたしのちちはわかいとき げんきではありませんでしたがいまはげんきです。', 0),
(30, 8, 'わたしのちちはわかいときげんきでしたが いまはげんきではありません。', 1),
(31, 8, 'わたしのちちはわかいときもいまもげんきではありません。', 0),
(32, 8, 'わたしのちちはわかいときもいまもげんきです。', 0),
(33, 9, 'そうです', 0),
(34, 9, 'そうします', 0),
(35, 9, 'しりません', 0),
(36, 9, 'どういたしまして', 1),
(37, 10, 'どこ', 1),
(38, 10, 'どちら', 0),
(39, 10, 'でれ', 0),
(40, 10, 'どんな', 0),
(41, 11, 'は', 0),
(42, 11, 'を', 0),
(43, 11, 'が', 0),
(44, 11, 'に', 1),
(45, 12, 'だけ', 1),
(46, 12, 'しか', 0),
(47, 12, 'まで', 0),
(48, 12, 'から', 0),
(49, 13, 'から', 0),
(50, 13, 'が', 1),
(51, 13, 'でも', 0),
(52, 13, 'ながら', 0),
(53, 14, 'まで', 0),
(54, 14, 'でも', 0),
(55, 14, 'もへ', 1),
(56, 14, 'へも', 0),
(57, 15, 'へ', 1),
(58, 15, 'の', 0),
(59, 15, 'が', 0),
(60, 15, 'で', 0),
(61, 16, 'にちようび', 1),
(62, 16, '出てきたしね。', 0),
(63, 16, 'お父さんは首がない', 0),
(64, 16, '太くなってきたしね', 0),
(65, 17, 'なってきたしね', 0),
(66, 17, '毎日プール', 0),
(67, 17, 'すみません。', 0),
(68, 17, '公園の方に歩いて行きましたよ。', 1),
(69, 18, '行きましたよ。', 1),
(70, 18, '首にスカーフ', 0),
(71, 18, 'いつも髪の毛', 0),
(72, 18, '今日は首にスカーフをしているんですけど。', 0),
(73, 19, '高田さんっていつ見てもかっこいいですね。', 0),
(74, 19, 'どの人かね。', 1),
(75, 19, '腰まであるんじゃないですか。', 0),
(76, 19, 'なかなか美人だね。', 0),
(77, 20, '暑くなってきた', 0),
(78, 20, '思いっきり短くしましょうか。', 0),
(79, 20, 'それはちょっと・・・。', 1),
(80, 20, 'それなら肩の線くらいに揃えておきましょうか。', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_email` varchar(100) NOT NULL,
  `contact_content` varchar(5000) NOT NULL,
  `contact_type` varchar(10) DEFAULT NULL,
  `contact_reply` varchar(5000) DEFAULT NULL,
  `contact_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_email`, `contact_content`, `contact_type`, `contact_reply`, `contact_status`) VALUES
(1, 'datptse02336@fpt.du.vn', 'Tại sao không đăng ký được tài khoản mới?', 'Q&A', NULL, 1),
(2, 'datptse02336@fpt.du.vn', 'Tại sao không dùng đăng ký bằng facebook hoặc google?', 'Q&A', NULL, 1),
(3, 'datptse02336@fpt.du.vn', 'Website nên có thêm học N1', 'Opinion', NULL, 1),
(4, 'datptse02336@fpt.du.vn', 'Website nên có thêm kiểm tra N1', 'Opinion', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` varchar(10) NOT NULL,
  `c_level` varchar(20) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  `c_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`c_id`, `c_level`, `c_title`, `c_image`) VALUES
('CM_01', 'Communication', 'Bài 1 : Chào hỏi cơ bản - 基本的な挨拶', 'communication1.png'),
('CM_02', 'Communication', 'Bài 2 : Tôi đến từ Việt Nam - ベトナムから来ました', 'communication2.png'),
('CM_03', 'Communication', 'Bài 3 : Quyển sách này là của ai vậy - この本はだれの本ですか', 'communication3.png'),
('CM_04', 'Communication', 'Bài 4 : Nơi nào thế? - どこですか？', 'communication4.png'),
('CM_05', 'Communication', 'Bài 5 : Giá bao nhiêu vậy? - いくらですか', 'communication5.png'),
('SC_01', 'SC', 'Hội thoại - Sơ cấp - Bài 1', ''),
('SC_02', 'SC', 'Hội thoại - Sơ cấp - Bài 2', ''),
('SC_03', 'SC', 'Hội thoại - Sơ cấp - Bài 3', ''),
('SC_04', 'SC', 'Hội thoại - Sơ cấp - Bài 4', ''),
('SC_05', 'SC', 'Hội thoại - Sơ cấp - Bài 5', ''),
('TC1_01', 'TC1', ' Hội thoại - Trung cấp 1 - Bài 1', ''),
('TC1_02', 'TC1', ' Hội thoại - Trung cấp 1 - Bài 2', ''),
('TC1_03', 'TC1', ' Hội thoại - Trung cấp 1 - Bài 3', ''),
('TC1_04', 'TC1', ' Hội thoại - Trung cấp 1 - Bài 4', ''),
('TC1_05', 'TC1', ' Hội thoại - Trung cấp 1 - Bài 5', ''),
('TC2_01', 'TC2', ' Hội thoại - Trung cấp 2 - Bài 1', ''),
('TC2_02', 'TC2', ' Hội thoại - Trung cấp 2 - Bài 2', ''),
('TC2_03', 'TC2', ' Hội thoại - Trung cấp 2 - Bài 3', ''),
('TC2_04', 'TC2', ' Hội thoại - Trung cấp 2 - Bài 4', ''),
('TC2_05', 'TC2', ' Hội thoại - Trung cấp 2 - Bài 5', '');

-- --------------------------------------------------------

--
-- Table structure for table `conversationcontent`
--

CREATE TABLE IF NOT EXISTS `conversationcontent` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(10) NOT NULL,
  `con_title` varchar(200) NOT NULL,
  `con_hiragana` varchar(5000) NOT NULL,
  `con_romaji` varchar(5000) NOT NULL,
  `con_meaning` varchar(5000) NOT NULL,
  `con_file` varchar(200) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `conversationcontent`
--

INSERT INTO `conversationcontent` (`con_id`, `c_id`, `con_title`, `con_hiragana`, `con_romaji`, `con_meaning`, `con_file`) VALUES
(1, 'SC_01', 'Hỏi đồ vật', 'A:　え～、どれ？これ？\r\n\r\nB: 　うん。それ。', 'A: E~, dore? kore?\r\n\r\nB: un. sore.', 'A:　Này, cái nào? Cái này à?\r\n\r\nB:　Ừ. Cái đó.', 'SCBAI1PHAN1'),
(2, 'SC_01', 'Xác nhận thông tin', 'A:　そう？\r\n\r\nB: 　そう。', 'A: Sou?\r\n\r\nB: Sou.', 'A:　Vậy à?\r\n\r\nB:　Đúng vậy.', 'SCBAI1PHAN2'),
(3, 'SC_01', 'Thể hiện sự đồng ý.', 'A:　おいしい？\r\n\r\nB:　うん。おいしいよ。', 'A: Oishii?\r\n\r\nB: un. oishiyo.', 'A:　Ngon không?\r\n\r\nB:　Ừ. Ngon lắm.', ''),
(4, 'SC_02', 'Giới thiệu về bản thân', 'A:　はじめまして。渡辺です。\r\n\r\nB:　田中です。どうぞよろしく。', 'A : Hajimemashite. Wantanabe desu.\r\n\r\nB: Tanaka desu. Douzo yoroshiku.', 'A:　Xin chào. Tôi là Watanabe.\r\n\r\nB:　Tôi là Tanaka. Xin nhờ anh giúp đỡ.', ''),
(5, 'SC_02', 'Hỏi họ là ai?', 'A:　鈴木さんですか？\r\n\r\nB: 　はい、そうです。', 'A: Suzukisan desuka?\r\n\r\nB: Hai,so desu.', 'A:　Anh Suzuki phải không?\r\n\r\nB:　Phải, đúng vậy.', ''),
(6, 'SC_02', 'Hỏi cái này là gì?', 'A:　それはなんですか？\r\n\r\nB:　デジカメです。', 'A: Sore wa nan desuka?\r\n\r\nB: Dejikamedesu.', 'A:　Cái đó là gì vậy?\r\n\r\nB:　Là máy ảnh kỹ thuật số.', ''),
(7, 'TC1_01', 'Đề nghị làm gì.', 'A：雨降ってきそうだよ。傘持ってったら？\r\n\r\nB：いいよ、めんどくさいし。\r\n\r\nA：ほら、折りたたみだから。\r\n\r\nB：いい、いい。そんなにどしゃぶりにはならないでしょ。', 'A: Amefuri tte ki-sōda yo. Kasa motte ttara? \r\n\r\nB: ii yo, mendokusaishi. \r\n\r\nA: Hora, oritatamidakara. B: \r\nĪ, ī. Son''nanidoshaburinihanaranaidesho', 'A:　Trời chuyển mưa rồi đó. Hay là mang theo cái ô đi?\r\n\r\nB:　Thôi được rồi, phiền phức lắm.\r\n\r\nA:　Đây nè, cái này gấp lại được mà.\r\n\r\nB:　Được rồi mà. Chắc trời không mưa to như trút thế đâu.', ''),
(8, 'TC1_01', 'Đánh giá tích cực về điều gì đó.', 'A：さすが、一流ホテルだけのことはあるね。\r\n\r\nB：何感心してんの？\r\n\r\nA：見てよ。あのシャンデリアの大きさ！\r\n\r\nB：本当！直径５メートルはあるね。', 'A: Sasuga, ichiryū hoteru dake no koto wa aru ne.\r\n\r\nB: Nan kanshin shi ten no? \r\n\r\nA: Mite yo. Ano shanderia no ōki-sa! \r\n\r\nB: Hontō! Chokkei 5 mētoru wa aru ne.', 'A:　Quả đúng là khách sạn hạng sang có khác ha.\r\n\r\nB:　Anh thán phục về điều gì?\r\n\r\nA:　Em nhìn kìa, ngọn đèn chùm kia to chưa kìa.\r\n\r\nB:　Ờ ha, đường kính của nó chắc cũng 5m ấy chứ.', ''),
(9, 'TC1_01', 'Cách nói mệnh lệnh', 'A：ぐずぐずしてないでさっさと出かけなさい。\r\n\r\nB：ちょっとおなかが痛くて…。\r\n\r\nA：大丈夫。いつもどおりテストが終われば、すぐ治るから。\r\n\r\nB：違うってば～。今日は本当に痛いんだよ。', 'A: Guzuguzu shitenaide sassato dekake nasai. \r\n\r\nB: Chotto onaka ga itakute…. \r\n\r\nA: Daijōbu. Itsumo dōri tesuto ga owareba, sugu naorukara. \r\n\r\nB: Chigau tteba ~. Kyō wa hontōni itai nda yo.', 'A:　Đừng lề mề nữa, khẩn trương đi học đi con.\r\n\r\nB:　Bụng con nó đau...\r\n\r\nA:　Không sao đâu, làm bài kiểm tra xong là khỏi ngay như mọi khi ấy mà.\r\n\r\nB:　Không phải đâu mẹ. Bữa nay con đau thiệt đó.', ''),
(10, 'CM_01', 'Xin chào', 'A: こんにちは\r\n\r\nB: こんにちは\r\n\r\nA: わたしはすずきよたです。はじめまして\r\n\r\nB: わたしはぜソンミラーです。はじめまして。どうぞよろしく\r\n\r\n', 'A: Kon''nichiwa \r\n\r\nB: Kon''nichiwa \r\n\r\nA: Watashi wa Suzuki yotadesu. Hajimemashite\r\n\r\nB: Watashi wa ze sonmirādesu. Hajimemashite. Dōzo yoroshiku.', 'A : Xin chào.\r\n\r\nB : Xin chào.\r\n\r\nA : Tôi là Suzuki Yota. Rất vui được gặp anh.\r\n\r\nB : Tôi là Jason Miler. Rất hân hạn được biết anh\r\n\r\n', 'CommunicationBai1Phan1');

-- --------------------------------------------------------

--
-- Table structure for table `grammar`
--

CREATE TABLE IF NOT EXISTS `grammar` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_hiragana` varchar(200) NOT NULL,
  `g_romaji` varchar(200) NOT NULL,
  `g_level` varchar(10) NOT NULL,
  `g_meaning` varchar(200) NOT NULL,
  `g_use` varchar(1000) NOT NULL,
  `g_status` int(11) DEFAULT NULL,
  `reading_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `grammar`
--

INSERT INTO `grammar` (`g_id`, `g_hiragana`, `g_romaji`, `g_level`, `g_meaning`, `g_use`, `g_status`, `reading_id`) VALUES
(1, '～によって／～により／～による／～によっては', '~ni yoru/ ni yotte/ ni yori', 'N3', 'Nhờ vào, do, bởi ~', 'Dùng để chỉ lí do, nguyên nhân; chỉ cách thức, biện pháp;tùy vào~', 1, 'N3_soumatome_1.1'),
(2, '～わけではない／～わけでもない', 'wakedewanai / wakedemonai', 'N3', 'Không nhất thiết là ~, không phải là ~', 'Không nhất thiết là ~, không phải là ~', 1, 'N3_soumatome_1.1'),
(3, '～わけだ', 'wakeda', 'N3', 'Vì', 'Vì có lý do nên muốn nói như thế là đương nhiên.\r\nDo quá trình, nên muốn nói sự việc trở nên thế. Tức là ~, là thế', 1, 'N3_soumatome_1.2'),
(4, '～わけにはいかない／わけにもいかない', 'wakenihaikanai wakenimoikanai', 'N3', 'Có lý do nên ~ không làm được/ Phải làm ~', 'Có lý do nên ~ không làm được', 1, 'N3_soumatome_1.2'),
(5, ' ～はずがない', 'hazuganai', 'N2', 'Hiển nhiên ～không, chắc chắn không ～', 'Để phán đoán 1 sự việc', 1, 'N2_soumatome_1.2'),
(6, ' ～はずだ', 'hazuda', 'N3', 'Chắc chắn, không thể khác được ', 'Biểu thị sự phán đoán', 1, ''),
(7, '～そうだ', 'souda', 'N5', 'Có vẻ, trông như', 'Diễn tả những dự đoán dựa trên những gì nhìn thấy hoặc cảm nhận.', 1, 'SC_01'),
(8, '～そうだ (2)', 'souda', 'N4', 'Nghe nói/rằng, Theo…', 'Dùng để truyền đạt những thông tin mà mình nghe thấy ở đâu đó đến người thứ 3 và không có nhận định của bạn.', 1, ''),
(9, '～かのようだ／～かのような／～かのように', 'kanoyouda / kanoyouna/ kanoyouni', 'N2', 'Thực tế thì không phải vậy nhưng có vẻ như là ~', 'Thực tế thì không phải vậy nhưng có vẻ như là ~', 1, 'N2_soumatome_1.2'),
(10, '～ようだ', 'youda', 'N4', 'Hình như là ～', 'Dùng để diễn đạt nhũng suy luận, phán đoán một cách trực quan, hoàn tòan dựa trên những cảm giác, cảm nhận (5 giác quan) của bản thân. Vì thế, những suy đoán đó có thể không chính xác.', 1, ''),
(11, '(まるで)～ようだ', 'youda', 'N3', 'cứ như, giống như', 'so sánh 1 sự vật nào đó với 1 sự vật khác', 1, ''),
(12, '～たび（に）', 'tabini', 'N4', 'Mỗi khi, mỗi dịp ~', 'Mỗi khi, mỗi dịp ~', 1, ''),
(13, '～べき／～べきだ／～べきではない', 'beki bekida bekidehanai', 'N1', 'Làm như thế là đương nhiên, nên làm ~', 'Làm như thế là đương nhiên, nên làm ~', 1, ''),
(14, '～としたら／～とすれば', 'toshitara tosureba', 'N3', 'Nếu mà (giả định)', 'Nếu mà (giả định)', 1, ''),
(15, ' ～といったら', 'toittara', 'N2', 'Nếu nói về~', 'Nói về cảm xúc thán phục, ngạc nhiên, ngoài mong đợi (cả tiêu cực và tích cực)', 1, 'N2_soumatome_1.1'),
(16, '～ときたら', 'tokitara', 'N2', 'Nhấn mạnh chuyện muốn nói', 'Nhấn mạnh chuyện muốn nói\r\n', 1, 'N2_soumatome_1.1'),
(17, ' ～上は', 'ueha', 'N4', 'Chừng nào ~ ; đã là ~ thì', 'Chừng nào ~ ; đã là ~ thì', 1, ''),
(18, '～たところで', 'ta tokorode', 'N3', 'Cho dù...cũng', 'Dùng khi muốn nêu phán đoán một việc làm gì đó vô ích, không có tác dụng.', 1, ''),
(19, '～たところ', 'tokoro', 'N3', 'Sau ~', 'Sau khi làm cái đó thì kết quả sẽ như thế nào đó', 1, ''),
(20, '～ばかりに', 'bakarini', 'N4', 'Chỉ vỉ ~', 'Biểu thị tâm trạng tiếc vi chỉ tại nguyên nhân đó mà trở thành kết quả xấu', 1, ''),
(21, '～ばかりか／～ばかりでなく', 'bakari ka / bakari denaku', 'N5', 'Không chỉ ~, ngoài ra còn…', 'Không chỉ ~, ngoài ra còn…', 1, 'SC_01');

-- --------------------------------------------------------

--
-- Table structure for table `grammarsentence`
--

CREATE TABLE IF NOT EXISTS `grammarsentence` (
  `g_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`g_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grammarsentence`
--

INSERT INTO `grammarsentence` (`g_id`, `s_id`) VALUES
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(3, 61),
(3, 62),
(2, 63),
(2, 64),
(5, 65),
(5, 66),
(5, 67),
(6, 68),
(6, 69),
(7, 70),
(7, 71),
(7, 72),
(8, 73),
(8, 74),
(9, 75),
(9, 76),
(9, 77),
(10, 78),
(10, 79),
(11, 80),
(11, 81),
(12, 82),
(12, 83),
(13, 84),
(13, 85),
(13, 86),
(14, 87),
(14, 88),
(15, 89),
(15, 90),
(16, 91),
(16, 92),
(17, 93),
(17, 94),
(17, 95),
(18, 96),
(18, 97),
(18, 98),
(19, 99),
(20, 100),
(20, 101),
(20, 102),
(21, 103),
(21, 104),
(21, 105);

-- --------------------------------------------------------

--
-- Table structure for table `kanji`
--

CREATE TABLE IF NOT EXISTS `kanji` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_kanji` varchar(10) NOT NULL,
  `k_hanviet` varchar(50) NOT NULL,
  `k_onyomi` varchar(100) DEFAULT NULL,
  `k_kunyomi` varchar(100) DEFAULT NULL,
  `k_meaning` varchar(200) DEFAULT NULL,
  `k_level` varchar(10) DEFAULT NULL,
  `k_status` int(11) DEFAULT NULL,
  `reading_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`k_id`),
  UNIQUE KEY `k_kanji` (`k_kanji`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `kanji`
--

INSERT INTO `kanji` (`k_id`, `k_kanji`, `k_hanviet`, `k_onyomi`, `k_kunyomi`, `k_meaning`, `k_level`, `k_status`, `reading_id`) VALUES
(1, '一', 'NHẤT', 'イチ, イツ', 'ひと-, ひと.つ', 'Một', 'N5', 1, 'SC_01'),
(2, '二', 'NHỊ', 'ニ, ジ', 'ふた, ふた.つ, ふたた.び', 'Hai', 'N5', 1, 'SC_01'),
(3, '三', 'TAM', 'サン, ゾウ', 'み, み.つ, みっ.つ', 'Ba', 'N5', 1, 'SC_01'),
(4, '四', 'TỨ', 'シ', 'よ, よ.つ, よっ.つ, よん', 'Bốn', 'N5', 1, 'SC_01'),
(5, '五', 'NGŨ', 'ゴ', 'いつ, いつ.つ', 'Năm', 'N5', 1, 'SC_01'),
(6, '六', 'LỤC', 'ロク, リク', 'む, む.つ, むっ.つ, むい', 'Sáu', 'N5', 1, 'SC_01'),
(7, '七', 'THẤT', 'シチ', 'なな, なな.つ, なの', 'Bảy', 'N5', 1, 'SC_01'),
(8, '八', 'BÁT', 'ハチ', 'や, や.つ, やっ.つ, よう', 'Tám', 'N5', 1, 'SC_01'),
(9, '九', 'CỬU', 'キュウ, ク', 'ここの, ここの.つ', 'Chín', 'N5', 1, 'SC_01'),
(10, '十', 'THẬP', 'ジュウ, ジッ, ジュッ', 'とお, と', 'Mười', 'N5', 1, 'SC_01'),
(11, '今', 'KIM', 'コン, キン', 'いま', 'Nay, hiện nay, bây giờ', 'N5', 1, 'SC_02'),
(12, '大', 'ĐẠI, THÁI', 'ダイ, タイ', 'おお-, おお.きい, -おお.いに', 'Lớn', 'N5', 1, 'SC_02'),
(13, '中', 'TRUNG', 'チュウ', 'なか, うち, あた.る', 'Giữa, trong', 'N5', 1, 'SC_02'),
(14, '車', 'XA', 'シャ', 'くるま', 'Cái xe', 'N5', 1, 'SC_02'),
(15, '電', 'ĐIỆN', 'デン', '', 'Điện', 'N5', 1, 'SC_02'),
(16, '雨', 'VŨ', 'ウ', 'あめ, あま-, -さめ', 'Mưa', 'N5', 1, 'SC_02'),
(17, '百', 'BÁCH', 'ヒャク, ビャク', 'もも', 'Trăm, trăm lần', 'N5', 1, 'SC_02'),
(18, '時', 'THÌ, THỜI', 'ジ', 'とき, -どき', 'Mùa,đang thời', 'N5', 1, 'SC_02'),
(19, '出', 'XUẤT', 'シュツ, スイ', 'で.る, -で, だ.す, -だ.す, い.でる, い.だす', 'Ra ngoài', 'N5', 1, 'SC_02'),
(20, '高', 'CAO', 'コウ', 'たか.い, たか, -だか, たか.まる, たか.める', 'Cao, đắt', 'N5', 1, 'SC_02'),
(21, '急', 'CẤP', 'キュウ', 'いそ.ぐ, いそ.ぎ', 'Khẩn cấp, nguy cấp', 'N4', 1, 'SC_03'),
(22, '近', 'CẬN', 'キン, コン', 'ちか.い', 'Gần', 'N4', 1, 'SC_03'),
(23, '目', 'MỤC', 'モク, ボク', 'め, -め, ま-', 'Con mắt, mục lục', 'N4', 1, 'SC_03'),
(24, '開', 'KHAI', 'カイ', 'ひら.く, ひら.き, -びら.き, ひら.ける, あ.く, あ.ける', 'Mở', 'N4', 1, 'SC_03'),
(25, '質', 'CHẤT', 'シツ, シチ, チ', 'たち, ただ.す, もと, わりふ', 'Thể chất, tư chất', 'N4', 1, 'SC_03'),
(26, '牛', 'NGƯU', 'ギュウ', 'うし', 'Con trâu', 'N4', 1, 'SC_3'),
(27, '発', 'PHÁT', 'ハツ, ホツ', 'た.つ, あば.く, おこ.る, つか.わす, はな.つ', 'Xuất phát, phát triển', 'N4', 1, 'SC_03'),
(28, '同', 'ĐỒNG', 'ドウ', 'おな.じ', 'Cùng lúc', 'N4', 1, 'SC_03'),
(29, '元', 'NGUYÊN', 'ゲン, ガン', 'もと', 'Đồng, mới', 'N4', 1, 'SC_03'),
(30, '青', 'THANH', 'セイ, ショウ', 'あお, あお-, あお.い', 'Màu xanh', 'N4', 1, 'SC_03'),
(31, '野', 'DÃ', 'ヤ, ショ', 'の, の-', 'Đồng, quê', 'N3', 1, 'N3_soumatome_1.1'),
(32, '正', 'CHÍNH', 'セイ, ショウ', 'ただ.しい, ただ.す, まさ, まさ.に', 'Phải, chính đáng', 'N3', 1, 'N3_soumatome_1.1'),
(33, '真', 'CHÂN', 'シン', 'ま, ま-, まこと', 'Cái chân', 'N3', 1, 'N3_soumatome_1.1'),
(34, '花', 'HOA', 'カ, ケ', 'はな', 'Bông hoa', 'N3', 1, 'N3_soumatome_1.1'),
(35, '計', 'KẾ', 'ケイ', 'はか.る, はか.らう', 'Mưu kế, kê (thống kê)', 'N3', 1, 'N3_soumatome_1.1'),
(36, '自', 'TỰ', 'ジ, シ', 'みずか.ら, おの.ずから, おの.ずと', 'Từ, bởi', 'N3', 1, 'N3_soumatome_1.1'),
(37, '不', 'BẤT', 'フ, ブ', '', 'chẳng thể', 'N3', 1, 'N3_soumatome_1.1'),
(38, '力', 'LỰC', 'リョク, リキ, リイ', 'ちから', 'Sức, chăm chỉ', 'N3', 1, 'N3_soumatome_1.1'),
(39, '音', 'ÂM', 'オン, イン, -ノン', 'おと, ね', 'Tiếng động', 'N3', 1, 'N3_soumatome_1.1'),
(40, '親', 'THÂN', 'シン', 'おや, おや-, した.しい, した.しむ', 'Quen,người thân', 'N3', 1, 'N3_soumatome_1.1'),
(41, '示', 'THỊ', 'ジ, シ', 'しめ.す', 'hiển thị, mách bảo', 'N3', 1, 'N3_soumatome_1.2'),
(42, '交', 'GIAO', 'コウ', 'まじ.わる, まじ.える', 'Chơi,cùng', 'N3', 1, 'N3_soumatome_1.2'),
(43, '式', 'THỨC', 'シキ', '', 'Nghi thức, phép', 'N3', 1, 'N3_soumatome_1.2'),
(44, '絶', 'TUYỆT', 'ゼツ', 'た.える, た.やす, た.つ', 'Không', 'N3', 1, 'N3_soumatome_1.2'),
(45, '当', 'ĐƯƠNG', 'トウ', 'あ.たる, あ.たり, あ.てる, あ.て, まさ.に, まさ.にべし', 'Đang', 'N3', 1, 'N3_soumatome_1.2'),
(46, '議', 'NGHỊ', 'ギ', '', 'Bàn bạc', 'N3', 1, 'N3_soumatome_1.2'),
(47, '似', 'TỰ', 'ジ', 'に.る, ひ.る', 'Giống như', 'N3', 1, 'N3_soumatome_1.2'),
(48, '暗', 'ÁM', 'アン', 'くら.い, くら.む, くれ.る', 'Tối tăm', 'N3', 1, 'N3_soumatome_1.2'),
(49, '園', 'VIÊN', 'エン', 'その', 'Vườn', 'N3', 1, 'N3_soumatome_1.2'),
(50, '号', 'HIỆU', 'ゴウ', 'さけ.ぶ, よびな', 'Hiệu', 'N3', 1, 'N3_soumatome_1.2'),
(51, '術', 'THUẬT', 'ジュツ', 'すべ', 'Nghệ thuật, kỹ thuật', 'N3', 1, 'N3_soumatome_1.3'),
(52, '回', 'HỒI', 'カイ, エ', 'まわ.る, -まわ.る, -まわ.り', 'Về, quay lại', 'N3', 1, 'N3_soumatome_1.3'),
(53, '更', 'CANH', 'コウ', 'さら, さら.に, ふ.ける, ふ.かす', 'Đổi, thay', 'N3', 1, 'N3_soumatome_1.3'),
(54, '確', 'XÁC', 'カク, コウ', 'たし.か, たし.かめる', 'Bền, chắc.Đích xác', 'N3', 1, 'N3_soumatome_1.3'),
(55, '達', 'ĐẠT', 'タツ, ダ', '-たち', 'thông hiểu', 'N3', 1, 'N3_soumatome_1.3'),
(56, '馬', 'MÃ', 'バ', 'うま, うま-, ま', 'Con ngựa', 'N3', 1, 'N3_soumatome_1.3'),
(57, '良', 'LƯƠNG', 'リョウ', 'よ.い, -よ.い, い.い, -い.い', 'Lành, tốt', 'N3', 1, 'N3_soumatome_1.3'),
(58, '因', 'NHÂN', 'イン', 'よ.る, ちな.む', 'Nương tựa.', 'N3', 1, 'N3_soumatome_1.3'),
(59, '化', 'HÓA', 'カ, ケ', 'ば.ける, ば.かす, ふ.ける, け.する', 'Biến hóa', 'N3', 1, 'N3_soumatome_1.3'),
(60, '伝', 'TRUYỀN', 'デン, テン', 'つた.わる, つた.える, つた.う, つだ.う, -づた.い, つて', 'Truyền đạt, truyền động', 'N3', 1, 'N3_soumatome_1.3'),
(61, '周', 'CHU', 'シュウ', 'まわ.り', 'Vòng, khắp', 'N2', 1, 'N2_soumatome_1.1'),
(62, '占', 'CHIÊM, CHIẾM', 'セン', 'し.める, うらな.う', 'Xem', 'N2', 1, 'N2_soumatome_1.1'),
(63, '丸', 'HOÀN', 'ガン', 'まる, まる.める, まる.い', 'Hột nhỏ tròn, Thẳng thắn', 'N2', 1, 'N2_soumatome_1.1'),
(64, '介', 'GIỚI', 'カイ', '', 'Cõi, giúp', 'N2', 1, 'N2_soumatome_1.1'),
(65, '乱', 'LOẠN', 'ラン, ロン', 'みだ.れる, みだ.る, みだ.す, みだ, おさ.める, わた.る', 'Loạn', 'N2', 1, 'N2_soumatome_1.1'),
(66, '札', 'TRÁT', 'サツ', 'ふだ', 'Cái thẻ ( thẻ bài)', 'N2', 1, 'N2_soumatome_1.1'),
(67, '像', 'TƯỢNG', 'ゾウ', '', 'Hình tượng', 'N2', 1, 'N2_soumatome_1.1'),
(68, '臓', 'TẠNG', 'ゾウ', 'はらわた', 'Nội tạng', 'N2', 1, 'N2_soumatome_1.1'),
(69, '衣', 'Y, Ý', 'イ, エ', 'ころも, きぬ, -ぎ', 'Áo, y phục', 'N2', 1, 'N2_soumatome_1.1'),
(70, '略', 'LƯỢC', 'リャク', 'ほぼ, おか.す, おさ.める', 'Mưu lược', 'N2', 1, 'N2_soumatome_1.1'),
(71, '脳', 'NÃO', 'ノウ, ドウ', 'のうずる', 'Bộ não, đầu não', 'N2', 1, 'N2_soumatome_1.2'),
(72, '柔', 'NHU', 'ジュウ, ニュウ', 'やわ.らか, やわ.らかい, やわ, やわ.ら', 'Mềm, mềm yếu, mềm mại', 'N2', 1, 'N2_soumatome_1.2'),
(73, '設', 'THIẾT', 'セツ', 'もう.ける', 'Sắp bày, đặt bày', 'N2', 1, 'N2_soumatome_1.2'),
(74, '快', 'KHOÁI', 'カイ', 'こころよ.い', 'Sướng', 'N2', 1, 'N2_soumatome_1.2'),
(75, '綿', 'MIÊN', 'メン', 'わた', 'Bông mới', 'N2', 1, 'N2_soumatome_1.2'),
(76, '根', 'CĂN', 'コン', 'ね, -ね', 'Rễ cây', 'N2', 1, 'N2_soumatome_1.2'),
(77, '複', 'PHỨC', 'フク', 'ね, -ね', 'Kép', 'N2', 1, 'N2_soumatome_1.2'),
(78, '農', 'NÔNG', 'ノウ', '', 'Nghề làm ruộng', 'N2', 1, 'N2_soumatome_1.2'),
(79, '含', 'HÀM', 'ガン', 'ふく.む, ふく.める', 'Ngậm', 'N2', 1, 'N2_soumatome_1.2'),
(80, '比', 'BỈ, BÍ, BÌ, TỈ', 'ヒ', 'くら.べる', 'So sánh', 'N2', 1, 'N2_soumatome_1.2'),
(81, ' 票', 'PHIÊU', 'ヒョウ', '', 'Chứng chỉ', 'N1', 1, ''),
(82, '俵', 'BIỂU', 'ヒョウ', 'たわら', 'Chia cho', 'N1', 1, ''),
(83, '宵', 'TIÊU', 'ショウ', 'よい', 'Đêm', 'N1', 1, ''),
(84, '謄', 'ĐẰNG', 'トウ', '', 'Sao, chép', 'N1', 1, ''),
(85, '駆', 'KHU', 'ク', 'か.ける, か.る', 'Khu trục hạm', 'N1', 1, ''),
(86, '博', 'BÁC', 'ハク, バク', '', 'Rộng', 'N1', 1, ''),
(87, '氏', 'THỊ, CHI', 'シ', 'うじ, -うじ', 'Họ, ngành họ.', 'N1', 1, ''),
(88, '弐', 'NHỊ', 'ニ, ジ', 'ふた.つ, そえ', 'Số hai', 'N1', 1, ''),
(89, '栗', 'LẬT', 'リツ, リ', 'くり, おののく', 'Cây lật (cây dẻ)', 'N1', 1, ''),
(90, '縫', 'PHÙNG', 'ホウ', 'ぬ.う', 'May áo.', 'N1', 1, ''),
(91, '款', 'KHOẢN', 'カン', 'ぬ.う', 'Thành thực', 'N1', 1, ''),
(92, '罷', 'BÃI, BÌ', 'ヒ', 'まか.り-, や.める', 'Nghỉ, thôi', 'N1', 1, ''),
(93, '剣', 'KIẾM', 'ケン', 'つるぎ', 'Thanh kiếm', 'N1', 1, ''),
(94, '鷹', 'ƯNG', 'ヨウ, オウ', 'たか', 'Chim ưng', 'N1', 1, ''),
(95, '坑', 'KHANH', 'コウ', 'たか', 'Hố', 'N1', 1, ''),
(96, '蔦', 'ĐIỂU', 'チョウ', 'つた', 'Một thứ cây mọc từng bụi', 'N1', 1, ''),
(97, '慎', 'THẬN', 'シン', 'つつし.む, つつし, つつし.み', 'Ghín, cẩn thận', 'N1', 1, ''),
(98, '砲', 'PHÁO', 'ホウ', '', 'Xe pháo', 'N1', 1, ''),
(99, '喝', 'HÁT, ỚI', 'カツ', '', 'Quát mắng', 'N1', 1, ''),
(100, '嚇', 'HÁCH', 'カク', 'おど.かす', 'Dọa nạt.', 'N1', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `meaning`
--

CREATE TABLE IF NOT EXISTS `meaning` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) NOT NULL,
  `m_meaningvn` varchar(500) DEFAULT NULL,
  `m_category` varchar(10) DEFAULT NULL,
  `m_kanji` varchar(10) DEFAULT NULL,
  `m_specialized` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `v_id` (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `meaning`
--

INSERT INTO `meaning` (`m_id`, `v_id`, `m_meaningvn`, `m_category`, `m_kanji`, `m_specialized`) VALUES
(1, 1, 'sự bất tiện; lỗi', 'N', '不具合 ', 'IT'),
(2, 2, 'sự mở rộng; sự khuyếch trương', 'N', '拡張 ', ''),
(3, 2, 'mở rộng; khuyếch trương', 'V', '拡張する ', ''),
(4, 3, 'dạt dào; tràn trề; đầy rẫy', 'V', '漂う ', ''),
(5, 3, 'lộ ra; tỏ ra', 'V', '漂う ', ''),
(6, 3, 'nổi; nổi lềnh bềnh; trôi nổi', 'V', '漂う', ''),
(7, 4, 'sự đưa vào; sự giới thiệu', 'N', ' 導入', ''),
(8, 4, 'đưa vào (sử dụng, áp dụng...)', 'V', ' 導入する', ''),
(9, 5, 'sự xử lý; sự giải quyết', 'N', '処理', ''),
(10, 5, 'xử lý; giải quyết', 'V', '処理する', ''),
(11, 6, 'trung tâm', 'N', '中心 ', ''),
(12, 6, 'sự thật tâm', 'N', '衷心 ', ''),
(13, 7, 'thực hiện', 'N', '実現', ''),
(14, 7, 'thực hiện; thi hành', 'V', '実現する', ''),
(15, 8, 'đăng ký', 'V', '応じる ', ''),
(16, 8, 'đáp ứng; trả lời', 'V', '応じる', ''),
(17, 8, 'nhận lời', 'V', '応じる', ''),
(18, 8, 'phù hợp; ứng với; dựa trên', 'V', '応じる ', ''),
(19, 9, 'sự tính toán; tính toán', 'N', '計算', ''),
(20, 9, 'tính; tính toán', 'V', '計算する ', ''),
(21, 10, 'lĩnh vực', 'N', '分野', ''),
(22, 11, 'kim ngạch; số tiền', 'N', '金額', ''),
(23, 12, 'hạn định; hạn chế', 'V', '限定する', ''),
(24, 13, 'sự tốt nghiệp', 'N', '卒業', ''),
(25, 13, 'tốt nghiệp', 'V', '卒業する ', ''),
(26, 14, 'sự trúng tuyển; sự thi đỗ', 'N', '合格', ''),
(27, 14, 'trúng tuyển; thi đỗ', 'V', '合格する ', ''),
(28, 15, 'khả năng,năng lực', 'N', '能力', ''),
(29, 16, 'học', 'V', '学ぶ', ''),
(30, 17, 'sự giả định', 'N', '仮定', ''),
(31, 17, 'gia đình', 'N', '家庭', ''),
(32, 17, 'giáo trình giảng dạy; khóa trình', 'N', '課程', ''),
(33, 17, 'quá trình; giai đoạn', 'N', '過程', ''),
(34, 18, 'chậm; trễ; muộn', 'V', '遅れる ', ''),
(35, 19, 'buồn, cô đơn', 'Adj', '寂しい', ''),
(36, 20, 'kém, dốt', 'Adj', '下手', ''),
(37, 21, 'kém; yếu', 'Adj', '苦手', ''),
(38, 22, 'đường cong', 'N', '曲線', 'Math'),
(39, 23, 'phẩm chất loại một ', 'N', '最上品', 'foreign trade'),
(40, 24, 'người vỡ nợ [bankrupt]', 'N', '破産人', 'foreign trade'),
(41, 25, 'buôn bán hai chiều [reciprocal]', 'N', '互恵貿易', 'foreign trade'),
(42, 26, 'sự kiện, sự việc [event]', 'N', '事象', 'IT'),
(43, 27, 'nhị phân [binary]', 'N', '二元', 'IT'),
(44, 28, 'nhân đôi, dư thừa [duplication]', 'N', '二重化', 'IT'),
(45, 29, 'đặc tả [means, specification]', 'N', '仕様 ', 'IT'),
(46, 29, 'dùng riêng, sử dụng cá nhân', 'N', '私用', 'IT'),
(47, 30, 'sự xác nhận [validation]', 'N', '確認', 'IT'),
(48, 31, 'ktra sự hợp lệ [validation test]', 'N', '確認試験', 'IT'),
(49, 32, 'yêu cầu [requirement]', 'N', '要件', 'IT'),
(50, 33, 'yêu cầu [requirement]', 'N', '要求', 'IT'),
(51, 34, 'kiểu phần tử [element type]', 'N', '要素型', 'IT'),
(52, 35, 'từ khoá [title word, keyword]', 'N', '見出し語', 'IT'),
(53, 36, 'sự giải nén [decompression (vs)]', 'N', '解凍', 'IT'),
(54, 37, 'sửa chữa [fix (vs), correction]', 'N', '訂正', 'IT'),
(55, 38, 'biểu tượng [sign, symbol]', 'N', '記号', 'IT'),
(56, 39, 'chứng khoán [instrument, stock]', 'N', '証券', 'foreign trade'),
(57, 40, 'đánh giá, ước giá [Evaluation]', 'N', '評価', 'Marketing  ');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` varchar(20) DEFAULT NULL,
  `question_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `test_id`, `question_content`) VALUES
(1, 'N4_Moji_001', '1.そんこうえんは　しずかで　（　　　）ので、　よく　さんぽに　いきます。'),
(2, 'N4_Moji_001', ' 2. こどもたちに　ものを　たいせつにする（　　　）　いつも　いっています。'),
(3, 'N4_Moji_001', '3. おきゃくさまが　りょかんに　（　　　）なりました。'),
(4, 'N4_Moji_001', '4. わたしは　テレビをみるより、　ほんを　よむ（　　　）　すきだ。'),
(5, 'N4_Moji_001', '5. もうわたしより　むすこのほうが、ちからが（　　　）　かもしれませんね'),
(6, 'N4_Dokkai_001', '門（1）　この人はいつ　病院にいきますか?'),
(7, 'N4_Dokkai_001', ' 門（2）パーテイーに来る人は　なんよう日に　おかねをはこにいれますか。'),
(8, 'N4_Dokkai_001', '門（3）　うえと　おなじ　いみの　ぶんを　えらびなさい。  '),
(9, 'N4_Dokkai_001', '門（4）　この人は、何ページ　読みましたか。  '),
(10, 'N4_Dokkai_001', '門（5）かばんがほしいですか  '),
(11, 'N4_Bunpou_001', 'いつ＿＿＿＿いちばん　ひまですか。'),
(12, 'N4_Bunpou_001', 'ゆうべは３時間＿＿＿＿ねませんでした'),
(13, 'N4_Bunpou_001', 'いそがしいです＿＿＿、そうじの時間がありません。'),
(14, 'N4_Bunpou_001', 'こんどのにちようびはどこ＿＿＿＿でかけません。'),
(15, 'N4_Bunpou_001', 'えき＿＿＿ちかくに本やがあります。'),
(16, 'N4_Choukai_001', '女：この教室、ずいぶん暑いね。\n男：＿＿＿＿＿＿＿＿＿＿。'),
(17, 'N4_Choukai_001', 'つぎのことばの使い方として最も近いものを、一つえらびなさい。'),
(18, 'N4_Choukai_001', '女の人の息子がかいた絵はどれですか。'),
(19, 'N4_Choukai_001', '男の人はどの人ですか。'),
(20, 'N4_Choukai_001', 'お腹の周りが特に太くなってきたしね。');

-- --------------------------------------------------------

--
-- Table structure for table `readingarticle`
--

CREATE TABLE IF NOT EXISTS `readingarticle` (
  `readingarticle_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_id` varchar(20) DEFAULT NULL,
  `readingarticle_content` varchar(5000) DEFAULT NULL,
  `readingarticle_question` varchar(5000) DEFAULT NULL,
  `readingarticle_answer` varchar(5000) DEFAULT NULL,
  `readingarticle_meaning` varchar(5000) NOT NULL,
  PRIMARY KEY (`readingarticle_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `readingarticle`
--

INSERT INTO `readingarticle` (`readingarticle_id`, `reading_id`, `readingarticle_content`, `readingarticle_question`, `readingarticle_answer`, `readingarticle_meaning`) VALUES
(1, 'N2_soumatome_1.1', 'ソフトウェアを行き当たりばったりで開発していては、生産性も品質も上がらないことは明白です。そこで、ソフトウェアを順序立てて開発する手順をプロセスとしてとらえ、さまざまな取り組みがなされてきました.1970年代から80 年代にかけては、ウォータフォール型開発プロセスが、1990年代に入るとスパイラルモデルなどの反復／漸進型開発プロセスが注目されました。いずれの手法でも開発プロセスを図と文章で明確にすることにより、開発者と管 理者の間の共通の理解が得られ、開発者同士の分業の容易化、プロジェクト管理の効率化を図ることができます。このレッスンでは、代表的なプロセスとプロセスの評価手法について見ていきましょう。 ソフトウェアを行き当たりばったりで開発していては、生産性も品質も上がらないことは明白です。そこで、ソフトウェアを順序立てて開発する手順をプロセスとしてとらえ、さまざまな取り組みがなされてきました.1970年代から80 年代にかけては、ウォータフォール型開発プロセスが、1990年代に入るとスパイラルモデルなどの反復／漸進型開発プロセスが注目されました。いずれの手法でも開発プロセスを図と文章で明確にすることにより、開発者と管 理者の間の共通の理解が得られ、開発者同士の分業の容易化、プロジェクト管理の効率化を図ることができます。このレッスンでは、代表的なプロセスとプロセスの評価手法について見ていきましょう。 最近は、統一プロセスも注目されています。', '1. 開発者同士の分業の容易化、プロジェクト管理の効率化を図ることができます?\r\n\r\n2. 開発者同士の分業の容易化、プロジェクト管理の効率化を図ることができます?', '1. 開発者同士の分業の容易化\n\n2.プロジェクト管理の効率化を図ることができます', 'Để người lớn có thể thưởng thức truyện tranh từ truyện tranh cho trẻ em, một loạt các truyện tranh đã được bán tại Nhật Bản. Đôi khi tôi nói một bức tranh tốt, nhưng những câu chuyện thú vị. Nếu bạn nghĩ rằng "gì. Sẽ được sau này", ông đó là về nó là không thể dừng lại trên đường.Ngoài ra còn có một chương trình phim và truyền hình được sinh ra từ manga là phổ biến. Truyện tranh Nhật Bản đã được đọc trên toàn thế giới và là "Manga" và "manga" trong giờ.');

-- --------------------------------------------------------

--
-- Table structure for table `readingdocument`
--

CREATE TABLE IF NOT EXISTS `readingdocument` (
  `reading_id` varchar(20) NOT NULL,
  `reading_title` varchar(100) NOT NULL,
  `reading_level` varchar(10) NOT NULL,
  PRIMARY KEY (`reading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `readingdocument`
--

INSERT INTO `readingdocument` (`reading_id`, `reading_title`, `reading_level`) VALUES
('N2_soumatome_1.1', '第1週_1日目（日本語総まとめN2)-Ngày 1 tuần 1', 'N2'),
('N2_soumatome_1.2', '第1週_2日目（日本語総まとめN2)-Ngày 2 tuần 1', 'N2'),
('N2_soumatome_1.3', '第1週_3日目（日本語総まとめN2)-Ngày 3 tuần 1', 'N2'),
('N2_soumatome_1.4', '第1週_4日目（日本語総まとめN2)-Ngày 4 tuần 1', 'N2'),
('N2_soumatome_1.5', '第1週_5日目（日本語総まとめN2)-Ngày 5 tuần 1', 'N2'),
('N2_soumatome_1.6', '第1週_6日目（日本語総まとめN2)-Ngày 6 tuần 1', 'N2'),
('N2_soumatome_1.7', '第1週_7日目（日本語総まとめN2)-Ngày 7 tuần 1', 'N2'),
('N2_soumatome_2.1', '第2週_1日目（日本語総まとめN2)-Ngày 1 tuần 2', 'N2'),
('N2_soumatome_2.2', '第2週_2日目（日本語総まとめN2)-Ngày 2 tuần 2', 'N2'),
('N2_soumatome_2.3', '第2週_3日目（日本語総まとめN2)-Ngày 3 tuần 2', 'N2'),
('N2_soumatome_2.4', '第2週_4日目（日本語総まとめN2)-Ngày 4 tuần 2', 'N2'),
('N2_soumatome_2.5', '第2週_5日目（日本語総まとめN2)-Ngày 5 tuần 2', 'N2'),
('N2_soumatome_2.6', '第2週_6日目（日本語総まとめN2)-Ngày 6 tuần 2', 'N2'),
('N2_soumatome_2.7', '第2週7日目（日本語総まとめN2)-Ngày 7 tuần 2', 'N2'),
('N3_soumatome_1.1', '第1週_1日目（日本語総まとめN3)-Ngày 1 tuần 1', 'N3'),
('N3_soumatome_1.2', '第1週_2日目（日本語総まとめN3)-Ngày 2 tuần 1', 'N3'),
('N3_soumatome_1.3', '第1週_3日目（日本語総まとめN3)-Ngày 3 tuần 1', 'N3'),
('N3_soumatome_1.4', '第1週_4日目（日本語総まとめN3)-Ngày 4 tuần 1', 'N3'),
('N3_soumatome_1.5', '第1週_5日目（日本語総まとめN3)-Ngày 5 tuần 1', 'N3'),
('N3_soumatome_1.6', '第1週_6日目（日本語総まとめN3)-Ngày 6 tuần 1', 'N3'),
('N3_soumatome_1.7', '第1週_7日目（日本語総まとめN3)-Ngày 7 tuần 1', 'N3'),
('N3_soumatome_2.1', '第2週_1日目（日本語総まとめN3)-Ngày 1 tuần 2', 'N3'),
('N3_soumatome_2.2', '第2週_2日目（日本語総まとめN3)-Ngày 2 tuần 2', 'N3'),
('N3_soumatome_2.3', '第2週_3日目（日本語総まとめN3)-Ngày 3 tuần 2', 'N3'),
('N3_soumatome_2.4', '第2週_4日目（日本語総まとめN3)-Ngày 4 tuần 2', 'N3'),
('N3_soumatome_2.5', '第2週_5日目（日本語総まとめN3)-Ngày 5 tuần 2', 'N3'),
('N3_soumatome_2.6', '第2週_6日目（日本語総まとめN3)-Ngày 6 tuần 2', 'N3'),
('N3_soumatome_2.7', '第2週_7日目（日本語総まとめN3)-Ngày 7 tuần 2', 'N3'),
('SC_01', 'BÀI 1 - はじめまして (Minnano Nihongo)', 'N5'),
('SC_02', 'BÀI 2 - ほんの　気持ちです (Minnano Nihongo)', 'N5'),
('SC_03', 'BÀI 3　-　これを　ください (Minnano Nihongo)', 'N5'),
('SC_04', 'BÀI 4　－そちらは　何時から　何時までですか', 'N5'),
('SC_05', 'BÀI 5　-　甲子園へ　いきますか', 'N5'),
('SC_06', 'BÀI 6　-　いっしょに　いきませんか', 'N5'),
('SC_07', 'BÀI 7　-　ごめんください', 'N5'),
('SC_08', 'BÀI 8　-　そろそろ　しつれいします', 'N5'),
('SC_09', 'BÀI 9　-　残念です', 'N5'),
('SC_10', 'BÀI 10-チリソースは　ありませんか', 'N5'),
('SC_11', 'BÀI 11　-　これ、お願いします', 'N5'),
('SC_12', 'BÀI 12　-　お祭りは　どうでしたか', 'N5'),
('SC_13', 'BÀI 13　-　別々に　お願いします', 'N5'),
('SC_14', 'BÀI 14　-　梅田まで　行ってください', 'N5'),
('SC_15', 'BÀI 15　-　ご家族は？', 'N5'),
('SC_16', 'BÀI 16　-　使い方を　教えてください', 'N5'),
('SC_17', 'BÀI 17　- どう　しましたか', 'N5'),
('SC_18', 'BÀI 18　- 趣味は　なんですか', 'N5'),
('SC_19', 'BÀI 19　- ダイエットは　明日から　します', 'N5'),
('SC_20', 'BÀI 20　- 夏休みは　どうするの？', 'N5'),
('SC_21', 'BÀI 21　- 私も　そう思います', 'N5'),
('SC_22', 'BÀI 22　- どんな　アパートが　いいですか', 'N5'),
('SC_23', 'BÀI 23　- どう　やって行きますか', 'N5'),
('SC_24', 'BÀI 24　- 手伝って　くれますか', 'N5'),
('SC_25', 'BÀI 25　- いろいろ　お世話に　なりました', 'N5'),
('SC_26', 'BÀI 26 - どこに　ごみを　出したら　いいですか', 'N4'),
('SC_27', 'BÀI 27 - 何でも　作れるんですね', 'N4'),
('SC_28', 'BÀI 28 - お茶でも　飲みながら･･････', 'N4'),
('SC_29', 'BÀI 29 - 忘れ物を　して　しまったんです', 'N4'),
('SC_30', 'BÀI 30 - チケットを　予約して　おきます', 'N4'),
('SC_31', 'BÀI 31 - インターネットを　始めようと　思って　います', 'N4'),
('SC_32', 'BÀI 32 - 病気かも　しれません', 'N4'),
('SC_33', 'BÀI 33 - これは　どういう　意味ですか', 'N4'),
('SC_34', 'BÀI 34 - する　とおりに　して　ください', 'N4'),
('SC_35', 'BÀI 35 - 旅行会社へ　行けば、わかります', 'N4'),
('SC_36', 'BÀI 36 - 頭と　体を　使うように　して　います', 'N4'),
('SC_37', 'BÀI 37 - 海を　埋め立てて　造られました', 'N4'),
('SC_38', 'BÀI 38 - 片付けるのが　好きなんです', 'N4'),
('SC_39', 'BÀI 39 - 遅れて、すみません', 'N4'),
('SC_40', 'BÀI 40 - 友達が　できたか　どうか、心配です', 'N4'),
('SC_41', 'BÀI 41 - 荷物を　預かって　いただけませんか', 'N4'),
('SC_42', 'BÀI 42 - ボーナスは　何に　使いますか', 'N4'),
('SC_43', 'BÀI 43 - 優しそうですね', 'N4'),
('SC_44', 'BÀI 44 - この　写真みたいに　して　ください', 'N4'),
('SC_45', 'BÀI 45 - 一生懸命　練習したのに', 'N4'),
('SC_46', 'BÀI 46 - もうすぐ　着く　はずです', 'N4'),
('SC_47', 'BÀI 47 - 婚約したそうです', 'N4'),
('SC_48', 'BÀI 48 - 休ませて　いただけませんか', 'N4'),
('SC_49', 'BÀI 49 - よろしく　お伝え　ください', 'N4'),
('SC_50', 'BÀI 50 - 心から　感謝いたします', 'N4');

-- --------------------------------------------------------

--
-- Table structure for table `readingvocabulary`
--

CREATE TABLE IF NOT EXISTS `readingvocabulary` (
  `readingvocabulary_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_id` varchar(20) DEFAULT NULL,
  `readingvocabulary_hiragana` varchar(100) DEFAULT NULL,
  `readingvocabulary_meaning` varchar(100) DEFAULT NULL,
  `readingvocabulary_kanji` varchar(10) DEFAULT NULL,
  `readingvocabulary_type` varchar(50) NOT NULL,
  PRIMARY KEY (`readingvocabulary_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `readingvocabulary`
--

INSERT INTO `readingvocabulary` (`readingvocabulary_id`, `reading_id`, `readingvocabulary_hiragana`, `readingvocabulary_meaning`, `readingvocabulary_kanji`, `readingvocabulary_type`) VALUES
(1, 'N3_soumatome_1.1', 'キッチン', 'nhà bếp', '', 'n'),
(2, 'N3_soumatome_1.1', 'だいどころ', 'nhà bếp', '台所', 'n'),
(3, 'N3_soumatome_1.1', 'でんしレンジ', 'lò vi ba', '電子レンジ', 'n'),
(4, 'N3_soumatome_1.1', 'ワイングラス', 'cốc uống rượu (có chân)', '', 'n'),
(5, 'N3_soumatome_1.1', 'コーヒーカップ', 'cốc uống cà phê', '', 'n'),
(6, 'N3_soumatome_1.1', 'ゆのみ', 'cốc uống trà', '湯飲み', 'n'),
(7, 'N3_soumatome_1.1', 'ガラスのコップ', 'cốc thủy tinh', '', 'n'),
(8, 'N3_soumatome_1.1', 'ガスレンジ', 'bếp ga', '', 'n'),
(9, 'N3_soumatome_1.1', 'ながし', 'bồn rửa; chậu rửa', '流し', 'n'),
(10, 'N3_soumatome_1.1', 'いま', 'phòng khách', '居間', 'n'),
(11, 'N3_soumatome_1.1', 'てんじょう', 'trần nhà', '天井', 'n'),
(12, 'N3_soumatome_1.1', 'コンセント', 'ổ cắm (điện)', '', 'n'),
(13, 'N3_soumatome_1.1', 'エアコン', 'máy điều hòa không khí', '', 'n'),
(14, 'N3_soumatome_1.1', 'ヒーター', 'máy sưởi; lò sưởi', '', 'n'),
(15, 'N3_soumatome_1.1', 'コード', 'dây điện', '', 'n'),
(16, 'N2_soumatome_1.1', 'チラシ', 'tờ rơi', '', 'n'),
(17, 'N2_soumatome_1.1', 'ちんたいアパート', 'căn hộ cho thuê', '賃貸アパート', 'n'),
(18, 'N2_soumatome_1.1', 'やちん', 'tiền thuê nhà', '家賃', 'n'),
(19, 'N2_soumatome_1.1', 'かんりひ', 'phí quản lý', '管理費', 'n'),
(20, 'N2_soumatome_1.1', 'ただ', 'miễn phí', '', 'adv'),
(21, 'N2_soumatome_1.1', 'マンション', 'chung cư', '', 'n'),
(22, 'N2_soumatome_1.1', 'しききん', 'tiền đặt cọc (sau này hoàn trả lại)', '敷金', 'n'),
(23, 'N2_soumatome_1.1', 'れいきん', 'tiền lễ (sau này không hoàn trả lại)', '礼金', 'n'),
(24, 'N2_soumatome_1.1', 'ながめがいい', 'tầm nhìn tốt', '', 'adj'),
(25, 'N2_soumatome_1.1', 'ひとりぐらし', 'sống một mình', '一人暮らし', 'adj'),
(26, 'N2_soumatome_1.1', 'きんじょづきあい', 'quan hệ hàng xóm', '近所付き合い', 'adj'),
(27, 'N2_soumatome_1.1', 'かれとつきあう', 'kết giao bạn trai', '彼と付き合う', 'v'),
(28, 'N2_soumatome_1.1', 'ともだちにつきあう', 'kết giao bạn bè', '友達に付き合う', 'v'),
(29, 'N2_soumatome_1.1', 'このふきん', 'quanh đây', 'この付近', 'n'),
(30, 'N2_soumatome_1.1', 'まんまえ', 'ngay phía trước', '真ん前', 'n'),
(31, 'SC_01', 'わたし', 'tôi', '', 'n'),
(32, 'SC_01', 'わたしたち', 'chúng tôi, chúng ta', '', 'n'),
(33, 'SC_01', 'あなた', 'anh/ chị/ ông/ bà,', '', 'n'),
(34, 'SC_01', 'あのひと', 'người kia, người đó', 'あの人', 'n'),
(35, 'SC_01', 'あのかた', 'vị kia', 'あの方', 'n'),
(36, 'SC_01', 'みなさん', 'các anh chị, các ông bà, các bạn, quý vị', '皆さん', 'n'),
(37, 'SC_01', 'がくせい', 'học sinh, sinh viên', '学生', 'n'),
(38, 'SC_01', 'せんせい', 'thầy/ cô', '先生', 'n'),
(39, 'SC_01', 'かいしゃいん', 'nhân viên công ty', '会社員', 'n'),
(40, 'SC_01', 'ぎんこういん', 'nhân viên ngân hàng', '銀行員', 'n'),
(41, 'SC_01', 'いしゃ', 'bác sĩ', '医者', 'n'),
(42, 'SC_01', 'エンジニア', 'kỹ sư', '', 'n'),
(43, 'SC_01', 'だいがく', 'đại học, trường đại học', '大学', 'n'),
(44, 'SC_01', 'びょういん', 'bệnh viện', '病院', 'n'),
(45, 'SC_01', 'でんき', 'điện, đèn điện', '電気', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `sentence`
--

CREATE TABLE IF NOT EXISTS `sentence` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_hiragana` varchar(1000) NOT NULL,
  `s_romaji` varchar(1000) NOT NULL,
  `s_meaning` varchar(1000) NOT NULL,
  `s_kanji` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `sentence`
--

INSERT INTO `sentence` (`s_id`, `s_hiragana`, `s_romaji`, `s_meaning`, `s_kanji`) VALUES
(1, '資本の拡張', 'shihon no kakuchou', 'mở rộng vốn', '資本の拡張'),
(2, '研究の拡張', 'kenkyuu no kakuchou', 'sự mở rộng nghiên cứu', '研究の拡張'),
(3, '国際貿易の拡張', 'kokusaiboueki no kakuchou', 'sự mở rộng ngoại thương thế giới', '国際貿易の拡張'),
(4, '営業を拡張する', 'eigyou wo kakuchou suru', 'khuyếch trương việc kinh doanh', '営業を拡張する'),
(5, 'ごみ処分場を拡張する', 'gomi shoriba wo kakuchou suru', 'mở rộng các bãi xử lý rác thải', 'ごみ処分場を拡張する'),
(6, '国外からの投資を拡張させる必要性を認識する', 'gaikoku karano toshi wo kakuchou saseru hitsuyousei wo ninshiki suru', 'nhận thức được tính thiết yếu phải mở rộng đầu tư từ nước ngoài', '国外からの投資を拡張させる必要性を認識する'),
(7, '血管を拡張させる', 'kekkan wo kakuchou suru', 'mở rộng huyết quản', '血管を拡張させる'),
(8, '部屋に煙が漂っている', 'heya ni kemuri ga tadayotteiru', 'trong phòng đầy khói', '部屋に煙が漂っている'),
(9, '顔に満足そうな色が漂っている', 'kao ni manzoku souna iro ga tadayotteiru', 'vẻ thỏa mãn lộ ra mặt', '顔に満足そうな色が漂っている'),
(10, '木片は海に漂う', 'mokuhen ha umi ni tadayou', 'mảnh gỗ nổi lềnh bềnh trên mặt biển', '木片は海に漂う'),
(11, 'コンピューターを導入して事務の効率化を図る', 'konpyuutaa wo dounyuu shite jimu no kouritsuka wo hakaru', 'Đưa máy vi tính vào sử dụng để nâng cao hiệu suất công việc.', 'コンピューターを導入して事務の効率化を図る'),
(12, '西洋文化を導入する', 'seiyoubunka wo dounyuu suru', 'Giới thiệu văn hóa phương Tây', '西洋文化を導入する'),
(13, '彼女は問題を早く処理する', 'kanojo ha mondai wo hayaku shori suru', 'cô ta giải quyết vấn đề một cách nhanh nhẹn', '彼女は問題を早く処理する'),
(14, '話題の中心', 'wadai no chuushin', 'trung tâm của vấn đề', '話題の中心'),
(15, '彼女の家は宇都宮市の中心にある', 'kanojo no uchi ha Utsunomiya shi no chuushin ni aru', 'Nhà cô ấy ở trung tâm thành phố Utsunomiya.', '彼女の家は宇都宮市の中心にある'),
(16, 'ソフトウェアの不具合 はどこ？', 'sofutouea no fuguai ha doko', 'lỗi của phần mềm là ở đâu?', 'ソフトウェアの不具合 はどこ？'),
(17, 'システムを実現するため', 'shisutemu wo jitsugen suru tame', 'để thực hiện hệ thống ', 'システムを実現するため'),
(18, '私は水泳部の会員募集に応じた', 'watashi ha suieibu no kaiin boshuu ni oujita', 'Tôi đăng ký làm hội viên của câu lạc bộ bơi', '私は水泳部の会員募集に応じた'),
(19, '質問にはいつも応じますよ', 'shitsumon niha itsumo oujimasuyo', 'lúc nào tôi cũng sẵn sàng trả lời câu hỏi ', '質問にはいつも応じますよ'),
(20, 'この新製品は消費者の要求に応じたものだ', 'kono shinseihin ha shouhisha no youkyuu ni oujitamonoda', 'Sản phẩm mới này đáp ứng được yêu cầu của người tiêu dùng', 'この新製品は消費者の要求に応じたものだ'),
(21, 'すみませんが先約があってご招待には応じられません', 'sumimasen ga saki yaku ga atte goshoutai niha oujimasen', 'Xin lỗi, vì có hẹn trước nên tôi không thể nhận lời mời của anh được', 'すみませんが先約があってご招待には応じられません'),
(22, 'プログラム計算', 'puroguramu keisan', 'tính toán chương trình', 'プログラム計算'),
(23, '電卓で計算した', 'dentaku de keisan shita', 'tính bằng máy tính', '電卓で計算した'),
(24, '彼は売れたアルバムの数を計算した', 'kare ha ureta arubamu no kazu wo keisan shita', 'anh ta tính toán số album bán được', '彼は売れたアルバムの数を計算した'),
(25, '科学の分野', 'kagaku no bunya', 'lĩnh vực khoa học', '科学の分野'),
(26, 'その年の給与所得金額', 'sono toshi no kyuuyo shotoku kingaku', 'toàn bộ số tiền trợ cấp thất nghiệp trong năm nay', 'その年の給与所得金額'),
(27, 'すべての所得金額', 'subete no shotoku kingaku', 'toàn bộ số tiền thu nhập', 'すべての所得金額'),
(28, 'あまり多くない金額', 'amari ookunai kingaku', 'số tiền không nhiều lắm', 'あまり多くない金額'),
(29, '時間を　〜', 'jikan wo ~', 'giới hạn thời gian', '時間を　〜'),
(30, '卒業した後', 'sotsugyou shita ato', 'sau khi tốt nghiệp đại học', '卒業した後'),
(31, '大学入試合格おめでとう', 'daigakunyuudaigoukaku omedetou', 'Chúc mừng cậu đã thi đỗ đại học', '大学入試合格おめでとう'),
(32, '合格するかしないかは君の努力次第だ', 'goukaku suruka shinai ka ha kimi no nouryoku shidai da', 'Có trúng tuyển hay không là do sự nỗ lực của cậu', '合格するかしないかは君の努力次第だ'),
(33, '能力のある人:', 'nouryoku no aru hito', 'người có năng lực', '能力のある人:'),
(34, '大学で日本語を学んでいた', 'daigaku de nihongo wo manandeita', 'Học tiếng nhật ở trường đại học', '大学で日本語を学んでいた'),
(35, 'ばかげた仮定', 'bakageta katei', 'sự giả định vô lý', 'ばかげた仮定'),
(36, '法律上の仮定', 'houritsu ue no katei', 'sự giả định dựa trên pháp luật', '法律上の仮定'),
(37, 'ペットを欲しがっている家庭', 'betto wo kashigatte iru katei', 'gia đình muốn nuôi vật nuôi', 'ペットを欲しがっている家庭'),
(38, 'オリエンテーション課程', 'orienteeshyon katei', 'khóa hướng dẫn nhập môn', 'オリエンテーション課程'),
(39, 'テレビ課程', 'terebi katei', 'khóa đào tạo từ xa', 'テレビ課程'),
(40, '〜年の学修課程', '~nen no gakuri katei', 'khóa học diễn ra trong ~ năm', '〜年の学修課程'),
(41, '閉鎖される過程', 'heisa sareru katei', 'giai đoạn bị phong tỏa', '閉鎖される過程'),
(42, '私は約束の時間に遅れれるのが大嫌いです', 'watasshi ha yakusoku no jikan ni okureruno ga daikirai desu', 'Tôi rất ghét việc đến trễ hẹn.', '私は約束の時間に遅れれるのが大嫌いです'),
(43, '夕食の時間に遅れるよ', 'yushoku no jikan ni okureruyo', 'tôi sẽ về ăn cơm tối muộn', '夕食の時間に遅れるよ'),
(44, '彼は寂しそうです', 'kare ha sabishisou desu', 'anh ta trông có vẻ buồn', '彼は寂しそうです'),
(45, '彼の日本語は下手だ', 'kare no nihongo ha heta da', 'Tiếng nhật của anh ấy rất kém', '彼の日本語は下手だ'),
(46, '彼女は食事するのがへた', 'kanojo ha shokuji suru noga heta', 'Cô ấy nấu ăn rất dở', '彼女は食事するのがへた'),
(47, '問題は話し合いによって解決した方がいい', 'mondai ha hanashiai ni yotte kaiketsu shita hou ga ii', 'Các vấn đề nên giải quyết bằng đối thoại.', '問題は話し合いによって解決した方がいい'),
(48, '覚えるのが苦手だ', 'oboerunoga nigate da', 'Trí nhớ của tôi kém lắm', '覚えるのが苦手だ'),
(49, '（人）にお世辞を言うのが苦手だ', 'hoka no hito ni oseji wo iunoga nigate da', 'Nói nịnh người khác thì tôi kém lắm', '（人）にお世辞を言うのが苦手だ'),
(50, 'アメリカ大陸はコロンブスによって発見された。', 'amerika tairiku ha koronbusu niyotte hatsuken sareta', 'Châu Mỹ do Columbus phát hiện ra.', 'アメリカ大陸はコロンブスによって発見された。'),
(51, 'この法案は国会により承認された。', 'kono houan ha kokkai niyori shounin sareta', 'Dự luật này đã được quốc hội thông qua (thừa nhận).', 'この法案は国会により承認された。'),
(52, '不注意によって大事故が起こることもある。', 'fuchuui niyotte daijiko ga okorukoto mo aru', 'Có những tai nạn lớn xảy ra do thiếu chú ý.', '不注意によって大事故が起こることもある。'),
(53, '問題は話し合いによって解決した方がいい', 'mondai ha hanashiai ni yotte kaiketsu shita hou ga ii', 'Các vấn đề nên giải quyết bằng đối thoại.', '問題は話し合いによって解決した方がいい'),
(54, 'バスによる移動は便利だが時間がかかる', 'basu niyoru idou ha benrida ga jikan ga kakaru', 'Đi lại bằng xe bus thì tiện nhưng tốn thời gian.', 'バスによる移動は便利だが時間がかかる'),
(55, '習慣は国によって違う。', 'shuukan ha kuni niyotte chigau', 'Tập quán thì khác nhau theo từng nước.', '習慣は国によって違う。'),
(56, '努力したかどうかにより、成果も違うと思う', 'doryoku shitaka douka niyori, seika mo chigau to omou', 'Tôi nghĩ là tuỳ theo có nỗ lực hay không, kết quả cũng khác nhau.', '努力したかどうかにより、成果も違うと思う'),
(57, 'あした試験があるので、勉強しないわけにはいきません', 'ashita shiken ga arunode, benkyoushinai wake niha ikimasen', 'Vì ngày mai có bài thi nên không thể không học được', 'あした試験があるので、勉強しないわけにはいきません'),
(58, '家族がいるから、働かないわけにはいかない。', 'kazoku ga irukara, hatarakanaiwakenihaikanai', 'Vì có gia đình nên không đi làm không đượ', '家族がいるから、働かないわけにはいかない。'),
(59, '一人でやるのは大変ですが、みんな忙しそうなので、手伝ってもらうわけにもいきません', 'hitori de yarunoha taihen desuga, mina isogashisounanode, tetsudatte morauwakenihaikanai', 'Làm một mình thì khó khăn nhưng vì mọi người cũng đang bận rộn, nên không nhờ ai được.', '一人でやるのは大変ですが、みんな忙しそうなので、手伝ってもらうわけにもいきません'),
(60, '絶対にほかの人に言わないと約束したので、話すわけにはいかない。', 'zettaini hokanohito ni iwanaito yakusokushita node, hanasuwakenihaikanai', 'Vì đã hứa là tuyệt đối không nói với người khác nên không thể kể được.', '絶対にほかの人に言わないと約束したので、話すわけにはいかない。'),
(61, 'ジョンさんは、お母さんが日本人ですから、日本語が上手なわけです', 'jon san ha, okaasan ga nihonjin desukara, nohongo ga jouzuna wake desu', 'Anh John có mẹ là người Nhật nên tiếng Nhật giỏi là phải.', 'ジョンさんは、お母さんが日本人ですから、日本語が上手なわけです'),
(62, '５パーセントの値引きというと、１万円の物は 9500円になるわけですね。', '5 paasento no warihiki toiuto, 1manen no mono ha 9500 en ni naruwakeda', 'Nói là giảm 5% giá, tức là hàng 1 man thì còn 9500Y nhỉ.', '５パーセントの値引きというと、１万円の物は 9500円になるわけですね。'),
(63, '生活に困っているわけではないが、貯金する余裕はない。', 'seikatsu ni komatteiruwakedehanaiga, chokin suru  yoyuu ha nai', 'Cuộc sống không phải là khó khăn nhưng cũng không có dư ra để dành.', '生活に困っているわけではないが、貯金する余裕はない。'),
(64, '甘い物が嫌いなわけではありませんが、ダイエットしているんです。', 'amaimono ga kirainawake deha arimasenga, daietto shiteirundesu', 'Không phải tôi ghét đồ ngọt đâu nhưng mà đang ăn kiêng.', '甘い物が嫌いなわけではありませんが、ダイエットしているんです。'),
(65, 'そんな　たいへんな　仕事が　子どもに　できる　はずがありません', 'sonna taihenna shigotoga kodomo ni dekiru hazu ga arimasen', 'Công việc cực nhọc như vậy thì hiển nhiên là trẻ con không làm được.', 'そんな　たいへんな　仕事が　子どもに　できる　はずがありません'),
(66, '２さいの　子どもでも　できる　テストなら、おとなにむずかしい　はずが　ありません。', '2sai no kodomo demo dekiru tesutonara, otonani muzukashii hazu ga arimasen', 'Bài kiểm tra mà trẻ em 2 tuối cũng làm được thì chẳng khó khăn gì với người lớn là tất nhiên rồi.', '２さいの　子どもでも　できる　テストなら、おとなにむずかしい　はずが　ありません。'),
(67, 'あの人はいい人です。悪い人のはずがありません', 'ano hito ha ii hito desu. waruihito no hazu ga arimasen', 'Người ấy là người tốt. Không phải người xấu là chắc rồi.', 'あの人はいい人です。悪い人のはずがありません'),
(68, 'きょう、手紙を出せば、あしたそちらに着くはずです。', 'kyou, tegami wo daseba, ashita sochira ni tsuku hazuda', 'Hôm nay nếu gửi thư thì ngày mai chắc chắn sẽ đến bên đó.', 'きょう、手紙を出せば、あしたそちらに着くはずです。'),
(69, 'きょうは日曜日だから、会社は休みのはずです。', 'kyouha nichiyoubi dakara, kaisha ha yasumi no hazuda', 'Hôm nay chủ nhật, nên công ty nghỉ là hiển nhiên.', 'きょうは日曜日だから、会社は休みのはずです。'),
(70, '空が暗くなってきました。雨がふりそうです', 'sora ga kurakunattekimashita. ame ga furisou desu', 'Bầu trời sẫm tối dần. Trời có vẻ sắp mưa', '空が暗くなってきました。雨がふりそうです'),
(71, '小林さんはとてもいそがしそうです', 'Hayashi san ha totemo isogashisou desu', 'Mr. Hayashi có vẻ rất bận rộn hàng ngày', '小林さんはとてもいそがしそうです'),
(72, 'おいしそうなおかしですね', 'oishisouna okashi desune', 'Bánh kẹo trong ngon quá', 'おいしそうな　おかしですね'),
(73, '天気よほうによると、あしたは雨がふるそうです。', 'tenkiyohou niyoruto, ashita ha amega furusoudesu', 'Theo dự báo thời tiết,thì ngày mai trời mưa.', '天気よほうによると、あしたは雨がふるそうです。'),
(74, 'この本によると、あのレストランはあまり高くないそうです。', 'kono hon ni yoruto, ano resutoran ha amari takakunaisoudesu', ' Theo cuốn sách này thì nhà hàng đó không mắc.', 'この本によると、あのレストランはあまり高くないそうです。'),
(75, '激しい雨と風は、まるで台風が来たかのようだ。', 'hageshii ame to kazu ha marude taifuu ga kitaka no youda', 'Gió mưa dữ dội quá, như là bão về thật ấy.', '激しい雨と風は、まるで台風が来たかのようだ。'),
(76, '彼はそのことについては、何も知らないかのような顔をしている。', 'kra ha sonokoto ni tsuite ha nani mo shiranai ka noyouna kao wo shiteiru', 'Anh ta với vấn đề này thì ngoài mặt tỏ ra như là chả biết cái gì.', '彼はそのことについては、何も知らないかのような顔をしている。'),
(77, '１か月ぶりに会った彼は、病気だったかのようにやつれていた。', 'ikka getsu buri ni atta ato ha byouki dattakanoyouni yatsureteita', 'Sau một tháng không gặp mà anh ta tiều tuỵ như là vừa ốm dậy.', '１か月ぶりに会った彼は、病気だったかのようにやつれていた。'),
(78, 'いいにおいがします。だれかケーキをやいているようです。', 'ii nioi ga shimasu. dateka keeki wo yaiteiru youdesu', 'Nghe mùi thơm, hình như ai đó đang làm bánh.', 'いいにおいがします。だれかケーキをやいているようです。'),
(79, 'かれは野菜をぜんぜん食べませんね。野菜がきらいなようです。', 'kara ha yasai wo zenzen tabemasenne. yasai ga kirai na youdesu', 'Anh ta chẳng bao giờ ăn rau quả. CÓ vẻ anh ta ghét rau.', 'かれは野菜をぜんぜん食べませんね。野菜がきらいなようです。'),
(80, '冬なのに、あたたかくて、まるで春のようです。', 'fuyunanoni, atatakute, marude haru no you desu', 'Dù là mùa đông nhưng nhiệt độ ấm áp như mùa xuân.', '冬なのに、あたたかくて、まるで春のようです。'),
(81, '東京にあるホテルなのに、外国人が多くて、まるで 外国にいるようです。', 'tokyo ni aru hoteru nanoni, gaikokujin ga ookute, marude gaikoku ni iru you desu', 'Mặc dù là khách sạn ở Tokyo nhưng người nước ngoài nhiều giống như ở nước ngòai vậy.', '東京にあるホテルなのに、外国人が多くて、まるで 外国にいるようです。'),
(82, 'その歌を歌うたび、幼い日のことを思い出す。', 'sono uta wo utautabi, onasai hi no koto wo omoidasu', 'Mỗi lần nghe bài hát đó, tôi lại nhớ về những ngày thơ ấu', 'その歌を歌うたび、幼い日のことを思い出す。'),
(83, '私は旅行のたびに、絵葉書を買います。', 'watashi ha ryokou no tabini, ehagaki wo kaimasu', 'Tôi mỗi lần đi du lịch đều mua bưu ảnh.', '私は旅行のたびに、絵葉書を買います。'),
(84, '言うべきことは遠慮しないではっきり言ったほうがいい。', 'iubebi koto ha enryo shinade hakkari itita hou ga ii', 'Những điều nên nói thì nên không ngại ngần nói rõ ràng ra.', '言うべきことは遠慮しないではっきり言ったほうがいい。'),
(85, '若いうちに、外国語を勉強しておくべきだった。', 'wakai uchini, gaikokugo wo benkyou shite oku bekida', 'Khi còn trẻ nên học ngoại ngữ trước.', '若いうちに、外国語を勉強しておくべきだった。'),
(86, '先生のお宅に、こんな夜中に電話するべきではない。', 'sensei no otaku ni, konna yonaka ni denwa suru beki deha nai', 'Không nên điện thoại đến nhà thầy lúc nửa đêm thế này.', '先生のお宅に、こんな夜中に電話するべきではない。'),
(87, '留学するとしたら、日本に行きたいと思っていました。', 'ryuugaku suruto shitara, nihon ni ikitai ti omotteiu', 'Nếu mà đi du học, tôi đã định đi Nhật', '留学するとしたら、日本に行きたいと思っていました。'),
(88, '予定どおりだとすれば、飛行機は 9時に着くはずだ。', 'yotei doori dato sureba, hikouki ha 9 ji ni tsuku hazu da', 'Nếu mà như kế hoạch thì máy bay phải đến lúc 9h rồi.', '予定どおりだとすれば、飛行機は 9時に着くはずだ。'),
(89, '息子の部屋の汚いことといったら、ひどいものです。', 'musuko no heya no kitanai koto to ittara, hidoi mono desu', 'Về độ bẩn của phòng con giai tôi thì rất kinh khủng.', '息子の部屋の汚いことといったら、ひどいものです。'),
(90, 'その景色の美しさといったら、口で言い表せないほどです。', 'sono keishiki no utsukushisa to ittara, guchi de iiarawasenai hodo desu', 'Nói về cái đẹp của cảnh sắc ở đấy thì chả lời nào tả được.', 'その景色の美しさといったら、口で言い表せないほどです。'),
(91, '最近の若者ときたら、礼儀も知らない。 ', 'saikin no wakamono tokitara, reishiki mo shiranai', 'Giới trẻ gần đây thì lễ nghi cũng không biết.', '最近の若者ときたら、礼儀も知らない。 '),
(92, 'うちの子ときたら、朝から晩までテレビゲームをしている。 ', 'uchi no ko tokitara, asa kara yoru made terebigemu wo shiteiru', 'Con tôi thì từ sáng đến tối khuya toàn chơi điện tử.', 'うちの子ときたら、朝から晩までテレビゲームをしている。 '),
(93, '弁護士になると決めた上は、苦しくても頑張らなければならない。', 'bengoshi ni naruto kimeta ue ha, kurushikutemo ganbaranakereba naranai', 'Đã quyết định thành luật sư thì dù là có gian khó cũng cần phải cố gắng.', '弁護士になると決めた上は、苦しくても頑張らなければならない。'),
(94, '友人が困っているのを知った上は、黙って見ていられない。', 'tomodachi ga komatteiruno wo shitta ue ha , damatte miteirarenai', 'Đã biết bạn bè khó khăn thì không thể đứng im nhìn được.', '友人が困っているのを知った上は、黙って見ていられない。'),
(95, '計画が中止になった。こうなった上は、プロジェクトチームは解散するしかない。', 'keikaku ga chuushi ni natta, kounatta ue ha porujekkutochiimu ha kaisan shikanai', 'Kế hoạch tạm dừng rồi. Với tình hình này thì chỉ có nước giải tán đội dự án thôi.', '計画が中止になった。こうなった上は、プロジェクトチームは解散するしかない。'),
(96, 'あの人に頼んだところで、どうにもならないでしょう。 ', 'ano hito ni tanondatokoro de, dounimoranai deshou', 'Dù nhờ anh ta cũng chẳng giải quyết được gì đâu.', 'あの人に頼んだところで、どうにもならないでしょう。 '),
(97, '急いで行ったところで、もう間に合わない', 'kyu de itta tokorode, mou maniawanai', 'Nếu có đi gấp cũng chẳng kịp.', '急いで行ったところで、もう間に合わない'),
(98, '私がアドバイスしたところで、彼は聞かないだろう。 ', 'watashi ga adobaisu shitatokoro de, kare ha kikanai darou', 'Dù tôi có khuyên thì anh ta chắc cũng không nghe.', '私がアドバイスしたところで、彼は聞かないだろう。 '),
(99, '新しいワープロを使ってみたところ、とても使いやすかった。', 'atarashi wapuro wo tsukatte mitatokoro, totemo tsukaiyasukatta', 'Thử dùng cái máy tính mới xong mới biết là nó dễ sử dụng thế.', '新しいワープロを使ってみたところ、とても使いやすかった。'),
(100, 'うそをついたばかりに恋人に嫌われてしまった', 'uso wo tsuitabakari ni koibito ni kirawareteshimatta', 'Chỉ tại nói dối mà bị người yêu ghét/giận.', 'うそをついたばかりに恋人に嫌われてしまった'),
(101, 'お金がないばかりに大学に進学できなかった。', 'okane ga nai bakarini daigaku ni shingaku dekinakatta', 'Chỉ vì thiếu tiền mà không học lên đại học được.', 'お金がないばかりに大学に進学できなかった。'),
(102, '日本語が下手なばかりに、いいアルバイトが探せません。', 'nihongo ga hetana bakarini, iiarubaito ga sagasemasen', 'Chỉ tại kém tiếng Nhật nên không tìm được việc làm thêm tốt.', '日本語が下手なばかりに、いいアルバイトが探せません。'),
(103, '彼はサッカーばかりでなく、水泳もダンスも上手なんですよ。', 'kare ha sakka bakaridenaku, suiei mo dansu mo jouzu nandesuyo', 'Anh ấy không chỉ bóng đá mà còn bơi, nhảy đều giỏi.', '彼はサッカーばかりでなく、水泳もダンスも上手なんですよ。'),
(104, '林さんのお宅でごちそうになったばかりか、おみやげまでいただいた。', 'Hayashi san no taku de gochisou ni nattabakarika, omiyage made itadaita', 'Ở nhà anh Hayashi, không chỉ được ăn ngon mà còn có cả quà mang về nữa.', '林さんのお宅でごちそうになったばかりか、おみやげまでいただいた。'),
(105, 'アンナさんは頭がいいばかりでなく、親切で心の優しい人です。', 'anna san ha atama ga iibakaridenaku, shinsetsu de kokoro no yasashii hito desu', 'Cô Ana không chỉ thông minh, lại là người chu đáo, dịu dàng.', 'アンナさんは頭がいいばかりでなく、親切で心の優しい人です。');

-- --------------------------------------------------------

--
-- Table structure for table `sourcefile`
--

CREATE TABLE IF NOT EXISTS `sourcefile` (
  `sourcefile_id` varchar(100) NOT NULL,
  `lis_id` int(11) DEFAULT NULL,
  `sourcefile_question` varchar(5000) NOT NULL,
  `sourcefile_script` varchar(5000) NOT NULL,
  `sourcefile_meaning` varchar(5000) NOT NULL,
  `sourcefile_answer` varchar(100) NOT NULL,
  PRIMARY KEY (`sourcefile_id`),
  KEY `lis_id` (`lis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sourcefile`
--

INSERT INTO `sourcefile` (`sourcefile_id`, `lis_id`, `sourcefile_question`, `sourcefile_script`, `sourcefile_meaning`, `sourcefile_answer`) VALUES
('N2N3BAI1PHAN1', 1, '女の人の息子がかいた絵はどれですか。\r\n\r\n    a)キーワード下の大きい四角、この三角は。本当は丸いんだけどね。\r\n\r\n   b)本当は丸いんだけどね.\r\n\r\n   c)マスクのつもりなのよ。\r\n\r\n   d)髪のリボンがかわいいでしょ.', '女：息子が幼稚園でかいてきたんだけど、これが私の顔だって。\r\n\r\n男：ふーん、下の大きい四角、それは何。\r\n\r\n女：これはね、マスクのつもりなのよ。\r\n\r\n男：じゃ、この三角は。\r\n\r\n女：これはめがねなの、本当は丸いんだけどね。髪のリボンがかわいいでしょ。', 'F: Cái này con trai tôi vẽ ở trường mẫu giáo đấy, nghe nói là cái mặt của tôi.\r\n\r\nM: Phù, cái hình tứ giác to nằm bên dưới là cái gì vậy?\r\n\r\nF: Cái này hả, định là cái khẩu trang đấy.\r\n\r\nM: Vậy thì cái tam giác này là.\r\n\r\nF: Cái này là mắt kính đấy, thiệt ra thì là hình tròn nhưng mà...Còn cái nơ cột tóc dễ thương hén.', 'A'),
('N2N3BAI1PHAN2', 1, '男の人の先輩はどの人ですか.\r\n\r\na)顔は細長くて額が広い・・・。\r\n\r\nb)額が広いから目立つらしんだけど。\r\n\r\nc)どんな人か聞い.\r\n\r\nd)先輩には一度も会った事がないんだ。', '女：どうしたの、心配そうな顔して。\r\n\r\n男：うん、今から先輩の会社を訪問するんだけど、分かるかなあ、先輩には一度も会った事がないんだ。\r\n\r\n女：どんな人か聞いてないの。\r\n\r\n男：顔は、細長くて額が広い・・・。とにかく額が広いから目立つらしんだけど。\r\n', 'Phụ nữ: Chuyện gì vậy, mặt trông có vẻ lo lắng.\r\n\r\nĐàn ông: Ừ, giờ đi thăm công ty của đàn anh đấy, chắc hiểu chứ gì, chưa từng gặp đàn anh dù chỉ một lần.\r\n\r\nPhụ nữ: Người như thế nào, không hỏi à?\r\n\r\nĐàn ông: Mặt thì thon dài, trán rộng...Dù sao thì vì trán rộng nên chắc cũng nổi bật dễ nhận biết.\r\n', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` varchar(20) NOT NULL,
  `test_category` varchar(50) NOT NULL,
  `test_level` varchar(10) NOT NULL,
  `test_content` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_category`, `test_level`, `test_content`) VALUES
('N4_Bunpou_001', 'Grammar', 'N4', ''),
('N4_Bunpou_002', 'Grammar', 'N4', ''),
('N4_Bunpou_003', 'Grammar', 'N4', ''),
('N4_Bunpou_004', 'Grammar', 'N4', ''),
('N4_Bunpou_005', 'Grammar', 'N4', ''),
('N4_Choukai_001', 'Listening', 'N4', 'N4Choukai1.mp3'),
('N4_Choukai_002', 'Listening', 'N4', 'N4Choukai2.mp3'),
('N4_Choukai_003', 'Listening', 'N4', 'N4Choukai3.mp3'),
('N4_Choukai_004', 'Listening', 'N4', 'N4Choukai4.mp3'),
('N4_Choukai_005', 'Listening', 'N4', 'N4Choukai5.mp3'),
('N4_Dokkai_001', 'Reading', 'N4', '（1）きょうはあさから　おなかがいたいです。きのう　たべたものがわるかったのです。いまから　びょういんに　行きます。（2）らいしゅうのきんよう日にパーテイーをします。パーテイーに来るひとは二日までに　このはこに　おかねを　入れてください（3）わたしのちちはことし60さいです。わかいときからだがよわくてよくかいしゃを　やすみました。（4）しかし　いまはまいにちあさ　はやくからよる　おそうまではたらきます。(5)かばんがほしいですか。'),
('N4_Dokkai_002', 'Reading', 'N4', '（1）きょうはあさから　おなかがいたいです。きのう　たべたものがわるかったのです。いまから　びょういんに　行きます。（2）らいしゅうのきんよう日にパーテイーをします。パーテイーに来るひとは二日までに　このはこに　おかねを　入れてください（3）わたしのちちはことし60さいです。わかいときからだがよわくてよくかいしゃを　やすみました。（4）しかし　いまはまいにちあさ　はやくからよる　おそうまではたらきます。(5)かばんがほしいですか。'),
('N4_Dokkai_003', 'Reading', 'N4', '（1）きょうはあさから　おなかがいたいです。きのう　たべたものがわるかったのです。いまから　びょういんに　行きます。（2）らいしゅうのきんよう日にパーテイーをします。パーテイーに来るひとは二日までに　このはこに　おかねを　入れてください（3）わたしのちちはことし60さいです。わかいときからだがよわくてよくかいしゃを　やすみました。（4）しかし　いまはまいにちあさ　はやくからよる　おそうまではたらきます。(5)かばんがほしいですか。'),
('N4_Dokkai_004', 'Reading', 'N4', '（1）きょうはあさから　おなかがいたいです。きのう　たべたものがわるかったのです。いまから　びょういんに　行きます。（2）らいしゅうのきんよう日にパーテイーをします。パーテイーに来るひとは二日までに　このはこに　おかねを　入れてください（3）わたしのちちはことし60さいです。わかいときからだがよわくてよくかいしゃを　やすみました。（4）しかし　いまはまいにちあさ　はやくからよる　おそうまではたらきます。(5)かばんがほしいですか。'),
('N4_Dokkai_005', 'Reading', 'N4', '（1）きょうはあさから　おなかがいたいです。きのう　たべたものがわるかったのです。いまから　びょういんに　行きます。（2）らいしゅうのきんよう日にパーテイーをします。パーテイーに来るひとは二日までに　このはこに　おかねを　入れてください（3）わたしのちちはことし60さいです。わかいときからだがよわくてよくかいしゃを　やすみました。（4）しかし　いまはまいにちあさ　はやくからよる　おそうまではたらきます。(5)かばんがほしいですか。'),
('N4_Moji_001', 'Vocabulary', 'N4', ''),
('N4_Moji_002', 'Vocabulary', 'N4', ''),
('N4_Moji_003', 'Vocabulary', 'N4', ''),
('N4_Moji_004', 'Vocabulary', 'N4', ''),
('N4_Moji_005', 'Vocabulary', 'N4', '');

-- --------------------------------------------------------

--
-- Table structure for table `trackingmark`
--

CREATE TABLE IF NOT EXISTS `trackingmark` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `test_id` varchar(20) DEFAULT NULL,
  `tm_mark` int(11) DEFAULT NULL,
  `tm_date` date DEFAULT NULL,
  PRIMARY KEY (`tm_id`),
  KEY `u_id` (`u_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trackingmark`
--

INSERT INTO `trackingmark` (`tm_id`, `u_id`, `test_id`, `tm_mark`, `tm_date`) VALUES
(1, 2, 'N4_Moji_001', 2, '2014-08-04'),
(2, 2, 'N4_Moji_001', 2, '2014-08-04'),
(3, 2, 'N4_Dokkai_001', 2, '2014-08-04'),
(4, 2, 'N4_Bunpou_001', 3, '2014-08-04'),
(5, 2, 'N4_Bunpou_001', 1, '2014-08-04'),
(6, 2, 'N4_Choukai_001', 0, '2014-08-04'),
(7, 2, 'N4_Moji_001', 1, '2014-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `traininglistening`
--

CREATE TABLE IF NOT EXISTS `traininglistening` (
  `lis_id` int(11) NOT NULL AUTO_INCREMENT,
  `lis_title` varchar(500) NOT NULL,
  `lis_level` varchar(10) NOT NULL,
  PRIMARY KEY (`lis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `traininglistening`
--

INSERT INTO `traininglistening` (`lis_id`, `lis_title`, `lis_level`) VALUES
(1, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P1', 'N2N3'),
(2, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P2', 'N2N3'),
(3, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P3', 'N2N3'),
(4, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P4', 'N2N3'),
(5, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P5', 'N2N3'),
(6, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P1', 'N4N5'),
(7, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P2', 'N4N5'),
(8, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P3', 'N4N5'),
(9, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P4', 'N4N5'),
(10, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P5', 'N4N5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(32) NOT NULL,
  `u_password` varchar(32) NOT NULL,
  `u_role` int(11) DEFAULT NULL,
  `u_fullname` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_registerdate` date DEFAULT NULL,
  `u_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_username` (`u_username`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_password`, `u_role`, `u_fullname`, `u_email`, `u_registerdate`, `u_status`) VALUES
(1, 'datpt1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Phạm Tiến Đạt', 'datptse02338@fpt.edu.vn', '2014-08-03', 1),
(2, 'datpham', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'Phạm Tiến Đạt', 'datptse02336@fpt.edu.vn', '2014-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vi_id` int(11) NOT NULL AUTO_INCREMENT,
  `vi_title` varchar(200) NOT NULL,
  `vi_link` varchar(200) NOT NULL,
  PRIMARY KEY (`vi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vi_id`, `vi_title`, `vi_link`) VALUES
(1, 'Doraemon [Ep 030] Tôi Yêu Roboko-chan & Thuốc Cá Nhân Hóa Âm', '//www.youtube.com/embed/2ZLzzu9AhfY'),
(2, 'Vẽ bậy lên mặt Doraemon - Cỗ máy thời gian biến mất rồi - Hoạt hình Doraemon', '//www.youtube.com/embed/gOue0oKF3IM'),
(3, 'Trồng ớt xanh trên gác xép - Hoạt hình Doraemon', '//www.youtube.com/embed/5Hzv84neJOw');

-- --------------------------------------------------------

--
-- Table structure for table `vocabulary`
--

CREATE TABLE IF NOT EXISTS `vocabulary` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_hiragana` varchar(200) NOT NULL,
  `v_romaji` varchar(200) NOT NULL,
  `v_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `vocabulary`
--

INSERT INTO `vocabulary` (`v_id`, `v_hiragana`, `v_romaji`, `v_status`) VALUES
(1, 'ふぐあい', 'fuguai', 1),
(2, 'かくちょう', 'kakuchou', 1),
(3, 'ただよう', 'tadayou', 1),
(4, 'どうにゅう', 'dounyuu', 1),
(5, 'しょり', 'shori', 1),
(6, 'ちゅうしん', 'chuushin', 1),
(7, 'じつげん', 'jutsugen', 1),
(8, 'おうじる', 'oujiru', 1),
(9, 'けいさん', 'keisan', 1),
(10, 'ぶんや', 'bunya', 1),
(11, 'きんがく', 'kingaku', 1),
(12, 'げんてい', 'gentei', 1),
(13, 'そつぎょう', 'sotsugyou', 1),
(14, 'ごうかく', 'goukaku', 1),
(15, 'のうりょく', 'nouryoku', 1),
(16, 'まなぶ', 'manabu', 1),
(17, 'かてい', 'katei', 1),
(18, 'おくれる', 'okureru', 1),
(19, 'さびしい', 'sabishii', 1),
(20, 'へた', 'heta', 1),
(21, 'にがて', 'nigate', 1),
(22, 'きょくせん', 'kyokusen', 1),
(23, 'さいじょうひん', 'saijouhin', 1),
(24, 'はさんにん', 'hasannin', 1),
(25, 'ごけいぼうえき ', 'gokeiboueki', 1),
(26, 'じしょう', 'jijou', 1),
(27, 'にげん', 'nigen', 1),
(28, 'にじゅうか ', 'nijuuka', 1),
(29, 'しよう ', 'shiyou', 1),
(30, 'かくにん', 'kakunin', 1),
(31, 'かくにんしけん', 'kakuninshiken', 1),
(32, 'ようけん', 'youken', 1),
(33, 'ようきゅう', 'youkyuu', 1),
(34, 'ようそがた', 'yousogata', 1),
(35, 'みだしご ', 'midashigo', 1),
(36, 'かいとう ', 'kaitou', 1),
(37, 'いせい ', 'isei', 1),
(38, 'きごう', 'kigou', 1),
(39, 'しょうけん', 'shouken', 1),
(40, 'ひょうか', 'hyouka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vocabularysentence`
--

CREATE TABLE IF NOT EXISTS `vocabularysentence` (
  `m_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocabularysentence`
--

INSERT INTO `vocabularysentence` (`m_id`, `s_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 10),
(8, 11),
(8, 12),
(10, 13),
(11, 14),
(11, 15),
(1, 16),
(14, 17),
(15, 18),
(16, 19),
(16, 20),
(17, 21),
(19, 22),
(20, 23),
(20, 24),
(21, 25),
(22, 26),
(22, 27),
(22, 28),
(23, 29),
(25, 30),
(26, 31),
(27, 32),
(28, 33),
(29, 34),
(30, 35),
(30, 36),
(31, 37),
(32, 38),
(32, 39),
(32, 40),
(33, 41),
(34, 42),
(34, 43),
(35, 44),
(36, 45),
(36, 46),
(37, 48),
(37, 49);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversationcontent`
--
ALTER TABLE `conversationcontent`
  ADD CONSTRAINT `conversationcontent_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `conversation` (`c_id`);

--
-- Constraints for table `grammarsentence`
--
ALTER TABLE `grammarsentence`
  ADD CONSTRAINT `grammarsentence_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `grammar` (`g_id`),
  ADD CONSTRAINT `grammarsentence_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sentence` (`s_id`);

--
-- Constraints for table `meaning`
--
ALTER TABLE `meaning`
  ADD CONSTRAINT `meaning_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vocabulary` (`v_id`);

--
-- Constraints for table `sourcefile`
--
ALTER TABLE `sourcefile`
  ADD CONSTRAINT `sourcefile_ibfk_1` FOREIGN KEY (`lis_id`) REFERENCES `traininglistening` (`lis_id`);

--
-- Constraints for table `trackingmark`
--
ALTER TABLE `trackingmark`
  ADD CONSTRAINT `trackingmark_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `trackingmark_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `vocabularysentence`
--
ALTER TABLE `vocabularysentence`
  ADD CONSTRAINT `vocabularysentence_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `meaning` (`m_id`),
  ADD CONSTRAINT `vocabularysentence_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sentence` (`s_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
