<?php
// Variables from user input
$language = "nl"; // Default to Dutch (you can change this based on user input)
$hidePastDates = true; // true or false
$numberOfSessions = 10; // Example number
$timeZone = "Europe/Amsterdam"; // Example time zone
$courseName = "Programming"; //example course name

// Define user-selected time slots
$selectedTimeSlots = ['morning', 'afternoon', 'evening'];

// Define time slots
$times = [
    'morning' => ['start' => '08:00', 'end' => '12:00'],
    'afternoon' => ['start' => '12:00', 'end' => '16:00'],
    'evening' => ['start' => '16:00', 'end' => '20:00'],
];

// Define custom comparison function 
if (!function_exists('compareStartDate'))   {	
function compareStartDate($a, $b) {
    return strtotime($a['startDate']) - strtotime($b['startDate']);
}
}

// Load the XML file
$xml = simplexml_load_file('YOUR_XML_FILE_URL_HERE'); // Replace with your XML file URL

?>

<h3><?= $courseName ?></h3>

<?php

// Initialize an array to store course data
$courses = [];

// Loop through programs
foreach ($xml->program as $program) {
    // Check if programName starts with "$courseName"
    if (strpos($program->programDescriptions->programName, $courseName) === 0) {
        // Loop through programRuns
        foreach ($program->programSchedule->programRun as $programRun) {
            // Extract variables
            $status = $programRun->status;
            $startDate = new DateTime($programRun->startDate);
            $endDate = new DateTime($programRun->endDate);

            if (empty($stardate)) {
                continue;
            }

            $contactHoursPartOfDays = [];

            foreach ($programRun->contactHoursPartOfDay as $partOfDay) {
                $contactHoursPartOfDays[] = (string)$partOfDay;
            }

            $contactHoursPartOfDay = implode(', ', $contactHoursPartOfDays);

            $locationName = null;

            foreach ($programRun->location->locationName as $location) {
                if ($location->attributes('xml', true)->lang == $language) {
                    $locationName = (string)$location;
                    break;
                }
            }

            $country = $programRun->location->country;
            $numberOfContactSessions = $programRun->numberOfContactSessions;

            // Apply filters
            if ($hidePastDates && $startDate < new DateTime()) {
                continue; // Skip past dates
            }

            // Apply other filters as needed (e.g., number of sessions)

            // Convert and adjust time zones
            $startDate->setTimezone(new DateTimeZone($timeZone));
            $endDate->setTimezone(new DateTimeZone($timeZone));

            //Convert the given text into a start and end-time for each of the courses)
            $selectedTimes = $contactHoursPartOfDays;

            $start = null;
            $end = null;
            $i = 0;

            foreach ($selectedTimes as $selectedTime) {
                $i++;
                if (isset($times[$selectedTime])) {
                    if ($start === null || $times[$selectedTime]['start'] > $start) {
                        $start = $times[$selectedTime]['start'];
                    }
                    if ($end === null || $times[$selectedTime]['end'] > $end) {
                        $end = $times[$selectedTime]['end'];
                    }
                }
            }

            // Add course data to the $courses array
            $courses[] = [
                'locationName' => $locationName,
                'startDate' => $startDate->format('d-m-Y'),
                'endDate' => $endDate->format('d-m-Y'),
                'start' => $start,
                'end' => $end,
                'numberOfSessions' => $numberOfSessions/$i
            ];
        }
    }
}

// Sort the array by start date
usort($courses, 'compareStartDate');

?>

<table style="width:100%">
<tbody>
<tr>
    <th style="text-align: left; width:33%"><?= 'Location' ?></th>
    <th style="text-align: left; width:33%"><?= 'Start date' ?></th>
    <th style="text-align: left; width:33%"><?= 'Course hours' ?></th>
</tr>

<?php 
// Loop through sorted courses to generate HTML
foreach ($courses as $course) {
    ?>
    <tr>
        <td><?= $course['locationName'] ?></td> 
        <td><?= $course['startDate'] ?></td> 
        <td><?= $course['start'] ?> : <?= $course['end'] ?> CET</td> 
    </tr>
    <?php
}
?>
</tbody>
</table>
