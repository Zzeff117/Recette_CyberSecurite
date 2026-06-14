# Page de Garde

<div style="text-align: center; margin-top: 80px;">

**RÉPUBLIQUE FRANÇAISE**  
**Liberté • Égalité • Fraternité**

**GRETA 92**  
Hauts-de-Seine

---

**PROJET FINAL**  
**Formation Analyste Cybersécurité**

**Développement sécurisé d’un site web de recettes de cuisine**

**Auteur :** BAAZAOUI Seifeddine - Mehdi - Bachir 
**Email :** seifgreta93@gmail.com  

**Date :** 15 Juin 2026

**Document de Sécurité** *(Livrable n°3)*

</div>

---

# Documentation de Sécurité

**Projet Final – Analyste Cybersécurité**  
**Greta 92 – 2026**

---

## Sommaire

1. Introduction  
2. Architecture du Projet  
3. Architecture Technique
4.Fonctionnalités Implémentées
5. Vulnérabilités Étudiées  
6. Mesures de Sécurité Mises en Place (avec extraits de code)  
7. Tests de Sécurité Réalisés  
8. Choix Techniques et Justification  
9. Conclusion et Améliorations  

---

## 1. Introduction

Ce document présente les mesures de sécurité implémentées dans le site de recettes, conformément à la section 1.3 du cahier des charges.

---

## 2. Architecture du Projet



```mermaid
graph TD
    subgraph "Front-Office (Public)"
        A[Page Accueil] 
        B[Liste Recettes]
        C[Page Recette]
        D[Recherche]
    end

    subgraph "Back-Office (Admin)"
        E[Dashboard SOC]
        F[CRUD Recettes]
        G[Gestion Utilisateurs]
        H[Audit Logs]
    end

    subgraph "Couche Contrôleur"
        I[Router] 
        J[AuthController]
        K[RecipeController]
        L[AuditController]
    end

    subgraph "Couche Modèle / Repository"
        M[RecipeRepository]
        N[User Model]
        O[AuditLogRepository]
    end

    subgraph "Base de Données"
        P[(MySQL - appdb)]
    end

    subgraph "Sécurité"
        Q[CSRF Token]
        R[Prepared Statements]
        S[CSP + Headers]
        T[Audit Log]
        U[Upload Validation]
    end

    A --> I
    B --> I
    C --> I
    D --> I
    E --> I
    F --> I
    G --> I
    H --> I

    I --> J
    I --> K
    I --> L

    J --> N
    K --> M
    L --> O

    M --> P
    N --> P
    O --> P

    J -.-> Q
    K -.-> Q
    K -.-> U
    I -.-> S
    M -.-> R
    O -.-> T


---
## 3. Architecture Technique

- **Langages & Technologies :** PHP 8.2, MySQL, HTML5, CSS, JavaScript, Bootstrap
- **Architecture :** MVC (Model-View-Controller)
- **Serveur Web :** Apache (avec mod_rewrite)
- **Base de données :** MySQL 8.0
- **Conteneurisation :** Docker + Docker Compose
- **Dossier public :** `/public` (Document Root)


## 4. Fonctionnalités Implémentées

### Front-Office (partie publique)
- Page d’accueil
- Liste des recettes
- Page détail d’une recette
- Recherche de recettes
- Upload d’images sécurisé

### Back-Office (administration)
- Authentification (rôle `admin`)
- CRUD complet sur les recettes
- Gestion des utilisateurs (partiel)
- Dashboard SOC (Audit Logs, Incidents, Vulnérabilités)

---

## 5. Vulnérabilités Étudiées

Conformément au cahier des charges, les vulnérabilités suivantes ont été prises en compte :

| Vulnérabilité                  | Risque associé                          | OWASP Top 10 |
|-------------------------------|-----------------------------------------|--------------|
| Injection SQL                 | Vol ou modification de données          | A03          |
| XSS (Reflected & Stored)      | Exécution de code malveillant           | A07          |
| CSRF                          | Actions non désirées au nom de l’utilisateur | A08     |
| Force Brute / Credential Stuffing | Compromission de comptes             | A07          |
| Upload de fichiers malveillants | Exécution de code serveur             | A01 / A08    |
| Mauvaise gestion des sessions | Hijacking / Fixation                    | A07          |
| Énumération d’utilisateurs    | Aide à la brute force                   | -            |
| Manque de contrôle d’accès    | Accès non autorisé                      | A01          |

---

## 6. Mesures de Sécurité Mises en Place

### 6.1 Authentification & Protection Force Brute

**Extrait de code :**
```php
// AuthController.php
$failedAttempts = $audit->countRecentFailures($_POST['email']);

if ($failedAttempts >= 5) {
    die('Compte temporairement bloqué. Réessayez dans 15 minutes.');
}

if ($user && password_verify($_POST['password'], $user['password'])) {
    // Login success
}
###6.2 Protection contre les Injections SQL
**Extrait de code :**
PHP// RecipeRepository.php
$stmt = $this->conn->prepare("
    INSERT INTO recipes (title, description, ingredients, preparation, image)
    VALUES (:title, :description, :ingredients, :preparation, :image)
");

$stmt->execute($data);   // Binding sécurisé
###6.3 Protection XSS
Extrait de code :
PHP// Dans les vues (ex: index.php, show.php)
<?= htmlspecialchars($recipe['title']) ?>
<?= htmlspecialchars($recipe['description']) ?>
Configuration CSP :
PHP// public/index.php
header("Content-Security-Policy: default-src 'self'; 
    style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; 
    script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net;");
###6.4 Protection CSRF
Extrait de code :
PHP// core/Csrf.php
public static function check($token) {
    return isset($_SESSION['csrf_token']) && 
           hash_equals($_SESSION['csrf_token'], $token);
}

// Dans RecipeController.php
if (!Csrf::check($_POST['csrf_token'] ?? '')) {
    die('CSRF token invalide');
}
###6.5 Sécurité des Uploads
Extrait de code :
PHP// RecipeController.php
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if (!in_array($ext, ['jpg','jpeg','png','webp'])) {
    die("Format invalide");
}

if (!getimagesize($file['tmp_name'])) {
    die("Fichier invalide");
}

$name = bin2hex(random_bytes(16)) . "." . $ext;
###6.6 Headers de Sécurité
Extrait de code :
PHP// public/index.php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer");
###6.7 Journalisation
Extrait de code :
PHP// AuditLogRepository.php
$audit->log($_SESSION['user'], 'RECIPE_CREATED');
$audit->log($_SESSION['user'], 'LOGIN_FAILED');

## 7. Tests de Sécurité Réalisés

| N° | Vulnérabilité Testée           | Méthode de Test                     | Résultat                     | Statut |
|----|--------------------------------|-------------------------------------|------------------------------|--------|
| 1  | Force Brute                    | Boucle de tentatives (curl)         | Blocage après 6 échecs       | ✅ OK |
| 2  | Injection SQL                  | Payloads classiques + curl          | Bloqué (Prepared Statements) | ✅ OK |
| 3  | XSS Reflected & Stored         | Scripts JS + SVG                    | Échappé / non exécuté        | ✅ OK |
| 4  | CSRF                           | Requêtes sans token                 | Rejetées                     | ✅ OK |
| 5  | Upload malveillant             | Fichiers .php, .svg, double ext.    | Refusés                      | ✅ OK |
| 6  | Headers HTTP                   | curl -I + DevTools                  | Headers présents             | ✅ OK |
| 7  | Gestion des Sessions           | Fixation + accès sans login         | Protection correcte          | ✅ OK |
| 8  | Contrôle d’accès (Rôles)       | Compte user vs admin                | Accès refusé                 | ✅ OK |
| 9  | Énumération d’utilisateurs     | Messages d’erreur login             | Message identique            | ✅ OK |
| 10 | Traçabilité / Audit            | Actions CRUD + consultation         | Tout journalisé              | ✅ OK |

---
##8. Conclusion
L’application respecte les exigences de sécurité du cahier des charges. Toutes les protections prioritaires ont été implémentées et testées avec succès.
