-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2022 at 11:00 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(20) NOT NULL,
  `bahan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `bahan`) VALUES
(24, '3/4 cup water'),
(24, '2/3 cup white wine or cider vinegar'),
(24, '2 teaspoons sugar'),
(24, '1 teaspoon kosher salt'),
(24, '1 medium red onion, thinly sliced'),
(25, '2 cups water'),
(25, '1 teaspoon salt'),
(25, '1/8 teaspoon ground black pepper'),
(25, '2 tablespoons butter'),
(25, '6 cups green onions, cut into 3 inch lengths'),
(25, '12 baby carrots'),
(25, '3/2 pounds fresh green beans, cut into 1-inch lengths'),
(25, '2 cups fresh shelled green peas'),
(25, '2 cups half-and-half'),
(25, '3 tablespoons all-purpose flour'),
(26, '24 slices French baguette'),
(26, '1 tablespoon butter, softened'),
(26, '2 cups chopped fresh strawberries'),
(26, '1/4 cup white sugar, or as needed'),
(27, '1 tablespoon olive oil'),
(27, '1/2 onion, diced'),
(27, '1/2 red bell pepper, diced'),
(27, '2 cloves garlic, minced'),
(27, '1 teaspoon chili powder'),
(27, '1/2 teaspoon smoked paprika'),
(27, '1/2 teaspoon ground cumin'),
(27, '2 cups baby kale'),
(27, '3/2 cups marinara sauce'),
(27, '1/2 teaspoon sea salt'),
(27, '1/2 teaspoon ground black pepper'),
(27, '4 eggs'),
(27, '1 tablespoon chopped fresh parsley'),
(28, '1/3 cup olive oil'),
(28, '3/2 tablespoons freshly squeezed lemon juice'),
(28, '3/2 tablespoons red wine vinegar'),
(28, '3/2 tablespoons chopped fresh oregano'),
(28, '2 cloves garlic, minced'),
(28, '1/2 teaspoon salt'),
(28, '1/4 teaspoon ground black pepper'),
(28, '3/2 pounds boneless leg of lamb, trimmed of all fat and cut into 1-inch cubes'),
(29, '2 tablespoons coconut oil'),
(29, '1 (16 ounce) package skinless, boneless chicken breast halves, cut into small cubes'),
(29, '1 (14 ounce) can cream of coconut (such as Trader Joe'),
(29, '1 (11 ounce) bottle red Thai curry sauce (such as Trader Joe'),
(29, '1/2 (16 ounce) package dried rice stick vermicelli noodles'),
(36, '900 grams beef tenderloin'),
(36, 'cut into 5 cm pieces 12 shallots'),
(36, 'chopped 12 large red chilis'),
(36, 'chopped 2 tsp chopped ginger 2 tbsp chopped galangal salt'),
(36, '4 tsp ground candlenut'),
(36, '2 tbsp ground white pepper'),
(36, '1 tsp ground cardamom'),
(36, '2 tbsp ground coriander'),
(36, '2 tbsp ground cumin'),
(36, '1/2 tsp ground nutmeg'),
(36, 'minced 1/2 cup grapeseed oil'),
(36, '4 leaves kaffir lime'),
(37, 'chicken thighs or breasts - boneless and skinless chicken seasoned with salt, pepper, and olive oil.'),
(37, 'all-purpose flour (or cornstarch) - for coating the chicken to create a floured layer.'),
(37, 'cooking oil spray - to create a crispy crust on the outside of the chicken when baked.'),
(37, 'soy sauce'),
(37, 'black vinegar'),
(37, 'Chinese Shaoxing cooking wine (or mirin)'),
(37, 'granulated sugar'),
(37, 'chicken broth'),
(37, 'dried red chili peppers'),
(37, 'garlic and ginger'),
(37, 'green onion'),
(38, '1/4 pound cubed eggplant'),
(38, '1/2 teaspoon salt'),
(38, '1 (10 ounce) can diced tomatoes and green chiles (such as RO*TELÂ®)'),
(38, '1 pound ground beef'),
(38, '1 (10 ounce) can diced tomatoes and green chiles (such as RO*TELÂ®)'),
(38, '1 large green bell pepper, chopped'),
(38, '2 cloves garlic, minced'),
(38, '1/2 teaspoon dried thyme'),
(38, '1/2 teaspoon dried rosemary'),
(38, '1/2 teaspoon chili powder'),
(39, 'Â½ cup finely chopped fresh parsley'),
(39, 'Â½ cup finely chopped fresh parsley'),
(39, '2 tablespoons chopped fresh oregano leaves'),
(39, '1 tablespoon red wine vinegar'),
(39, '2 cloves garlic, minced'),
(39, 'Â¼ teaspoon salt'),
(39, 'â…› teaspoon red pepper flakes'),
(39, '1 (3 pound) whole chicken'),
(39, 'Â½ cup chicken broth'),
(39, '1 large onion, sliced'),
(40, '3 avocados - peeled, pitted, and mashed'),
(40, '1 lime, juiced'),
(40, 'Â½ cup diced onion'),
(40, '1 teaspoon salt'),
(40, '3 tablespoons chopped fresh cilantro'),
(40, '2 roma (plum) tomatoes, diced'),
(40, '1 teaspoon minced garlic'),
(40, '1 pinch ground cayenne pepper (Optional)'),
(41, '4 ounces ClamatoÂ® Tomato Cocktail'),
(41, '1 ounce vodka'),
(41, '4 dashes Worcestershire sauce'),
(41, '2 dashes hot sauce'),
(41, '3 pinches kosher salt & chili powder'),
(41, '1 fresh celery stick'),
(41, '1 wedge lime for garnish');

-- --------------------------------------------------------

--
-- Table structure for table `langkah`
--

CREATE TABLE `langkah` (
  `id` int(20) NOT NULL,
  `langkah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langkah`
--

INSERT INTO `langkah` (`id`, `langkah`) VALUES
(24, 'In a bowl, whisk together the first four ingredients until sugar and salt dissolve. Place onions and optional ingredients, if desired, into large glass jar; '),
(24, 'pour vinegar mixture over onions. Seal and '),
(25, 'Heat water to boiling in a medium pot; add potatoes. Reduce heat and simmer until potatoes are tender, approximately 15 to 20 minutes.'),
(25, 'Add salt, pepper, butter, onions, carrots and green beans; simmer until tender then add peas.'),
(25, 'In a small bowl, stir together half-and-half and flour until smooth; stir into the simmering vegetables. Cook, stirring constantly until the soup is slightly thickened. Serve immediately.'),
(26, 'Preheat your oven\'s broiler. Spread a thin layer of butter on each slice of bread. Arrange bread slices in a single layer on a large baking sheet.'),
(26, 'Place bread under the broiler for 1 to 2 minutes, just until lightly toasted. Spoon some chopped strawberries onto each piece of toast, then sprinkle sugar over the strawberries.'),
(26, 'Place under the broiler again until sugar is caramelized, 3 to 5 minutes. Serve immediately.'),
(27, 'Turn on a multi-functional pressure cooker (such as Instant PotÂ®) and select Saute function. Heat olive oil and cook onion, red bell pepper, garlic, chili powder, paprika, and cumin until soft, about'),
(27, 'Crack eggs carefully in the pot, evenly spaced. Close and lock the lid. Select low pressure according to manufacturer'),
(28, 'Whisk olive oil, lemon juice, red wine vinegar, oregano, garlic, salt, and pepper together in a medium bowl. Add cubed lamb and stir until all of the lamb is coated with the marinade. Cover and refrig'),
(28, 'Preheat an outdoor grill for medium-high heat and lightly oil the grate.'),
(28, 'Thread marinated lamb onto skewers, reserving any remaining marinade. Grill skewers until desired doneness, 10 to 12 minutes, basting with the reserved marinade and turning occasionally for even cooki'),
(29, 'Heat oil in a large skillet on high heat. Add chicken cubes; cook until browned, about 2 minutes per side. Reduce heat to medium-high and add coconut cream and curry sauce. Cook until chicken is no lo'),
(29, 'Fill a large pot with lightly salted water and bring to a rolling boil; stir in vermicelli pasta and return to a boil. Cook pasta uncovered, stirring occasionally, until the pasta is tender yet firm t'),
(29, 'Reduce skillet heat to simmer. Add the noodles and let simmer until flavors are absorbed, about 5 minutes. Divide chicken and noodles among individual serving bowls.'),
(36, 'In a blender, combine all ingredients for the spice paste (except turmeric, lime leaves and coconut cream) and blend until smooth'),
(36, 'In a large wok or pot, add turmeric and lime leaves to the spice paste and start to cook on medium heat, stirring constantly until aromatic. Add coconut cream and stir to combine'),
(36, 'Bring to a simmer and cook, stirring constantly to ensure the mixture doesn'),
(36, 'Using a bowl, season beef tenderloin cubes with salt, pepper, cumin and coriander. In a separate pan, heat pan with grapeseed oil and sear the beef on all sides until dark brown'),
(36, 'Add beef to wok and continue simmering, stirring constantly, as the coconut liquid reduces and the natural oil in the coconut cream starts to separate the mixture and turn golden brown.'),
(36, '. Continue stirring until mixture starts to dry and has the texture of wet sand, being extra careful not to burn at this last step to avoid bitterness.'),
(36, 'When the rendang has reached the proper color and the meat is tender, remove the heat and serve with steamed white rice.'),
(37, 'Prepare the chicken. Pat dry the chicken completely with paper towel and cut into 1-inch cubes. Place into a medium mixing bowl and season with salt, pepper and oil. Toss well to combine and set aside'),
(37, 'Bake the chicken. Place coated chicken on a large half sheet baking pan lined with parchment paper. Lightly spray the chicken with cooking spray oil to help create a crispy crust on the outside. Bake '),
(37, 'Make the sauce. In another medium mixing bowl, whisk together all the sauce ingredients until sugar and cornstarch is fully combined. In a shallow saucepan or wok, heat the sauce over medium heat for '),
(37, 'Toss in baked chicken and serve. Add the baked chicken and toss well to coat. Garnish with sesame seeds on top and serve immediately with a bowl of steamed rice or fried rice.'),
(38, 'Place eggplant in a bowl, sprinkle with salt, and add water to cover. Let stand for 15 minutes. Drain and pat dry.'),
(38, 'Heat a large skillet over medium-high heat. Cook and stir ground beef in the hot skillet until browned and crumbly, 5 to 7 minutes.'),
(38, 'Reduce heat to low and add diced tomatoes and green chiles, eggplant, bell pepper, garlic, thyme, rosemary, and chili powder. Mix well, cover, and simmer until vegetables are tender, 15 to 20 minutes.'),
(39, 'Combine parsley, 2 1/2 tablespoons olive oil, oregano, vinegar, garlic, salt, red pepper flakes, and black pepper in a bowl; mix the chimichurri thoroughly.'),
(39, 'Place chicken on a cutting board and remove the backbone using kitchen shears. Press down on the breast with the heel of your hand to flatten. Loosen the skin of the chicken carefully and rub the chim'),
(39, 'Allow chicken to come to room temperature for no more than 1 hour before baking.'),
(39, 'Allow chicken to come to room temperature for no more than 1 hour before baking.'),
(39, 'Rub 1 teaspoon olive oil over the chicken; season with salt and pepper. Place onion in a cast-iron skillet. Pour chicken broth over onion. Place seasoned chicken on top.'),
(39, 'Bake in the preheated oven until no longer pink at the bone and the juices run clear, about 45 minutes. An instant-read thermometer inserted into the thickest part of the meat, near the bone, should r'),
(40, 'In a medium bowl, mash together the avocados, lime juice, and salt'),
(40, 'Mix in onion, cilantro, tomatoes, and garlic.'),
(40, 'Stir in cayenne pepper. Refrigerate 1 hour for best flavor, or serve immediately.'),
(41, 'Rim a glass with lime, kosher salt and chili powder.'),
(41, 'Fill the glass with ice and add ingredients.'),
(41, 'Mix the ingredients thoroughly, then garnish with a fresh celery stick and lime wedge and enjoy!');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `email`, `password`) VALUES
('1', '1@mail.com', '1bbd886460827015e5d605ed44252251'),
('2', '2@mail.com', 'bae5e3208a3c700e3db642b6631e95b9'),
('3', '3@mail.com', 'd27d320c27c3033b7883347d8beca317'),
('anonym', 'anonym@mail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `asal` varchar(40) NOT NULL,
  `porsi` varchar(20) NOT NULL,
  `lama` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `visibility` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `username`, `nama`, `deskripsi`, `asal`, `porsi`, `lama`, `foto`, `visibility`) VALUES
(24, '3', 'Pickled Red Onions', 'Everyone should have a jar of this pickled red onion recipe in their refrigerator at all times. I put them on everything and they keep for weeks, if they last that long. ', 'healthy, simple', '8 Orang', '1 Jam', '629a186669e08.jpg', 1),
(25, '3', 'Finnish Summer Soup', 'This soup should be made with fresh vegetables. Serve with a bread and cheese platter as they do in Finland. If you can\'t get fresh shelled green peas, use frozen tiny green peas.', 'healthy soup', '', '', '629a1a4cb1cc6.jpg', 1),
(26, '3', 'Strawberry Bruschetta', 'This is a delicious variation of the popular tomato based appetizer. The strawberries are warm and sweet and the sugar is caramelized and crunchy! Your guests will love it!', 'snack, appetizer', '12 Orang', '15 Menit', '629a1b5819cea.jpg', 1),
(27, '3', 'Instant PotÂ® Paleo and Keto Egg Shakshuka with Ka', 'Try this tasty keto and paleo breakfast shakshuka full of greens! Delicious, quick, and so easy to make in just minutes in your Instant PotÂ®!', 'Breakfast', '4 Orang', '30 Menit', '629a1c3e71bdd.jpg', 1),
(28, '3', 'Lamb Souvlaki', 'Tender pieces of lamb, marinated in a Greek lemon vinaigrette, threaded on skewers and char-grilled to perfection. I like to serve these with rosemary garlic roasted potatoes, a Greek salad, and pita ', 'Domba, Dinner', '4 Orang', '3 hrs 25 mins', '629a1cb985fef.jpg', 1),
(29, '3', 'Five-Ingredient Red Curry Chicken', 'Five-ingredient red curry chicken with noodles is easy, quick, and inexpensive to make. Sweetened with coconut milk for unbelievable flavor! Top with chopped cilantro, green onions, and red chile pepp', 'Asian, curry', '6 Orang', '30 menit', '629a1d8779af0.jpg', 1),
(36, '2', 'Gordon Ramsay Beef Rendang', 'Suddenly craving for some rendang (meat slow-cooked in coconut milk and spices) after watching the West Sumatra episode of Gordon Ramsay: Uncharted? ', 'Minang, padang, gordon ramsay', '4 Orang', '5 Jam', '62a0c286159e3.jpg', 1),
(37, '2', 'GENERAL TSO\'S CHICKEN', 'Baked General Tso\'s Chicken is saucy, savoury, sweet and spicy. It\'s a Chinese-American takeout favourite made healthier with baked chicken bites (not deep-fried) smothered in a thick and flavourful s', 'Chinese', '5 Orang', '5 Jam', '62a0c3bf32265.jpg', 1),
(38, '2', 'Spicy Low-Carb Eggplant with Beef and Tomatoes', 'I can\'t have the carbs, so this is good enough, but it would be nice served over white rice adding fresh corn.', 'Spicy, finland', '4 Orang', '45 Menit', '62a0c493af919.jpg', 1),
(39, '1', 'Chimichurri Baked Chicken', 'Chimichurri is a dish from Argentina that is usually served over grilled chicken or steak. This is my version, which may or may not be authentic.', 'chicken, baked', '6 Orang', '1 Hari 2 jam', '62a0c5877fd93.jpg', 1),
(40, '1', 'Guacamole', 'You can make this avocado salad smooth or chunky depending on your tastes.', 'Mexico', '4 Orang', '10 Menit', '62a0c680f3cb6.jpg', 1),
(41, '1', 'ClamatoÂ® Bloody Caesar', 'Taste the savory ClamatoÂ® Bloody Caesar. One of our original recipes.', 'drink', '1', '10 menit', '62a0c7119acb1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD KEY `fkbahan` (`id`);

--
-- Indexes for table `langkah`
--
ALTER TABLE `langkah`
  ADD KEY `fklangkah` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userfk` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `fkbahan` FOREIGN KEY (`id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `langkah`
--
ALTER TABLE `langkah`
  ADD CONSTRAINT `fklangkah` FOREIGN KEY (`id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `userfk` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
