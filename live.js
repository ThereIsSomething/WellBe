const landingPage = document.getElementById('landing-page');
const videoMeeting = document.getElementById('video-meeting');
const localVideo = document.getElementById('local-video');
const remoteVideo = document.getElementById('remote-video');
const micBtn = document.getElementById('mic-btn');
const cameraBtn = document.getElementById('camera-btn');
const screenShareBtn = document.getElementById('screen-share-btn');
const endCallBtn = document.getElementById('end-call-btn');
const meetingTimer = document.getElementById('meeting-timer');

let localStream;
let micEnabled = true;
let cameraEnabled = true;
let meetingStartTime;
let timerInterval;

function joinMeeting() {
    const meetingId = document.getElementById('meeting-id').value;
    const username = document.getElementById('username').value;

    if (meetingId && username) {
        landingPage.style.display = 'none';
        videoMeeting.style.display = 'flex';
        startLocalStream();
        startMeetingTimer();
    } else {
        alert('Please enter Meeting ID and Name');
    }
}

async function startLocalStream() {
    try {
        localStream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        });
        localVideo.srcObject = localStream;
    } catch (error) {
        console.error('Error accessing media devices:', error);
    }
}


function startMeetingTimer() {
    meetingStartTime = new Date();
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    const now = new Date();
    const diff = new Date(now - meetingStartTime);
    const minutes = String(diff.getUTCMinutes()).padStart(2, '0');
    const seconds = String(diff.getUTCSeconds()).padStart(2, '0');
    meetingTimer.textContent = `${minutes}:${seconds}`;
}

micBtn.addEventListener('click', () => {
    const audioTracks = localStream.getAudioTracks();
    micEnabled = !micEnabled;
    audioTracks.forEach(track => track.enabled = micEnabled);
    micBtn.classList.toggle('active');

    const micIcon = micBtn.querySelector('svg use');
    micIcon.setAttribute('href', `#icon-${micEnabled ? 'mic' : 'mic-off'}`);
});

cameraBtn.addEventListener('click', () => {
    const videoTracks = localStream.getVideoTracks();
    cameraEnabled = !cameraEnabled;
    videoTracks.forEach(track => track.enabled = cameraEnabled);
    cameraBtn.classList.toggle('active');

    const cameraIcon = cameraBtn.querySelector('svg use');
    cameraIcon.setAttribute('href', `#icon-${cameraEnabled ? 'camera' : 'camera-off'}`);
});

screenShareBtn.addEventListener('click', async () => {
    try {
        const screenStream = await navigator.mediaDevices.getDisplayMedia({
            video: true
        });
        localVideo.srcObject = screenStream;
        screenShareBtn.classList.add('active');
    } catch (error) {
        console.error('Screen share error:', error);
    }
});

endCallBtn.addEventListener('click', () => {
    if (localStream) {
        localStream.getTracks().forEach(track => track.stop());
    }
    clearInterval(timerInterval);
    videoMeeting.style.display = 'none';
    landingPage.style.display = 'flex';
});