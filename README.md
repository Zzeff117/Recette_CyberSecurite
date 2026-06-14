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

**Auteur :** Malik HARRIZ  
**Email :** malik.h@webdevpro.net  

**Date :** 14 Juin 2026

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
3. Vulnérabilités Étudiées  
4. Mesures de Sécurité Mises en Place (avec extraits de code)  
5. Tests de Sécurité Réalisés  
6. Choix Techniques et Justification  
7. Conclusion et Améliorations  

---

## 1. Introduction

Ce document présente les mesures de sécurité implémentées dans le site de recettes, conformément à la section 1.3 du cahier des charges.

---

## 2. Architecture du Projet

### 2.1 Schéma d’Architecture Globale

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
