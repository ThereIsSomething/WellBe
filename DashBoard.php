<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$full_name = $_SESSION["full_name"]; // Fetch username from session
?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #4A1D87, #1D0038);
            color: #ffffff;
        }

        @font-face {
            font-family: 'Garamond';
            font-style: normal;
            font-weight: normal;
            src: local('Garamond'), url('garamond_[allfont.ru].woff') format('woff');
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 2rem;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            padding: 2rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.2s ease;
        }
        .nav-link1 {
            color: rgba(255, 255, 255, 0.7);
            animation: color-change 1s infinite;
        }
        @keyframes color-change {
  0% { color: red; }
  50% { color: white; }
  100% { color: red; }
}

        .nav-link:hover {
            color: #ffffff;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .stat-card h3 {
            margin-top: 0.5rem;
            font-size: 1.5rem;
        }

        .stat-card small {
            color: rgba(255, 255, 255, 0.7);
        }

        .card-graph {
            margin: 0;
            padding: 1rem; /* Reduced padding to maximize canvas space */
            background-color: #1D0038;
            backdrop-filter: blur(1px);
            border-radius: 0.75rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            max-height: 320px;
        }

        .card-graph canvas {
            width: 100% !important; /* Ensure the canvas spans the full width */
            height: 90% !important; /* Ensure the canvas spans the full height */
            aspect-ratio: auto; /* Ensure dynamic resizing based on parent */
        }
        /*.hidden {*/
        /*    display: none;*/
        /*}*/
        /*.stat-card-graph{ {*/
        /*  text-align: center;*/
        /*  border: 1px solid #eaeaea;*/
        /*  border-radius: 0.5rem;*/
        /*  padding: 1rem;*/
        /*  background-color: #000000;*/
        /*}*/
        .card-graph h3 {
            margin: 0.3rem;
            font-size: 1rem;
        }
    </style>
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JES74WTYXK"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-JES74WTYXK');
</script>
<body>

<div class="container">
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div class="text-3xl font-bold" id="logo" style="font-family: 'Garamond', sans-serif; font-weight: bolder">
            Well<span style="color:red">.</span>Be
        </div>
        <nav class="flex space-x-8">
            
            <a href="Journal.html"class="nav-link">My Journal</a>
            <a href="mytherapy.html" class="nav-link">Therapy</a>
            <a href="humeai.html" class="nav-link">AI Companion</a>
            <a href="rec.html" class="nav-link">Recommendation</a>
            <a href="DashboardSettings.php" class="nav-link">Settings</a>
            <a href="welleverse.html" class="nav-link1">Welleverse</a>
        </nav>
        <div class="flex items-center space-x-4">
            <div id="realTimeClock" style="font-size: 1.5rem; font-weight: bold; color: #ffffff;"></div>
            <div class="separator" style="color: Black; font-size: 22px;"> |</div>
            <div class="flex items-center space-x-2">
                <img src="https://img.icons8.com/fluency-systems-regular/37/user-menu-male.png" alt="User"
                     href="DashboardSettings.html" class="rounded-full"/>
                <div class="text-sm font-semibold" id="username" style="color:white; margin-left: 15px; font-size: 1rem; cursor: pointer" onclick="location.href='profile.php';"><?php echo htmlspecialchars($full_name); ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="glass">
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Overall Statistics</h2>
            <div class="grid grid-cols-3 gap-8 mt-6">
                <div class="stat-card">
                    <small>Gratitude Journal Entries</small>
                    <h3>6</h3>
                    <small class="text-green-500">50% this week</small>
                </div>
                <div class="stat-card">
                    <small>Mood score</small>
                    <h3>74.1</h3>
                    <small class="text-green-500">+1 point this month</small>
                </div>
                <div class="stat-card">
                    <small>Mindfulness Minutes</small>
                    <h3>120</h3>
                    <small class="text-red-500">-29% this week</small>
                </div>
                <div class="stat-card">
                    <small>Meditation Streak</small>
                    <h3>4</h3>
                    <small class="text-red-500">-42% this week</small>
                </div>
                <div class="stat-card">
                    <small>Positive Habits Gained</small>
                    <h3>4</h3>
                    <small class="text-red-500">+50% this week</small>
                </div>
                <div class="stat-card">
                    <small>Upcoming Sessions</small>
                    <h3>1</h3>
                    <small class="text-red-500">+1 this month</small>
                </div>
            </div>
        </div>


        <div class="mb-10">
            <h2 class="text-2xl font-bold mb-6">Insights</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="card-graph">
                    <h3 class="text-lg font-bold">Emotion Trends</h3>
                    <canvas id="emotionChart"></canvas>
                </div>
                <div class="card-graph">
                    <h3 class="text-lg font-bold">Stress Levels Over Time</h3>
                    <canvas id="stressChart"></canvas>
                </div>
                <div class="card-graph">
                    <h3 class="text-lg font-bold">Anxiety Levels</h3>
                    <canvas id="anxietyChart"></canvas>
                </div>
                <div class="card-graph">
                    <h3 class="text-lg font-bold">Sleep Patterns</h3>
                    <canvas id="sleepChart"></canvas>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Session Schedule</h2>
            <table class="w-full text-left text-sm">
                <thead>
                <tr class="text-gray-400">
                    <th class="py-2">Therapist</th>
                    <th class="py-2">Time</th>
                    <th class="py-2">Date</th>
                    <th class="py-2">Session type</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-t border-gray-700">
                    <td class="py-2">Dr. Medha</td>
                    <td class="py-2">10:00 AM</td>
                    <td class="py-2">2024-04-29</td>
                    <td class="py-2">Individual Mental Therapy</td>
                </tr>
                <!-- Add other rows here -->
                </tbody>
            </table>
        </div>

        <div class="grid grid-cols-2 gap-8">
            <!-- Meditation Player -->
            <div class="flex items-center justify-between bg-gray-800 rounded-lg p-6">
                <div>
                    <h3 class="text-lg font-bold">Inner Harmony Hues</h3>
                    <p class="text-sm text-gray-400">Take a mental voyage to inner sanctuaries</p>
                    <audio id="meditationAudio" src="riverstream.mp3" preload="auto" class="mt-4 w-full"></audio>
                </div>
                <div class="flex space-x-2">
                    <button class="bg-gray-700 p-2 rounded-full" onclick="playAudio()"><i class="fas fa-play"></i>
                    </button>
                    <button class="bg-gray-700 p-2 rounded-full" onclick="pauseAudio()"><i class="fas fa-pause"></i>
                    </button>
                    <button class="bg-gray-700 p-2 rounded-full" onclick="stopAudio()"><i class="fas fa-stop"></i>
                    </button>
                </div>
            </div>

            <!-- Download Report Section -->
            <div class="flex items-center justify-between bg-gray-800 rounded-lg p-6">
                <div>
                    <h3 class="text-lg font-bold">Download your mental wellness report</h3>
                </div>
                <button class="bg-blue-600 p-3 rounded-lg flex items-center space-x-2">
                    <i class="fas fa-download"></i>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        document.getElementById('realTimeClock').textContent = `${hours}:${minutes}`;
    }

    setInterval(updateTime, 1000);
    updateTime();
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    //Gradient helper function
    function createGradient(ctx, colorStart, colorEnd) {
        const gradient = ctx.createLinearGradient(0, 0, 0, 350);
        gradient.addColorStop(0, colorStart);
        gradient.addColorStop(1, colorEnd);
        return gradient;
    }

    // Emotion Trends (Line Chart)
    const emotionCtx = document.getElementById('emotionChart').getContext('2d');
    const emotionGradient = createGradient(emotionCtx, 'rgba(74, 144, 226, 1)', 'rgba(74, 144, 226, 0)');
    new Chart(emotionCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Emotion Score',
                data: [3, 4, 2, 5, 4, 2.5, 5],
                borderColor: '#4A90E2',
                borderWidth: 3,
                backgroundColor: emotionGradient,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#4A90E2',
                pointRadius: 5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {display: false},
                tooltip: {backgroundColor: '#4A90E2', titleColor: '#fff', bodyColor: '#fff'}
            },
            scales: {
                x: {grid: {display: false}},
                y: {grid: {drawBorder: false}, ticks: {stepSize: 1}}
            }
        }
    });

    // Stress Levels (Bar Chart)
    const stressCtx = document.getElementById('stressChart').getContext('2d');
    const stressGradient = createGradient(stressCtx, 'rgb(0,74,900)', 'rgba(255, 112, 67, 0)');
    new Chart(stressCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Stress Level',
                data: [5, 4, 6, 5, 3, 8, 3],
                backgroundColor: stressGradient,
                borderRadius: 10,
                barThickness: 20,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {display: false},
                tooltip: {backgroundColor: '#FF7043', titleColor: '#fff', bodyColor: '#fff'}
            },
            scales: {
                x: {grid: {display: false}},
                y: {grid: {drawBorder: false}, ticks: {stepSize: 1}}
            }
        }
    });

    // Anxiety Levels (Bar Chart)
    const anxietyCtx = document.getElementById('anxietyChart').getContext('2d');
    const anxietyGradient = createGradient(stressCtx, 'rgb(215,4,4)', 'rgba(255, 112, 67, 0)');
    new Chart(anxietyCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Anxiety Level',
                data: [3, 6, 4, 2, 3, 8, 4],
                backgroundColor: anxietyGradient,
                borderRadius: 10,
                barThickness: 20,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {display: false},
                tooltip: {backgroundColor: '#FF7043', titleColor: '#fff', bodyColor: '#fff'}
            },
            scales: {
                x: {grid: {display: false}},
                y: {grid: {drawBorder: false}, ticks: {stepSize: 1}}
            }
        }
    });

    // Sleep Patterns (Line Chart)
    const sleepCtx = document.getElementById('sleepChart').getContext('2d');
    const sleepGradient = createGradient(sleepCtx, 'rgba(76, 175, 80, 1)', 'rgba(76, 175, 80, 0)');
    new Chart(sleepCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Hours Slept',
                data: [6, 5, 7, 8, 6, 4, 7],
                borderColor: '#4CAF50',
                borderWidth: 3,
                backgroundColor: sleepGradient,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#4CAF50',
                pointRadius: 5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {display: false},
                tooltip: {backgroundColor: '#4CAF50', titleColor: '#fff', bodyColor: '#fff'}
            },
            scales: {
                x: {grid: {display: false}},
                y: {grid: {drawBorder: false}, ticks: {stepSize: 1}}
            }
        }
    });
    const audio = document.getElementById('meditationAudio');

    function playAudio() {
        audio.play();
    }

    function pauseAudio() {
        audio.pause();
    }

    function stopAudio() {
        audio.pause();
        audio.currentTime = 0; // Reset the audio to the start
    }
</script>
</body>
</html>