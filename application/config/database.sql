-- phpMyAdmin SQL Dump
-- version 3.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generatie Tijd: 06 Feb 2009 om 17:03
-- Server versie: 5.0.75
-- PHP Versie: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `idoe_kohanajobs`
--

-- --------------------------------------------------------

--
-- Tabel structuur voor tabel `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `confirmed` tinyint(1) unsigned NOT NULL default '0',
  `title` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `description` text collate utf8_unicode_ci NOT NULL,
  `apply` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `company` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `website` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `location` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `edited` datetime NOT NULL default '0000-00-00 00:00:00',
  `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Gegevens worden uitgevoerd voor tabel `jobs`
--

INSERT INTO `jobs` (`id`, `confirmed`, `title`, `description`, `apply`, `company`, `website`, `email`, `location`, `date`, `edited`, `password`) VALUES
(31, 1, 'CMS developer (new modules)', 'Hi there. we have a cms build in kohana but need fixes and new modules for this. we want to expand our cms to a new level with some new functions and layouts.\n\nits for a longer period so many modules which we like to do piece by piece.', 'email us at kay@microdesign.nl skype, msn address preferred', 'Webdesign - Microdesign', 'http://www.microdesign.nl', 'kay@microdesign.nl', 'The Hague, The netherlands', '2008-12-03 09:14:01', '2008-12-03 09:26:11', '120c681226aaa633ffc03901cfad2ffe'),
(34, 1, 'PHP mySQL Kohana Developer MVC', 'To join 4 man team for short term contract to assist with website launch.\n\nMust have a clear understanding of MVC, existing Kohana experience is a must. 3-4 week project phase, possibility of more work afterwards.', 'Send your CV with portfolio links to sam@clark.name', 'Mukuru Ltd', 'http://www.mukuru.com', 'sam@clark.name', 'Clapham South', '2009-01-19 13:38:16', '0000-00-00 00:00:00', '937077af2e650525cdc6cc1057da7140'),
(35, 1, 'Freelance PHP/Kohana Developer', 'I''m looking for a freelance PHP developer with Kohana/CI experience to take and extend the code I have for a basic Kohana install. I''d like to enables logins & roles, payment processing and a few other modules that are stock to Kohana. Nothing too fancy.\n\nTelecommute, be anywhere. If you''re local, all the better. If it''s a good fit there will be additional work. \n\nThanks,', 'Email roddy (at) rivalholdings.com with links to past Kohana / CI projects.', 'Rival Holdings, Inc.', '', 'roddy@rivalholdings.com', 'Chicago, IL', '2009-01-22 17:42:29', '0000-00-00 00:00:00', '0ed48ff485f6944bba375bd5e6d64413'),
(30, 1, 'Front End Engineer', 'Mukuru are seeking a front end engineer to work with our existing development team on a very short-term contract starting immediately, finishing in about two weeks. It would be preferable if the applicant was London based, but not essential.\n\nWe require someone with excellent XHTML, CSS, XML and jQuery skills (especially jQuery.ajax() ), who understands and can differentiate between ''progressive enhancement'' and ''graceful degradation''.\n\nA working knowledge of Kohana 2.2.1 will be of huge benefit.\n\nRemittance negotiable, based on experience.', 'Send your CV and portfolio to jobs@mukuru.com', 'Mukuru', 'http://www.mukuru.com', 'sam.clark@polaris-digital.com', 'Clapham South, London', '2008-10-21 18:54:15', '0000-00-00 00:00:00', '27e1eb8f890a4a35f1507ab6568c473d'),
(32, 1, 'Experienced Kohana Programmer/Developer', 'We''re looking for a freelance/contract based Kohana programmer/developer. We have an immediate project we''d like to start on, as well as future projects on a contract basis.', 'Please send your hourl rate as well as portfolio of related work to krystian@3magine.com', '3magine Studios Inc.', 'http://www.3magine.com', 'krystian@3magine.com', 'Toronto, ON', '2008-12-18 20:38:02', '0000-00-00 00:00:00', 'a0839080792681d6f4f8e1e04715e6b5'),
(33, 1, 'simple donations site needed', 'I have a project for a site that needs to take donations through affiliate pages - each affiliate will have a url (eg mydonations.com/aff1/)  All the front end graphic html will be provided - programmer needs to do backoffice html/css - doesn''t need to be fancy but should look respectable.\n\nThe payments need to be handled on the backend either through paypal pro or authorize.net (not sure - still working on the merchant account issues.) \n\nAffiliates need to be be able to track ticket sales along with a referal id (a get variable passed when clicking on the ad/link)  Advanced reporting is not needed at this point (might be added later) - just basic total sales, and ability to review all sales.\n\nThere should also be email manager to allow affiliates to upload/manage email addresses and to choose a template (there may be 2 or 3 html tempaltes to chose from) and send out the emails.\n\nPlease contact with cost information (either fixed price estimate or rate+hour estimate) along with examples of similar projects you''ve done (specifically payment integration)', 'shapiro9@netvision.net.il', 'derechEretz', '', 'shapiro9@netvision.net.il', 'anywhere', '2008-12-24 10:27:54', '0000-00-00 00:00:00', '9fc5ce05c60d9778ca365c19d2b4a9a2');
