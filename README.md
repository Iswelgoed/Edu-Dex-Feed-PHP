<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu-Dex-Feed-PHP</title>
</head>

<body>

    <h1>Edu-Dex-Feed-PHP</h1>

    <p>Welcome to the Edu-Dex-Feed-PHP repository! This PHP script is designed to parse XML data supplied by Edudex, containing detailed course information. It allows for the dynamic generation of a course planning with various customizable options.</p>

    <h2>Overview</h2>

    <p>This script offers a range of functionalities, including:</p>

    <ul>
        <li>Filtering courses by language (nl, en, de).</li>
        <li>Concealing past dates.</li>
        <li>Specifying the number of sessions for a course.</li>
        <li>Defining time slots for morning, afternoon, and evening.</li>
        <li>Combining time slots to display accurate start and end times.</li>
    </ul>

    <h2>How it Works</h2>

    <ol>
        <li><strong>User Input:</strong> Configure the script's behavior using variables at the top, allowing for customization of language, hiding past dates, sessions count, and time zone.</li>
        <li><strong>XML Data Handling:</strong> The script loads XML data supplied by Edudex, which contains comprehensive course details. It iterates through programs and program runs to extract pertinent information.</li>
        <li><strong>Filters and Conversions:</strong> The script applies filters like hiding past dates and converting contact hours part of day into a human-readable format.</li>
        <li><strong>HTML Output:</strong> Data is formatted into HTML cards, presenting details about each course.</li>
        <li><strong>Sorting (Optional):</strong> Courses can be sorted by start date, providing additional flexibility.</li>
    </ol>

    <h2>Usage</h2>

    <ol>
        <li>Customize options (language, hidePastDates, numberOfSessions, timeZone, and courseName) at the beginning of the script.</li>
        <li>Ensure the XML data is accessible and properly formatted.</li>
        <li>Execute the script in a PHP environment.</li>
    </ol>

    <h2>Customization</h2>

    <ul>
        <li>Modify time slots and their corresponding start and end times in the <code>$times</code> array.</li>
        <li>Tailor the HTML output section to suit specific layout preferences.</li>
    </ul>

    <h2>Contributing</h2>

    <p>We encourage contributions to this repository, whether through issue reports or pull requests. Your feedback and contributions are highly valued!</p>

</body>

</html>
