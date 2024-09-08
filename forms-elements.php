<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bcpclinic_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'] ?? "";
    $student_number = $_POST['student_number'] ?? "";
    $contact = $_POST['contact'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $age = $_POST['age'] ?? "";
    $temperature = $_POST['temperature'] ?? "";
    $date = $_POST['date'] ?? "";
    $time = $_POST['time'] ?? "";
    $condition = $_POST['condition'] ?? "";
    $note = $_POST['note'] ?? "";

    $query = "INSERT INTO patient_info (fullname, student_number, contact, gender, age, temperature, date, time, `condition`, note) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('ssssisssss', $fullname, $student_number, $contact, $gender, $age, $temperature, $date, $time, $condition, $note);
        
        $stmt->execute();

        if ($stmt->error) {
            die('Insert Error: ' . $stmt->error);
        } else {
            echo 'Form submitted successfully!';
        }

        $stmt->close();
    } else {
        die('Prepare Error: ' . $conn->error);
    }

    $conn->close();

    header("Location: forms-elements.php");
    exit();
} else {
    echo 'No form submitted!';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Clinic Management System / Add Records</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/bcp logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/bcp logo.png" alt="">
        <span class="d-none d-lg-block">BCP Clinic</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Health Records</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.php" class="active">
              <i class="bi bi-circle"></i><span>Add Records</span>
            </a>
          </li>
          <li>
            <a href="tables-data.php" >
              <i class="bi bi-circle"></i><span>Patient Records</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Health Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Health Records</li>
          <li class="breadcrumb-item active">Add Records</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Patient informations</h5>

                <!-- General Form Elements -->
                <form id="form1" method="post" action="forms-elements.php">
                  <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                      <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Fullname" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="student_number" class="col-sm-2 col-form-label">Student Number</label>
                    <div class="col-sm-10">
                      <input type="email" id="student_number" name="student_number" class="form-control" placeholder="Enter Student Number" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="email" id="contact"  name="contact" class="form-control" placeholder="Enter Contact" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="prefer_not_to_say">Prefer not to say</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                      <label for="age" class="col-sm-2 col-form-label">Age</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" min="1" max="100" required>
                      </div>
                    </div>

                  <div class="row mb-3">
                    <label for="temperature" class="col-sm-2 col-form-label">Temp (°C)</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="temperature" name="temperature" placeholder="Enter temperature" step="0.1" min="-50" max="50" required>
                    </div>
                  </div>

                </form><!-- End General Form Elements -->
              </div>
            </div>
          </div>

          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Additional Informations</h5>
                
                <!-- Advanced Form Elements -->
                <form id="form2" method="post" action="forms-elements.php">
                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="time" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                      <label for="condition" class="col-sm-2 col-form-label">Condition</label>
                      <div class="col-sm-10">
                      <select class="form-select" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid black;" id="condition" name="condition" aria-label="Select Condition" required>  
                          <option selected disabled>Open this select menu</option>
                          <option value="fever">Fever</option>
                          <option value="cough">Cough</option>
                          <option value="headache">Headache</option>
                          <option value="stomachache">Stomach Ache</option>
                          <option value="injury">Injury</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="note" class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" style="height: 100px" id="note" name="note" placeholder="Enter Recommendations" required></textarea>
                        </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <button id="submitBtn" type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                          </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var dateInput = document.getElementById('date');
    
    var today = new Date();
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0');  
    var day = String(today.getDate()).padStart(2, '0');

    var todayDate = year + '-' + month + '-' + day;
    dateInput.setAttribute('min', todayDate);
  });

  document.getElementById('age').addEventListener('input', function() {
    var ageInput = document.getElementById('age');
    var ageValue = ageInput.value;
    }
  );




document.addEventListener('DOMContentLoaded', function() {
    // Set the minimum date for the date input
    var dateInput = document.getElementById('date');
    var today = new Date();
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0');  
    var day = String(today.getDate()).padStart(2, '0');
    var todayDate = year + '-' + month + '-' + day;
    dateInput.setAttribute('min', todayDate);
});

document.getElementById('submitBtn').addEventListener('click', function(event) {
    event.preventDefault(); 

    var form1 = document.getElementById('form1');
    var form2 = document.getElementById('form2');

    // Function to check if all inputs in a form are filled
    function areAllInputsFilled(form) {
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];
            if (element.tagName === 'INPUT' && element.type !== 'button' && !element.value) {
                return false;
            }
        }
        return true;
    }

    // Validate both forms
    if (!areAllInputsFilled(form1) || !areAllInputsFilled(form2)) {
        alert('Please fill all the fields in both forms.');
        return;
    }

    var combinedData = new FormData();

    // Append data from form1
    for (var i = 0; i < form1.elements.length; i++) {
        var element = form1.elements[i];
        if (element.name) {
            combinedData.append(element.name, element.value);
        }
    }

    // Append data from form2
    for (var i = 0; i < form2.elements.length; i++) {
        var element = form2.elements[i];
        if (element.name) {
            combinedData.append(element.name, element.value);
        }
    }

    fetch('forms-elements.php', {
        method: 'POST',
        body: combinedData
    })
    .then(response => response.text())
    .then(result => {
        alert('Forms submitted successfully!');
        window.location.href = 'forms-elements.php'; // Redirect after successful submission
    })
    .catch(error => alert('An error occurred: ' + error));
});



</script>

</body>
</html>