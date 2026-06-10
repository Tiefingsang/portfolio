<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Pourquoi votre entreprise a besoin d\'un site web professionnel en 2025',
                'slug' => 'pourquoi-entreprise-besoin-site-web-professionnel-2025',
                'excerpt' => 'Découvrez les avantages d\'avoir un site web professionnel pour votre entreprise au Mali et comment booster votre visibilité en ligne.',
                'content' => '<p>Dans un monde de plus en plus digital, avoir un site web professionnel n\'est plus une option, mais une nécessité pour toute entreprise qui souhaite se développer.</p>
                <h2>1. Crédibilité et professionnalisme</h2>
                <p>Un site web bien conçu donne une image professionnelle de votre entreprise. 84% des consommateurs pensent qu\'une entreprise avec un site web est plus crédible qu\'une entreprise qui n\'en a pas.</p>
                <h2>2. Visibilité 24h/24, 7j/7</h2>
                <p>Votre site web travaille pour vous même en dehors des heures ouvrables. Vos clients peuvent découvrir vos produits et services à tout moment.</p>
                <h2>3. Acquisition de nouveaux clients</h2>
                <p>Grâce au référencement naturel (SEO), votre site web attire des visiteurs qualifiés qui recherchent vos services sur Google.</p>
                <h2>4. Avantage concurrentiel</h2>
                <p>Si vos concurrents ont un site web et pas vous, vous perdez des opportunités commerciales importantes.</p>
                <h2>Conclusion</h2>
                <p>Investir dans un site web professionnel est l\'une des meilleures décisions pour votre entreprise. Contactez-moi pour créer votre présence en ligne !</p>',
                'author' => 'Tiefing Sangare',
                'is_published' => true,
                'published_at' => now(),
                'meta_keywords' => json_encode(['site web professionnel', 'entreprise Mali', 'SEO', 'visibilité']),
                'meta_description' => 'Découvrez pourquoi votre entreprise a besoin d\'un site web professionnel en 2025 pour booster sa visibilité au Mali.',
            ],
            [
                'title' => 'Les avantages du SEO pour les entreprises maliennes',
                'slug' => 'avantages-seo-entreprises-maliennes',
                'excerpt' => 'Comment le référencement naturel peut transformer votre entreprise et vous faire gagner des clients qualifiés sans publicité payante.',
                'content' => '<p>Le SEO (Search Engine Optimization) est un levier puissant pour attirer des clients gratuitement sur Google.</p>
                <h2>Pourquoi le SEO est important au Mali ?</h2>
                <p>De plus en plus de maliens utilisent Google pour trouver des produits et services. Être bien positionné sur les recherches locales est un avantage compétitif majeur.</p>
                <h2>Les bénéfices du SEO</h2>
                <ul>
                    <li><strong>Trafic gratuit et qualifié</strong> : Des visiteurs qui cherchent activement vos services</li>
                    <li><strong>Retour sur investissement durable</strong> : Les effets du SEO durent dans le temps</li>
                    <li><strong>Crédibilité accrue</strong> : Les premiers résultats Google sont perçus comme les plus fiables</li>
                    <li><strong>Visibilité locale</strong> : Attirez des clients à Bamako et dans toute la région</li>
                </ul>
                <h2>Conclusion</h2>
                <p>Investir dans le SEO est essentiel pour toute entreprise qui souhaite se développer au Mali. Contactez-moi pour un audit SEO gratuit !</p>',
                'author' => 'Tiefing Sangare',
                'is_published' => true,
                'published_at' => now(),
                'meta_keywords' => json_encode(['SEO Mali', 'référencement naturel', 'agence digitale Bamako', 'Google Mali']),
                'meta_description' => 'Découvrez les avantages du SEO pour votre entreprise au Mali et comment attirer plus de clients gratuitement.',
            ],
            [
                'title' => 'Comment l\'IA révolutionne le service client sur WhatsApp',
                'slug' => 'ia-revolutionne-service-client-whatsapp',
                'excerpt' => 'Découvrez comment les chatbots intelligents transforment la relation client et automatisent vos conversations WhatsApp 24h/24.',
                'content' => '<p>L\'intelligence artificielle change la donne pour le service client. Avec les agents IA sur WhatsApp, vos clients obtiennent des réponses instantanées à toute heure.</p>
                <h2>Pourquoi intégrer un agent IA WhatsApp ?</h2>
                <ul>
                    <li><strong>Disponibilité 24h/24</strong> : Vos clients sont servis même la nuit et les week-ends</li>
                    <li><strong>Réponses instantanées</strong> : Fini les temps d\'attente frustrants</li>
                    <li><strong>Économies importantes</strong> : Réduisez vos coûts de support client</li>
                    <li><strong>Scalabilité</strong> : Gérez des milliers de conversations simultanément</li>
                </ul>
                <h2>Cas d\'utilisation au Mali</h2>
                <p>Les entreprises maliennes utilisent déjà nos agents IA pour : la prise de rendez-vous, les FAQs automatiques, le support technique, la vente de produits, etc.</p>
                <h2>Conclusion</h2>
                <p>Ne restez pas à la traîne. Modernisez votre service client avec un agent IA sur WhatsApp dès aujourd\'hui !</p>',
                'author' => 'Tiefing Sangare',
                'is_published' => true,
                'published_at' => now(),
                'meta_keywords' => json_encode(['IA WhatsApp', 'chatbot', 'service client', 'automatisation Mali']),
                'meta_description' => 'L\'IA révolutionne le service client sur WhatsApp. Découvrez comment automatiser vos conversations 24h/24.',
            ],
            [
                'title' => 'Les tendances du développement web en 2025',
                'slug' => 'tendances-developpement-web-2025',
                'excerpt' => 'Découvrez les technologies et tendances qui façonnent le développement web cette année.',
                'content' => '<p>Le développement web évolue constamment. Voici les tendances à suivre en 2025.</p>
                <h2>1. L\'IA générative</h2>
                <p>L\'intelligence artificielle s\'intègre de plus en plus dans les applications web pour améliorer l\'expérience utilisateur.</p>
                <h2>2. Les applications web progressives (PWA)</h2>
                <p>Les PWA offrent une expérience proche des applications natives sans passer par les app stores.</p>
                <h2>3. La JAMstack</h2>
                <p>Cette architecture offre des sites ultra-rapides et plus sécurisés.</p>
                <h2>4. Le WebAssembly</h2>
                <p>Permet d\'exécuter du code haute performance dans le navigateur.</p>
                <h2>Conclusion</h2>
                <p>Restez à jour avec ces tendances pour créer des sites web modernes et performants.</p>',
                'author' => 'Tiefing Sangare',
                'is_published' => true,
                'published_at' => now(),
                'meta_keywords' => json_encode(['développement web 2025', 'tendances', 'PWA', 'JAMstack']),
                'meta_description' => 'Découvrez les tendances du développement web en 2025 : IA, PWA, JAMstack et WebAssembly.',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
