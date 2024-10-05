<?php
require('../Course/fpdf/fpdf.php');
include("../Includes/Database Connection/database_connection.php");

$clicked_course = 1; // Get from previous page

// Fetch course info
$sql = "SELECT course_title, c.description, c.playlist_link FROM `course` as c WHERE c.course_id = $clicked_course;";
$resultantLabel = mysqli_query($conn, $sql);
$course_info = mysqli_fetch_all($resultantLabel)[0];

$playlistID = $course_info[2];
$apiKey = "AIzaSyBm4S9TTRDo8Loo3xpFkm9ihwYRjOrSl7c";  // Replace with your YouTube API Key

function getVideoInfoFromPlaylist($playlistID, $apiKey)
{
    $videoInfo = [];
    $nextPageToken = '';

    do {
        $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId={$playlistID}&pageToken={$nextPageToken}&key={$apiKey}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $videoTitle = $item['snippet']['title'];
                $videoId = $item['snippet']['resourceId']['videoId'];
                $videoLink = "https://www.youtube.com/watch?v={$videoId}";
                $videoInfo[] = ['name' => $videoTitle, 'link' => $videoLink];
            }
        }
        $nextPageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : '';
    } while ($nextPageToken);

    return $videoInfo;
}

$allVideos = getVideoInfoFromPlaylist($playlistID, $apiKey);

// Initialize PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Add Title
$pdf->Cell(0, 10, 'Course Outline: ' . $course_info[0], 0, 1, 'C');
$pdf->Ln(10);

// Add table headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(90, 10, 'Video Title', 1, 0, 'C');
$pdf->Cell(90, 10, 'Video Link', 1, 1, 'C');

// Add data rows
$pdf->SetFont('Arial', '', 10);
foreach ($allVideos as $oneClass) {
    $pdf->Cell(90, 10, $oneClass['name'], 1, 0, 'C');
    $pdf->Cell(90, 10, $oneClass['link'], 1, 1, 'C');
}

// Output PDF
$pdf->Output('D', 'Course Outline.pdf');

mysqli_free_result($resultantLabel);
mysqli_close($conn);
