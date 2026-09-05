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

function make_excerpt($input, $limit = 50) {
// Case 1: text is already short enough - return it untouched
        if ( strlen($input) <= $limit ) {
        return $input;
    }

// Case 2 and 3: here the text is too long

// find a space within $limit
$space_pos = strrpos( substr( $input, 0, $limit ), " " );


// Case 2: a space was found: cut cleanly at that space
if ( $space_pos !== false ) {
    return substr( $input, 0, $space_pos). "...";
}

// Case 3: a space wasn't found, cut at limit with ...
return substr($input, 0, $limit). "...";
} 







function test_make_excerpt($test_name, $input, $expected, $limit = 50)  {

    $actual = make_excerpt($input, $limit);

    if ($actual === $expected) {
        echo "PASS: $test_name<br>";
    } else {
        echo "FAIL: $test_name<br>";
        echo "EXPECTED: $expected<br>";
        echo "ACTUAL: $actual<br>";
    }
}

// test_make_excerpt()

/****
 * Test: Text shorter than limit
Input: Discover useful tips
Limit: 50
Expected result: Discover useful tips
Actual result: Discover useful tips
Pass/Fail: Pass
*/
test_make_excerpt("shorter_than_limit","Discover useful tips", "Discover useful tips", 50);


/****
 * Test: Text exactly $limit
Input: Discover useful tips Discover useful tips ffffffff
Limit: 50
Expected result: Discover useful tips Discover useful tips ffffffff
Actual result: Discover useful tips Discover useful tips ffffffff
Pass/Fail: Pass
*/
$input = "Discover useful tips Discover useful tips ffffffff";
$limit = 20;
if ( strlen($input) === $limit) {
    echo "Input length test: PASS";
} else {
    echo "Input length test: FAIL";
    echo "Input length: ".strlen($input)."";
    echo "Expected length: $limit";
}


test_make_excerpt("exact limit",$input, $input, $limit );

/****
 * Test: Normal long test
Input: Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.
Limit: 50
Expected result: Discover useful tips and practical strategies for...
Actual result: Discover useful tips and practical strategies for...
Pass/Fail: Pass
*/

test_make_excerpt("normal long text", "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.","Discover useful tips and practical strategies for...", 50 );


/****
 * Test: Long text where the last space occurs before the limit
Input: Discover useful tips and practical strategies for...
Limit: 50
Expected result: Discover useful tips and practical strategies...
Actual result: Discover useful tips and practical strategies...
Pass/Fail: Pass
*/

test_make_excerpt("long test where last space occurs before the limit","Discover useful tips and practical strategies for...", "Discover useful tips and practical strategies...", 50 );

/***
Test: A long string containing no spaces
Input: Discoverusefultipsandpracticalstrategiesforadshdahjdkjsajasshja
Limit: 50
Excepted result Discoverusefultipsandpracticalstrategiesforadshdah...
Actual result: Discoverusefultipsandpracticalstrategiesforadshdah...
Pass/Fail: Pass
*/

test_make_excerpt("long string without spaces","Discoverusefultipsandpracticalstrategiesforadshdahjdkjsajasshja", "Discoverusefultipsandpracticalstrategiesforadshdah...", 50 );

/**

Test: Empty string
Input: ""
Limit: 50
Excepted result "" (empty string)
Actual result: ""  (empty string)
Pass/Fail: Pass
*/

test_make_excerpt( "empty string","","", 50 );

/*

Test: Very small limit
Input: Discover useful tips and practical strategies for
Limit: 5
Excepted result "Disco..." 
Actual result: "Disco..." 
Pass/Fail: Pass
*/


test_make_excerpt("very small limit","Discover useful tips and practical strategies for","Disco...", 5 );

/*

Test: Multiple spaces
Input: Di scov er useful tips and practical strategies for
Limit: 20
Excepted result "Di scov er useful..." 
Actual result: "Di scov er useful..." 
Pass/Fail: Pass
*/

test_make_excerpt("multiple spaces", "Di scov er useful tips and practical strategies for","Di scov er useful...", 20);
?>




</body>


</html>