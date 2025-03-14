<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION["email"];
$full_name = $_SESSION["full_name"];

?>
<html>
<head>
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        #body{
            background-color: peachpuff;
        }
        #test{
            background-color: #fdf1e5;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen" id="body">
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Settings</h1>

    <div class="bg-lime-100 text-lime-800 p-4 rounded-lg mb-6 flex justify-between items-center">
        <div>
            <p class="font-semibold"><i class="fas fa-crown"></i> Upgrade to Premium</p>
            <p>Unlimited syncing, photos, and more!</p>
        </div>
        <i class="fas fa-chevron-right"></i>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-4">Your Account</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-user-circle text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Your Account</p>
                        <p class="text-gray-500"><span style="font-weight: bold"><?php echo htmlspecialchars($full_name); ?>:</span><span><?php echo htmlspecialchars($email); ?></span></p>
                        <a href="logout.php" class="btn btn-warning" style="font-weight:700">Logout</a>
                    </div>
                </div>
                <a href="profile.php"><i class="fas fa-chevron-right text-gray-400"></i></a>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-gem text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Your Plan</p>
                        <p class="text-gray-500">Limited Free Plan</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-exchange-alt text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Import & Export</p>
                        <p class="text-gray-500">Save PDFs, import entries, and more.</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <i class="fas fa-sync text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Sync</p>
                        <p class="text-gray-500">Last updated: about an hour ago</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-4">Preferences</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-bell text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Notifications</p>
                        <p class="text-gray-500">Manage your notifications</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-palette text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Theme</p>
                        <p class="text-gray-500">Customize your theme</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <i class="fas fa-language text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Language</p>
                        <p class="text-gray-500">Select your language</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-magic text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Depth AI Insights</p>
                        <p class="text-gray-500">AI Services are enabled</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-lock text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Security</p>
                        <p class="text-gray-500">Create PIN</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-semibold mb-4">Help & Support</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-headset text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Contact Support</p>
                        <p class="text-gray-500">We are here to help you!</p>
                    </div>
                </div>
                <a href="contactus.html"><i class="fas fa-chevron-right text-gray-400"></i></a>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-question-circle text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">FAQs</p>
                        <p class="text-gray-500">Answer to common questions</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-semibold mb-4">Share Our Care</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-share-alt text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Share WellBe: AI Mental Wellness</p>
                        <p class="text-gray-500">Know someone going through something very serious? Share our App!</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-semibold mb-4">About WellBe</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-heart text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Our Story</p>
                        <p class="text-gray-500">Founded by three friends, studying Computer Science Engineering, together!</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-semibold mb-4">Version</h2>
        <div class="bg-white rounded-lg shadow-sm mb-6" id="test">
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Our Very First Release</p>
                        <p class="text-gray-500">See all helpful features</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">Legal</p>
                        <p class="text-gray-500">Our Terms of Service & Privacy Policy</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="flex justify-between items-center p-4 border-b">
                <div class="flex items-center">
                    <i class="fas fa-copyright text-gray-500 mr-4"></i>
                    <div>
                        <p class="font-semibold">License</p>
                        <p class="text-gray-500">Our License</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
    <div class="text-center mt-12">
        <p class="text-gray-800">We're grateful for you.</p>
        <p class="text-gray-500">
            WellBe is a labor of love.
            <br/>
            Thank you for making our work possible.
        </p>
        <p class="mt-4 text-gray-800 font-semibold tracking-widest">W E L L B E . S U P P O R T</p>
    </div>
</div>
</body>
</html>