# Syn – Application de gestion

**Syn** est une application web **Laravel** développée pour la coopérative Synercoop dans le cadre de mon stage BTS SIO SLAM 2024. Elle permet de gérer les informations des entrepreneurs (affichage, modification et création). L’interface est réalisée en **Blade** et **Bootstrap**, et les données sont stockées dans une base MySQL.

---

## 🧩 Fonctionnalités principales

- Gestion des utilisateurs (CRUD, authentification)
- Gestion des informations des entrepreneurs (création, modification, visualisation)
- Interface d’administration sécurisée
- Interface responsive (Bootstrap)

---

## 🛠️ Technologies utilisées

- PHP 8+ / Laravel
- Blade Templating
- Bootstrap
- MySQL
- Composer

---

## ✅ Prérequis

- PHP ≥ 7.4
- Composer
- MySQL ou MariaDB
- Un serveur local type XAMPP / WAMP / Laravel Valet
- (Facultatif) phpMyAdmin

---

## 🚀 Installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/M-Oulkhorf/syn.git
cd syn

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier .env exemple
cp .env.example .env

# 4. Configurer .env avec vos identifiants MySQL
# DB_DATABASE=synercoop_db
# DB_USERNAME=root
# DB_PASSWORD=

---

## 🗃️ Importer la base de données

### ➤ Via phpMyAdmin :

1. Créez une base de données (ex : `synercoop_db`)
2. Cliquez sur **Importer**
3. Sélectionnez le fichier `gestion.sql` (présent à la racine du projet)
4. Cliquez sur **Exécuter**

### ➤ Via terminal MySQL :

```bash
mysql -u root -p synercoop_db < gestion.sql

---

## 🔐 Identifiants de connexion par défaut

- **Login** : `admin`  
- **Mot de passe** : `admin123`

> ⚠️ Ces identifiants sont à modifier en production.

---

## ▶️ Lancer l'application

```bash
php artisan serve

Par défaut, l'application est accessible à :  
👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 👨‍💻 Auteur

**Mohamed Oulkhorf**  
Stagiaire informatique

