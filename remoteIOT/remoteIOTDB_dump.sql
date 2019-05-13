-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 27 Ιουν 2017 στις 10:17:25
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `remoteIOT`
--
CREATE DATABASE IF NOT EXISTS `mecieuca_remoteIOT` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mecieuca_remoteIOT`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `remoteController`
--

CREATE TABLE IF NOT EXISTS `remoteController` (
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `remoteController`
--

INSERT INTO `remoteController` (`name`) VALUES
('PowerOff'),
('Input'),
('GGuide'),
('EPG'),
('Favorites'),
('Display'),
('Home'),
('Options'),
('Return'),
('Up'),
('Down'),
('Right'),
('Left'),
('Confirm'),
('Red'),
('Green'),
('Yellow'),
('Blue'),
('Num1'),
('Num2'),
('Num3'),
('Num4'),
('Num5'),
('Num6'),
('Num7'),
('Num8'),
('Num9'),
('Num0'),
('Num11'),
('Num12'),
('VolumeUp'),
('VolumeDown'),
('Mute'),
('ChannelUp'),
('ChannelDown'),
('SubTitle'),
('ClosedCaption'),
('Enter'),
('DOT'),
('Analog'),
('Teletext'),
('Exit'),
('Analog2'),
('*AD'),
('Digital'),
('Analog?'),
('BS'),
('CS'),
('BSCS'),
('Ddata'),
('PicOff'),
('Tv_Radio'),
('Theater'),
('SEN'),
('InternetWidgets'),
('InternetVideo'),
('Netflix'),
('SceneSelect'),
('Mode3D'),
('iManual'),
('Audio'),
('Wide'),
('Jump'),
('PAP'),
('MyEPG'),
('ProgramDescription'),
('WriteChapter'),
('TrackID'),
('TenKey'),
('AppliCast'),
('acTVila'),
('DeleteVideo'),
('PhotoFrame'),
('TvPause'),
('KeyPad'),
('Media'),
('SyncMenu'),
('Forward'),
('Play'),
('Rewind'),
('Prev'),
('Stop'),
('Next'),
('Rec'),
('Pause'),
('Eject'),
('FlashPlus'),
('FlashMinus'),
('TopMenu'),
('PopUpMenu'),
('RakurakuStart'),
('OneTouchTimeRec'),
('OneTouchView'),
('OneTouchRec'),
('OneTouchStop'),
('DUX'),
('FootballMode'),
('Social'),
('PowerOn');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
