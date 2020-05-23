-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: bookstore_test
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Flawed','Superb distopian novel',1300,'Cecilia Ahern','English','Bloomsbury',1),(2,'Perfect','Part 2 of the novel Flawed',1500,'Cecilia Ahern','English','Bloomsbury',1),(3,'Dear Zoo : A Lift-the-flap Book','Rod Campbell\'s classic lift-the-flap book Dear Zoo has been a firm favorite with toddlers and parents alike ever since it was first published in 1982. Young readers love lifting the flaps to discover the animals the zoo has sent--a monkey, a lion, and even an elephant! But will they ever find the perfect pet? With bright, bold artwork, a catchy refrain, and a whole host of favorite animals, Dear Zoo is a must for every child\'s bookshelf.',1200,'Rod Campbell','English','SIMON & SCHUSTER',0),(4,'The Very Hungry Caterpillar','A much-loved classic, The Very Hungry Caterpillar has won over millions of readers with its vivid and colourful collage illustrations and its deceptively simply, hopeful story. With its die-cut pages and finger-sized holes to explore, this is a richly satisfying book for children.',1200,'Eric Carle','English','Penguin Random House Children\'s UK',0),(5,'Treasure Island','An interseting child fiction',1100,'Robert Louis Stevenson','English','Penguin Random House Children\'s UK',0),(6,'The Boy, The Mole, The Fox and The Horse','Discover the very special book that has captured the hearts of millions of readers all over the world. A book of hope for uncertain times.',2800,'Charlie Mackesy','English','Ebury Publishing',0),(7,'I See You','When Zoe Walker sees her photo in the classifieds section of a London newspaper, she is determined to find out why it\'s there. There\'s no explanation: just a grainy image, a website address and a phone number. She takes it home to her family, who are convinced it\'s just someone who looks like Zoe. But the next day the advert shows a photo of a different woman, and another the day after that.',1800,'Clare Mackintosh','English','Little, Brown Book Group',1),(8,'The Ballad of Songbirds and Snakes : (A Hunger Games Novel)','The Ballad of Songbirds and Snakes will revisit the world of Panem sixty-four years before the events of The Hunger Games, starting on the morning of the reaping of the Tenth Hunger Games.',3200,'Suzanne Collins','English','Scholastic',0),(9,'Look Inside Your Body','This is a wonderful flap book introducing children to the way their own bodies work in a fun and informative way. It is a new, smaller format of the \'Look Inside\' series, perfect for little fingers. It is full of surprises to keep enquiring minds entertained, including flaps beneath flaps and a cheeky peek inside a toilet cubicle. Young readers\' minds will boggle as they learn about how their brains work, what happens when they eat, how their lungs use oxygen and much more.',5000,'Louie Stowell','English','Usborne Publishing Ltd',0),(10,'Dear Zoo : A Lift-the-flap Book','Rod Campbell\'s classic lift-the-flap book Dear Zoo has been a firm favorite with toddlers and parents alike ever since it was first published in 1982. Young readers love lifting the flaps to discover the animals the zoo has sent--a monkey, a lion, and even an elephant! But will they ever find the perfect pet? With bright, bold artwork, a catchy refrain, and a whole host of favorite animals, Dear Zoo is a must for every child\'s bookshelf.',1100,'Rod Campbell','English','SIMON & SCHUSTER',0),(11,'Truly Madly Guilty','From the bestselling author behind the addictive, EMMY and GOLDEN GLOBE-winning HBO series Big Little Lies, comes a cocktail of friendship and modern love - spiked with a little deception.\n\n        Six responsible adults, two best friends - and one day that changes everything.\n        \n        \'This is a story which begins with a barbecue in the suburbs. . .\'\n        ',2100,'Liane Moriarty','English','Penguin Books Ltd',1),(12,'Friend Request','Because Maria Weston has been missing for over twenty-five years. She was last seen the night of a school leavers\' party, and the world believes her to be dead. Particularly Louise, who has lived her adult life knowing herself responsible for Maria\'s disappearance. But now Maria is back. Or is she?\n\n        As Maria\'s messages start to escalate, Louise forces herself to reconnect with the old friends she once tried so hard to impress, to try to piece together exactly what happened that fateful night. But when another friend\'s body turns up in the woods outside their old school, Louise realises she can\'t trust anyone and that she must confront her own awful secret to discover the whole truth of what happened to Maria...',1850,'Laura Marshall','English','Little, Brown Book Group',1),(13,'Harry Potter and the Cursed Child','Based on an original new story by J.K. Rowling, Jack Thorne and John Tiffany, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London’s West End on 30th July 2016. It was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children. While Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.',3200,'J. K. Rowling','English','LITTLE BROWN',0),(14,'1984','Renowned urban artist Shepard Fairey\'s new look for Orwell\'s dystopian masterpiece\n\n        Winston Smith works for the Ministry of Truth in London, chief city of Airstrip One. Big Brother stares out from every poster, the Thought Police uncover every act of betrayal. When Winston finds love with Julia, he discovers that life does not have to be dull and deadening, and awakens to new possibilities. Despite the police helicopters that hover and circle overhead, Winston and Julia begin to question the Party; they are drawn towards conspiracy. Yet Big Brother will not tolerate dissent - even in the mind. For those with original thoughts they invented Room 101. . .\n        \n        1984 is George Orwell\'s terrifying vision of a totalitarian future in which everything and everyone is slave to a tyrannical regime.',1750,'George Orwell','English','Penguin Books Ltd',1),(15,'Animal Farm','\'All animals are equal. But some animals are more equal than others.\'\n\n        Mr Jones of Manor Farm is so lazy and drunken that one day he forgets to feed his livestock. The ensuing rebellion under the leadership of the pigs Napoleon and Snowball leads to the animals taking over the farm. Vowing to eliminate the terrible inequities of the farmyard, the renamed Animal Farm is organised to benefit all who walk on four legs. But as time passes, the ideals of the rebellion are corrupted, then forgotten. And something new and unexpected emerges...',1700,'George Orwell','English','Penguin Books Ltd',1),(16,'To Kill A Mockingbird','A lawyer\'s advice to his children as he defends the real mockingbird of Harper Lee\'s classic novel - a black man falsely charged with the rape of a white girl. Through the young eyes of Scout and Jem Finch, Harper Lee explores with exuberant humour the irrationality of adult attitudes to race and class in the Deep South of the 1930s. The conscience of a town steeped in prejudice, violence and hypocrisy is pricked by the stamina of one man\'s struggle for justice. But the weight of history will only tolerate so much.\n\n        To Kill a Mockingbird is a coming-of-age story, an anti-racist novel, a historical drama of the Great Depression and a sublime example of the Southern writing tradition.',1250,'Harper Lee','English','Cornerstone',1),(17,'Wonder','\'My name is August. I won\'t describe what I look like. Whatever you\'re thinking, it\'s probably worse.\' Auggie wants to be an ordinary ten-year-old. He does ordinary things - eating ice cream, playing on his Xbox. He feels ordinary - inside. But ordinary kids don\'t make other ordinary kids run away screaming in playgrounds. Ordinary kids aren\'t stared at wherever they go. Born with a terrible facial abnormality, Auggie has been home-schooled by his parents his whole life. Now, for the first time, he\'s being sent to a real school - and he\'s dreading it. All he wants is to be accepted - but can he convince his new classmates that he\'s just like them, underneath it all? Wonder is a funny, frank, astonishingly moving debut to read in one sitting, pass on to others, and remember long after the final page.',1950,'R. J. Palacio','English','Penguin Random House Children\'s UK',0),(18,'The Day the Crayons Quit','Debut author Drew Daywalt and international bestseller Oliver Jeffers team up to create a colourful solution to a crayon-based crisis in this playful, imaginative story that will have children laughing and playing with their crayons in a whole new way. Poor Duncan just wants to colour in. But when he opens his box of crayons, he only finds letters, all saying the same thing: We quit!',2200,'Drew Daywalt','English','HarperCollins Publishers',0),(19,'The Wonky Donkey','The Wonky Donkey is based on an award-winning children’s song. With hilarious lyrics and illustrations, this picture book will appeal to adults and children alike. In this very funny, cumulative song, each page tells us something new about the donkey until we end up with a spunky, hanky-panky cranky stinky dinky lanky honky-tonky winky wonky donkey, which will have children in fits of laughter. Please note: The book does not include a recording of the song. The song may be downloaded only in the United States and Canada.',1100,'Craig Smith','English','Scholastic Paperbacks',0),(20,'Me Before You','Will needed Lou as much as she needed him, but will her love be enough to save his life?\nLou Clark knows lots of things. She knows how many footsteps there are between the bus stop and home. She knows she likes working in The Buttered Bun teashop and she knows she might not love her boyfriend Patrick.\nWhat Lou doesn\'t know is she\'s about to lose her job or that knowing what\'s coming is what keeps her sane.\nWill Traynor knows his motorcycle accident took away his desire to live. He knows everything feels very small and rather joyless now and he knows exactly how he\'s going to put a stop to that.\nWhat Will doesn\'t know is that Lou is about to burst into his world in a riot of colour. And neither of them knows they\'re going to change the other for all time.\nIf you fell in love with Lou Clark, find out what she does next in After You and Still Me - out now!',2200,'Jojo Moyes','English','Penguin Books Ltd',1),(21,'A Little Life','The million copy bestseller, A Little Life by Hanya Yanagihara, is an immensely powerful and heartbreaking novel of brotherly love and the limits of human endurance.\n\n        When four graduates from a small Massachusetts college move to New York to make their way, they\'re broke, adrift, and buoyed only by their friendship and ambition. There is kind, handsome Willem, an aspiring actor; JB, a quick-witted, sometimes cruel Brooklyn-born painter seeking entry to the art world; Malcolm, a frustrated architect at a prominent firm; and withdrawn, brilliant, enigmatic Jude, who serves as their centre of gravity. Over the decades, their relationships deepen and darken, tinged by addiction, success, and pride. Yet their greatest challenge, each comes to realize, is Jude himself, by midlife a terrifyingly talented litigator yet an increasingly broken man, his mind and body scarred by an unspeakable childhood, and haunted by what he fears is a degree of trauma that he\'ll not only be unable to overcome - but that will define his life forever.',2400,'Hanya Yanagihara','English','Pan MacMillan',1),(22,'The Wonderful Things You Will Be','The New York Times bestseller that celebrates the dreams, acceptance, and love that parents have for their children . . . now and forever! This is the perfect gift for Mother\'s Day, and any day. From brave and bold to creative and clever, Emily Winfield Martin\'s rhythmic rhyme expresses all the loving things that parents think of when they look at their children. With beautiful, and sometimes humorous, illustrations, and a clever gatefold with kids in costumes, this is a book grown-ups will love reading over and over to kids-both young and old. The Wonderful Things You Will Be has a loving and truthful message that will endure for lifetimes and makes a great gift for any occasion, but a special stand-out for baby showers, birthdays, Easter, and graduation.',4000,'Emily Winfield Martin','English','Random House USA Inc',0),(23,'Dr. Seuss\'s ABC : An Amazing Alphabet Book','Complemented by Dr. Seuss\'s rhyming text and familiar creature illustrations, a sturdy, hand-sized introduction to the alphabet makes learning as simple as A, B, C. For children under three.',900,'Dr. Seuss','English','Random House USA Inc',0),(24,'The Tiger Who Came to Tea','The doorbell rings just as Sophie and her mummy are sitting down to tea. Who could it possibly be? What they certainly don\'t expect to see at the door is a big furry, stripy tiger! This inimitable picture book is perfect for reading aloud, or for small children to read to themselves time and again. First published in 1968 and never out of print, it has become a timeless classic enjoyed and beloved by generations of children.\nThe magic begins at teatime!',750,'Judith Kerr','English','HarperCollins Publishers',0),(25,'The Husband\'s Secret','Mother of three and wife of John-Paul, Cecilia discovers an old envelope in the attic. Written in her husband\'s hand, it says: to be opened only in the event of my death. Curious, she opens it - and time stops. John-Paul\'s letter confesses to a terrible mistake which, if revealed, would wreck their family as well as the lives of others. Cecilia wants to do the right thing, but right for who? If she protects her family by staying silent, the truth will worm through her heart. But if she reveals her husband\'s secret, she will hurt those she loves most . ',2200,'Liane Moriarty','English','Penguin Books Ltd',1),(26,'The Alchemist','Santiago, a young shepherd living in the hills of Andalucia, feels that there is more to life than his humble home and his flock. One day he finds the courage to follow his dreams into distant lands, each step galvanised by the knowledge that he is following the right path: his own. The people he meets along the way, the things he sees and the wisdom he learns are life-changing.',1100,'Paulo Coelho','English','Harper',1),(27,'The Gruffalo','A mouse is taking a stroll through the deep, dark wood when along comes a hungry fox, then an owl, and then a snake. The mouse is good enough to eat but smart enough to know this, so he invents . . . the gruffalo! As Mouse explains, the gruffalo is a creature with terrible claws, and terrible tusks in its terrible jaws, and knobbly knees and turned-out toes, and a poisonous wart at the end of its nose. But Mouse has no worry to show. After all, there\'s no such thing as a gruffalo.',900,'Julia Donaldson','English','Penguin Random House Children\'s UK',0),(28,'Gangsta Granny','Another hilarious and moving novel from bestselling, critically acclaimed author David Walliams, the natural successor to Roald Dahl. A story of prejudice and acceptance, funny lists and silly words, this new book has all the hallmarks of David\'s previous bestsellers. Our hero Ben is bored beyond belief after he is made to stay at his grandma\'s house. She\'s the boringest grandma ever: all she wants to do is to play Scrabble, and eat cabbage soup. But there are two things Ben doesn\'t know about his grandma. 1) She was once an international jewel thief. 2) All her life, she has been plotting to steal the crown jewels, and now she needs Ben\'s help..',1100,'David Walliams','English','HarperCollins Publishers',0),(29,'Gone Girl','\'What are you thinking, Amy? The question I\'ve asked most often during our marriage, if not out loud, if not to the person who could answer. I suppose these questions stormcloud over every marriage: What are you thinking? How are you feeling? Who are you? What have we done to each other? What will we do?\' Just how well can you ever know the person you love? This is the question that Nick Dunne must ask himself on the morning of his fifth wedding anniversary when his wife Amy suddenly disappears. The police immediately suspect Nick. Amy\'s friends reveal that she was afraid of him, that she kept secrets from him. He swears it isn\'t true. A police examination of his computer shows strange searches. He says they aren\'t his. And then there are the persistent calls on his mobile phone. So what really did happen to Nick\'s beautiful wife? And what was in that half-wrapped box left so casually on their marital bed? In this novel, marriage truly is the art of war',1900,'Gillian Flynn','English','Orion Publishing Co',1),(30,'A Game of Thrones: A Song of Ice and Fire','The first volume of A Song of Ice and Fire, the greatest fantasy epic of the modern age. GAME OF THRONES is now a major TV series from HBO, starring Sean Bean. Summers span decades. Winter can last a lifetime. And the struggle for the Iron Throne has begun. As Warden of the north, Lord Eddard Stark counts it a curse when King Robert bestows on him the office of the Hand. His honour weighs him down at court where a true man does what he will, not what he must ...and a dead enemy is a thing of beauty. The old gods have no power in the south, Stark\'s family is split and there is treachery at court. Worse, the vengeance-mad heir of the deposed Dragon King has grown to maturity in exile in the Free Cities. He claims the Iron Throne.',2200,'George R. R. Martin','English','HarperCollins Publishers',1),(31,'Fantastic Beasts and Where to Find Them','J.K. Rowling\'s screenwriting debut is captured in this exciting hardcover edition of the Fantastic Beasts and Where to Find Them screenplay. When Magizoologist Newt Scamander arrives in New York, he intends his stay to be just a brief stopover. However, when his magical case is misplaced and some of Newt\'s fantastic beasts escape, it spells trouble for everyone...Fantastic Beasts and Where to Find Them marks the screenwriting debut of J.K. Rowling, author of the beloved and internationally bestselling Harry Potter books. Featuring a cast of remarkable characters, this is epic, adventure-packed storytelling at its very best. Whether an existing fan or new to the wizarding world, this is a perfect addition to any reader\'s bookshelf.',2000,'J. K. Rowling','English','Little, Brown Book Group',1),(32,'The 13-Storey Treehouse','The 13-Storey Treehouse is the first book in Andy Griffiths and Terry Denton\'s wacky treehouse adventures, where the laugh-out-loud story is told through a combination of text and fantastic cartoon-style illustrations. Andy and Terry live in the WORLD\'S BEST treehouse! It\'s got a giant catapult, a secret underground laboratory, a tank of man-eating sharks and a marshmallow machine that follows you around and shoots marshmallows into your mouth whenever you\'re hungry! Just watch out for the sea monkeys, and the monkeys pretending to be sea monkeys, and the giant mutant mermaid sea monster . . . Oh, and, whatever you do, don\'t get trapped in a burp-gas-filled bubble . . . !',850,'Andy Griffiths','English','Pan MacMillan',0);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64BF3F022989F1FD` (`invoice_id`),
  CONSTRAINT `FK_64BF3F022989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `percentage` smallint(6) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E1E0B40E2989F1FD` (`invoice_id`),
  CONSTRAINT `FK_E1E0B40E2989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` VALUES (84,36,'10% discount from the children books total',1,10,240),(85,36,'Additional 5% discount from the books total',2,5,260);
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payable` int(11) NOT NULL,
  `net_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (36,1,'2020-05-22 16:32:47',1,'2020-05-22 16:38:33',NULL,5200,4700);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_book`
--

DROP TABLE IF EXISTS `invoice_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_book` (
  `invoice_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`,`book_id`),
  KEY `IDX_C920C1542989F1FD` (`invoice_id`),
  KEY `IDX_C920C15416A2B381` (`book_id`),
  CONSTRAINT `FK_C920C15416A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C920C1542989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_book`
--

LOCK TABLES `invoice_book` WRITE;
/*!40000 ALTER TABLE `invoice_book` DISABLE KEYS */;
INSERT INTO `invoice_book` VALUES (36,1),(36,2),(36,3),(36,4);
/*!40000 ALTER TABLE `invoice_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200519094029','2020-05-19 09:40:56'),('20200520165327','2020-05-20 16:55:42'),('20200521002411','2020-05-21 00:26:32'),('20200521162459','2020-05-21 23:17:55'),('20200522104130','2020-05-22 10:49:22'),('20200522104805','2020-05-22 14:12:29'),('20200522141203','2020-05-22 14:12:29');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-23  7:10:33
