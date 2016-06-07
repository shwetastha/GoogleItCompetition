-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2013 at 05:06 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `googling_challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin-id` int(11) NOT NULL AUTO_INCREMENT,
  `admin-name` varchar(100) NOT NULL,
  `admin-password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin-id`, `admin-name`, `admin-password`) VALUES
(1, 'admin', 'admin'),
(2, 'sagar', 'sagar');

-- --------------------------------------------------------

--
-- Table structure for table `qanda`
--

CREATE TABLE IF NOT EXISTS `qanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(5000) NOT NULL,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`id`, `question`, `answer`) VALUES
(1, 'The man credited with the quote “The whole is greater than the sum of its parts” thought the world was made up of five elements. Which of the five is not an earthly element?', 'Aether'),
(2, 'In 1990, which known planet was furthest from the Sun?', 'Neptune'),
(3, 'What word is the subject of songs by Pink Floyd, ABBA, the Rolling Stones and Monty Python?', 'Money'),
(4, 'By what name is Ramón Gerardo Antonio Estévez better known?\r\n', 'Martin Sheen\r\n'),
(5, 'On what household object would you find a "punt"?', 'Wine bottle'),
(6, 'What is the technical term for the covering at the end of your shoelaces? (And other questions on the same theme, e.g. a baby platypus or echidna - or a cross between a pug and a beagle - is a "puggle",  sudoku means "single digit", etc.)', 'Aglet'),
(7, 'The hero of a comic first published in 1934 was a Yale Graduate and a polo player - and he had a memorable name. He had a different name in Australia though; what was it?', 'Speed Gordon'),
(8, 'In his day, a 14th Century rector was famous for discovering the healing quality of the waters at Schorne Well. Today he’s remembered for inspiring a children’s toy. What toy?', 'Jack-in-the-Box toy'),
(9, '9.	What military rank was posthumously awarded to the U.S. President known for the shortest inaugural address?What military rank was posthumously awarded to the U.S. President known for the shortest inaugural address?', 'General of Armies (a 6-star General), the highest rank in U.S. military history'),
(10, 'In what year did the first European man to correctly describe the function of pulmonary circulation die?', '1553'),
(11, 'On what day of the week was the weekly White House party thrown by the woman for whom the term “First Lady” was coined?', 'Wednesday'),
(12, 'The first king to rule the House of Lancaster chose a wife who became unpopular with the people. For what crime was she convicted?', 'witchcraft'),
(13, 'What is produced when the element discovered by Joseph Priestly reacts with the metal manufactured by his “mad” brother-in-law?', 'Iron Oxide or Rust'),
(14, 'In what room of the White House did a U.S. President marry the youngest First Lady?', 'The Blue Room'),
(15, 'You just popped open a bottle of champagne in the country that’s the leading producer of cork. How do you say “happy birthday” like a native?You just popped open a bottle of champagne in the country that’s the leading producer of cork. How do you say “happy birthday” like a native?', 'feliz aniversário'),
(16, 'You are in the city that is home to the House of Light and a museum in a converted school featuring paintings from the far-away Forest of Honey. What traditional festival might you be visiting?', 'Snow Festival'),
(17, 'In the mid-1800’s literate people in the United States and elsewhere often carried a notebook with them to copy down passages of text or quotations that were particularly valuable or interesting to them. This notebook had a very particular name. What was this kind of notebook called?', 'Commonplace book'),
(18, 'What colors are the flags in Lupa on July 2 and August 16?', 'Black, White and Orange'),
(19, 'How long is the river bordering the two countries that once were home to the Hamangia?', '1,771 miles'),
(20, 'How much older is the world’s oldest living Methuselah than the biblical Methuselah?', '3,873 years'),
(21, 'A Viking was the first to photograph us, but our existence was foretold in literature by a Swift astronomer. Who are we?', 'The two moons of Mars, \r\nPhobos and Deimos.\r\n'),
(22, 'There is something missing from Adam Smith nature of vision. Who modify this theory?', 'John Nash'),
(23, 'What is brow-antlered deer called in local language?', 'Sangai'),
(24, 'How long will it be  the planet is no longer habitable?', '1.75billion to 3.25billion years'),
(25, 'The UAE VS Nepal for 3rd place in world t20 qualifying match was played in which day?', 'Saturday'),
(26, 'The unit of speed used for super computer is', 'GFLOPS'),
(27, 'In 2013, which film was selected as the Indian entry for the Best Foreign Language Film in the Oscars?', 'The Good Road'),
(28, 'Whose trademark is the operating system UNIX?', 'BELL Laboratories'),
(29, 'What is time taken to print 500 sheets by a colour desktop printer ?', '7 min 19 sec'),
(30, 'Jpeg compression is based on what?', 'DCT'),
(31, 'What program allows an Apple computer to run Microsoft Windows?', 'Boot camp'),
(32, 'What is the important property of upsalite?', 'absorbency'),
(33, '“See how she leans her cheek upon her hand:  O! that I were a glove upon that hand.” This line is taken from which play?', 'Romeo Juliet'),
(34, 'What is the name of the Paranoid Android in Douglas Adams’ ‘Hitchhiker’s Guide to the Galaxy’?', 'Marvin'),
(35, 'In the film Mary Poppins, who played Mrs Banks, mother to Jane and Michael?', 'Glynis Johns'),
(36, 'What did the ancient Romans believe they could prevent with the herb that sprung from Archemorus’ blood?', 'Drunkenness'),
(37, 'What kind of table was first produced by the 8th Laird of Merchistoun?', 'Logarithmic Tables'),
(38, 'I was known as the “Lion of the North,” and died heroically on the battlefield. How many years did the war continue after my death?', '16 years later'),
(39, 'What color was my crown before I united the “two lands” of Upper and Lower Egypt around 3000 BCE?', 'white'),
(40, 'If you’re staring at “le casserole” in the night sky, which two stars form the optical double?', 'Mizar and Alcor'),
(41, 'Following my discovery of methane, I invented a device that many people use every day. What’s it called?', 'Voltaic pile'),
(42, 'What did the ancients call the chemical element that’s often used as a vulcanizing agent?', 'brimstone'),
(43, '“The long sobs of the violins of autumn” was the first of two secret messages broadcast to the French resistance during WWII. What was the second (in English)?', '“Soothes my heart with a monotonous languor”'),
(44, 'Who did the wife of the first monotheist king of Egypt worship?', 'Aten, the Sun disc.'),
(45, 'If you live in an area classified as the most polluted on the Bortle Scale, which Messier object is typically visible to the naked eye?', 'Pleiades (also known as Seven Sisters, Messier object 45, or M45)'),
(46, 'If you’re holding the heaviest of the three kinds of fencing swords, which part of your opponent’s body is a valid target?', 'Entire Body.'),
(47, 'Our name means “of purple merchants”. What snail was the source of the product that made us famous for our purple?', 'Murex snail.'),
(48, 'In the process that includes, prophase, metaphase, anaphase, and telophase, which stage does the nuclear envelope start to disappear?', 'Prophase'),
(49, 'What did I do after I said, “They couldn’t hit an elephant at this distance”?', 'Was Shot.'),
(50, 'What famous Russian writer wrote a novel while gambling in the town that the ancient Romans called "Aurelia Aquensis"?', 'Fyodor Mikhaylovich Dostoyevsky'),
(51, 'I’m a god that’s known by the same name in both Greek and Roman mythology. What musical instrument did I once receive as a gift?', 'Lyre'),
(52, 'Which man’s “bulldog” coined the term agnostic?', 'Charles Darwin'),
(53, 'In Plato’s “Apology,” what’s the job of the man with “not much of a beard, and a rather aquiline nose?”', 'poet'),
(54, 'What Greek letter represents a number of complete waves produced per unit of time?', 'Greek letter “v,” pronounced “nu” '),
(55, '55.	Would you describe the mathematical quantity represented by “a = F/m” as a vector or scalar quantity?', 'Vector Quantity'),
(56, 'The geologic period known for the Earth’s highest atmospheric oxygen levels is divided into epochs named after which two U.S. states?', 'Mississippi and Pennslyvania'),
(57, 'What do you get if you add tin to the element that’s named after the island of Cyprus?', 'bronze'),
(58, 'If you see a lemur hanging from a branch, you’re probably on an island that formed during the prehistoric breakup of which supercontinent?', 'Gondwana (aka Gondwanaland).'),
(59, 'Lord Byron wrote a poem inspired by a castle located in which of Switzerland’s cantons?', 'The canton of Vaud.'),
(60, 'What city code do you dial to call the capital of the largest island in the Mediterranean Sea?', '091'),
(61, 'What is the numerical value (to five decimal places) of the constant represented by the sixteenth letter of the Greek alphabet?', '3.14159'),
(62, 'I often get blamed for starting the “Dark Ages” because I deposed the last Western Roman emperor. What’s my name?', 'The barbarian ruler Odoacer.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `question_id`, `email`, `session_id`) VALUES
(67, 'testin', 3, 'ates@adf.com', 35),
(68, 'newusern', 3, 'newus@a.df.com', 35),
(69, 'a', 9, 'a@gmail.com', 1),
(70, 'hello', 9, 'hello@safd.com', 1),
(71, 'hlll', 9, 'fksf@ls.xom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_correct_answer`
--

CREATE TABLE IF NOT EXISTS `users_correct_answer` (
  `user_id` int(11) NOT NULL,
  `question_id` varchar(1000) NOT NULL,
  `answers` varchar(1000) NOT NULL,
  `send_time` varchar(5000) NOT NULL,
  `session_id` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_wrong_answer`
--

CREATE TABLE IF NOT EXISTS `users_wrong_answer` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answers` varchar(1000) NOT NULL,
  `send_time` varchar(1000) NOT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `session_id` int(11) NOT NULL,
  `winner_name` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
