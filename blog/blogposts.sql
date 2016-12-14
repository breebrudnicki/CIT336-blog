-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2016 at 11:26 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodforo_blogposts`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogPosts`
--

DROP TABLE IF EXISTS `blogPosts`;
CREATE TABLE IF NOT EXISTS `blogPosts` (
  `post` varchar(10000) NOT NULL,
  `title` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `blogPostID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`blogPostID`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `blogPosts`
--

INSERT INTO `blogPosts` (`post`, `title`, `date`, `blogPostID`, `userID`) VALUES
('<strong>Description: </strong> Matching letterhead and business card designed using a personally created logo.<br><br>\n\n<strong>Process (Programs, Tools, Skills): </strong>To Create these I used both Adobe Illustrator and Adobe InDesign. I used Illustrator to create both my logos and my little icons. What was nice about creating these things in Illustrator is that they were easy to edit. Along the way I ended up changing the colors of a few things but I was able to just go into Illustrator, change the colors, and refresh everything in InDesign. In InDesign I came up with the main layout for everything. First I created my letter head. After I created my letterhead I opened up a document to create my business cards. When I made my business cards I knew I wanted my letter head and my business card to be very similar so that with just a glance somebody could guess they are the same company. I repeated shapes and the icons to achieve that affect. I also used the same monochromatic color scheme.<br><br>\n\n<strong>Message: </strong>Bree Carrick does web design and development.<br><br>\n\n<strong>Audience:</strong> My audience is anybody who may need a web designer or a developer to help them out. Mostly aimed towards small businesses rather than large corporations. <br><br>\n\n<strong>Top Thing Learned:</strong> The top thing I learned was how to create two things with a similar look and how to bring illustrator files into InDesign.<br><br>\n\n<strong>Color scheme and color names: </strong>Red Monochromatic<br><br>\n\n<strong>Title Font Name & Category: </strong>Sacramento â€“ Decorative (for Bree in my logo)<br><br>\n\n<strong>Copy Font Name & Category:</strong> Avenir Next â€“ Sans Serif (everything else)', 'Project 6: Stationery', '2016-02-27', 6, 1),
('<strong>Description: </strong>Demonstrate good photography and image editing skills. Incorporating color into a poster layout with original photo. <br>\r\n<strong>Process (Programs, Tools, Skills): </strong>First I took a bunch of photos. I had no idea what I wanted to do for the project. I wasnâ€™t sure what I wanted my subject to be or my color scheme. So after taking photos I sifted through them to see which ones I liked and which ones were composed well. I picked this one because I liked the subject and I thought I did a good job with composition, light, and focus. After picking the photo I looked at the colors in the photo and picked a color scheme. My longboard was originally pink, which is a shade of red. In photoshop I changed it to a brighter red so that my color scheme was more cohesive and bright. After I picked my colors and photo I did some sketches and then started implementing changes in photoshop. I put the layout together and also edited the photo. I edited the vibrance and saturation, the levels, changed a few colors using selective color, and lastly I sharpened a few areas of the image. After having a few people look at my finished product I found some things I needed to change. I played around with the layout some more and finally arrived at my final product. <br>\r\n\r\n<strong>Message: </strong> A fun and appealing poster for a younger generation. I used a Bob Dylan quote to suggest that it is better to be adventurous. <br>\r\n<strong> Audience:</strong> Teenagers/Young Adults who are free spirited. <br>\r\n<strong>Top Thing Learned</strong>: I learned how to take photos that have good lighting, composition, and focus. I also learned how to pick a color scheme. <br>\r\n<strong>Color scheme:</strong> Split Complimentary <br>\r\n<strong>Color names: </strong>Red, Orange, and Teal <br>\r\n<strong>Title Font Name & Category:</strong> Corbel Regular: Sans Serif <br>\r\n<strong>Copy Font Name & Category:</strong> Corbel Regular: Sans Serif (Also used Corbel Bold Italic and Corbel Italic -Sans Serif)', 'Project 3: Photodesign', '2016-02-06', 7, 1),
('<strong>Description:</strong> Two sided brochure<br><br>\r\n<strong>Process (Programs, Tools, Skills): </strong>To start out I made a lot of sketches. This was important because I needed to understand how the pages would fold and how to structure my InDesign file. Second I picked colors and then I created a logo in Illustrator. After that I began with my InDesign file. I set up ruler guides and made my file look like my sketches. I put in some place holder text and then got feedback from friends. After that I wrote my body copy. I also found an image of me and a friend in high school to cut out. My friend is holding a yearbook, so I photoshopped a picture of the visual media text book. After that I got a little more feedback, and made my finishing touches. To print it I printed it at the school on nice paper and I printed it double sided. I used a cutting board I have at home to cut and score my brochure.<br><br>\r\n<strong>Message: </strong>Review of the messages in Visual Focus <br><br>\r\n<strong>Audience: </strong>Visual Focus students mainly, those interested in the book as a secondary group<br><br>\r\n<strong>Top Thing Learned:</strong> How to work in indesign making ruler guides and how to make a brochure. I learned how to use photoshop, illustrator, and InDesign cohesively.<br><br>\r\n<strong>Color scheme and color names: </strong>Big Split complimentary- red, lime, and teal<br><br>\r\n<strong>Title Font Name & Category:</strong> Avenir Next â€“ sans serif<br><br>\r\n<strong>Copy Font Name & Category:</strong> Georgia â€“ serif\r\nMy color scheme is awesome\r\nFlavor', 'Project 8: Brochure', '2016-04-01', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `userName` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userName` (`userName`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userName`, `email`, `password`, `userID`) VALUES
('BreeCarrick', 'breecarrick@live.com', '$2y$10$NWdGZlYqcSd7Ys2ugjq2q.8Neb5S0TSUvpBXlImM0dVcjdYkf95jS', 1),
('CIT336', 'cit336@byui.edu', '$2y$10$t0l4YuhfafFEv9627Uwnk.e1InURRBIxwXBdUVW2yhwUyU6cKTrsy', 2),
('CIT336class', 'cit336@class.com', '$2y$10$jKLQamfZPJuqU8CpXvf6ZuhKSfF9Wp2ZuQUFupqSzNLEq6gtvL.Q2', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
