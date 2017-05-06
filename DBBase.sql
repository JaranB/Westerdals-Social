-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06. Mai, 2017 15:56 p.m.
-- Server-versjon: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `something`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `brukernavn` varchar(255) NOT NULL,
  `epost` varchar(255) NOT NULL,
  `passord` varchar(255) NOT NULL,
  `avatarURL` varchar(250) NOT NULL,
  `rang` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `brukernavn`, `epost`, `passord`, `avatarURL`, `rang`) VALUES
(1, 'Jaran', 'wefwefw@2f2wef', '97fc595ca21b5b86670ff6ee34963152', 'http://i1.kym-cdn.com/photos/images/original/000/128/730/BlackCat_PSN.png', 1),
(3, 'Jaran2', 'jaran2@epost.no', '97fc595ca21b5b86670ff6ee34963152', 'http://steamavatars.co/wp-content/uploads/2016/02/joker_steam_avatars.jpg', 0),
(4, 'Jaran111', 'sadfqwf11@dqweadqwd', '60d25c2d918be5f46443a81ac1ae5f87', '', 0),
(5, 'dwqdqwd', 'fgwefge@dfqwdwq', '97fc595ca21b5b86670ff6ee34963152', '', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `favoritter`
--

CREATE TABLE `favoritter` (
  `id` int(11) NOT NULL,
  `favorittID` int(11) NOT NULL,
  `brukernavn` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `favoritter`
--

INSERT INTO `favoritter` (`id`, `favorittID`, `brukernavn`) VALUES
(4, 61, 'Jaran2'),
(7, 60, 'Jaran'),
(9, 57, 'Jaran');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kommentarer`
--

CREATE TABLE `kommentarer` (
  `kommentarid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `kommentar` varchar(500) NOT NULL,
  `brukernavn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `kommentarer`
--

INSERT INTO `kommentarer` (`kommentarid`, `postid`, `kommentar`, `brukernavn`) VALUES
(59, 63, 'Transport', 'Jaran'),
(60, 64, 'Butikk', 'Jaran'),
(61, 61, 'Helse', 'Jaran'),
(62, 69, 'Parking', 'Jaran'),
(64, 62, 'Restaurant', 'Jaran'),
(69, 57, 'Bar', 'Jaran'),
(70, 60, 'Studie', 'Jaran');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `steder`
--

CREATE TABLE `steder` (
  `postid` int(11) NOT NULL,
  `tittel` varchar(250) NOT NULL,
  `kategori` varchar(111) NOT NULL,
  `bildeURL` varchar(250) NOT NULL,
  `post` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dataark for tabell `steder`
--

INSERT INTO `steder` (`postid`, `tittel`, `kategori`, `bildeURL`, `post`) VALUES
(57, 'Fjerdingen Bar', '1', 'http://esq.h-cdn.co/assets/cm/15/06/54d3cdbba4f40_-_esq-01-bar-lgn.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(58, 'Parkeringsplass 1', '4', 'http://www.vegmerkingvest.no/Directory/Images/12_image2.jpg', 'Lorem ipsum dolor sit amet, quaestio expetenda an his, ei nemore doctus aliquid pri. Eu per epicurei deserunt, fugit mundi nam id. Mea in modo lorem oporteat. Hendrerit cotidieque eum eu, mel te veniam sententiae. Cu aperiam tritani voluptatibus mel, vide porro atqui quo at.\r\n\r\nVis sumo iusto soleat eu. Et vel omnium aperiam. Ad imperdiet patrioque referrentur quo. Cum in legere eloquentiam theophrastus, ornatus voluptatibus ea eam, his te unum euismod albucius.\r\n\r\nMel ea rebum brute. Est et unum liber apeirian, sit suas prima an. Mei ad veri dictas menandri, nec tantas concludaturque cu. At mea probo regione oportere, ei sint numquam maiorum qui.\r\n\r\nSit ex primis dignissim, unum possim utamur ne mel, an solum forensibus mea. Ne abhorreant efficiendi adversarium sea, ut laoreet detracto vix. Mutat viderer quaestio sea ad, at porro quodsi meliore quo. Tota salutandi intellegat pro ut, mei in luptatum forensibus efficiendi, his et maluisset hendrerit. Sed fastidii fabellas at, quis labores legendos has ea. In alii solum sed, vocent feugiat delenit in est, per alia utinam no. Detracto adipisci consequat no vis.\r\n\r\nVelit fabulas efficiendi no nam, te alii affert graeco per, est cu putent iracundia. Mea periculis erroribus definiebas te, te sit debet nostrum perpetua, eos te brute congue copiosae. Omnes scaevola facilisis ea sit, laudem maiestatis elaboraret sea et. Reque oblique evertitur ad pri, id homero iuvaret has, ne graece similique quo. Ex mea iusto dolore integre, pro fierent necessitatibus ne.'),
(60, 'Enda ett studie navn', '7', 'https://content-delivery-119.weborganiser-systems.eu/wp-content/uploads/2016/12/studie-afmaken-2.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(61, 'Helse', '5', 'http://www.friskogfunksjonell.no/wp-content/uploads/2011/11/helse1.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(62, 'Restaurant', '2', 'https://cdn.pixabay.com/photo/2015/09/14/11/43/restaurant-939435_960_720.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(63, 'Transport', '6', 'http://directorytransport.com/transport/1446025696slideshow_transport.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(64, 'Butikk', '3', 'http://pubadmin2.ostfold.net/data/images/2203/Butikk-2773.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(65, 'Parkering', '4', 'http://www.visitrjukan.com/var/visitrjukan/storage/images/media/images/parkering/87775-1-nor-NO/parkering_size-large.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere'),
(66, 'Parkeringsplass 1', '4', 'http://directorytransport.com/transport/1446025696slideshow_transport.png', 'Yes'),
(67, 'fqwefqefcadc', '4', 'http://directorytransport.com/transport/1446025696slideshow_transport.png', 'qfewgew'),
(69, 'vwgwegwe', '4', 'http://directorytransport.com/transport/1446025696slideshow_transport.png', 'trÃ¸jrtkjpe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brukernavn` (`brukernavn`),
  ADD UNIQUE KEY `epost` (`epost`);

--
-- Indexes for table `favoritter`
--
ALTER TABLE `favoritter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kommentarer`
--
ALTER TABLE `kommentarer`
  ADD PRIMARY KEY (`kommentarid`);

--
-- Indexes for table `steder`
--
ALTER TABLE `steder`
  ADD PRIMARY KEY (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `favoritter`
--
ALTER TABLE `favoritter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kommentarer`
--
ALTER TABLE `kommentarer`
  MODIFY `kommentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `steder`
--
ALTER TABLE `steder`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
