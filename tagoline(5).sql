-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagoline`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `M_id` int(5) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `booking_status` varchar(1) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_id`, `M_id`, `cus_name`, `address`, `telephone`, `total_price`, `booking_status`, `booking_date`) VALUES
(00087, 39, 'sun1', ' ', 1561561, 2100, '1', '2023-02-17 18:01:22'),
(00088, 39, 'sun1', ' ', 1561561, 1400, '1', '2023-02-17 18:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `B_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `H_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `bookingPrice` int(10) NOT NULL,
  `bookingQty` int(10) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `B_id`, `H_id`, `bookingPrice`, `bookingQty`, `Total`) VALUES
(00131, 00087, 00050, 900, 1, 900),
(00132, 00087, 00051, 1200, 1, 1200),
(00133, 00088, 00052, 1400, 1, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `H_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'id การสร้างบ้าน',
  `H_name` varchar(100) NOT NULL COMMENT 'ชื่อโปรเจคสร้างบ้าน',
  `S_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'แพลนการสร้างจาก plan',
  `amount` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `picture2` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `picture3` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `detail_thumb` varchar(1000) NOT NULL COMMENT 'รายละเอียด',
  `B_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`H_id`, `H_name`, `S_id`, `amount`, `price`, `picture`, `picture2`, `picture3`, `detail_thumb`, `B_id`) VALUES
(00049, 'Plan 95196RW Transitional Northwest House Plan with 3Car Tandem Garage', 00020, 0, 1650, 'pro_63ef79ac48495.jpg', 'pro_63ef79ac487fd.jpg', 'pro_63ef79ac48a41.jpg', 'This Transitional Northwest house plan delivers a forward-facing garage with tandem parking that is considerate of narrow lot lines. Step inside to find a den, or bedroom, to the left of the entry with access to a full bath. Builtins surround the fireplace in the family room where minimal walls create an open-concept living space. Sliding glass doors invite you to spend time on the 156 by 114 deck that creates an ideal spot for a grill. Three bedrooms, a laundry room, and compartmentalized bathroom reside upstairs. The master bedroom delights in a private balcony, while the attached bathroom features a standalone tub in the nook of a bay window', 0),
(00050, 'Plan 8188AB 6 Square Foot Modern Garage Apartment or ADU', 00020, 1, 900, 'pro_63efa47e651d4.jpg', 'pro_63efa47e6587c.jpg', 'pro_63efa47e65fde.jpg', 'This modern garage apartment gives you 6 square feet of heated living set above a 3car 912 square foot 3car garage The 1car bay has a 9 by 9 overhead door and the 2car bay has a 16 by 7 overhead door A workbench lines the back of the 2car bay giving you space for small projects and tool storage Theres also storage under the stairs Upstairs the bedroom suite is in front and gets natural light from the windows on two sides A stackable washerdryer is in a closet steps away The Cshaped kitchen has counter seating and is open to the living room', 0),
(00051, 'Plan 623142DJ 2Bed BarndominiumStyle House Plan with Covered Patio and 3Car Garage', 00020, 1, 1200, 'pro_63efa4c2512d1.jpg', 'pro_63efa4c251773.jpg', 'pro_63efa4c251b33.jpg', 'This modern barndominiumstyle house plan has a large covered patio and a huge garage with parking for 3 cars Entering from the garage you walk through the mudroom and find yourself in an open space perfect for gathering with friends and family The kitchen features a walkin pantry and a wide space with a view straight to the great room leaving no guest unnoticed There are two bedrooms one with a shared bath and the other with a large vanity soaking tub and walkin closet Step outside onto the covered patio and under the gorgeous pergola perfect for adding lights to create the perfect mood for your evenings', 0),
(00052, 'Plan 623153DJ Luxurious Modern Mountain Style House Plan with Expansion Option', 00020, 1, 1400, 'pro_63efa507644b7.jpg', 'pro_63efa50764989.jpg', 'pro_63efa50764d09.jpg', 'This modern mountain style home is 2214 square feet of pure luxury Not only is the curb appeal a stunning addition to this home but the interior provides an aspect of luxury that makes you feel like a celebrity  After walking in through either the twocar garage or covered deck you can prepare to be in awe The garage is connected to a mudroom complete with a catch all as well as a bench and lockers for all things coats and shoes While walking down to enter the hallway you can find a large laundry room on the right and the master bedroom straight ahead  The master has its own covered deck at the rear as well as a spacious walkin closet and large bathroom The bathroom is finished with a double vanity large soaking tub and separate toilet and shower areas Walking outside of the master to the right is a beautiful breezeway that provides breathtaking views This enters into a large open space for an entryway great room kitchen and dining room All around the perimeter of the rooms has access t', 0),
(00053, 'Plan 2737AF Modern Rustic 3Bed Cottage Designed for Mountain or Water Views', 00020, 0, 1195, 'pro_63efa57e1438b.jpg', 'pro_63efa57e14748.jpg', 'pro_63efa57e14a61.jpg', 'The front of this 3bed modern Rustic cottage house plan gives you a 46wide and 8deep porch to enjoy the views of the water or the mountains  The interior slopes from 84 along the kitchen end to 134 along the porch end All the rooms on the front have windows designed to capture the views  A split bedrooms layout maximizes your privacy and leaves the middle of the home open concept  Related Plan Get an alternate version with house plan 2759AF 1378 sq ft or add a 2car garage and a modern farmhouse exterior with house plan 2742AF 1458 sq ft', 0),
(00054, 'Plan 8184AB 2Car Detached Garage Shop with 14 by 14 Garage Doors and Rec Room with Wet Bar', 00020, 0, 1100, 'pro_63efa5c0dee8b.jpg', 'pro_63efa5c0df67b.jpg', 'pro_63efa5c0dfc04.jpg', 'This 2car garage shop has matching 14 by 14 overhead doors getting your vehicles access to the 384 square feet of parking space inside Thats plenty of space for an RV a boat cars you can park 4 tandemstyle and room to work on projects as well On the right theres a fun space that includes a wet bar open to a combined game and rec room space Two doors  one in front and a covered one on the right  add to your convenience', 0),
(00055, 'Plan 81759AB OneLevel Modern Home Plan with Angled Garage and Master Retreat', 00020, 0, 1700, 'pro_63efa5fb46cc1.jpg', 'pro_63efa5fb471e6.jpg', 'pro_63efa5fb475bb.jpg', 'The stunning exterior presented by this Onelevel Modern home plan features a variety of siding materials Inside the central living area is filled with natural light due to oversized windows Two islands anchor the gourmet kitchen and a passthrough pantry connects to the mudroom to help ease the burden of unloading groceries The master retreat boasts a flex  lounge room as well as a spalike ensuite with a wet room and large wardrobe Enjoy outdoor living on the generous optionallyscreened deck with a doublesided fireplace to warm friends and family Downstairs discover a large rec  game room in the walkout basement along with two bedrooms a laundry room and media room', 0),
(00056, 'Plan 3183MAT Exclusive Modern Prairie House Plan with Optional Lower Level', 00020, 0, 1495, 'pro_63efa6857606a.jpg', 'pro_63efa68576592.jpg', 'pro_63efa68576970.jpg', 'This Modern Prairie home plan exclusive to Architectural Designs provides flexibility with the optional lower level an increase of 1233 square feet of living space The sunken entry grants access to the primary bedroom which neighbors a pocket office and includes a 5fixture ensuite and a walkin closet A combined kitchen dining area and great room creates the perfect environment for entertaining and the adjacent covered deck begs you to BBQ and dine outdoors Bedrooms 2 and 3 share the second level with an upper family room and compartmentalized bathroom Three additional bedrooms can be gained when you finish the basement as well as a family room with a wet bar and flex space', 0),
(00057, 'Plan 8176AB Modern Home Plan Under 42 Square Feet with Over 2 Square Feet of Garage Space', 00020, 0, 2300, 'pro_63efa6c1446e1.jpg', 'pro_63efa6c144c0a.jpg', 'pro_63efa6c145193.jpg', 'This 4166 square foot modern home plan gives you up to 5 bedrooms when you build out the optional finished lower level and over 2 square feet of garage space giving you the ability to park upwards of 5 cars Standing in the foyer your view extends across the 2story great room to the open deck beyond A flex room on the other side of the stairs makes a great home office or private den Eat in the dining room which is open to the great room and kitchen or go through the sliding doors in the dining room to the screened deck with its own outdoor kitchen The second floor gives you 3 bedrooms including the master suite with private balcony and an exercise roomflex room There is laundry upstairs as well for your convenience', 0),
(00058, 'Plan 62381DJ Modern AFrame House Plan with Side Entry', 00021, 0, 1400, 'pro_63efb1a836592.jpg', 'pro_63efb1a836fa6.jpg', 'pro_63efb1a837494.jpg', 'This modern Aframe house plan has an exterior with cedar siding and a metal roof On the right an airlocktype entry gets you inside  as do sliding doors on the front and back  introducing you to an open layout The kitchen includes a pantry a large island with a snack bar and ample counter space The great room lies under a soaring 2story cathedral ceiling the highest point of the ceiling is 3 and is warmed by a fireplace that is flanked by builtin bookshelves A large quad sliding glass door leads from the great room to the rear of the home  The master suite is conveniently located on the main floor and includes its own large quad sliding glass door to the front of the home The master bathroom includes hisher vanities The second floor adds an additional bedroom and a wonderful loft area The bedroom feels huge with its tall cathedral ceiling', 0),
(00059, 'Plan 2747AF Modern Aframe with Ladderaccessible Third Story loft', 00021, 0, 895, 'pro_63efb1e481067.jpg', 'pro_63efb1e48166e.jpg', 'pro_63efb1e481b5a.jpg', 'This modern Aframe offers the simplicity of form with with jawdropping looks Put this by a lake in the mountains or wherever you want to escape to and youll be sure to enjoy your time spent on the front and back decks and inside A bench greets you when you enter the front door and a closet is there to help prevent clutter from spreading Doors to either side take you to two main floor bedrooms Go down the hall and youll find yourself in the towering open living space unifying the livingdining room and the kitchen under a vaulted ceiling Windows in back are designed to maximize your views Stairs take you to the second floor where two more bedrooms await as well as a lounge area with views to below Note the ladder in the lounge area That takes you to a 239 square foot third floor loft with views to the back and below Related Plans Get alternate versions with house plans 2746AF and 2748AF', 0),
(00060, 'Plan 31595GF Contemporary AFrame with Sleeping Loft Overlooking Great Room', 00021, 0, 820, 'pro_63efb2116843e.jpg', 'pro_63efb21168819.jpg', 'pro_63efb21168b54.jpg', 'Enjoy the visual and functional simplicity with this attractive contemporary Aframe house plan Porches front and back expand your enjoyment to the outdoors Inside the great room ceiling soars skyward and the space flows to the dining room and kitchen One bedroom is located in the back of the home and has access to a full bath across the home Upstairs there is a second bedroom as well as a sleeping loft that looks down to the great room below A shared bathroom rounds out the home', 0),
(00061, 'Plan 2746AF 3Bed Modern AFrame with LadderAccessible 3rd Floor Loft', 00021, 0, 895, 'pro_63efb25bde994.jpg', 'pro_63efb25bdecef.jpg', 'pro_63efb25bdf07e.jpg', 'This modern Aframe offers the simplicity of form with with jawdropping looks Put this by a lake in the mountains or wherever you want to escape to and youll be sure to enjoy your time spent on the front and back decks and inside Step in off the 5deep front porch and find yourself in the foyer with a bench and a coat closet to help minimize clutter from spreading into the home Doors on yuor left and right take you to two bedrooms Go down the hall and youll find yourself in the towering open living space unifying the livingdining room and the kitchen under a vaulted ceiling Windows in back are designed to maximize your views The back wall opens up giving you access to a 14deep deck Stairs take you to the second floor with the largest bedroom in the home and a lounge area that overlooks the living area below A ladder by the top of the stairs takes you to the  area takes you to the 239 square foot third floor loft that overlooks the space below and has views out the back windows Related Pl', 0),
(00062, 'Plan 35598GH 2Bed Contemporary AFrame House Plan with Loft', 00021, 0, 1245, 'pro_63efb285a827a.jpg', 'pro_63efb285a87ed.jpg', 'pro_63efb285a8f2f.jpg', 'This stunning Contemporary Aframe house plan includes 2 bedrooms front and back porches and a loft a total of 1599 square feet of living space The open living space is oriented to take advantage of the surrounding views through the rear wall of windows while a centered door invites you to enjoy the outdoors on the massive open porch The kitchen includes an eating bar for casual dining and conversation along with a corner pantry and large range The master suite is located on the main level and includes a walkin closet Across the hall discover the 4fixture bathroom and neighboring utility room Upstairs a loft overlooks the living room below and sits next to bedroom 2 that features a full bath and private forwardfacing porch Related Plan Get parking and a home theater beneath the home with house plan 3568GH', 0),
(00063, 'Plan 2748AF Modern Aframe with Main Floor Study and Third Floor Loft', 00021, 0, 895, 'pro_63efb2bd44788.jpg', 'pro_63efb2bd44e4e.jpg', 'pro_63efb2bd45368.jpg', 'This modern Aframe offers the simplicity of form with with jawdropping looks Put this by a lake in the mountains or wherever you want to escape to and youll be sure to enjoy your time spent on the front and back decks and inside Step in off the 5deep front porch and find yourself in the foyer with a bench and a storage nook The door on your left takes you to a bedroom and one on the right takes you to a study Go down the hall and youll find yourself in the towering open living space unifying the livingdining room and the kitchen under a vaulted ceiling Windows in back are designed to maximize your views The back wall opens up giving you access to a 14deep deck Stairs take you to the second floor where two more bedrooms await as well as a lounge area with views to below A ladder in the lounge area takes you to the 237 square foot third floor loft that overlooks the great room below and has views out the back windows Related Plans Replace the study with a bedroom with house plan 2747AF a', 0),
(00064, 'Plan 675MG Rustic Styling', 00022, 0, 1150, 'pro_63efb2f23e8b1.jpg', 'pro_63efb2f23f120.jpg', 'pro_63efb2f23f692.jpg', 'An attractive rustic facade complete with fieldstone fireplace and plenty of outdoor living area makes a good first impression Inside this two bedroom AFrame you will find a great floor plan lots of open space goodsized closets and a large open kitchen The ceiling in the living and dining area vaults up to 18 high The mudroomlaundry with walkin pantry and a coat closet is very practical Upstairs a private master retreat features a wall of his and her closets a bathroom with a whirlpool tub and even a cozy deck accessed thru double French doors The ceilings in the master bedroom are 8 high in the center sloping down to a knee wall of 66 at the sides', 0),
(00065, 'Plan 23167JD Impressive Luxurious Victorian House Plan', 00022, 0, 2200, 'pro_63efb404168e1.jpg', 'pro_63efb40416c68.jpg', 'pro_63efb40416f44.jpg', 'Stunning details adorn the exterior of this luxurious Victorian house plan Mullioned windows decorative wood trim and lots of bays make this home special The front porch wraps around the gorgeous den with its tray ceiling and big walkin storage closet The living room also has a bay window and is open to the formal dining room Even the kitchen is elegant and has a coffered ceiling walkin pantry and double doors that lead to the rear covered patio where you can dine outside In the family room a huge fireplace can be seen almost down to the foyer Four comfortable bedrooms are up on the second floor along with a vaulted bonus room Homeowners get top of the line treatment with a vaulted sitting room in an octagonal shape plus a luxurious vaulted master bathroom Related Plan Get a Craftsman exterior with house plan 2318JD NOTE Additional fees apply when building this house plan in the State of Washington Contact us for more information', 0),
(00066, 'Plan 388D Charming Gazebo', 00022, 0, 1445, 'pro_63efb43b84102.jpg', 'pro_63efb43b848d9.jpg', 'pro_63efb43b84d70.gif', 'This charming home with a gazebo at the front wraparound porch works well on a wide or corner lot All rearfacing rooms are brightened by light through walls of windows A lofty cathedral ceiling soars to 186 in the living room Complete with a cooktop island a walkin pantry and eating bar the kitchen is open to the living and dining rooms A sun room and an officemorning room complete the living area The master suite features a bay window in the bedroom and a walkin closet in the bath With an optional door off the entry bedroom three could serve as a study Ceilings 9 standard IMPORTANT NOTE Due to state regulations the CAD version may not be sold to residents of Alabama Louisiana New Mexico Tennessee and Texas If residing in any of the aforementioned states the PDF version does not come with a release to make plan modifications Please contact us for more information ', 0),
(00067, 'Plan 2142DR Victorian with Appealing Veranda', 00022, 0, 1500, 'pro_63efb474d77e5.jpg', 'pro_63efb474d7d78.jpg', 'pro_63efb474d817a.jpg', 'An attractive covered veranda curves around this house plan with hints of Victorian design Inside the layout is contemporary A twosided fireplace can be enjoyed from both the frontfacing living room and the rearfacing dining room The kitchen is partly built into a bayed area and includes a handy cooktop island that separates it visually from the breakfast room A private den with a large bay window completes the first floor Upstairs the master suite comprises a goodsized bedroom a large walkin closet and a private bathroom with a separate tub and shower The second bathroom on this floor can be accessed directly from either of the two family bedrooms Ceilings first floor 9 second floor 8 with a sloping ceiling in the master bedroom Related Plans Need more space See house plan 2181DR for a larger 3bedroom version with a 2car garage Building in reverse See house plan 21561DR 3 bedrooms and 21562DR 4 bedrooms', 0),
(00068, 'Cottagestyle WorkFromHome Plan ', 00022, 0, 540000, 'pro_63efb6f9c7a14.png', 'pro_63efb6f9c7ceb.png', 'pro_63efb6f9c8069.png', '    Imagine working from home in your cottagestyle backyard office The exterior features contrasting white shake siding with black soffit and fascia      The interior makes for a comfortable way to work remotely from home while keeping your home life separate This space feels much larger with a 14 high ceiling      Office Studio SheShed you name it this plan can be it', 0),
(00069, 'Plan 3188D Vacation or City Home ', 00022, 0, 1200000, 'pro_63efb73714bcf.png', 'pro_63efb73714efa.png', 'pro_63efb737152c9.png', '    With its slender footprint this countryVictorian home plan with an open plan works well on a narrow city lot or as a vacation home in a resort community     Front and rear covered porches offer outdoor enjoyment and provide shade from the heat     The study is accessed from either the entry foyer or the kitchen with its pantry closet An angled eating bar divides the kitchen from the bayed morning room and the spacious living room with builtin cabinets     A walkin closet and a private bath are featured in the master suite while the other bath is placed between bedrooms two and three     As an added bonus this house plan comes with a 2car detached garage     Related Plan For a smaller version of this house plan see 383D     IMPORTANT NOTE Due to state regulations the CAD version may not be sold to residents of Alabama Louisiana New Mexico Tennessee and Texas If residing in any of the aforementioned states the PDF version does not come with a release to make plan modifications Please', 0),
(00070, 'Magnificent Shingle Style Dream Home ', 00022, 0, 1300000, 'pro_63efb78164931.png', 'pro_63efb78164d2d.png', 'pro_63efb781651f0.png', '    Beautiful covered porches wrap around two side of this magnificent Shingle style home     Filled to the brim with luxurious amenties this home will wow friends and family alike     Tray twostory or coffered ceilings crown all of the main rooms and even the porches get special treatment     The unusual music room off the living room is circular in shape and flooded with light from windows on all side     Fireplaces warm the study and the huge family room that is open to the nook and kitchen     A separate prep kitchen makes entertaining on a grand scale easy     A large wine cellar and residential elevator are added bonuses     The second floor is equally magnificent with four luxurious bedroom suites and a sunken bonus room that is included in the homes 6725 square feet of finished living space     A huge private deck wraps around the opulent master suite with its separate sitting room with fireplace     The master bath is truly fit for a king with an enormous soaking tub and a dre', 0),
(00071, 'Gingerbread Victorian House', 00022, 0, 2900000, 'pro_63efb9114ade0.png', 'pro_63efb9114b1e8.png', 'pro_63efb9114b621.png', '    Gingerbread decorative trim and a lovely wraparound porch grace this large Victorian house plan     The dining room is set in a bay and is enclosed on three sides by the covered front porch     The great big wide foyer gives you immediate views of the family room that has a twostory ceiling     This house gets lots of light from plenty of windows along the back of the home     The master suite is on the main floor and benefits from a seethrough fireplace shared with the study     The big soaking tub is one step up set in a bay with a handy shelf for all your spa accessories     Two big bonus rooms are up on the second floor both of them huge     Each bedroom on this level gets a private bathroom', 0),
(00072, 'Flexible Victorian', 00022, 0, 6520000, 'pro_63efb94cc12e9.png', 'pro_63efb94cc16a4.png', 'pro_63efb94cc1a12.png', '    Embellished with gables a turret and a curved wraparound porch this Victorian design offers flexible venues for comfortable family living     The bayed dining room is large enough to accommodate a sitting area and the family room with a fireplace offers another cozy haven A second bay is found in the kitchen with its breakfast area     Also accessible from the hall the master bath includes a corner garden tub and separate shower     Upstairs three family bedrooms share two baths with walkin showers The family room on this floor could easily be used as a fifth bedroom     Bonus space over the garage is reached by a separate staircase near the downstairs family room     Related Plans Need less space See house plan 2142DR for a smaller twobedroom version with a smaller garage     Building in reverse Get a different exterior with house plan 21561DR 3 bedrooms and 21562DR 4 bedrooms', 0),
(00073, '12 Square Foot 2Car Detached Garage Plan with Storage Loft Above ', 00023, 0, 980000, 'pro_63efbeb9e88ee.png', 'pro_63efbeb9e8d4e.png', 'pro_63efbeb9e913d.png', 'This 2car detached garage plan is perfect as an addition to a home that lacks adequate parking It has an exterior with a blend of clapboard stone and shingles and a decorative bracket at the gable peak    Two garage doors  one per bay  a man door in back and a French doors on the left get you and your vehicles inside    Stairs in the back go up to bonus space Use this as a play or game room a workfromhome space a he or sheshed or just for storage    Related Plans Add a shed roofed porch on the side with garage plans 13519GRA and 135189GRA', 0),
(00074, 'Contemporary Country', 00023, 0, 12500000, 'pro_63efbf2800462.png', 'pro_63efbf2800889.png', 'pro_63efbf2800cba.png', 'The barrelarched entry and timberframed gables catch your eye when gazing at this Contemporary Country house plan complete with a stone and stucco exterior    The great room kitchen and breakfast nook act as one space for entertaining and extend onto a covered deck for lingering outdoor meals A den with a fireplace near the foyer offers a quieter space to relax    Crowned by a tray ceiling discover the mainlevel master bedroom with sliding doors that lead to the deck a curbless shower in the ensuite and roomy walkin closet    Four garage bays lead into a mudroom with a coat closet framed by the laundry room and walkin pantry    Two family bedroom suites are located upstairs while the optional walkout basement increases the living space by 1942 square feet', 0),
(00075, 'MultiGenerational 26 Square Foot Craftsman Home Plan with Guest Suite ', 00023, 0, 1200000, 'pro_63efbf5b623f2.png', 'pro_63efbf5b62c5e.png', 'pro_63efbf5b630e0.png', 'This onestory Craftsmanstyle house plan gives you three bedrooms lining the right side of the home and a fourth bedroom on the left that has its own kitchenette and living room making this home plan perfect for multigenerational livingUpon entering you are welcomed by the foyer which gives you views all the way to the back of the home Two bedrooms each equipped with their own closet are off to the right and share a bathroom An open floor plan combines the kitchen living room and dining room into a great entertaining space Sliding doors access the outdoor living room in backThe kitchen section of this space has a long island with double sink and is perfect for those who love to cook but want to feel connected to the rest of the houseIn the backright corner the master suite has its own bathroom and spacious walkin closet The suite is across the homeA 3car garage has a mechanical closet in back and accesses the home through the mudroom', 0),
(00076, 'TwentyFootWide 15 Square Foot 3 Bed House Plan ', 00023, 0, 740000, 'pro_63efbf8b71ca4.png', 'pro_63efbf8b72074.png', 'pro_63efbf8b723a0.png', '    This 1567 square foot 3 bed house plan is just 2 wide making this a great choice for your narrow lot With living on two levels  and 24 square feet of bonus expansion on an optional included third floor  it offers more than its width suggests    A 1car frontfacing garage gives you 213 square feet of parking    The main floor has an open concept design with the kitchen open to the great room and eating nook    All the bedrooms  and laundry for your convenience  are located on the second floor', 0),
(00077, 'Modern Farmhouse Plan with French Door Greeting ', 00023, 0, 3100000, 'pro_63efbfbd9b190.png', 'pro_63efbfbd9b571.png', 'pro_63efbfbd9b947.png', 'A 1deep front porch and a pair of French doors centered on the home greet you to this 4bed modern farmhouse plan A symmetrical front exterior with two gables flanking the shed dormer  providing space and natural light to the upstairs loft  gives the home incredible curb appealThe great room has an 116 tray ceiling A fireplace flanked by builtins anchors the right wall The back wall disappears giving you a great indooroutdoor living experienceThe kitchen has a large island 84 x 4 and a walkthrough pantry The garage entry is close to the pantry making unloading groceries a breeze A pocket office is tucked away in the corner of the home helping you manage your affairs while enjoying outdoor viewsThe master suite has outdoor access and a partitioned walkin closet and a 5fixture bath A guest suite can be converted into a den if desiredUpstairs bedrooms are on either side of the loft Upstairs laundry is a nice touch There is also bonus expansion on each side', 0),
(00078, '3Bed Elevated Coastal CottageStyle House', 00024, 0, 5600000, 'pro_63efc3bb968a4.png', 'pro_63efc3bb96b99.png', 'pro_63efc3bb96fa1.png', '    The cottage style of this elevated 3bed 2494 square foot house plan merges with quaint Caribbean design promising warmth comfort and charm Anchored with a steep metal roof flat board siding and arched details the design is an island classic    Inside the foyer steps lead to the open arrangement of the kitchen great room and dining nook The island kitchen is open to an adjacent dining nook and has an open serving counter The breakfast nook overlooks the rear deck through sliding glass doors There is a large walk in pantry for extra storage    The great room is open to the rear deck One of the other sides of the great room has a wall of built ins Vaulted ceilings add a spacious feeling to the home especially in the great room giving it a larger look Front balconies surround a study and multifaceted utility room The utility room is large enough for both a washer and dryer and a wash tub There is plenty of counter space for folding clothes    The right side of the home has two guest be', 0),
(00079, 'Coastal Stilt', 00023, 0, 3100000, 'pro_63efc3f04abd8.png', 'pro_63efc3f04b047.png', 'pro_63efc3f04b2e5.png', 'Craftsman details adorn the exterior of this Coastal Stilt house plan that features pullunder parking on the ground level with an elevator or staircase accessible from the entry    The bedrooms reside on the main level including the primary bedroom that features a walkin closet oversized shower in the ensuite and access to a large covered porch    The second level is where youll find the shared living spaces oriented to take advantage of the surrounding views A vaulted ceiling soars above the combined living and dining area and a partiallycovered deck offers an outdoor option when entertaining    The central island in the kitchen includes a veggie sink and a nearby chefs pantry leads to a secondary pantry to maximize storage    The room on the second level completes the layout and can be used as a home office study or bedroom', 0),
(00080, 'Beach House', 00024, 0, 150000, 'pro_63efc4230ab17.png', 'pro_63efc4230af63.png', 'pro_63efc4230b419.png', 'This beach house plan gets your living area up off the ground and gives you parking underneath    Stairs run along the outside of the home and take you to a covered deck accessible from both the kitchen and the living room Those rooms are under a sloped ceiling and are open to each other    Two bedrooms and bathrooms line the back of the home Laundry if conveniently located between them    Stairs  or a ships ladder  take you to the loft which overlooks the living room below This could be used as a bunk room for guests', 0),
(00081, 'Classic 4Bed Low Country', 00024, 0, 2400000, 'pro_63efc44e76fe8.png', 'pro_63efc44e7734c.png', 'pro_63efc44e7770d.png', 'The steep pitched main roof and low slung porches on this 4bed house plan give it a timeless appeal A standing seam metal roofing and traditional clapboard siding are the materials of choice that create a classic low country design Wide porches both front 464 by 78 with an 8 return on the left side and a 4 return on the right and rear give you great spaces to enjoy the breeze and have a friendly conversationThe main level is anchored by a huge grand room and open kitchen The grand room has a warming fireplace and builtin cabinetry The kitchen has a large island and a cozy banquette The master suite has a tray ceiling and a spa bath and has a walkin closet 113 by 78 and a fivefixture bathUpstairs three bedrooms share two baths The optional bonus room has a private stairway and can be put to many uses  ', 0),
(00082, 'Charming 2Bed Cottage', 00024, 0, 850000, 'pro_63efc47b3433a.png', 'pro_63efc47b3482a.png', 'pro_63efc47b34dfa.png', 'Subtle green board and batten siding a brick chimney metal roof and inviting front porch all contribute to the curb appeal showcased by this 2bedroom cottage design while the interior oozes charm around every corner    The front entry leads directly into the heart of the home consisting of a lightfilled great room and kitchen A centered fireplace beneath the vaulted ceiling serves as a focal point and french doors lead to a screened porch    The Ushaped kitchen counters offer plenty of workspace and storage and natural wood paneling on the ceiling and walls add to the country charm    The master bedroom provides rearward views and a door to the back porch A second bedroom resides on the other side of the full bathroom and laundry closet    A leanto storage room is attached to the right side of the home', 0),
(00083, 'Spacious 4Bedroom', 00025, 0, 26000000, 'pro_63efc6bd1cfb9.png', 'pro_63efc6bd1d408.png', 'pro_63efc6bd1de1c.png', '    This spacious 3level home plan truly has it all including a 5car garage     At the heart of the home an openconcept great room with 2high ceiling dining area and kitchen 12 ceiling allow for maximum versatility and efficiency Off the foyer youll find a quiet den with a closet Extras like a mud room and an oversized walkin pantry lend convenience and a luxury feel    Retreat to the inviting mainfloor master suite which boasts a fireplace elegant tray ceiling 5piece bath and roomy walkin closet    Enjoy outdoor living at its finest on the expansive patio and covered porch with a fireplace and barbecue    Upstairs two bedrooms share a JackandJill bath and a vaulted bonus room 116 ceiling with a covered deck is filled with possibilities    The lower level offers a secluded guest or inlaw suite with a full bath walkin closet and kitchen A rec room large family room and exercise room on the lower level add function and convenience', 0),
(00084, '4Bed Modern PrairieStyle', 00025, 0, 8000000, 'pro_63efc6e51cabb.png', 'pro_63efc6e51cfe5.png', 'pro_63efc6e51d3ec.png', '    This 4bed house plan has a beautiful modern style with classic prairie elements The exterior combines wood and stone with large modern windows to give this house tons of curb appeal    Just inside you will be amazed by the functional living space layout  The large kitchen with a walkin pantry flows perfectly into the great room that is warmed by a doublesided roaring fireplace The kitchen also has a passthrough that leads to the functional flex room The flex room can be used as a formal dining room office or living room    The master suite is perfectly situated with hisher vanities a soaking tub and an enclosed toilet The master closet has functional access to the laundry room     Just up the beautiful stair tower you will find 3 bedrooms that share a conveniently located hall bathroom    Enjoy outdoor entertaining with a large covered patio with a fireplace accessed off of the rear of the home and a massive balcony over the garage accessed from the loft with wet bar ', 0),
(00085, 'MidCentury Modern', 00025, 0, 7600000, 'pro_63efc713916d9.png', 'pro_63efc71391afd.png', 'pro_63efc71391f30.png', '    A 3car courtyard garage clerestory windows and a lowpitched roof give this 3bed midcentury modern house plan great curb appeal A covered veranda in front and two outdoor spaces in back  one open one covered  give you fresh air spaces    Bedrooms line the left side of the home with the master suite in back enjoying outdoor access as well as direct access to the laundry room    The back wall of the home opens to the sun deck and sliding doors in the kitchen open to the covered deck    The kitchen has a walkin pantry accessible from two sides and a large island with seating on one and views of the fireplace across the great room from the other', 0),
(00086, 'TwoStory Contemporary', 00025, 0, 1200000, 'pro_63efc73a107a0.png', 'pro_63efc73a10bd8.png', 'pro_63efc73a11091.png', '    Luxury living defines this twostory contemporary house plan complete with a multifold door that combines the indoor and outdoor living spaces    The twostory ceiling above the foyer and living room makes the space feel larger and brighter while the open kitchen features a prep island and counterspace galore    A bedroom on the main level is ideal for guests and includes a full bath while a home office can be found just off the entryway    Upstairs a bridgestyle hallway takes you to the private master bedroom which features a toilet room in the 5fixture bath and a walkin closet    Two additional bedrooms are located down the hall each with their own bath The whole family will enjoy the large recreation room upstairs as well as the sizable sun deck above the 3car garage', 0),
(00087, 'Modern Prairie', 00025, 0, 20000000, 'pro_63efc7639c66d.png', 'pro_63efc7639ca19.png', 'pro_63efc7639ce06.png', '    This fantastic modern Prairie home plan presents a modern exterior with a combination of flat and sloped rooflines and oversized windows    In the center of the home youll find an extravagant living room with a twostory ceiling and views onto the outdoor living area The open kitchen features a large island with counters that wrap around the pantry to a breakfast nook and butlers pantry    Homeowners that love to entertain will delight in the combined theater and billiards room complete with an adjoining bar and wine room    Retreat to the truly luxurious master suite and discover two massive closets a sitting nook attached to the bedroom and a deluxe en suite with two toilet rooms A home office and gym are located down the hall from the master    Two bedroom suites project from the left side of the main level while four additional bedrooms each with a full bath can be found upstairs along with a game room and spacious sundeck for all to enjoy    Four garage bays and additional park', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `M_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `Lavel` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`M_id`, `name`, `surname`, `telephone`, `user`, `password`, `Lavel`, `status`) VALUES
(39, 'sun1', 'sad', 1561561, 'sun1', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 1),
(60, 'admin', 'usrname', 111111, 'admin', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 0),
(61, 'roosevelt', ' ippocrates', 742912553, 'Tpac', 'bc4e59c95b50c241463817d23608a4011b8710914cbc9ea26d79597c1b54da3c84bcbe23af67074d4a731ab3a95755f2517cf5ae20b2ea776fd5d74100e37007', 0, 0),
(62, 'annibal', ' ibo', 575722932, 'Xolotl', 'ee3eea8bbeaefe6390ad78bd568c11bd93354115ff938fdbb540070a99bad5ef971efc9f0a1b9689d269771295aa99908069ee410e6faad46ce3245c7c3edbd5', 0, 0),
(63, 'utekh', 'youta', 436476097, 'Roosevelt', 'fa90ff0095bb10f157a89a1aa0c5f8587ffff72295914a65e44454baf53aa260b6ca3f7fe38483644ed6130e975630f1122e35367802206fcab3cf68892ba13d', 0, 0),
(64, 'erryn', ' onny', 302255569, 'Rudericus', '37ef3cc153b418cc877cb7653aa4ae12c24bdc73090d7872721214135e8f0cac3c818742aa79053a69c4c1fb1aaa39bac469b2e9df0b035941ef70e655e15fa3', 0, 0),
(65, 'ri', ' lastimil', 163161126, 'Meagan', '0a4e3fa7f3f5d19818537bf76551e6a9d3d2aa9e777c0cb5eae3dc893d616117922bc1cd1a3dbd95ba27e736ddce45836a783d740aadd5370b736ba217adf231', 0, 0),
(66, 'awuli', 'rawn', 711646452, 'Merryn', '6c041d54a012d9d746b00ace2c90978581012aa79a2904f452cfd70f25d39dfe2a0c61665cfdc6fc50be85fda268be4493d3f1a466be98a535e7924e03c2dd70', 0, 0),
(67, 'ilhelmus', 'allie', 403410864, 'Cherice', '401d474d4a3f78e495f962c3c30ed1655ea7ee5f139661c947a9570b8d8cdf7a3e880ed16c1dd9713908408b2e562cabd0e02c24239ac678bfcb2fc91afde1f0', 0, 0),
(68, 'herice', 'icely', 993480898, 'Czar', 'b146bab704c6979323c5cbfbb49cf5208f4a4b2cc8d30d360c65414bc823d67c3b400614cd6f64910fcb3743459a0dafc29faad4831150692330a25d777712ab', 0, 0),
(69, 'zar', 'ada', 482608625, 'Sylvia', '903937374bb2012dd560db4c471579830919c50a324e35941f5152780346136baa0f39bb998c3a25878f1c909ed2eac6fa1fce4973e7b764bb2bb2f5571326da', 0, 0),
(70, 'ylvia', 'varolina', 625741417, 'Moisey', 'fe6977b37683a9215058e66d5c98eff681cd9fb2965ad7ef1f0f2f86a66ce2d77754309761eb2d309aba7336d664b624edb6e91d00af54fc8ca3aaafd2038d29', 0, 0),
(71, 'oisey', 'agdish', 839427227, 'Wilhelmus', 'a80a6d5c51eb33f334e01ae672411cdd45e6cccf564ace8074435b4bf05d6096131ddceb00dffde48cf5bbc01fad3e4aa0129e96d0455f3e31dc4d5bf2e96770', 0, 0),
(72, 'enghis', 'obu', 790032401, 'Emilia', 'e6cd968be2509cc1dec34d7546ddc2dc05f3cc233d718238fd521fafe0a74e779dc08f7ac9b04b23b47cd62669d751d6ee5a7fc0dec9cc78d83a6dd72ff2aa8e', 0, 0),
(73, 'milia', 'gulo', 659890953, 'Gwandoya', '50b0991806cb471c8db29ec494da3235f072557a02753f70ae67c016b20d4e4dc28296a8629c50e499de06de775813b8be775967915bdd478e93ee33e0e308ff', 0, 0),
(74, 'wandoya', ' haima', 573970874, 'Antelmo', 'bfb40a01c1fe815b4d643ff57c699b5c98f58786e1e143aad42a11c9a73ebcfb6dea9e8db8317154377ae09180b205cf9b619ffdbd4d9a916376e21954e98e91', 0, 0),
(75, 'ntelmo', 'htric', 378641961, 'Sacnite', 'abbb9fecacfeb64f7e02466249d43cf55146ec19da3b8b35ec477ca9251293e3583a0c4234106ef29153bc89cb61f662829a48ec808b8d5d0073d3255510444b', 0, 0),
(76, 'acnite', 'swathi', 101187152, 'Genghis', '3e234bf1ba159a7a4559cddc52637d7d409f6fd3c32d2d4376f8d7780d6eb0dfb3470b24381242c62af5e22ade7cd71c30badcbf66f24a97bf70c13ad02447f7', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `S_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `S_name` varchar(20) NOT NULL,
  `details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`S_id`, `S_name`, `details`) VALUES
(00020, 'Modern', 'Modern house plans feature lots of glass steel and concrete Open floor plans are a signature characteristic of this style From the street they are dramatic to behold There is some overlap with contemporary house plans with our modern house plan colle'),
(00021, 'A Frame House Plans', 'AFrame house plans feature a steeplyangled roofline that begins near the ground and meets at the ridgeline creating a distinctive Atype profile Inside they typically have high ceilings and lofts that overlook the main living space '),
(00022, 'Victorian', 'While the Victorian style flourished from the 182s into the early 19s it is still desirable today Strong historical origins include steep roof pitches turrets dormers towers bays eyebrow windows and porches with turned posts and decorative railings O'),
(00023, 'Craftsman', 'The Craftsman house displays the honesty and simplicity of a truly American house Its main features are a lowpitched gabled roof often hipped with a wide overhang and exposed roof rafters Its porches are either full or partial width with tapered colu'),
(00024, 'Low Country', 'Low country house plans are perfectly suited for coastal areas especially the coastal plains of the Carolinas and Georgia A subcategory of our southern house plan section these designs are typically elevated and have welcoming porches to enjoy the ou'),
(00025, 'Prairie', 'Prairiestyle home plans came of age around the turn of the twentieth century Often associated with one of the giants in design Frank Lloyd Wright prairiestyle houses were designed to blend in with the flat prairie landscape The typical prairiestyle h');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `M_id` (`M_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `B_id` (`B_id`),
  ADD KEY `H_id` (`H_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`H_id`),
  ADD KEY `type_id` (`S_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`M_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`S_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `H_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'id การสร้างบ้าน', AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `M_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `S_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`M_id`) REFERENCES `member` (`M_id`) ON UPDATE CASCADE;

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `booking` (`B_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`H_id`) REFERENCES `house` (`H_id`) ON UPDATE CASCADE;

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`S_id`) REFERENCES `style` (`S_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
