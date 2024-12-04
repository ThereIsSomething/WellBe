const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const cors = require('cors');

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Database Connection
const db = mysql.createConnection({
    host: '193.203.184.189',
    user: 'u448196158_wellbe', // Replace with your MySQL username
    password: '@Wellbe.Mindsage2024', // Replace with your MySQL password
    database: 'u448196158_wellbe'
});

db.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL:', err);
    } else {
        console.log('Connected to MySQL database.');
    }
});

// Routes
app.get('/', (req, res) => {
    res.send('Welcome to the WellBe Backend!');
});

// Start the server
app.listen(PORT, 0.0.0.0,() => {
    console.log(`Server running on http://wellbe.support:${PORT}`);
});

// User Signup
app.post('/signup', async (req, res) => {
    const { ussername, email, password } = req.body;

    if (!username || !email || !password) {
        return res.status(400).json({ message: 'All fields are required.' });
    }

    try {
        const hashedPassword = await bcrypt.hash(password, 10);

        const query = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
        db.query(query, [username, email, hashedPassword], (err, result) => {
            if (err) {
                if (err.code === 'ER_DUP_ENTRY') {
                    return res.status(400).json({ message: 'Username or email already exists.' });
                }
                return res.status(500).json({ message: 'Database error.', error: err });
            }

            res.status(201).json({ message: 'User registered successfully!' });
        });
    } catch (err) {
        res.status(500).json({ message: 'Server error.', error: err });
    }
});

// User Login
app.post('/login', (req, res) => {
    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).json({ message: 'All fields are required.' });
    }

    const query = 'SELECT * FROM users WHERE email = ?';
    db.query(query, [email], async (err, results) => {
        if (err) {
            return res.status(500).json({ message: 'Database error.', error: err });
        }

        if (results.length === 0) {
            return res.status(404).json({ message: 'User not found.' });
        }

        const user = results[0];
        const passwordMatch = await bcrypt.compare(password, user.password);

        if (!passwordMatch) {
            return res.status(401).json({ message: 'Incorrect password.' });
        }

        const token = jwt.sign({ id: user.id, username: user.username }, 'your_secret_key', {
            expiresIn: '1h'
        });

          res.json({
            message: 'Login successful!',
            username: user.username,
            redirectUrl: '/DashBoard.html'
        });
    });
});
async function handleSignup(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('http://wellbe.support:3000/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, email, password })
    });

    const data = await response.json();
    alert(data.message);
}

async function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('http://wellbe.support:3000/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    });

    const data = await response.json();
    if (response.ok) {
        alert('Login successful!');
        localStorage.setItem('token', data.token);
        window.location.href = data.redirectUrl;
    } else {
        alert(data.message);
    }
}
function toggleForms() {
    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");

    loginForm.classList.toggle("hidden");
    signupForm.classList.toggle("hidden");

    if (loginForm.classList.contains("hidden")) {
        signupForm.classList.add("active");
        loginForm.classList.remove("active");
    } else {
        loginForm.classList.add("active");
        signupForm.classList.remove("active");
    }
}

