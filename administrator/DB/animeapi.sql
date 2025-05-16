-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2025 at 02:53 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animeapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE IF NOT EXISTS `anime` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `saidBy` varchar(100) NOT NULL,
  `quote` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `title`, `saidBy`, `quote`) VALUES
(1, 'Dragon Ball Z', 'Goku', 'I am the hope of the universe. I am the answer to all living things that cry out for peace.'),
(2, 'Dragon Ball Z', 'Vegeta', 'There’s only one certainty in life. A strong man stands above and conquers all!'),
(3, 'Dragon Ball Z', 'Goku', 'Power comes in response to a need, not a desire. You have to create that need.'),
(4, 'Dragon Ball Z', 'Vegeta', 'You may have invaded my mind and my body, but there’s one thing a Saiyan always keeps… his pride!'),
(5, 'Dragon Ball Z', 'Gohan', 'There’s no point in being angry if you can’t change anything.'),
(6, 'Dragon Ball Z', 'Piccolo', 'Sometimes, we have to look beyond what we want and do what’s best.'),
(7, 'Dragon Ball Z', 'Goku', 'A strong spirit transcends rules.'),
(8, 'Dragon Ball Z', 'Vegeta', 'Even a low-class warrior can surpass an elite, with enough hard work.'),
(9, 'Dragon Ball Z', 'Future Trunks', 'We can’t change the past. All we can do is fight for a better future.'),
(10, 'Dragon Ball Z', 'Vegeta', 'Strength is the only thing that matters in this world. Everything else is just a delusion for the weak.'),
(11, 'Attack on Titan', 'Erwin Smith', 'The only thing we’re allowed to do is believe. We can’t change anything.'),
(12, 'Fullmetal Alchemist: Brotherhood', 'Maes Hughes', 'A lesson without pain is meaningless. That’s because you can’t gain something without sacrificing something else.'),
(13, 'Tokyo Ghoul', 'Kaneki Ken', 'It’s not the world that’s messed up; it’s those of us in it.'),
(14, 'Your Lie in April', 'Kaori Miyazono', 'Maybe there’s only a dark road up ahead. But you still have to believe and keep going.'),
(15, 'Monster', 'Johan Liebert', 'The world is not beautiful. Therefore, it is.'),
(16, 'Cowboy Bebop', 'Faye Valentine', 'Survival of the fittest is the law of nature. We deceive or we are deceived. Thus we flourish or perish.'),
(17, 'Vinland Saga', 'Thors', 'A true warrior needs no sword.'),
(18, 'Steins;Gate', 'Okabe Rintarou', 'Remember: no matter how many parallel worlds exist, the only one that matters is the one you’re in.'),
(19, 'Mob Psycho 100', 'Mob', 'It’s okay to run. Just don’t give up.'),
(20, 'Berserk', 'Guts', 'A dream… it’s something you do for yourself, not for others.'),
(21, 'Dragon Ball Z', 'Goku', 'It’s not about being the strongest. It’s about protecting those you care about.'),
(22, 'Dragon Ball Z', 'Gohan', 'Anger can be a gift if you use it right.'),
(23, 'Dragon Ball Z', 'Vegeta', 'I do this not for the power. I do this for me.'),
(24, 'Dragon Ball Z', 'Goku', 'I would rather be a brainless monkey than a heartless monster.'),
(25, 'Dragon Ball Z', 'Gohan', 'I may be a kid, but I’m not gonna let you get away with this!'),
(26, 'Dragon Ball Z', 'Piccolo', 'You’ll laugh at your fears when you find out who you are.'),
(27, 'Dragon Ball Z', 'Vegeta', 'You are a fool, Kakarot. Always speaking of peace and justice, as if they are some kind of shield for the weak.'),
(28, 'Attack on Titan', 'Levi Ackerman', 'The only thing we’re allowed to do is to believe we won’t regret the choice we made.'),
(29, 'Fullmetal Alchemist: Brotherhood', 'Edward Elric', 'A lesson without pain is meaningless. That’s because you can’t gain something without sacrificing something else.'),
(30, 'Tokyo Ghoul', 'Touka Kirishima', 'Why is it that the beautiful things are entwined more deeply with death than with life?'),
(31, 'Your Lie in April', 'Kousei Arima', 'Was I able to live inside someone’s heart?'),
(32, 'Monster', 'Dr. Tenma', 'What’s wrong with wanting to save lives?'),
(33, 'Cowboy Bebop', 'Spike Spiegel', 'I’m not going there to die. I’m going to find out if I’m really alive.'),
(34, 'Vinland Saga', 'Askeladd', 'The world is cruel. It’s up to you to survive it.'),
(35, 'Steins;Gate', 'Kurisu Makise', 'There is no end though there is a start in space.'),
(36, 'Mob Psycho 100', 'Reigen Arataka', 'If you want to be strong, stop caring about what others think of you.'),
(37, 'Berserk', 'Griffith', 'In this world, is the destiny of mankind controlled by some transcendental entity or law?'),
(38, 'Dragon Ball Z', 'Vegeta', 'I fight for my own pride, not for others.'),
(39, 'Dragon Ball Z', 'Goku', 'When you have to save someone, they’re usually in a tough spot.'),
(40, 'Dragon Ball Z', 'Gohan', 'Even a child can stand up when it matters most.'),
(41, 'Dragon Ball Z', 'Vegeta', 'Kakarot, you are number one.'),
(42, 'Dragon Ball Z', 'Piccolo', 'Even demons can show mercy.'),
(43, 'Dragon Ball Z', 'Future Trunks', 'I’ve seen hell, and I came back stronger.'),
(44, 'Dragon Ball Z', 'Goku', 'Every force you create has an echo.'),
(45, 'Dragon Ball Z', 'Vegeta', 'I am not here to follow in Kakarot’s footsteps.'),
(46, 'Dragon Ball Z', 'Gohan', 'I wanted to be strong so I could protect the people I love.'),
(47, 'Dragon Ball Z', 'Piccolo', 'Sometimes it’s not about strength. It’s about heart.'),
(48, 'Dragon Ball Z', 'Goku', 'There’s no need to fight just to win.'),
(49, 'Dragon Ball Z', 'Vegeta', 'My strength is not just for me.'),
(50, 'Dragon Ball Z', 'Future Trunks', 'You can’t erase history, but you can fight for the future.'),
(51, 'Dragon Ball Z', 'Gohan', 'I’ve learned that pain can teach, not just hurt.'),
(52, 'Dragon Ball Z', 'Vegeta', 'Even if I fall, I’ll rise again.'),
(53, 'Dragon Ball Z', 'Goku', 'What’s important is never to give up.'),
(54, 'Attack on Titan', 'Armin Arlert', 'To endure becoming a monster, you must discard your humanity.'),
(55, 'Your Lie in April', 'Tsubaki Sawabe', 'We’re all afraid. We all get cold feet.'),
(56, 'Berserk', 'Skull Knight', 'Struggle, endure, contend. For that alone is the fate of man.'),
(57, 'Mob Psycho 100', 'Mob', 'It’s okay to be weak sometimes.'),
(58, 'Vinland Saga', 'Canute', 'If you have love, you don’t need power.'),
(59, 'Steins;Gate', 'Okabe Rintarou', 'You have no memories because you have no past.'),
(60, 'Tokyo Ghoul', 'Kaneki Ken', 'Sometimes good people make bad choices.'),
(61, 'Cowboy Bebop', 'Jet Black', 'Man always thinks about the past before he dies, as if he were frantically searching for proof he was alive.'),
(62, 'Fullmetal Alchemist: Brotherhood', 'Roy Mustang', 'Nothing’s perfect, the world’s not perfect. But it’s there for us, trying the best it can.'),
(63, 'Monster', 'Johan Liebert', 'When you gaze into the abyss, the abyss gazes back.'),
(64, 'Attack on Titan', 'Mikasa Ackerman', 'This world is merciless, but it’s also very beautiful.'),
(65, 'Dragon Ball Z', 'Goku', 'If I don’t stand up now, who will?'),
(66, 'Dragon Ball Z', 'Vegeta', 'I’ve come too far to turn back now.'),
(67, 'Dragon Ball Z', 'Gohan', 'The harder you work, the greater your reward.'),
(68, 'Dragon Ball Z', 'Piccolo', 'Even in darkness, a warrior finds light.'),
(69, 'Dragon Ball Z', 'Future Trunks', 'Time isn’t always kind, but we can be.'),
(70, 'Dragon Ball Z', 'Vegeta', 'Fate doesn’t decide who we are.'),
(71, 'Dragon Ball Z', 'Goku', 'Your heart is your greatest power.'),
(72, 'Dragon Ball Z', 'Gohan', 'You become stronger by choosing kindness.'),
(73, 'Dragon Ball Z', 'Vegeta', 'What is strength if not used for something greater?'),
(74, 'Dragon Ball Z', 'Goku', 'Even if you lose everything, never lose your will.'),
(75, 'Dragon Ball Z', 'Future Trunks', 'What we do now matters more than what’s behind us.'),
(76, 'Dragon Ball Z', 'Piccolo', 'Every battle teaches us who we are.'),
(77, 'Dragon Ball Z', 'Goku', 'Pain is the pathway to strength.'),
(78, 'Dragon Ball Z', 'Vegeta', 'I’m not done yet. I’ll never be done.'),
(79, 'Dragon Ball Z', 'Gohan', 'Protecting others is the truest strength.'),
(80, 'Dragon Ball Z', 'Goku', 'I fight to protect, not to destroy.'),
(81, 'Dragon Ball Z', 'Vegeta', 'I’ll surpass all limits. That’s what it means to be a warrior.'),
(82, 'Dragon Ball Z', 'Future Trunks', 'Even in despair, I’ll carry hope.'),
(83, 'Dragon Ball Z', 'Goku', 'Strength is more than power. It’s courage.'),
(84, 'Dragon Ball Z', 'Gohan', 'No matter what happens, I’ll keep moving forward.'),
(85, 'Dragon Ball Z', 'Piccolo', 'I’m more than what I was.'),
(86, 'Dragon Ball Z', 'Goku', 'Believe in your friends, and they’ll believe in you.'),
(87, 'Dragon Ball Z', 'Vegeta', 'No enemy can defeat pride backed by resolve.'),
(88, 'Dragon Ball Z', 'Future Trunks', 'I carry my legacy not with sorrow, but with strength.');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `currentDate` date DEFAULT NULL,
  `quoteId` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currentDate`, `quoteId`) VALUES
(1, '2025-05-16', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(100) DEFAULT NULL,
  `passcode` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `passcode`) VALUES
('admin', ')861M:6XT,S(Q ` ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
