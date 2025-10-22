@extends('frontend.template')
@section('content')

<div class="m-5">
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4">
    <button name="btnDownload" class="btn btn-mat report-btns" onclick="downloadReport();">
        <i class="fa fa-download"></i> {{__('messages.download')}}
    </button>
    </div>          
    <div class="col-sm-12 col-md-6 col-lg-4">
        <button name="btnSendMail" class="btn btn-mat report-btns" onclick="sendMail();">
        <i class="fa fa-envelope"></i> {{__('messages.sendmail')}}
        </button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <button name="btnSendWhatsApp" class="btn btn-mat report-btns" onclick="sendWhatsApp();">
        <i class="fab fa-whatsapp"></i> {{__('messages.sendwhatsapp')}}
        </button>
    </div>          
</div>

<div id="pdf-print">
@php

//Login page
$language["mobile"] = "Mobile Number";

//Result page
$language["processfuture"] = "Processing your Future ...";
$language["report"] = "Astro Analysis Report";
$language["summary"] = "Astro Analysis Summary";
$language["navamsachart"] = "Navamsa Chart";
$language["rasichart"] = "Rasi Chart";
$language["bhavachart"] = "Bhava Chart";

$language["goldenBox"] = "- Representing House Numbers # 1,5,9";
$language["pinkBox"] = "- Representing House Number # 2";
$language["orangeBox"] = "- Representing House Number # 3";
$language["bluegreenBox"] = "- Representing House Numbers # 4,7,10";
$language["yellowBox"] = "- Representing House Number # 11";
$language["redBox"] = "- Representing House Numbers # 6,8,12";
$language["planets"] = "Planet IDs = ";
$language["rasies"] = "Rasi IDs = ";

$language["birthrasi"] = "Birth Rasi";
$language["birthstar"] = "Birth Star";
$language["starpadam"] = "Star Padam";
$language["birthday"] = "Birth Day";
$language["lagnam"] = "Lagna";
$language["submit"] = "Submit";
$language["padam"] = "Padam";

$language["matchingpercentage"] = "Matching Percentage";

$language["name"] = "Name";
$language["birthplace"] = "Place of Birth";

$language["matchPercentage"] = "Matching Percentage";
$language["matchResult"] = "Matching Result";
$language["overallPercentage"] = "Overall Matching Percentage";
$language["bride"] = "Bride";
$language["bridegroom"] = "Bridegroom";
$language["lagnaRasi"] = "Lagna Rasi";

$language["yogam"] = "Yogam";
$language["karanam"] = "Karana";
$language["dasaname"] = "Dasa Name";
$language["bhukthiname"] = "Bhukthi Name";
$language["start"] = "Start";
$language["end"] = "End";
$language["dasadetails"] = "Dasa Details";
$language["bhukthidetails"] = "Bhukti Details";
$language["rasi"] = "Rasi";
$language["star"] = "Star";

$language["malehoroscope"] = "Male Horoscope";
$language["femalehoroscope"] = "Female Horoscope";
$language["bhavagamatch"] = "Star Lords Matching";
$language["bhavagascore"] = "Marks";
$language["bhavagaresult"] = "Bhavaga Matching Pecentage";
$language["bhavagareport"] = "12 Bhavaga Match";
$language["starLord"] = "Star Lord";
$language["total"] = "Total";
$language["friend"] = "Friend";
$language["enemy"] = "Enemy";
$language["neutral"] = "Neutral";
$language["planetplace"] = "Planet Place";
$language["planetmatch"] = "Planetary Match";
$language["planetreport"] = "9 Planets Match";
$language["planetresult"] = "Planet Match Percentage";
$language["bhavagammatch"] = "Bhavaga Match";
$language["malebased"] = "Based on Male Horoscope";
$language["femalebased"] = "Based on Female Horoscope";
$language["bhavagaplanets"] = "Planets associated with Bhavaga";
$language["inmalehoroscope"] = "In Male Horoscope";
$language["infemalehoroscope"] = "In Female Horoscope";
$language["match"] = "Match";
$language["nomatch"] = "No";
$language["yesmatch"] = "Yes";
$language["lowmatch"] = "Low";
$language["mediummatch"] = "Medium";
$language["highmatch"] = "High";
$language["notes"] = "* - 1. Bhavaga Athipathi 2. Bhavaga Athipathi Star Lord 3. Planets stand on Bhavaga";
$language["marriagematch"] = "Marriage Match Making";
$language["matchingpredictions"] = "9 Planetary Match - Detailed Predictions";
$language["overallSummary"] = "<span style='color:#01645b;font-size:16px;'>Vivaha Yoga Pathathi (VYP)</span> - A Precise Compilation of 10 Types of Marriage Compatibility!";
$language["remedies"] = "Remedies";
$language["remedynote"] = "The Given Remedies are to be performed by both Husband and Wife. For the best possible results, it's most recommended that Husband and Wife jointly perform the given remedies, together at the same time.";
$language["partialfasting"] = "* Partial fasting means, Morning - Fluids only,  Afternoon - Vegetarian Lunch and Night - Fruits & Milk";

$language["customercare"] = "Customer Care";
$language["contactus"] = "Contact Us";
$language["10point"] = "Standard Match";
$language["36points"] = "36 Gunas";
$language["10pointsummary"] = "Standard Match Percentage";
$language["36pointsummary"] = "36 Gunas Percentage";
$language["premium"] = "Premium Report";
$language["maletharapalan"] = "For Male";
$language["femaletharapalan"] = "For Female";
$language["nakshatratharapalan"] = "Star Thara Palan";

$language["tharapalanmeaning"] = "Tharai means to give. That is, it is this Tharai that can give the appropriate positive and negative results to those born in any of the 27 stars. In that way, there are 9 types of Tharai for a person born in a star: Janmadharai, Sambathu Tharai, Acharya Tharai, Shema Tharai, Prathiyoga Tharai, Sadaka Tharai, Vadhata Tharai, Maitra Tharai, Adhimaitra Tharai.";
$language["ragukedhudosameaning"] = "If there is one thing called Lagna in the horoscope and Rahu-Ketu is present in the 2nd, 5th, 7th, 8th, and 12th houses, then there will be some delay in getting married for that person. This is called Sarpa Dosha or Rahu-Ketu Dosha. Especially if Rahu and Ketu are present in the 1st-7th, 2nd-8th houses, the strength of the Dosha is even greater";
$language["kalasarpadoshameaning"] = "The Kala Sarpa Dosha is when all the planets, including the ascendant, are caught between Rahu, the old man, and Ketu, the serpent. This dosha can be classified into two categories: Kala Sarpa Dosha and Kala Sarpa Yoga. If all the planets move towards Rahu, it is called Kala Sarpa Dosha, and if they move towards Ketu, it is called Kala Sarpa Yoga.";
$language["sevvaaidoshameaning"] = "If Mars is in 2,4,7,8,12 of the ascendant, Venus, and Moon, it should be considered that there is Mars Dosha. However, it is said that there is a special rule that if Mars is in 2,7,8 for men and in 4,8,12 for women, there is Mars Dosha.";
$language["kalathiradoshameaning"] = "The presence of planets Mars, Saturn, Sun, Rahu and Ketu in the 1st, 2nd, 4th, 7th, 8th or 12th house from the ascendant indicates Kalathira Dosha. Kalathira Dosha can disrupt marriage and disrupt peace and harmony. The presence of this Dosha (affliction) in the horoscope can bring obstacles and the following problems. Delayed marriage, unhappiness in married life, health problems of the spouse, separation or divorce, untimely death of the spouse";
$language["numerologymeaning"] = "When it comes to numerology, the benefits are wide-ranging. Let's take a look at it: Numerology can help you make the right choices in life. Also, with the help of numerology, you can find out the characteristics of a person and choose suitable opportunities throughout his life. Numerology also helps in improving the relationship between two people. Numerologists who have the concept of numbers can explain in detail the compatibility level between two people and the conditions related to them. Moreover, it can also help explain what one should expect from a relationship. It also explains the personality of a person. From their talents and abilities to their strengths and weaknesses; with the help of numerology, all of these can be found out effortlessly, and much more. Life Path Number in numerology is a great concept to know many scenarios. So, along with the challenges, ups and downs, opportunities and challenges that you may face, people can find out everything with the knowledge of numerology.";
$language["dasasandhimeaning"] = "When considering compatibility for marriage, it is best to have compatibility of dasa and buddhi according to certain rules. Accordingly, 1. It is special that the same dasa does not occur for both the man and the woman for 15 years after marriage. This is also called dasa-sandip. 2. At the time of marriage, the dasa of the Kendra and Trikona lords should be in contact with at least one of the man and woman. If the dasa that gives bad results is in contact with, married life will be difficult even if there is compatibility in the horoscope. 3. If the dasa of hostile planets is in contact with both the horoscopes, disagreements and separation will increase.";
$language["manasanchaladoshameaning"] = "In today's era, everyone is under some kind of stress and is running around trying to finish this by that time. Except for those who manage to overcome this to some extent and succeed, the planets will indicate that there is a possibility of drowning in this kind of stress and getting into extreme stress. People with such planetary conjunctions need to keep their minds relaxed at all times. In today's mechanical life, since mental balance is also an indispensable and important thing for the success of married life, the level of this mental restlessness is calculated separately for both the grooms and based on that, this compatibility is accurately predicted.";

$language["birthplacehint"] = "Please select city from the list, do not enter full address";
$language["complete"] = "Complete Report";
$language["dasabalance"] = "Dasa Balance";
$language["dasayears"] = " years";
$language["dasamonths"] = " months";
$language["dasadays"] = " days";
$language["nomatch"] = "No Match";
$language["negligiblematch"] = "Negligible Match";
$language["lessmatch"] = "Less Match";
$language["averagematch"] = "Average Match";
$language["aboveaveragematch"] = "Above Average Match";
$language["goodmatch"] = "Good Match";
$language["bettermatch"] = "Better Match";
$language["bestmatch"] = "Best Match";
$language["perfectmatch"] = "Perfect Match";
$language["raghudosha"] = "Rahu-Kethu Dosha";
$language["doshayes"] = "Yes";
$language["doshano"] = "No";
$language["guidance"] = "Psychological Guidance";
$language["sevvaaidosha"] = " Sevvaai Dosha";
$language["spiritualremedies"] = "Spiritual Remedy";
$language["raghudoshamatch"] = "Rahu-Kethu Dosha Match";
$language["sevvaaidoshamatch"] = "Sevvaai Dosha Match";
$language["sevvaaipercentage"] = "Overall Percentage";
$language["matrimonytoday"] = "astromatch.online";
$language["kalasarpadosha"] = "Kala Sarpa Dosha";
$language["kalathiradosha"] = "Kalathira Dosha";
$language["numerology"] = "Numerology";
$language["manasanchaladosha"] = "Mana Sanchala Dosha";
$language["kalasarpadoshamatch"] = "Kala Sarpa Dosha Match";
$language["kalathiradoshamatch"] = "Kalathira Dosha Match";
$language["numerologymatch"] = "Numerology Match";
$language["manasanchaladoshamatch"] = "Mana Sanchala Dosha Match";
$language["dasasanthi"] = "Dasa Santhi";
$language["dasanote"] = "Note : Today Date";
$language["padam"] = "Padam";
$language["rasiathipathi"] = "Rasi Athipathi";
$language["lagnaathipathi"] = "Lagna Athipathi";
$language["astronote"] = "Astrology Note";
$language["starlord"] = "Star Lord";

$language["thithidevathai"] = "The Tithi Deity That Grants You Luck";
$language["thithidetail"] = "Tithi - Explanation";
$language["thithidescription"] = "Tithi is the distance between the Sun and the Moon in the sky.<br/><br/>On Amavasya (New Moon), the Sun and the Moon are together. On Purnima (Full Moon), the Sun and the Moon are exactly opposite at 180 degrees. Tithi indicates how far apart the Sun and the Moon move each day.<br/><br/>The Sun and the Moon, which are together on Amavasya, take 30 days to separate and reunite again. These 30 days correspond to 30 Tithis.";
$language["birth"] = "Birth";
$language["thithiimportancehead"] = "Importance of Tithi";
$language["thithiimportance"] = "If you understand Tithi, you can overcome fate, so worshiping the deity of the Tithi is beneficial. It signifies one's ability to maintain emotions, desires, and relationships.<br/>Tithi is the lunar day. In the almanac, the specific Tithi for each day is mentioned. Engaging in activities that are suitable for those Tithis is considered special.<br/>To enhance one's wealth, worshiping the Tithi deity on the birth Tithi day brings tremendous benefits.";
$language["thithigod"] = "The Tithi God That Grants You Luck";

$language["panchangamdetail"] = "Panchangam - Explanation";
$language["panchangamdescription"] = "An almanac is a book containing astronomical notes on planetary cycles and is also referred to as an astronomical text. Panchangam is also mentioned that Maharishi accurately predicted many information including solar and lunar eclipses with their wisdom in ancient times when there were no modern tools.Almanac consists of five main parts.";

$language["vaaramdetail"] = "Vaaraam - Explanation";
$language["vaaramdescription"] = "Here week means seven weeks.";

$language["thithidetail"] = "Thithi - Explanation";
$language["thithidescription"] = "Tithi is the distance between the Sun and the Moon in the sky.<br/>The Sun and the Moon are together on the New Moon. On a full moon, the Sun and the Moon are 180 degrees opposite each other. Tithi is a measure of how far the Sun and the Moon move away each day.<br/>The Sun and the Moon, which are together on the new moon, take 30 days to separate and rejoin on the first day. These 30 days are 30 tithis.<br/>Suklapachta tithis (Wakrapirai) starting from Prathama (15 days) on the day after the new moon and ending with the full moon. Krishna Paksha Tithis (15 days) (Teipirai) starting from the day after the full moon to the day before the new moon. So total 30 tithis.";

$language["natchatramdetail"] = "Nakshatram - Explanation";
$language["natchatramdescription"] = "Nakshatras represent the 27 sectors of the zodiac, each measuring 13.33 pagas. As the Moon orbits the Earth at a particular time, the nakshatra of that division is said to be moving at that time.";

$language["yogamdetail"] = "Yogam - Explanation";
$language["yogamdescription"] = "The period taken by the Moon to transit each Nakshatra is called Yoga. So they have given 27 names to the periods that cross all the 27 Nakshatras. These are called Yoga.";

$language["karanadetail"] = "Karanam - Explanation";
$language["karanadescription"] = "The earlier and later periods of a tithi are called Karana. Karanam is the half share of Tithi. Tithi is divided into two and there is one karana for the earlier period and one karana for the later period. That means the 30 Tithis have a total of 60 karanas. Seven karanas are in spiral mode and four karanas are in excellent mode, making a total of 11 karanas names and naming them in an orderly manner for a total of 60 karanas.";

$language["southindianmatch"] = "10 Points Match";
$language["northindianmatch"] = "36 Points Match";
$language["9planetarymatch"] = "9 Planets based Most Accurate Match";
$language["astrologyremedies"] = "Astrological Remedies";
$language["psychologicalguidance"] = "Psychological Remedies";
$language["malebhavagamatch"] = "12 Houses based Matching for Male";
$language["femalebhavagamatch"] = "12 Houses based Matching for Female";
$language["dasasandhicalculation"] = "Dasa Sandhi Period Check";
$language["maledasadetail"] = "Dasa Bhukti details of Male Horoscope";
$language["femaledasadetail"] = "Dasa Bhukti details of Female Horoscope";
$language["maledetailreport"] = "Detailed Astrological Analysis of Male Horoscope";
$language["femaledetailreport"] = "Detailed Astrological Analysis of Female Horoscope";

$language["malebirthnumber"] = "Male Users Birth Number : ";
$language["femalebirthnumber"] = "Female Users Birth Number : ";
$language["totalnumber"] = "Total Number : ";
$language["destinynumber"] = "Destiny Number : ";
$language["price"] = "Price";
$language["discountcode"] = "Discount Code";
$language["applydiscount"] = "Apply Discount";
$language["buyit"] = "Buy IT !";
$language["buynote"] = "<b>Note</b>: Click this button to buy this package";
$language["specialmatches"] = "Special Matches";
$language["pakshimatch"] = "Pakshi Match";
$language["vrikshamatch"] = "Viruksha Match";
$language["lagnalordmatch"] = "Lagna Lord Match";
$language["starlordmatch"] = "Star Lord Match";
$language["additionalmatches"] = "Additional Matches";
$language["additionalmatchesexplanation"] = "Additional Matches - Explanation";
$language["whatsappicon"] = "WhatsApp";
$language["purchasedproduct"] = "Purchased Report";
$language["paidamount"] = "Paid Amount";
$language["orderid"] = "Order ID";
$language["transactontime"] = "Date & Time";
$language["godashboard"] = "Go to Dashboard";

$language["sectionone"] = "Section I.";
$language["matchingnote"] = "Marriage Matches";
$language["sectiontwo"] = "Section II.";
$language["astrologernote"] = "Attention Astrologers:<br/><br/>Special calculations required for highly accurate astrological predictions";
$language["mudakkudoshamatch"] = "Mudakku Dosha Match";
$language["10pointsheading"] = "10 Matches (called) Decimal Match";
$language["10pointsmeaning"] = "The 10 Point Match in marriage matching (dasama compatibility) is a horoscope analysis of the characteristics, life goals, and family harmony of the two bride and grooms, and helps predict the successful married life of the couple through <br/>10 compatibility calculations based on the birth star.<br/>This is mostly practiced in South India.";
$language["36pointsheading"] = "36 Guna Match";
$language["36pointsmeaning"] = "36 Guna Match is an additional method of checking two horoscopes for marriage compatibility in Vedic astrology. It is a part of the Ashtakood compatibility method. In this, the total compatibility score is calculated on 36 points. These points assess the physical, mental, emotional and spiritual harmony between the couple.<br/>It is mostly practiced in North India.";
$language["tharapalanmeaning"] = "Tharai means to give. That is, it is this Tharai that can give the appropriate positive and negative results to those born in any of the 27 stars. In this way, there are 9 types of Tharai for a person born in a star: Janmadarai, Sambathu Tharai, Acharya Tharai, Shema Tharai, Prathiyoga Tharai, Sadaka Tharai, Vadhata Tharai, Maitra Tharai, Adhimaitra Tharai.<br/><br/>This compatibility ensures that both the couple are not Tharai who give bad results to the other.";
$language["ragukedhudosameaning"] = "If Rahu and Ketu are in the 1st, 2nd, 7th and 8th houses of the horoscope, then the native will experience some delay in getting married. This is called Sarpa Dosha or Rahu Ketu Dosha.<br/><br/>This type of planetary position negatively affects the native's relationships, mental peace and family life.<br/><br/>For those with such a dosha, it can be balanced somewhat by combining the horoscope of another person who has the same dosha.";
$language["kalasarpadoshameaning"] = "When all the planets, including the ascendant, are caught between Rahu, Ketu and the ascendant, it is called Kala Sarpa Dosha. Therefore, the whole life will be a struggle. If any one planet or ascendant comes out, it is Kala Sarpa Raja Yoga. They will have difficulties till the age of 32 or 35 and then make good progress in life.";
$language["sevvaaidoshameaning"] = "If Mars is in the 2nd, 4th, 7th, 8th, 12th houses of the planets Ascendant, Venus and Moon, then it is considered to be Mars Dosha. <br/><br/>Checking Mars Dosha in marriage compatibility, understanding its effects and addressing them helps in reducing the conflicts, delays or problems that may arise in married life. This provides a strong foundation for a happy and stable marriage for the couple. If Mars is in the 2nd, 4th, 7th, 8th, and 12th houses of the ascendant, Venus, and Moon, it should be considered that there is Mars Dosha. <br/><br/>Checking Mars Dosha in marriage compatibility and understanding its effects";
$language["kalathiradoshameaning"] = "The presence of Venus, the ruling planet of Kalatra, in the Vriyam of Kalatra is called Kalatra Dosha. This Dosha should also be taken into consideration. People with such a horoscope may also face marriage problems, delays, and problems in their married life. If marriage takes place late, after an advanced age, there will be no significant impact.";
$language["dasasandhimeaning"] = "Dasasandhi is the period of time when a Mahadashai (major period) ends in the horoscope and a new Mahadashai begins. Each Mahadashai affects many aspects of life (wellbeing, work, relationships, spirituality). This period of change is called Dasasandhi.<br/><br/><span style='font-size:16px;color:deeppink;'>Importance of knowing the Dasasandhi period</span><br/><span style='color:maroon;'>1. Be prepared for change:</span><br/>There are many chances of changes in life during this period. If you know it in advance, you can be prepared to face problems. Example: Financial planning becomes necessary when changing from a good Mahadashai (Jupiter) to a difficult Mahadashai (Saturn).
<br/><span style='color:maroon;'>2. To make the right decisions:</span><br/>When making big decisions in money, relationships, or career, understanding the nature of this period and making decisions helps to avoid major problems.
<br/><span style='color:maroon;'>3. Peace of mind and spiritual growth:</span><br/>During the Dasasanth period, we can examine ourselves and learn to overcome mental struggles.<br/><br/><span style='font-size:16px;color:deeppink;'>Benefits of knowing about Dasasanth</span><br/><span style='color:maroon;'>1. To achieve opportunities: </span><br/>Since our plans are in harmony with the influence of the planets, there is a greater chance of success.
<span style='color:maroon;'><br/>2. Health Awareness: </span><br/>Since some changes may indicate health problems, by knowing them, you can take the necessary precautions and prevent or minimize the impact.<br/><span style='color:maroon;'>3. Relationship Peace:</span><br/> By understanding planetary changes, you can anticipate potential problems in relationships and act maturely to achieve family peace.
<br/><br/><span style='color:deeppink;'>In short: </span><br/>Dasa Sandhi is a rare opportunity to understand the major changes in your life and make the best decisions.";
$language["manasanchaladoshameaning"] = "In today's era, everyone is under some kind of stress and is running around trying to finish this by that time. Except for those who manage to overcome this to some extent and succeed, the planets will indicate that there is a possibility of drowning in this kind of stress and getting into extreme stress. People with such planetary conjunctions need to keep their minds relaxed at all times. In today's mechanical life, since mental balance is an indispensable and important thing for the success of married life, the level of this mental restlessness is calculated separately for both the grooms and based on that, this compatibility is accurately predicted.";
$language["9planetheading"] = "<u>Marriage Compatibility Based on 9 Planets</u>";
$language["9planetmeaning"] = "In Vedic astrology, the nine planets (Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, Ketu) determine the major events of life. In marriage compatibility, it is important to study how the nine planets affect the relationship in the horoscopes of both the partners.<br/><br/>Each planet represents a part of life.
<ul style='color:darkblue;'><li>Sun - indicates individuality and arrogance.</li>
<li>Moon - checks mental feelings.</li>
<li>Venus - explains love and sexual relationships.</li>
<li>Mars - shows vitality and physical attraction.</li>
<li>Jupiter - indicates wisdom, wealth, children and morality.</li>
<li>Saturn - ensures stability and patience in relationships.</li></ul>
<span style='color:darkblue;'>Furthermore, since the influence of planets closest to the earth is greater than the influence of stars far from the earth, this 9-planet matching is a more accurate prediction method than the ten matchings and 36-character matchings based on stars.
<br/><br/>Thus, by examining the influence of each planet, the complete matching is accurately predicted.</span>";
$language["9planetbenefit"] = "<span style='font-size:16px;text-decoration: underline;color:deeppink;'>Benefits of 9 Planetary Compatibility</span>:<br/><br/><span style='color:maroon;'>1. Complete Understanding:</span><br/>As it calculates the influences of all the planets, it helps in understanding the couple's relationship completely.<br/><br/><span style='color:maroon;'>2. Customized Remedies:</span><br/>If certain planets indicate problems, remedies (mantra, puja, gemstones) can be recommended for them.<br/><br/>
<span style='color:maroon;'>3. Better Decision-Making:</span><br/>With planetary compatibility, decisions regarding marriage can be taken with confidence.<br/><br/><span style='color:maroon;'>4. Improves Family Peace:</span><br/>Navagraha compatibility will strengthen the faith of both families for marriage.
<br/><br/><span style='color:maroon;'>5. Strength of Relationship Based on Science:</span><br/>Planets reveal the weak areas of the relationship and help in improving them.<br/><br/>Therefore, marriage matching based on 9 planets helps in understanding the relationship completely and leading a happy and permanent life.";
$language["bhavagamatchheading"] = "<u>Marriage Compatibility Based on 12 Zodiac Houses</u>";
$language["bhavagamatchmeaning1"] = "According to Vedic astrology, the 12 houses, which are the 360 ​​degrees of the Earth's rotation, divided into 30 degrees, represent 12 important aspects of life.";
$language["bhavagamatchmeaning2"] = "For example, the 2nd house represents family and wealth, the 7th house represents marital relationships, and the 11th house represents friendship and profit. Horoscopes based on the 12 houses help in analyzing all aspects of life thoroughly and predicting the success of married life with maximum accuracy.";
$language["numerologyheading"] = "Numerology based marriage matching";
$language["numerologymeaning"] = "Numerology is the study of numbers and how they affect human lives. In marriage matching, numerology examines the birth number, adi kusuma numerology, and fate numbers based on the date of birth to determine the compatibility of a couple.
Each number has unique energies and qualities, which affect a person's character, behavior, and relationships.<br/><br/>For example, number 1 - those with leadership and pride; number 6 - those who give importance to family. These help to understand the character traits of a couple.
Thus, the numbers of both the couple can be examined and examined to see if they are compatible with each other. If the compatibility is poor, problems can be corrected through suggestions such as name changes or name letters with lucky numbers.<br/><br/>By matching the numbers, it is confirmed that the life goals and expectations of the couple are on the same path.";
$language["lagnalordmatchmeaning"] = "The ascendant lord plays a vital role in a marriage as it reflects an individual's personality, health and overall well-being. Assessing its position ensures that both the couple are compatible in terms of temperament, emotional connection and life goals, which lays the foundation for a happy and harmonious marriage.";
$language["starlordmatchmeaning"] = "Star lord compatibility in marriage compatibility is the study of whether the lords of the stars in the horoscope are compatible with each other. Star lords reflect a person's life force, attitude, and future.<br/><br/>If the lords of the stars in the horoscope are friendly to each other, the couple will be able to support each other in life. If good friendly lords are established, disputes will decrease, there will be a peaceful life, and family life will be prosperous. This will increase tolerance and understanding of each other.";
$language["pakshimatchmeaning"] = "Pancha Bakshi is an ancient Tamil astrological system that revolves around five divine birds: the eagle, owl, crow, rooster and peacock. Each person is associated with one of these birds, based on the time and day of their birth. These birds govern a person's energy, personality traits and actions throughout the day, which are divided into five functions: eating, walking, sleeping, ruling and dying.<br/><br/>In marriage matching, the Pancha Bakshi system is used to assess the compatibility between the couple's life energies and daily cycles, and to ensure balance and harmony in their relationship.";
$language["vrikshamatchmeaning"] = "Vriksha Jyothidam (Tree Astrology) associates each person with a specific tree or plant based on their Nakshatra (birth star). Each Nakshatra is associated with a specific tree, which represents the innate nature, energy, and compatibility of that person. The qualities of these trees are believed to influence an individual's personality, health, and overall life.<br/><br/>In marriage matching, the compatibility of the couple's Vriksha (tree) is analyzed to ensure harmony, balance, and mutual growth in their relationship.";
$language["mudakkuhdoshameaning"] = "The number should be calculated from the star in which the Sun is located to the star of the Sun. When this number is calculated from the Pooradam star, the sign in which the star is located is the Mukhaku.<br/><br/>In marriage compatibility, one person's star should not be the Mukhaku star of another.";
$language["yourname"] = "Your's Fullname";
$language["websiteaddress"] = "Website Address :";
$language["dasasanthimatch"] = "Dasa Santhi Match";
$language["disclaimer"] = "<span style='color:red;'>*</span> - Astrology Compatibility Research provided by astromatch.online, owned by VEALES Vedic Decisions Private Limited Description: <br/> Based on the traditional and scientific principles of Vedic Astrology, Numerology and related methods. The compatibility ratings and opinions provided should be considered as a guideline only; they should not be considered as a confirmed or binding decision for marriage.";
$language["additional36pointspercentage"] = "Additional 36 Points Percentage";
$language["additional36points"] = "Additional 36 Points Matches - Summary";
$language["knowmore"] = "Know More";
$language["contactastrologer"] = "Talk to Our Astrologers";
$language["tagline"] = "Are you Struggling in Your Marriage? It’s High Time to Discover the Hidden Cosmic Truths Behind Your Relationship!";
$language["raghudoshapercentage"] = "Rahu-Kethu Dosha Match Percentage";
$language["sevvaaidoshapercentage"] = "Sevvaai Dosha Match Percentage";
$language["numerologypercentage"] = "Numerology Match Percentage";
$language["kalasarpadoshapercentage"] = "Kala Sarpa Dosha Match Percentage";
$language["dasasanthipercentage"] = "Dasa Santhi Match Percentage";
$language["customercarewhatsapp"] = "Customer Care WhatsApp Number";
$language["chantstherapy"] = "Astro-Music Healing Therapy";
$language["chantslink"] = "Astro-Music Link";
$language["chantexplanation"] = "Astro Music Healing Therapy is a unique astrological remedy that uses musical mantra chants to harmonize planetary influences and heal emotional distress. By singing the mantras of planets requiring remedies in carefully selected raagas, this therapy helps individuals overcome astrological obstacles, bringing clarity and positivity to their matchmaking journey. Unlike traditional remedies, we use multiple raagas per planet to ensure an engaging and immersive experience, preventing monotony while amplifying the healing effect.<br/><br/>As a leading Astrology-based Marriage Matchmaking & Marriage Decision-making platform, we empower individuals who rely on astrology in their search for a life partner. Even if someone is committed to using other matchmaking services, they can still exclusively benefit from our Astro Music Healing Therapy to resolve planetary mismatches, ensuring they don’t miss a wonderful alliance due to astrological concerns. By embracing this remedy, alliance-seeking individuals and their families can find greater confidence, reducing uncertainties and emotional burdens during the marriage decision-making process.";
$language["primaryhoroscope"] = "Who is the primary user, to send email the match making report ?";
$language["emailnotregistered"] = "This is not your registered email";
$language["namevalidate"] = "Please input your name only in English. Name should not contain any special characters or numbers";
$language["dasasandhidesc"] = "Dasasandhi is the period between the end of one Mahadasa and the beginning of a new Mahadasa in the horoscope.
Since each Mahadasa brings changes in many aspects of life, it is best to be aware of it in advance and be prepared to face the challenges.
When making big decisions regarding money, relationships, or career, understanding the nature of this period and making decisions helps to avoid major problems.
During Dasasandhi, we can examine ourselves and learn to deal with mental struggles.";
$language["navagrahabandhanam"] = "Nava Graha Vivaha Bandanam <span style='font-size:14px;color:darkgreen;'>(Accurate matching through 9 planetary positions)</span>";
$language["astromusichint"] = "* Click on the link in your email and listen to this Astro Music Healing Therapy. For the best possible results, it's most recommended that Husband and Wife jointly perform the given remedies, together at the same time.";
$language["couplematch"] = "Existing Couple Solution";
$language["alliancematch"] = "New Alliance Match";
$language["otperror"] = "Please enter OTP sent to your mobile";
$language["invalidotperror"] = "Invalid OTP";
$language["registrationTitle"] = "Sign Up";
$language["astroguide"] = "Get daily general astrological guidance and many useful information according to your zodiac sign:";
$language["astrotaskscheduler"] = "Get daily, accurate, personalized horoscope-based action plan guidance to make your actions successful:";
$language["astrologyremediesmeaning"] = "Astrological remedies are remedies for specific problems based on astrology. By doing remedies for the defects in the horoscope, one can avoid difficulties in life.";
$language["psychologicalguidancemeaning"] = "Psychological guidance can be understood as psychologically based guidance or psychological advice. It refers to guidance given based on mood, feelings and psychological aspects.";
$language["destinynumbermale"] = "Destiny Number based Matching Percentage for Male";
$language["destinynumberfemale"] = "Destiny Number based Matching Percentage for Female";
$language["destinynumberpercentage"] = "Destiny Number based Overall Matching Percentage";
$language["destinynumberremarks"] = "Destiny Number based Overall Matching Remarks";
$language["birthnumbermale"] = "Birth Number based Matching Percentage for Male";
$language["birthnumberfemale"] = "Birth Number based Matching Percentage for Female";
$language["birthnumberpercentage"] = "Birth Number based Overall Matching Percentage";
$language["birthnumberremarks"] = "Birth Number based Overall Matching Remarks";
$language["namenumbermale"] = "Name Number based Matching Percentage for Male";
$language["namenumberfemale"] = "Name Number based Matching Percentage for Female";
$language["namenumberpercentage"] = "Name Number based Overall Matching Percentage";
$language["namenumberremarks"] = "Name Number based Overall Matching Remarks";
$language["numeronamologyoverallpercentage"] = "Overall Numero-Nameology Matching Percentage";
$language["numeronamologyoverallremarks"] = "Overall Numero-Nameology Matching Remarks";
$language["numeronamologymatch"] = "Numerology and Namology Match";
$language["numeronamologypercentage"] = "Numerology and Namology Matching Percentage";
$language["numeronamologymeaning"] = "Numerology is the study of numbers and how they affect human lives. In marriage matching, numerology examines the birth number, destiny number, and name numbers based on the date of birth to determine the compatibility of a couple.
Each number has unique energies and qualities that affect one's character, behavior, and relationships.<br/><br/>By matching the numbers, it is confirmed that the life goals and expectations of the couple are in the same direction.<br/><br/>The numbers of both the couple can be examined and examined to see if they are compatible. If the compatibility is poor, the problems can be corrected through suggestions such as name changes or name letters with lucky numbers.";
$language["allianceseeker"] = "New Alliance Seeker ?";

$language["goldenrulesheading"] = "The 10 Golden Rules of Togetherness";
$language["goldenrules1"] = "Great relationships don’t just happen—they are consciously created with mutual effort, mutual trust, and shared values. These 10 golden rules serve as a code of honor for building deep harmony, understanding, and emotional resilience in any partnership, especially in marriage : ";
$language["goldenrules2"] = "<br/><br/>For those who seek ongoing guidance and a supportive ecosystem, we invite you to join our Conscious Couples Sangamam - a dedicated space for couples committed to growing together : ";
$language["thanks"] = "Thanks !";
$language["planetposition"] = "Planet Positions";
$language["male"] = "Male";
$language["female"] = "Female";
$language["bhavaganumber"] = "Bhavaga Number";

    $siteURL = "https://astromatch.online/";
    $productName = "Astro Match Online";
    $accessURL = "astromatch.online";
    $premiumReportSolution = "JAI Premium Matchmaking Report";
    $completeReportSolution = "JAI Complete Matchmaking Report";
    $coupleReportSolution = "JAI Couple Matchmaking Report";

    $live_Host = "193.203.184.29";
    $live_User = "u109433895_devUser";
    $live_Pwd = "1bNQn2vjsVkK9dtw92erq3A6";
    $live_DBName = "u109433895_UnivDB";

    $con = mysqli_connect($live_Host,$live_User,$live_Pwd);
    //Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
    {
    // echo "Connected";
    }

    mysqli_select_db($con, $live_DBName) or die(mysqli_error($con));
    mysqli_set_charset( $con, 'utf8mb4');
        
    $domainName = "matrimonytoday";

    $astroGuide = $siteURL . "daily-astro-guide";
    $astroTaskScheduler = $siteURL . "daily-astro-task-scheduler";
    $astroGuideLink = "https://jenuineastro.com/jam/panchangam.php?id=+919514738806";
    $astroTaskSchedulerLink = "https://jenuineastro.com/MyFortuneTaskScheduler.html";

    $appID = 101; // Replace with the actual appID
    $authID = 1; // Replace with the actual authID

    $ayanamsa = 1;
    $chartId = 1;
    $case2Flag = 'N';

    $astroOrgID = 3;
    $astroOrgSDTemplateID = 0;
    $astroOrgSDTemplateID_bhavaga = 1;
    $weightageMode = "LRS";
    $customReportOrgConfigID = 7;
    $customReportID = 1;
    $astroOrgConfigID = 19;

    $southIndianMatchTemplateID = 46;
    $northIndianMatchTemplateID = 45;

    $maleMarriageDecisionTemplateID = 2535;
    $femaleMarriageDecisionTemplateID = 2536;

    $additional36pointTemplateID = 2613;
    $overallMatchingDecisionTemplateID = 2614;
    $userId = 424;
       
    $clientID = "";
    $clientSecret = "";
    $creditLimit = "";
    $apiID = "";
    
    //Partner Logo & Banner
    $promoPartnerLogoImage = "";
    $promoPartnerBannerImage = "";

    $completeReport = "New Alliance Match Making Report.pdf";
    $completeReport_ta = "Tamil-New Alliance Match Making Report.pdf";
    $completeReport_hi = "Hindi-New Alliance Match Making Report.pdf";
    $completeReport_te = "Telugu-New Alliance Match Making Report.pdf";
    $completeReport_kn = "Kannada-New Alliance Match Making Report.pdf";
    $completeReport_ml = "Malayalam-New Alliance Match Making Report.pdf";

    $suffix_col = "_en";

    $sql = "select ID,apiAcName,clientID,clientSecret,totalCreditLimit from ab_proKeralaAPIAccount_table where isCreditExceeded='N' and isActive='Y' and ID=1";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0)
    {
        $row=mysqli_fetch_array($result);    
        $apiID = $row['ID'];
        $clientID = $row['clientID'];
        $clientSecret = $row['clientSecret'];
        $creditLimit = $row['totalCreditLimit'];
    }

    $query = "SELECT planetID,planetName,planetName_ta,planetName_hi,planetName_te,planetName_kn,planetName_ml,primaryRemedyColor,secondaryRemedyColor FROM ab5_planet_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $planetOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $query = "SELECT starID,starName,starDescription,starDescription_ta,starDescription_hi,starDescription_te,starDescription_kn,starDescription_ml FROM ab10_star_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
      $nakshatraOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);      
    }

    $query = "SELECT rasiID,rasiName,rasiName_ta,rasiName_hi,rasiName_te,rasiName_kn,rasiName_ml FROM ab8_rasi_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $rasiOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $query = "SELECT pakshamID,pakshamName,pakshamName_ta,pakshamName_hi,pakshamName_te,pakshamName_kn,pakshamName_ml FROM ab3_paksham_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $pakshamOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
                    
    $query = "SELECT thithiID,thithiName,thithiName_ta,thithiName_hi,thithiName_te,thithiName_kn,thithiName_ml,thithiDevathaiName,thithiDevathaiName_ta,thithiDevathaiName_hi,thithiDevathaiName_te,thithiDevathaiName_kn,thithiDevathaiName_ml,thithiDevathaiImage,thithiDevathaiImage_ta,thithiDevathaiImage_hi,thithiDevathaiImage_te,thithiDevathaiImage_kn,thithiDevathaiImage_ml,thithiDevathaiMantra,thithiDevathaiMantra_ta,thithiDevathaiMantra_hi,thithiDevathaiMantra_te,thithiDevathaiMantra_kn,thithiDevathaiMantra_ml,thithiDevathaiName2,thithiDevathaiName2_ta,thithiDevathaiName2_hi,thithiDevathaiName2_te,thithiDevathaiName2_kn,thithiDevathaiName2_ml,thithiDevathaiImage2,thithiDevathaiImage2_ta,thithiDevathaiImage2_hi,thithiDevathaiImage2_te,thithiDevathaiImage2_kn,thithiDevathaiImage2_ml,thithiDevathaiMantra2,thithiDevathaiMantra2_ta,thithiDevathaiMantra2_hi,thithiDevathaiMantra2_te,thithiDevathaiMantra2_kn,thithiDevathaiMantra2_ml,thithiGodName,thithiGodName_ta,thithiGodName_hi,thithiGodName_te,thithiGodName_kn,thithiGodName_ml,thithiGodMantra,thithiGodMantra_ta,thithiGodMantra_hi,thithiGodMantra_te,thithiGodMantra_kn,thithiGodMantra_ml,thithiGodImage1,thithiGodImage1_ta,thithiGodImage1_hi,thithiGodImage1_te,thithiGodImage1_kn,thithiGodImage1_ml,thithiGodName2_ta,thithiGodName2_hi,thithiGodName2_te,thithiGodName2_kn,thithiGodName2_ml,thithiGodImage2,thithiGodImage2_ta,thithiGodImage2_hi,thithiGodImage2_te,thithiGodImage2_kn,thithiGodImage2_ml,thithiGodMantra2,thithiGodMantra2_ta,thithiGodMantra2_hi,thithiGodMantra2_te,thithiGodMantra2_kn,thithiGodMantra2_ml,birthThithiPrediction,birthThithiPrediction_ta,birthThithiPrediction_hi,birthThithiPrediction_te,birthThithiPrediction_kn,birthThithiPrediction_ml FROM ab4_thithi_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $thithiOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);      
    }

    $query = "SELECT appName,appName_ta,appName_hi,appName_te,appName_kn,appName_ml,logoPath,logoPath_ta,logoPath_hi,logoPath_te,logoPath_kn,logoPath_ml,slogan,slogan_ta,slogan_hi,slogan_te,slogan_kn,slogan_ml,usageInstructions,usageInstructions_ta,usageInstructions_hi,usageInstructions_te,usageInstructions_kn,usageInstructions_ml,watermark,watermark_ta,watermark_hi,watermark_te,watermark_kn,watermark_ml,bannerLogoPath,bannerLogoPath_ta,bannerLogoPath_hi,bannerLogoPath_te,bannerLogoPath_kn,bannerLogoPath_ml,matrimonyCompletePaymentURL,matrimonyPremiumPaymentURL,matrimony36GunaPaymentURL,matrimony10PointPaymentURL,10pMRLeadName,10pMRLeadName_ta,10pMRLeadName_hi,10pMRLeadName_te,10pMRLeadName_kn,10pMRLeadName_ml,10pMRLeadLink,10pMRLeadLink_ta,10pMRLeadLink_hi,10pMRLeadLink_te,10pMRLeadLink_kn,10pMRLeadLink_ml,36pMRLeadName,36pMRLeadName_ta,36pMRLeadName_hi,36pMRLeadName_te,36pMRLeadName_kn,36pMRLeadName_ml,36pMRLeadLink,36pMRLeadLink_ta,36pMRLeadLink_hi,36pMRLeadLink_te,36pMRLeadLink_kn,36pMRLeadLink_ml,customerCareNumber,customerCareWhatsApp,unlimitedMatrimonyFreeTrialEnabled,goldenRulesLink,goldenRulesLink_ta,goldenRulesLink_hi,goldenRulesLink_te,goldenRulesLink_kn,goldenRulesLink_ml,ccsCommunityJoiningLink,ccsCommunityJoiningLink_ta,ccsCommunityJoiningLink_hi,ccsCommunityJoiningLink_te,ccsCommunityJoiningLink_kn,ccsCommunityJoiningLink_ml,matriVistaLegalDisclaimerText$suffix_col as matriVistaLegalDisclaimerText FROM ab1_config_table where isActive='Y' order by configID desc limit 0,1";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $configOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);      
    }

    $query = "SELECT dayname,dayname_ta,dayname_hi,dayname_te,dayname_kn,dayname_ml FROM ab_mailConfig_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $dayOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
                    
    $query = "SELECT karanaName,karanaName_ta,karanaName_hi,karanaName_te,karanaName_kn,karanaName_ml,karanaDescription,karanaDescription_ta,karanaDescription_hi,karanaDescription_te,karanaDescription_kn,karanaDescription_ml FROM ab_karana_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $karanaOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $query = "SELECT yogamName,yogamName_ta,yogamName_hi,yogamName_te,yogamName_kn,yogamName_ml,yogamDescription,yogamDescription_ta,yogamDescription_hi,yogamDescription_te,yogamDescription_kn,yogamDescription_ml FROM ab_yogam_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $yogamOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $query = "SELECT vaaraName,vaaraName_ta,vaaraName_hi,vaaraName_te,vaaraName_kn,vaaraName_ml,vaaraDescription,vaaraDescription_ta,vaaraDescription_hi,vaaraDescription_te,vaaraDescription_kn,vaaraDescription_ml FROM ab_vaaram_table";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
      $vaaramOptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }        
    
    function getPlanetID($id)
    {
        $planetID = 0;
        switch($id)
        {                
            //சூரியன் 
            case 0: $planetID = 1; break;

            //சந்திரன்
            case 1: $planetID = 2; break;    

            //செவ்வாய்
            case 4: $planetID = 3; break;    

            //புதன்  
            case 2: $planetID = 4; break;

            //குரு   
            case 5: $planetID = 5; break;

            //சுக்கிரன்            
            case 3: $planetID = 6; break;

            //சனி
            case 6: $planetID = 7; break;

            //Rahu   
            case 101: $planetID = 8; break;

            //Ketu    
            case 102: $planetID = 9; break;
        }
        return $planetID;
    }

    function convertDate($apiDateTime)
    {
        // Create a DateTime object with the given date and time
        $dateTime = new DateTime($apiDateTime);

        // Format the DateTime object as "dd/mm/YYYY H:i:s"
        $formattedDateTime = $dateTime->format("Y-m-d H:i:s");

        // Output the formatted date and time
        return $formattedDateTime;
    }
    
    function quickDezider($decisionId,$case2Flag,$live_Host,$live_DBName,$live_User,$live_Pwd)
    {
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_QuickDezider(:decisionId,:caseFlag)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command
            $stmt->bindParam(':decisionId', $decisionId, PDO::PARAM_INT);
            $stmt->bindParam(':caseFlag', $case2Flag, PDO::PARAM_STR);

            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            //echo "success"; 
                
            // Close the connection
            $pdo = null;
        }
        catch(Exception $ex)
        {
            //echo $ex->getTraceAsString();
            writeLog($ex->getTraceAsString());
        }
    }

    function convertLanguage($language)
    {
        $convertLang = "";
        switch ($language) {
            case 'ta':
                $convertLang = "Tamil";
                break;
            case 'hi':
                $convertLang = "Hindi";
                break;
            case 'te':
                $convertLang = "Telugu";
                break;
            case 'kn':
                $convertLang = "Kannada";
                break;
            case 'ml':
                $convertLang = "Malayalam";
                break;
            case 'en':
            default:
                $convertLang = "English";
                break;
        }
        return $convertLang;
    }

    function getPlanetNames($index, $rasicount, $rasi, $lang, $planetOptions)
    {
        $planetName = "";
        for ($j = 0; $j < $rasicount; $j++) {
            if ($index == $rasi[$j]) {
                if ($lang == "en")
                    $planetName .= "<span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>" . $planetOptions[$j]['planetName'] . "</span>";
                else
                    $planetName .= "<span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>" . $planetOptions[$j]['planetName_' . $lang] . "</span>";
            }
        }
        return $planetName;
    }

    function putPlanetNames($index, $rasicount, $rasi, $lang, $planetOptions)
    {
        $planetName = "";
        for ($j = 0; $j < $rasicount; $j++) {
            if ($index == $rasi[$j]) {
                if ($lang == "en")
                    $planetName .= $planetOptions[$j]['planetName'] . ", ";
                else
                    $planetName .= $planetOptions[$j]['planetName_' . $lang] . ", ";
            }
        }
        $planetName = substr($planetName,0,-2);
        return $planetName;
    }

    function applyRasiBoxStyle($colorNo)
    {
        $goldenBox = " background-color:#c0ff00;color: darkblue;";
        $bluegreenBox = " background-color:#09edbffa;color: darkblue;";
        $pinkBox = " background-color:#fd52fd;color: white;";
        $yellowBox = " background-color:#ffeb3b;color: darkblue;";
        $redBox = " background-color:#fb3535;color: white;";
        $orangeBox = " background-color:#fd5353;color: white;";
        $className = "";
        switch ($colorNo) {
            //Goldenbox
            case 1:
            case 5:
            case 9:
                $className = $goldenBox;
                break;
                //Bluegreenbox                
            case 4:
            case 7:
            case 10:
                $className = $bluegreenBox;
                break;
                //Yellowbox    
            case 11:
                $className = $yellowBox;
                break;
                //Redbox
            case 6:
            case 8:
            case 12:
                $className = $redBox;
                break;
                //Orangebox
            case 3:
                $className = $orangeBox;
                break;
                //Pinkbox
            case 2:
                $className = $pinkBox;
                break;
        }
        return $className;
    }

    function setRasiBoxClass($colorNo)
    {
        $goldenBox = " background-color:#c0ff00;color: maroon;opacity:0.3;";
        $bluegreenBox = " background-color:#09edbffa;color: white;opacity:0.3;";
        $pinkBox = " background-color:#fd52fd;color: white;";
        $yellowBox = " background-color:#ffeb3b;color: darkblue;opacity:0.3;";
        $redBox = " background-color:#fb3535;color: white;opacity:0.3;";
        $orangeBox = " background-color:#fd5353;color: white;";
        $className = "";
        switch ($colorNo) {
            //Goldenbox
            case 1:
            case 5:
            case 9:
                $className = $goldenBox;
                break;
                //Bluegreenbox                
            case 4:
            case 7:
            case 10:
                $className = $bluegreenBox;
                break;
                //Yellowbox    
            case 11:
                $className = $yellowBox;
                break;
                //Redbox
            case 6:
            case 8:
            case 12:
                $className = $redBox;
                break;
                //Orangebox
            case 3:
                $className = $orangeBox;
                break;
                //Pinkbox
            case 2:
                $className = $pinkBox;
                break;
        }
        return $className;
    }
    
    function changeDate($apiDateTime)
    {
        // Create a DateTime object with the given date and time
        $dateTime = new DateTime($apiDateTime);

        // Format the DateTime object as "dd/mm/YYYY H:i:s"
        $formattedDateTime = $dateTime->format("d-m-Y");

        // Output the formatted date and time
        return $formattedDateTime;
    }
    
    function checkTharaPalan($mainProfileID,$allianceProfileID,$starField,$genderType,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$languageValues)
    {           
        $tharaPalan = "";
        $tharapalan1 = "";
        $tharapalan2 = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_MatchByThara_v2(:mainProfileID,:allianceProfileID,@a,@b,@c,@d,@e,@f,@g,@h)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command            
            $stmt->bindParam(':mainProfileID', $mainProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':allianceProfileID', $allianceProfileID, PDO::PARAM_INT);

            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b,@c,@d,@e,@f,@g,@h")->fetch(PDO::FETCH_ASSOC);
            
            $sql1 = "SELECT $starField FROM ab_translations_table WHERE possibleValue_en='" .$row['@b']. "'";
            //echo $sql1; exit;
            $result1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($result1);
            $tharapalan1 = $row1[0];

            $sql1 = "SELECT $starField FROM ab_translations_table WHERE possibleValue_en='" .$row['@c']. "'";
            $result1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($result1);
            $tharapalan1 .= " - " . $row1[0];
            
            $sql1 = "SELECT $starField FROM ab_translations_table WHERE possibleValue_en='" .$row['@e']. "'";
            $result1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($result1);
            $tharapalan2 = $row1[0];
                        
            $sql1 = "SELECT $starField FROM ab_translations_table WHERE possibleValue_en='" .$row['@f']. "'";
            $result1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($result1);
            $tharapalan2 .= " - " . $row1[0];

            if($tharapalan1 != "")
            {
                if($genderType == "Male")
                    $tharaPalan = "<br/><span class='text-center fw-bold text-pink'>" . $languageValues['femaletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan1 . "</span><br/>" . "<span class='text-center fw-bold text-pink'>" . $languageValues['maletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan2 . "</span>";
                else
                    $tharaPalan = "<br/><span class='text-center fw-bold text-pink'>" . $languageValues['maletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan1 . "</span><br/>" . "<span class='text-center fw-bold text-pink'>" . $languageValues['femaletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan2 . "</span>";                    
            }

            $tharaPalan .= "##" . $row['@g'] . "##" . $row['@h'];
            
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $tharaPalan;
    }

    function checkRaghuDosha($astroProfileID,$con,$live_Host,$live_DBName,$live_User,$live_Pwd)
    {   
        $doshaResult = "";        
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_CheckRahuDosha(:astroProfileID,@a,@b,@c,@d)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command            
            $stmt->bindParam(':astroProfileID', $astroProfileID, PDO::PARAM_INT);
            
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b,@c,@d")->fetch(PDO::FETCH_ASSOC);
            
            if($row['@a'] == "Y")
            {
                $doshaResult = "(" . $row['@c'] . "-" . $row['@d'] .")";
            }                      
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $doshaResult;
    }
    
    function checkSevvaaiDosha($astroProfileID,$astroOrgSDTemplateID,$numberOfDoshaTypesIdentified,$applicableDoshaTypes,$overallSevvaaiDoshaLevel,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$language,$convertLang)
    {   
        $doshaResult = "";
        $output = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_CheckSevvaaiDosha(:astroProfileID,:astroOrgSDTemplateID,@a,@b,@c,@d,@e,@f,@g,@h,@i,@j,@k,@l,@m,@n,@o,@p,@q)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command            
            $stmt->bindParam(':astroProfileID', $astroProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':astroOrgSDTemplateID', $astroOrgSDTemplateID, PDO::PARAM_INT);
            
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b,@c,@d,@e,@f,@g,@h,@i,@j,@k,@l,@m,@n,@o,@p,@q")->fetch(PDO::FETCH_ASSOC);

            //print_r($row);
            
            if($row['@m'] >= 1)
            {
                $numberOfDoshaTypesIdentified = $row['@m'];
                $applicableDoshaTypes = $row['@n'];
                $overallSevvaaiDoshaLevel = $row['@q'];
                                
                $fromLagnaLevel = $row['@g'];
                $fromRasiLevel = $row['@h'];
                $fromSukranLevel = $row['@i'];

                if($row['@m'] == 2)
                {
                    $temp = explode(",",$row['@n']);
                    if($convertLang != "English")
                    {                        
                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$temp[0]."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];
                    
                        if($temp[0] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($temp[0] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                           
                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$temp[1]."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];

                        if($temp[1] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[1] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;                            
                    }
                    else
                    {
                        $output = str_replace("From","From ",$temp[0]);
                        
                        if($temp[0] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($temp[0] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                        
                        $output = str_replace("From","From ",$temp[1]);                                                

                        if($temp[1] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[1] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;                            
                    }
                }
                else if($row['@m'] == 3)
                {
                    $temp = explode(",",$row['@n']);
                    if($convertLang != "English")
                    {                                                
                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$temp[0]."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];
                        if($temp[0] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($temp[0] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                            
                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$temp[1]."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];
                        if($temp[1] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[1] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;

                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$temp[2]."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];
                        if($temp[2] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[2] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;
                    }
                    else
                    {
                        $output = str_replace("From","From ",$temp[0]);
                        if($temp[0] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($temp[0] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                        $output = str_replace("From","From ",$temp[1]);
                        if($temp[1] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[1] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;
                        $output = str_replace("From","From ",$temp[2]);
                        if($temp[2] == "FromRasi")
                            $doshaResult .= ", " . round($fromRasiLevel) . "% - " . $output;
                        else if($temp[2] == "FromLagna")
                            $doshaResult .= ", " . round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult .= ", " . round($fromSukranLevel) . "% - " . $output;
                    }
                }
                else
                {
                    if($convertLang != "English")
                    {
                        $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType','".$row['@n']."','English','".$convertLang."',1)";
                        $tResult = mysqli_query($con,$tsql);
                        $tRow = mysqli_fetch_array($tResult);
                        $output = $tRow[0];
                        if($row['@n'] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($row['@n'] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                    }
                    else
                    {
                        $output = str_replace("From","From ",$row['@n']);
                        if($row['@n'] == "FromRasi")
                            $doshaResult =  round($fromRasiLevel) . "% - " . $output;
                        else if($row['@n'] == "FromLagna")
                            $doshaResult =  round($fromLagnaLevel) . "% - " . $output;
                        else
                            $doshaResult =  round($fromSukranLevel) . "% - " . $output;
                    }                    
                }
                $doshaResult .= "<br>" . $language['sevvaaipercentage'] . " : " . round($overallSevvaaiDoshaLevel) . "%" . "##" . $numberOfDoshaTypesIdentified ."^". $applicableDoshaTypes . "^" . $overallSevvaaiDoshaLevel;
            }            
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $doshaResult;
    }

    function MatchSevvaaiDosha($astroOrgSDTemplateID,$maleAstroProfileID,$femaleAstroProfileID,$weightageMode,$numberOfMaleDoshaTypesIdentified,$numberOfFemaleDoshaTypesIdentified,$applicableMaleDoshaTypes,$applicableFemaleDoshaTypes,$overallMaleSevvaaiDoshaLevel,$overallFemaleSevvaaiDoshaLevel,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$convertLang)
    {   
        $doshaResult = "";
        $output = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_MatchBySevvaaiDosha(:astroOrgSDTemplateID,:maleAstroProfileID,:femaleAstroProfileID,:weightageMode,:numberOfMaleDoshaTypesIdentified,:numberOfFemaleDoshaTypesIdentified,:applicableMaleDoshaTypes,:applicableFemaleDoshaTypes,:overallMaleSevvaaiDoshaLevel,:overallFemaleSevvaaiDoshaLevel,@a,@b)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command        
            $stmt->bindParam(':astroOrgSDTemplateID', $astroOrgSDTemplateID, PDO::PARAM_INT);
            $stmt->bindParam(':maleAstroProfileID', $maleAstroProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':femaleAstroProfileID', $femaleAstroProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':weightageMode', $weightageMode, PDO::PARAM_STR);
            $stmt->bindParam(':numberOfMaleDoshaTypesIdentified', $numberOfMaleDoshaTypesIdentified, PDO::PARAM_INT);
            $stmt->bindParam(':numberOfFemaleDoshaTypesIdentified', $numberOfFemaleDoshaTypesIdentified, PDO::PARAM_INT);
            $stmt->bindParam(':applicableMaleDoshaTypes', $applicableMaleDoshaTypes, PDO::PARAM_STR);
            $stmt->bindParam(':applicableFemaleDoshaTypes', $applicableFemaleDoshaTypes, PDO::PARAM_STR);
            $stmt->bindParam(':overallMaleSevvaaiDoshaLevel', $overallMaleSevvaaiDoshaLevel, PDO::PARAM_INT);
            $stmt->bindParam(':overallFemaleSevvaaiDoshaLevel', $overallFemaleSevvaaiDoshaLevel, PDO::PARAM_INT);
                
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b")->fetch(PDO::FETCH_ASSOC);
            if($row["@a"] != "")
            {
                $tsql = "SELECT fn_translateList('ab_sevvaaiDoshaOverallRangeMatching_table','overallRangeMatchingStatus','".$row['@b']."','English','".$convertLang."',1)";
                $tResult = mysqli_query($con,$tsql);
                $tRow = mysqli_fetch_array($tResult);
                $output = $tRow[0];
                //$doshaResult = round($row["@a"]) . "% - " . $output;
                $doshaResult = round($row["@a"]) . "%";
            }
            
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $doshaResult;
    }

    function CheckForDasaSandhi($astroProfileID,$live_Host,$live_DBName,$live_User,$live_Pwd)
    {   
        $output = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command
            $sql = 'CALL SP_CheckForDasaSandhi(:astroProfileID,@a,@b,@c,@d,@e,@f,@g,@h,@i)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command                    
            $stmt->bindParam(':astroProfileID', $astroProfileID, PDO::PARAM_INT);
                
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b,@c,@d,@e,@f,@g,@h,@i")->fetch(PDO::FETCH_ASSOC);
            
            $output = $row['@a'] . "##" . $row['@b'] . "##" . $row['@c'];
            
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $output;
    }

    function matchMakingDecision($mainProfileId,$allianceProfileId,$decisionTemplateId,$factor_values,$userId,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$case2Flag)
    {
        $option = "";
        $overAllPercentage = 0;
        $decisionName = "Match Making Decision for Astro Profile ID : ".$mainProfileId." with the Alliance ID(s) : " . $allianceProfileId;
        //echo $decisionName . "<br>"; exit;

        $sql = "INSERT INTO qd7_decisions_table(decisionName,isTemplate,decisionTemplateID,decisionForUserID) VALUES('".$decisionName."','N',$decisionTemplateId,$userId)";
        //echo $sql . "<br>"; exit;
        mysqli_query($con,$sql);
        $decisionId = mysqli_insert_id($con);
        
        $sql = "SELECT factorID,factorType,classification,factorNotation,level1Priority,factorName,expectedFactorValue,standardRating,realisticGap,realisticRating FROM qd3b_factorPriorities_table WHERE associatedDecisionID=" . $decisionTemplateId;
        $result = mysqli_query($con,$sql);
        $factorPriorities = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($factorPriorities as $fp)
        {
            $sql = "INSERT INTO qd3b_factorPriorities_table(associatedDecisionID,factorID,factorType,classification,factorNotation,level1Priority,factorName,expectedFactorValue,standardRating,realisticGap,realisticRating) VALUES('$decisionId','".$fp['factorID']."','".$fp['factorType']."','".$fp['classification']."','".$fp['factorNotation']."','".$fp['level1Priority']."','".$fp['factorName']."','".$fp['expectedFactorValue']."','".$fp['standardRating']."','".$fp['realisticGap']."','".$fp['realisticRating']."')";
            mysqli_query($con,$sql);
        }
                                
        $sql = "INSERT INTO qd5a_options_table(optionType,associatedProfileID,associatedDecisionID,optionName,optionSource) VALUES('Alliances',$allianceProfileId,$decisionId,'$option','Self')";
        //echo $sql; exit;
        mysqli_query($con,$sql);
        $optionId = mysqli_insert_id($con);
        $sql = "INSERT INTO qd5b_optionsAssessment_table(associatedOptionID,optionName,associatedDecisionID) VALUES($optionId,'$option',$decisionId)";
        mysqli_query($con,$sql);
        $sql = "UPDATE qd7_decisions_table SET listOfOptionsCosnidered='" . $optionId . "' WHERE decisionID=" . $decisionId;
        mysqli_query($con,$sql);        

        try
        {            
            $count = 10;
            $factors = array();
            $factorIds = array(144,145,146,147,148,149,150,151,152,153);
            for($index=0; $index<$count; $index++)
            {
                $sql = "INSERT INTO qd6_optionFactorMap_table(associatedDecisionID,optionID,factorID,assessmentPercentage,factorValueSource,assessmentInput) VALUES($decisionId,$optionId,$factorIds[$index],$factor_values[$index],'Self','Automatic Percentage')";
                //echo $sql."<br/>";
                mysqli_query($con,$sql);
            }            
            
            // Close the connection
            $pdo = null;

            quickDezider($decisionId,$case2Flag,$live_Host,$live_DBName,$live_User,$live_Pwd);

            $sql = "SELECT choosenOptionPercentage FROM qd7_decisions_table WHERE decisionID=" . $decisionId;
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row['choosenOptionPercentage'] != "")
                $overAllPercentage = $row['choosenOptionPercentage'];
            else
                $overAllPercentage = 0;
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }        
        return $overAllPercentage;
    }

    function additionalMatchMaking($mainProfileId,$allianceProfileId,$decisionTemplateId,$factor_values,$userId,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$case2Flag)
    {
        $option = "";
        $overAllPercentage = 0;
        $decisionName = "Additonal 36 Points Match Making for Astro Profile ID : ".$mainProfileId." with the Alliance ID(s) : " . $allianceProfileId;
        //echo $decisionName . "<br>"; exit;

        $sql = "INSERT INTO qd7_decisions_table(decisionName,isTemplate,decisionTemplateID,decisionForUserID) VALUES('".$decisionName."','N',$decisionTemplateId,$userId)";
        //echo $sql . "<br>"; exit;
        mysqli_query($con,$sql);
        $decisionId = mysqli_insert_id($con);
        
        $sql = "SELECT factorID,factorType,classification,factorNotation,level1Priority,factorName,expectedFactorValue,standardRating,realisticGap,realisticRating FROM qd3b_factorPriorities_table WHERE associatedDecisionID=" . $decisionTemplateId;
        $result = mysqli_query($con,$sql);
        $factorPriorities = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($factorPriorities as $fp)
        {
            $sql = "INSERT INTO qd3b_factorPriorities_table(associatedDecisionID,factorID,factorType,classification,factorNotation,level1Priority,factorName,expectedFactorValue,standardRating,realisticGap,realisticRating) VALUES('$decisionId','".$fp['factorID']."','".$fp['factorType']."','".$fp['classification']."','".$fp['factorNotation']."','".$fp['level1Priority']."','".$fp['factorName']."','".$fp['expectedFactorValue']."','".$fp['standardRating']."','".$fp['realisticGap']."','".$fp['realisticRating']."')";
            mysqli_query($con,$sql);
        }
                                
        $sql = "INSERT INTO qd5a_options_table(optionType,associatedProfileID,associatedDecisionID,optionName,optionSource) VALUES('Alliances',$allianceProfileId,$decisionId,'$option','Self')";
        //echo $sql; exit;
        mysqli_query($con,$sql);
        $optionId = mysqli_insert_id($con);
        $sql = "INSERT INTO qd5b_optionsAssessment_table(associatedOptionID,optionName,associatedDecisionID) VALUES($optionId,'$option',$decisionId)";
        mysqli_query($con,$sql);
        $sql = "UPDATE qd7_decisions_table SET listOfOptionsCosnidered='" . $optionId . "' WHERE decisionID=" . $decisionId;
        mysqli_query($con,$sql);        

        try
        {            
            $count = 8;
            $factors = array();
            $factorIds = array(154,155,156,157,158,159,160,161);
            for($index=0; $index<$count; $index++)
            {
                $sql = "INSERT INTO qd6_optionFactorMap_table(associatedDecisionID,optionID,factorID,assessmentPercentage,factorValueSource,assessmentInput) VALUES($decisionId,$optionId,$factorIds[$index],$factor_values[$index],'Self','Automatic Percentage')";
                //echo $sql."<br/>";
                mysqli_query($con,$sql);
            }
            
            // Close the connection
            $pdo = null;

            quickDezider($decisionId,$case2Flag,$live_Host,$live_DBName,$live_User,$live_Pwd);

            $sql = "SELECT choosenOptionPercentage FROM qd7_decisions_table WHERE decisionID=" . $decisionId;
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row['choosenOptionPercentage'] != "")
                $overAllPercentage = $row['choosenOptionPercentage'];
            else
                $overAllPercentage = 0;
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $overAllPercentage;
    }

    function MatchByRahuKethu($mainProfileID,$allianceProfileID,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$languageValues)
    {
        $output = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command            
            $sql = 'CALL SP_MatchByRahuKethu (:mainProfileID,:allianceProfileID, @a, @b)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command                    
            $stmt->bindParam(':mainProfileID', $mainProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':allianceProfileID', $allianceProfileID, PDO::PARAM_INT);
                
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b")->fetch(PDO::FETCH_ASSOC);
            
            $output = $row['@a'] . "##" . $row['@b'];
            
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $output;
    }

    function checkMudakkuRasi($mainProfileID,$allianceProfileID,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$languageValues)
    {
        $output = "";
        try
        {
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);
            // calling stored procedure command            
            $sql = 'CALL SP0_CheckMudakkuRasi (:mainProfileID,:allianceProfileID, @a, @b)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command                    
            $stmt->bindParam(':mainProfileID', $mainProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':allianceProfileID', $allianceProfileID, PDO::PARAM_INT);
                
            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b")->fetch(PDO::FETCH_ASSOC);
            
            $output = $row['@a'] . "##" . $row['@b'];            
        }
        catch(Exception $ex)
        {
            //echo $ex->getMessage();
            writeLog($ex->getTraceAsString());
        }
        return $output;
    }   

    function integratedNumeroMatching($astroOrgSDTemplateID,$mainProfileID,$allianceProfileID,$gender,$con,$live_Host,$live_DBName,$live_User,$live_Pwd,$lang,$languageValues)
    {
        try 
        {
            $result = "";
            //$pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName . ";charset=utf8mb4", $live_User, $live_Pwd,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES => false,]);
            $pdo = new PDO("mysql:host=" . $live_Host . ";dbname=" . $live_DBName, $live_User, $live_Pwd);

            // Ensure MySQL communicates in UTF-8
            $pdo->exec("SET NAMES utf8mb4");
            $pdo->exec("SET CHARACTER SET utf8mb4");

            // calling stored procedure command
            $sql = 'CALL SP_IntegratedNumeroMatching(:astroOrgSDTemplateID,:mainProfileId,:allianceProfileId,:language,@a,@b)';

            // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($sql);

            // pass value to the command            
            $stmt->bindParam(':astroOrgSDTemplateID', $astroOrgSDTemplateID, PDO::PARAM_INT);
            $stmt->bindParam(':mainProfileId', $mainProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':allianceProfileId', $allianceProfileID, PDO::PARAM_INT);
            $stmt->bindParam(':language', $lang, PDO::PARAM_STR);

            // execute the stored procedure
            $stmt->execute();

            $stmt->closeCursor();

            $row = $pdo->query("SELECT @a,@b")->fetch(PDO::FETCH_ASSOC);

            /*echo "<pre>";
            print_r($row);
            echo "</pre>";*/

            $jsonString = $row['@b'];

            // Decode JSON
            $dataArray = json_decode($jsonString, true);

            // Check if decoding was successful
            if (json_last_error() === JSON_ERROR_NONE) {
            
                // Access specific values
                if($gender=="Male")
                {
                    $result .= $languageValues['destinynumbermale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['destinynumberfemale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Main User"] . " %" . "<br>";
                }
                else
                {
                    $result .= $languageValues['destinynumbermale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['destinynumberfemale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['destinynumberpercentage'] . " : " . $dataArray[0]["Destiny Number based Overall Matching Percentage"] . " %  -  " . $dataArray[0]["Destiny Number based Overall Matching Remarks"] . "<br><br>";
                //$result .= $languageValues['destinynumberremarks'] . " : " . $dataArray[0]["Destiny Number based Overall Matching Remarks"] . "<br><br>";
                        
                if($gender=="Male")
                {
                    $result .= $languageValues['birthnumbermale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['birthnumberfemale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Main User"] . " %" . "<br>";
                }
                else
                {
                    $result .= $languageValues['birthnumbermale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['birthnumberfemale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['birthnumberpercentage'] . " : " . $dataArray[1]["Birth Number based Overall Matching Percentage"] . " %  -  " . $dataArray[1]["Birth Number based Overall Matching Remarks"] . "<br><br>";
                //$result .= $languageValues['birthnumberremarks'] . " : " . $dataArray[1]["Birth Number based Overall Matching Remarks"] . "<br><br>";

                if($gender=="Male")
                {
                    $result .= $languageValues['namenumbermale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['namenumberfemale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Main User"] . " %" . "<br>";
                }
                else
                {
                    $result .= $languageValues['namenumbermale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['namenumberfemale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['namenumberpercentage'] . " : " . $dataArray[2]["Name Number based Overall Matching Percentage"] . " %  -  " . $dataArray[2]["Name Number based Overall Matching Remarks"] . "<br><br>";
                //$result .= $languageValues['namenumberremarks'] . " : " . $dataArray[2]["Name Number based Overall Matching Remarks"] . "<br><br>";

                $result .= $languageValues['numeronamologyoverallpercentage'] . " : <span style='color:#b90075;font-size:18px;'>" . $dataArray[3]["Overall Numero-Nameology Matching Percentage"] . " %</span>" . "<br>";
                $result .= $languageValues['numeronamologyoverallremarks'] . " : " . $dataArray[3]["Overall Numero-Nameology Matching Remarks"];

                $result .= "##" . $dataArray[3]["Overall Numero-Nameology Matching Percentage"];
            } else {
                //echo "Error decoding JSON: " . json_last_error_msg();
                $result = "";
            }
            
            // Close the connection
            $pdo = null;
        } catch (Exception $ex) {
            //echo $ex->getMessage();
            $result = "";
            writeLog($ex->getTraceAsString());
        }
        return $result;
    }

    function writeLog($message) {
        $logDir = __DIR__ . "/logs";
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true); // Create folder if not exists
        }

        $logFile = $logDir . "/log_" . date("Y-m-d") . ".log"; // Daily log file
        $time = date("H:i:s");
        $logMessage = "[$time] $message" . PHP_EOL;

        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }


if(isset($_GET['userId']))
{
    $astroProfileID = $_GET['mainProfileId'];
    $allianceID = $_GET['allianceProfileId'];
    $decisionId1 = $_GET['decisionID1'];
    $decisionId2 = $_GET['decisionID2'];
    $matchmethod = $_GET['matchMethod'];
    $savedMatchID = $_GET['matchID'];
          
    $lang = "en";
    $domain = $_SERVER['SERVER_NAME'];
    $siteURL = "https://" . "astromatch.online" . "/";
    if($lang == "en")
    {
        $logoImage = $configOptions[0]["bannerLogoPath"];
        //$watermarktext = $configOptions[0]["watermark"];
        $starField = "possibleValue_en";
        $dayname = "dayname";
        $planetfield = "planetName";
        $rasiField = "rasiName";
        $housetable = $siteURL . "public/assets/img/houses.png";
        $factorField = "factorName";
    }
    else
    {
        $logoImage = $configOptions[0]["bannerLogoPath_" . $lang];
        //$watermarktext = $configOptions[0]["watermark" . $lang];
        $starField = "translatedValue_" . $lang;
        $dayname = "dayname_" . $lang;
        $planetfield = "planetName_". $lang;
        $rasiField = "rasiName_" . $lang;
        $housetable = $siteURL . "img/houses_".$lang.".png";
        $remedyField = "remedies_" . $lang;
        $factorField = "factorName_" . $lang;
    }

    $watermarktext = $configOptions[0]["watermark"];

    $thankstext = $language["thanks"];

    $convertLang = convertLanguage($lang);

    $query ="SELECT $starField FROM ab_translations_table WHERE tableName='ab10_star_table' AND columnName='starName_ta'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $starOptions= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
                    
    $message = "";                   
            
    $sql = "SELECT choosenOptionPercentage FROM qd7_decisions_table WHERE decisionID=" . $decisionId1;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $overAllPercentage = $row['choosenOptionPercentage'];
                
    $person1 = "";
    $person2 = "";

    $birthrasi1 = "";
    $birthrasi2 = "";
    $mainUserStarID = "";
    $allianceUserStarID = "";
    $tharaPalanResult = "";
                                                
    $resultstart = '<div style="color:darkblue;font-weight:bold;text-align:center;font-size:x-large;">'.$language['marriagematch'].'</div><br/><div style="display:flex;justify-content:space-around;">';
                                        
    $mainProfileTable = "<div style='width: 45%;float:left;margin-right:10px;border:2px solid #02a698;border-radius:15px;'><table cellpadding='5' style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'>";
    $display = "";
    $display2 = "";
    $maindisplay3 = "";
    $maindisplay4 = "";
    $gender = "";
    $genderType = "";

    $sql = "SELECT astroProfileName,gender,dateOfBirth,TIME_FORMAT(timeOfBirth,'%h:%i %p') AS `timeOfBirth`,placeOfBirthCity,placeOfBirthState,placeOfBirthCountry,isChandranSubar FROM ab15b_astroProfile_table WHERE astroProfileID=".$astroProfileID;
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);            
        $genderType = $row['gender'];

        $tsql = "SELECT fn_translateList('ab15_userInfo_table','gender','".$genderType."','English','".$convertLang."',1)";
        $tResult = mysqli_query($con,$tsql);
        $tRow = mysqli_fetch_array($tResult);
        $gender = $tRow[0];                        

        $dateOfBirth = $row["dateOfBirth"];
        $date = DateTime::createFromFormat('Y-m-d', $dateOfBirth);
        $dateOfBirth = $date->format('d/m/Y');
        $timeOfBirth = $row["timeOfBirth"];
        $person1 = $row['astroProfileName'];
        $maleChandranSubar = $row['isChandranSubar'];       
        $display .= "<tr><td style='text-wrap:pretty;'>" . $person1 . "</td></tr>";
        $display .= "<tr><td>" . $gender . "</td></tr>";
        $display .= "<tr><td>" . $dateOfBirth . ", ". $timeOfBirth . "</td></tr>";
        $display .= "<tr><td>" . $row['placeOfBirthCity'] . "<br/>" . $row['placeOfBirthState'] . "<br/>" . $row['placeOfBirthCountry'] . "</td></tr>";                    
    }

    $rasi = array();
    $colorNos = array();

    $query = "SELECT rasiID FROM ab12_positions_table WHERE astroProfileID=$astroProfileID";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)) {
            array_push($rasi, $row[0]);
        }
    }
            
    $rasiID = $rasi[2] - 1;
    $birthrasi1 = $rasiOptions[$rasiID][$rasiField];           

    $query = "SELECT revisedRasiIDsForRasiChart FROM ab12_positions_table WHERE revisedRasiIDsForRasiChart IS NOT NULL and astroProfileID=$astroProfileID";
    $result = mysqli_query($con,$query);
    $rows = mysqli_num_rows($result);
    
    if($rows > 0){      
        while($row = mysqli_fetch_array($result))
        {
            $colorNos = explode(",",$row["revisedRasiIDsForRasiChart"]);        
        }
    }
        
    $rasicount = count($rasi);
            
    $rasichart = '<div style="float:left;width:100%;"><div style="display:flex;margin-top:20px;justify-content:space-around;flex-wrap:wrap;"><div style="margin-bottom:10px;"><table id="mainrasichart" style="border-collapse: collapse;font-weight:bold;height:450px;">';

    $planetName = getPlanetNames(12, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[11]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(1, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[0]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(2, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[1]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(3, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[2]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(11, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[10]) . '">' . $planetName . '</td>';

    if ($genderType == "Male")
        $rasichart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['male'] . '<br/>' . $language['rasichart'] . '</td>';
    else
        $rasichart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['female'] . '<br/>' . $language['rasichart'] . '</td>';

    $planetName = getPlanetNames(4, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[3]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(10, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[9]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(5, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[4]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(9, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[8]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(8, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[7]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(7, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[6]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(6, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[5]) . '">' . $planetName . '</td></tr>';

    $rasichart .= '</table></div>';
                
    $navamsaRasi = array();
    $query = "SELECT navamsaRasiID FROM ab12_positions_table WHERE astroProfileID=$astroProfileID";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){      
        while ($row = mysqli_fetch_array($result)) {
            array_push($navamsaRasi, $row[0]);
        }
    }

    $colorNos = array(1,2,3,4,5,6,7,8,9,10,11,12);
    $lagnaID = $navamsaRasi[0];
    $total = (12 - $lagnaID) + 1;
    $boxNo = 1;
    $startNo = $lagnaID - 1;
    for($i=$startNo;$i<12;$i++)
    {
        $colorNos[$i] = $boxNo;
        $boxNo++;
    }

    $boxNo = 12;
    $balance = (12 - $total) - 1;
    for($i=$balance;$i>=0;$i--)
    {
        $colorNos[$i] = $boxNo;
        $boxNo--;
    }
                
    $rasicount = count($navamsaRasi);
        
    $navamsachart = '<div style="float:left;width:100%;"><div style="display:flex;margin-top:10px;justify-content:space-around;flex-wrap:wrap;"><div style="margin-bottom:10px;"><table id="mainnavamsachart" style="border-collapse: collapse;font-weight:bold;height:450px;font-size: 14px;font-family: maiandra gd;">';

    $planetName = getPlanetNames(12, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[11]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(1, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[0]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(2, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[1]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(3, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[2]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(11, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[10]) . '">' . $planetName . '</td>';

    if ($genderType == "Male")
        $navamsachart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['male'] . '<br/>' . $language['navamsachart'] . '</td>';
    else
        $navamsachart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['female'] . '<br/>' . $language['navamsachart'] . '</td>';

    $planetName = getPlanetNames(4, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[3]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(10, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[9]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(5, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[4]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(9, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[8]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(8, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[7]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(7, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[6]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(6, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: bluefont-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[5]) . '">' . $planetName . '</td></tr>';

    $navamsachart .= '</table></div>';
                
    $rasiName = "";

    $rasiID = $rasi[0] - 1;
    $rasiName = $rasiOptions[$rasiID][$rasiField];

    $query = "SELECT starID FROM ab12_positions_table WHERE astroProfileID=" . $astroProfileID ." AND planetID = 2";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        $records = mysqli_fetch_row($result);
    }

    $starID = $records[0] - 1;
    $mainUserStarID = $starID;

    $display2 .= "<tr><td>" . $starOptions[$starID][$starField] . " - " . $birthrasi1 . "</td></tr>";
    $display2 .= "<tr><td>" . $language['lagnam'] . " : " . $rasiName . "</td></tr>";

    $mainProfileTable .= $display . $display2 . "</table></div>";        
        
    //Allicance User Data
    $allianceProfileTable = "<div style='width: 45%;float:left;margin-left:10px;border:2px solid #02a698;border-radius:15px;'><table cellpadding='5' style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'>";
    $display = "";
    $display2 = "";
    $display3 = "";
    $display4 = "";
    $gender = "";
    $planetName = "";
    $activePlanets = "";
    $rasiName = "";

    $sql = "select astroProfileName,gender,dateOfBirth,TIME_FORMAT(timeOfBirth,'%h:%i %p') as `timeOfBirth`,placeOfBirthCity,placeOfBirthState,placeOfBirthCountry,isChandranSubar from ab15b_astroProfile_table where astroProfileID=".$allianceID;
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
                                        
        $genderType = $row['gender'];

        $tsql = "SELECT fn_translateList('ab15_userInfo_table','gender','".$genderType."','English','".$convertLang."',1)";
        $tResult = mysqli_query($con,$tsql);
        $tRow = mysqli_fetch_array($tResult);
        $gender = $tRow[0];                         

        $dateOfBirth = $row["dateOfBirth"];
        $date = DateTime::createFromFormat('Y-m-d', $dateOfBirth);
        $dateOfBirth = $date->format('d/m/Y');
        $timeOfBirth = $row["timeOfBirth"];
        $person2 = $row['astroProfileName'];
        $femaleChandranSubar = $row['isChandranSubar'];
        $display .= "<tr><td>" . $person2 . "</td></tr>";
        $display .= "<tr><td>" . $gender . "</td></tr>";
        $display .= "<tr><td>" . $dateOfBirth . ", " . $timeOfBirth . "</td></tr>";
        $display .= "<tr><td>" . $row['placeOfBirthCity'] . "<br/>" . $row['placeOfBirthState'] . "<br/>" . $row['placeOfBirthCountry'] . "</td></tr>";                    
    }

    $query = "SELECT starID FROM ab12_positions_table WHERE astroProfileID=$allianceID AND planetID=2";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){      
        $row = mysqli_fetch_array($result);
        $starID = $row[0] - 1;
    }
    
    $query = "SELECT factorID from qd3b_factorPriorities_table WHERE associatedDecisionID=" . $decisionId1 . " ORDER BY level1Priority";    
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    $table_uniqe_set = array();
    if ($rows > 0) {
        $positionTable = "<table style='border-collapse: collapse;color:maroon;font-weight:bold;width:99%;white-space:normal;font-size:1.5rem;text-align:center;'>";
        while ($row = mysqli_fetch_array($result)) {
            $tquery = "SELECT $factorField,assessmentPercentage FROM qd6_optionFactorMap_table AS `a`,qd3a_factors_table AS `b` WHERE b.factorID = a.factorID AND a.factorID = " . $row[0] . " AND a.associatedDecisionID=" . $decisionId1 ." limit 1;";
            $tresult = mysqli_query($con,$tquery);
            $trows = mysqli_num_rows($tresult);
            if($trows > 0){              
                while($trow = mysqli_fetch_array($tresult))
                {   
                    $uniqueKey = $trow[$factorField]; 
                    if (isset($table_uniqe_set[$uniqueKey])) {
                        continue;
                    }            

                    if($trow[1] >=0 && $trow[1] <=20)
                    {
                        $matchRemark = $language["nomatch"];
                    }
                    else if($trow[1] >=21 && $trow[1] <=35)
                    {
                        $matchRemark = $language["negligiblematch"];
                    }
                    else if($trow[1] >=36 && $trow[1] <=45)
                    {
                        $matchRemark = $language["lessmatch"];
                    }
                    else if($trow[1] >=46 && $trow[1] <=55)
                    {   
                        $matchRemark = $language["averagematch"];
                    }
                    else if($trow[1] >=56 && $trow[1] <=65)
                    {
                        $matchRemark = $language["aboveaveragematch"];
                    }
                    else if($trow[1] >=66 && $trow[1] <=75)
                    {    
                        $matchRemark = $language["goodmatch"];
                    }
                    else if($trow[1] >=76 && $trow[1] <=85)
                    {
                        $matchRemark = $language["bettermatch"];
                    }
                    else if($trow[1] >=86 && $trow[1] <=95)
                    {
                        $matchRemark = $language["bestmatch"];
                    }
                    else if($trow[1] >=96 && $trow[1] <=100)
                    {
                        $matchRemark = $language["perfectmatch"];
                    }
                    
                    $positionTable .= "<tr><td style='border-bottom: 1px solid #cccccc;'>" . $trow[0] . "</td><td style='border-bottom: 1px solid #cccccc;'>" . round($trow[1],0) . "%</td><td style='border-bottom: 1px solid #cccccc;'>" . $matchRemark . "</td></tr>";
                    $table_uniqe_set[$uniqueKey] = true;
                }
            }            
        }
        $positionTable .= "</table></div>";
    }
    
    // $positionTable = "";
    $secondTable = "<div style='width:100%;margin-top:20px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;font-size:22px;color:darkgreen;font-weight:bold;'>";
                    
    if($matchmethod == "10point")
        $secondTable .= $language['10point'];
    else
        $secondTable .= $language['36points'];

    $secondTable .= "</div><div style='text-align:center;margin-top:0px;border-left:2px solid #02a698;border-right:2px solid #02a698;width:100%;'>";
    $secondTable .= $positionTable;

    $resultTable = "<div style='width:100%;margin-top:0px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;color:deeppink;font-size:18px;font-weight:bold;padding-top:5px;'>";
                    
    if($matchmethod == "10point")
        $resultTable .= $language['10pointsummary'];
    else
        $resultTable .= $language['36pointsummary'];

    $resultTable .= " : <span style='color:deeppink;font-size:24px;'>" . round($overAllPercentage,1) . "%</span><br/>";
    $resultTable .= "</div>";

    $secondTable .= $resultTable;

    $rasi = array();
    $colorNos = array();

    $query = "SELECT rasiID FROM ab12_positions_table WHERE astroProfileID=$allianceID";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){      
        while ($row = mysqli_fetch_array($result)) {
            array_push($rasi, $row[0]);
        }
    }

    $rasiID = $rasi[2] - 1;
    $birthrasi2 = $rasiOptions[$rasiID][$rasiField];

    $rasiID = $rasi[0] - 1;
    $rasiName = $rasiOptions[$rasiID][$rasiField];        
                    
    $allianceUserStarID = $starID;

    $display2 .= "<tr><td>" . $starOptions[$starID][$starField] . " - " .  $birthrasi2 . "</td></tr>";
    $display2 .= "<tr><td>" . $language['lagnam'] . " : " . $rasiName . "</td></tr>";

    $allianceProfileTable .= $display . $display2 . "</table></div></div>";

    $query = "SELECT revisedRasiIDsForRasiChart FROM ab12_positions_table WHERE revisedRasiIDsForRasiChart IS NOT NULL AND astroProfileID=$allianceID";
    $result = mysqli_query($con,$query);
    $rows = mysqli_num_rows($result);
    if($rows > 0){      
        while($row = mysqli_fetch_array($result))
        {
            $colorNos = explode(",",$row["revisedRasiIDsForRasiChart"]);
        }
    }
            
    $rasicount = count($rasi);
                
    $rasichart .= '<div><table id="alliancerasichart" style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;">';

    $planetName = getPlanetNames(12, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[11]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(1, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[0]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(2, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[1]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(3, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[2]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(11, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[10]) . '">' . $planetName . '</td>';

    if ($genderType == "Male")
        $rasichart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['male'] . '<br/>' . $language['rasichart'] . '</td>';
    else
        $rasichart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['female'] . '<br/>' . $language['rasichart'] . '</td>';

    $planetName = getPlanetNames(4, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[3]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(10, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[9]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(5, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[4]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(9, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[8]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(8, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[7]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(7, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[6]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(6, $rasicount, $rasi, $lang, $planetOptions);
    $rasichart .= '<td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[5]) . '">' . $planetName . '</td></tr>';

    $rasichart .= '</table></div></div></div>';                

    $navamsaRasi = array();
    $query = "SELECT navamsaRasiID FROM ab12_positions_table WHERE astroProfileID=$allianceID";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){      
        while ($row = mysqli_fetch_array($result)) {
            array_push($navamsaRasi, $row[0]);
        }
    }

    $colorNos = array(1,2,3,4,5,6,7,8,9,10,11,12);
    $lagnaID = $navamsaRasi[0];
    $total = (12 - $lagnaID) + 1;
    $boxNo = 1;
    $startNo = $lagnaID - 1;
    for($i=$startNo;$i<12;$i++)
    {
        $colorNos[$i] = $boxNo;
        $boxNo++;
    }

    $boxNo = 12;
    $balance = (12 - $total) - 1;
    for($i=$balance;$i>=0;$i--)
    {
        $colorNos[$i] = $boxNo;
        $boxNo--;
    }
                    
    $rasicount = count($navamsaRasi);
            
    $navamsachart .= '<div><table id="alliancenavamsachart" style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;">';

    $planetName = getPlanetNames(12, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[11]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(1, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[0]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(2, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[1]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(3, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[2]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(11, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[10]) . '">' . $planetName . '</td>';

    if ($genderType == "Male")
        $navamsachart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['male'] . '<br/>' . $language['navamsachart'] . '</td>';
    else
        $navamsachart .= '<td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">' . $language['female'] . '<br/>' . $language['navamsachart'] . '</td>';

    $planetName = getPlanetNames(4, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[3]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(10, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[9]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(5, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[4]) . '">' . $planetName . '</td></tr>';
    $planetName = getPlanetNames(9, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[8]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(8, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[7]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(7, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[6]) . '">' . $planetName . '</td>';
    $planetName = getPlanetNames(6, $rasicount, $navamsaRasi, $lang, $planetOptions);
    $navamsachart .= '<td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden;' . applyRasiBoxStyle($colorNos[5]) . '">' . $planetName . '</td></tr>';

    $navamsachart .= '</table></div></div></div>';
                
    $header = '';

    $houses = '<div class="col-lg-12 text-center"><img src="'.$housetable.'" style="object-fit: cover;padding-top:50px;padding-bottom:40px;" /></div>';
                                       
    $resultContent = $resultstart . $mainProfileTable . $allianceProfileTable . $secondTable . "<br/>" . $rasichart . $houses . $navamsachart;

    $buyLink = "horoscopeConfirmation.php?mainProfileId=" . $astroProfileID . "&allianceProfileId=" . $allianceID . "&decisionID1=" . $decisionId1 . "&decisionID2=" . $decisionId2 . "&matchMethod=complete&matchID=" . $savedMatchID;
    
    mysqli_close($con);

    echo $resultContent;
}

@endphp
</div>
</div>
<div class="row m-5">
<p class="mb-4">{!! __('messages.salespara1') !!}</p>
<p class="mb-4">{!! __('messages.salespara2') !!}</p>
<p class="mb-4">{!! __('messages.salespara3') !!}</p>
<p class="mb-4">{!! __('messages.salespara4') !!}</p>
<p class="mb-4">{!! __('messages.salespara5') !!}</p>
<p class="mb-4">{!! __('messages.salespara6') !!}</p>
</div>
<div class="row m-5">
                <div class="pricing-table table-1">
                    <div class="ptable-item featured-item">
                        <div class="ptable-single">
                            <div class="ptable-header">                                
                              <a href="#" onclick="showPaymentwidget()">
                                <div class="ptable-title">
                                    <h2>{!! __('messages.matchbutton') !!}</h2>
                                </div>
                                <div class="ptable-price">
                                    <h2><small>₹</small>599 <span class="strikethrough">₹1,000</span><span> <span> + GST</span></h2>
                                    <span class="price-note"><i>{!! __('messages.reportprice') !!}</i></span>
                                </div>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>{!! __('messages.foryou') !!}</h3>
                <p class="mb-4">{!! __('messages.nchomehead2') !!}</p>
                <div class="content-section">
                    <span class="underline"></span>
                    <span class="short-underline"></span>
                </div>
                <p class="mb-4">{!! __('messages.nchomepara2') !!}</p>
                <iframe src="sample-reports/New Alliance Match Making Report.pdf" width="100%" height="750px" style="border: none;"></iframe>
                <div class="mt-3">
                    <h3>{!! __('messages.nchomehead1') !!}</h3>
                    <p class="mb-4">{!! __('messages.nchomepara1') !!}</p>
        
                    <div class="macth-payment">
                        <a href="#" class="btn btn-mat mb-1 mt-3 btn-sm" onclick="showPaymentwidget()">{!! __('messages.buybutton') !!}</a>
                        <span class="buynow-note">{!! __('messages.buynote') !!}</span>
                    </div>
                </div>   
</div>
<!-- <div class="row m-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 my-2 text-center"><button onclick="showPaymentwidget()" class="btn btn-mat">Get a preminum report now!</button></div>
    <div class="col-md-4"></div>      
</div> -->
<div class="row mx-5">
    <div class="col-sm-12 col-md-6 col-lg-4">
    <button name="btnDownload" class="btn btn-mat report-btns" onclick="downloadReport();">
        <i class="fa fa-download"></i> {{__('messages.download')}}
    </button>
    </div>          
    <div class="col-sm-12 col-md-6 col-lg-4">
        <button name="btnSendMail" class="btn btn-mat report-btns" onclick="sendMail();">
        <i class="fa fa-envelope"></i> {{__('messages.sendmail')}}
        </button>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <button name="btnSendWhatsApp" class="btn btn-mat report-btns" onclick="sendWhatsApp();">
        <i class="fab fa-whatsapp"></i> {{__('messages.sendwhatsapp')}}
        </button>
    </div>          
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    async function downloadReport() {
        Swal.fire({
            title: "Downloading your Report",
            text: "Standard Match Making Report",
            icon: "success"
        });
        var element = document.getElementById('pdf-print');
        var opt = {
            margin:       0.5,
            filename:     'Standard Match Making Report.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { dpi: 192, letterRendering: true },
            jsPDF:        { unit: 'in', format: [11, 16], orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    }

    async function sendMail() {
        Swal.fire({
            title: "Mail sent to your inbox",
            text: "Standard Match Making Report!",
            icon: "success"
        });
    }

    function sendMail(){}

    function sendWhatsApp(){}

    function showPaymentwidget(){
        Swal.fire({
            title: 'Redirecting you to Complete Report',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Show built-in loader
            }
        });

         window.location.href = '/premimum/intent';
    }
    </script>

@endsection
