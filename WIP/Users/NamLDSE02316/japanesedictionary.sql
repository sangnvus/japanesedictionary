-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2014 at 05:28 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
(40, 10, 'どんな', 0);

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
  `c_level` varchar(10) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  `c_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`c_id`, `c_level`, `c_title`, `c_image`) VALUES
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
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `conversationcontent`
--

INSERT INTO `conversationcontent` (`con_id`, `c_id`, `con_title`, `con_hiragana`, `con_romaji`, `con_meaning`) VALUES
(1, 'SC_01', 'Hỏi đồ vật', 'A:　え～、どれ？これ？\r\n\r\nB: 　うん。それ。', 'A: E~, dore? kore?\r\n\r\nB: un. sore.', 'A:　Này, cái nào? Cái này à?\r\n\r\nB:　Ừ. Cái đó.'),
(2, 'SC_01', 'Xác nhận thông tin', 'A:　そう？\r\n\r\nB: 　そう。', 'A: Sou?\r\n\r\nB: Sou.', 'A:　Vậy à?\r\n\r\nB:　Đúng vậy.'),
(3, 'SC_01', 'Thể hiện sự đồng ý.', 'A:　おいしい？\r\n\r\nB:　うん。おいしいよ。', 'A: Oishii?\r\n\r\nB: un. oishiyo.', 'A:　Ngon không?\r\n\r\nB:　Ừ. Ngon lắm.'),
(4, 'SC_02', 'Giới thiệu về bản thân', 'A:　はじめまして。渡辺です。\r\n\r\nB:　田中です。どうぞよろしく。', 'A : Hajimemashite. Wantanabe desu.\r\n\r\nB: Tanaka desu. Douzo yoroshiku.', 'A:　Xin chào. Tôi là Watanabe.\r\n\r\nB:　Tôi là Tanaka. Xin nhờ anh giúp đỡ.'),
(5, 'SC_02', 'Hỏi họ là ai?', 'A:　鈴木さんですか？\r\n\r\nB: 　はい、そうです。', 'A: Suzukisan desuka?\r\n\r\nB: Hai,so desu.', 'A:　Anh Suzuki phải không?\r\n\r\nB:　Phải, đúng vậy.'),
(6, 'SC_02', 'Hỏi cái này là gì?', 'A:　それはなんですか？\r\n\r\nB:　デジカメです。', 'A: Sore wa nan desuka?\r\n\r\nB: Dejikamedesu.', 'A:　Cái đó là gì vậy?\r\n\r\nB:　Là máy ảnh kỹ thuật số.'),
(7, 'TC1_01', 'Đề nghị làm gì.', 'A：雨降ってきそうだよ。傘持ってったら？\r\n\r\nB：いいよ、めんどくさいし。\r\n\r\nA：ほら、折りたたみだから。\r\n\r\nB：いい、いい。そんなにどしゃぶりにはならないでしょ。', 'A: Amefuri tte ki-sōda yo. Kasa motte ttara? \r\n\r\nB: ii yo, mendokusaishi. \r\n\r\nA: Hora, oritatamidakara. B: \r\nĪ, ī. Son''nanidoshaburinihanaranaidesho', 'A:　Trời chuyển mưa rồi đó. Hay là mang theo cái ô đi?\r\n\r\nB:　Thôi được rồi, phiền phức lắm.\r\n\r\nA:　Đây nè, cái này gấp lại được mà.\r\n\r\nB:　Được rồi mà. Chắc trời không mưa to như trút thế đâu.'),
(8, 'TC1_01', 'Đánh giá tích cực về điều gì đó.', 'A：さすが、一流ホテルだけのことはあるね。\r\n\r\nB：何感心してんの？\r\n\r\nA：見てよ。あのシャンデリアの大きさ！\r\n\r\nB：本当！直径５メートルはあるね。', 'A: Sasuga, ichiryū hoteru dake no koto wa aru ne.\r\n\r\nB: Nan kanshin shi ten no? \r\n\r\nA: Mite yo. Ano shanderia no ōki-sa! \r\n\r\nB: Hontō! Chokkei 5 mētoru wa aru ne.', 'A:　Quả đúng là khách sạn hạng sang có khác ha.\r\n\r\nB:　Anh thán phục về điều gì?\r\n\r\nA:　Em nhìn kìa, ngọn đèn chùm kia to chưa kìa.\r\n\r\nB:　Ờ ha, đường kính của nó chắc cũng 5m ấy chứ.'),
(9, 'TC1_01', 'Cách nói mệnh lệnh', 'A：ぐずぐずしてないでさっさと出かけなさい。\r\n\r\nB：ちょっとおなかが痛くて…。\r\n\r\nA：大丈夫。いつもどおりテストが終われば、すぐ治るから。\r\n\r\nB：違うってば～。今日は本当に痛いんだよ。', 'A: Guzuguzu shitenaide sassato dekake nasai. \r\n\r\nB: Chotto onaka ga itakute…. \r\n\r\nA: Daijōbu. Itsumo dōri tesuto ga owareba, sugu naorukara. \r\n\r\nB: Chigau tteba ~. Kyō wa hontōni itai nda yo.', 'A:　Đừng lề mề nữa, khẩn trương đi học đi con.\r\n\r\nB:　Bụng con nó đau...\r\n\r\nA:　Không sao đâu, làm bài kiểm tra xong là khỏi ngay như mọi khi ấy mà.\r\n\r\nB:　Không phải đâu mẹ. Bữa nay con đau thiệt đó.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(10, 'N4_Dokkai_001', '門（5）かばんがほしいですか  ');

-- --------------------------------------------------------

--
-- Table structure for table `readingarticle`
--

CREATE TABLE IF NOT EXISTS `readingarticle` (
  `readingarticle_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_id` varchar(20) DEFAULT NULL,
  `readingarticle_content` varchar(5000) DEFAULT NULL,
  `readingarticle_question` varchar(5000) DEFAULT NULL,
  `readingarticle_answer` varchar(50) DEFAULT NULL,
  `reading_type` varchar(50) NOT NULL,
  PRIMARY KEY (`readingarticle_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trackingmark`
--

INSERT INTO `trackingmark` (`tm_id`, `u_id`, `test_id`, `tm_mark`, `tm_date`) VALUES
(1, 2, 'N4_Moji_001', 2, '2014-08-04'),
(2, 2, 'N4_Moji_001', 2, '2014-08-04'),
(3, 2, 'N4_Dokkai_001', 2, '2014-08-04');

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
(1, 'datpt1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Phạm Tiến Đạt', 'datptse02336@fpt.edu.vn', '2014-08-03', 1),
(2, 'datpham', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'Phạm Tiến Đạt', 'datptse02337@fpt.edu.vn', '2014-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vi_id` int(11) NOT NULL AUTO_INCREMENT,
  `vi_title` varchar(200) NOT NULL,
  `vi_link` varchar(200) NOT NULL,
  PRIMARY KEY (`vi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
