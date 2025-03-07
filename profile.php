<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION["email"];
$full_name = $_SESSION["full_name"]; // Fetch username from session
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="profile-container" id="profileContainer">
  <div class="profile-header">
    <h1 class="profile-title">User Profile</h1>
    <div>
      <button class="edit-btn view-mode-btn">Edit Profile</button>
      <button class="save-btn edit-mode-btn" style="display:none;">Save Changes</button>
      <button class="cancel-btn edit-mode-btn" style="display:none;">Cancel</button>
    </div>
  </div>

  <div class="profile-grid">
    <div class="profile-section">
      <h2>Personal Information</h2>
      <div class="view-mode">
        <p><strong>Name:<?php echo htmlspecialchars($full_name); ?></strong> <span id="viewName"></span></p>
        <p><strong>Date of Birth: 25-11-2006</strong> <span id="viewDOB"></span></p>
        <p><strong>Email:<?php echo htmlspecialchars($email); ?></strong> <span id="viewGmail"></span></p>
        <p><strong>Phone:+91 9664627421</strong> <span id="viewPhone"></span></p>
        <p><strong>Profession:Student</strong> <span id="viewProfession"></span></p>
      </div>
      <div class="edit-mode" style="display:none;">
        <input type="text" id="editName" placeholder="Name">
        <input type="date" id="editDOB">
        <input type="email" id="editGmail" placeholder="Gmail">
        <input type="tel" id="editPhone" placeholder="Phone Number">
        <select id="editProfession">
          <option value="Self Employed">Self Employed</option>
          <option value="Job">Job</option>
          <option value="Freelancer">Freelancer</option>
          <option value="Student">Student</option>
        </select>
      </div>
    </div>
    <div class="profile-section">
      <div class="section-header">
        <h2>Areas to Improve</h2>
        <button class="add-btn edit-mode-btn" id="addAreaBtn" style="display:none;">+ Add</button>
      </div>
      <div class="view-mode" id="areasToImproveView">
        <ul>
          <li>Stress Management</li>
          <li>Work Management</li>
          <li>Time Prioritization</li>
          <li>Emotional Intelligence</li>
        </ul>
      </div>
      <div class="edit-mode" id="areasToImproveEdit" style="display:none;">
      </div>
    </div>
  </div>
  <div class="profile-section" style="margin-top: 20px;">
    <div class="section-header">
      <h2>Personal Interests</h2>
      <button class="add-btn edit-mode-btn" id="addInterestBtn" style="display:none;">+ Add</button>
    </div>
    <div class="view-mode" id="personalInterestsView">
      <ul>
        <li>Comedy</li>
        <li>Movie Watching</li>
        <li>Binge All Night</li>
        <li>Reading Books</li>
        <li>Meditation</li>
      </ul>
    </div>
    <div class="edit-mode" id="personalInterestsEdit" style="display:none;">
    </div>
  </div>
</div>
<script src="profile.js"></script>
</body>
</html>