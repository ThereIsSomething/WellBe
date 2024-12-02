const stressVideos = [
    {
        title: "pranayam for beginners",
        channel: "Swastik yoga",
        thumbnail: "https://i.ytimg.com/vi/uNmKzlh55Fo/hq720.jpg?sqp=-oaymwEXCNAFEJQDSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLDVkFAJIig5cju4dfKVxSmz3HRLHQ",
        youtubeLink: "https://youtu.be/blbv5UTBCGg?si=hDuR_G5Tvz0xTxwA"
    },
    {
        title: "5-Minute meditation",
        channel: "Great Mediatation",
        thumbnail: "https://i.ytimg.com/vi/RVzIDLcGzYw/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLD6y60EgQq3AycooLVnoD3rnLW1xg",
        youtubeLink: "https://youtu.be/ssss7V1_eyA?si=YQGQ8m8NC6jpAw6m"
    }
];

const personalInterests = [
    {
        category: "Top Movies",
        recommendations: [
            {
                title: "Inception",
                year: 2010,
                description: "Mind-bending psychological thriller",
                youtubeTrailer: "https://www.youtube.com/watch?v=YoHD9XEInc0"
            },
            {
                title: "The Shawshank Redemption",
                year: 1994,
                description: "Classic drama of hope and redemption",
                youtubeTrailer: "https://www.youtube.com/watch?v=6hB3S9bNrQc"
            }
        ],
        icon: "🎬"
    },
    {
        category: "Stand-up Comedy",
        recommendations: [
            {
                title: "Anubhav BAssi : Hostel stories",
                description: "Hilarious Indian comedy special",
                youtubeLink: "https://youtu.be/Tqsz6fjvhZM?si=zIO_7t8DPPPNpSuS"
            },
            {
                title: "Zakir Khan: Comicstaan",
                description: "Popular Indian stand-up comedian",
                youtubeLink: "https://www.youtube.com/watch?v=oTRQ_5Legag"
            }
        ],
        icon: "😂"
    }
];

const musicPlaylists = [
    {
        title: "Calm Waves",
        tracks: 25,
        mood: "Relaxation"
    },
    {
        title: "Motivational Beats",
        tracks: 30,
        mood: "Energetic"
    }
];

const therapyRecommendations = [
    {
        title: "Cognitive Behavioral Therapy",
        description: "Manage anxiety and stress through cognitive restructuring",
        benefits: ["Reduce negative thought patterns", "Develop coping strategies"]
    },
    {
        title: "Mindfulness-Based Stress Reduction",
        description: "Holistic approach to mental well-being through meditation",
        benefits: ["Improve emotional regulation", "Enhance self-awareness"]
    }
];

const productivityTips = [
    {
        title: "Pomodoro Technique",
        description: "25-minute focused work, 5-minute break cycle",
        icon: "⏰"
    },
    {
        title: "Time Blocking",
        description: "Schedule specific tasks in dedicated time slots",
        icon: "📅"
    }
];

function renderStressVideos(video) {
    return `
                <a href="${video.youtubeLink}" target="_blank" class="video-card">
                    <img src="${video.thumbnail}" alt="${video.title}" class="video-thumbnail">
                    <div class="video-info">
                        <h3>${video.title}</h3>
                        <p>${video.channel}</p>
                    </div>
                </a>
            `;
}

function renderInterests(interest) {
    const recommendationHTML = interest.recommendations.map(rec =>
        interest.category === "Top Movies"
            ? `
                    <div class="movie-recommendation">
                        <h4>${rec.title} (${rec.year})</h4>
                        <p>${rec.description}</p>
                        <a href="${rec.youtubeTrailer}" target="_blank">Watch Trailer</a>
                    </div>
                    `
            : `
                    <div class="comedy-recommendation">
                        <h4>${rec.title}</h4>
                        <p>${rec.description}</p>
                        <a href="${rec.youtubeLink}" target="_blank">Watch Now</a>
                    </div>
                    `
    ).join('');

    return `
                <div class="interest-card">
                    <div>
                        <h3>${interest.category} ${interest.icon}</h3>
                        ${recommendationHTML}
                    </div>
                </div>
            `;
}

function renderPlaylists(playlist) {
    return `
                <div class="playlist-card">
                    <h3>${playlist.title}</h3>
                    <p>${playlist.tracks} tracks</p>
                    <p>Mood: ${playlist.mood}</p>
                </div>
            `;
}

function renderTherapies(therapy) {
    const benefitsHTML = therapy.benefits.map(benefit =>
        `<li>${benefit}</li>`
    ).join('');

    return `
                <div class="therapy-card">
                    <h3>${therapy.title}</h3>
                    <p>${therapy.description}</p>
                    <ul>
                        ${benefitsHTML}
                    </ul>
                </div>
            `;
}

function renderProductivityTips(tip) {
    return `
                <div class="productivity-card">
                    <div class="card-icon">${tip.icon}</div>
                    <div>
                        <h3>${tip.title}</h3>
                        <p>${tip.description}</p>
                    </div>
                </div>
            `;
}
document.addEventListener('DOMContentLoaded', () => {
    const stressVideosContainer = document.getElementById('stress-videos');
    stressVideos.forEach(video => {
        stressVideosContainer.innerHTML += renderStressVideos(video);
    });
    const interestContainer = document.getElementById('interest-recommendations');
    personalInterests.forEach(interest => {
        interestContainer.innerHTML += renderInterests(interest);
    });

    const playlistContainer = document.getElementById('playlist-recommendations');
    musicPlaylists.forEach(playlist => {
        playlistContainer.innerHTML += renderPlaylists(playlist);
    });
    const therapyContainer = document.getElementById('therapy-suggestions');
    therapyRecommendations.forEach(therapy => {
        therapyContainer.innerHTML += renderTherapies(therapy);
    });

    const productivityContainer = document.getElementById('productivity-grid');
    productivityTips.forEach(tip => {
        productivityContainer.innerHTML += renderProductivityTips(tip);
    });
});
