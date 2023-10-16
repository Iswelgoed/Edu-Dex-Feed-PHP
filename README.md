# Edu-Dex-Feed-PHP

Welcome to the Edu-Dex-Feed-PHP repository! This PHP script is designed to parse XML data supplied by Edudex, containing detailed course information. It allows for the dynamic generation of a course planning with various customizable options.

## Overview

This script offers a range of functionalities, including:

- Filtering courses by language (nl, en, de).
- Concealing past dates.
- Specifying the number of sessions for a course.
- Defining time slots for morning, afternoon, and evening.
- Combining time slots to display accurate start and end times.

## How it Works

1. **User Input**: Configure the script's behavior using variables at the top, allowing for customization of language, hiding past dates, sessions count, and time zone.

2. **XML Data Handling**: The script loads XML data supplied by Edudex, which contains comprehensive course details. It iterates through programs and program runs to extract pertinent information.

3. **Filters and Conversions**: The script applies filters like hiding past dates and converting contact hours part of day into a human-readable format.

4. **HTML Output**: Data is formatted into HTML cards, presenting details about each course.

5. **Sorting (Optional)**: Courses can be sorted by start date, providing additional flexibility.

## Usage

1. Customize options (language, hidePastDates, numberOfSessions, timeZone, and courseName) at the beginning of the script.
2. Ensure the XML data is accessible and properly formatted.
3. Execute the script in a PHP environment.

## Customization

- Modify time slots and their corresponding start and end times in the `$times` array.
- Tailor the HTML output section to suit specific layout preferences.

## Contributing

We encourage contributions to this repository, whether through issue reports or pull requests. Your feedback and contributions are highly valued!
