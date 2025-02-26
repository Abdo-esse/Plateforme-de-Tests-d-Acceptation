<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestAccept - Plateforme de Tests d'Acceptation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3563e9;
        }
        
        .logo span {
            color: #333;
        }
        
        .nav-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background-color: #3563e9;
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #2954d4;
        }
        
        .btn-secondary {
            background-color: transparent;
            color: #3563e9;
            border: 1px solid #3563e9;
        }
        
        .btn-secondary:hover {
            background-color: #eef2ff;
        }
        
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 2rem;
            margin-top: 2rem;
        }
        
        .hero-content {
            max-width: 1200px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }
        
        .hero-text {
            flex: 1;
        }
        
        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1e293b;
        }
        
        .hero-text p {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .hero-image {
            flex: 1;
        }
        
        .hero-image img {
            width: 100%;
            max-width: 550px;
            height: auto;
        }
        
        .features {
            padding: 4rem 2rem;
            background-color: white;
        }
        
        .features-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .features-title h2 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 1rem;
        }
        
        .features-title p {
            color: #64748b;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature-card {
            background-color: #f8fafc;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: #eef2ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .feature-icon svg {
            width: 24px;
            height: 24px;
            color: #3563e9;
        }
        
        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #1e293b;
        }
        
        .feature-card p {
            color: #64748b;
            line-height: 1.6;
        }
        
        footer {
            background-color: #1e293b;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        footer p {
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Test<span>Accept</span></div>
        <div class="nav-buttons">
            <a href="#" class="btn btn-secondary">Logout</a>
            <a href="#" class="btn btn-primary">Get Started Test</a>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Bienvenue sur la plateforme de tests d'acceptation</h1>
                <p>Notre plateforme vous permet de passer des tests d'évaluation dans un environnement professionnel et sécurisé. Préparez-vous à démontrer vos compétences et à réussir.</p>
                <a href="#" class="btn btn-primary">Commencer un test</a>
            </div>
            <div class="hero-image">
                <img src="/api/placeholder/550/400" alt="Illustration de tests">
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="features">
        <div class="features-title">
            <h2>Fonctionnalités de notre plateforme</h2>
            <p>Découvrez les avantages de notre système de tests d'acceptation</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3>Tests personnalisés</h3>
                <p>Des tests adaptés à différents domaines de compétences et niveaux d'expertise.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3>Environnement sécurisé</h3>
                <p>Notre plateforme garantit la sécurité de vos données et l'intégrité des tests.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h3>Résultats détaillés</h3>
                <p>Obtenez des analyses précises de vos performances et des recommandations personnalisées.</p>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 TestAccept - Plateforme de Tests d'Acceptation</p>
        <p>Tous droits réservés</p>
    </footer>
</body>
</html>