document.addEventListener('DOMContentLoaded', function() {
    const translations = {
        en: {
            title: "Get Started",
            username: "Username",
            email: "Email",
            password: "Password",
            confirmPassword: "Confirm password",
            terms: "I have read and agree to the Terms and Conditions.",
            signUp: "Sign up",
            welcome: "Welcome to Our Platform!",
            join: "Join our community and enjoy exclusive features"
        },
        es: {
            title: "Comenzar",
            username: "Nombre de usuario",
            email: "Correo electrónico",
            password: "Contraseña",
            confirmPassword: "Confirmar contraseña",
            terms: "He leído y acepto los Términos y Condiciones.",
            signUp: "Registrarse",
            welcome: "Bienvenido a nuestra plataforma!",
            join: "Únete a nuestra comunidad y disfruta de funciones exclusivas."
        }
    };

    function setLanguage(lang) {
        document.querySelectorAll('[data-translate]').forEach(function(element) {
            const key = element.getAttribute('data-translate');
            if (translations[lang] && translations[lang][key]) {
                if (element.tagName === 'INPUT') {
                    element.placeholder = translations[lang][key];
                } else {
                    element.textContent = translations[lang][key];
                }
            }
        });
        localStorage.setItem('preferredLanguage', lang);
    }

    // Initialize language
    const storedLang = localStorage.getItem('preferredLanguage') || 'en';
    setLanguage(storedLang);
    document.getElementById('languageSelect').value = storedLang;

    // Language change event
    document.getElementById('languageSelect').addEventListener('change', function() {
        setLanguage(this.value);
    });

    // Password toggle functionality
    document.querySelectorAll('.password-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
});