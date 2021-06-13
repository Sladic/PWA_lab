-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'da', 'da', 'da', '$2y$10$HHaCcnP/YNIr1JCujqNHCOp6Xl8ven/NvqYxBIfLRkrN1LXIRHYNa', 1),
(2, 'Dimitar', 'Sladić', 'dsladic', '$2y$10$KbjiP8ehp4A78aPHaIEdB.rqZ.l3Jp05xYDK3xamvSHV/PRqw/hK.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `sazetak` text COLLATE utf8_croatian_ci NOT NULL,
  `tekst` text COLLATE utf8_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '13.06.2021.', 'Mamedyarov in the sole lead', 'Shakhriyar Mamedyarov is the sole leader at the Superbet Chess Classic.', 'For the first time in Bucharest, three games finished decisively in a single round. While Levon Aronian and Anish Giri scored their first victories of the event, both to bounce back to a fifty percent score, Shakhriyar Mamedyarov obtained his third full point in a row to go into the last two rounds a full point ahead of the field.\r\n\r\nThe first game to finish decisively on Saturday was Aronian’s win over former co-leader Alexander Grischuk. Teimour Radjabov and Wesley So — both undefeated so far in the event, with Radjabov having signed seven draws so far — agreed to a 38-move draw meanwhile. These two results meant Mamedyarov would get a 1-point lead over Grischuk and So if he managed to beat Fabiano Caruana with the black pieces.\r\n\r\nUnderstanding Middlegame Strategies Vol.1 and 2\r\n\r\n\r\nThese DVDs are about Understanding Middlegame Strategies. In the first DVD dynamic decisions involving pawns are discussed. The second DVD deals with decision making process concerning practical play.\r\n\r\n\r\nCaruana was struggling against the Azerbaijani’s bold opening choice, but once he found himself in a clearly inferior position he started to defend tenaciously, giving up two pawns to sharply complicate Black’s task. Eventually, Mamedyarov got to convert in the rook endgame a pawn to the good, climbing to the top stop in the standings table and gaining enough rating points to reach fifth place in the live ratings list.\r\n\r\nThe second-to-last game to finish was Giri’s victory over Maxime Vachier-Lagrave. The Dutchman managed to convert an opposite-coloured bishops endgame with an extra pawn. Giri confessed:\r\n\r\nThe more experienced I get, the more I realize chess is just about luck, there is really nothing else.', '95909.jpeg', 'šah', 0),
(2, '13.06.2021.', 'Gelfand: Pragg is back', 'An impressive streak of five straight wins on day 2 prompted him to the top of the standings!', 'For a second day in a row, one of the twenty young talents participating in the Gelfand Challenge scored a perfect 5 out of 5. While Awonder Liang had a perfect first day, it was Praggnanandhaa — the winner of the previous event of the tour — who won game after game on the second day of action.\r\n\r\nPragg is now sharing first place with Nodirbek Abdusattorov, who also performed well in the Polgar Challenge back in April. The Uzbek grandamster was, in fact, the only undefeated player after nine rounds, so had he kept his streak he would have finished the day in the sole lead — a loss against Gunay Mammadzada meant he is now tied with his even younger Indian colleague.', '95901.jpeg', 'šah', 0),
(3, '13.06.2021.', 'New Opening Ideas in Bucharest', 'Joshua Doknjas had a look at four interesting games.', 'A Sharp Rubinstein French\r\n\r\nFabiano Caruana played on the White side of a sharp Rubinstein French against Constantin Lupulescu and posed challenging questions by attacking along the kingside light squares. The critical moment of the game arose on move 17, when Caruana calculated a forcing line which would have led to a fine position for Black, but this difficult sequence was missed by Lupulescu.\r\n\r\nLooking back at the game from a theoretical perspective, the dynamic and rich middlegame that developed out of Caruana’s opening play may shift more attention to 4.Bg5 in future discussions. In recent years, 4.Bg5 has been completely overshadowed by 4.e5 at the top level, but this trend may change as there appear to be many interesting ideas and nuances in Caruana’s setup.', '95876.jpeg', 'šah', 0),
(4, '13.06.2021.', 'Magnus Carlsen  in World Cup', 'World Champion Magnus Carlsen will play in the next World Cup, which will take place in Sochi.', 'The reigning World Chess Champion will be one of the participants in the upcoming FIDE World Cup, to be played in Sochi from July 10 to August 6, 2021. \r\n\r\nFor many players, the World Cup is the first and only opportunity to enter the race for the World Championship crown, since the two top finishers in the event will advance to the next stage: the super exclusive Candidates Tournament. This is even more true in the revamped 2021 edition, which will feature 206 participants (compared to 128 in previous editions), giving players from all over the globe an opportunity to prove their value. \r\n\r\nHowever, for the World Champion, the motivations are probably slightly different. Even if he loses his title in the FIDE World Championship match later this year in Dubai, Magnus would have a spot secured in the next edition of the Candidates Tournament, so he doesn\'t need to take part in the qualifiers. But Magnus has never won a FIDE World Cup, despite being a firm supporter of knock-out tournaments. The champion probably wants to prove to the world, and to himself, that he can also excel in this format. His last participation, in Tbilisi 2017, was a bit disappointing: he was knocked out in round 3 by the Chinese Grandmaster Bu Xiangzhi. \r\n\r\nBesides, a record prize fund of $1,890,000 is incentive enough for the World Champion to be tempted and pick up the gauntlet to fight 206 grandmasters in this tough and highly-contested event. The World Cup is one of FIDE\'s flagship competitions, and in recent editions, it has clearly become one of the most followed events in the chess calendar. \r\n\r\nThe reigning World Champion, Women’s World Champion, and Junior World Champion are directly invited to the World Cup, as well as the four semi-finalists from the 2019 edition. They are joined by 80 players qualified through Continental Championships, with every continent being guaranteed a minimum quota, and 100 players nominated by the top hundred federations by average rating. The field is completed with the 12 highest-rated players who did not qualify by any of the previous criteria, as well as the highest-placed player of the ACP Tour 2021 as of June 2021. \r\n\r\nMagnus Carlsen will not cross paths in this event with his challenger for the 2021 FIDE World Chess Championship match, Ian Nepomniachtchi. The Russian star has declined to participate, in order to focus on his preparation for the match. ', '95875.jpeg', 'šah', 0),
(5, '13.06.2021.', 'Jupiter’s 2021 Retrograde', 'Jupiter will begin its journey on June 20.', 'In 2021, Jupiter will travel through two signs while in retrograde, beginning in Pisces and ending in Aquarius. At the very beginning of this retrograde, the Pisces energy could leave us in a daze, and perhaps overly optimistic about opportunities or people that aren’t exactly as we perceive them to be. Once Jupiter backs into Aquarius, we will begin to gain more information, but it might not always be what we’d hoped for. We may also see a spike in political disagreements, and at the same time, will feel drawn to a specific cause while unsure of how to create real change.\r\n\r\nWhile us Earthlings are subject to the energy of the planets at all times, these vibes become especially pronounced when we look into how they interact with one another in the cosmos. There are some dates during this retrograde that will cause Jupiter’s energy to feel more present. On June 23, Jupiter forms a supportive aspect to the Cancer sun, allowing us to feel optimistic, nurtured, and secure. July 12 will allow us to talk about our emotions constructively, as Mercury and Jupiter connect through a harmonious trine. On July 22, go easy when it comes to romance, as an opposition with Venus could tempt us to nag our partners or point out their flaws. A few days after, an opposition to Mars forms on July 29, so try not to over-exert yourself.', 'jupiter-retrograde-horoscopes-1024x576.jpg', 'astrologija', 0),
(6, '13.06.2021.', '5 GEMINI SEASON DATES', 'To make the most of your spring', 'May 31: Mars in Cancer trine Neptune in Pisces: Let’s be real: Mars never thrives when it travels through Cancer. It’s debilitated and unable to operate at Mars’ full, action-oriented potential. Mars in Cancer approaches situations and conflicts from an emotional standpoint, but it can also easily stuff those feelings under the rug. When Mars forms a sweet trine to Neptune, the planet of mystery and illusion, our actions meet our dreams. This is such a magical moment to speak your truth and dig up repressed feelings. If you’re eager to start a new passion project, this celestial spark can give you the momentum to dream big and charge ahead on your path.\r\n\r\nJune 2: Venus enters Cancer: When the planet of love, beauty, and values enters compassionate Cancer, everybody wins. Venus in Cancer reminds us that tending to ourselves and our hearth is of the utmost importance. Where have you been a little too lax with your self-care? Cancer is one of the most nurturing signs, and of course, is known for taking care of others. But during this transit, it’s important to ask yourself: How are you taking care of yourself? There is magic in the moments you take just for yourself.\r\n\r\ngemini season 2021\r\nJune 3: Venus in Cancer trine Jupiter in Pisces: If Hallmark cards were a transit, it would be this: sweet Venus in Cancer meeting expansive and empathetic Jupiter in Pisces. We are approaching life from a heart-centered space. Love and compassion are our greatest gifts. When Venus and Jupiter, two of the most positive planets in the sky, sync in soft, emotional water signs, our hearts are working on overdrive. This is a wonderful day to focus on self-love and call in the type of love you want to surround yourself with in your life. Make sure to throw a rose quartz in your pocket and watch what unfolds throughout the day.\r\n\r\nJune 10: Sun in Gemini conjunct Mercury in Gemini: When the sun and Mercury sync, it’s usually a celestial aha moment. It could be a moment of clarity or of ideas being born. This meetup in particular will be a little different—Mercury will be retrograde. Pay attention to what comes up on this day, as this is part of your retrograde journey. Retrograde is nothing to be feared—it’s actually a powerful time for growth and shedding what no longer serves us. We must revisit the past in order to learn from it. How will you decide to absorb your lessons and move forward?\r\n\r\nJune 14: Saturn in Aquarius square Uranus in Taurus: Magic isn’t always easy. It would be a flat-out astrological lie to say that Saturn square Uranus is a fabulous, mystical transit. In reality, it’s growth-inducing. It delivers the arrival of sudden change, innovation, and surprises. Sometimes our hardest lessons lay the foundation for our most necessary growth. Saturn’s influence here will want us to resist change—who doesn’t like to be comfortable? The lesson of this stellar transit is to let go and trust. Go with the flow as much as possible and resist your desire to control. By embracing change and hardship, we can plant new seeds for a fresh, vibrant tomorrow.\r\n\r\nStill confused about your relationship', '01-copy-1024x273.jpg', 'astrologija', 0),
(7, '13.06.2021.', 'JUNE ASTROLOGY FORECAST', 'Waking up to a new reality', 'In a certain way, the astrology of June is a continuation of significant events that took place last month. We begin the month right in the middle of eclipse season and just a few days after Mercury started its second retrograde of the year. For these two reasons, June has the flavor of change, but it also comes with the need for revising, readjusting, and slowing down.\r\n\r\nThe first three days of June could easily be labeled as the most fortunate because the Pisces moon conjoins Jupiter on Tuesday, June 1, Venus enters Cancer on Wednesday, and Venus trines Jupiter in Pisces on Thursday. Also on the third, the Gemini sun is in a trine angle with Saturn. So even though it’s not usually advised to plan important things during Mercury retrograde and eclipse season, these three days in June promise us some love from the cosmos.\r\n\r\nJune’s astrology vibe gets intense by June 5, when Mars in Cancer forms an opposition to Pluto in Capricorn, putting a damper on what could otherwise be a really positive week. Under this aspect, a lot of us could be feeling the competitive urge to get ahead and assert ourselves. However, let’s remember that Mars in Cancer can manifest as a very angry energy, especially in the very last degrees of this sign. If we can handle this angry moodiness and use Pluto’s drive instead, this transit can be useful for asserting ourselves.\r\n\r\nThe astrology of the second week of June is quite exciting. The moon is in Taurus, its sign of exaltation, and although it conjoins Uranus and squares Saturn on Monday the seventh, by Tuesday it forms beautiful aspects with Neptune, Pluto, and Mars. While Monday could be intense by throwing obstacles and curveballs our way, things should really start falling into place by the time the Gemini moon trines Saturn in Aquarius on Wednesday.', 'mercury_05-1024x560.jpg', 'astrologija', 0),
(8, '13.06.2021.', 'JUPITER IN PISCES', 'Will bring prosperity, optimism and expansion.', 'Jupiter will enter its watery home of Pisces on May 13, where it will directly express its jovial qualities until July 28. After moving back and forth through the airy realm of Aquarius during the second half of 2021, Jupiter will re-enter Pisces at the end of 2021 on December 28.\r\n\r\nThe sovereignty of Jupiter occupying one of the signs it rules makes it more effective in providing uplifting support and inspiring hopeful visions that support life and abundant growth. Within the oceanic realm of Pisces, the waves reverberating from Jupiter will bring an elevated lift as we sail the stormy seas of collective change so we may recover from setbacks and make it safely to the shore of our destination.', 'Jupiter_pisces_1462x800.jpg', 'astrologija', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
