<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
        -primary meta tags 
    -->

    <title><?= $name ?> - Personal Blog Website</title>
    <meta name="title" content="<?= $name ?> - Personal Blog Website">
    <meta name="description" content="This is a blog about life in Russia made by me">

    <!-- 
        -favicon 
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
        -google font link 
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- 
        -custom css link 
    -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- preload images -->
    <link rel="preload" as="image" href="assets/images/hero-banner.png">
    <link rel="preload" as="image" href="assets/images/pattern-2.svg">
    <link rel="preload" as="image" href="assets/images/pattern-3.svg">

</head>

<body id="top" style="font-size: 20px; margin: 0 auto; padding: 20px">

<?php 

function make_excerpt($text, $limit = 50) {
// Case 1: text is already short enough - return it untouched
    if ( strlen($text) <= $limit ) {
        return $text;
    }

// Case 2 and 3: here the text is too long

// find a space within $limit
$space_pos = strrpos( substr( $text, 0, $limit ), " " );


// Case 2: a space was found: cut cleanly at that space
if ( $space_pos !== false ) {
    return substr( $text, 0, $space_pos). "...";
}

// Case 3: a space wasn't found, cut at limit with ...
return substr($text, 0, $limit). "...";
} 

$text = "Di scov er useful tips and practical strategies for";

/****
 * Test: Text shorter than limit
Input: Discover useful tips
Limit: 50
Expected result: Discover useful tips
Actual result: Discover useful tips
Pass/Fail: Pass
*/
echo make_excerpt($text, 20).'<br>';
echo strlen(make_excerpt($text, 20));


/****
 * Test: Text exactly $limit
Input: Discover useful tips Discover useful tips ffffffff
Limit: 50
Expected result: Discover useful tips Discover useful tips ffffffff
Actual result: Discover useful tips Discover useful tips ffffffff
Pass/Fail: Pass
*/

/****
 * Test: Text exactly $limit
Input: Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.
Limit: 50
Expected result: Discover useful tips and practical strategies for...
Actual result: Discover useful tips and practical strategies for...
Pass/Fail: Pass
*/


/****
 * Test: Normal long test
Input: Discover useful tips Discover useful tips ffffffff
Limit: 50
Expected result: Discover useful tips Discover useful tips ffffffff
Actual result: Discover useful tips Discover useful tips ffffffff
Pass/Fail: Pass
*/

/****
 * Test: Long text where the last space occurs before the limit
Input: Discover useful tips and practical strategies for...
Limit: 50
Expected result: Discover useful tips and practical strategies...
Actual result: Discover useful tips and practical strategies...
Pass/Fail: Pass

Test: A long string containing no spaces
Input: Discoverusefultipsandpracticalstrategiesforadshdahjdkjsajasshja
Limit: 50
Excepted result Discoverusefultipsandpracticalstrategiesforadshdah...
Actual result: Discoverusefultipsandpracticalstrategiesforadshdah...
Pass/Fail: Pass

Test: Empty string
Input: ""
Limit: 50
Excepted result "" (empty string)
Actual result: ""  (empty string)
Pass/Fail: Pass


Test: Very small limit
Input: Discover useful tips and practical strategies for
Limit: 5
Excepted result "Disco..." 
Actual result: "Disco..." 
Pass/Fail: Pass


Test: Multiple spaces
Input: Di scov er useful tips and practical strategies for
Limit: 20
Excepted result "Di scov er useful..." 
Actual result: "Di scov er useful..." 
Pass/Fail: Pass
*/











?>




</body>


</html>