<?php
require_once 'c:\xampp\htdocs\Projet webb\vendor\autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51PAcjaRu3mJy8iqKAe7WLjyKJLU4Ia0onu5PyZvWEOsNWQmoWG8lZejUeFEuuVyKPHdPt34TIQbS6IWSAkm0wNfK00BPXRQBFo'); // Remplacez par votre clé réelle

// Récupérer les informations sur la commande
// Supposons que vous avez déjà récupéré le total de la commande depuis la base de données ou la session
$total = $_GET['total'] ?? 0; // Le total de la commande passé en paramètre dans l'URL, sinon 0

// Convertir le total en cents (Stripe prend les montants en cents)
$totalCents = $total * 100; // Par exemple, si le total est 20.00 USD, ce sera 2000 cents

try {
    // Créez une session Stripe Checkout
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'], // Types de paiements autorisés
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd', // Devise
                'product_data' => [
                    'name' => 'Paiement pour votre produit', // Nom du produit
                ],
                'unit_amount' => $totalCents, // Prix en cents (total de la commande)
            ],
            'quantity' => 1, // Quantité (ici on suppose qu'il s'agit de l'ensemble de la commande)
        ]],
        'mode' => 'payment', // Mode paiement unique
        'success_url' => 'https://yourdomain.com/success.html', // URL de succès
        'cancel_url' => 'https://yourdomain.com/cancel.html',   // URL d'annulation
    ]);

    // Redirection vers Stripe Checkout
    header("Location: " . $checkout_session->url);
    exit;
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
<?php include '../include/nav_front.php' ?>
<?php include '../include/head_front.php' ?>
