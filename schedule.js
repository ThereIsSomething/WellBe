const therapists = [
    {
        name: "Dr. Medha Mishra",
        specialties: ["Anxiety", "Depression"],
        timeSlots: ["9:00 AM", "11:00 AM", "2:00 PM"]
    },
    {
        name: "Dr. Aniket Sharma",
        specialties: ["Stress Management", "PTSD"],
        timeSlots: ["10:00 AM", "1:00 PM", "4:00 PM"]
    },
    {
        name: "Dr. Abhishek Mehra",
        specialties: ["Relationship Counseling", "Self-Esteem"],
        timeSlots: ["8:00 AM", "12:00 PM", "3:00 PM"]
    }
];

const therapistSelect = document.getElementById('therapistSelect');
const therapistList = document.getElementById('therapistList');
const timeSlotSelect = document.getElementById('timeSlotSelect');
const timeSlotList = document.getElementById('timeSlotList');
const immediateTherapyBtn = document.getElementById('immediateTherapyBtn');
const loadingScreen = document.getElementById('loadingScreen');

therapists.forEach(therapist => {
    const therapistItem = document.createElement('div');
    therapistItem.classList.add('therapist-item');
    therapistItem.textContent = `${therapist.name} - ${therapist.specialties.join(', ')}`;
    therapistItem.addEventListener('click', () => {
        therapistSelect.value = therapist.name;
        therapistList.style.display = 'none';

        timeSlotList.innerHTML = '';
        therapist.timeSlots.forEach(slot => {
            const timeSlotItem = document.createElement('div');
            timeSlotItem.classList.add('timeslot-item');
            timeSlotItem.textContent = slot;
            timeSlotItem.addEventListener('click', () => {
                timeSlotSelect.value = slot;
                timeSlotList.style.display = 'none';
            });
            timeSlotList.appendChild(timeSlotItem);
        });
    });
    therapistList.appendChild(therapistItem);
});

therapistSelect.addEventListener('click', () => {
    therapistList.style.display = therapistList.style.display === 'block' ? 'none' : 'block';
});

timeSlotSelect.addEventListener('click', () => {
    if (therapistSelect.value) {
        timeSlotList.style.display = timeSlotList.style.display === 'block' ? 'none' : 'block';
    } else {
        alert('Please select a therapist first');
    }
});

document.getElementById('therapyForm').addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Therapy Session Scheduled Successfully!');
});

immediateTherapyBtn.addEventListener('click', () => {
    loadingScreen.style.display = 'flex';
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        alert('Connecting you to an available therapist...');
        window.location.href = 'live.html';
    }, 3000);
});

document.addEventListener('click', (e) => {
    if (!therapistSelect.contains(e.target) && !therapistList.contains(e.target)) {
        therapistList.style.display = 'none';
    }
    if (!timeSlotSelect.contains(e.target) && !timeSlotList.contains(e.target)) {
        timeSlotList.style.display = 'none';
    }
});