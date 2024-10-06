<?php
include('../Includes/Navbar/navbarMain.php');
include("../Includes/Database Connection/database_connection.php");

$course_id = isset($_GET['course_id']) ? htmlspecialchars($_GET['course_id']) : '1';; // from another page 

$sql = "SELECT course.*,   
              user_info.first_name, user_info.last_name       -- index : 13 14
        FROM course 
        INNER JOIN user_info ON user_info.id = course.instructor_id  
        WHERE course.course_id = $course_id;";


$resultantLabel = mysqli_query($conn, $sql);
$course_info = mysqli_fetch_assoc($resultantLabel);

//-------------------------------- FOR What You Will Learn section 

$points = explode('__COOKCORNER__', $course_info['What_You_Will_Learn']);
$points = array_map('trim', $points);

//-------------------------------- FOR Course Highlights

$sql = "SELECT COUNT(*) 
        FROM `course` as c 
        INNER JOIN
        junction_course_taken_user as ntb
        ON 
        c.course_id = ntb.course_id
        WHERE c.course_id = 1;";

$resultantLabel = mysqli_query($conn, $sql);
$courseTaken = mysqli_fetch_assoc($resultantLabel)['COUNT(*)'];
$courseTaken += 100;  // added extra 100



//-------------------------------------------------- FOR Video Play ----------------------------------------

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

                $videoInfo[] = [
                    'name' => $videoTitle,
                    'link' => $videoLink
                ];
            }
        }
        $nextPageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : '';
    } while ($nextPageToken);

    return $videoInfo;
}

$apiKey = 'AIzaSyBm4S9TTRDo8Loo3xpFkm9ihwYRjOrSl7c'; //----> API Key Tashin  [HAHAHHAHHAHAHHAHHAHAHHAH]


$playlistID = $course_info['playlist_link'];
$videoInfo = getVideoInfoFromPlaylist($playlistID, $apiKey);

//------------------------------------------- for video Preview ---------------------------------
$youtubeLink = !empty($videoInfo) ? $videoInfo[0]['link'] : '';
$startTime = 240;
$endTime =  1200;

//--------------------------------------------------------------------------


mysqli_free_result($resultantLabel);
mysqli_close($conn);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course EnrollPage</title>
    <link rel="icon" href="../Images/logo/fav-icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--  CSS -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link href="courseEnrollPage.css" rel="stylesheet" type="text/css">

</head>

<body>
    
    <?php
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>
                <!-- title -->
                <?php echo htmlspecialchars($course_info['course_title']); ?>
            </h1>
            <p class=" text-light">
                <!-- subtitle -->
                <?php echo htmlspecialchars($course_info['subtitle']); ?>
            </p>
            <!-- enroll btn -->
            <a href="#" class="btn btn-primary btn-lg">Enroll Now</a>
        </div>
    </div>

    <!-- Course Details Section -->
    <div class="container my-5">
        <div class="row">

            <!-- Left Column: Course Information -->
            <div class="col-md-8">

                <!-- description -->
                <h2>About the Course</h2>
                <p class="lead">
                    <?php echo htmlspecialchars($course_info['description']); ?>
                </p>

                <!-- What You Will Learn -->
                <h4>What You Will Learn</h4>
                <ul>
                    <?php foreach ($points as $point) { ?>
                        <li> <?php echo htmlspecialchars($point); ?> </li>
                    <?php } ?>
                </ul>

                <h4>Course Duration & Classes</h4>
                <!-- tashin Have to chnage -->
                <p>Total 12 hours | 34 Classes</p>

                <p><strong><span style="font-size:22px;  color: #ff7043 !important;"> Instructor: </span> <?php echo htmlspecialchars($course_info['first_name'] . ' ' . $course_info['last_name']); ?></strong></p>

                <h4>Pricing</h4>
                <p><strong>$49.99</strong> for the entire course</p>

                <a type="button" class="btn btn-primary btn-lg mt-4">Enroll Now</a>
            </div>

            <!-- Right Column: Highlights and FAQs -->
            <div class="col-md-4">
                <!-- Course Highlights Card -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h4>Course Highlights</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-laptop"></i> 100% Online</li>
                            <li><i class="bi bi-check-circle"></i> <?php echo htmlspecialchars($courseTaken); ?> students taken already </li>
                        </ul>
                    </div>
                </div>

                <!-- Class Preview Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Course Preview</h5>
                        <?php
                        preg_match("/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/", $youtubeLink, $matches);
                        $videoId = $matches[1];

                        $embedUrl = "https://www.youtube.com/embed/{$videoId}?start={$startTime}&end={$endTime}";
                        ?>

                        <iframe width="100%" height="315" src="<?php echo htmlspecialchars($embedUrl); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <?php include('../Includes/Footer/footermain.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>