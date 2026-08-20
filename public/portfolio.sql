-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 20 août 2026 à 11:23
-- Version du serveur : 8.0.46-0ubuntu0.24.04.3
-- Version de PHP : 8.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tiefing Sangare',
  `views` int NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_keywords` json DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `views`, `is_published`, `published_at`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pourquoi votre entreprise a besoin d\'un site web professionnel en 2025', 'pourquoi-votre-entreprise-a-besoin-dun-site-web-professionnel-en-2025', 'Découvrez les avantages d\'avoir un site web professionnel pour votre entreprise au Mali et comment booster votre visibilité en ligne.', '<p>Dans un monde de plus en plus digital, avoir un site web professionnel n\'est plus une option, mais une nécessité pour toute entreprise qui souhaite se développer.</p>\r\n                <h2>1. Crédibilité et professionnalisme</h2>....\r\n                <p>Un site web bien conçu donne une image professionnelle de votre entreprise. 84% des consommateurs pensent qu\'une entreprise avec un site web est plus crédible qu\'une entreprise qui n\'en a pas.</p>\r\n                <h2>2. Visibilité 24h/24, 7j/7</h2>\r\n                <p>Votre site web travaille pour vous même en dehors des heures ouvrables. Vos clients peuvent découvrir vos produits et services à tout moment.</p>\r\n                <h2>3. Acquisition de nouveaux clients</h2>\r\n                <p>Grâce au référencement naturel (SEO), votre site web attire des visiteurs qualifiés qui recherchent vos services sur Google.</p>\r\n                <h2>4. Avantage concurrentiel</h2>\r\n                <p>Si vos concurrents ont un site web et pas vous, vous perdez des opportunités commerciales importantes.</p>\r\n                <h2>Conclusion</h2>\r\n                <p>Investir dans un site web professionnel est l\'une des meilleures décisions pour votre entreprise. Contactez-moi pour créer votre présence en ligne !</p>', NULL, 'Tiefing Sangare', 0, 1, '2026-08-12 17:38:30', '\"[\\\"site web professionnel\\\",\\\"entreprise Mali\\\",\\\"SEO\\\",\\\"visibilit\\\\u00e9\\\"]\"', 'Découvrez les avantages d\'avoir un site web professionnel pour votre entreprise au Mali et comment booster votre visibilité en ligne.', '2026-08-12 17:38:30', '2026-08-17 18:18:39'),
(2, 'Les avantages du SEO pour les entreprises maliennes', 'avantages-seo-entreprises-maliennes', 'Comment le référencement naturel peut transformer votre entreprise et vous faire gagner des clients qualifiés sans publicité payante.', '<p>Le SEO (Search Engine Optimization) est un levier puissant pour attirer des clients gratuitement sur Google.</p>\n                <h2>Pourquoi le SEO est important au Mali ?</h2>\n                <p>De plus en plus de maliens utilisent Google pour trouver des produits et services. Être bien positionné sur les recherches locales est un avantage compétitif majeur.</p>\n                <h2>Les bénéfices du SEO</h2>\n                <ul>\n                    <li><strong>Trafic gratuit et qualifié</strong> : Des visiteurs qui cherchent activement vos services</li>\n                    <li><strong>Retour sur investissement durable</strong> : Les effets du SEO durent dans le temps</li>\n                    <li><strong>Crédibilité accrue</strong> : Les premiers résultats Google sont perçus comme les plus fiables</li>\n                    <li><strong>Visibilité locale</strong> : Attirez des clients à Bamako et dans toute la région</li>\n                </ul>\n                <h2>Conclusion</h2>\n                <p>Investir dans le SEO est essentiel pour toute entreprise qui souhaite se développer au Mali. Contactez-moi pour un audit SEO gratuit !</p>', NULL, 'Tiefing Sangare', 0, 1, '2026-08-12 17:38:30', '\"[\\\"SEO Mali\\\",\\\"r\\\\u00e9f\\\\u00e9rencement naturel\\\",\\\"agence digitale Bamako\\\",\\\"Google Mali\\\"]\"', 'Découvrez les avantages du SEO pour votre entreprise au Mali et comment attirer plus de clients gratuitement.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(3, 'Comment l\'IA révolutionne le service client sur WhatsApp', 'ia-revolutionne-service-client-whatsapp', 'Découvrez comment les chatbots intelligents transforment la relation client et automatisent vos conversations WhatsApp 24h/24.', '<p>L\'intelligence artificielle change la donne pour le service client. Avec les agents IA sur WhatsApp, vos clients obtiennent des réponses instantanées à toute heure.</p>\n                <h2>Pourquoi intégrer un agent IA WhatsApp ?</h2>\n                <ul>\n                    <li><strong>Disponibilité 24h/24</strong> : Vos clients sont servis même la nuit et les week-ends</li>\n                    <li><strong>Réponses instantanées</strong> : Fini les temps d\'attente frustrants</li>\n                    <li><strong>Économies importantes</strong> : Réduisez vos coûts de support client</li>\n                    <li><strong>Scalabilité</strong> : Gérez des milliers de conversations simultanément</li>\n                </ul>\n                <h2>Cas d\'utilisation au Mali</h2>\n                <p>Les entreprises maliennes utilisent déjà nos agents IA pour : la prise de rendez-vous, les FAQs automatiques, le support technique, la vente de produits, etc.</p>\n                <h2>Conclusion</h2>\n                <p>Ne restez pas à la traîne. Modernisez votre service client avec un agent IA sur WhatsApp dès aujourd\'hui !</p>', NULL, 'Tiefing Sangare', 0, 1, '2026-08-12 17:38:30', '\"[\\\"IA WhatsApp\\\",\\\"chatbot\\\",\\\"service client\\\",\\\"automatisation Mali\\\"]\"', 'L\'IA révolutionne le service client sur WhatsApp. Découvrez comment automatiser vos conversations 24h/24.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(4, 'Les tendances du développement web en 2025', 'tendances-developpement-web-2025', 'Découvrez les technologies et tendances qui façonnent le développement web cette année.', '<p>Le développement web évolue constamment. Voici les tendances à suivre en 2025.</p>\n                <h2>1. L\'IA générative</h2>\n                <p>L\'intelligence artificielle s\'intègre de plus en plus dans les applications web pour améliorer l\'expérience utilisateur.</p>\n                <h2>2. Les applications web progressives (PWA)</h2>\n                <p>Les PWA offrent une expérience proche des applications natives sans passer par les app stores.</p>\n                <h2>3. La JAMstack</h2>\n                <p>Cette architecture offre des sites ultra-rapides et plus sécurisés.</p>\n                <h2>4. Le WebAssembly</h2>\n                <p>Permet d\'exécuter du code haute performance dans le navigateur.</p>\n                <h2>Conclusion</h2>\n                <p>Restez à jour avec ces tendances pour créer des sites web modernes et performants.</p>', NULL, 'Tiefing Sangare', 0, 1, '2026-08-12 17:38:30', '\"[\\\"d\\\\u00e9veloppement web 2025\\\",\\\"tendances\\\",\\\"PWA\\\",\\\"JAMstack\\\"]\"', 'Découvrez les tendances du développement web en 2025 : IA, PWA, JAMstack et WebAssembly.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(5, 'sdfgf gfdggffdg', 'sdfgf-gfdggffdg', 'dfgfdg fdgfdgfd gf', 'jkjkjjkkjkjkjkjk', 'blog/1786991893_sdfgf-gfdggffdg.jpg', 'Tiefing Sangare', 2, 1, '2026-08-17 18:37:56', NULL, 'dfgfdg fdgfdgfd gf', '2026-08-17 18:37:24', '2026-08-18 19:53:55'),
(6, 'xdfdjhfbusfhosf', 'xdfdjhfbusfhosf', 'fkvfndphig er_çt herç_rterthth', 'grgrd erç urçghjrt diojg r)egçhd g)àtusdgàore', 'blog/1786991954_xdfdjhfbusfhosf.png', 'Tiefing Sangare', 12, 1, '2026-08-17 18:55:14', NULL, 'fkvfndphig er_çt herç_rterthth', '2026-08-17 18:39:14', '2026-08-19 19:03:02');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact_logs`
--

CREATE TABLE `contact_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'papa sang', 'tiefingsangare86@gmail.com', '+223 92 51 64 05', 'gfsdfdgdgdfffffffffffffffffffffffffffffffffff', 'xdffbg tfhfggfhgfdgfhd gfhdgf g', 0, '2026-08-18 10:21:43', '2026-08-18 10:21:43');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_20_194607_create_projects_table', 1),
(5, '2026_05_20_194702_create_blog_posts_table', 1),
(6, '2026_05_20_194809_create_messages_table', 1),
(7, '2026_05_20_195107_create_seo_settings_table', 1),
(8, '2026_05_21_142957_create_services_table', 1),
(9, '2026_05_26_150355_create_contact_logs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_keywords` json DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `image`, `technologies`, `client`, `project_url`, `order`, `is_featured`, `is_active`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Barayoro - Plateforme E-commerce', 'barayoro-plateforme-e-commerce', 'Barayoro est une plateforme e-commerce complète permettant aux commerçants maliens de vendre leurs produits en ligne. Solution sécurisée avec paiement mobile et livraison intégrée.', 'projects/1787080048_barayoro-plateforme-e-commerce.jpg', 'Laravel, MySQL, Tailwind CSS, Stripe, Orange Money', 'Barayoro SARL', 'https://barayoro.com', 1, 1, 1, '\"[\\\"e-commerce\\\",\\\"Mali\\\",\\\"vente en ligne\\\",\\\"Orange Money\\\"]\"', 'Plateforme e-commerce malienne pour vendre vos produits en ligne avec paiement mobile sécurisé.', '2026-08-12 17:38:30', '2026-08-18 19:07:28'),
(2, 'Agent IA WhatsApp - Chatbot Intelligent', 'agent-ia-whatsapp-chatbot', 'Solution innovante utilisant l\'intelligence artificielle pour automatiser les conversations WhatsApp. Idéal pour le service client, la prise de rendez-vous et les réponses automatiques 24h/24.', NULL, 'Node.js, OpenAI API, WhatsApp Business API, MongoDB', 'Masadigitale', NULL, 2, 1, 1, '\"[\\\"IA\\\",\\\"WhatsApp\\\",\\\"chatbot\\\",\\\"automatisation\\\",\\\"Mali\\\"]\"', 'Agent IA intelligent pour automatiser vos conversations WhatsApp et améliorer votre service client.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(3, 'Plateforme de Gestion d\'Entreprise (ERP)', 'plateforme-gestion-entreprise-erp', 'Solution ERP complète pour la gestion des entreprises : facturation, stocks, RH, comptabilité et reporting. Adaptée aux PME et startups maliennes.', NULL, 'Laravel, Livewire, MySQL, Chart.js, Tailwind', 'Plusieurs entreprises', NULL, 3, 1, 1, '\"[\\\"ERP\\\",\\\"gestion entreprise\\\",\\\"facturation\\\",\\\"Mali\\\",\\\"startup\\\"]\"', 'Plateforme ERP complète pour gérer votre entreprise : facturation, stocks, RH et comptabilité.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(4, 'Application Mobile - Livraison Express', 'application-mobile-livraison-express', 'Application mobile de livraison à la demande connectant livreurs et commerçants. Géolocalisation en temps réel, notifications push et suivi des commandes.', NULL, 'Flutter, Firebase, Google Maps API, Node.js', 'Express Mali', NULL, 4, 1, 1, '\"[\\\"mobile\\\",\\\"livraison\\\",\\\"Flutter\\\",\\\"g\\\\u00e9olocalisation\\\",\\\"Mali\\\"]\"', 'Application mobile de livraison à la demande avec géolocalisation en temps réel.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(5, 'Site Vitrine - Agence Digital Mali', 'site-vitrine-agence-digital-mali', 'Site web vitrine moderne pour une agence digitale malienne. Design premium, animations fluides et SEO optimisé pour le référencement local.', NULL, 'React, Tailwind CSS, SEO, Laravel API', 'Digital Mali Agency', NULL, 5, 0, 1, '\"[\\\"site vitrine\\\",\\\"agence digitale\\\",\\\"design moderne\\\",\\\"SEO Mali\\\"]\"', 'Site vitrine moderne et optimisé SEO pour agence digitale au Mali.', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(6, 'Application de Gestion Scolaire', 'application-gestion-scolaire', 'Plateforme complète de gestion scolaire : inscriptions, notes, emplois du temps, communication parents-professeurs et paiements en ligne.', NULL, 'Laravel, Vue.js, MySQL, Bootstrap', 'Groupe Scolaire Salam', NULL, 6, 0, 1, '\"[\\\"gestion scolaire\\\",\\\"\\\\u00e9cole\\\",\\\"notes\\\",\\\"Mali\\\",\\\"\\\\u00e9ducation\\\"]\"', 'Plateforme de gestion scolaire complète pour écoles et établissements au Mali.', '2026-08-12 17:38:30', '2026-08-12 17:38:30');

-- --------------------------------------------------------

--
-- Structure de la table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page`, `title`, `description`, `keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Tiefing Sangare - Développeur Web & Agence Digitale Mali', 'Tiefing Sangare, développeur web et fondateur de Masadigitale. Création de sites web, applications mobiles et agents IA WhatsApp à Bamako, Mali. Devis gratuit.', 'développeur web Mali, agence digitale Bamako, création site web Mali, Tiefing Sangare, Masadigitale', 'images/og-home.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(2, 'about', 'À propos - Tiefing Sangare | Développeur Web Mali', 'Découvrez Tiefing Sangare, développeur web passionné basé à Bamako, Mali. Expertise en Laravel, React, Flutter et IA. Plus de 5 ans d\'expérience.', 'Tiefing Sangare, développeur web, portfolio, Masadigitale, Bamako Mali', 'images/og-about.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(3, 'services', 'Services Digitaux - Création Site Web & Apps Mali', 'Découvrez mes services : création de sites web, applications mobiles, agent IA WhatsApp, SEO et formation digitale. Solutions sur mesure au Mali.', 'services web Mali, création site web, application mobile, IA WhatsApp, SEO Mali', 'images/og-services.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(4, 'projects', 'Réalisations - Portfolio de Projets Web & Mobile', 'Découvrez mes réalisations : sites e-commerce, applications mobiles, chatbots IA, ERP. Projets innovants pour les entreprises maliennes.', 'portfolio développeur, réalisations web, projets Mali, e-commerce Mali, ERP Mali', 'images/og-projects.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(5, 'blog', 'Blog SEO - Conseils Web & Digital au Mali', 'Articles sur le développement web, le SEO, l\'intelligence artificielle et les tendances digitales au Mali. Astuces pour booster votre visibilité en ligne.', 'blog SEO, conseils web, développement Mali, IA, digital Mali', 'images/og-blog.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(6, 'contact', 'Contact - Demandez votre Devis Gratuit | Tiefing Sangare', 'Contactez Tiefing Sangare pour vos projets web, applications mobiles ou agent IA WhatsApp. Réponse sous 24h. Devis gratuit et personnalisé.', 'contact développeur, devis gratuit site web, contact Masadigitale, Bamako Mali', 'images/og-contact.jpg', '2026-08-12 17:38:30', '2026-08-12 17:38:30');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `features` json DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'En savoir plus',
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `icon`, `description`, `full_description`, `image`, `order`, `is_featured`, `is_active`, `features`, `meta_title`, `meta_description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Création de Sites Web.', 'creation-de-sites-web', '🌐', 'Création de sites vitrine, e-commerce et applications web sur mesure avec SEO intégré.', 'Je crée des sites web modernes, rapides et optimisés SEO. Que vous ayez besoin d\'un site vitrine, d\'un e-commerce ou d\'une application web complexe, je vous accompagne de A à Z. Utilisation des dernières technologies (Laravel, React, Tailwind CSS) pour des performances optimales.', NULL, 1, 1, 1, '\"\\\"Design responsive (mobile, tablette, desktop)\\\\r\\\\nSEO optimis\\\\u00e9 pour Google\\\\r\\\\nPanel d\'administration facile\\\\r\\\\nS\\\\u00e9curit\\\\u00e9 renforc\\\\u00e9e (HTTPS, CSRF)\\\\r\\\\nChargement ultra-rapide (Score Pagespeed 90+)\\\\r\\\\nFormation \\\\u00e0 l\'utilisation\\\"\"', 'Création de sites web professionnels au Mali', 'Création de sites web sur mesure à Bamako, Mali. Sites vitrine, e-commerce, SEO optimisé. Devis gratuit.', 'En savoir plus', NULL, '2026-08-12 17:38:30', '2026-08-18 14:51:13'),
(2, 'Applications Mobiles', 'applications-mobiles', '📱', 'Applications iOS et Android natives ou cross-platform (Flutter, React Native).', 'Développement d\'applications mobiles performantes pour iOS et Android. Solutions cross-platform avec Flutter ou React Native pour réduire les coûts de développement. Applications natives pour des performances maximales.', 'services/1787071921_applications-mobiles.jpg', 2, 1, 1, '\"\\\"iOS et Android\\\\r\\\\nUI\\\\/UX soign\\\\u00e9e\\\\r\\\\nMode hors-ligne\\\\r\\\\nNotifications push\\\\r\\\\nG\\\\u00e9olocalisation\\\\r\\\\nPaiements int\\\\u00e9gr\\\\u00e9s\\\"\"', 'Développement d\'applications mobiles Mali', 'Création d\'applications mobiles iOS et Android pour entreprises au Mali. Flutter, React Native. Devis gratuit.', 'En savoir plus', NULL, '2026-08-12 17:38:30', '2026-08-18 16:52:01'),
(3, 'Agent IA WhatsApp', 'agent-ia-whatsapp', '🤖', 'Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.', 'Solution innovante utilisant l\'intelligence artificielle pour automatiser vos conversations WhatsApp. Service client automatisé, prise de rendez-vous, réponses aux FAQs, vente de produits 24h/24.', NULL, 3, 1, 1, '\"[\\\"Disponible 24h\\\\/24, 7j\\\\/7\\\",\\\"R\\\\u00e9ponses instantan\\\\u00e9es\\\",\\\"IA intelligente\\\",\\\"Multi-langues\\\",\\\"Tableau de bord analytique\\\",\\\"Export des conversations\\\"]\"', 'Agent IA WhatsApp pour entreprises au Mali', 'Automatisez votre service client avec notre agent IA WhatsApp. Disponible 24h/24. Devis gratuit.', 'En savoir plus', NULL, '2026-08-12 17:38:30', '2026-08-18 18:38:02'),
(4, 'Référencement SEO', 'referencement-seo', '📈', 'Optimisation de votre visibilité sur Google et les moteurs de recherche.', 'Service de référencement naturel complet pour améliorer votre positionnement sur Google. Audit SEO, optimisation technique, création de contenu, netlinking local.', NULL, 4, 0, 1, '\"[\\\"Audit SEO complet\\\",\\\"Optimisation technique\\\",\\\"Recherche de mots-cl\\\\u00e9s\\\",\\\"Cr\\\\u00e9ation de contenu\\\",\\\"Netlinking local Mali\\\",\\\"Suivi mensuel des performances\\\"]\"', 'Service SEO Mali - Référencement Google', 'Améliorez votre visibilité sur Google avec nos services SEO au Mali. Audit, optimisation, suivi. Devis gratuit.', 'En savoir plus', NULL, '2026-08-12 17:38:30', '2026-08-18 18:38:02'),
(6, 'Maintenance & Support', 'maintenance-support', '⚙️', 'Maintenance technique et support pour vos applications web et mobiles.', 'Service de maintenance et support technique pour vos sites web et applications. Mises à jour, sécurisation, backup, correction de bugs, assistance continue.', 'services/1787072051_maintenance-support.jpg', 6, 0, 1, '\"\\\"Mises \\\\u00e0 jour r\\\\u00e9guli\\\\u00e8res\\\\r\\\\nSauvegardes automatiques\\\\r\\\\nS\\\\u00e9curit\\\\u00e9 renforc\\\\u00e9e\\\\r\\\\nCorrection de bugs\\\\r\\\\nSupport prioritaire\\\\r\\\\nRapports mensuels\\\"\"', 'Maintenance site web Mali - Support technique', 'Service de maintenance et support technique pour sites web et applications au Mali. Devis gratuit.', 'En savoir plus', NULL, '2026-08-12 17:38:30', '2026-08-18 16:54:11'),
(12, 'cvvcvdfvd3333333333333334', 'cvvcvdfvd3333333333333334', '🚀', 'dsffdsfdsfds', 'dsfdsfdsfqsdfdsf', 'services/1787075952_cvvcvdfvd333333333333333.jpg', 0, 0, 1, '\"[\\\"dfdsf\\\",\\\"dfd\\\",\\\"ddsfdfsdf\\\",\\\"sdfsdfds\\\",\\\"fsdfsdfffsdfds\\\"]\"', NULL, 'dfsdfqsfdfds', 'En savoir plus', NULL, '2026-08-18 17:59:12', '2026-08-18 18:05:17');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xRvAktAxJN1zwy3mLwXc8HuFzvKbBrXr4T0g85J1', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:154.0) Gecko/20100101 Firefox/154.0', 'eyJfdG9rZW4iOiIySDFEZzdweGhBQ05aVUxFQ0FEUTRwRlE0cW9MM3FyUGc2cGswbzBCIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjN9', 1787171088);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gitlab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitbucket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reddit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `devto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashnode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stackoverflow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producthunt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribbble` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `figma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calendly_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `show_social` tinyint(1) NOT NULL DEFAULT '1',
  `settings` json DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `phone`, `bio`, `about`, `title`, `company`, `location`, `youtube`, `facebook`, `twitter`, `instagram`, `linkedin`, `github`, `gitlab`, `bitbucket`, `tiktok`, `snapchat`, `pinterest`, `reddit`, `twitch`, `discord`, `telegram`, `whatsapp`, `signal`, `medium`, `devto`, `hashnode`, `stackoverflow`, `producthunt`, `dribbble`, `behance`, `figma`, `portfolio_url`, `blog_url`, `cv_url`, `resume_url`, `calendly_url`, `role`, `is_active`, `show_social`, `settings`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-08-12 17:38:29', '$2y$12$Y233oD38zY24kVXr8W2Lbew1NvHoEhsp2bHmb9zr/yVLD5yviZkfu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 1, 1, NULL, 'IBgaI70DPd', '2026-08-12 17:38:30', '2026-08-12 17:38:30'),
(3, 'Tiefing Sangare', 'tiefingsangare86@gmail.com', '2026-08-12 17:38:31', '$2y$12$VDCqq2oJDZS2RtzA.i5CYee43RePazzddHmBC843xyc7otvzK3xm.', 'avatars/1787048782_avatar.png', '+223 66 89 44 75', 'Développeur web passionné, créateur de solutions digitales innovantes au Mali. Spécialisé en Laravel, React, Flutter et SEO.', 'Je suis Tiefing Sangare, développeur web full stack avec plus de 5 ans d\'expérience. Passionné par les nouvelles technologies, je crée des sites web performants, des applications mobiles et des solutions IA pour les entreprises maliennes.\r\n\r\nMon objectif est d\'accompagner les entreprises dans leur transformation digitale en leur fournissant des solutions sur mesure, modernes et optimisées pour le référencement.\r\n\r\nN\'hésitez pas à me contacter pour discuter de vos projets !', 'Développeur Full Stack & Expert SEO', 'Masadigitale', 'Bamako, Mali', 'https://youtube.com/@tiefingsangare-y4u?si=aH1AGOAiHaWNHgw5', 'https://www.facebook.com/profile.php?id=61590223301110', 'https://twitter.com/tiefingsangare', 'https://www.instagram.com/tiefing_sangare_ts?igsh=ZWJpcmdrczVueHk5&utm_source=qr', 'https://linkedin.com/in/tiefingsangare', 'https://github.com/tiefingsang', NULL, NULL, 'https://tiktok.com/@tiefingsangare', NULL, NULL, NULL, NULL, 'https://discord.gg/tiefingsangare', 'https://t.me/tiefingsangare', 'https://wa.me/22366894475', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://tiefingsangare.com', 'https://blog.tiefingsangare.com', NULL, NULL, 'https://calendly.com/tiefingsangare', 'admin', 1, 1, NULL, NULL, '2026-08-12 17:38:31', '2026-08-18 10:26:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `contact_logs`
--
ALTER TABLE `contact_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Index pour la table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_settings_page_unique` (`page`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact_logs`
--
ALTER TABLE `contact_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
