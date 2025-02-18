// server.js
const express = require('express');
const passport = require('passport');
const session = require('express-session');
const { Strategy: GoogleStrategy } = require('passport-google-oauth20');
require('dotenv').config();

const app = express();

// Middleware
app.use(session({ secret: 'YOUR_SECRET_KEY', resave: false, saveUninitialized: true }));
app.use(passport.initialize());
app.use(passport.session());


passport.use(
    new GoogleStrategy(
        {
            clientID: process.env.GOOGLE_CLIENT_ID,
            clientSecret: process.env.GOOGLE_CLIENT_SECRET,
            callbackURL: 'http://localhost:3000/auth/google/callback',
        },
        (accessToken, refreshToken, profile, done) => {
            console.log('Google Profile:', profile);
            return done(null, profile);
        }
    )
);


passport.serializeUser((user, done) => done(null, user));
passport.deserializeUser((user, done) => done(null, user));

app.get(
    '/auth/google',
    passport.authenticate('google', { scope: ['profile', 'email'] })
);

app.get(
    '/auth/google/callback',
    passport.authenticate('google', { failureRedirect: '/' }),
    (req, res) => {
        // Successful login
        res.redirect('/dashboard');
    }
);

app.get('/dashboard', (req, res) => {
    if (!req.user) return res.redirect('/');
    res.send(`<h1>Welcome, ${req.user.displayName}</h1>`);
});

app.get('/logout', (req, res) => {
    req.logout();
    res.redirect('/');
});

// Start the server
app.listen(3000, () => console.log('Server running on http://localhost:3000'));