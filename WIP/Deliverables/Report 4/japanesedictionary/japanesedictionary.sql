-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2014 at 01:31 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer_content`, `answer_correct`) VALUES
(1, 1, 'に', 1),
(2, 1, 'の', 0),
(3, 1, 'で', 0),
(4, 1, 'を', 0),
(5, 2, 'が', 1),
(6, 2, 'の', 0),
(7, 2, 'か', 0),
(8, 2, 'を', 0),
(9, 3, 'と', 0),
(10, 3, 'に', 1),
(11, 3, 'を', 0),
(12, 3, 'や', 0),
(13, 4, 'か', 0),
(14, 4, 'の', 0),
(15, 4, 'が', 1),
(16, 4, 'で', 0),
(17, 5, 'でも', 0),
(18, 5, 'ばかり', 1),
(19, 5, 'しか', 0),
(20, 5, 'ぐらい', 0),
(21, 6, 'へ', 0),
(22, 6, 'で', 0),
(23, 6, 'に', 0),
(24, 6, 'を', 1),
(25, 7, 'で', 0),
(26, 7, 'に', 1),
(27, 7, 'を', 0),
(28, 7, 'へ', 0),
(29, 8, 'だけ', 1),
(30, 8, 'も', 0),
(31, 8, 'しか', 0),
(32, 8, 'でも', 0),
(33, 9, 'ばかり', 0),
(34, 9, 'まで', 0),
(35, 9, 'ばかりに', 0),
(36, 9, 'までに', 1),
(37, 10, 'でも', 1),
(38, 10, 'にも', 0),
(39, 10, 'がも', 0),
(40, 10, 'からも', 0),
(41, 11, 'きめなかったんです', 0),
(42, 11, 'きめないんです', 1),
(43, 11, 'きめていないんです', 0),
(44, 11, 'きめないと思うんです', 0),
(45, 12, '何をしたことがありますか', 1),
(46, 12, 'どんなことをするでしょう', 0),
(47, 12, 'どんなことをしましたか', 0),
(48, 12, '何をすると思いますか', 0),
(49, 13, 'おくれても', 0),
(50, 13, 'おくれないで', 0),
(51, 13, 'おくれるように', 0),
(52, 13, 'おくれると', 1),
(53, 14, 'それはいいですね', 1),
(54, 14, 'あれがいいですね', 0),
(55, 14, 'それはたいへんですね', 0),
(56, 14, 'あれがたいへんですね', 0),
(57, 15, '神社までできるだけはやく走る。', 0),
(58, 15, '白い服を着てから水をあびる。', 1),
(59, 15, '走る前にみんなで飲んだり食べたりする。', 0),
(60, 15, 'ねないで野菜料理をたくさん作る。', 0),
(61, 16, 'じんじゃに集った子どもが大人といっしょにおどる。', 1),
(62, 16, '歌やおどりが上手な子どもがえらばれる。', 0),
(63, 16, '町じゅうの子どもが歌やおどりをれんしゅうする。', 0),
(64, 16, 'えらばれた子どもが歌ったりおどったりする。', 0),
(65, 17, 'この町の女の子を強くするおまつり。', 0),
(66, 17, 'こめや野菜ができたことをよろこぶおつまり。', 0),
(67, 17, '子どもの歌やおどりを上手にするためのおまつり。', 0),
(68, 17, 'みんなで特別な野菜料理を食べるためのおまつり。', 0),
(69, 18, 'かいがん', 0),
(70, 18, 'こうどう', 0),
(71, 18, 'かいじょう', 1),
(72, 18, 'こうじょう', 0),
(73, 19, 'きかい', 1),
(74, 19, 'きそく', 0),
(75, 19, 'きぶん', 0),
(76, 19, 'きんじょ', 0),
(77, 20, 'かたづけなかった', 0),
(78, 20, 'とりかえなかった', 0),
(79, 20, 'きをつけなかった', 1),
(80, 20, 'やくにたたなかった', 0),
(81, 21, 'スクリーン', 0),
(82, 21, 'ワープロ', 0),
(83, 21, 'レポート', 1),
(84, 21, 'レジ', 0),
(85, 22, 'さっき', 0),
(86, 22, 'ちっとも', 0),
(87, 22, 'もうすぐ', 0),
(88, 22, 'ほとんど', 1),
(89, 23, 'いか', 0),
(90, 23, 'いがい', 1),
(91, 23, 'いせん', 0),
(92, 23, 'いっばい', 0),
(93, 24, 'あの', 0),
(94, 24, 'おや', 1),
(95, 24, 'そう', 0),
(96, 24, 'はい', 0),
(97, 25, 'うえましょう', 0),
(98, 25, 'かえましょう', 0),
(99, 25, 'きりましょう', 0),
(100, 25, 'とりましょう', 1),
(101, 26, 'にがかった', 1),
(102, 26, 'ねむかった', 0),
(103, 26, 'はずかしかった', 0),
(104, 26, 'よろしかった', 0),
(105, 27, 'おれて', 0),
(106, 27, 'こわれてた', 1),
(107, 27, 'おれて', 0),
(108, 27, 'やぶれて', 0),
(109, 28, '自動車', 1),
(110, 28, '自転車', 0),
(111, 28, '歩く', 0),
(112, 28, 'バス', 0),
(113, 29, 'ジョギング', 1),
(114, 29, '泳ぐ', 0),
(115, 29, 'テニス', 0),
(116, 29, 'サッカー', 1),
(117, 30, '何を 買いましたか？', 0),
(118, 30, 'ストッキング', 0),
(119, 30, 'ネクタイ', 0),
(120, 30, 'シャツ', 1),
(121, 31, 'いい', 0),
(122, 31, '雨が ふる', 0),
(123, 31, '太陽', 1),
(124, 31, '寒い', 0),
(125, 32, '月曜日', 0),
(126, 32, '火曜日', 0),
(127, 32, '水曜日', 0),
(128, 32, '木曜日', 1),
(129, 33, '1', 1),
(130, 33, '2', 0),
(131, 33, '3', 0),
(132, 33, '4', 0),
(133, 34, '1', 1),
(134, 34, '2', 0),
(135, 34, '3', 0),
(136, 34, '4', 0),
(137, 35, '1', 0),
(138, 35, '2', 0),
(139, 35, '3', 0),
(140, 35, '4', 1),
(141, 36, '1', 0),
(142, 36, '2', 0),
(143, 36, '3', 0),
(144, 36, '4', 1),
(145, 37, '1', 0),
(146, 37, '2', 0),
(147, 37, '3', 1),
(148, 37, '4', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_title` varchar(100) NOT NULL,
  `c_level` varchar(20) NOT NULL,
  `c_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`c_id`, `c_title`, `c_level`, `c_image`) VALUES
(1, 'Bài 1 : Chào hỏi cơ bản - 基本的な挨拶', 'Giao tiếp', 'communication1.png'),
(2, 'Bài 2 : Tôi đến từ Việt Nam - ベトナムから来ました', 'Giao tiếp', 'communication2.png'),
(3, 'Bài 3 : Quyển sách này là của ai vậy - この本はだれの本ですか', 'Giao tiếp', 'communication3.png'),
(4, 'Bài 4 : Nơi nào thế? - どこですか？', 'Giao tiếp', 'communication4.png'),
(5, 'Bài 5 : Giá bao nhiêu vậy? - いくらですか', 'Giao tiếp', 'communication5.png'),
(6, 'Hội thoại - Sơ cấp - Bài 1', 'Sơ cấp', ''),
(7, 'Hội thoại - Sơ cấp - Bài 2', 'Sơ cấp', ''),
(8, 'Hội thoại - Sơ cấp - Bài 3', 'Sơ cấp', ''),
(9, 'Hội thoại - Sơ cấp - Bài 4', 'Sơ cấp', ''),
(10, 'Hội thoại - Sơ cấp - Bài 5', 'Sơ cấp', ''),
(11, ' Hội thoại - Trung cấp 1 - Bài 1', 'Trung cấp 1', ''),
(12, ' Hội thoại - Trung cấp 1 - Bài 2', 'Trung cấp 1', ''),
(13, ' Hội thoại - Trung cấp 1 - Bài 3', 'Trung cấp 1', ''),
(14, ' Hội thoại - Trung cấp 1 - Bài 4', 'Trung cấp 1', ''),
(15, ' Hội thoại - Trung cấp 1 - Bài 5', 'Trung cấp 1', ''),
(16, ' Hội thoại - Trung cấp 2 - Bài 1', 'Trung cấp 2', ''),
(17, ' Hội thoại - Trung cấp 2 - Bài 2', 'Trung cấp 2', ''),
(18, ' Hội thoại - Trung cấp 2 - Bài 3', 'Trung cấp 2', ''),
(19, ' Hội thoại - Trung cấp 2 - Bài 4', 'Trung cấp 2', ''),
(20, ' Hội thoại - Trung cấp 2 - Bài 5', 'Trung cấp 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `conversationcontent`
--

CREATE TABLE IF NOT EXISTS `conversationcontent` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `con_title` varchar(200) NOT NULL,
  `con_hiragana` varchar(5000) NOT NULL,
  `con_romaji` varchar(5000) NOT NULL,
  `con_meaning` varchar(5000) NOT NULL,
  `con_file` varchar(200) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `conversationcontent`
--

INSERT INTO `conversationcontent` (`con_id`, `c_id`, `con_title`, `con_hiragana`, `con_romaji`, `con_meaning`, `con_file`) VALUES
(1, 6, 'Hỏi đồ vật', 'A:　え～、どれ？これ？\r\n\r\nB: 　うん。それ。', 'A: E~, dore? kore?\r\n\r\nB: un. sore.', 'A:　Này, cái nào? Cái này à?\r\n\r\nB:　Ừ. Cái đó.', 'CommunicationBai1Phan11.mp3'),
(2, 6, 'Xác nhận thông tin', 'A:　そう？\r\n\r\nB: 　そう。', 'A: Sou?\r\n\r\nB: Sou.', 'A:　Vậy à?\r\n\r\nB:　Đúng vậy.', 'CommunicationBai1Phan21.mp3'),
(3, 6, 'Thể hiện sự đồng ý.', 'A:　おいしい？\r\n\r\nB:　うん。おいしいよ。', 'A: Oishii?\r\n\r\nB: un. oishiyo.', 'A:　Ngon không?\r\n\r\nB:　Ừ. Ngon lắm.', 'CommunicationBai1Phan22.mp3'),
(4, 7, 'Giới thiệu về bản thân', 'A:　はじめまして。渡辺です。\r\n\r\nB:　田中です。どうぞよろしく。', 'A : Hajimemashite. Wantanabe desu.\r\n\r\nB: Tanaka desu. Douzo yoroshiku.', 'A:　Xin chào. Tôi là Watanabe.\r\n\r\nB:　Tôi là Tanaka. Xin nhờ anh giúp đỡ.', 'CommunicationBai1Phan22111.mp3'),
(5, 7, 'Hỏi họ là ai?', 'A:　鈴木さんですか？\r\n\r\nB: 　はい、そうです。', 'A: Suzukisan desuka?\r\n\r\nB: Hai,so desu.', 'A:　Anh Suzuki phải không?\r\n\r\nB:　Phải, đúng vậy.', 'CommunicationBai1Phan221111.mp3'),
(6, 7, 'Hỏi cái này là gì?', 'A:　それはなんですか？\r\n\r\nB:　デジカメです。', 'A: Sore wa nan desuka?\r\n\r\nB: Dejikamedesu.', 'A:　Cái đó là gì vậy?\r\n\r\nB:　Là máy ảnh kỹ thuật số.', 'CommunicationBai1Phan2211111.mp3'),
(7, 11, 'Đề nghị làm gì.', 'A：雨降ってきそうだよ。傘持ってったら？\r\n\r\nB：いいよ、めんどくさいし。\r\n\r\nA：ほら、折りたたみだから。\r\n\r\nB：いい、いい。そんなにどしゃぶりにはならないでしょ。', 'A: Amefuri tte ki-sōda yo. Kasa motte ttara? \r\n\r\nB: ii yo, mendokusaishi. \r\n\r\nA: Hora, oritatamidakara. B: \r\nĪ, ī. Son''nanidoshaburinihanaranaidesho', 'A:　Trời chuyển mưa rồi đó. Hay là mang theo cái ô đi?\r\n\r\nB:　Thôi được rồi, phiền phức lắm.\r\n\r\nA:　Đây nè, cái này gấp lại được mà.\r\n\r\nB:　Được rồi mà. Chắc trời không mưa to như trút thế đâu.', 'CommunicationBai1Phan22111111.mp3'),
(8, 11, 'Đánh giá tích cực về điều gì đó.', 'A：さすが、一流ホテルだけのことはあるね。\r\n\r\nB：何感心してんの？\r\n\r\nA：見てよ。あのシャンデリアの大きさ！\r\n\r\nB：本当！直径５メートルはあるね。', 'A: Sasuga, ichiryū hoteru dake no koto wa aru ne.\r\n\r\nB: Nan kanshin shi ten no? \r\n\r\nA: Mite yo. Ano shanderia no ōki-sa! \r\n\r\nB: Hontō! Chokkei 5 mētoru wa aru ne.', 'A:　Quả đúng là khách sạn hạng sang có khác ha.\r\n\r\nB:　Anh thán phục về điều gì?\r\n\r\nA:　Em nhìn kìa, ngọn đèn chùm kia to chưa kìa.\r\n\r\nB:　Ờ ha, đường kính của nó chắc cũng 5m ấy chứ.', 'CommunicationBai1Phan22111112.mp3'),
(9, 12, 'Cách nói mệnh lệnh', 'A：ぐずぐずしてないでさっさと出かけなさい。\r\n\r\nB：ちょっとおなかが痛くて…。\r\n\r\nA：大丈夫。いつもどおりテストが終われば、すぐ治るから。\r\n\r\nB：違うってば～。今日は本当に痛いんだよ。', 'A: Guzuguzu shitenaide sassato dekake nasai. \r\n\r\nB: Chotto onaka ga itakute…. \r\n\r\nA: Daijōbu. Itsumo dōri tesuto ga owareba, sugu naorukara. \r\n\r\nB: Chigau tteba ~. Kyō wa hontōni itai nda yo.', 'A:　Đừng lề mề nữa, khẩn trương đi học đi con.\r\n\r\nB:　Bụng con nó đau...\r\n\r\nA:　Không sao đâu, làm bài kiểm tra xong là khỏi ngay như mọi khi ấy mà.\r\n\r\nB:　Không phải đâu mẹ. Bữa nay con đau thiệt đó.', 'CommunicationBai1Phan221112.mp3'),
(10, 1, 'Xin chào', 'A: こんにちは\r\n\r\nB: こんにちは\r\n\r\nA: わたしはすずきよたです。はじめまして\r\n\r\nB: わたしはぜソンミラーです。はじめまして。どうぞよろしく\r\n\r\n', 'A: Kon''nichiwa \r\n\r\nB: Kon''nichiwa \r\n\r\nA: Watashi wa Suzuki yotadesu. Hajimemashite\r\n\r\nB: Watashi wa ze sonmirādesu. Hajimemashite. Dōzo yoroshiku.', 'A : Xin chào.\r\n\r\nB : Xin chào.\r\n\r\nA : Tôi là Suzuki Yota. Rất vui được gặp anh.\r\n\r\nB : Tôi là Jason Miler. Rất hân hạn được biết anh\r\n\r\n', 'CommunicationBai1Phan1.mp3'),
(11, 2, 'Giới thiệu từ đâu đến.', 'A: はじめまして、ワット　です。イギリスから　きました\r\n\r\nB: はじめまして、こばやし　です\r\n\r\nA: わたし　は　さくらだいがく　の　きょうし　です\r\n\r\nB: あ、わたし　も　きょうし　です。ふじだいがく　です。\r\nどうぞよろしく', 'A:Hajimemashite,wattodesuigirisukarakimashita \r\n\r\nB:Hajimemashite,kobayashidesu \r\n\r\nA:Watashihasakuradaigakunokyoushidesu\r\n\r\nB: A, watashi mo kyōshidesu. Fuji dai gakudesu. Dōzo yoroshiku', 'A: Rất vui được gặp chị, tôi là Watt, đến từ nước Anh.\r\n\r\nB: Chào anh, tôi là Kobayashi.\r\n\r\nA: Tôi là giáo viên của trường đại học Sakura.\r\n\r\nB: Ồ, Tôi cũng là giáo viên, trường đại học Phú sĩ, rất hân hạnh được biết anh. ', 'CommunicationBai1Phan221.mp3'),
(12, 2, 'Hỏi tuổi', 'A: あのかた　は　どなた　ですか.\r\n\r\nB: ますださん　です。こうべ　びょういん　の　いしゃ　です.\r\n\r\nA: おいくつ　ですか.\r\n\r\nB: えーと、。。。７１さい　です', 'A: Anokata wa donata desuka.\r\n\r\nB: Masuda-sandesu.Kōbe byōin no ishadesu.\r\n\r\nA: Oikutsu desuka.\r\n\r\nB: Eto,... 71 Sai desu.\r\n\r\n', 'A: Người kia là ai vậy?\r\n\r\nB: Ông Masuda, bác sĩ của  bệnh viện Kobe đấy.\r\n\r\nA: Bao nhiêu tuổi thế?\r\n\r\nB: Uhm…71 tuổi.', 'CommunicationBai1Phan2211.mp3'),
(13, 16, 'Giới thiệu vị trí công việc', '課長：みなさん、今日から営業３課に配属になったリビングストンさんを紹介します。\r\n\r\nダニー：ロンドから参りましたリビングストンと申します。よろしくお願いいたします。ビングストンは名字ですが、言いにくい方はダニー呼んでください。\r\n\r\n課長：ダニーさんは、２年間日本語学校で勉強されました。そしてこのたび、優秀な成績でわが社の入社試験に合格されました。そうですよね、ダニーさん。\r\n\r\nダニー：いえいえ、とんでもないです。会社勤めは初めてですので、戸惑いこともあるかと思いますが、一生懸命がんばりますので、よろしくご指導ください.', '課長: Minasankyōkaraeigyō3-kani haizokuninatta.Ribingusuton-sanoshōkaishimasu.\r\n\r\nダニー：RondokaramairimashitaRibingusutontomōshimasu. Yoroshikuonegaītashimasu. Bingusutonwamyōjidesuga,iinikuikatawadanīyondekudasai.\r\n\r\n課長: Danī-sanwa,2nenkannihongogakkōde benkyōsaremashita. Soshitekonotabi, yūshūnaseisekidewaga shanonyūshashikenni gōkakusaremashita. Sōdesuyone,danī-san.\r\n\r\nダニー： Ieie, tondemonaidesu. Kaisha tsutome wa hajimetedesunode,tomadoikotomoarukatoomoimasuga,isshōkenmeiganbarimasunode,yoroshikugoshidōkudasai.', 'Trưởng phòng: Mọi người, tôi giới thiệu anh RibinguSuton được bố trí làm việc tại phòng kinh doanh 3 từ hôm nay\r\n\r\nRibingu: Tôi là Ribingu đến từ Luân Đôn. Mong mọi người giúp đỡ. RibinguSeton là họ nên anh chị khó phát âm, xin hãy gọi tôi là Danii.\r\n\r\nTrưởng phòng: Danii đã học Nhật ngữ 2 năm rồi. Vì thế dịp này anh ấy đã đậu vào công ty chúng ta với thành tích ưu tú.Đúng vậy nhỉ Danii.\r\n\r\nRibingu: Không, không có gì đâu ạ. Vì làm việc ở công ty lần đầu tiên nên có nhiều điều bỡ ngỡ nhưng tôi sẽ cố gắng hết sức và mong mọi người hãy giúp đỡ tôi.\r\n\r\n', 'TC2BAI1PHAN1.mp3'),
(14, 17, 'Chào hỏi của người kế nhiệm', '長井：いつもお世話になっております。\r\n実はこのたび御社の担当が替わりましたので、後任の者を連れてごあいさつに参りました。\r\n\r\n木村：それはごていねいに、恐れ入ります。\r\n\r\n長井：こちらが私の後任のチンシュウメイでございます。\r\n私同様よろしくお願いいたします。\r\n\r\nチン：このたび、御社を担当させていただくことになりましたチンでございます。\r\n（名刺を渡す）\r\n\r\n木村：あ、チンさんですか。\r\n木村でございます。\r\n（名刺を渡す）\r\nどうぞよろしくお願いいたします。\r\n\r\nチン：精いっぱいがんばりますので、こちらこそ、よろしくお願いいたします。', '長井：Itsumoosewaninatte orimasu.Jitsuwakonotabi onshanotantōgakawarimashitanode,kōninnomonoo tsuretegoaisatsunimairimashita.\r\n\r\n木村：Sorewagoteineini,osoreirimasu.\r\n\r\n長井：Kochiragawatashinokōninnochinshuumeidegozaimasu. Watashidōyōyoroshikuonegaītashimasu.\r\n\r\nチン：Konotabi,onshaotantōsa seteitadakukotoninarimashitachindegozaimasu.(Meishiowatasu).\r\n\r\n木村：A,Chin-sandesuka. Kimuradegozaimasu. (Meishiowatasu)dōzoyoroshikuonegaītashimasu.\r\n\r\nチン：Seiippaiganbarimasunode, kochirakoso,yoroshikuonegaītashimasu.', '長井：Lúc nào cũng làm phiền rồi.Thật ra thì nhân dịp này, việc đảm trách quý công ty đã thay đổi nên tôi xin được dẫn người kế nhiệm đến chào hỏi.\r\n\r\n木村：Thế thì xin phép anh.\r\n\r\n長井：Vị đây là ChinShuunmei kế nhiệm tôi. Rất mong sẽ được giúp đỡ như tôi.\r\n\r\nチン：Tôi là Chin đã được phép đảm nhiệm công ty lần này (trao danh thiếp).\r\n\r\n木村：Anh Chin phải không ạ? Tôi là Kimura. Xin nhờ anh giúp đỡ.\r\n\r\nチン：Tôi sẽ cố gắng hết sức nên cũng mong được anh chiếu cố', 'TC2BAI2PHAN1.mp3');

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
  `g_lesson` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `grammar`
--

INSERT INTO `grammar` (`g_id`, `g_hiragana`, `g_romaji`, `g_level`, `g_meaning`, `g_use`, `g_status`, `g_lesson`) VALUES
(1, 'Nです/ Nではありません/ Nじゃありません', 'desu/dehaarimasen/jaarimasen', 'N5', 'Khẳng định: là~ / Phủ định: không phải là~', 'Khẳng định: là~\r\nPhủ định: không phải là~', 1, 'SC_01'),
(2, '~　は　N ですか/ N じゃありませんか', 'desuka/ jaarimasenka', 'N5', '~ phải không? Hỏi?', ' Chữ か được đặt ở cuối câu dùng để làm câu nghi vấn. \r\nĐặt câu hỏi ', 1, 'SC_01'),
(3, '~は なんさい(おいくつ)ですか', 'nansai/oikutsudesuka', 'N5', '~ bao nhiêu tuổi?', 'Dùng để hỏi tuổi\r\n(おいくつ) là cách hỏi tuổi lịch sự.', 1, 'SC_01'),
(4, 'A: ～は　Nですか。  B: はい、Nです。  　　いいえ、Nじゃありません。N1です。', 'desuka', 'N5', '~ phải không?', 'Đây là dạng câu hỏi xác nhận.\r\n\r\nKhi trả lời phải có はい hoặc là いいえ.\r\n\r\n', 1, 'SC_02'),
(5, '～は　N1ですか、N2ですか。', 'desuka', 'N5', '~ là N1 hay là N2', 'Đây là dạng câu hỏi lựa chọn.\r\n\r\nĐối với dạng câu hỏi này thông thường chúng ta sẽ chọn một trong những ý mà người hỏi đưa ra để trả lời.\r\n\r\n', 1, 'SC_02'),
(6, '～はなんのNですか。', 'nanno', 'N5', 'N về cái gì?', 'なんのN: dùng để hỏi về tính chất.\r\n\r\nN1 thường là những từ chỉ về tính chất,chủng loại.\r\n\r\n', 1, 'SC_02'),
(7, 'N1 はN2です。', 'desu', 'N5', 'N1 ở N2', 'Mẫu câu này dùng để diễn đạt 1 vật, 1 người hay 1 địa điểm nào đó ở đâu', 1, 'SC_03'),
(8, 'どこ / どちら', 'doko/dochira', 'N5', 'Ở đâu, ở chỗ nào', 'どこ là nghi vấn từ hỏi địa điểm, どちら là nghi vấn từ hỏi phương hướng. Tuy nhiên どちら cũng dùng để hỏi địa điểm và mang sắc thái lịch sự hơn', 1, 'SC_03'),
(9, 'N1のN2', 'no', 'N5', 'N2 của N1', 'Trong mẫu này, N1 là tên công ty, quốc gia còn N2 là tên sản phẩm được sản xuất ở một nước hoặc công ty nào đó', 1, 'SC_03'),
(10, 'Vます/ ません/　ました/　ませんでした', 'masu/masen/mashita/masendeshita', 'N5', '~ làm gì/ ~không làm gì/ ~đã làm gì/ ~đã không làm gì', 'Động từ ます được dùng để nói về một thói quen trong hiện tại hoặc một sự thật hiển nhiên nào đó, đồng thời cũng dùng để nói về một sự việc nào đó sẽ xảy ra trong tương lai. Động từ ません　là thể phủ định của ます. Động từ ました　và　ませんでした mà thể quá khứ của ますvà　ません　', 1, 'SC_04'),
(11, 'に Vます/ ません/ ました/ ませんでした', 'masu/masen/mashita/masendeshita', 'N5', 'Làm gì ~ vào thời gian ~', 'Khi muốn nói về thời điểm mà hành động nào đó xảy ra, chúng ta thêm trợ từ に vào sau danh từ chỉ thời gian. Dùng に đối với những hành động diễn ra trong thời gian ngắn. に được dùng khi danh từ chỉ thời gian cụ thể, có số đi kèm, không dùng trong những trường hợp không có số đi kèm. Đối với trường hợp các thứ trong tuần thì có thể dùng に hoặc không', 1, 'SC_04'),
(12, 'NからNまで', 'kara/made', 'N5', '~ từ ~ đến', 'から biểu thị điểm bắt đầu của thời gian hoặc địa điểm, まで biểu thị điểm kết thúc của thời gian hoặc địa điểm', 1, 'SC_04'),
(13, 'N(danh từ địa điểm)へ行きます/ 来ます/ 帰ります', 'ikimasu/kimasu/kaerimasu', 'N5', '~ đi/ ~ đến/ ~ về', 'Khi động từ chỉ sự di chuyển, trợ từ へ được dùng sau danh từ chỉ phương hướng hoặc địa điểm', 1, 'SC_05'),
(14, 'どこ（へ）も 行きません/　行きませんでした', 'mo', 'N5', '~ hoàn toàn không', 'Khi muốn phủ định hoàn toàn đối tượng ( phạm vi )của từ nghi vấn thì dùng trợ từ も. Trong mẫu câu này thì động từ phải ở dạng phủ định\r\n ', 1, 'SC_05'),
(15, 'Danh từ ( phương tiện giao thông ) で行きます/　来ます/　帰ります', 'de/te', 'N5', ' đi/ đến/ về bằng (phương tiện) gì', 'Trợ từ で biểu thị phương tiện hay cách thức thực hiện hành động. Khi dùng trợ từ này sau danh từ chỉ phương tiện giao thông và dùng kèm với động từ di chuyển thì nó biểu thị cách thức di chuyển', 1, 'SC_05'),
(16, 'Vれる/ れている', 'reru/reteiru', 'N3', '~ bị, được ', 'mẫu câu bị động, khi bạn đề cập đến một sự kiện mà không có chủ đề, hình thức thụ động thường được sử dụng', 1, 'N3_soumatome_1.1'),
(17, 'せてください/ もらいます/ いただきます', 'setekudasai/moraimasu/itadakimasu', 'N3', 'Tôi có thể làm ~ được không', 'Sử dụng khi muốn xin phép người khác cho mình làm gì', 1, 'N3_soumatome_1.1');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(5, 11),
(5, 12),
(6, 13),
(8, 14),
(8, 15),
(9, 16),
(9, 17),
(7, 18),
(7, 19),
(7, 20),
(10, 21),
(10, 22),
(10, 23),
(11, 24),
(11, 25),
(12, 26),
(12, 27),
(13, 28),
(14, 30),
(14, 31),
(14, 32),
(15, 33),
(15, 34),
(16, 51),
(16, 52),
(17, 53),
(17, 54),
(17, 55);

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
  `k_lesson` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`k_id`),
  UNIQUE KEY `k_kanji` (`k_kanji`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `kanji`
--

INSERT INTO `kanji` (`k_id`, `k_kanji`, `k_hanviet`, `k_onyomi`, `k_kunyomi`, `k_meaning`, `k_level`, `k_status`, `k_lesson`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `meaning`
--

INSERT INTO `meaning` (`m_id`, `v_id`, `m_meaningvn`, `m_category`, `m_kanji`, `m_specialized`) VALUES
(1, 1, 'mở rộng; khuyếch trương', 'Verb', '拡張する ', ''),
(2, 1, 'sự mở rộng; sự khuyếch trương', 'Noun', '拡張 ', ''),
(3, 2, 'dạt dào; tràn trề; đầy rẫy', 'Verb', '漂う ', ''),
(4, 2, 'lộ ra; tỏ ra', 'Verb', '漂う ', ''),
(5, 2, 'nổi; nổi lềnh bềnh; trôi nổi', 'Verb', '漂う ', ''),
(6, 3, 'đăng ký', 'Verb', '応じる', ''),
(7, 3, 'đáp ứng; trả lời; nhận lời', 'Verb', '応じる', ''),
(8, 3, 'phù hợp; ứng với; dựa trên; tùy theo', 'Verb', '応じる', ''),
(9, 4, 'sự bất tiện; lỗi', 'Noun', '不具合', 'IT'),
(10, 5, 'tốt nghiệp', 'Verb', '卒業する', ''),
(11, 6, 'xử lý; giải quyết', 'Verb', '処理', ''),
(12, 7, 'hoa anh đào', 'Noun', '桜 ', ''),
(13, 8, 'cô đơn; cô quạnh', 'Adjective', '寂しい', ''),
(14, 8, 'buồn, nhàn rỗi', 'Adjective', '寂しい', ''),
(15, 8, 'vắng vẻ, hẻo lánh', 'Adjective', '寂しい', ''),
(16, 9, 'trung tâm', 'Noun', '中心 ', ''),
(17, 10, 'Thiết kế', 'Noun', '設計', 'IT'),
(18, 11, 'sự tham dự; tham dự; sự tham gia; sự liên quan', 'Noun', '関与', ''),
(19, 11, 'tham dự; tham gia; liên quan', 'Verb', '関与する ', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `test_id`, `question_content`) VALUES
(1, 1, '田中さんはかいぎにおくれて、社長＿＿＿注意された.'),
(2, 1, '小林さんはどこへ行った＿＿＿＿わかりません。'),
(3, 1, '日本人の友達もできて、やっと日本のせいかつ＿＿＿＿なれました。'),
(4, 1, 'レポートはペン＿＿＿書いてください。'),
(5, 1, 'テレビを見て＿＿＿いると、目が悪くなりますよ。'),
(6, 2, '図書館の前＿＿＿通るバスはどれですか。'),
(7, 2, 'きのう買ったカメラ＿＿＿ぬすまれてしまいました。'),
(8, 2, 'ゆうべはビールを10 本＿＿＿＿飲んだので、頭が痛い。'),
(9, 2, 'この本はあさって＿＿＿＿かえしてください。'),
(10, 2, 'そのことばは発音がむずかしいので、アウアンサー＿＿＿よくまちがえます.'),
(11, 3, '(A)'),
(12, 3, '(B)'),
(13, 3, '(C)'),
(14, 3, '(D)'),
(15, 4, 'おまつりのひに男の人は何をしますか。'),
(16, 4, 'おまつりのひに子どもは何をしますか'),
(17, 4, 'この町では秋にどんなおまつりをしますか。'),
(18, 5, 'パーディーの＿＿＿はこのビルの５かいです。'),
(19, 5, 'こちらにいらっしゃる＿＿＿があったら、せひおよりください。'),
(20, 5, '新しいじしょをつかってみたけれど、あまり＿＿＿。'),
(21, 5, 'ほんやの＿＿＿で3000 円はらった。'),
(22, 5, '＿＿＿でんわがありましたよ。'),
(23, 6, '一ヶ月50000 円＿＿＿のへやをかりたいです。'),
(24, 6, '____、へんだなあ。コンビューターがうごかない。'),
(25, 6, 'にわにきれいな花を＿＿＿。'),
(26, 6, '友だちににっきを見られてとても＿＿＿。'),
(27, 6, 'つよいかせで大きな木のえだが＿＿＿しまった。'),
(28, 7, '何 で 行きます?'),
(29, 7, '何 を しましたか？'),
(30, 7, '何を 買いましたか？'),
(31, 7, 'てんき は どう ですか？'),
(32, 7, '何曜日に いきますか？'),
(33, 8, '(1)'),
(34, 8, '(2)'),
(35, 8, '(3)'),
(36, 8, '(4)'),
(37, 8, '(5)');

-- --------------------------------------------------------

--
-- Table structure for table `readingarticle`
--

CREATE TABLE IF NOT EXISTS `readingarticle` (
  `readingarticle_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_id` int(11) NOT NULL,
  `readingarticle_content` varchar(5000) DEFAULT NULL,
  `readingarticle_question` varchar(5000) DEFAULT NULL,
  `readingarticle_answer` varchar(5000) DEFAULT NULL,
  `readingarticle_meaning` varchar(5000) NOT NULL,
  PRIMARY KEY (`readingarticle_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `readingarticle`
--

INSERT INTO `readingarticle` (`readingarticle_id`, `reading_id`, `readingarticle_content`, `readingarticle_question`, `readingarticle_answer`, `readingarticle_meaning`) VALUES
(1, 29, '「いっしょに住みませんか」\r\n\r\n私は　３５歳の　じょせいの　会社員です。Ａ駅から　歩いて　１０分の　ところに　住んで　います。※６畳の　きれいで　明るい　へやが　空いて　います。いっしょに　住んで　くださる　方を　さがして　います。へや代は　４万円です。電話代などは　使った　分を　半分ずつ　分けましょう。\r\n\r\n３０代の　女の人、いっしょに　住みませんか。どこの　国の　人でも　学生でも　仕事を　して　いる　人でも　いいです。日本語が　話せなくても　かまいません。私は　少し　英語が　話せますから。私の　しゅみは　テニスです。同じ　しゅみだったら、もっと　うれしいです。興味の　ある方、連絡して　ください。\r\n\r\n※  ～畳（一畳は　畳（８７．９ｘ１７５．８ｍ）１まいの大きさ）\r\n', '問題　どんな　人と　住みたいですか。\r\n\r\n１/　同じ　しゅみの　３０代の　女の　人です。\r\n\r\n２/　日本語が　少し　話せる　３０代の　女の　人です。\r\n\r\n３/　３０代の　人なら　だれでも　いいです。\r\n\r\n４/　３０代の　じょせいなら　働いて　いなくても　いいです。\r\n\r\n', '４/　３０代の　じょせいなら　働いて　いなくても　いいです。\r\n', 'Tôi là nữ nhân viên văn phòng 35 tuổi. Tôi ở cách nhà ga A 10 phút đi bộ. Có 1 căn phòng đẹp và sáng sủa, diện tích là 6 chiếu. Tôi đang tìm người ở chung với mình. Tiền phòng là 4 vạn yên. Những thứ như phí điện thoại thì chúng ta sẽ chia theo số lượng đã dùng. Những bạn nữ 30 tuổi hãy cùng ở chung nhé. Dù là người ở đâu, học sinh hay đi làm đều được. Không nói được tiếng Nhật cũng không sao vì tôi có thể nói 1 chút tiếng Anh. Sở thích của tôi là chơi tennis. Nếu có chung sở thích thì tôi rất vui. Những ai có hứng thú thì hãy liên lạc với tôi.'),
(2, 30, '長い　間　日本人は　ふつうの　生活を　して　いる人が　ほとんどでした。しかし　さいきんは　お金持ちの　そうでない　人に　分かれて　きたようです。ですから　洋服も　その　ほかの　物も　とても　安いものから　高いものまで　売られて　います。デパートや　銀行も　お金持ちの（　___　）サービスを　始める　ところが　出て　きました。たとえば　ある　デパートでは　特別な　お客が　ゆっくり　休む　ことが　できる　へやや　飲み物の　サービス、いっしょに　買い物に　ついて　回る　店員を　用意して　います。特別に　されたいと　いう　お客の　気持ちを　考えた　やり方です。お金持ちの　ほうが　たくさん　物を　買って　くれると　いう　ことなのでしょう。', '問題（　___　）の　中に　てきとうな　ことばを　入れなさい。\r\n\r\n１/　ためだけの\r\n\r\n２/　ばかりの\r\n\r\n３/　ためばかりの\r\n\r\n４/　だけのため\r\n\r\n', '１　ためだけの', 'Trong 1 thời gian dài, người Nhật hầu như sống cuộc sống bình thường. Tuy nhiên gần đây hình như đã phân hóa giàu nghèo. Vì vậy, người ta bán quần áo cũng như các thứ khác từ rẻ tiền cho đến đồ đắt tiền. Cửa hàng bách hóa cũng như ngân hàng, đã xuất hiện nhiều nơi mở các dịch vụ (_ _) người giàu. Chẳng hạn như tại cửa hàng nọ, người ta chuẩn bị những nhân viên đi mua sắm cùng, dịch vụ thức uống, hay những căn phòng mà những người khách đặc biệt có thể nghỉ ngơi. Cách làm suy nghĩ đến cảm xúc của khách hàng, muốn làm gì một cách đặc biệt thì có lẽ người giàu sẽ mua nhiều đồ cho mình'),
(3, 31, '「孫の　日」\r\n\r\n１０月の　３ばん目の　日曜日は「孫の　日」だと　デパートが　言い始めた。その　日は　孫と　あそぶ　日なのだそうだが、おもちゃ売り場に　大きな　字で「孫の　日の　プレゼント」などと　書かれて　いるのを　見ると　デパートは　頭が　いいと　思う。ほとんどの　人が「孫の　日」を　知ったのは、新聞で　読んだり　デパートに　行ったり　した　ときだと　答えて　いる。しかし　まだ　知らない　人も　多い。はじめて　書いた　ときに「デパートは　うまい　ことを　考えた　ものだ。」と　多くの　人が　思ったそうだ。\r\n\r\nおじいさん、おばあさんは　お金を　持って　いる。孫は　かわいいから　孫のために　お金を　使うだろう。\r\n\r\nいつか「母の日」の　ように　孫に　プレゼントを　買う　日に　なる　かも　しれない。\r\n', '問題:　孫の日の　説明と　合って　いるのは　何ですか。\r\n\r\n１/　孫の　日は　国が　きめました。\r\n\r\n２/　デパートに　行かない　人は　孫の日を　知りません。\r\n\r\n３/　デパートが　きめたので　ふつうの　人は　知りません。\r\n\r\n４/　まだ　孫の日を　知らない　人も　おおぜい　います。\r\n\r\n', '４/　まだ　孫の日を　知らない　人も　おおぜい　います', 'Các cửa hàng bách hóa bắt đầu gọi ngày chủ nhật thứ 3 của tháng 10 là "ngày của cháu". Đó là ngày chơi cùng với cháu nhưng khi nhìn thấy dòng chữ lớn được viết ở quầy bán đồ chơi viết rằng " Món quà ngày của cháu" thì tôi thấy rằng cửa hàng thật thông minh. Hầu hết mọi người trả lời rằng biết được thông tin "Ngày của cháu" là khi đọc báo hoặc đi cửa hàng bách hóa. Tuy nhiên cũng có nhiều người chưa hay biết gì. Khi lần đầu tiên hỏi thì nhiều người nghĩ rằng " cửa hàng bách hóa thì nghĩ những điều nịnh nọt rồi". Ông, bà thì có tiền. Vì đứa cháu đáng yên nên sẽ tiêu tiền vì cháu. Có lẽ một ngày nào đó sẽ trở thành ngày mua quà cho cháu mình như là "ngày của Mẹ" vậy '),
(4, 32, '「定期券」\r\n\r\n洪・元培さんは、韓国から　来た　37歳　の男の　人です。今「日本自動車」で　働いて　います。会社は　新宿に　あります。洪さんは　西武線の　秋津駅の　そばに　住んで　いますから、毎日　池袋で　西武線から　山手線に　のりかえて　会社に　通って　います。朝も　夕方も　山手線は　とても　こんで　いて、乗るのが　たいへんです。\r\n\r\n洪さんは　今日　定期券を　買いに　駅に　行きました。定期券は　長く　買うほど　安く　なるので　6か月　買いました。', '問題　上の　文と　ちがうのは　どれですか。\r\n\r\n1/ 定期券は　6か月　買うと　1ばん　安いです。\r\n\r\n2/ 洪さんは　会社に　行く　ための　定期券を　買います。\r\n\r\n3/ 洪さんは　池袋を　通って　新宿に　行かなければ　なりません。\r\n\r\n4/ 山手線は　いつも　こんで　います。\r\n\r\n', '4/ 山手線は　いつも　こんで　います。', 'Hon Ban Wei là người đàn ông 37 tuổi đến từ Hàn Quốc. Hiện tại anh ây đang làm việc tại " Công ty ô tô Nhật Bản" . Công ty ở Shinjuku. Vì sống cạnh nhà ga Akizu tuyến xe Seibu nên hàng ngày anh Hon đi làm bằng cách sang xe từ tuyến Seibu sang tuyến Yamate. Sáng cũng như chiều tối, tuyến Yamate rất đông đúc nên việc đi lại vô cùng khó khăn. Hôm nay anh Hon đến nhà ga để mua vé tháng. Vé tháng thì mua thời gian càng dài giá càng rẻ nên anh ấy đã mua 6 tháng '),
(5, 33, '「バス」\r\n\r\n年を　とった　人に　なるべく　外に　出て　もらおうと、ある　市で　小さな　バスを　走らせる　ことに　しました。その　バスは、ふつうの　バスが　通らない　場所や　せまい　道を　走ります。止まる　場所も　たくさん　あります。それに　１人　１００円です。これは　ふつうの　バスの　半分ぐらいの　ねだんです。\r\n\r\nはじめは　市から　たくさん　お金を　もらわなければ　バスを　走らせることは　できないと　考えられて　いました。でも　安いから、近くに　行くのにも　バスに　乗る　人が　ふえました。いろいろな　人が　バスを　使って　います。それで　市の　お金を　使わなくても　すんで　います。\r\n\r\n今では　いろいろな　町や　市で　この　ような　バスが　走って　います。\r\n\r\n', '問題:　市は　どんな　バスを　走らせる　ことに　しましたか。\r\n\r\n１/　年　とった　人だけを　乗せる　ための　バスです。\r\n\r\n２/　市の　人だけを　乗せる　ための　バスです。\r\n\r\n３/　せまい　道でも　通れる　小さい　バスです。\r\n\r\n４/　１００円で　市の　中の　すべてを　通る　バスです。\r\n\r\n', '３/　せまい　道でも　通れる　小さい　バスです。', 'Khi cho người lớn tuổi đi ra ngoài, tôi quyết định cố gắng để các cụ đi bằng xe bus nhỏ trong một thành phố nọ. Xe bus đó chạy trên các con đường nhỏ và những nơi các xe bus thông thường không thể đi qua. cũng có nhiều bến dừng. Hơn nữa giá là 100 yên 1 người. Giá này bằng khoảng một nửa giá xe bus thường. Ban đầu nếu không nhận nhiều tiền từ thành phố thì tôi nghĩ rằng không thể khiến các xe bus chạy được. Nhưng vì giá rẻ nên số người dùng xe bus để đi những nơi gần đã tăng lên. Nhiều người đang sử dụng xe bus. Vì vậy không sử dụng tiền của thành phố cũng được. Hiện tại các xe bus như thế đang chạy nhiều tại các thành phố và thị trấn'),
(6, 15, '「カレー」\r\n\r\n日本の　カレーを　食べた　ある　アメリカ人が「これは　カレーじゃなくて※シチューようだ。」と　言った。インドの　カレーは　水の　ように　うすい。それに　くらべて　日本のカレーは　※とろっと　して　たしかに　シチューに近い。カレーシチューと　言ったら　いちばん　合って　いるだろう。\r\n\r\nにほんでは　ほとんど、レストランでも　家でも　とろっと　した　カレーだ。私は　はじめて　インドカレーを　食べた　とき「これがカレーなんだ。」と　びっくり　した。\r\n\r\nその　日本の　カレーを　外国へ　売り始めた。おいしいし　安いので、すしのように　いろいろな　国で　食べられる　ように　なるかも　しれない。', '問題１　日本と　インドの　カレーは　どこが　ちがいますか。\r\n\r\n１/　日本の　カレーは　カレーでは　なく　シチューです。\r\n\r\n２/　日本の　カレーは　カレーシチューと　言うのが　ぴったりです。\r\n\r\n３/　インドの　カレーは　味が　うすいですが　日本の　カレーは　こいです。\r\n\r\n４/　日本では　インドの　カレーは　家で　食べられません。\r\n\r\n問題２　カレーについて　どんな　ことが　書かれて　いますか。\r\n\r\n１/　日本の　カレーは　世界中で　売られて　います。\r\n\r\n２/　日本では　インドカレーは　食べられません。\r\n\r\n３/　日本が　外国へ　売って　いる　カレーは　とろっと　した　カレーです。\r\n\r\n４/　日本人は　インドカレーを　はじめて　食べると　おどろきます。', '問題１　日本と　インドの　カレーは　どこが　ちがいますか。\r\n２/　日本の　カレーは　カレーシチューと　言うのが　ぴったりです。\r\n\r\n問題２　カレーについて　どんな　ことが　書かれて　いますか。\r\n３/　日本が　外国へ　売って　いる　カレーは　とろっと　した　カレーです。', 'Những người Mỹ đã từng ăn món Cari của Nhật nói rằng "Dường như đây không phải cari mà là món hầm". Cari của Ấn Độ nhạt như nước vậy. So với Cari Ấn Độ, Cari Nhật thì đặc, quả thật là gần giống món hầm. Gọi là Cari hầm có lẽ thích hợp nhất. Ở Nhật thì Cari ở hầu hết các nhà hàng và hộ gia đình đều là đặc. Lần đầu tiên tôi ăn Cari Ấn Độ, tôi ngạc nhiên bảo rằng "Đây là Cari ư" . Người ta bắt đầu bán Cari Nhật sang các nước ngoài. Vì vừa ngon lại vừa rẻ nên có thể nó sẽ được yêu thích ở nhiều quốc gia, như là sushi vậy');

-- --------------------------------------------------------

--
-- Table structure for table `readingdocument`
--

CREATE TABLE IF NOT EXISTS `readingdocument` (
  `reading_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_code` varchar(50) NOT NULL,
  `reading_title` varchar(100) NOT NULL,
  `reading_level` varchar(10) NOT NULL,
  PRIMARY KEY (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `readingdocument`
--

INSERT INTO `readingdocument` (`reading_id`, `reading_code`, `reading_title`, `reading_level`) VALUES
(1, 'N2_soumatome_1.1', '第1週_1日目（日本語総まとめN2)-Ngày 1 tuần 1', 'N2'),
(2, 'N2_soumatome_1.2', '第1週_2日目（日本語総まとめN2)-Ngày 2 tuần 1', 'N2'),
(3, 'N2_soumatome_1.3', '第1週_3日目（日本語総まとめN2)-Ngày 3 tuần 1', 'N2'),
(4, 'N2_soumatome_1.4', '第1週_4日目（日本語総まとめN2)-Ngày 4 tuần 1', 'N2'),
(5, 'N2_soumatome_1.5', '第1週_5日目（日本語総まとめN2)-Ngày 5 tuần 1', 'N2'),
(6, 'N2_soumatome_1.6', '第1週_6日目（日本語総まとめN2)-Ngày 6 tuần 1', 'N2'),
(7, 'N2_soumatome_1.7', '第1週_7日目（日本語総まとめN2)-Ngày 7 tuần 1', 'N2'),
(8, 'N2_soumatome_2.1', '第2週_1日目（日本語総まとめN2)-Ngày 1 tuần 2', 'N2'),
(9, 'N2_soumatome_2.2', '第2週_2日目（日本語総まとめN2)-Ngày 2 tuần 2', 'N2'),
(10, 'N2_soumatome_2.3', '第2週_3日目（日本語総まとめN2)-Ngày 3 tuần 2', 'N2'),
(11, 'N2_soumatome_2.4', '第2週_4日目（日本語総まとめN2)-Ngày 4 tuần 2', 'N2'),
(12, 'N2_soumatome_2.5', '第2週_5日目（日本語総まとめN2)-Ngày 5 tuần 2', 'N2'),
(13, 'N2_soumatome_2.6', '第2週_6日目（日本語総まとめN2)-Ngày 6 tuần 2', 'N2'),
(14, 'N2_soumatome_2.7', '第2週7日目（日本語総まとめN2)-Ngày 7 tuần 2', 'N2'),
(15, 'N3_soumatome_1.1', '第1週_1日目（日本語総まとめN3)-Ngày 1 tuần 1', 'N3'),
(16, 'N3_soumatome_1.2', '第1週_2日目（日本語総まとめN3)-Ngày 2 tuần 1', 'N3'),
(17, 'N3_soumatome_1.3', '第1週_3日目（日本語総まとめN3)-Ngày 3 tuần 1', 'N3'),
(18, 'N3_soumatome_1.4', '第1週_4日目（日本語総まとめN3)-Ngày 4 tuần 1', 'N3'),
(19, 'N3_soumatome_1.5', '第1週_5日目（日本語総まとめN3)-Ngày 5 tuần 1', 'N3'),
(20, 'N3_soumatome_1.6', '第1週_6日目（日本語総まとめN3)-Ngày 6 tuần 1', 'N3'),
(21, 'N3_soumatome_1.7', '第1週_7日目（日本語総まとめN3)-Ngày 7 tuần 1', 'N3'),
(22, 'N3_soumatome_2.1', '第2週_1日目（日本語総まとめN3)-Ngày 1 tuần 2', 'N3'),
(23, 'N3_soumatome_2.2', '第2週_2日目（日本語総まとめN3)-Ngày 2 tuần 2', 'N3'),
(24, 'N3_soumatome_2.3', '第2週_3日目（日本語総まとめN3)-Ngày 3 tuần 2', 'N3'),
(25, 'N3_soumatome_2.4', '第2週_4日目（日本語総まとめN3)-Ngày 4 tuần 2', 'N3'),
(26, 'N3_soumatome_2.5', '第2週_5日目（日本語総まとめN3)-Ngày 5 tuần 2', 'N3'),
(27, 'N3_soumatome_2.6', '第2週_6日目（日本語総まとめN3)-Ngày 6 tuần 2', 'N3'),
(28, 'N3_soumatome_2.7', '第2週_7日目（日本語総まとめN3)-Ngày 7 tuần 2', 'N3'),
(29, 'SC_01', 'BÀI 1 - はじめまして (Minnano Nihongo)', 'N5'),
(30, 'SC_02', 'BÀI 2 - ほんの　気持ちです (Minnano Nihongo)', 'N5'),
(31, 'SC_03', 'BÀI 3　-　これを　ください (Minnano Nihongo)', 'N5'),
(32, 'SC_04', 'BÀI 4　－そちらは　何時から　何時までですか', 'N5'),
(33, 'SC_05', 'BÀI 5　-　甲子園へ　いきますか', 'N5'),
(34, 'SC_06', 'BÀI 6　-　いっしょに　いきませんか', 'N5'),
(35, 'SC_07', 'BÀI 7　-　ごめんください', 'N5'),
(36, 'SC_08', 'BÀI 8　-　そろそろ　しつれいします', 'N5'),
(37, 'SC_09', 'BÀI 9　-　残念です', 'N5'),
(38, 'SC_10', 'BÀI 10-チリソースは　ありませんか', 'N5'),
(39, 'SC_11', 'BÀI 11　-　これ、お願いします', 'N5'),
(40, 'SC_12', 'BÀI 12　-　お祭りは　どうでしたか', 'N5'),
(41, 'SC_13', 'BÀI 13　-　別々に　お願いします', 'N5'),
(42, 'SC_14', 'BÀI 14　-　梅田まで　行ってください', 'N5'),
(43, 'SC_15', 'BÀI 15　-　ご家族は？', 'N5'),
(44, 'SC_16', 'BÀI 16　-　使い方を　教えてください', 'N5'),
(45, 'SC_17', 'BÀI 17　- どう　しましたか', 'N5'),
(46, 'SC_18', 'BÀI 18　- 趣味は　なんですか', 'N5'),
(47, 'SC_19', 'BÀI 19　- ダイエットは　明日から　します', 'N5'),
(48, 'SC_20', 'BÀI 20　- 夏休みは　どうするの？', 'N5'),
(49, 'SC_21', 'BÀI 21　- 私も　そう思います', 'N5'),
(50, 'SC_22', 'BÀI 22　- どんな　アパートが　いいですか', 'N5'),
(51, 'SC_23', 'BÀI 23　- どう　やって行きますか', 'N5'),
(52, 'SC_24', 'BÀI 24　- 手伝って　くれますか', 'N5'),
(53, 'SC_25', 'BÀI 25　- いろいろ　お世話に　なりました', 'N5'),
(54, 'SC_26', 'BÀI 26 - どこに　ごみを　出したら　いいですか', 'N4'),
(55, 'SC_27', 'BÀI 27 - 何でも　作れるんですね', 'N4'),
(56, 'SC_28', 'BÀI 28 - お茶でも　飲みながら･･････', 'N4'),
(57, 'SC_29', 'BÀI 29 - 忘れ物を　して　しまったんです', 'N4'),
(58, 'SC_30', 'BÀI 30 - チケットを　予約して　おきます', 'N4'),
(59, 'SC_31', 'BÀI 31 - インターネットを　始めようと　思って　います', 'N4'),
(60, 'SC_32', 'BÀI 32 - 病気かも　しれません', 'N4'),
(61, 'SC_33', 'BÀI 33 - これは　どういう　意味ですか', 'N4'),
(62, 'SC_34', 'BÀI 34 - する　とおりに　して　ください', 'N4'),
(63, 'SC_35', 'BÀI 35 - 旅行会社へ　行けば、わかります', 'N4'),
(64, 'SC_36', 'BÀI 36 - 頭と　体を　使うように　して　います', 'N4'),
(65, 'SC_37', 'BÀI 37 - 海を　埋め立てて　造られました', 'N4'),
(66, 'SC_38', 'BÀI 38 - 片付けるのが　好きなんです', 'N4'),
(67, 'SC_39', 'BÀI 39 - 遅れて、すみません', 'N4'),
(68, 'SC_40', 'BÀI 40 - 友達が　できたか　どうか、心配です', 'N4'),
(69, 'SC_41', 'BÀI 41 - 荷物を　預かって　いただけませんか', 'N4'),
(70, 'SC_42', 'BÀI 42 - ボーナスは　何に　使いますか', 'N4'),
(71, 'SC_43', 'BÀI 43 - 優しそうですね', 'N4'),
(72, 'SC_44', 'BÀI 44 - この　写真みたいに　して　ください', 'N4'),
(73, 'SC_45', 'BÀI 45 - 一生懸命　練習したのに', 'N4'),
(74, 'SC_46', 'BÀI 46 - もうすぐ　着く　はずです', 'N4'),
(75, 'SC_47', 'BÀI 47 - 婚約したそうです', 'N4'),
(76, 'SC_48', 'BÀI 48 - 休ませて　いただけませんか', 'N4'),
(77, 'SC_49', 'BÀI 49 - よろしく　お伝え　ください', 'N4'),
(78, 'SC_50', 'BÀI 50 - 心から　感謝いたします', 'N4');

-- --------------------------------------------------------

--
-- Table structure for table `readingvocabulary`
--

CREATE TABLE IF NOT EXISTS `readingvocabulary` (
  `readingvocabulary_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_id` int(11) NOT NULL,
  `readingvocabulary_hiragana` varchar(100) DEFAULT NULL,
  `readingvocabulary_meaning` varchar(100) DEFAULT NULL,
  `readingvocabulary_kanji` varchar(10) DEFAULT NULL,
  `readingvocabulary_type` varchar(50) NOT NULL,
  PRIMARY KEY (`readingvocabulary_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `readingvocabulary`
--

INSERT INTO `readingvocabulary` (`readingvocabulary_id`, `reading_id`, `readingvocabulary_hiragana`, `readingvocabulary_meaning`, `readingvocabulary_kanji`, `readingvocabulary_type`) VALUES
(1, 29, 'わたし', 'Tôi', '', 'Noun'),
(2, 29, 'わたしたち', 'chúng tôi, chúng ta', '', 'Noun'),
(3, 29, 'あなた', 'anh/ chị/ ông/ bà,', '', 'Noun'),
(4, 29, 'あのひと', 'người kia, người đó', 'あの人', 'Noun'),
(5, 29, 'あのかた', 'vị kia', 'あの方', 'Noun'),
(6, 29, 'みなさん', 'các anh chị, các ông bà, các bạn, quý vị', '皆さん', 'Noun'),
(10, 29, 'せんせい', 'thầy/ cô', '先生', 'Noun'),
(11, 29, 'きょうし', 'giáo viên', '教師', 'Noun'),
(12, 29, 'がくせい', 'học sinh, sinh viên', '学生', 'Noun'),
(13, 29, 'かいしゃいん', 'nhân viên công ty', '会社員', 'Noun'),
(14, 29, 'ぎんこういん', 'nhân viên ngân hàng', '銀行員', 'Noun'),
(15, 29, 'いしゃ', 'bác sĩ', '医者', 'Noun'),
(16, 29, 'けんきゅうしゃ', 'nhà nghiên cứu', '研究者', 'Noun'),
(17, 29, 'エンジニア', 'kỹ sư', '', 'Noun'),
(18, 29, 'だいがく', 'đại học, trường đại học', '大学', 'Noun'),
(19, 29, 'びょういん', 'bệnh viện', '病院', 'Noun'),
(20, 29, 'でんき', 'điện, đèn điện', '電気', 'Noun'),
(21, 29, 'しつれいですが ', 'xin lỗi,…', '失礼ですが', 'Noun'),
(22, 29, 'はじめまして。', 'Rất hân hạnh được gặp anh/chị (với người lần đầu tiên gặp, trước khi giới thiệu về mình)', '初めまして。', 'Noun'),
(23, 29, 'アメリカ', 'Mỹ', '', 'Noun'),
(24, 29, 'イギリス', 'Anh', '', 'Noun'),
(25, 29, 'インド ', 'Ấn Độ', '', 'Noun'),
(26, 29, 'インドネシア', 'Indonesia', '', 'Noun'),
(27, 29, 'かんこく', 'Hàn Quốc', '韓国', 'Noun'),
(28, 29, 'タイ', 'Thái Lan', '', 'Noun'),
(29, 29, 'ドイツ', 'Đức', '', 'Noun'),
(30, 29, 'にほん', 'Nhật Bản', '日本', 'Noun'),
(31, 29, 'フランス', 'Pháp', '', 'Noun'),
(32, 29, 'ブラジル', 'Braxin', '', 'Noun'),
(33, 30, 'ほん', 'sách', '本', 'Noun'),
(34, 30, 'じしょ', 'từ điển', '辞書', 'Noun'),
(35, 30, 'ざっし', 'tạp chí', '雑誌', 'Noun'),
(36, 30, 'しんぶん', 'Báo', '新聞', 'Noun'),
(37, 30, 'ノート', 'vở', '', 'Noun'),
(38, 30, 'てちょう', 'sổ tay', '手帳', 'Noun'),
(39, 30, 'めいし', 'danh thiếp', '名刺', 'Noun'),
(40, 30, 'カード', 'thẻ, cạc', '', 'Noun'),
(41, 30, 'テレホンカード', 'thẻ điện thoại', '', 'Noun'),
(42, 30, 'えんぴつ', 'bút chì', '鉛筆', 'Noun'),
(43, 30, 'ボールペン', 'bút bi', '', 'Noun'),
(44, 30, 'かぎ', 'chìa khóa', '鍵', 'Noun'),
(45, 30, 'とけい', 'đồng hồ', '時計', 'Noun'),
(46, 30, 'かさ', 'ô, dù', '傘', 'Noun'),
(47, 30, 'かばん', 'cặp sách, túi sách', '', 'Noun'),
(48, 30, '[カセット]テープ', 'băng [cát-xét]', '', 'Noun'),
(49, 30, 'テープレコーダー', 'máy ghi âm', '', 'Noun'),
(50, 30, 'テレビ', 'tivi', '', 'Noun'),
(51, 30, 'カメラ', 'máy ảnh', '', 'Noun'),
(52, 30, 'コンピューター', 'máy vi tính', '', 'Noun'),
(53, 30, 'じどうしゃ', 'ô tô, xe hơi', '自動車', 'Noun'),
(54, 30, 'つくえ', 'cái bàn', '', 'Noun'),
(55, 30, 'いす', 'cái ghế', '', 'Noun'),
(56, 30, 'チョコレート', 'Socola', '', 'Noun'),
(57, 31, 'きょうしつ', 'Phòng học, lớp học', '教室', 'Noun'),
(58, 31, 'しょくどう', 'nhà ăn', '食堂', 'Noun'),
(59, 31, 'じむしょ', 'Phòng làm việc', '事務所', 'Noun'),
(60, 31, 'かいぎしつ', 'Phòng họp', '会議室', 'Noun'),
(61, 31, 'うけつけ', 'tiếp tân, phòng thường trực', '受付', 'Noun'),
(62, 31, 'ロピー', 'hành lang, đại sảnh', '', 'Noun'),
(63, 31, 'へや', 'phòng', '部屋', 'Noun'),
(64, 31, 'おてあらい', 'Toilet, nhà vệ sinh', 'お手洗い', 'Noun'),
(65, 31, 'かいだん', 'cầu thang', '階段', 'Noun'),
(66, 31, 'エレベーター', 'thang máy', '', 'Noun'),
(67, 31, 'エスカレーター', 'thang cuốn', '', 'Noun'),
(68, 31, 'くに', 'đất nước', '国', 'Noun'),
(69, 31, 'かいしゃ', 'công ty', '会社', 'Noun'),
(70, 31, 'うち', 'nhà', '', 'Noun'),
(71, 31, 'でんわ', 'điện thoại', '電話', 'Noun'),
(72, 31, 'くつ', 'giày', '靴', 'Noun'),
(73, 31, 'ネクタイ', 'cà vạt', '', 'Noun'),
(74, 31, 'ワイン', 'rượu vang', '', 'Noun'),
(75, 31, 'たばこ', 'thuốc lá', '', 'Noun'),
(76, 31, 'うりば', 'quầy bán ( trong 1 bách hóa )', '売り場', 'Noun'),
(77, 31, 'ちか', 'tầng hầm', '地下', 'Noun'),
(78, 32, 'おきます', 'thức dậy', '起きます', 'Verb'),
(79, 32, 'ねます', 'ngủ', '寝ます', 'Verb'),
(80, 32, 'はたらきます', 'làm việc', '働きます', 'Verb'),
(81, 32, 'やすみます', 'nghỉ, nghỉ ngơi', '休みます', 'Verb'),
(82, 32, 'べんきょうします', 'học', '勉強します', 'Verb'),
(83, 32, 'おわります', 'hết, kết thúc, xong', '終わります', 'Verb'),
(84, 32, 'デパート', 'bách hóa', '', 'Noun'),
(85, 32, 'ぎんこう', 'ngân hàng', '銀行', 'Noun'),
(86, 32, 'ゆうびんきょく', 'bưu điện', '郵便局', 'Noun'),
(87, 32, 'としょかん', 'thư viện', '図書館', 'Noun'),
(88, 32, 'びじゅつかん', 'Bảo tàng mĩ thuật', '美術館', 'Noun'),
(89, 32, 'いま', 'bây giờ', '今', 'Adverb'),
(90, 32, 'ごぜん', 'sáng, trước 12h trưa', '午前', 'Adverb'),
(91, 32, 'ごご', 'chiều, sau 12h trưa', '午後', 'Adverb'),
(92, 32, 'あさ', 'buổi sáng, sáng', '朝', 'Noun'),
(93, 32, 'ひる', 'buổi trưa, trưa', '昼', 'Noun'),
(94, 32, 'ばん（よる）', 'buổi tối, đêm', '晩(夜)', 'Noun'),
(95, 32, 'おととい', 'hôm kia', '', 'Noun'),
(96, 32, 'きのう', 'hôm qua', '昨日', 'Noun'),
(97, 32, 'きょう', 'hôm nay', '今日', 'Noun'),
(98, 32, 'あした', 'ngày mai', '', 'Noun'),
(99, 32, 'あさって', 'ngày kia', '', 'Noun'),
(100, 33, 'いきます', 'đi', '行きます', 'Verb'),
(101, 33, 'きます', 'đến', '来ます', 'Verb'),
(102, 33, 'かえります', 'về', '帰ります', 'Verb'),
(103, 33, 'がっこう', 'trường học', '学校', 'Noun'),
(104, 33, 'スーパー', 'siêu thị', '', 'Noun'),
(105, 33, 'えき', 'nhà ga', '駅', 'Noun'),
(106, 33, 'ひこうき', 'máy bay', '飛行機', 'Noun'),
(107, 33, 'ふね', 'thuyền, tàu thủy', '船', 'Noun'),
(108, 33, 'でんしゃ', 'tàu điện', '電車', 'Noun'),
(109, 33, 'ちかてつ', 'tàu điện ngầm', '地下鉄', 'Noun'),
(110, 33, 'しんかんせん', 'tàu shinkansen ( tàu siêu tốc )', '新幹線', 'Noun'),
(111, 33, 'バス', 'xe bus', '', 'Noun'),
(112, 33, 'タクシー', 'taxi', '', 'Noun'),
(113, 33, 'じてんしゃ', 'xe đạp', '自転車', 'Noun'),
(114, 33, 'あるいて', 'đi bộ', '歩いて', 'Adverb'),
(115, 33, 'ひと', 'người', '人', 'Noun'),
(116, 33, 'ともだち', 'bạn bè, bằng hữu', '友達', 'Noun'),
(117, 33, 'かれ', 'anh ấy', '彼', 'Noun'),
(118, 33, 'かのじょ', 'cô ấy', '彼女', 'Noun'),
(119, 33, 'かぞく', 'gia đình', '家族', 'Noun'),
(120, 33, 'ひとりで', '1 mình', '一人で', 'Adverb'),
(121, 15, 'キッチン', 'bếp', '', 'Noun'),
(122, 15, 'おちゃわん', 'bát', '(お)茶碗', 'Noun'),
(123, 15, 'ワイングラス', 'cốc uống rượu', '', 'Noun'),
(124, 15, 'コーヒーカップ', 'cốc uống cà phê', '', 'Noun'),
(125, 15, 'れいぞうこ', 'tủ lạnh', '冷蔵庫', 'Noun'),
(126, 15, 'ガスレンジ', 'bếp ga', '', 'Noun'),
(127, 15, 'ガラスのコップ', 'cốc thủy tinh', '', 'Noun'),
(128, 15, 'レバー', 'Cần gạt vòi nước(rửa bát)', '', 'Noun'),
(129, 15, 'ながし', 'bồn rửa', '流し', 'Noun'),
(130, 15, 'いま', 'phòng khách', '居間', 'Noun'),
(131, 15, 'まどガラス', 'cửa sổ', '窓ガラス', 'Noun'),
(132, 15, 'あまど', 'cửa chớp, cửa che mưa', '雨戸', 'Noun'),
(133, 15, 'あみど', 'cửa lưới', '網戸', 'Noun'),
(134, 15, 'てんじょう', 'trần nhà', '天井', 'Noun'),
(135, 15, 'ゆか', 'sàn nhà', '床', 'Noun'),
(136, 15, 'コンセント', 'ổ cắm', '', 'Noun'),
(137, 15, 'コード', 'dây điện', '', 'Noun'),
(138, 15, 'エアコン', 'máy điều hòa không khí', '', 'Noun'),
(139, 15, 'ヒーター', 'lò sưởi', '', 'Noun'),
(140, 15, 'じゅうたん', 'thảm', '絨緞', 'Noun'),
(141, 15, 'エアコンのリモコン', 'điều khiển điều hòa', '', 'Noun'),
(142, 15, 'みずがこおる', 'nước đóng băng ', '水が凍る', 'Verb'),
(143, 15, 'れいとうしてほぞんする', 'bảo quản đông lạnh', '冷凍して保存する', 'Verb'),
(144, 15, 'でんげんをいれる', 'bật nguồn', '電源を入れる', 'Verb'),
(145, 15, 'じゅうたんをしく', 'trải thảm', 'じゅうたんを敷く', 'Verb');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `sentence`
--

INSERT INTO `sentence` (`s_id`, `s_hiragana`, `s_romaji`, `s_meaning`, `s_kanji`) VALUES
(1, 'わたしはがくせいです', 'watashi ha gakusei desu', 'Tôi là học sinh', '私は学生です'),
(2, 'あのひとはせんせいではありません', 'anohitohasenseidehaarimasen', 'Người kia không phải là giáo viên', 'あの人は先生ではありません'),
(3, 'わたしはベトナムじんです。', 'watashihabetonamujindesu', 'Tôi là người Việt Nam', '私はベトナム人です。'),
(4, 'これはえんぴつです、ポールペンじゃありません', 'korehaenpitsudesu, poorupenjaarimasen', 'Đây là bút chì, không phải bút bi', 'これは鉛筆です、ポールペンじゃありません'),
(5, 'あなたはにほんじんですか。', 'anatahanihonjindesuka', 'Bạn là người Nhật phải không?', 'あなたは日本人ですか。'),
(6, 'だいがくはどこですか。', 'daigakuhadokodesuka', 'Trường học ở đâu?', '大学はどこですか。'),
(7, 'おかあさんはなんさいですか。', 'okaasanhanansaidesuka', 'Mẹ bạn bao nhiêu tuổi?', 'お母さんはなんさいですか。'),
(8, 'せんせいはおいくつですか。', 'senseihaoikutsudesuka', 'Cô giáo bao nhiêu tuổi?', '先生はおいくつですか。'),
(9, 'これはしんぶんですか。', 'korehashinbundesuka', 'Đây là tờ báo phải không?', 'これは新聞ですか。'),
(10, 'あなたはじゅうはっさいですか。', 'anatahajuuhassaidesuka', 'Bạn 18 tuổi phải không?', 'あなたは十八歳ですか。'),
(11, 'これはしんぶんですか、ざっしですか', 'korehashinbundesuka,zasshidesuka', 'Đây là tờ báo hay tạp chí?', 'これは新聞ですか、雑誌ですか'),
(12, 'あなたはじゅうはっさいですか、はたちですか。', 'anatahajuuhassaidesuka,hatachidesuka', 'bạn 18 hay 20 tuổi?', 'あなたは十八歳ですか、二十歳ですか'),
(13, 'これはなんのほんですか。', 'korehanannohondesuka', 'Đây là sách gì vậy?', 'これはなんの本ですか。'),
(14, 'おてあらいはどこですか', 'otearaihadokodesuka', 'Nhà vệ sinh ở đâu?', 'お手洗いはどこですか'),
(15, 'エレベーターはどちらですか。', 'erebeetaahadochiradesuka', 'Thang máy ở chỗ nào ạ?', 'エレベーターはどちらですか。'),
(16, 'これはどこのコンピューターですか。', 'korehadokonokonpyuutaadesuka', 'Đây là máy tính của hãng ( nước ) nào vậy?', 'これはどこのコンピューターですか。'),
(17, 'あのひとはわたしのせんせいです', 'anohitohawatashinosenseidesu', 'Người kia là giáo viên của tôi', 'あの人は私の先生です。'),
(18, 'おてあらいはあそこです', 'otearaihaasokodesu', 'Nhà vệ sinh ở đằng kia', 'お手洗いはあそこです'),
(19, 'でんわは２かいです', 'denwaha2kaidesu', 'Điện thoại ở tầng 2', '電話は２階です'),
(20, 'やまださんはじむしょです。', 'yamadasanhajimushodesu', 'Anh Yamada đang ở phòng làm việc', '山田さんは事務所です。'),
(21, 'まいあさ　わたしは６じに　おきます。', 'maiasawatashiha6jiniokimasu', 'Hàng sáng tôi thức dậy lúc 6 giờ', '毎朝　私は６時に起きます'),
(22, 'きのう　わたしはごご５じに　たべました', 'kinouwatashitagogo5jinitabemashita', 'Hôm qua, tôi đã ăn cơm lúc 5 giờ chiều', '昨日　私は午後５時に食べました'),
(23, 'あした　わたしはがっこうにいきません', 'ashitawatashihagakkouniikimasen', 'Ngày mai tôi sẽ không đến trường', '明日　私は学校に行きません'),
(24, '７げつ２にち　に　にほんへ　きました', '7getsu2nichininihonhekimashita', 'Tôi đã đến Nhật vào ngày 2 tháng 7', '７月２日に日本へ来ました'),
(25, 'きのう　べんきょうしました', 'kinoubenkyoushimashita', 'Hôm qua tôi đã học bài', '昨日　勉強しました'),
(26, 'まいにち　８じから５じまではたらきます', 'mainichi8jkara5jimadehatarakimasu', 'Hàng ngày tôi làm việc từ 8 giờ sáng đến 5 giờ chiều', '毎日８時から５時まで働きます'),
(27, 'おおさかからとうきょうまで３じかんぐらいかかります', 'oosakakaratoukyoumade3jikanguraikakarimasu', 'Từ Osaka đến Tokyo mất khoảng 3 tiếng', '大阪から東京まで３時間ぐらいかかります'),
(28, 'とうきょうへいきます', 'toukyouheikimasu', 'Tôi đi Tokyo', '東京へ行きます'),
(30, 'どこもいきません', 'dokomoikimasen', 'Không đi đâu cả', 'どこも行きません'),
(31, 'なにもたべません', 'nanimotabemasen', 'Không ăn gì cả', '何も食べません'),
(32, 'だれもいません', 'daremoimasen', 'Không có ai cả', '誰もいません'),
(33, 'でんしゃでいきます', 'denshadeikimasu', 'Tôi đi bằng xe điện', '電車で行きます'),
(34, 'えきからあるいてかえりました', 'ekikaraaruitekaerimashita', 'Tôi đã đi bộ về từ nhà ga', '駅から歩いて帰りました'),
(35, 'わたしはすいえいぶのかいいんぼしゅうにおうじる', 'Watashiwasuieibunokaiinboshuunioujiru', 'Tôi đăng ký làm hội viên của câu lạc bộ bơi', '私は水泳部の会員募集に応じた'),
(36, 'しつもんにはいつもおうじますよ', 'shitsumonnihaitsumooujiruyo', 'lúc nào tôi cũng sẵn sàng trả lời câu hỏi ', '質問にはいつも応じますよ'),
(37, 'このしんせいひんはしょうひしゃのようきゅうにおうじたものだ', 'kono shinseihin ha shouhisha no youkyuu ni oujirumonoda', 'Sản phẩm mới này đáp ứng được yêu cầu của người tiêu dùng', 'この新製品は消費者の要求に応じたものだ'),
(38, 'すみませんがさきやくがあってごしょうたいにはおうじられません', 'sumimasengasakiyakugaattegoshoutainihaoujiru', 'Xin lỗi, vì có hẹn trước nên tôi không thể nhận lời mời của anh được', 'すみませんが先約があってご招待には応じられません'),
(39, 'しほんのかくちょう', 'shihonnokakuchou', 'mở rộng vốn', '資本の拡張'),
(40, 'えいぎょうをかくちょうする', 'eigyouwokakuchousuru', 'khuyếch trương việc kinh doanh', '営業を拡張する'),
(41, 'ごみしょりばをかくちょうする', 'gomishoribawokakuchousuru', 'mở rộng các bãi xử lý rác thải', 'ごみ処分場を拡張する'),
(42, 'こくがいからのとしをかくちょうさせるひつようせいをにんしきする', 'kokugaikaranotoushiwokakuchousaseruhitsuyouseiwoninshikisuru', 'nhận thức được tính thiết yếu phải mở rộng đầu tư từ nước ngoài', '国外からの投資を拡張させる必要性を認識する'),
(43, 'けんきゅうのかくちょう', 'kenkyuunokakuchou', 'sự mở rộng nghiên cứu', '研究の拡張'),
(44, 'こくさいぼうえきのかくちょう', 'kokusaibouekinokakuchou', 'sự mở rộng ngoại thương thế giới', '国際貿易の拡張'),
(45, 'へやにけむりがただよっている', 'heyanikemurigatadayoutteiru', 'trong phòng đầy khói', '部屋に煙が漂っている'),
(46, 'かおにまんぞくそうないろがただよっている', 'kaonimanzokusounairogatadayoutteiruu', 'vẻ thỏa mãn lộ ra mặt', '顔に満足そうな色が漂っている'),
(47, 'もくへんはうみにただよう', 'mokuhenhauminitadayou', 'mảnh gỗ nổi lềnh bềnh trên mặt biển', '木片は海に漂う'),
(48, 'ソフトウェアのふぐあいはどこ？', 'sofutoueanofuguaihadoko', 'lỗi của phần mềm là ở đâu?', 'ソフトウェアの不具合 はどこ？'),
(49, 'そつぎょうしたあと', 'sotsugyoushitaato', 'sau khi tốt nghiệp đại học', '卒業した後'),
(50, 'かのじょはもんだいをはやくしょりする', 'kanojohamondaiwohayakushorisuru', 'cô ta giải quyết vấn đề một cách nhanh nhẹn', '彼女は問題を早く処理する'),
(51, 'このほんにはくわしくせつめいはかかれていません', 'konohonnihakuwashikusetsumeihakakareteiru', 'Trong cuốn sách này, việc giải thích chi tiết không được viết rõ', 'この本には詳しく説明は書かれていません'),
(52, 'これはせかいでいちばんおおきいダイヤモンドだといわれている', 'korehasekaideichibanookidaiyamondodatoiwareteiru', 'Đây là chiếc kim cương được nói rằng lớn nhất thế giới', 'これは世界で一番大きいダイヤモンドだと言われている'),
(53, 'ちょっときぶんがわるいので、はやくかえらせてください', 'chottokubingawaruinodehayakukaerasetekudasai', 'Tôi cảm thấy trong người hơi mệt một chút, cho phép tôi về sớm được không?', 'ちょっと気分が悪いので、早く帰らせてください'),
(54, 'あなたのかいしゃのはなしをきかせてください', 'anatanokaishanohanashiwokikasetekudasai', 'Kể cho tôi nghe về công ty bạn có được không', 'あなたの会社の話を聞かせて下さい'),
(55, 'てをあらわせてください', 'tewoarawasetekudasai', 'Cho phép tôi rửa tay được không?', '手を洗わせて下さい'),
(56, 'こうえんのさくらいはいまがまんだいだ', 'kouennosakurahaimagamankaidaa', 'Hoa anh đào ở công viên hiện giờ đã nở tung.', '公園の桜は今が満開だ'),
(57, ' タバコが切れてぐちがさびしい', 'tabakogakireteguchigasabishii', 'hết thuốc lá, miệng nhạt nhẽo', 'タバコが切れて口が寂しい'),
(58, 'はなしあいてもなくてさびしい', 'hanashiaitemonakutesabishii', 'không có người nói chuyện cảm thấy cô đơn', '話相手もなくて寂しい'),
(59, 'さびしいむら', 'sabishiimura', 'Bản làng hẻo lánh', '寂しい村'),
(60, 'もんだいのちゅうしん', 'mondainochuushin', 'trung tâm của vấn đề', '話題の中心'),
(61, 'かのじょのうちはうつのみやのちゅうしんにある', 'kanojonouchihaUtsunomiyashinochuushinniaru', 'Nhà cô ấy ở trung tâm thành phố Utsunomiya.', '彼女の家は宇都宮市の中心にある'),
(62, 'オブジェクトしこうせっけいしゅほう', 'obujekkutoshikousekkeishuhou', 'Phương pháp thiết kế hướng đối tượng', 'オブジェクト指向設計手法'),
(63, 'くどうがたせっけいしゅほう', 'kudougatasekkeishuhou', 'Phương pháp thiết kế hướng sự kiện', 'イベント駆動型設計手法'),
(64, 'オブジェクトしこうせっけいしゅほうによるかいはつ', 'obujekkutoshikousekkeishuhouniyorukaihatsu', 'Sự phát triển dựa vào thiết kế hướng đối tượng', 'オブジェクト指向設計手法による開発'),
(65, 'ぐんじかんよ', 'gunjikanyo', 'tham gia quân sự', '軍事関与'),
(66, 'せいじうんどうへのかんよ', 'seijiundouhenokanyo', 'tham gia các hoạt động chính trị', '政治運動への関与'),
(67, 'けんかさわぎへのかんよ', 'kenkasawagihenokanyo', 'liên quan đến vụ cãi nhau', 'けんか騒ぎへの関与'),
(68, 'かいしゃのせいせいにかんよ', 'kaishanoseiseinikanyo', 'tham gia vào sự thành lập của công ty', '会社の生成に関与する'),
(69, 'スキャンダルにかんよする', 'sukyandarunikanyosuru', 'liên quan đến vụ xì căng đan', 'スキャンダルに関与する'),
(70, 'こどものゆうかいにかんよする', 'kodomonoyuukainikanyo', 'tham gia vào vụ bắt cóc trẻ em', '子供の誘拐に関与する');

-- --------------------------------------------------------

--
-- Table structure for table `sourcefile`
--

CREATE TABLE IF NOT EXISTS `sourcefile` (
  `sourcefile_id` int(11) NOT NULL AUTO_INCREMENT,
  `lis_id` int(11) NOT NULL,
  `sourcefile_file` varchar(100) NOT NULL,
  `sourcefile_question` varchar(5000) NOT NULL,
  `sourcefile_script` varchar(5000) NOT NULL,
  `sourcefile_meaning` varchar(5000) NOT NULL,
  `sourcefile_answer` varchar(100) NOT NULL,
  PRIMARY KEY (`sourcefile_id`),
  KEY `lis_id` (`lis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sourcefile`
--

INSERT INTO `sourcefile` (`sourcefile_id`, `lis_id`, `sourcefile_file`, `sourcefile_question`, `sourcefile_script`, `sourcefile_meaning`, `sourcefile_answer`) VALUES
(1, 1, 'LUYENNGHEN2N3BAI1PHAN1.mp3', '女の人の息子がかいた絵はどれですか。\r\n\r\n    a)キーワード下の大きい四角、この三角は。本当は丸いんだけどね。\r\n\r\n   b)本当は丸いんだけどね.\r\n\r\n   c)マスクのつもりなのよ。\r\n\r\n   d)髪のリボンがかわいいでしょ.', '女：息子が幼稚園でかいてきたんだけど、これが私の顔だって。\r\n\r\n男：ふーん、下の大きい四角、それは何。\r\n\r\n女：これはね、マスクのつもりなのよ。\r\n\r\n男：じゃ、この三角は。\r\n\r\n女：これはめがねなの、本当は丸いんだけどね。髪のリボンがかわいいでしょ。', 'F: Cái này con trai tôi vẽ ở trường mẫu giáo đấy, nghe nói là cái mặt của tôi.\r\n\r\nM: Phù, cái hình tứ giác to nằm bên dưới là cái gì vậy?\r\n\r\nF: Cái này hả, định là cái khẩu trang đấy.\r\n\r\nM: Vậy thì cái tam giác này là.\r\n\r\nF: Cái này là mắt kính đấy, thiệt ra thì là hình tròn nhưng mà...Còn cái nơ cột tóc dễ thương hén.', 'A'),
(2, 1, 'LUYENNGHEN2N3BAI1PHAN2.mp3', '男の人の先輩はどの人ですか.\r\n\r\na)顔は細長くて額が広い・・・。\r\n\r\nb)額が広いから目立つらしんだけど。\r\n\r\nc)どんな人か聞い.\r\n\r\nd)先輩には一度も会った事がないんだ。', '女：どうしたの、心配そうな顔して。\r\n\r\n男：うん、今から先輩の会社を訪問するんだけど、分かるかなあ、先輩には一度も会った事がないんだ。\r\n\r\n女：どんな人か聞いてないの。\r\n\r\n男：顔は、細長くて額が広い・・・。とにかく額が広いから目立つらしんだけど。\r\n', 'Phụ nữ: Chuyện gì vậy, mặt trông có vẻ lo lắng.\r\n\r\nĐàn ông: Ừ, giờ đi thăm công ty của đàn anh đấy, chắc hiểu chứ gì, chưa từng gặp đàn anh dù chỉ một lần.\r\n\r\nPhụ nữ: Người như thế nào, không hỏi à?\r\n\r\nĐàn ông: Mặt thì thon dài, trán rộng...Dù sao thì vì trán rộng nên chắc cũng nổi bật dễ nhận biết.\r\n', 'B'),
(3, 5, 'LUYENNGHEN4N5BAI1PHAN1.mp3', '女の人が会社の場所を説明しています。女の人の会社は、どこにありますか.\r\n\r\nA: 7階\r\n\r\nB: 8階-左\r\n\r\nC: 8階-右\r\n\r\nD: 10階\r\n', '駅のかいさつ口を出ると、すぐ大きい道があります。その道をわたって、左へ少し歩くと右側に大きい階段があります。その階段を上がって左側のビルの８階です', 'Câu hỏi: Người phụ nữ giải thích địa điểm của công ty. Công ty của người phụ nữ ở đâu?\r\n\r\nBước ra khỏi cổng soát vé của nhà ga, thì sẽ thấy ngay con đường lớn. Băng qua con đường đó, đi bộ một chút về phía tay trái thì sẽ thấy cầu thang lớn ở phía tay phải. Bước lên cầu thang đó, công ty nằm ở tầng 8 của tòa nhà bên trái.', 'B'),
(4, 5, 'LUYENNGHEN4N5BAI1PHAN2.mp3', '男の人が旅館の場所を教えています。旅館は、どこですか。\r\n\r\nA: まっすぐ行く\r\n\r\nB: つきあたり\r\n\r\nC: おうだんほどう\r\n\r\nD: 100メートルまっすぐ行く, 左折\r\n', '松野屋ですか。ああ、あの有名な旅館ね。この道を行って、次の次の角を右にまがって、二本目のせまい道をもう一度右にまがると、左側にありますよ。大きいから、すぐわかりますよ', 'Câu hỏi: Người đàn ông chỉ địa điểm của nhà trọ. Nhà trọ ở đâu?\r\n\r\nMatsunoya hả? À, cái nhà trọ nổi tiếng kia hả. Đi thẳng con đường này, rẽ phải ở ngã tư kế, kế nữa, tới con đường nhỏ thứ hai thì rẽ phải một lần nữa, nó nằm bên tay trái. Vì nó to lớn nên nhận ra ngay thôi.', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_title` varchar(20) NOT NULL,
  `test_category` varchar(50) NOT NULL,
  `test_level` varchar(10) NOT NULL,
  `test_content` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_title`, `test_category`, `test_level`, `test_content`) VALUES
(1, 'N3_Bunpou_001', 'Grammar', 'N3', ''),
(2, 'N3_Bunpou_002', 'Grammar', 'N3', ''),
(3, 'N3_Dokkai_001', 'Reading', 'N3', 'スミスさんとキムさんが、スポーツ教室の前で話しています。 スミス「あ、キムサン。どの教室に入るかもうきめましたか。」\r\n\r\nキム「いいえ、まだ（A）。すいえい教室はむずかしいでしょうか。」 スミス「すいえいはたいへんですよ。はじめてならテニスのほうがいいかもしれません。私は去年仕事が終ってからテニス教室に通っていました。」\r\n\r\nキム「テニスは少しやったことがあります。去年のテスト教室では（B）。」 スミス「正しいうちかたを習ったり、４にんで試合をしたりしました。楽しかったですよ。」\r\n\r\nキム「テニスがうまくなりそうですね。」 スミス「ええ。でも、始まる時間に（C）、ねんしゅうのやりかたがわからなくてこまりますよ。」\r\n\r\nキム「だいじょうぶです。私の仕事はいつも５時に終わりますから。」 スミス「（D）。じゃあ、時間に間に合いますね。'),
(4, 'N3_Dokkai_002', 'Reading', 'N3', '私の町は、秋のおまつりで有名だ。このおまつりは、こめや野菜がたくさんできたことをよろこぶもので、毎年１０月に行われる。\r\nこの日、町の男の人は水をあびて白い服を着る。そして、山の上の神社まで走る。いちばん先に神社についた人がいちばん強い男の人だ。いちばんになろうとして、みんな一生懸命走る。さいがのひとがじんじゃに着いてから、みんなでお酒を飲んで、特別な野菜料理を食べる。みんなたくさん食べるから、女の人は前の日の夜からねないで野菜料理を作る。\r\nおまつりの日には町じゅうの子どもたちがじんじゃに集まって、大人と、いっしょに楽しむ。歌やおどりが上手な子どもが、みんなの前で歌ったりおどったりする。この子どもたちは２か月前にえらばれて、毎日れんしゅうするので、歌もおどりもとてもりっぱだ。'),
(5, 'N3_Moji_001', 'Vocabulary', 'N3', ''),
(6, 'N3_Moji_002', 'Vocabulary', 'N3', ''),
(7, 'N3_Choukai_001', 'Listening', 'N3', 'ChoukaiN3Test1.mp3'),
(8, 'N3_Choukai_002', 'Listening', 'N3', 'ChoukaiN3Test2.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `trackingmark`
--

CREATE TABLE IF NOT EXISTS `trackingmark` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `tm_mark` varchar(11) DEFAULT NULL,
  `tm_date` date DEFAULT NULL,
  PRIMARY KEY (`tm_id`),
  KEY `u_id` (`u_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `traininglistening`
--

CREATE TABLE IF NOT EXISTS `traininglistening` (
  `lis_id` int(11) NOT NULL AUTO_INCREMENT,
  `lis_title` varchar(500) NOT NULL,
  `lis_level` varchar(10) NOT NULL,
  PRIMARY KEY (`lis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `traininglistening`
--

INSERT INTO `traininglistening` (`lis_id`, `lis_title`, `lis_level`) VALUES
(1, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P1', 'N2N3'),
(2, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P2', 'N2N3'),
(3, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P3', 'N2N3'),
(4, 'Choukai(これで大丈夫)_N2&N3_絵のある問題_P4', 'N2N3'),
(5, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P1', 'N4N5'),
(6, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P2', 'N4N5'),
(7, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P3', 'N4N5'),
(8, 'Choukai(これで大丈夫)_N4&N5_絵のある問題_P4', 'N4N5');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_password`, `u_role`, `u_fullname`, `u_email`, `u_registerdate`, `u_status`) VALUES
(1, 'Superadmin', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Phạm Tiến Đạt', 'datptse02338@fpt.edu.vn', '2014-08-03', 1),
(2, 'datpham', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'Pham Tien Dat', 'datptse02331@fpt.edu.vn', '2014-08-12', 1),
(3, 'namlec12', '0d867780eebaf47c79753f3a6a3797da', 2, 'Le Nam', 'namldse923@gmail.com', '2014-08-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_facebook`
--

CREATE TABLE IF NOT EXISTS `user_facebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `locale` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `timezone` varchar(10) DEFAULT NULL,
  `updated_time` varchar(50) DEFAULT NULL,
  `verified` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vi_id` int(11) NOT NULL AUTO_INCREMENT,
  `vi_title` varchar(200) NOT NULL,
  `vi_link` varchar(200) NOT NULL,
  PRIMARY KEY (`vi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vi_id`, `vi_title`, `vi_link`) VALUES
(1, 'Mùa Hoa Anh-Đào Nhật-Bản', '//www.youtube.com/embed/xIaTf9kbZJw'),
(2, 'Học tiếng nhật online bài 1: Chào hỏi và tự giới thiệu', '//www.youtube.com/embed/JCKgCoIOKbs'),
(3, 'Cách viết tiếng Nhật | Cách viết bảng chữ cái tiếng Nhật', '//www.youtube.com/embed/fXvmcjdAYsQ'),
(4, 'Học tiếng Nhật cùng Erin - Bài 2 - Cách nhờ giúp đỡ', '//www.youtube.com/embed/_I6lYTK4yOg'),
(5, 'Học tiếng Nhật cùng Erin - Bài 3 - Cách chỉ đồ vật', '//www.youtube.com/embed/Lx-BmCYMw7o'),
(6, 'Học tiếng Nhật cùng Erin - Bài 4 - basho wo kiku - Hỏi vị trí', '//www.youtube.com/embed/9HOoPjZb-ss'),
(7, 'Học tiếng Nhật cùng Erin - Bài 5 - Cách hỏi thời gian', '//www.youtube.com/embed/ciFCw71Re4k'),
(8, 'Học tiếng Nhật cùng Erin - Bài 6: Cách hỏi giá cả', '//www.youtube.com/embed/3BqCdXdSzcc'),
(9, 'Học tiếng Nhật cùng Erin: Bài 7- Cách nói sở thích', '//www.youtube.com/embed/T45P554vuG4'),
(10, 'Luyện nghe tiếng Nhật N5 có đáp án - Phần 1', '//www.youtube.com/embed/P3anHN8GRZg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `vocabulary`
--

INSERT INTO `vocabulary` (`v_id`, `v_hiragana`, `v_romaji`, `v_status`) VALUES
(1, 'かくちょう', 'kakuchou', 1),
(2, 'ただよう', 'tadayou', 1),
(3, 'おうじる', 'oujiru', 1),
(4, 'ふぐあい', 'fuguai', 1),
(5, 'そつぎょう', 'sotsugyou', 1),
(6, 'しょり', 'shori', 1),
(7, 'さくら', 'sakura', 1),
(8, 'さびしい', 'sabishii', 1),
(9, 'ちゅうしん', 'chuushin', 1),
(10, 'せっけい', 'sekkei', 1),
(11, 'かんよ', 'kanyo', 1);

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
(6, 35),
(7, 36),
(8, 37),
(7, 38),
(1, 39),
(2, 39),
(1, 40),
(1, 41),
(1, 42),
(2, 43),
(2, 44),
(3, 45),
(4, 46),
(5, 47),
(9, 48),
(10, 49),
(11, 50),
(12, 56),
(14, 57),
(13, 58),
(15, 59),
(16, 60),
(16, 61),
(17, 62),
(17, 63),
(17, 64),
(18, 65),
(18, 66),
(18, 67),
(19, 68),
(19, 69),
(19, 70);

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
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `vocabularysentence`
--
ALTER TABLE `vocabularysentence`
  ADD CONSTRAINT `vocabularysentence_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `meaning` (`m_id`),
  ADD CONSTRAINT `vocabularysentence_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sentence` (`s_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
