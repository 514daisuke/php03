-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 01 日 13:02
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d08_05_prod`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `caregiver_info`
--

CREATE TABLE `caregiver_info` (
  `carer_id` int(10) NOT NULL COMMENT '介護者ID',
  `carer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '介護者_氏名',
  `carer_rubi_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '介護者_氏名_カナ',
  `create_at` datetime NOT NULL COMMENT '介護者_登録日',
  `update_at` datetime NOT NULL COMMENT '介護者_更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `send_note`
--

CREATE TABLE `send_note` (
  `id` int(10) NOT NULL COMMENT '利用者ID',
  `hand_over_id` int(10) NOT NULL COMMENT '申し送りID',
  `carer_id` int(10) NOT NULL COMMENT '介護者ID',
  `hand_over_kind` int(1) NOT NULL COMMENT '申し送り種別(0=Null,1=事業所,2=入院,3=退院,4=通院,5=薬 4=通院4=薬)',
  `hand_over_text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申し送り記録',
  `create_at` datetime NOT NULL COMMENT '申し送り登録日',
  `update_at` datetime NOT NULL COMMENT '申し送り更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_config`
--

CREATE TABLE `user_config` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `user_config`
--

INSERT INTO `user_config` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '小石大介', 'password', 1, 0, '2021-06-28 22:22:39', '2021-06-28 22:22:39'),
(2, '小石一郎', 'password', 1, 0, '2021-06-28 22:23:26', '2021-06-28 22:23:26'),
(3, '小石次郎', 'password', 1, 0, '2021-06-28 22:23:26', '2021-06-28 22:23:26'),
(4, '小石三郎', 'password', 1, 0, '2021-06-28 22:23:26', '2021-06-28 22:23:26'),
(5, '小石四郎', 'password', 1, 0, '2021-06-28 22:23:26', '2021-06-28 22:23:26'),
(6, '小石五郎', 'password', 1, 0, '2021-06-28 22:23:26', '2021-06-28 22:23:26');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_hospital`
--

CREATE TABLE `user_hospital` (
  `id` int(12) NOT NULL,
  `hospitalname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_info`
--

CREATE TABLE `user_info` (
  `id` int(12) NOT NULL COMMENT '利用者ID',
  `no` int(12) DEFAULT NULL COMMENT '申し送りno.',
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '利用者名前',
  `first_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '利用者氏名_性',
  `last_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '利用者氏名_名',
  `rubi_first_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '利用者氏名_性_カナ',
  `rubi_last_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '利用者氏名_名_カナ',
  `brithday` date NOT NULL COMMENT '利用者生年月日',
  `age` int(3) NOT NULL COMMENT '利用者年齢',
  `sex` int(1) NOT NULL COMMENT '利用者性別',
  `recoder` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '介護記録者（別テーブル移管予定）',
  `memo` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申し送り（別テーブル移管予定）\r\n',
  `created_at` date NOT NULL COMMENT '利用者登録日',
  `updated_at` date NOT NULL COMMENT '利用者更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `user_info`
--

INSERT INTO `user_info` (`id`, `no`, `name`, `first_name`, `last_name`, `rubi_first_name`, `rubi_last_name`, `brithday`, `age`, `sex`, `recoder`, `memo`, `created_at`, `updated_at`) VALUES
(1, 1, 'テスト太郎', '', '', '', '', '1990-05-21', 0, 0, '小石大介', '今日は体調わるい', '2021-06-24', '2021-06-27'),
(3, 3, 'テストサン', '', '', '', '', '1970-12-21', 0, 0, '小石大介', '今日はだめ！', '2021-06-24', '2021-06-24'),
(4, 4, 'テスト介', '', '', '', '', '1970-01-21', 0, 0, '小石大介', '今日は元気ないです！', '2021-06-24', '2021-06-24'),
(5, 5, 'テストはじめ', '', '', '', '', '1980-03-21', 0, 0, '小石大介', '今日は寝不足！', '2021-06-24', '2021-06-24'),
(6, 6, 'テスト五郎', '', '', '', '', '2000-04-21', 0, 0, '小石大介', '今日は眠そう！', '2021-06-24', '2021-06-24'),
(7, 7, 'テストにいさん', '', '', '', '', '2010-11-21', 0, 0, '小石大介', '今日は遊び足りない！', '2021-06-24', '2021-06-24'),
(8, 14, 'JOJO', '', '', '', '', '2021-06-24', 0, 0, 'JOJO', 'wryyy', '2021-06-24', '2021-06-24'),
(9, 5, 'テスト子', '', '', '', '', '1960-01-01', 0, 0, 'JOJO', 'hooo', '2021-06-24', '2021-06-24');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_medicine`
--

CREATE TABLE `user_medicine` (
  `id` int(12) NOT NULL,
  `medicine_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `caregiver_info`
--
ALTER TABLE `caregiver_info`
  ADD PRIMARY KEY (`carer_id`);

--
-- テーブルのインデックス `send_note`
--
ALTER TABLE `send_note`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_config`
--
ALTER TABLE `user_config`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `hospital_id` (`id`) USING BTREE;

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `caregiver_info`
--
ALTER TABLE `caregiver_info`
  MODIFY `carer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '介護者ID';

--
-- テーブルの AUTO_INCREMENT `send_note`
--
ALTER TABLE `send_note`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '利用者ID';

--
-- テーブルの AUTO_INCREMENT `user_config`
--
ALTER TABLE `user_config`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '利用者ID', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
