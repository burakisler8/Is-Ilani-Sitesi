<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentsFile = 'comments.json';
    $company_name = $_POST['company_name'];
    $review = $_POST['review'];

    $newComment = array(
        'company_name' => $company_name,
        'review' => $review
    );

    if (file_exists($commentsFile)) {
        $comments = json_decode(file_get_contents($commentsFile), true);
    } else {
        $comments = array();
    }

    $comments[] = $newComment;
    file_put_contents($commentsFile, json_encode($comments));

    echo json_encode($newComment);
}
?>
