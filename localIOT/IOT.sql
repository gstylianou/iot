-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 21 Ιουν 2017 στις 18:28:34
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `IOT`
--
CREATE DATABASE IF NOT EXISTS `IOT` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `IOT`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `defaults`
--

CREATE TABLE IF NOT EXISTS `defaults` (
  `ip` text NOT NULL,
  `authkey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `defaults`
--

INSERT INTO `defaults` (`ip`, `authkey`) VALUES
('http://192.168.2.15', '1234');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `remoteController`
--

CREATE TABLE IF NOT EXISTS `remoteController` (
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `remoteController`
--

INSERT INTO `remoteController` (`name`, `value`) VALUES
('PowerOff', 'AAAAAQAAAAEAAAAvAw=='),
('Input', 'AAAAAQAAAAEAAAAlAw=='),
('GGuide', 'AAAAAQAAAAEAAAAOAw=='),
('EPG', 'AAAAAgAAAKQAAABbAw=='),
('Favorites', 'AAAAAgAAAHcAAAB2Aw=='),
('Display', 'AAAAAQAAAAEAAAA6Aw=='),
('Home', 'AAAAAQAAAAEAAABgAw=='),
('Options', 'AAAAAgAAAJcAAAA2Aw=='),
('Return', 'AAAAAgAAAJcAAAAjAw=='),
('Up', 'AAAAAQAAAAEAAAB0Aw=='),
('Down', 'AAAAAQAAAAEAAAB1Aw=='),
('Right', 'AAAAAQAAAAEAAAAzAw=='),
('Left', 'AAAAAQAAAAEAAAA0Aw=='),
('Confirm', 'AAAAAQAAAAEAAABlAw=='),
('Red', 'AAAAAgAAAJcAAAAlAw=='),
('Green', 'AAAAAgAAAJcAAAAmAw=='),
('Yellow', 'AAAAAgAAAJcAAAAnAw=='),
('Blue', 'AAAAAgAAAJcAAAAkAw=='),
('Num1', 'AAAAAQAAAAEAAAAAAw=='),
('Num2', 'AAAAAQAAAAEAAAABAw=='),
('Num3', 'AAAAAQAAAAEAAAACAw=='),
('Num4', 'AAAAAQAAAAEAAAADAw=='),
('Num5', 'AAAAAQAAAAEAAAAEAw=='),
('Num6', 'AAAAAQAAAAEAAAAFAw=='),
('Num7', 'AAAAAQAAAAEAAAAGAw=='),
('Num8', 'AAAAAQAAAAEAAAAHAw=='),
('Num9', 'AAAAAQAAAAEAAAAIAw=='),
('Num0', 'AAAAAQAAAAEAAAAJAw=='),
('Num11', 'AAAAAQAAAAEAAAAKAw=='),
('Num12', 'AAAAAQAAAAEAAAALAw=='),
('VolumeUp', 'AAAAAQAAAAEAAAASAw=='),
('VolumeDown', 'AAAAAQAAAAEAAAATAw=='),
('Mute', 'AAAAAQAAAAEAAAAUAw=='),
('ChannelUp', 'AAAAAQAAAAEAAAAQAw=='),
('ChannelDown', 'AAAAAQAAAAEAAAARAw=='),
('SubTitle', 'AAAAAgAAAJcAAAAoAw=='),
('ClosedCaption', 'AAAAAgAAAKQAAAAQAw=='),
('Enter', 'AAAAAQAAAAEAAAALAw=='),
('DOT', 'AAAAAgAAAJcAAAAdAw=='),
('Analog', 'AAAAAgAAAHcAAAANAw=='),
('Teletext', 'AAAAAQAAAAEAAAA/Aw=='),
('Exit', 'AAAAAQAAAAEAAABjAw=='),
('Analog2', 'AAAAAQAAAAEAAAA4Aw=='),
('*AD', 'AAAAAgAAABoAAAA7Aw=='),
('Digital', 'AAAAAgAAAJcAAAAyAw=='),
('Analog?', 'AAAAAgAAAJcAAAAuAw=='),
('BS', 'AAAAAgAAAJcAAAAsAw=='),
('CS', 'AAAAAgAAAJcAAAArAw=='),
('BSCS', 'AAAAAgAAAJcAAAAQAw=='),
('Ddata', 'AAAAAgAAAJcAAAAVAw=='),
('PicOff', 'AAAAAQAAAAEAAAA+Aw=='),
('Tv_Radio', 'AAAAAgAAABoAAABXAw=='),
('Theater', 'AAAAAgAAAHcAAABgAw=='),
('SEN', 'AAAAAgAAABoAAAB9Aw=='),
('InternetWidgets', 'AAAAAgAAABoAAAB6Aw=='),
('InternetVideo', 'AAAAAgAAABoAAAB5Aw=='),
('Netflix', 'AAAAAgAAABoAAAB8Aw=='),
('SceneSelect', 'AAAAAgAAABoAAAB4Aw=='),
('Mode3D', 'AAAAAgAAAHcAAABNAw=='),
('iManual', 'AAAAAgAAABoAAAB7Aw=='),
('Audio', 'AAAAAQAAAAEAAAAXAw=='),
('Wide', 'AAAAAgAAAKQAAAA9Aw=='),
('Jump', 'AAAAAQAAAAEAAAA7Aw=='),
('PAP', 'AAAAAgAAAKQAAAB3Aw=='),
('MyEPG', 'AAAAAgAAAHcAAABrAw=='),
('ProgramDescription', 'AAAAAgAAAJcAAAAWAw=='),
('WriteChapter', 'AAAAAgAAAHcAAABsAw=='),
('TrackID', 'AAAAAgAAABoAAAB+Aw=='),
('TenKey', 'AAAAAgAAAJcAAAAMAw=='),
('AppliCast', 'AAAAAgAAABoAAABvAw=='),
('acTVila', 'AAAAAgAAABoAAAByAw=='),
('DeleteVideo', 'AAAAAgAAAHcAAAAfAw=='),
('PhotoFrame', 'AAAAAgAAABoAAABVAw=='),
('TvPause', 'AAAAAgAAABoAAABnAw=='),
('KeyPad', 'AAAAAgAAABoAAAB1Aw=='),
('Media', 'AAAAAgAAAJcAAAA4Aw=='),
('SyncMenu', 'AAAAAgAAABoAAABYAw=='),
('Forward', 'AAAAAgAAAJcAAAAcAw=='),
('Play', 'AAAAAgAAAJcAAAAaAw=='),
('Rewind', 'AAAAAgAAAJcAAAAbAw=='),
('Prev', 'AAAAAgAAAJcAAAA8Aw=='),
('Stop', 'AAAAAgAAAJcAAAAYAw=='),
('Next', 'AAAAAgAAAJcAAAA9Aw=='),
('Rec', 'AAAAAgAAAJcAAAAgAw=='),
('Pause', 'AAAAAgAAAJcAAAAZAw=='),
('Eject', 'AAAAAgAAAJcAAABIAw=='),
('FlashPlus', 'AAAAAgAAAJcAAAB4Aw=='),
('FlashMinus', 'AAAAAgAAAJcAAAB5Aw=='),
('TopMenu', 'AAAAAgAAABoAAABgAw=='),
('PopUpMenu', 'AAAAAgAAABoAAABhAw=='),
('RakurakuStart', 'AAAAAgAAAHcAAABqAw=='),
('OneTouchTimeRec', 'AAAAAgAAABoAAABkAw=='),
('OneTouchView', 'AAAAAgAAABoAAABlAw=='),
('OneTouchRec', 'AAAAAgAAABoAAABiAw=='),
('OneTouchStop', 'AAAAAgAAABoAAABjAw=='),
('DUX', 'AAAAAgAAABoAAABzAw=='),
('FootballMode', 'AAAAAgAAABoAAAB2Aw=='),
('Social', 'AAAAAgAAABoAAAB0Aw=='),
('PowerOn', 'null');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
