// Get elements
const signInModal = document.getElementById('signInModal');
const signInBtn = document.getElementById('signInBtn'); // Ensure id="signInBtn" is on your Sign In button
const closeModalBtn = signInModal ? signInModal.querySelector('.close-modal') : null; // Check if modal exists first
const loginTab = document.getElementById('loginTab');
const signupTab = document.getElementById('signupTab');
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');
const loginSwitchBtns = document.querySelectorAll('.login-switch-btn');
const signupSwitchBtns = document.querySelectorAll('.signup-switch-btn');
const passwordToggles = document.querySelectorAll('.toggle-password');

// Function to open modal
function openModal() {
    if (signInModal) {
        signInModal.style.display = 'flex';
         // Default to sign-up tab or check some state
         // Ensure elements exist before manipulating
        if (signupTab && loginTab && signupForm && loginForm) {
            switchToSignupTab(); // Or check which tab was last active etc.
        }
    }
}

// Function to close modal
function closeModal() {
     if (signInModal) {
         signInModal.style.display = 'none';
     }
}

// Function to switch tabs and forms
function switchToLoginTab() {
    // Check elements exist
    if (loginTab && signupTab && loginForm && signupForm) {
        loginTab.classList.add('active-tab');
        signupTab.classList.remove('active-tab');
        loginForm.classList.remove('hidden-form');
        signupForm.classList.add('hidden-form');
    }
}

function switchToSignupTab() {
     // Check elements exist
     if (signupTab && loginTab && signupForm && loginForm) {
        signupTab.classList.add('active-tab');
        loginTab.classList.remove('active-tab');
        signupForm.classList.remove('hidden-form');
        loginForm.classList.add('hidden-form');
     }
}

// --- Event Listeners ---

// Open Modal
if (signInBtn) {
    signInBtn.addEventListener('click', (event) => {
        // event.preventDefault(); // Only needed if it was a link
        openModal();
    });
}

// Close Modal via Button
if (closeModalBtn) {
    closeModalBtn.addEventListener('click', closeModal);
}

// Close modal if clicking on the overlay itself
if (signInModal) {
    signInModal.addEventListener('click', (event) => {
        // Check if the click is directly on the overlay, not its children
        if (event.target === signInModal) {
            closeModal();
        }
    });
}

// Tab switching via Tab buttons
if (loginTab) {
    loginTab.addEventListener('click', switchToLoginTab);
}
if (signupTab) {
    signupTab.addEventListener('click', switchToSignupTab);
}

 // Buttons within forms to switch tabs
loginSwitchBtns.forEach(btn => btn.addEventListener('click', switchToLoginTab));
signupSwitchBtns.forEach(btn => btn.addEventListener('click', switchToSignupTab));

// Password visibility toggle
 passwordToggles.forEach(toggle => {
     toggle.addEventListener('click', () => {
         // Assumes input is the direct previous sibling element within the same parent
         const passwordInput = toggle.previousElementSibling;
         const icon = toggle.querySelector('i'); // Get the icon inside the span

         if (passwordInput && icon) { // Make sure both exist
             if (passwordInput.type === 'password') {
                 passwordInput.type = 'text';
                 icon.classList.remove('fa-eye');
                 icon.classList.add('fa-eye-slash');
             } else {
                 passwordInput.type = 'password';
                 icon.classList.remove('fa-eye-slash');
                 icon.classList.add('fa-eye');
             }
         } else {
             console.error("Could not find password input or icon for toggle.");
         }
     });
 });

// Optional: Close modal on Escape key press
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && signInModal && signInModal.style.display === 'flex') {
        closeModal();
    }
});