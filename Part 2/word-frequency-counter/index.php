<?php
$commonWords = ['the', 'and', 'in', 'of', 'to', 'a', 'is', 'it', 'for', 'on', 'with', 'as', 'that', 'at', 'by', 'this', 'from'];

function calculateFrequency($userInput, $commonWords) {
    $userInput = strtolower($userInput);
    $userInput = preg_replace('/[^a-z\s]/', '', $userInput);
    $wordList = explode(" ", $userInput);
    $wordList = array_filter($wordList, function($word) use ($commonWords) {
        return !in_array($word, $commonWords) && !empty($word);
    });
    $frequencyList = array_count_values($wordList);
    return $frequencyList;
}

function arrangeWords($frequencyList, $orderType) {
    if ($orderType === 'desc') {
        arsort($frequencyList);
    } else {
        asort($frequencyList);
    }
    return $frequencyList;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textInput = $_POST['text'] ?? '';
    $sortOrder = $_POST['sort'] ?? 'desc';
    $wordLimit = $_POST['limit'] ?? 10;

    if (empty($textInput)) {
        echo "<p style='color:red;'>Error: Please enter some text.</p>";
    } else {
        $wordFrequency = calculateFrequency($textInput, $commonWords);
        $sortedWords = arrangeWords($wordFrequency, $sortOrder);
        $sortedWords = array_slice($sortedWords, 0, $wordLimit, true);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Word Frequency Counter</h1>
    <form action="" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc" selected>Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>
    
    <?php if (!empty($sortedWords)) : ?>
        <h2>Word Frequency Results</h2>
        <table border="1">
            <tr>
                <th>Word</th>
                <th>Frequency</th>
            </tr>
            <?php foreach ($sortedWords as $word => $count) : ?>
                <tr>
                    <td><?= htmlspecialchars($word) ?></td>
                    <td><?= $count ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>