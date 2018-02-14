<?php
//Input Field Variables
$fName = '';
$lName = '';
$email = '';
$feedback = 'General';
$comment = '';
$rating = 0;
$flag = true;

//Error Field Variables
$err_fName = '';
$err_lName = '';
$err_email = '';
$err_rating = '';
$err_comment = '';

//Class Fields
$mainFormClass = 'show';
$processFormClass = 'hide';

//Display Fields
$out_name = '';
$out_email = '';
$out_rating = '';
$out_feedback = '';
$out_comment = '';

//Arrays
$categories = ["General", "Suggestion", "Compliment"];

if (isset($_POST['submit'])) {

    // First Name Validation
    if (isEmpty($_POST['fName'])) {
        $err_fName = 'Please provide your first name';
        $flag = false;
    } else if (hasNum($_POST['fName'])) {
        $err_fName = 'Please provide a valid first name';
        $flag = false;
    } else if (tooLong($_POST['fName'], 50)) {
        $err_fName = 'This field can\'t be longer than 50 characters';
        $flag = false;
    } else {
        $fName = trim($_POST['fName']);
    }

    // Last Name Validation
    if (isEmpty($_POST['lName'])) {
        $err_lName = 'Please provide your last name';
        $flag = false;
    } else if (hasNum($_POST['lName'])) {
        $err_lName = 'Please provide a valid last name';
        $flag = false;
    } else if (tooLong($_POST['lName'], 50)) {
        $err_lName = 'This field can\'t be longer than 50 characters';
        $flag = false;
    } else {
        $lName = trim($_POST['lName']);
    }

    //Email Validation
    if (isEmpty($_POST['email'])) {
        $err_email = 'Please provide your email address';
        $flag = false;
    } else if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $err_email = 'Please provide a valid email address';
        $flag = false;
    } else {
        $email = trim($_POST['email']);
    }

    //Rating Validation
    if (!isset($_POST['rating'])) {
        $err_rating = 'Please give us a rating';
        $flag = false;
    } else {
        $rating = $_POST['rating'];
    }

    //Feedback No Validation
    $feedback = trim($_POST['feedback']);

    //Comment Validation
    if (strlen(trim($_POST['comment'])) > 1000) {
        $err_comment = 'This field can\'t be longer than 1000 characters';
        $flag = false;
    } else {
        $comment = trim($_POST['comment']);
    }

    //Brings up process page
    if ($flag) {
        //Update Display Fields
        $out_name = $_POST['fName'] . " " . $_POST['lName'];
        $out_email = $_POST['email'];
        $out_rating = $rating;
        $out_feedback = $_POST['feedback'];
        $out_comment = $_POST['comment'];

        //Switch to processed page
        $mainFormClass = 'hide';
        $processFormClass = 'show';
    }
}

//Populates drop down list
function dropdownList()
{
    $categories = $GLOBALS['categories'];
    $feedback = $GLOBALS['feedback'];
    foreach ($categories as $c) {
        echo "<option value='$c'" . ($feedback == $c ? 'selected' : '') . " > $c </option>";
    }
}

// - - - Validation Functions - - -

//Validate - Empty Field
function isEmpty($value)
{
    if (trim($value) == '') {
        return true;
    }
    return false;
}

//Validate - Has Numbers
function hasNum($value)
{
    $pattern = '/[0-9]/';
    if (preg_match($pattern, $value)) {
        return true;
    }
    return false;
}

//Validate - Too Long
function tooLong($value, $length)
{
    if (strlen(trim($value)) > $length) {
        return true;
    }
    return false;
}

?>


<main id="main">
    <div class="wrap">
        <div class="<?= htmlspecialchars($mainFormClass) ?>">
            <form id="mainForm" name="mainForm" action="index.php" method="post">
                <h2>Your Feedback</h2>
                <div class="mainForm__bar"></div>
                <p>We would like your feedback to improve our website.</p>
                <p>What is your rating of this page?</p>

                <!-- RATING -->
                <div id="mainForm__ratingsBlock">
                    <input type="radio" name="rating" id="rad1" class="hide"
                           value="1" <?= ($rating == 1) || ($rating == 2) || ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('checked') : (''); ?>>
                    <label for="rad1"><img id="ratingBlock__rating1" class="ratingsBlock__star" title="star icon"
                                           alt="1 Star"
                                           src="images/<?= ($rating == 1) || ($rating == 2) || ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('star') : ('starBlank'); ?>.png"></a>
                    </label>
                    <input type="radio" name="rating" id="rad2" class="hide"
                           value="2" <?= ($rating == 2) || ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('checked') : (''); ?>>
                    <label for="rad2"><img id="ratingBlock__rating2" class="ratingsBlock__star" title="star icon"
                                           alt="2 Star"
                                           src="images/<?= ($rating == 2) || ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('star') : ('starBlank'); ?>.png"></label>
                    <input type="radio" name="rating" id="rad3" class="hide"
                           value="3" <?= ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('checked') : (''); ?>>
                    <label for="rad3"><img id="ratingBlock__rating3" class="ratingsBlock__star" title="star icon"
                                           alt="3 Star"
                                           src="images/<?= ($rating == 3) || ($rating == 4) || ($rating == 5) ? ('star') : ('starBlank'); ?>.png"></label>
                    <input type="radio" name="rating" id="rad4" class="hide"
                           value="4" <?= ($rating == 4) || ($rating == 5) ? ('checked') : (''); ?>>
                    <label for="rad4"><img id="ratingBlock__rating4" class="ratingsBlock__star" title="star icon"
                                           alt="4 Star"
                                           src="images/<?= ($rating == 4) || ($rating == 5) ? ('star') : ('starBlank'); ?>.png"></label>
                    <input type="radio" name="rating" id="rad5" class="hide"
                           value="5" <?= ($rating == 5) ? ('checked') : (''); ?>>
                    <label for="rad5"><img id="ratingBlock__rating5" class="ratingsBlock__star" title="star icon"
                                           alt="5 Star"
                                           src="images/<?= ($rating == 5) ? ('star') : ('starBlank'); ?>.png"></label>
                </div>

                <label id="mainForm__error_rating"
                       class="inputFields__error center"><?= htmlspecialchars($err_rating) ?></label>

                <div class="mainForm__bar"></div>

                <!-- INPUT FIELDS -->
                <div id="mainForm__inputFields">
                    <div id="inputFields__topBlock">
                        <!-- FIRST NAME -->
                        <label id="mainForm__lbl_fName" class="inputFields__label">First Name</label>
                        <input id="inputFields__txt_fName" class="inputFields__input" name="fName"
                               value="<?= htmlspecialchars($fName) ?>"
                               type="text">
                        <label id="mainForm__error_fName"
                               class="inputFields__error"><?= htmlspecialchars($err_fName) ?></label>
                        <!-- LAST NAME -->
                        <label id="mainForm__lbl_lName" class="inputFields__label">Last Name</label>
                        <input id="inputFields__txt_lName" class="inputFields__input" name="lName"
                               value="<?= htmlspecialchars($lName) ?>"
                               type="text">
                        <label id="mainForm__error_lName"
                               class="inputFields__error"><?= htmlspecialchars($err_lName) ?></label>
                        <!-- EMAIL -->
                        <label id="mainForm__lbl_email" class="inputFields__label">Email Address</label>
                        <input id="inputFields__txt_email" class="inputFields__input" name="email"
                               value="<?= htmlspecialchars($email) ?>"
                               type="text">
                        <label id="mainForm__error_email"
                               class="inputFields__error"><?= htmlspecialchars($err_email) ?></label>
                        <!-- CATEGORY -->
                        <label id="mainForm__lbl_category" class="inputFields__label">Type of feedback</label>
                        <select id="mainForm__rad_category" class="inputFields__input" name="feedback">
                            <?php dropdownList() ?>
                        </select>
                    </div>
                    <div id="inputFields__bottomBlock">
                        <!-- COMMENT -->
                        <label id="mainForm__lbl_comment" class="inputFields__label">Comment</label>
                        <textarea id="inputFields__txt_comment" class="inputFields__input"
                                  name="comment"><?= htmlspecialchars($comment) ?></textarea>
                        <label id="mainForm__error_comment"
                               class="inputFields__error"><?= htmlspecialchars($err_comment) ?></label>
                        <input id="inputFields__submit" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <div id="processForm" class="<?= htmlspecialchars($processFormClass) ?>">
            <h2>Thank you!</h2>
            <div class="mainForm__bar"></div>
            <p>We appreciate your feedback.</p>
            <div class="mainForm__bar"></div>
            <div id="proccessForm_feedback">
                <p>Name: <?= htmlspecialchars($out_name) ?></p>
                <p>Email: <?= htmlspecialchars($out_email) ?></p>
                <p>Rating: <?= htmlspecialchars($out_rating) ?>/5</p>
                <p>Type of Feedback: <?= htmlspecialchars($out_feedback) ?></p>
                <p>Comment: <?= htmlspecialchars($out_comment) ?></p>
            </div>
        </div>
    </div>
</main>